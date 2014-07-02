<?php

class Game extends Eloquent {

	protected $table = 'game';

	public function creator()
    {
        return $this->belongsTo('User', 'creator_id');
    }

    public function gameUser()
    {
        return $this->hasMany('GameUser', 'game_id');
    }

}
