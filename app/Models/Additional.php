<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;
    protected $table = 'additional';
    protected $primarykey = 'id';
    protected $fillable = [
        'property','description','annonce_id'
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
