<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


final class Task extends Model
{
    protected $table = 'tasks';

    protected $guarded = [];

    public $timestamps = false;
}
