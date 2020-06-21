@extends('master')

@section('title', 'ST')

@section('content')

    <div class="container">
        <form name="storagetest" method="post" enctype="multipart/form-data" action="{{route('st')}}">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <h2>Кому</h2>
                    <select name="users">
                        {{--                        <option value="0" selected>ВСЕ</option>--}}
                        @foreach($users as $usr)
                            <option value="{{$usr->id}}">{{$usr->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <h2><label for="image" class="col-sm-2 col-form-label">Файл: </label></h2>
                    <div class="col-sm-8">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
            </div>
            <br><br>

            <br><br>
            <input type="submit" value="Отправить">

        </form>
    </div>
    <br><br><br>

    @if(!$user == null)
        <div class="container">
            <div class="col-md-4">
                <pre>Отправлено - {{$user->name}}</pre>
            </div>
            <div class="col-md-8">
                <pre>Исходное имя - {{$realname}}</pre>
            </div>
        </div>
        <br>
        <div class="container">
            {{--            <div class="row">--}}
            <div class="col-md-6">
                <pre>Файл - {{$filename}}</pre>
            </div>
            <div class="col-md-6">
                <pre>Путь - {{$path}}</pre>
            </div>
            {{--            </div>--}}
        </div>
        <br>
        <div class="container">
            <div class="col-md-2">
                <pre>Тип - {{$extension}}</pre>
            </div>
            <div class="col-md-2">
                <pre>Размер - {{$size}}</pre>
            </div>
        </div>
        <br>

        {{--        <div class="container">--}}
        {{--            @foreach($providers as $provider)--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-md-2">--}}
        {{--                        <h4>Средняя: {{$provider->avg_value($city)}}</h4>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-4">--}}
        {{--                        <h4>Провайдер - {{$provider->name}}</h4>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-4">--}}
        {{--                        <h4>Оценка пользователя--}}
        {{--                            - @php for($i=0; $i < $provider->user_value($city, $user); $i++) echo "* "; @endphp</h4>--}}
        {{--                        <br><br>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}
    @endif

@endsection
