<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    protected $table = 'zona';

    protected $fillable = ['nama_zona', 'keterangan', 'fotozona'];

    public function subzonas()
    {
        return $this->hasMany(Subzona::class, 'zona_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'zona_id');
    }

}
