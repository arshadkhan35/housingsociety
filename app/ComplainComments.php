<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplainComments extends Model
{
   protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'complain_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','cid','complain_comment');
        public $timestamp = false;
}
