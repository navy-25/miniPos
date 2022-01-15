<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSupplier extends Model
{
    use HasFactory;
    protected $table = 'master_suppliers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_supplier',
        'email',
        'telepon',
        'alamat',
    ];
}
