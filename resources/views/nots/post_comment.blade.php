<div class="ground ground-single-list">
    <a href="#">
        <img class="ground-avatar" src="{{asset('public/uploads/avatar/' .$notification->data['user']['avatar'])}}" alt="...">
        <span class="profile-status bg-online pull-right"></span>
    </a>

    <div class="ground-content">
        <h6 class="text-capitalize"><a target="_blank" href="{{route('blog.show', $notification->data['comment']['blog']['slug'])}}">{{$notification->data['user']['name']}} commented on your post</a></h6>
    </div>

    <div class="ground-right">
        <a target="_blank" href="{{route('blog.show', $notification->data['comment']['blog']['slug'])}}"><span class="small">View</span></a>
    </div>
</div>

