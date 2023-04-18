<?php

namespace App\Providers;
use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Article\Models\Article;
use App\Modules\Pub\Comment\Models\Comment;
use App\Modules\Pub\Menu\Models\Menu;
use App\Modules\Pub\Portfolio\Models\Portfolio;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
       // dd("ku");
        $modules = config('modular.modules');
        $path = config('modular.path');
        if($modules) {
            Route::group([
                'prefix'=> ''
            ], function() use($modules, $path) {   ///передача параметра функции колбек
                foreach ($modules as $mod => $submodules) {
                    foreach ($submodules as $key => $sub) {
                        $relativePath = "/$mod/$sub";
                        Route::patterns(['id' => '[0-9]+', 'cat' => '[A-Za-z]+']);
                        Route::middleware('web')
                            ->group(function() use($mod, $sub, $relativePath, $path) {
                                $this->getWebRoutes($mod, $sub, $relativePath, $path);
                            });
                        Route::prefix('api')
                            ->middleware('api')
                            ->group(function() use($mod, $sub, $relativePath, $path) {
                                $this->getApiRoutes($mod, $sub, $relativePath, $path);
                            });

                        Route::bind('portfolio', function ($value) {///привязка текстовой информации к функции,
            /// связывает параметр маршрута portfolio с определенным действием функцией поиска записи по алиасу
            return Portfolio::where('alias',$value)->first(); ///берется одна запись
               });
                        Route::bind('article', function ($value) {///привязка текстовой информации к функции,
            /// связывает параметр маршрута article с определенным действием функцией поиска записи по алиасу
            return Article::where('alias',$value)->first(); ///берется одна запись
        });
                    }
                }
            });
        }
        $this->app['view']->addNamespace('Pub',base_path().'/resources/views/Pub');  ///глобальный обработчик видов
        $this->app['view']->addNamespace('Admin',base_path().'/resources/views/Admin');
    }

    private function getWebRoutes($mod, $sub, $relativePath, $path)  ///формирование веб маршрутов
    {
        $routesPath = $path.$relativePath.'/Routes/web.php';
        if(file_exists($routesPath)) {
            if($mod != config('modular.groupWithoutPrefix')) {
                Route::group(
                    [
                        'prefix' => strtolower($mod),
                        'middleware' => $this->getMiddleware($mod)
                    ],
                    function() use ($mod, $sub, $routesPath) {
                        Route::namespace("App\Modules\\$mod\\$sub\Controllers")->
                        group($routesPath);
                    }
                );
            }
            else {
                Route::namespace("App\Modules\\$mod\\$sub\Controllers")->
                middleware($this->getMiddleware($mod))->
                group($routesPath);
            }
        }
    }

    private function getApiRoutes($mod, $sub, $relativePath, $path) ///формирование апи маршрутов
    {
        $routesPath = $path.$relativePath.'/Routes/api.php';
        if(file_exists($routesPath)) {
            Route::group(
                [
                    'prefix' => strtolower($mod),
                    'middleware' => $this->getMiddleware($mod, 'api')
                ],
                function() use ($mod, $sub, $routesPath) {
                    Route::namespace("App\Modules\\$mod\\$sub\Controllers")->
                    group($routesPath);
                }
            );
        }
    }

    private function getMiddleware($mod, $key = 'web')   ///формирование посредников
    {
        $middleware = [];
        $config = config('modular.groupMidleware');
        if(isset($config[$mod])) {
            if(array_key_exists($key, $config[$mod])) {
                $middleware = array_merge($middleware, $config[$mod][$key]);
            }
        }
        return $middleware;
    }
}
