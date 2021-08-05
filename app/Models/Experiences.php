<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'location', 'description', 'position', 'date'];
}
