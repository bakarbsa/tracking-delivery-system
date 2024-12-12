<?php

namespace App\Traits;

trait DefaultDummyEmailTrait
{
    public static function bootDefaultDummyEmailTrait()
    {
        static::creating(function ($model) {
            if (!$model->email || !$model->email == '') {
                $model->email = $model->username.'@yourrealldomain.com';
            }
            if (!$model->isDirty('email_verified_at')) {
              $model->email_verified_at = time();
            }
        });
    }
}