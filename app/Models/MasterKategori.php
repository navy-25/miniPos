<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKategori extends Model
{
    use HasFactory;
    protected $table = 'master_kategoris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori',
    ];
}
