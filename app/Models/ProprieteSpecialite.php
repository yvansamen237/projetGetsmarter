<?php

namespace App\Models;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProprieteSpecialite extends Model
{
    use HasFactory;

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}