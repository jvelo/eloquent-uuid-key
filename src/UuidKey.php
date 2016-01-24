<?php

namespace Jvelo\Eloquent;

use \Ramsey\Uuid\Uuid;

/*
 * Marks eloquent model as using a UUID as key.
 *
 * @package Jvelo\Eloquent
 * @author Jerome Velociter <jerome@velociter.fr>
 * @license MIT
 */
trait UuidKey
{
    /**
     * Boots the Uuid trait for the model : sets the model as not incrementing, and generate a UUID 4 key.
     *
     * @return void
     */
    public static function bootUuidKey()
    {
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }

}
