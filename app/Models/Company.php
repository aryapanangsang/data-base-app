<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = 
    [        
        'company_name',
        'company_address'
    ];

    public function Applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
