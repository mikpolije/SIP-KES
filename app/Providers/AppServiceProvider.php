<?php

namespace App\Providers;

use App\Models\Bidan;
use App\Models\Dokter;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Pastikan Laravel tahu bahwa dia di belakang proxy SSL
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        View::share('listDokter', Dokter::all());
        View::share('listBidan', Bidan::all());

        Validator::replacer('required', function ($message, $attribute, $rule, $parameters) {
            if (preg_match('/(.*)\.(\d+)/', $attribute, $matches)) {
                $field = $matches[1];
                $index = $matches[2];
                $label = Lang::get("validation.attributes.{$field}.*");

                $position = (int) $index + 1;

                return str_replace([':attribute', ':position'], [$label, $position], $message);
            }

            return str_replace(':attribute', Lang::get("validation.attributes.{$attribute}", [], $attribute), $message);
        });
    }
}
