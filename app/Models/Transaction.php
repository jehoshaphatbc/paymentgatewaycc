<?php

namespace App\Models;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => StatusTransaction::class,
        'type' => TypeTransaction::class,
    ];
}
