<div class="row m-b-r m-t-3">
    <div class="col-md-2 offset-md-1">
        <img src="{{asset('images').'/'.$user->avatar}}" alt="" class="profile-photo img-circle iemg-fluid">
    </div>
    <div class="col-md-9 p-t-2 text-center">
        <h2 class="h2-responsive">{{ '@'.$user->name }}  <button type="button" onclick='followUSer("{{$user->id}}")' class=" {{$user->id}}_follow_button followButton btn btn-info-outline waves-effect"> @if($user->amIfollowingthisuser($user->id)) Following @else Follow @endif</button></h2>
        <h4 class="h2-responsive"> {{ $user->name }} @if($user->isUserFollowMe($user->id)) <small class="smallfontsize badge badge-info text-white">follows you</small> @endif </h4>
        <ul class="flex-menu listylenone">
            <li><strong>{{$user->countPosts($user->id)}}</strong> posts</li>
            <li><strong>{{$user->getUserFollowers($user->id)}}</strong> followers</li>
            <li><strong>{{$user->getUserFollowing($user->id)}}</strong> following</li>
        </ul>
    </div>
</div>

