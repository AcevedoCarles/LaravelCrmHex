<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


final class Address extends Model
{
    protected $table = 'addresses';

    protected $guarded = [];

    public $timestamps = false;
}
