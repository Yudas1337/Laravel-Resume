<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'photo', 'linkedin', 'gmail', 'telegram', 'github', 'whatsapp', 'instagram', 'facebook'];
}
