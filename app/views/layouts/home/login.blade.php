@extends('layouts.master')

@section('content')
  <script type="text/javascript">
    document.getElementById('nav-login').setAttribute('class', 'active');
  </script>

  <style type="text/css">
  .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin .checkbox {
    font-weight: normal;
  }
  .form-signin .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  </style>

  <div class="loginbox">
    {{ Form::open(array('url' => '/login', 'method' => 'POST', 'class' => 'form-signin', 'role' => 'form')) }}
      <h2 class="form-signin-heading">登录Diplomacy</h2>
      {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => '邮箱', 'required' => 'required', 'autofocus' => 'autofocus')) }}
      {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '密码', 'required' => 'required')) }}
      <label class="checkbox">
        {{ Form::checkbox('remember-me', null, 1) }} 记住登录
      </label>
      {{ Form::button('登录', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
    {{ Form::close() }}
  </div>
@stop