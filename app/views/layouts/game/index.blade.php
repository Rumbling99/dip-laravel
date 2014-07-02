@extends('layouts.master')

@section('content')
  <script type="text/javascript">
    document.getElementById('nav-game').setAttribute('class', 'active');
  </script>

  <style type="text/css">
      /*.starter-template {
      padding: 40px 15px;
      text-align: center;
      }*/
  </style>

  <h2>所有游戏：</h2>
    <?php if (count($games) > 0) { ?>
      <table class="table table-bordered table-striped table-responsive">
        <tr>
            <th style="width:10%;">游戏编号</th>
            <th style="width:25%;">游戏名称</th>
            <th style="width:20%;">创建者</th>
            <th style="width:15%;">状态</th>
            <th style="width:10%;">人数</th>
            <th style="width:10%;">参加</th>
        </tr>
      <?php foreach ($games as $game) { ?>
        <tr>
            <td><?php echo $game->id ?></td>
            <td><a href="/game/<?php echo $game->id ?>"><?php echo $game->name ?></a></td>
            <td><?php echo $game->creator->name ?></td>
            <td><?php echo $game->status ?></td>
            <td><?php echo $game->player_count ?>/<?php echo $game->max_player_count ?></td>
            <td><?php if (isset($game['joined']) && $game['joined'] == 1) { ?>
                  已加入
                <?php } else { ?>
                  未加入
                <?php } ?>
            </td>
        </tr>
      <?php } ?>
    </table>
    <?php } else { ?>
    <p>没有游戏</p>
    <?php } ?>
      <p><a class="btn btn-primary" href="/game/create">创建新游戏</a></p>
    </div>

  <script type="text/javascript">
    $(document).ready(function(){
        $(".btn-joinnnn").click(function(e){
            //console.log(e);
            $.ajax({
                url: '/gamePlayer',
                type: 'POST',
                async: false,
                data: {
                    game_id: e.currentTarget.value,
                    join: 1,
                },
                success: function(data){
                    var data = JSON.parse(data);
                    if (data.err_msg) {
                        alert(data.err_msg);
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
@stop