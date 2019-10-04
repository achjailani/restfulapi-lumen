<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	/**
	*
	* The table associated with the model
	* @var string 
	*/
	protected $table = 'templates';

	/**
	*
	* The primary key associated with the table 
	* @var int
	*/
	protected $primarykey = 'id_template';

	/**
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'item_id', 'checklist_id'
	];

	public function checklist(){
		return $this->belongsTo('App\Checklist', 'checklist_id');
	}

	public function items(){
		return $this->belongsTo('App\Item', 'item_id');
	}
}