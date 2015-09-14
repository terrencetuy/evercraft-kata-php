<?php
class Character{

	const EVIL = -1;
	const NEUTRAL = 0;
	const GOOD = 1;


	private $name;


	public function __construct($name=null, $alignment=null){
		$this->name = $name;

		// Setting alignment
		//    have to use this syntax because php's case 
		//    doesn't do === to compare
		// N.B. I hate this
		switch( true ){
			case ( $alignment === null ):
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
	}


	public function name(){
		return $this->name;
	}


	public function alignment(){
		return $this->alignment;
	}

}
?>
