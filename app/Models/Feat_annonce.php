<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feat_annonce extends Model
{
    use HasFactory;
    protected $table = 'feat_annonce';
    protected $primarykey = ['annonce_id','features_id'];
    protected $fillable = ['annonce_id','features_id'];

    public function Feature(){
        
    }

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
