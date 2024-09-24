<?php

namespace App\Models;


use App\Events\CreatingModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docketnew extends Model
{
    use HasFactory;

     protected $dispatchesEvents = [
        'creating' => CreatingModel::class,
    ];

}
