<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefDivisi extends Model
{
    use HasFactory;

    protected $table = 'ref_divisi';

    protected $guarded = [
        'id'
    ];

    public function children()
    {
        return $this->hasMany(RefDivisi::class, 'id_induk');
    }
}
