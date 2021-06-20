<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Respect\Validation\Rules as RespectRules;

class ValidacoesService extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        // cep
        Validator::extend('cep', function($attribute, $value, $parameters, $validator) {
            return (new RespectRules\PostalCode('BR'))->validate($value);
        });

    }

}
