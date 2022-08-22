<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

trait HasUuid
{

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

    public static function bootHasUuid()
    {
        self::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
            return $model;
        });
    }
}
