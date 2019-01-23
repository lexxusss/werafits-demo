<?php

namespace App\Providers;

use App\Helpers\Consts\FilesystemsAdapters;
use App\Model\AvatarRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AvatarRepository::class, function() {
            return new AvatarRepository(request(), \Storage::disk(FilesystemsAdapters::S3_AVATARS));
        });
    }
}

