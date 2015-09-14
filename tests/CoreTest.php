<?php
require_once('../src/Character.php');
class CoreTest extends PHPUnit_Framework_TestCase
{

	// Feature: Create a character
	// --------------------------
	public function testGetNameDefault(){
		$character = new Character();
		$characterName = $character->name();
		$this->assertEquals(null, $characterName);
	}


	public function testGetNameFred(){
		$character = new Character('fred');
		$characterName = $character->name();
		$this->assertEquals('fred', $characterName);
	}

	// ---------------------------------------------
	// ---------------------------------------------


	// Feature: Alignment
	// --------------------
	public function testGetAlignmentDefault(){
		$character = new Character();
		$characterAlignment = $character->alignment();
		$this->assertEquals(Character::NEUTRAL, $characterAlignment);
	}


	public function testGetGoodAlignment(){
		$character = new Character('fred', Character::GOOD);
		$characterAlignment = $character->alignment();
		$this->assertEquals(Character::GOOD, $characterAlignment);
	}


	/**
	 * @expectedException Exception
	 */
	public function testSetInvalidAlignment(){
		$character = new Character(null, 'hi');
	}

	// ---------------------------------------------
	// ---------------------------------------------


	// Feature: Armor Class & Hit Points
	// ---------------------------------
	public function testArmorClassDefault(){
		$character = new Character();
		$characterArmorClass = $character->armorClass();
		$this->assertEquals(10, $characterArmorClass);
	}


	public function testHitPointDefault(){
		$character = new Character();
		$characterHitPoints = $character->hitPoints();
		$this->assertEquals(5, $characterHitPoints);
	}

	// ---------------------------------------------
	// ---------------------------------------------
}
?>
