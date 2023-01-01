<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'fullname', 'photo', 'ref_divisi_id'
    ];

    public function ref_divisi()
    {
        return $this->belongsTo(RefDivisi::class);
    }
}
