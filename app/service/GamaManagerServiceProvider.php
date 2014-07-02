<?php
namespace App\Service;

use Illuminate\Support\ServiceProvider;

class GameManagerServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('GameManager', function(){
            return new GameManagerService;
        });
    }

}