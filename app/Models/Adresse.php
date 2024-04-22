<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table = 'adresse';
    protected $primarykey = 'id';
    protected $fillable = [
        'city','state','country','zip','quartier','adresse','longmap','latmap','longview','latview','annonce_id'
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
