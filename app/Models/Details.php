<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $table = 'details';
    protected $primarykey = 'id';
    protected $fillable = [
        'baths','beds','garades','garade_size','area_size','yearbuilt','annonce_id'
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
