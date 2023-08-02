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
    <form method="post" action="https://payeer.com/merchant/">
        <input type="hidden" name="m_shop" value=" {{ $m_shop }} ">
        <input type="hidden" name="m_orderid" value=" {{ $m_orderid }} ">
        <input type="hidden" name="m_amount" value=" {{ $m_amount }} ">
        <input type="hidden" name="m_curr" value=" {{ $m_curr }} ">
        <input type="hidden" name="m_desc" value=" {{ $m_desc }} ">
        <input type="hidden" name="m_sign" value=" {{ $sign }} ">
        <input type="hidden" name="form[ps]" value="2609">
        <input type="hidden" name="form[curr[2609]]" value="RUB">
        <input type="hidden" name="m_params" value=" {{ $m_params }} ">
        <input type="hidden" name="m_cipher_method" value="AES-256-CBC">
        <button class="button" type="submit" name="m_process" value="send"><span class="text">Перейти</span></button>
    </form>
</div>
</body>

