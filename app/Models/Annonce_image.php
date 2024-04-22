<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_image extends Model
{
    use HasFactory;
    protected $table = 'annonce_images';
    protected $primarykey = 'id';
    protected $fillable = [
        'path','annonce_id'
    ];

    public function Annonce(){
        return $this->belongsTo(Annonce::class);
    }

}
