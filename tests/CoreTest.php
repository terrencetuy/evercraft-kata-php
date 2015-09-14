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


	// Feature: Alignment
	// --------------------
	public function testGetAlignmentDefault(){
		$character = new Character();
		$characterAlignment = $character->getAlignment();
		$this->assertEquals(Character::NEUTRAL, $characterAlignment);
	}

	public function testGetGoodAlignment(){
		$character = new Character('fred', Character::GOOD);
		$characterAlignment = $character->getAlignment();
		$this->assertEquals(Character::GOOD, $characterAlignment);
	}

	public function testSetAlignment(){
		$character = new Character();
		$character->setAlignment(Character::EVIL);
		$characterAlignment = $character->getAlignment();
		$this->assertEquals(Character::EVIL, $characterAlignment);
	}

	/**
	 * @expectedException Exception
	 */
	public function testSetInvalidAlignment(){
		$character = new Character();
		$character->setAlignment('hi');
	}

}
?>
