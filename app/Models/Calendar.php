<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    public function alerts()
    {
        return $this->hasOne(Alert::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
    
}
