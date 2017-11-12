<?php

namespace App\Providers;

use App\Modules\Event\Repositories\EventRepository;
use App\Modules\Event\Repositories\IEventRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        Carbon::setLocale('ru');

        $this->app->singleton(\Faker\Generator::class, function () {
            $faker = \App\Classes\ExtFaker\Factory::create('ru_RU');
            $faker->addProvider(new \App\Classes\ExtFaker\Provider\ru_RU\Lorem($faker));
            return $faker;
        });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEventRepository::class, EventRepository::class);
    }
}
