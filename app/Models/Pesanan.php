<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = ['user_id', 'nomor_nota', 'nama_pelanggan', 'metode_pembayaran', 'total_harga'];

    public function user()
    {
        return $this->belongsTo(User::class); // Kasir
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'detail_pesanans')
                    ->withPivot('jumlah', 'subtotal', 'status_pembuatan')
                    ->withTimestamps();
    }
}