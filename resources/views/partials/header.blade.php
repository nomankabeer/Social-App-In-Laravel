<div id="intro">
    <img class="profile_image200" src="{{asset('/images').'/'.Auth::user()->avatar}}" />
    <h1>{{Auth::user()->name}}</h1>
       <a href="{{route('add.post')}}"> <button class="btnpadding30 btn btn-info">Add Post</button></a>
    <br>
    <ul class="flex-menu listylenone">
        <li><strong>{{Auth::user()->countPosts(Auth::user()->id)}}</strong> posts</li>
        <li><strong>{{Auth::user()->getUserFollowers(Auth::user()->id)}}</strong> followers</li>
        <li><strong>{{Auth::user()->getUserFollowing(Auth::user()->id)}}</strong> following</li>
    </ul>
    <ul class="actions">
        <li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
    </ul>
</div>
<header id="header">
    <a href="{{route('profile')}}" class="logo">{{Auth::user()->name}}</a>
</header>




