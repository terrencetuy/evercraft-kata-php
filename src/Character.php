<?php
class Character{

	const EVIL = -1;
	const NEUTRAL = 0;
	const GOOD = 1;


	private $name;

	public function __construct($name=null, $alignment=null){
		$this->name = $name;
		$this->alignment = self::NEUTRAL;
		if( $alignment ){
			$this->setAlignment($alignment);;
		}
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getAlignment(){
		return $this->alignment;
	}

	public function setAlignment($alignment){
		if( $alignment !== self::EVIL && $alignment !== self::NEUTRAL && $alignment !== self::GOOD ){
			throw new Exception('Unknown Alignment: ' . $alignment);
		}
		$this->alignment = $alignment;
	}

}
?>
