<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	/**
	*
	* The table associated with the model
	* @var string 
	*/
	protected $table = 'items';

	/**
	*
	* The primary key associated with the table 
	* @var int
	*/
	protected $primarykey = 'id_item';

	/**
	*
	* @var array
	*/
	protected $fillable = [
		'description', 'is_completed', 'completed_at',
		'due', 'urgency', 'updated_by', 'updated_at',
		'created_at', 'assignee_id', 'task_id', 'checklist_id'
	];

	public function checklist(){
		return $this->belongsTo('App\Checklist', 'checklist_id');
	}

	public function templates(){
		return $this->hasMany('App\Template', 'item_id', 'id_item');
	}
}