<?php

namespace DavidCova\CovaForms\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {        
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'cova-forms');
        $this->publishes([__DIR__ . '/../../app/Http/Livewire' => app_path('Http/Livewire/')], 'cova-livewire');
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/cova-forms')], 'cova-forms');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/cova-forms.php', 'cova-forms');
    }
}
