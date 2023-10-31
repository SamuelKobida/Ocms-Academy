<?php

namespace App\Arrival\Classes\Extend;
use RainLab\User\Models\User as UserModel;
use App\Arrival\Models\Arrival as ArrivalModel;


class UserExtend{


    public static function extendUser(){
        UserModel::extend(function($model) {
            $model->hasMany['arrivals'] = [ArrivalModel::class];
        });
    }

}