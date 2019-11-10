<nav id="nav">
    <ul class="links">
        <li class="@if(@$page == 'post')  active @endif" ><a href="/index">All Post</a></li>
        <li class="@if(@$page == 'add_post')  active @endif"><a href="{{route('add.post')}}">Add Post</a></li>
       {{-- <li><a href="{{url('gen')}}">Generic Page</a></li>
        <li><a href="{{url('ele')}}">Elements Reference</a></li>--}}
        <li class="@if(@$page == 'profile')  active @endif"><a href="{{url('profile')}}">Profile</a></li>
        <li class="@if(@$page == 'all_users')  active @endif"><a href="{{url('all/users')}}">All Users</a></li>
        <li ><a href="{{route('logout')}}">Logout</a></li>
    </ul>
 {{--   <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
    </ul>--}}
</nav>