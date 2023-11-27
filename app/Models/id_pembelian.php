<?php

namespace App\Models;

use App\Models\pemelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class id_pembelian extends Model
{
    use HasFactory;
    protected $table = 'id_pembelian';
    // protected $primaryKey = 'id_pembelian';
    protected $fillable = [
        'id_pembelian',
        'total_harga',
        'uang',
        'kembalian',
        'id_user',
    ];
    // public function id_pembelian()
    // {
    //     {
    //          return $this->belongsTo(pembelian::class, 'id_pembelian', 'id_pembelian');
    //     }
    // }
}
