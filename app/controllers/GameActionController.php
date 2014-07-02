<?php

class GameActionController extends BaseController {

    public function postJoinGame()
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::to('/login');
        }
        $game = Game::find(Input::get('gameId'));
        if (!$game) {
            return '游戏不存在';
        }
        // TODO: check if game is full
        GameManager::joinGame($game, $user);
        
        return Redirect::to('/game/' . $game->id);
    }

    public function postLeaveGame()
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::to('/login');
        }
        $game = Game::find(Input::get('gameId'));
        if (!$game) {
            return '游戏不存在';
        }

        // TODO: check if user is creator
        GameManager::leaveGame($game, $user);
        return Redirect::to('/game/' . $game->id);
    }

}
