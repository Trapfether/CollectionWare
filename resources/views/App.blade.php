<!DOCTYPE html>
<html lang="en">
<head>
    <!-- metaSetUp -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- /metaSetUp -->

    <title>@yield('title', 'Level Devil Sensors')</title>

    <!-- styleSheets -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/files/DevOnly/bootstrap.css')}}"> -->
    <link href="{{ asset('/files/CSS/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/CSS/main.css') }}">
    <!-- /styleSheets -->

    @yield('headScripts')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 8]>
        <script type="text/javascript">
            window.location = "http://old.leveldevil.com/";
        </script>
    <![endif]-->

    <!-- google analytics goes here -->
    <script>
    </script>
    <!-- end google analytics -->

</head>

<body>

    <!-- header -->
    <div id="header-wrapper" class="row">
        <div class="col-lg-12">
            <div id="navToggle-wrapper" aria-label="Toggle Navigation Menu">
                <a id="navToggle"><span class="fa fa-bars"title="menu" aria-hidden="true"></span></a>
            </div>
            <div id="logo-wrapper">
                <a id="logo" href="/"><span class="dark-blue">Level</span> <span class="orange">Devil</span></a>
            </div>
            <!-- right here check for the user having messages or alerts
            <div id="alert-wrapper">
                <a id="alert" href="" class="dark-blue" ><span class="glyphicon glyphicon-alert"></span></a>
            </div>
            <div id="message-wrapper">
                <a id="alert" href="" class="dark-blue" ><span class="glyphicon glyphicon-envelope"></span></a>
            </div>
            -->
                           
                @if(Auth::guest())
                <li style="list-style-type: none;" class="dropdown">
                    <a style="color: #000000"id="loginToggle" class="dropdown-toggle" href="#" data-toggle="dropdown"><div id="user-wrapper" class="dark-blue"><span id="userPic" class="fa fa-user"></span>Guest<div id="userArrow" class="fa fa-caret-down"></div></div></a>
                    <div class="dropdown-menu pull-right" style="padding: 15px; padding-bottom: 10px; min-width: 300px; margin-top:35px; margin-right:-6px;">
                        <div id="login_cont">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div class="">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                        <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <center><a href="auth/register">Create an account</a></center> 
                    </div>
                </li>  
                @else
                <li style="list-style-type: none;" class="dropdown">
                    <a style="color: #000000"id="loginToggle" class="dropdown-toggle" href="#" data-toggle="dropdown"><div id="user-wrapper" class="dark-blue"><span id="userPic" class="fa fa-user"></span>
                    @if(strpos(Auth::user()->name,' ') > 0)
                        {{ substr(Auth::user()->name,0,strpos(Auth::user()->name,' ')) }}
                    @else
                        {{ Auth::user()->name }}
                    @endif
                    <div id="userArrow" class="fa fa-caret-down"></div></div></a>
                    <div class="dropdown-menu pull-right" style="padding: 15px; padding-bottom: 0px; min-width: 150px; margin-top:35px; margin-right:-6px;">
                        <div id="login_cont">
                        <center><a href="auth/logout">Log Out</a></center> 
                        </div>
                    </div>
                </li> 
                @endif                
            
        </div>
    </div>
    <!-- /header -->

    <!-- sidebarNavigation -->
    <div id="sidebar-wrapper">
        <div class="nav-wrapper cont">
            <div class="cont">
                <a href="\" class="menuAction"><span class="fa fa-home menuGlyph"></span> Home</a>
            </div>
            <div class="cont">
                <a href="\dashboard" class="menuAction"><span class="fa fa-dashboard menuGlyph"></span> Dash Board</a>
            </div>
            <div class="cont">
                <a href = "\viewtankdata" class="menuAction"><span class="fa fa-pie-chart menuGlyph"></span> Extensive Tank Data</a>
            </div>
            <div class="cont">
                <a href = "\assignpermissionsuser" class="menuAction"><span class="fa fa-group menuGlyph"></span> Assign Permissions</a>
            </div>
        </div>
    </div>
    <!-- /sidebarNavigation -->

    <!-- content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /content -->

    <!-- footer -->
    <footer>
    </footer>
    <!-- /footer -->

    <!-- requiredJavascriptLibs -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- <script src="{{ asset('/Files/DevOnly/jquery.js') }}"></script> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- <script src="{{ asset('/Files/DevOnly/bootstrap.js') }}"></script> -->
    <script src="{{ asset('/files/JS/main.js') }}"></script>
    <!-- /requiredJavascriptLibs -->

    <!-- pageSpecificScripts -->
    @yield('footScripts')
    <!-- /pageSpecificScripts -->

    </body>
</html>
