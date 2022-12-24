@extends('layouts.app')



@section('title', 'Создание Santa Box')


@section ('menu')
    @include('santa.menu')
@endsection

{{--@dump($errors)--}}


@section('title', 'Создание Коробки Санты')


@section ('menu')
    @include('santa.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @if ($santa->id)
                            Изменить Коробку Санты
                        @else
                            Добавить Коробку Санты
                        @endif</div>
                    <div class="card-body">
                        <form action="@if (!$santa->id){{ route('santa.store') }}@else{{ route('santa.update', $santa) }}@endif"
                              method="post">
                            @csrf
                            @if($santa->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="santaTitle">Название коробки</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="santaTitle" class="form-control"
                                       value="{{ $santa->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="santaCreator">Box Creator</label>
                                @if ($errors->has('creator_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('creator_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="creator_id" id="santaCreator" class="form-control">
                                 @forelse($users as $item)
                                     @dump($users)
                                        <option @if ($item['id'] == old('category_id')) selected
                                                @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @empty
                                        <option value="0" selected>No Creator</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="santaText">Пожелания к Подарку от Санты</label>
                                @if ($errors->has('description'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('description') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea id="editor" name="description" id="santaText"
                                          class="form-control">{{empty(old())? $santa->description : old('description') }}
                                </textarea>
                            </div>
                            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                            </script>
                            <div class="form-check">
                                @if ($errors->has('is_Private'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('is_Private') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input @if ($santa->isPrivate == 1 || old('isPrivate') == 1) checked
                                       @endif id="santaPrivate" name="isPrivate"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="santaPrivate">Приватная</label>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($santa->id)Изменить@elseДобавить@endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header"> @if ($news->id)--}}
{{--                            Изменить новость--}}
{{--                        @else--}}
{{--                            Добавить новость--}}
{{--                        @endif</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            @if($news->id) @method('PUT') @endif--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="newsTitle">Заголовок новости</label>--}}
{{--                                @if ($errors->has('title'))--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                        @foreach($errors->get('title') as $error)--}}
{{--                                            {{ $error }}--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <input type="text" name="title" id="newsTitle" class="form-control"--}}
{{--                                       value="{{ $news->title ?? old('title') }}">--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="newsCategory">Категория новости</label>--}}
{{--                                @if ($errors->has('category_id'))--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                        @foreach ($errors->get('category_id') as $error)--}}
{{--                                            {{ $error }}--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <select name="category_id" id="newsCategory" class="form-control">--}}
{{--                                    @forelse($categories as $item)--}}
{{--                                        <option @if ($item['id'] == old('category_id')) selected--}}
{{--                                                @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>--}}
{{--                                    @empty--}}
{{--                                        <option value="0" selected>Нет категории</option>--}}
{{--                                    @endforelse--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="newsText">Текст новости</label>--}}
{{--                                @if ($errors->has('text'))--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                        @foreach ($errors->get('text') as $error)--}}
{{--                                            {{ $error }}--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <textarea id="editor" name="text" id="newsText"--}}
{{--                                          class="form-control">{{empty(old())? $news->text : old('text') }}--}}
{{--                                </textarea>--}}
{{--                            </div>--}}
{{--                            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>--}}
{{--                            <script>--}}
{{--                                CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});--}}
{{--                            </script>--}}
{{--                            <div class="form-check">--}}
{{--                                @if ($errors->has('is_Private'))--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                        @foreach ($errors->get('is_Private') as $error)--}}
{{--                                            {{ $error }}--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked--}}
{{--                                       @endif id="newsPrivate" name="isPrivate"--}}
{{--                                       type="checkbox" value="1" class="form-check-input">--}}
{{--                                <label for="newsPrivate">Приватная</label>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <input type="submit" class="btn btn-outline-primary"--}}
{{--                                       value="@if ($news->id)Изменить@elseДобавить@endif">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}



