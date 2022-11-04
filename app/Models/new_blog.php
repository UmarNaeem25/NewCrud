<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_blog extends Model
{

    protected $table='new_blogs';
    protected $fillable=['text','clientID'];
}
