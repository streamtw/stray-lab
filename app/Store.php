<?php

namespace App;

use App\Registration;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'tax_number', 'tax_number');
    }
}
