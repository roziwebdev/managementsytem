<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nama extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function alamat()
    {
        return $this->hasMany(Alamat::class);
    }
}
