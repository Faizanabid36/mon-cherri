<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <link href="{{asset('favicon.png')}}" rel="icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::check() ? Auth::user()->id : ''}}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- App/Dashboard Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/a_style.css') }}">
    <!-- icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('css/feathericon.min.css') }}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatable.buttons.css') }}">
    <!-- Image Upload CSS  -->
    <link href="{{ asset('css/image-uploader.css') }}" rel="stylesheet">
    <!-- Noty CSS -->
    <link href="{{ asset('css/noty.min.css') }}" rel="stylesheet">
    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
    <!-- Summernote CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
</head>
<body>
<div class="main-wrapper" id="app">
    
        <!-- Header -->
    <div class="header">
        <!-- Logo -->
        <div class="header-left">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('images/logo.jpg')}}" alt="Logo">
            </a>
            <a href="{{url('/')}}" class="logo logo-small">
                <img src="{{asset('images/logo.jpg')}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->
        
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>
        
        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars" style="color: #000;"></i>
        </a>
        <!-- /Mobile Menu Toggle -->
        
        <!-- Header Right Menu -->
        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" id="show_notification">
                    <i class="fe fe-bell" style="color: #000;"></i> 
                    <span id="unread_count"></span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">All Notifications</span>
                    </div>
                    <div class="noti-content" id="notification">
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="javascript:void(0)">Notifications</a>
                    </div>
                </div>
            </li>
            
            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="{{url('images/user',Auth::user()->avatar)}}" width="31" alt="Profile"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{url('images/user',Auth::user()->avatar)}}" alt="{{Auth::user()->name}}" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ucwords(Auth::user()->name)}} {{ucwords(Auth::user()->lastname)}}</h6>
                            <p class="text-muted mb-0">
                                @foreach(Auth::user()->roles as $user_role)
                                {{$user_role->name}}
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{route('users.show',Auth::user()->id)}}">Profile</a>
                    <a class="dropdown-item" href="{{url('settings')}}">Account Settings</a>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /User Menu -->
            
        </ul>
        <!-- /Header Right Menu -->
        
    </div>
        <!-- /Header -->
        
        <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"> 
                        <span>Main</span>
                    </li>
                    @permission('view.dashboard')
                    <li> 
                        <a href="{{url('/dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    @endpermission
                    @permission('view.products')
                    <li> 
                        <a href="{{route('products.index')}}"><i class="fe fe-tiled"></i> <span>Products</span></a>
                    </li>
                    @endpermission
                    @permission('view.orders')
                    <li>
                        <?php 
                            $orders_count = App\Invoice::where('status','!=',1)->count();
                        ?>
                        <a href="{{route('orders.index')}}"><i class="fe fe-cart"></i> <span> Orders</span>
                            @if($orders_count > 0)
                            <span class="badge badge-danger">{{$orders_count}}</span>
                            @endif
                        </a>
                    </li>
                    @endpermission
                    @permission('view.customers')
                    <li>
                        <a href="{{route('customers.index')}}"><i class="fe fe-users"></i> <span>Customers</span></a>
                    </li>
                    @endpermission
                    @permission('view.posts')
                    <li>
                        <a href="{{route('posts.index')}}"><i class="fe fe-file"></i> <span>Posts</span></a>
                    </li>
                    @endpermission
                    @permission('view.reviews')
                     <li>
                        <?php 
                            $reviews_count = App\Review::where('is_viewed','!=',1)->count();
                        ?>
                        <a href="{{route('reviews.index')}}"><i class="fe fe-document"></i> <span>Reviews</span>
                        @if($reviews_count > 0)
                            <span class="badge badge-danger">{{$reviews_count}}</span>
                        @endif
                        </a>
                    </li>
                    @endpermission
                    @permission('view.comments')
                     <li>
                        <?php 
                            $comments_count = App\Comment::where('status','!=',1)->count();
                        ?>
                        <a href="{{route('comments.index')}}"><i class="fe fe-comments"></i> <span>Comments</span>
                        @if($comments_count > 0)
                            <span class="badge badge-danger">{{$comments_count}}</span>
                        @endif
                        </a>
                    </li>
                    @endpermission
                    @permission('view.messages')
                    <li>
                        <?php 
                        $messages_count = App\Contact::where('status','!=',1)->count();
                        ?>
                        <a href="{{route('messages.index')}}"><i class="fe fe-messanger"></i> <span>Messages</span>
                            @if($messages_count > 0)
                            <span class="badge badge-danger">{{$messages_count}}</span>
                            @endif
                        </a>
                    </li>
                    @endpermission
                    <li class="menu-title"> 
                        <span>Settings</span>
                    </li>
                    @permission('view.categories')
                     <li class="submenu">
                        <a href="#"><i class="fe fe-align-left"></i> <span> Categories</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route('categories.index')}}">Main Categories</a></li>
                            <li><a href="{{route('subcategories.index')}}">Sub Categories</a></li>
                        </ul>
                    </li>
                    @endpermission
                    @permission('view.brands')
                     <li> 
                        <a href="{{route('brands.index')}}"><i class="fe fe-tag"></i> <span>Brands</span></a>
                    </li>
                    @endpermission
                    @permission('view.sizes')
                     <li> 
                        <a href="{{route('sizes.index')}}"><i class="fe fe-bar-chart"></i> <span>Sizes</span></a>
                    </li>
                    @endpermission
                    @permission('view.colors')
                     <li> 
                        <a href="{{route('colors.index')}}"><i class="fe fe-target"></i> <span>Colors</span></a>
                    </li>
                    @endpermission
                    @permission('view.users')
                    <li> 
                        <a href="{{route('users.index')}}"><i class="fe fe-users"></i> <span>Users</span></a>
                    </li>
                    @endpermission
                    @role('admin')
                    <li> 
                        <a href="{{route('laravelroles::roles.index')}}"><i class="fe fe-share"></i> <span>Roles</span></a>
                    </li>
                    @endrole
                    @permission('view.countries')
                    <li> 
                        <a href="{{route('countries.index')}}"><i class="fe fe-globe"></i> <span>Countries</span></a>
                    </li>
                    @endpermission
                    @permission('view.states')
                    <li> 
                        <a href="{{route('states.index')}}"><i class="fe fe-map"></i> <span>States</span></a>
                    </li>
                    @endpermission
                    @permission('view.cities')
                    <li> 
                        <a href="{{route('cities.index')}}"><i class="fe fe-location"></i> <span>Cities</span></a>
                    </li>
                    @endpermission
                    @permission('view.currencies')
                    <li> 
                        <a href="{{route('currencies.index')}}"><i class="fe fe-hash"></i> <span>Currencies</span></a>
                    </li>
                    @endpermission
                    @role(['admin','editor','translator'])
                    <li> 
                        <a href="{{url('/languages')}}"><i class="fe fe-flag"></i> <span>Translation</span></a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
        <!-- /Sidebar -->
    <div class="page-wrapper">
        @yield('content')
    </div>
