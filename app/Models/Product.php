<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';


    protected $fillable = 
    [
        'GTIN',
        'Name',
        'Description',
        'DescriptionFrench',
        'NameFrench',
        'BrandName',
        'CountryOrigin',
        'GrossWeight',
        'NetContentWeight',
        'WeightUnit',
        'company_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    
}
