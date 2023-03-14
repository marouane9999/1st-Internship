<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable=['nom_pr','prenom_pr','genre'.'discipline','num_pass','num_acc','pays_deleg','cat_id','site_compet','chefM_id'];

    public function chef_mission(){
        return $this->belongsTo(ChefMission::class,'chefM_id' );
    }

}
