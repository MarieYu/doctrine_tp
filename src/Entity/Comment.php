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

	/** 
	* @ManyToOne(targetEntity="Entity\User") 
	* @JoinColumn(name="user_id", referencedColumnName="id")
	*/
	private $author;

	/**
	* @ManyToOne(targetEntity="Entity\Post", inversedBy="comments")
	* @JoinColumn(name="post_id", referencedColumnName="id")
	*/
	private $post;

	public function __construct($message, User $user, Post $post){
		$this->message = $message;
		$this->date = new \Datetime();
		$this->author = $user;
		$this->post = $post;
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
	
	public function getAuthor(){
		return $this->author->getUsername();
	}
}