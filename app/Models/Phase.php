<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;
    protected $table = 'phase';
    protected $fillable = [
        'OwnerType',
        'Owner',
        'ProtpertyType',
        'PhaseName',
        'PhaseDescription',
        'ServiceFee',
        'ProtpertySubType',
        'map',
        'brochure',
        'image',



    ];
}
