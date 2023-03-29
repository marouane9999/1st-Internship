<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restauration extends Model
{
    use HasFactory;
    protected $fillable = ['numero_rest', 'site_restau', 'ville', 'prestataire', 'rep_id', 'participant_id'];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function repas()
    {
        return $this->belongsTo(Repas::class, 'rep_id');
    }
}
