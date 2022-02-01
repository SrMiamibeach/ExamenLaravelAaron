<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'origin',
        'destiny',
        'available_seats'
    ];
    public function airplane()
    {
        return $this->belongsTo(airplane::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('num_plazas')->withTimestamps();
    }
}
