<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    protected $table = 'bantuan';

    protected $guarded = ['id'];

    public function jenis_bantuan()
    {
        return $this->belongsTo(JenisBantuan::class, 'jenis_bantuan_id');
    }
}
