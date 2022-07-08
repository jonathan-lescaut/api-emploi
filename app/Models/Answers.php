<?php

namespace App\Models;

use App\Models\JobOffers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answers extends Model
{
    use HasFactory;
    protected $fillable = ['statusAnswer', 'joboffer_id'];

    public function JobOffers()
    {
        return $this->hasMany(JobOffers::class, 'joboffer_id');
    }

}
