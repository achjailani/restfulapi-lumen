<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    //return $router->app->version();

	return view('home');
});



$router->post('/checklists', 
	'ChecklistController@createChecklistData'
);

$router->get('/checklists/{checklistId}', [
	'as' => 'get_data_by_id',
	'uses' => 'ChecklistController@showChecklistById'
]);

$router->patch('/checklists/{checklistId}', 
	'ChecklistController@updateChecklistData'
);

$router->delete('/checklists/{checklistId}', 
	'ChecklistController@deleteChecklistData'
);

$router->get('/checklists', 
	'ChecklistController@showAllChecklistData'
);


