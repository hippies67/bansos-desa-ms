<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'fullname', 'photo', 'description', 'instagram', 'ref_divisi_id', 'ref_periode_id'
    ];

    public function ref_divisi()
    {
        return $this->belongsTo(RefDivisi::class);
    }
}
