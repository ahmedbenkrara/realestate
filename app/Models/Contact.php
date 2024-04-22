<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $primarykey = 'id';
    protected $fillable = [
        'phone','fax','whatsapp','facebook','instagram','linkedin','twitter','website','about','profile_pic','user_id'
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
