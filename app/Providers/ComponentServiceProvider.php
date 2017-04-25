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
        Form::component('bsText', 'components.form.text', ['name', 'trans' => '', 'value' => null, 'attributes' => []]);
        Form::component('bsButton', 'components.form.button', ['name', 'trans' => '', 'value' => null, 'attributes' => []]);
        Form::component('bsSwtich', 'components.form.switch', ['name', 'trans' => '', 'value' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'trans' => '', 'select' => null, 'default' => null]);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'trans' => '', 'value' => null, 'attributes' => []]);
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
