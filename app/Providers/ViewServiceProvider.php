<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share global settings with all views
        View::composer('*', function ($view) {
            // Only load settings if the table exists (to prevent errors during migrations)
            try {
                $globalSettings = [
                    'site_name' => Setting::get('site_name', config('app.name')),
                    'site_logo' => Setting::get('site_logo'),
                    'contact_email' => Setting::get('contact_email'),
                    'contact_phone' => Setting::get('contact_phone'),
                ];
                $view->with('globalSettings', $globalSettings);
            } catch (\Exception $e) {
                $view->with('globalSettings', [
                    'site_name' => config('app.name'),
                    'site_logo' => null,
                    'contact_email' => null,
                    'contact_phone' => null,
                ]);
            }
        });
    }
}
