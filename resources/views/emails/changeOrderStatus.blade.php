<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>وضعیت سفارش شما</title>
    <style>
        body
        {
            direction: rtl;
        }
        .container
        {
            width: 90%;
            margin: 0 auto;
        }
        .main_title
        {
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="main_title">وضعیت سفارش شما :</h1>
        <p>وضعیت سفارش شما با کد <span>{{ $cart['order_code'] }}</span> به حالت <span>{{ $cart->orderstatus['title'] }}</span> تغییر یافت.</p>
    </div>

</body>
</html>
