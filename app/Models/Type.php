<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $primarykey = 'id'; 
    protected $fillable = [
        'name','cover'
    ];

    public function annonces(){
        return $this->HasMany(Annonce::class);
    }
}
