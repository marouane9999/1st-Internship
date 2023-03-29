<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volontaire extends Model
{
    use HasFactory;

    protected $fillable = ['tel', 'ref_cojar', 'fin_contrat', 'debut_contrat', 'site_aff', 'role', 'participant_id'];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

}
