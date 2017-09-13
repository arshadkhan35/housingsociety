<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'notices-comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('nid','user_id','comment');
        public $timestamp = false;
}
