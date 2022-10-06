<?php

namespace App\Models;

use App\Models\Filiere;
use App\Models\Formation;
use App\Models\Tarification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialite extends Model
{
    use HasFactory;

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function tarifications()
    {
        return $this->hasMany(Tarification::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'formation_specialite', 'specialite_id', 'formation_id');
    }
    public function proprietes()
    {
        return $this->belongsToMany(ProprieteSpecialite::class, 'formation_specialite', 'specialite_id', 'propriete_specialite_id');
    }


    public function specialite_proprietes()
    {
        return $this->hasMany(ArticlePropriete::class);
    }
}