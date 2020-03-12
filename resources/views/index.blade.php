@extends('master')

@section('title', 'U->C->P->S')

@section('content')

    <div class="container">
        <form name="usercity" method="post" action="{{route('index')}}">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <h2>Пользователь</h2>
                    <select name="users">
                        {{--                        <option value="0" selected>ВСЕ</option>--}}
                        @foreach($users as $usr)
                            <option value="{{$usr->id}}">{{$usr->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-4">
                    <h2>Город</h2>
                    <select name="cities">
                        @foreach($cities as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><br>

            Мобильный телефон: <input  id="phone" type="text" placeholder="Введите нумбер!">
            <script>
                //Код jQuery, установливающий маску для ввода телефона элементу input
                //1. После загрузки страницы,  когда все элементы будут доступны выполнить...
                $(function(){
                    //2. Получить элемент, к которому необходимо добавить маску
                    $("#phone").mask("+7(999) 999-9999");
                });
            </script>
            <br><hr color="red" size="4"><br>

            <input id="inp1" type="text" placeholder="2+7 цифр">
            <input id="inp2" data-inputmask="'alias': 'datetime'" placeholder="Дата и Время"/>
            <input id="inp3" data-inputmask="'mask': '9', 'repeat': 10, 'greedy' : false" placeholder="10 цифр"/>
            <br><br>
            <input id="inp4" data-inputmask="'mask': '+7(999) 999-9999'" placeholder="Телефон в России"/>
            <input id="inp5" type="text" placeholder="Динамический шаблон">
            <input id="ip" data-inputmask="'alias': 'ip'" inputmode="numeric" placeholder="IP-адрес">
            <input id="inp6" type="text" placeholder="Цифровая маска">

            <script>
            $(document).ready(function(){
                $("#inp1").inputmask("99-9999999");  //static mask
                $("#inp2").inputmask();
                $("#inp3").inputmask({ "oncomplete":   function(){ alert('inputmask complete');   } },
                                     { "onincomplete": function(){ alert('inputmask incomplete'); } });
                $("#inp4").inputmask();
            // $(selector).inputmask({"mask": "(999) 999-9999"}); //specifying options
                $("#inp5").inputmask("9-a{1,4}9{1,3}"); //mask with dynamic syntax
                $("#ip").inputmask();

                //decimal mask
                Inputmask("(.999){+|1},000", {
                    positionCaretOnClick: "radixFocus",
                    radixPoint: ",",
                    _radixDance: true,
                    numericInput: true,
                    placeholder: "0",
                    definitions: {
                        "0": {
                            validator: "[0-9\uFF11-\uFF19]"
                        }
                    }
                }).mask("#inp6");

            });
            </script>

{{--            <script>--}}
{{--            $(document).ready(function(){--}}
{{--            $(":input").inputmask();--}}
{{--            // or--}}
{{--            Inputmask().mask(document.querySelectorAll("input"));--}}
{{--            });--}}
{{--            </script>--}}

            <br><br>
            <input type="submit" value="Отправить">

        </form>
    </div>
    <br><br><br>

    @if(!$city == null)
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <pre>Пользователь - {{$user->name}}</pre>
                </div>
                <div class="col-md-4">
                    <pre>Город - {{$city->name}}</pre>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            @foreach($providers as $provider)
                <div class="row">
                    <div class="col-md-2">
                        <h4>Средняя: {{$provider->avg_value($city)}}</h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Провайдер - {{$provider->name}}</h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Оценка пользователя - @php for($i=0; $i < $provider->user_value($city, $user); $i++) echo "* "; @endphp</h4>
                        <br><br>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
