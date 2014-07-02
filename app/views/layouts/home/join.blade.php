@extends('layouts.master')

@section('content')
  <script type="text/javascript">
    document.getElementById('nav-join').setAttribute('class', 'active');
  </script>

  <style type="text/css">
    .form-join {
      max-width: 600px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-join-heading {
      text-align: center;
    }
  </style>

  <div class="form-join">
    {{ Form::open(array('url' => '/join', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')); }}
      <div class="form-group">
        <h2 class="form-join-heading">加入Diplomacy</h2>
      </div>
      <div class="form-group">
        {{ Form::label('email', '邮箱', array('class' => 'col-sm-4 control-label')); }}
        <div class="col-sm-5">
          {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => '登录使用的邮箱', 'required' => 'required')); }}
        </div>
      </div>
      <div class="form-group">
        {{ Form::label('name', '用户名', array('class' => 'col-sm-4 control-label')); }}
        <div class="col-sm-5">
          {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => '游戏中的名字', 'required' => 'required', 'autofocus' => 'autofocus')); }}
        </div>
      </div>
      <div class="form-group">
        {{ Form::label('password', '密码', array('class' => 'col-sm-4 control-label')); }}
        <div class="col-sm-5">
          {{ Form::text('password', null, array('class' => 'form-control', 'placeholder' => '密码', 'required' => 'required')); }}
        </div>
      </div>
      <div class="form-group">
        {{ Form::label('password2', '确认密码', array('class' => 'col-sm-4 control-label')); }}
        <div class="col-sm-5">
          {{ Form::text('password2', null, array('class' => 'form-control', 'placeholder' => '确认密码', 'required' => 'required')); }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
          {{ Form::button('注册', array('type' => 'submit', 'class' => 'btn btn-primary btn-block') ); }}
        </div>
      </div>
    {{ Form::close() }}
  </div>
@stop