<?php 
//User.php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
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

	/** 
	* @ManyToOne(targetEntity="Entity\User") 
	* @JoinColumn(name="user_id", referencedColumnName="id")
	*/
	private $author;

	/**
	*	@OneToMany(targetEntity="Entity\Comment", mappedBy="post")
	*/
	private $comments;




	public function __construct($subject, $message, User $user) {
		$this->subject = $subject;
		$this->message = $message;
		$this->date = new \Datetime();
		$this->author = $user;
		$this->comments = new ArrayCollection(); //arraycollection (classe Doctrine) pour gérer des objets
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

	public function getAuthor(){
		return $this->author->getUsername();
	}

	public function getComments(){
		return $this->comments; 
	}


}


