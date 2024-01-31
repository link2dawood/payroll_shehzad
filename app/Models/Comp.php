<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comp extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        'CreateCompany',
        'DispalyName',
        'Address1',
        'Address2',
        'City',
        'State',
        'Zipcode',
        'Country',
        'BillingAddress1',
        'BillingAddress2',
        'BillingCity',
        'BillingState',
        'BillingZip',
        'Phone1',
        'Phone2',
        'Fax',
        'status',
        'Disclaimer',
        'document',
        'logo',



    ];
}