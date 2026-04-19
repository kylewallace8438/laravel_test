<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cloudinary\Configuration\Configuration;

class CloudinarySeviceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Global config: Affects all usage of Cloudinary SDK globally
        $cloudinaryConfiguration = Configuration::instance(config('cloudinary'));

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
