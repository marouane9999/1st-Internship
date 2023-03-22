<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;
    protected $fillable = ['participant_id','site_heberg','type_cham', 'date_checkin','date_checkout'];

    public function participant(){
        return $this->belongsTo(Participant::class,'participant_id' );
    }

}
