<?php
namespace App\Http\Support;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateChecklistResponse extends JsonResource
{

	public function toArray($request){

		return [
			'type' => 'checklists',
		    'id' => $this->id_checklist,
		    'attributes' => [
		      'object_domain' => $this->object_domain,
		      'object_id' => $this->object_id,
		      'description' => $this->description,
		      'is_completed' => $this->is_completed,
		      'completed_at' => $this->completed_at,
		      'updated_by' => $this->updated_by,
		      'created_at' => $this->updated_at,
		      'updated_at' => $this->created_at,
		      'due' => $this->due,
		      'urgency' => $this->urgency,
		    ],
		    'links' => [
		     	'self' => route('get_data_by_id', ['checklistId' => $this->id_checklist])
		    ]
		];
	}
}