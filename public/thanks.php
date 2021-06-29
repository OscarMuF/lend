<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />

    <title>Заказ оформлен</title>
    <style>
        body {
            background: #eeeeee url("/Content/Images/pattern.png");
            font-family: Tahoma;
            font-size: 14px;
        }

        h1 {
            text-align: center;
            color: #ff7200;
            font-size: 50px;
            text-transform: uppercase;
            line-height: 49px;
            margin-top: 0;
            padding-top: 0;
        }

        h2 {
            text-transform: none;
            text-align: center;
            font-size: 30px;
            color: black;
        }

        h3 {
            text-align: center;
            color: #111;
        }

        #parent,
        #page-info {
            padding: 0 20px 0 20px;
        }

        #content {
            font-size: 1em;
            margin: 0 auto;
            margin-top: 30px;
            background: white;
            max-width: 650px;
            min-width: 300px;
            -moz-border-radius: 14px;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
        }

        .info-wrap {
            font-size: 1em;
            margin: 0 auto;
            margin-top: 40px;
            max-width: 650px;
            -moz-border-radius: 14px;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            border: 5px solid #ff7200;
        }

        .info-wrap h3 {
            font-size: 25px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .p-logo {
            background: url("../img/parther-logo.png");
            width: 164px;
            height: 49px;
            display: inline-block;
            vertical-align: middle;
        }

        .info-wrap a {
            padding: 15px 0;
            text-decoration: none;
            color: #FF151F;
            text-decoration: underline;
        }

        .sub-title {
            font-size: 18px;
        }

        .sub-title a {
            font-weight: bold;
            color: #FF151F;
            text-decoration: none;
            transition: 0.3s;
            text-decoration: underline;
        }

        .sub-title a:hover {
            color: #ff7200;
        }

        .sub-title span {
            display: block;
            padding: 10px 0;
            color: #FF151F;
            text-decoration: underline;
        }
    </style>

    <?=$metrika?>
</head>
    <?=$pixel_img?>

<body>
    <div id="parent">
        <div id="content">
            <h2 style="text-align: center;">Для подтверждения регистрации ожидайте звонок менеджера</h1>

        </div>

    </div>

</body>

</html>