<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';

    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->belongsTo(penduduk::class, 'penduduk_id');
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id');
    }
}
