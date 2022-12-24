<li class="nav-item">
    <a class="nav-link{{request()->routeIs('home')? 'active':""}}" href="{{route('home')}}">Главная</a>
</li>

<li class="nav-item">
    <a class="nav-link{{request()->routeIs('santa.index')? 'active':""}}" href="{{route('santa.index')}}">Santa Box</a>
</li>
<li class="nav-item">
    <a class="nav-link{{request()->routeIs('santa.create')? 'active':""}}" href="{{route('santa.create')}}">Santa Create Box</a>
</li>
