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
        Form::component('bsText', 'components.form.text', ['name', 'trans' => null, 'default' => null, 'desc' => '']);
        Form::component('bsButton', 'components.form.button', ['name', 'trans' => null, 'default' => null, 'attributes' => []]);
        Form::component('bsSwitch', 'components.form.switch', ['name', 'trans' => null, 'default' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'trans' => null, 'default' => null, 'select' => null,]);
        Form::component('bsSelectMuliple', 'components.form.select-muliple', ['name', 'trans' => null, 'default' => null, 'select' => null,]);
        Form::component('bsRadio', 'components.form.radio', ['name', 'trans' => null, 'default' => null, 'radio' => null]);
        Form::component('bsIcon', 'components.form.icon', ['name', 'trans' => null, 'default' => null, 'icons' => null,]);
        //Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'trans' =>null, 'default' => null, 'attributes' => []]);
        Form::component('bsImage', 'components.form.image', ['name', 'trans' => null, 'default' => null]);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'trans' => null, 'default' => null]);
        Form::component('bsRangePicker', 'components.form.rangepicker', ['name', 'trans' => null, 'default' => null]);
        Form::component('bsDateRangePicker', 'components.form.date-range-picker', ['name', 'trans' => null, 'default' => null]);
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
