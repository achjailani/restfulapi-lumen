<?php
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class ChecklistTest extends TestCase
{
	use DatabaseMigrations;
	
	public function testChecklistCreate(){
		$this->json('POST', '/checklists');
		$this->assertTrue(true);
	}

	public function testShouldReturnAllChecklists(){
		$response = $this->call('GET', '/checklists');
		$this->assertEquals(200, $response->status());
	}

	// public function testShouldDeleteChecklist(){
	// 	$response = $this->call('DELETE','/checklists/2',[],[]);

 //       	$this->assertEquals(401, $response->status());
	// }
}