<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/payeer.js')
    <title>Market</title>
</head>
<body>
<div id="app" class="mb-5">
    <br><br><br>
    <h1>Секунду ...</h1>
    <div class="slider">
        <div class="line"></div>
        <div class="break dot1"></div>
        <div class="break dot2"></div>
        <div class="break dot3"></div>
    </div>
    <p>Перенаправляем на страницу оплаты</p>
    <?php
    $m_shop = '1926311116';
    $m_orderid = '1';
    $m_amount = number_format(1, 2, '.', '');
    $m_curr = 'RUB';
    $m_desc = base64_encode('Test'); //добавить описание  Переменная m_desc должна обязательно содержать кодированный с помощью base64_encode текст

    $m_key = '123';

    $arHash = array(
        $m_shop,
        $m_orderid,
        $m_amount,
        $m_curr,
        $m_desc
    );


    $arParams = array(
        'success_url' => 'http://testyoursite.ru/test/success',
        'fail_url' => 'http://testyoursite.ru/test/fail',
        'status_url' => 'http://testyoursite.ru/test/handler.php',
        'reference' => array(
            'var1' => '1',
            //'var2' => '2',
            //'var3' => '3',
            //'var4' => '4',
            //'var5' => '5',
        ),
        //'submerchant' => 'mail.com',
    );

    $key = md5('1234' . $m_orderid);

    $m_params = @urlencode(base64_encode(openssl_encrypt(json_encode($arParams), 'AES-256-CBC', $key, OPENSSL_RAW_DATA)));

    $arHash[] = $m_params;

    $arHash[] = $m_key;

    $sign = strtoupper(hash('sha256', implode(':', $arHash)));
    ?>
    <form method="post" action="https://payeer.com/merchant/">
        <input type="hidden" name="m_shop" value="<?= $m_shop ?>">
        <input type="hidden" name="m_orderid" value="<?= $m_orderid ?>">
        <input type="hidden" name="m_amount" value="<?= $m_amount ?>">
        <input type="hidden" name="m_curr" value="<?= $m_curr ?>">
        <input type="hidden" name="m_desc" value="<?= $m_desc ?>">
        <input type="hidden" name="m_sign" value="<?= $sign ?>">
        <input type="hidden" name="form[ps]" value="2609">
        <input type="hidden" name="form[curr[2609]]" value="RUB">
        <input type="hidden" name="m_params" value="<?= $m_params ?>">
        <input type="hidden" name="m_cipher_method" value="AES-256-CBC">
        <button class="button" type="submit" name="m_process" value="send"><span class="text">Перейти на страницу оплаты</span></button>
    </form>
</div>
</body>

