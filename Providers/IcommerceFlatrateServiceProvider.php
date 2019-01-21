<?php

namespace Modules\IcommerceFlatrate\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\IcommerceFlatrate\Events\Handlers\RegisterIcommerceFlatrateSidebar;

class IcommerceFlatrateServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcommerceFlatrateSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('configflatrates', array_dot(trans('icommerceflatrate::configflatrates')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('IcommerceFlatrate', 'permissions');
        $this->publishConfig('IcommerceFlatrate', 'settings');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\IcommerceFlatrate\Repositories\ConfigflatrateRepository',
            function () {
                $repository = new \Modules\IcommerceFlatrate\Repositories\Eloquent\EloquentConfigflatrateRepository(new \Modules\IcommerceFlatrate\Entities\Configflatrate());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\IcommerceFlatrate\Repositories\Cache\CacheConfigflatrateDecorator($repository);
            }
        );
// add bindings

    }
}
