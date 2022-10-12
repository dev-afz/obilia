<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from menu.json file
        $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);

        $userMenuJson = file_get_contents(base_path('resources/site/data/menu-data/userMenu.json'));
        $userMenuData = json_decode($userMenuJson);
        $clientMenuJson = file_get_contents(base_path('resources/site/data/menu-data/clientMenu.json'));
        $clientMenuData = json_decode($clientMenuJson);

        // Share all menuData to all the views
        \View::share('menuData', [
            'admin' => $verticalMenuData,
            'user' => $userMenuData,
            'client' => $clientMenuData,
        ]);
    }
}
