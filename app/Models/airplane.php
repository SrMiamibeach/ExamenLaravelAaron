<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class airplane extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'maker',
        'seat'
    ];
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
