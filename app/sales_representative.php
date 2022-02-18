<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_representative extends Model
{
    protected $fillable = ['name','email','tele_no','join_date','route','comments','status'];
}
