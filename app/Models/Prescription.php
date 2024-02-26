<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prescription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nameOfPrescription', 'dateOfPrescription', 'dateOfStart',
        'durationOfTreatmentInDays','frequencyBetweenDosesInHours',
        'frequencyPerDay',
    ];

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

    public function medication():HasMany
    {
        return $this->hasMany(Medication::class);
    }

    public function calendar():HasOne
    {
        return $this->hasOne(Calendar::class);
    }

}
