<?php

class GameUser extends Eloquent {

    protected $table = 'game_user';

    public function game()
    {
        return $this->belongsTo('Game', 'game_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

}
