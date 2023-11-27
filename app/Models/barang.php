<?php

namespace App\Models;

use App\Models\pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama',
        'harga',
        'kode_barang',  
        'jenis',
    ];
    public function toPembelian()
    {
        {
            return $this->belongsTo(pembelian::class, 'id_barang', 'id_barang');
        }
    }
}
