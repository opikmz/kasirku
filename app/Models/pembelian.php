<?php

namespace App\Models;

use App\Models\barang;
use App\Models\id_pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'id_pembelian',
        'id_barang',
        'jumlah',
        'nama',
        'harga',
        'id_user',
        'tanggal',
    ];
    public function barang()
    {
            {
                return $this->hasMany(barang::class);
            }
    }
    public function id_pembelian()
    {
            {
                return $this->hasMany(id_pembelian::class);
            }
    }
}
