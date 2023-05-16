<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['participant_id','site_heberg','type_cham', 'date_checkin','date_checkout','updated_column_at'];

    public function participant(){
        return $this->belongsTo(Participant::class,'participant_id' );
    }

    public function setMyColumnAttribute($value)
    {
        $this->attributes['presence'] = $value;
        $this->attributes['updated_column_at'] = now();
    }
}
