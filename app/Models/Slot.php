<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slot';
    protected $fillable = ['subzona_id', 'nomor_slot', 'keterangan'];

    public function subzona()
    {
        return $this->belongsTo(Subzona::class, 'subzona_id');
    }
}
