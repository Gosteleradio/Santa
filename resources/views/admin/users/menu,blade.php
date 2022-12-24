
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('home')? 'active':""}}" href="{{route('home')}}">Главная</a>
</li>


@guest
@else

@if(\Illuminate\Support\Facades\Auth::user()->is_admin)
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('admin.news.create')? 'active':""}}" href="{{route('admin.news.create')}}">Создать новость</a>
</li>

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('admin.news,index')? 'active':""}}" href="{{route('admin.news.index')}}">Редактировать новость</a>
</li>
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('admin.categories.create')? 'active':""}}" href="{{route('admin.categories.create')}}">Создать категорию</a>
</li>

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('admin.categories.index')? 'active':""}}" href="{{route('admin.categories.index')}}">Редактировать категорию</a>
</li>
@endif

@endguest
