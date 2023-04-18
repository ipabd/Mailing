<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Widgets\Widget;
use App;

class WidgetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/' => config_path() . '/']);
		$this->publishes([__DIR__ . '/../app/' => app_path() . '/']);
		Blade::directive('widget', function ($name) {
			return "<?= app('widget')->show($name); ?>";
		});
        $this->loadViewsFrom(app_path() .'/Widgets/views', 'Widgets');
        $this->app['view']->addNamespace('widget',app_path() .'/Widgets/views');
    }

    public function register()
    {
        App::singleton('widget', function(){
            return new Widget();
        });
	}

}
