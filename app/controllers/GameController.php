<?php

class GameController extends BaseController {

    public function index()
    {
        $games = Game::all();
        $user = Auth::user();

        if ($user) {
            // don't use ORM to get better performance
            $gameUsers = DB::select(
                'select game_user.game_id from game_user 
                    left join game 
                    on game_user.game_id = game.id 
                where game_user.user_id = ?', 
                array($user->id)
            );
            foreach ($games as &$game) {
                $game->joined = false;
                foreach ($gameUsers as $gameUser) {
                    if ($gameUser->game_id == $game->id) {
                        $game->joined = true;
                        break;
                    }
                }
            }
        }

        return View::make('layouts.game.index', array('games' => $games));
    }

    public function create()
    {
        return View::make('layouts.game.create');
    }

    public function store()
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::to('/login');
        }

        // TODO: add max limit per user
        $gameName = Input::get('name');
        GameManager::createGame($gameName, $user);
        return Redirect::to('/game');
    }

    public function show($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return '游戏不存在';
        }

        // don't use ORM to get better performance
        $players = DB::select(
            'select user.*, game_user.play_as from user 
                join game_user 
                on game_user.user_id = user.id 
            where game_user.game_id = ?', 
            array($id)
        );

        $game->joined = false;
        $user = Auth::user();
        if ($user) {
            foreach ($players as $player) {
                if ($player->id == $user->id) {
                    $game->joined = true;
                    break;
                }
            }
        }

        return View::make(
            'layouts.game.show', 
            array(
                'game' => $game, 
                'players' => $players
            )
        );
    }

}
