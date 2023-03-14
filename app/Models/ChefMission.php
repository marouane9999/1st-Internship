<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefMission extends Model
{
    use HasFactory;
    protected $fillable=['nom_chef','prenom_Chef','tel','num_passport'];
    public function participant(){
        return $this->hasOne(Participant::class,'chefM_id');
    }
}
