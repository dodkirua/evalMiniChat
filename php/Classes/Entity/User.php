<?php


namespace App\Classes\Entity;


class User{

    private int $id;
    private ?string $username;
    private ?string $password;
    private ?string $mail;
    private ?string $image;

    /**
     * User constructor.
     * @param int $id
     * @param string|null $username
     * @param string|null $password
     * @param string|null $mail
     * @param string|null $image
     */
    public function __construct(int $id, ?string $username , ?string $password, ?string $mail, ?string $image)    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->image = $image;
    }

    /**
     * set the username
     * @param string|null $username
     * @return User
     */
    public function setUsername(?string $username): User    {
        $this->username = $username;
        return $this;
    }

    /**
     * szt the password
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * set the mail
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * set image
     * @param string|null $image
     * @return User
     */
    public function setImage(?string $image): User
    {
        $this->image = $image;
        return $this;
    }

    /**
     * get id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * get username
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * get password
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * get mail
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * get image
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }



}