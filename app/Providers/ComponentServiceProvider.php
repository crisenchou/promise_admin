<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'trans' => null, 'default' => null, 'attributes' => []]);
        Form::component('bsButton', 'components.form.button', ['name', 'trans' => null, 'default' => null, 'attributes' => []]);
        Form::component('bsSwitch', 'components.form.switch', ['name', 'trans' => null, 'default' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'trans' => null, 'default' => null, 'select' => null,]);
        Form::component('bsRadio', 'components.form.radio', ['name', 'trans' => null, 'default' => null, 'radio' => null]);
        Form::component('bsIcon', 'components.form.icon', ['name', 'trans' => null, 'default' => null, 'icons' => null,]);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'trans' => '', 'checkbox' => null, 'attributes' => []]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
