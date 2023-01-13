<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebProfile extends Model
{
    use HasFactory;

    protected $table = "web_profile";

    protected $fillable = [
        'logo', 'primary_color', 'dark_primary_color', 'light_primary_color', 'name', 'description', 'tagline', 'address', 'phone', 'email', 'facebook', 'instagram', 'youtube', 'twitter', 'whatsapp', 'github', 'linkedin', 'updator' 
    ];
}
