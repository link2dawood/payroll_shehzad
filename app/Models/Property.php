<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $fillable = [
        'OwnerType',
        'Owner',
        'ProtpertyType',
        'PropertyName',
        'Location',
        'PropertyDiscription',
        'LandInformation',
        'Tenure',
        'Builder',
        'Architecture',
        'CertifyingAuthority',
        'Contact',
        'ReciptePrefix',
        'ServiceFee',
        'Zone',
        'Sector',
        'PlotNo',
        'map',
        'brochure',
        'image',



    ];
}
