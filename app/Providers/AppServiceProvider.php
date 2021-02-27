<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Documents;
use App\TopicM;
use Carbon\Carbon;

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
        Schema::defaultStringLength(191);
        // URL::forceScheme('https');
        Carbon::setLocale('vi');
        view()->composer('*', function ($view) {

            // view()->composer('*', function($view)
            // {
            $notice_register_topic = TopicM::where('notice_register', 0)->count();
            $notice_register_doc = Documents::where('notice_register', 0)->count();
            $count_all_register = $notice_register_topic + $notice_register_doc;
            $new_register_doc = Documents::where('notice_register', 0)->get();
            $new_register_topic = TopicM::where('notice_register', 0)->get();
            $view->with('count_all_register', $count_all_register)
                ->with('new_register_doc', $new_register_doc)
                ->with('new_register_topic', $new_register_topic);

            // });


        });
    }
}
