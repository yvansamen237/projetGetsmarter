<?php

namespace App\Models;

use App\Models\Filiere;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProprieteSpecialite extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "estObligatoire", "filiere_id"];

    public $timestamps = false;

    public function filiere()
    {
        return $this->belongsTo(
            Filiere::class,
            "filiere_id",
            "id"
        );
    }


    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, "specialite_propriete", "propriete_specialite_id", "specialite_id");
    }
}