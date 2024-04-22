<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    protected $table = 'features';
    protected $primarykey = 'id';
    protected $fillable = [
        'name'
    ];

    public function annonces(){
        return $this->belongsToMany(Annonce::class);
    }
}
