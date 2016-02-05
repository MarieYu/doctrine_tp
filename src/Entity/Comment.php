<?php 
//User.php

namespace Entity;

/** 
	* @Entity 
	* @Table(name="comment")
*/

class Comment{

	/** 
		* @Id
		* @Column(name="id", type="integer") 
		* @GeneratedValue
	*/
	private $id;

	/** @Column (name="message", type="text") */
	private $message;

	/** @Column (name="date", type="datetime") */
	private $date;

	public function __construct($message){
		$this->message = $message;
		$this->date = new \Datetime();
	}

	public function getId(){
		return $this->id;
	}

	public function getMessage(){
		return $this->message;
	}

	public function getDate(){
		return $this->date->format('d-m-Y H:i:s');
	}
	
}