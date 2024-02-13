<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $all_view['setting'] = DB::table('settings')->first();
        $all_view['category'] = DB::table('categories')->where('status', 1)->get();
        View::share(compact('all_view'));
    }
}
