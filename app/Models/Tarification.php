<?php

namespace App\Models;

use App\Models\Formation;
use App\Models\DureeFormation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarification extends Model
{
    use HasFactory;

    public function dureeFormation()
    {
        return $this->belongsTo(DureeFormation::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}