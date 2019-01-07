<a href="{{route('user.followings',$user)}}">
    <strong id="following" class="stat">
        {{ count($user->followings) }}
    </strong>
    关注
</a>
<a href="{{route('user.followers',$user)}}">
    <strong id="followers" class="stat">
        {{ count($user->followers) }}
    </strong>
    粉丝
</a>
<a href="#">
    <strong id="statuses" class="stat">
        {{ $user->articles()->count() }}
    </strong>
    微博
</a>