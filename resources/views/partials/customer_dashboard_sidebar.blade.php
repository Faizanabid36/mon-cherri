<!-- Nav tabs -->
<ul class="nav flex-column dashboard-list" role="tablist">
    <li><a class="nav-link {{ (request()->is('my-account/dashboard')) ? 'active' : '' }}" href="{{url('/my-account/dashboard')}}">{{__('Dashboard')}}</a></li>
    <li><a class="nav-link {{ (request()->is('my-account/orders')) ? 'active' : '' }}"  href="{{url('/my-account/orders')}}">{{__('Orders')}}</a></li>
    <li><a class="nav-link {{ (request()->is('my-account/wishlist')) ? 'active' : '' }}"		href="{{url('my-account/wishlist')}}">{{__('Wishlist')}}</a></li>
    <li><a class="nav-link {{ (request()->is('compare')) ? 'active' : '' }}"		href="{{url('compare')}}">{{__('Compare List')}}</a></li>
    <li><a class="nav-link {{ (request()->is('my-account/settings')) ? 'active' : '' }}"  href="{{url('my-account/settings')}}">{{__('Settings')}}</a></li>
    <li><a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </li>
</ul>
<!-- End Nav tabs -->
