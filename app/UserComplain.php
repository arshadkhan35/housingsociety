<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserComplain extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'userComplain';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','cid','complain');
        public $timestamp = false;
}
