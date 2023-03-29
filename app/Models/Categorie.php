<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['des_cat', 'desc_cat'];

    public function participant()
    {
        return $this->hasOne('Participant', 'cat_id');
    }
}
