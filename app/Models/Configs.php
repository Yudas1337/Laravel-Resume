<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{
    use HasFactory;
    protected $table = 'configs';
    protected $primaryKey = 'id';
    protected $fillable = ['header', 'subheader', 'headerdesc', 'aboutphoto', 'sidebarphoto', 'skilldesc', 'experiencedesc', 'galerydesc'];
}
