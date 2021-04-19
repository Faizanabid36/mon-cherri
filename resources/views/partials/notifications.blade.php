
<ul class="notification-list">
    @foreach(Auth::user()->unreadNotifications as $notification)
    <li class="notification-message" style="font-size: bold">
        <a href="{!! $notification->data['target'] !!}">  
            <div class="media">
                <span class="avatar avatar-sm">
                    <img class="avatar-img rounded-circle" alt="User Image" src="{{url('images/user/avatar.png')}}">
                </span>
                <div class="media-body">
                    <p class="noti-details">
                        <span class="noti-title">{{ $notification->data['from'] }}</span>
                        {{ $notification->data['notification_msg'] }}
                    </p>
                    <p class="noti-time"><span class="notification-time">{{$notification->created_at}}</span></p>
                </div>
            </div>
        </a>
    </li> 
    @endforeach
    @foreach(Auth::user()->readNotifications as $notification)
    <li class="notification-message">
        <a href="{!! $notification->data['target'] !!}">  
            <div class="media">
                <span class="avatar avatar-sm">
                    <img class="avatar-img rounded-circle" alt="User Image" src="{{url('images/user/avatar.png')}}">
                </span>
                <div class="media-body">
                    <p class="noti-details">
                        <span class="noti-title">{{ $notification->data['from'] }}</span>
                        {{ $notification->data['notification_msg'] }}
                    </p>
                    <p class="noti-time"><span class="notification-time">{{$notification->created_at}}</span></p>
                </div>
            </div>
        </a>
    </li> 
    @endforeach
</ul>