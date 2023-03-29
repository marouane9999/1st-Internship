<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['nom_par', 'prenom_par', 'genre', 'discipline', 'num_pass', 'num_acc', 'pays_delg', 'cat_id', 'site_compet', 'chefM_id'];

    public function chef_mission()
    {
        return $this->belongsTo(ChefMission::class, 'chefM_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'cat_id');
    }

    public function vols()
    {
        return $this->belongsToMany(Vol::class, 'vols_participants', 'participant_id', 'vol_id');
    }

    public function vols_arrive()
    {
        return $this->vols()->where('type_vol', 0)->first();
    }

    public function vols_depart()
    {
        return $this->vols()->where('type_vol', 1)->first();
    }


}
