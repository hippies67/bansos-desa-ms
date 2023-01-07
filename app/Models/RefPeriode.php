<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPeriode extends Model
{
    use HasFactory;

    protected $table = 'ref_periode';

    protected $guarded = [
        'id'
    ];
}
