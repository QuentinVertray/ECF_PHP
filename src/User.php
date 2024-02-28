<?php

namespace ECF;

class User{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    private string $password;
    private string $role;

    public function verifMDP(string $mdp) : bool{
        return $this->password === $mdp;
    }

    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPassword(): string{
        return $this->password;
    }
    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void{
        $this->role = $role;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function setUsername(string $username): void{
        $this->username = $username;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }


}