<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    protected $table = 'zona';
    protected $primaryKey = 'id_area';
    protected $guarded = [];

    public function slots()
    {
        return $this->hasMany(Slot::class, 'id_area', 'id_area');
    }

}
