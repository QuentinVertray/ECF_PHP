<?php

namespace ECF;

class User{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    private string $password;
    private string $role;

    /**
     * @param string $mdp
     * @return bool
     */
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

    /**
     * @return string
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void{
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUsername(): string{
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void{
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string{
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }


}