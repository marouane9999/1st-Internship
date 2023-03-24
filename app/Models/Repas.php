<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repas extends Model
{
    use HasFactory;
    protected $fillable=['des_rep','desc_rep'];
    public function restauration(){
        return $this->hasOne('restauration','rep_id');
    }
}
