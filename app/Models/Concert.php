<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Concert;
use App\Models\Festival;

class Concert extends Model
{
    protected $fillable = ['name', 'date', 'heure'];

    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
