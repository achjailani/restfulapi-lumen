<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{

	/**
	*
	* The table associated with the model
	* @var string 
	*/
	protected $table = 'checklists';

	/**
	*
	* The primary key associated with the table 
	* @var int
	*/
	protected $primaryKey = 'id_checklist';

	/**
	*
	* @var array
	*/
	protected $fillable = [
		'object_domain', 'object_id', 'description',
		'is_completed', 'completed_at', 'updated_by',
		'updated_at', 'created_at', 'due', 'urgency'
	];

	public function items()
	{
		return $this->hasMany('App\Item', 'checklist_id', 'id_checklist');
	}

	public function template()
	{
		return $this->hasOne('App\Template', 'checklist_id', 'id_checklist');
	}

	
}