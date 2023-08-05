<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Order\StoreController;
use App\Models\Config;
use App\Models\Game;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayeerController extends Controller
{
    protected $game;
    protected $config;

    public function __construct()
    {
        $this->config = Config::first();
    }

    public function payment(Game $game)
    {
        $instance = new StoreController();
        $newOrder = $instance($game->id);//создаем заказ

        $domain = request()->getHost();
        $this->game = $game;

        $m_shop = $this->config->shop;
        $m_key = $this->config->key;
        $m_orderid = $newOrder->id;
        $m_amount = number_format(1, 2, '.', ''); //продумать
        $m_curr = $this->config->curr;
        $m_desc = base64_encode('Test'); //добавить описание  Переменная m_desc должна обязательно содержать кодированный с помощью base64_encode текст


        $arHash = array(
            $m_shop,
            $m_orderid,
            $m_amount,
            $m_curr,
            $m_desc
        );


        $arParams = array(
            'success_url' => 'http://' . $domain . '/success',
            'fail_url' => 'http://' . $domain . '/fail',
            'status_url' => 'http://' . $domain . '/handler',
            'reference' => array(
                'id' => $game->id,
                //'var2' => '2',
                //'var3' => '3',
                //'var4' => '4',
                //'var5' => '5',
            ),
            //'submerchant' => 'mail.com',
        );

        $key = md5($this->config->extra_key . $m_orderid);

        $m_params = @urlencode(base64_encode(openssl_encrypt(json_encode($arParams), 'AES-256-CBC', $key, OPENSSL_RAW_DATA)));

        $arHash[] = $m_params;

        $arHash[] = $m_key;

        $sign = strtoupper(hash('sha256', implode(':', $arHash)));

        return view('payeer/payment', compact(
            'm_shop',
            'm_orderid',
            'm_amount',
            'm_curr',
            'm_desc',
            'sign',
            'm_params',
        ));
    }

    public function handle()
    {
        Log::info('Обращение к маршруту /handler');
        if (!in_array($_SERVER['REMOTE_ADDR'], array('185.71.65.92', '185.71.65.189', '149.202.17.210'))) return;

        if (isset($_POST['m_operation_id']) && isset($_POST['m_sign'])) {
            $m_key = $this->config->key;

            $arHash = array(
                $_POST['m_operation_id'],
                $_POST['m_operation_ps'],
                $_POST['m_operation_date'],
                $_POST['m_operation_pay_date'],
                $_POST['m_shop'],
                $_POST['m_orderid'],
                $_POST['m_amount'],
                $_POST['m_curr'],
                $_POST['m_desc'],
                $_POST['m_status']
            );

            if (isset($_POST['m_params'])) {
                $arHash[] = $_POST['m_params'];
            }

            $arHash[] = $m_key;

            $sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

            if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success') {
                if (ob_get_contents()) ob_end_clean();

                $mParams = json_decode($_POST['m_params'], true);
                $referenceId = $mParams['reference']['id'];

                Log::info('Обращение к маршруту /handler + success');
                Order::updateOrCreate([
                    'id' => $_POST['m_orderid'],
                    'payeer_operation_id' => $_POST['m_operation_id'],
                    'operation_ps' => $_POST['m_operation_ps'],
                    'operation_date' => $_POST['m_operation_date'],
                    'operation_pay_date' => $_POST['m_operation_pay_date'],
                    'amount' => $_POST['m_amount'],
                    'curr' => $_POST['m_curr'],
                    'desc' => $_POST['m_desc'],
                    'status' => $_POST['m_status'],
                    'game_id' => $referenceId
                ]);
                Log::info('Параметры POST: ' . var_export($_POST, true));

                exit($_POST['m_orderid'] . '|success');
            }

            if (ob_get_contents()) ob_end_clean();
            Log::info('Обращение к маршруту /handler + error');
            Log::info('Параметры POST: ' . var_export($_POST, true));

            exit($_POST['m_orderid'] . '|error');

        }
    }

    public function success()
    {
        return view('payeer/success');
    }

    public function fail()
    {
        return redirect()->route('market');
    }

}
