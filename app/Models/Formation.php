<?php

namespace App\Models;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Specialite;
use App\Models\StatutFormation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function statut()
    {
        return $this->belongsTo(StatutFormation::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'formation_specialite', 'formation_id', 'specialite_id');
    }
}