<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alert extends Model
{
    use HasFactory;


    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }
}
