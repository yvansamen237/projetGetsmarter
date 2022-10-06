<?php

namespace App\Models;

use App\Models\Specialite;
use App\Models\ProprieteSpecialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;

    protected $table = "filieres";

    protected $fillable = ["nom"];

    public function specialites()
    {
        return $this->hasMany(Specialite::class);
    }

    public function proprietes()
    {
        return $this->hasMany(ProprieteSpecialite::class);
    }
}