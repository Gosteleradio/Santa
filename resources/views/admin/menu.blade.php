

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('home')? 'active':""}}" href="{{route('home')}}">Главная</a>
</li>

@guest

    @else
        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)


            <li class="nav-item">
                <a class="nav-link{{request()->routeIs('admin.index')? 'active':""}}" href="{{route('admin.index')}}">Админка</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{request()->routeIs('admin.updateUsers')? 'active':""}}" href="{{route('admin.updateUsers')}}">Пользователи</a>
            </li>


        @endif

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('updateProfile')? 'active':""}}"  href="{{route('updateProfile')}}">Профиль</a>
</li>

@endguest

