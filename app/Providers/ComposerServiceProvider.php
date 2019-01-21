<?php namespace App\Providers;

use App\ViewComposers\WidgetsComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\FrontendComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.frontend','frontend.pagina'
        ], FrontendComposer::class);

        view()->composer(
            ['frontend.widgets.w-*'],
            WidgetsComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
