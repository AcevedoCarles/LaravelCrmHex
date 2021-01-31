<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


final class Customer extends Model
{
    protected $table = 'customers';

    protected $guarded = [];

    public $timestamps = false;
}
