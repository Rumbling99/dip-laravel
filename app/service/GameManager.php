<?php 
namespace App\Service;

use \Game;
use \GameUser;

class GameManagerService {

    /**
     * @string $gameName   name of the game
     * @object $user       creator
     */
    public function createGame($gameName, $user){
        $game = new Game;
        $game->name = $gameName;
        $game->creator_id = $user->id;
        $game->player_count = 1;
        $game->save();

        // let the creator join game
        $gameUser = new GameUser;
        $gameUser->game_id = $game->id;
        $gameUser->user_id = $user->id;
        $gameUser->save();
    }

    public function joinGame($game, $user){
        $gameUser = new GameUser;
        $gameUser->game_id = $game->id;
        $gameUser->user_id = $user->id;
        $gameUser->save();
        $game->player_count = $game->player_count + 1;
        $game->save();
    }

    public function leaveGame($game, $user){
        $gameUser = GameUser::where('game_id', '=', $game->id)
            ->where('user_id', '=', $user->id)
            ->firstOrFail();
        $gameUser->delete();
        $game->player_count = $game->player_count - 1;
        $game->save();
    }
}