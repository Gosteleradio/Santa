

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('home')? 'active':""}}" href="{{route('home')}}">Main</a>
</li>

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('santa.index')? 'active':""}}" href="{{route('santa.index')}}">Santa Box</a>
</li>
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('santa.create')? 'active':""}}" href="{{route('santa.create')}}">Santa Create Box</a>
</li>
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('users.index')? 'active':""}}" href="{{route('users.index')}}">Users</a>
</li>


@guest
@else
    @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('admin.index')? 'active':""}}" href="{{route('admin.index')}}">Админка</a>
</li>

    @endif
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('updateProfile')? 'active':""}}"  href="{{route('updateProfile')}}">Профиль</a>
</li>
@endguest
