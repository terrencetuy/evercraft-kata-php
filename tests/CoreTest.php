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

	// Feature: Character can attack
	// ----------------------------
	public function testCharacterSuccessfulAttack(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 20);
		$this->assertEquals(true, $attackResult);
	}


	public function testCharacterUnsuccessfulAttack(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 1);
		$this->assertEquals(false, $attackResult);
	}

	
	public function testCharacterSuccessfulAttackRollEqualsArmorClass(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 10);
		$this->assertEquals(true, $attackResult);
	}


	/**
	 * @expectedException Exception
	 */
	public function testCharacterAttackRollTooHigh(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 100);
	}


	/**
	 * @expectedException Exception
	 */
	public function testCharacterAttackRollTooLow(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 0);
	}


	/**
	 * @expectedException Exception
	 */
	public function testCharacterAttackRollNotANumber(){
		$attacker = new Character();
		$attackee = new Character();

		$attackResult = $attacker->attack($attackee, 'hello');
	}

	// ---------------------------------------------
	// ---------------------------------------------


	// Feature: Character can be damaged
	// ---------------------------------
	public function testCharacterTakesDamage(){
		$attacker = new Character();
		$attackee = new Character();

		// this should be a successful attack
		$attackResult = $attacker->attack($attackee, 15);
		$attackeeHitPoints = $attackee->hitPoints();
		$this->assertEquals(4, $attackeeHitPoints);
	}


	public function testCharacterTakesDamageCriticalHit(){
		$attacker = new Character();
		$attackee = new Character();

		// this should be a crititcal hit
		$attackResult = $attacker->attack($attackee, 20);
		$attackeeHitPoints = $attackee->hitPoints();
		$this->assertEquals(3, $attackeeHitPoints);
	}


	public function testCharacterWithZeroHitPointsIsDead(){
		$character = new Character(null, null, 0);
		$characterIsAlive = $character->isAlive();
		$this->assertEquals(false, $characterIsAlive);
	}


	public function testCharacterWithNegativeHitPointsIsDead(){
		$character = new Character(null, null, -5);
		$characterIsAlive = $character->isAlive();
		$this->assertEquals(false, $characterIsAlive);
	}


	public function testCharacterWithPositiveHitPointsIsAlive(){
		$character = new Character(null, null, 5);
		$characterIsAlive = $character->isAlive();
		$this->assertEquals(true, $characterIsAlive);
	}
}
?>
