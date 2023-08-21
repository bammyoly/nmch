<div class="ground ground-single-list">
    <a href="{{route('mentor.requests')}}">
        <img class="ground-avatar" src="{{asset('public/uploads/avatar/' .$notification->data['user']['avatar'])}}" alt="avatar">
        <span class="profile-status bg-online pull-right"></span>
    </a>

    <div class="ground-content">
        <h6><a href="{{route('mentor.requests')}}">{{$notification->data['user']['name']}} sent a request to become a mentor</a></h6>
    </div>

</div>

