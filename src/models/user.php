<?php

namespace src\Models;

class User {
    private $id;
    private $name;
    private $surname;
    private $phone;
    private $address;
    private $email;
    private $password;
    private $role;
    private $RGPD;

    // Constructor
    public function __construct($name, $surname, $email, $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        // $this->role = $role;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getSurname() {
        return $this->surname;
    }
    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getRGPD() {
        return $this->RGPD;
    }
    
}

?>
