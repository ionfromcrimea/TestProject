@extends('master')

@section('title', 'ST-check')

@section('content')

    <div class="container">
        <form name="storagetest" method="post" enctype="multipart/form-data" action="{{route('st2')}}">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <h2>Получатель</h2>
                    <select name="users">
                        {{--                        <option value="0" selected>ВСЕ</option>--}}
                        @foreach($users as $usr)
                            <option value="{{$usr->id}}"
                                    {{--                            @isset($user)--}}
                                    @if(!$user == null)
                                    @if($user->id == $usr->id)
                                    selected
                                @endif
                                @endif
                                {{--                            @endisset--}}
                            >{{$usr->name}}</option>
                        @endforeach
                    </select>

                </div>
                {{--                <div class="col-md-6">--}}
                {{--                    <h2><label for="image" class="col-sm-2 col-form-label">Файл: </label></h2>--}}
                {{--                    <div class="col-sm-8">--}}
                {{--                        <label class="btn btn-default btn-file">--}}
                {{--                            Загрузить <input type="file" style="display: none;" name="image" id="image">--}}
                {{--                        </label>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

            <br><br>
            <input type="submit" value="Проверить">

        </form>
    </div>
    <br><br><br>

    @if(!$user == null)
        <div class="col-md-12">
            <h1>Файлы к получению</h1>
            <table class="table">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Отправитель</th>
                    <th>Имя файла</th>
                    <th>Размер</th>
                    <th>Загрузка (открыть - для .txt и .jpeg)</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->sendername() }}</td>
                        <td>{{ $post->realname }}</td>
                        <td>{{ $post->size }}</td>
                        <td>
                            <div class="btn" role="group">
                                {{--                                <form action="{{ route('file.delete', $post) }}" method="POST">--}}
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('file.download', [$post->id]) }}">Загрузить</a>
                                @if($post->ext == "txt" or $post->ext == "jpeg")
                                    <a class="btn btn-success" type="button"
                                       href="{{ route('file.show', [$post->id]) }}">Открыть</a>
                                @endif
                                {{--                                    @csrf--}}
                                {{--                                    @method('DELETE')--}}
                                {{--                                    <input class="btn btn-danger" type="submit" value="Удалить"></form>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--            <a class="btn btn-success" type="button"--}}
            {{--               href="{{ route('categories.create') }}">Добавить категорию</a>--}}
        </div>
    @endif

@endsection
