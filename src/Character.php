<?php
class Character{

	private $name;

	public function __construct($name=null){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

}
?>
