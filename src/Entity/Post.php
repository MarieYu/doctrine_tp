<?php 
//User.php

namespace Entity;

/** 
	* @Entity (repositoryClass="Repository\PostRepository")
	* @Table(name="post")
*/

class Post{

	/** 
		* @Id
		* @Column(name="id", type="integer") 
		* @GeneratedValue
	*/
	private $id;

	/** @Column (name="subject", type="string", length=255) */
	private $subject;

	/** @Column (name="date", type="datetime") */
	private $date;

	/** @Column (name="message", type="text") */
	private $message;


	public function __construct($subject, $message){
		$this->subject = $subject;
		$this->message = $message;
		$this->date = new \Datetime();
	}


	public function getSubject(){
		return $this->subject;
	}

	public function getMessage(){
		return $this->message;
	}

	public function getDate(){
		return $this->date->format('d-m-Y H:i:s');
	}

	public function getId(){
		return $this->id;
	}

	public function setSubject($subject){
		$this->subject = $subject;
		return $this;
	}

	public function setMessage($message){
		$this->message = $message;
		return $this;
	}
}


