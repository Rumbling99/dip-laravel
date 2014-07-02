@extends('layouts.master')

@section('content')
  @if (Auth::user())
  {{ Form::open(array('url' => '/game', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')); }}
    <div class="form-group">
      <h2 class="col-sm-offset-2 col-sm-3">创建新游戏</h2>
    </div>
    <div class="form-group">
      {{ Form::label('name', '游戏名称：', array('class' => 'col-sm-2 control-label')); }}
      <div class="col-sm-3">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => '为这场游戏指定一个名字', 'required' => 'required', 'autofocus' => 'autofocus')); }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('password', '密码：', array('class' => 'col-sm-2 control-label')); }}
      <div class="col-sm-3">
        {{ Form::text('password', null, array('class' => 'form-control', 'placeholder' => '密码', 'disabled' => 'disabled')); }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-3">
      {{ Form::button('创建游戏', array('type' => 'submit', 'class' => 'btn btn-primary') ); }}
      </div>
    </div>
  {{ Form::close() }}
  @else
  您还没有登录，请<a href="/login?preUrl=/game/create">登录</a>
  @endif
@stop