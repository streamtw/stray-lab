<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'business_registrations';

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', '核准設立');
    }

    public function isActive()
    {
        return $this->status === '核准設立';
    }
}
