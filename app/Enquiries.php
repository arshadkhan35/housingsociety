<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'enquiry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name','email','mobile_no');
        public $timestamp = false;
}
