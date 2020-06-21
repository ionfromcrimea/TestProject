<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Просмотр файла</title>
    {{--    <link href="{{mix('/css/app.css')}}" media="screen, projection" rel="stylesheet" type="text/css"/>--}}
    {{--    <script type="text/javascript" src="{{mix('/js/app.js')}}" defer></script>--}}

</head>
<body>
<main role="main" id="app">
    <div class="container py-5">
        @if($extension == "txt")

            <div class="row">
                <div class="col-md-12">
                    <h1>Содержимое полученного файла</h1>
                </div>
            </div>
            {{--        <div class="row mb-5">--}}
            <div class="col-md-9">
                <p>{{ $realname }}</p>
                <textarea class="form-control" cols="80" rows="30"
                          readonly="">{{ Storage::get($filetoshow) }}</textarea>
            </div>
            {{--        </div>--}}
    </div>
    @endif
    @if($extension == "jpeg")
        <div class="container py-5">
            <h1>Полученное изображение</h1>
            <img src="{{ Storage::url($filetoshow) }}" height="480px">
        </div>
    @endif
</main>
</body>
</html>
