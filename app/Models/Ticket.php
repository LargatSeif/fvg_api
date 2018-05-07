<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concert;
class Ticket extends Model
{
    protected $fillable = ['barcode'];

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }
}
