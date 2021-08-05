<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencies extends Model
{
    use HasFactory;
    protected $table = 'competencies';
    protected $primaryKey = 'id';
    protected $fillable = ['icon', 'title', 'description'];
}
