<?php 
//User.php

namespace Entity;

/** 
	* @Entity 
	* @Table(name="user")
*/

class User{

	/** 
		* @Id
		* @Column(name="id", type="integer") 
		* @GeneratedValue
	*/
	private $id;

	/**
		* @Column(name="email", type="string", length=50)
	*/
	private $email;

	/** @Column(name="username", type="string", length=200) */
	private $username;

	/** @Column(name="password", type="string", length=50) */
	private $password;

	/** @Column(name="description", type="text") */
	private $description;

	/** @Column(name="firstname", type="string", length=50) */
	private $firstname;

	/** @Column(name="lastname", type="string", length=50) */
	private $lastname;

	/** @Column(name="birthDate", type="date", length=30) */
	private $birthDate;


	public function __construct($email, $username, $password, $description, $firstname, $lastname, $birthDate){
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->description = $description;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->birthDate = new \DateTime($birthDate);
	}

	public function getId(){
		return $this->id;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getFirstname(){
		return $this->firstname;
	}
	public function getLastname(){
		return $this->lastname;
	}
	public function getBirthDate(){
		return $this->birthDate->format('d-m-Y');
	}


}