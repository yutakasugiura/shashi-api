<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        a {
            color: #666;
            text-decoration: none;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn-square-pop {
            padding: 0.25em 0.5em;
            text-decoration: none;
            color: #FFF;
            background: #fd9535;/*背景色*/
            border-radius: 4px;/*角の丸み*/
            font-weight: bold;
            border: none;  /* 枠線を消す */
        }

        .btn-square-stop {
            padding: 0.25em 0.5em;
            text-decoration: none;
            color: #FFF;
            background: red;/*背景色*/
            border-radius: 4px;/*角の丸み*/
            font-weight: bold;
            border: none;  /* 枠線を消す */
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                社史API
            </div>
            <form action="import_json" method="post">
                <input type="input" name="stockCode" placeholder="証券コード" autocomplete=off>
                <input type="password" name="jsonKey" placeholder="json_password" autocomplete=off>
                <input type="submit" value="詳細生成" class="btn-square-pop" style="cursor:pointer">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
            <hr>
            <form action="disable_company" method="post">
                <input type="input" name="stockCode" placeholder="証券コード" autocomplete=off>
                <input type="submit" value="非表示" class="btn-square-red" style="cursor:pointer">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
            <h2><a href="./api/company">localhost:8000 - Laravel(API)</a></h2>
            <h2><a href="http://localhost:3000/">localhost:3000 - Nuxt(Client)</a</h2>
        </div>
    </div>
</body>

</html>