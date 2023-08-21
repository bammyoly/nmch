<div class="ground ground-single-list">
    <a href="#">
        <img class="ground-avatar" src="{{asset('public/uploads/avatar/' .$notification->data['user']['avatar'])}}" alt="...">
        <span class="profile-status bg-online pull-right"></span>
    </a>

    <div class="ground-content">
        <h6><a href="{{route('inbox', Auth::user()->slug)}}">You Received a Reply From {{$notification->data['user']['name']}}</a></h6>
    </div>

    <div class="ground-right">
        <span class="small">View</span>
    </div>
</div>

