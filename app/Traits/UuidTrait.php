<?php

namespace App\Traits;

use Illuminate\Support\Str;




trait UuidTrait{
   
    protected static function bootUuidTrait()
    {
        static::creating(function ($model) {
            $column = $model->uuidColumn ?? 'uuid'; // Default to 'uuid' if not specified
            if (empty($model->{$column})) {
                $model->{$column} = (string) Str::uuid();
            }
        });
    }


    public function getIncrimenting(){
        return false;
    }


    public function getKeyType(){
        return 'string';
    }
}