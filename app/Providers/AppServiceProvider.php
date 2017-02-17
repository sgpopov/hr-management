<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Facades\Image;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('oldpassword', function ($attribute, $value, $parameters) {
            return Hash::check($value, Auth::user()->password);
        });

        Validator::extend('base64Image', function ($attribute, $value, $parameters) {
            try {
                $supportedFormats = [
                    'image/gif', 'image/jpeg', 'image/png'
                ];

                $image = Image::make($value);

                return in_array($image->mime, $supportedFormats);
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
