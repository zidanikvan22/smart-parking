<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slot';
    protected $primaryKey = 'id_slot';
    protected $guarded = [];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_area','id_area');
    }
}
