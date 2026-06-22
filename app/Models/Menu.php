<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['kategori_id', 'nama_menu', 'harga', 'deskripsi', 'foto_menu'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}