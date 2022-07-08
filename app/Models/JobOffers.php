<?php

namespace App\Models;

use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobOffers extends Model
{
    use HasFactory;
    protected $fillable = ['nameJobOffer'];

    public function answers()
    {
        return $this->hasOne(Answers::class);
    }
}
