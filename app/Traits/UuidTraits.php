<?php

namespace App\Traits;

use Illuminate\Support\Str;




trait UuidTrait{
    public function boot(){
        
        Parent::boot();

        static::creating(function($model){
            $column = $model->uuidcolumn ?? 'uuid';
           
            if (empty($model->{$column})){
                $model->{$model->getKeyname()} = (string) Str::uuid();
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