<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Slot';
    protected $guarded = [];
}
