<?php

namespace src\Models;

class User {
    private $id;
    private $nom;
    private $prénom;
    private $email;
    private $password;
    private $role;
    private $actif;

    // Constructor for the first step of user creation process
    public function __construct($nom, $prénom, $email) {
        $this->nom = $nom;
        $this->prénom = $prénom;
        $this->email = $email;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrénom() {
        return $this->prénom;
    }

    public function setPrénom($prénom) {
        $this->prénom = $prénom;
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

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getActif() {
        return $this->actif;
    }

    public function setActif($actif) {
        $this->actif = $actif;
    }
}

?>
