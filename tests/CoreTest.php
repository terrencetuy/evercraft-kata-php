<?php
require_once('../src/Character.php');
class CoreTest extends PHPUnit_Framework_TestCase
{

	// Feature: Create a character
	// --------------------------
	public function testGetNameDefault(){
		$character = new Character();
		$characterName = $character->getName();
		$this->assertEquals(null, $characterName);
	}


	public function testGetNameFred(){
		$character = new Character('fred');
		$characterName = $character->getName();
		$this->assertEquals('fred', $characterName);
	}


	public function testSetName(){
		$character = new Character('fred');
		$character->setName('roger');
		$characterName = $character->getName();
		$this->assertEquals('roger', $characterName);
	}

	// ---------------------------------------------

}
?>
