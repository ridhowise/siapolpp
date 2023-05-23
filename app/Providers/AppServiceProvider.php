<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('currency', function ( $expression ) { return "<?php echo number_format($expression,0,',','.'); ?>"; });

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // if (env('APP_ENV') !== 'local') {
        //     \Illuminate\Support\Facades\URL::forceScheme('https');
        // }
    }
}
