<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'userdetails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id', 'fullName', 'mobileno','	email','buildingno','wing','Floor','roomno','fatherName');
        public $timestamp = false;
}
