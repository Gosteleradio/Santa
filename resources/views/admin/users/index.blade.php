@extends('layouts.app')


@section('title', 'Страница Пользователи')


@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Пользователи</div>

                    @forelse($users as $user)
                            <div class="card-body">

                            @if($user->is_admin)
                                <a href="{{route('admin.toggleAdmin', $user)}}" type="btn" class="btn btn-success">Назначить админа</a>
                            @else
                                <a href="{{route('admin.toggleAdmin', $user)}}"type="btn" class="btn btn-danger">Снять админа</a>
                            @endif{{$user->name}}
                            </div>
                     @empty
                    <p>нет пользоватедей</p>
                     @endforelse
                    </div>
                {{$users->links()}}
                </div>
            </div>
        </div>

@endsection

