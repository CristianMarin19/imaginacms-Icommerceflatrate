<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icommerceflatrate'], function (Router $router) {
    $router->bind('configflatrate', function ($id) {
        return app('Modules\IcommerceFlatrate\Repositories\ConfigflatrateRepository')->find($id);
    });
   
    $router->post('configflatrates', [
        'as' => 'admin.icommerceflatrate.configflatrate.store',
        'uses' => 'ConfigflatrateController@store',
        'middleware' => 'can:icommerceflatrate.configflatrates.create'
    ]);
   
    $router->put('configflatrates', [
        'as' => 'admin.icommerceflatrate.configflatrate.update',
        'uses' => 'ConfigflatrateController@update',
        'middleware' => 'can:icommerceflatrate.configflatrates.edit'
    ]);
   
});
