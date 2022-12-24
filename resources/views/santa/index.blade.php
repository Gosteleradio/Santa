

@extends('layouts.app')

@section('title', 'Основная страница Santa')


@section('menu')
    @include('menu')
@endsection


{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h1>Это страница Администратора</h1>--}}
{{--                        <h2>Редактирование новостей</h2>--}}
{{--                        @forelse($news as $item)--}}
{{--                            <h2>{{ $item->title }}</h2>--}}

{{--                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">--}}
{{--                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">--}}
{{--                                    Edit--}}
{{--                                </a>--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <input type="submit" class="btn btn-danger" value="Delete">--}}
{{--                            </form>--}}




{{--                        @empty--}}
{{--                            Нет новостей--}}
{{--                        @endforelse--}}

{{--                        {{ $news->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Это страница Санты</h1>
                        <h2>Редактирование Коробки</h2>
                        @forelse($santa as $item)
                            <h2>{{ $item->title }}</h2>

                            <form action="{{ route('santa.destroy', $item) }}" method="post">
                                <a href="{{ route('santa.edit', $item) }}" class="btn btn-success">Edit </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        @empty
                           Нет коробки
                        @endforelse

                        {{ $santa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


