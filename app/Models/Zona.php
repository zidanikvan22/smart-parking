<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Zona';
    protected $guarded = [];
}
