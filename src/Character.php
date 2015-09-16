<?php
class Character{

	const EVIL = -1;
	const NEUTRAL = 0;
	const GOOD = 1;

	const MAX_ROLL = 20;
	const MIN_ROLL = 1;


	private $name;
	private $alignment;
	private $armorClass;
	private $hitPoints;


	public function __construct($name=null, $alignment=self::NEUTRAL, $hitPoints = 5){
		$this->name = $name;

		// Setting alignment
		//    have to use this syntax because php's case 
		//    doesn't do === to compare
		// N.B. I hate this
		switch( true ){
			case ( !$alignment ):
				$this->alignment = self::NEUTRAL;
				break;

			case ( $alignment === self::EVIL ):
			case ( $alignment === self::NEUTRAL):
			case ( $alignment === self::GOOD):
				$this->alignment = $alignment;
				break;

			default:
				throw new Exception('Unknown Alignment: ' . $alignment);
		}

		$this->armorClass = 10;
		$this->hitPoints = $hitPoints;
	}


	public function name(){
		return $this->name;
	}


	public function alignment(){
		return $this->alignment;
	}


	// hardcoded because I haven't yet encountered a spec to justify otherwise
	// magic number because I know I will eventually need to de-hardcode it
	public function armorClass(){
		return 10;
	}


	public function hitPoints(){
		return $this->hitPoints;
	}


	public function damage(){
		$this->hitPoints = $this->hitPoints - 1;
	}


	public function isAlive(){
		if( $this->hitPoints > 0 ){
			return true;
		}
		return false;
	}


	public function attack($attackee, $roll){
		if( $roll > self::MAX_ROLL  || $roll < self::MIN_ROLL ){
			throw new Exception('Invalid Roll Value: ' . $roll);
		}

		if( $roll >= $this->armorClass ){
			$attackee->damage();

			// critical hit, does one more damage
			if( $roll == self::MAX_ROLL ){
				$attackee->damage();
			}

			return true;
		}
		return false;
	}

}
?>
