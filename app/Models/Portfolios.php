<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolios extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'photo', 'category', 'isPrivate', 'technology', 'download'];
}
