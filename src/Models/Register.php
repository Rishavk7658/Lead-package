<?php

namespace Netweb\Lead\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    
    protected $guarded=[];
    public function getInterest()
    {
         return $this->belongsTo('Netweb\Lead\Models\InterestAndLeadStatus' ,'interest_level', 'id');
    }
}