</div>
<!-- Jquery Js -->
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<!-- select2 -->
<script src="{{asset('js/select2.js')}}"></script>

        
<!-- Bootstrap Core JS -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        
<!-- Slimscroll JS -->
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Datatables JS -->
<script type="text/javascript" src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/datatable.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/jszip.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake.font.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/buttons.html5.js')}}"></script>

<!-- Summernote JS -->
<script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>

<!-- Dashboard js -->
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

<!-- Image Upload js -->
<script type="text/javascript" src="{{asset('js/image-uploader.js')}}"></script>

<!-- Print Js -->
<script type="text/javascript" src="{{asset('js/jQuery.print.min.js')}}"></script>

<!-- noty js -->
<script src="{{asset('js/noty.min.js')}}"></script>

<script type="text/javascript">
   $(document).ready(function () {
        $(document).on('click','.bs_delete',function(){
            var route = $(this).attr('data-route');
            $('#bs_delete_form').attr('action',route);
            $('.bs_delete_modal').modal('show');
        })
        $(document).on('click','.bs_edit',function(){
            var route = $(this).attr('data-route');
            var id = $(this).attr('data-id');
            $.ajax({
                url:route,
                method:'GET',
                success:function(data){
                    $("#edit_data").html(data.html);
                    $(".bs_edit_modal").modal('show');
                }
            });
        });
        $(document).on('input','.product_prices',function(){
            var current_price = parseInt($('#price').val());
            var old_price     = parseInt($('#old_price').val());
            var off_price     = ((current_price/old_price) * 100).toFixed(0);
            if(!isNaN(current_price) && !isNaN(old_price)){
                $("#percent_off").val(off_price);
            }
        });
        $(document).on('change','#checkAll',function(){
            if($(this).is(':checked',true))
            {
                $(".bs_dtrow_checkbox").prop('checked', true);
            } else {
                $(".bs_dtrow_checkbox").prop('checked',false);
            }       
        });
        $(document).on('click','#show_notification',function(){
            $.ajax({
                url:'<?=route("notifications")?>',
                method:'GET',
                success:function(data){
                    $("#notification").empty();
                    $("#notification").html(data.html);
                }
            });
        });

        function unread_notification_count(){
           $.ajax({
                url:'<?=route("notifications.Unreadcount")?>',
                method:'GET',
                success:function(data){
                    if (data > 0) {
                        $("#unread_count").html('<i class="badge badge-pill"> ' + data + '</i>');
                    }
                }
            });
        }
        unread_notification_count();
        setInterval(function(){
            unread_notification_count();
        },30000);
    });
</script>
@yield('javascript')
@include('partials.success')
@include('partials.error')
</body>
</html>
