<?php

namespace YKuadrat\FormBuilder;

use Collective\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class FormBuilderProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        FormFacade::component('textInput', 'component::text_input', ['name', 'value', 'attributes']);
        FormFacade::component('emailInput', 'component::email_input', ['name', 'value', 'attributes']);
        FormFacade::component('textareaInput', 'component::textarea_input', ['name', 'value', 'attributes']);
        FormFacade::component('dateInput', 'component::date_input', ['name', 'value', 'attributes']);
        FormFacade::component('numberInput', 'component::number_input', ['name', 'value', 'attributes']);
        FormFacade::component('radioInput', 'component::radio_input', ['name', 'value', 'options' => [1 => 'yes', 0 => 'no'], 'attributes']);
        FormFacade::component('selectInput', 'component::select_input', ['name', 'value', 'options' => [], 'attributes']);
        FormFacade::component('switchInput', 'component::switch_input', ['name', 'value' => 1, 'attributes']);
        FormFacade::component('multipleInput', 'component::multiple_input', ['name', 'type', 'values' => [''], 'attributes']);
        FormFacade::component('multipleColumnInput', 'component::multiple_column_input', ['name', 'values' => [], 'columns', 'attributes']);
        FormFacade::component('select2Input', 'component::select2_input', ['name', 'value', 'options' => [], 'attributes']);
        FormFacade::component('select2MultipleInput', 'component::select2_multiple_input', ['name', 'value', 'options' => [], 'attributes']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'component');
    }
}
