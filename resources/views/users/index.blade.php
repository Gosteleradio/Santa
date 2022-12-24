

@extends('layouts.app')


@section('title', 'Все новости')


@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">

                        <h2>Все Пользователи</h2>


                        @forelse($users as $item)

                            <a href="{{route('users.index',$item->id)}}">{{$item->name}}</a><br><br>

                        @empty
                            <h1>Нет такого Пользователя!</h1>
                        @endforelse



                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
@endsection
