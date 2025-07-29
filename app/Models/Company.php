<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companies';


    public function products(){
        return $this->hasMany(Product::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class, 'owners_id');
    }

    public function contact(){
        return $this->belongsTo(Contact::class, 'contacts_id');
    }
}
