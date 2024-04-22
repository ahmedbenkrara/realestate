<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $table = 'annonce';
    protected $primarykey = 'id';
    protected $fillable = [
        'title','status','enabled','price','price_month','price_sqft','priceyear','is_sold','description','size','video','type_id','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    } 

    public function favorite(){
        return $this->belongsTo(Favorite::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function images(){
        return $this->hasMany(Annonce_image::class);
    }

    public function floors(){
        return $this->hasMany(Floors::class);
    }

    public function detail(){
        return $this->hasOne(Details::class);
    }

    public function additional(){
        return $this->hasMany(Additional::class);
    }

    public function documents(){
        return $this->hasMany(Documents::class);
    }

    public function features(){
        return $this->belongsToMany(Features::class);
    }

    public function adresse(){
        return $this->hasOne(Adresse::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
