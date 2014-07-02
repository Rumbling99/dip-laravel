<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplomacy cn</title>

    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Diplomacy cn</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="nav-index"><a href="/">首页</a></li>
            <li id="nav-game"><a href="/game">游戏</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::user())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <!-- <a href="#">修改资料</a></li>
                  <li class="divider"></li> -->
                  <li id="nav-logout"><a href="/logout">退出</a></li>
                </ul>
              </li>
            @else
              <li id="nav-login"><a href="/login">登录</a></li>
              <li id="nav-join"><a href="/join">注册</a></li>
            @endif
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
