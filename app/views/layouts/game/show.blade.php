@extends('layouts.master')

@section('content')
  <h2>游戏信息：</h2>
  <table class="table">
    <tr>
      <td style="width:50%;">游戏名称：</td><td><?php echo $game->name ?></td>
    </tr>
    <tr>
      <td>游戏状态：</td><td><?php echo $game->status ?></td>
    </tr>
    <tr>
      <td>当前玩家人数：</td><td><?php echo $game->player_count ?></td>
    </tr>
    <tr>
      <td>加入游戏：</td>
      <td>
        <?php if (isset($game['joined']) && $game['joined'] == true) { ?>
          <form action="/game-action/leave-game" method="POST">
            <input name="gameId" value="<?php echo $game->id ?>" type="hidden">
            <button class="btn btn-primary btn-xs" disabled="disabled">已加入</button>
            <button type="submit" class="btn btn-primary btn-xs">退出游戏</button>
          </form>
        <?php } else { ?>
          <form action="/game-action/join-game" method="POST">
            <input name="gameId" value="<?php echo $game->id ?>" type="hidden">
            <button type="submit" class="btn btn-primary btn-xs">加入本游戏</button>
          </form>
        <?php } ?>
      </td>
    </tr>
  </table>
  <p><a href="/game">返回游戏列表</a></p>
    
      
  <h2>玩家：</h2>
  <table class="table table-bordered table-striped">
      <tr>
          <th style="width:50%;">玩家名</th><th>国家</th>
      </tr>
      <?php foreach ($players as $player) { ?>
      <tr>
          <td><?php echo $player->name ?></td><td><?php echo $player->play_as ?></td>
      </tr>
      <?php } ?>
  </table>

  <script src="/assets/js/game/show.js"></script>
@stop