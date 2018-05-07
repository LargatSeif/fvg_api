<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concert;

class Festival extends Model
{
    protected $fillable = ['name','date'];
    
    public function concerts()  
    {
        return $this->hasMany(Concert::class);
    }
}
