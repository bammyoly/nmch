<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NiMechE</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/plugins/css/plugins.css')}}">   
    
    <!-- Custom style -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/responsiveness.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/dropzone.css') }}" rel="stylesheet">
    <link id="jssDefault" rel="stylesheet" href="{{asset('public/css/skins/default.css')}}">
    <script src="{{ asset('public/js/dropzone.js') }}" defer></script>
    <script src="{{ asset('public/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true, iconsPath : '{{ asset("public/js/nicEditorIcons.gif") }}'}).panelInstance('area2');
    });
    </script>

    
    </head>
    
    <body>
        <nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
            <div class="container">
            
                <!-- Start Logo Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('public/images/logo.png')}}" class="logo logo-display" alt="">
                        <img src="{{asset('public/images/logo.png')}}" class="logo logo-scrolled" alt="">
                    </a>

                </div>
                <!-- End Logo Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                
                    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('excos')}}">Excos</a>
                        </li>
                        <li>
                            <a href="{{route('mentorship')}}">Mentorship</a>
                        </li>
                        <li>
                            <a href="{{route('elibrary')}}">E-Library</a>
                        </li>
                        <li>
                            <a href="{{route('blog')}}">Blog</a>
                        </li>
                        <li>
                            <a href="{{route('gallery')}}">Gallery</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li class="br-right"><a href="{{route('login')}}"><i class="login-icon ti-user"></i>Login</a></li>
                        <li class="sign-up"><a class="btn-signup red-btn" href="tour-grid-sidebar.html"><span class="ti-briefcase"></span>Create Account</a></li> 
                        @else
                        <li class="dropdown dash-link"><a href="#" class="dropdown-toggle"><img src="{{ asset('public/uploads/avatar/' .Auth::user()->avatar)}}" class="img-responsive avatar" alt="" />{{Auth::user()->name}}</a> 
                            <ul class="dropdown-menu left-nav">
                                <li><a href="{{url('home')}}">Dashboard</a></li>
                                @if(Auth::user()->is_admin())
                                <li><a href="{{route('adminpanel')}}">Admin Panel</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                        
                </div>
                <!-- /.navbar-collapse -->
            </div>  
        </nav>

        <section class="dashboard gray-bg padd-0 mrg-top-50">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-2 col-md-2 col-sm-3 dashboard-bg">
                        <!-- /. NAV TOP  -->
                        <nav class="navbar navbar-side">
                            <!-- Start Logo Header Navigation -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-menu">
                                    <i class="fa fa-bars"></i>
                                </button>

                            </div>
                            <div class="collapse sidebar-collapse" id="dashboard-menu">
                                <div class="profile-wrapper">
                                    <div class="profile-wrapper-thumb">
                                        <img src="{{ asset('public/uploads/avatar/' .Auth::user()->avatar)}}" class="img-responsive img-circle" alt="" />
                                        <span class="dashboard-user-status bg-success"></span>
                                    </div>
                                    <h4 class="text-capitalize">{{Auth::user()->name}}</h4>
                                </div>
                                <ul class="nav" id="main-menu">
                                    
                                    <li class="active">
                                        <a href="{{url('home')}}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
                                    </li>
                                                                        
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-email" aria-hidden="true"></i>Messages<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            
                                            <li>
                                                <a href="{{route('inbox', Auth::user()->slug)}}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Inbox</a>
                                            </li>
                                            <li>
                                                <a href="{{route('outbox', Auth::user()->slug)}}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Sent Messages</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Blog Posts<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            
                                            <li>
                                                <a href="{{route('blog.manage')}}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Manage Posts</a>
                                            </li>
                                            <li>
                                                <a href="{{route('blog.add')}}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>New Blog Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @if(Auth::user()->is_admin())
                                    <li>
                                        <a href="{{route('adminpanel')}}"><i class="ti-panel" aria-hidden="true"></i>Admin Panel</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('settings', Auth::user()->slug)}}"><i class="fa fa-cog" aria-hidden="true"></i>Settings </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{route('profile', Auth::user()->slug)}}"><i class="ti-user" aria-hidden="true"></i>My Profile</a>
                                    </li>
                                    
                                    <li class="log-off">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- /. NAV SIDE  -->
                    </div>
                </div>
            </div>
        </section>


        @yield('content')

        @include('includes.footer')
        
         
        <!-- =================== START JAVASCRIPT ================== -->
        <script src="{{asset('public/plugins/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/viewportchecker.js')}}"></script>
        <script src="{{asset('public/plugins/js/bootsnav.js')}}"></script>
        <script src="{{asset('public/plugins/js/slick.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/jquery.downCount.js')}}"></script>
        <script src="{{asset('public/plugins/js/freshslider.1.0.0.js')}}"></script>
        <script src="{{asset('public/plugins/js/moment.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/daterangepicker.js')}}"></script>
        <script src="{{asset('public/plugins/js/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('public/plugins/js/bootstrap-wysihtml5.js')}}"></script>
        
        <!-- Dashboard Js -->
        <script src="{{asset('public/plugins/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('public/plugins/js/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('public/plugins/js/jquery.easing.min.js')}}"></script>
 
        <!-- Custom Js -->
        <script src="{{asset('public/js/custom.js')}}"></script>
        
        <script>
            $(function() {

              $('input[name="book-date"]').daterangepicker({
                  autoUpdateInput: false,
                  locale: {
                      cancelLabel: 'Clear'
                  }
              });

              $('input[name="book-date"]').on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
              });

              $('input[name="book-date"]').on('cancel.daterangepicker', function(ev, picker) {
                  $(this).val('');
              });

            });
        </script>
        
        <script src="assets/js/jQuery.style.switcher.js"></script>
        <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }
            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#styleOptions').styleSwitcher();
            });
        </script>
    
    </body>
</html>