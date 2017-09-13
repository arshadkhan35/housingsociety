<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfileImage extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'userProfilePic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','uri');
        public $timestamp = false;
}
