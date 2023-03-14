<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table='subjects';
    protected $fillable=['name_id','name'];
}
