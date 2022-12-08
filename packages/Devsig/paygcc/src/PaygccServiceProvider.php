<?php
    namespace Devsig\Paygcc;
    use Illuminate\Support\ServiceProvider;

    class PaygccServiceProvider extends ServiceProvider 
    {
        public function boot()
        {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->publishes([
                __DIR__.'/config/paygcc.php' => config_path('paygcc.php'),
            ]);

        }

        public function register()
        {
            $this->loadViewsFrom(__DIR__.'/views', 'devsig');
        }
    }