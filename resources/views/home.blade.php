

@extends('layouts.app')


@section('title', 'Главная')


@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <H1>Самая Главная Страница "Санты"</H1>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

