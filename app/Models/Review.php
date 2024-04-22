<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primarykey = 'id';
    protected $fillable = ['title','description','rate','annonce_id'];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
