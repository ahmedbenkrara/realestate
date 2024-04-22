<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floors extends Model
{
    use HasFactory;
    protected $table = 'floors';
    protected $primarykey = 'id';
    protected $fillable = [
        'name','size','baths','beds','price','description','image','annonce_id'
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
