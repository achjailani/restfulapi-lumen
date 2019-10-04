<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Support\CreateChecklistResponse;
use App\Checklist;


class ChecklistController extends Controller
{

	public function createChecklistData(Request $request){
		
		$request_data = $request->json()->all();

		$attributes = $request_data['data']['attributes'];

		if(isset($attributes['due'])){
			$attributes['due'] = (new \DateTime($attributes['due']))->format("Y-m-d h:i:s");
		}
		
		Checklist::create($attributes);
		$checklist = Checklist::latest()->first();

		return response(
			new CreateChecklistResponse($checklist)
		);
	}

	public function showAllChecklistData(){
		return CreateChecklistResponse::collection(
			Checklist::paginate()
		);
	}

	public function showChecklistById($checklistId){

		return response(
			new CreateChecklistResponse(
				Checklist::find($checklistId
				)
			));
	}

	public function updateChecklistData(Request $request, $checklistId){

		$request_data = $request->json()->all();
		$attributes   = $request_data['data']['attributes'];

		if(isset($attributes['due'])){
			$attributes['due'] = (new \DateTime($attributes['due']))->format("Y-m-d h:i:s");
		}

		$checklist = Checklist::findOrFail($checklistId);

		$checklist->update($attributes);

		return response(
			new CreateChecklistResponse(
				Checklist::find($checklistId)
			)
		);
	}

	public function deleteChecklistData($checklistId)
	{
		\App\Checklist::find($checklistId)->delete();
		return response()->json('Checklist has been removed successfully!');
	}

}