<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->app['validator']->extend('composite_unique', function ($attribute, $value, $parameters, $validator) {

            $table = array_shift($parameters);
            $join_table = array_shift($parameters);
            $prim_key = array_shift($parameters);
            $prim_key_value = array_shift($parameters);

            $params = [];

            for ($i = 0; $i < sizeof($parameters); $i++) {
                $params[$parameters[$i]] = $parameters[++$i];
            }

            $query = \DB::table($table)->select(\DB::raw(1))->leftjoin($join_table, $table . '.' . $prim_key, '=', $join_table . '.' . $prim_key)->where($params);
            if ($prim_key_value != "NULL") {
                $query->where($table . '.' . $prim_key, '<>', $prim_key_value);
            }
            $result = $query->first();

            if (count($result) == 1) {
                return 0;
            } else {
                return 1;
            }
        }, 'This value :attribute already exists!');

        $this->app['validator']->extend('id_check', function ($attribute, $value, $parameters, $validator) {
            $table = array_shift($parameters);
            $field = array_shift($parameters);
            $second_field = array_shift($parameters);
            $second_field_value = array_shift($parameters);

            $query = \DB::table($table)->select($field)->where($field, $value)->where($second_field, $second_field_value);

            return count($query->first()) > 0;
        }, 'Please select :attribute');

        $this->app['validator']->extend('unique_multiple_column', function ($attribute, $value, $parameters, $validator) {

            if (count($parameters) == 6) {
                $table = array_shift($parameters);
                $field = array_shift($parameters);
                $second_field = array_shift($parameters);
                $second_field_value = array_shift($parameters);
                $third_field = array_shift($parameters);
                $third_field_value = array_shift($parameters);
                $query = \DB::table($table)->select($field)
                        ->where($field, $value)
                        ->where($second_field, $second_field_value)
                        ->where($third_field, '<>', $third_field_value);
            } else {
                $table = array_shift($parameters);
                $field = array_shift($parameters);
                $second_field = array_shift($parameters);
                $second_field_value = array_shift($parameters);
                $query = \DB::table($table)->select($field)->where($field, $value)->where($second_field, $second_field_value);
            }

            return !(count($query->first()) > 0);
        }, 'This value :attribute already exists!');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
