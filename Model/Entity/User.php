<?php


namespace Model\Entity;

class User{

    private int $id;
    private ?string $username;
    private ?string $password;
    private ?string $mail;
    private ?string $image;
    private ?bool $validation;
    private ?string $key;
    private ?bool $dataAutorisation;

    /**
     * User constructor.
     * @param int $id
     * @param string|null $username
     * @param string|null $password
     * @param string|null $mail
     * @param string|null $image
     * @param bool|null $validation
     * @param string|null $key
     * @param bool|null $dataAutorisation
     */
    public function __construct(int $id, string $username , string $password, string $mail, ?string $image, ?bool $validation, ?string $key, ?bool $dataAutorisation)    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->image = $image;
        $this->validation = $validation;
        $this->key = $key;
        $this->dataAutorisation = $dataAutorisation;
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
    public function setPassword(?string $password): User    {
        $this->password = $password;
        return $this;
    }

    /**
     * set the mail
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * set image
     * @param string|null $image
     * @return User
     */
    public function setImage(?string $image): User    {
        $this->image = $image;
        return $this;
    }

    /**
     * get id
     * @return int
     */
    public function getId(): int    {
        return $this->id;
    }

    /**
     * get username
     * @return string|null
     */
    public function getUsername(): ?string    {
        return $this->username;
    }

    /**
     * get password
     * @return string|null
     */
    public function getPassword(): ?string    {
        return $this->password;
    }

    /**
     * get mail
     * @return string|null
     */
    public function getMail(): ?string    {
        return $this->mail;
    }

    /**
     * get image
     * @return string|null
     */
    public function getImage(): ?string    {
        return $this->image;
    }

    /**
     * set validation
     * @param int|null $validation
     * @return User
     */
    public function setValidation(?int $validation): User    {
        if ($validation === 0){
            $this->validation = false;
        }
        else{
            $this->validation = true;
        }
        return $this;
    }

    /**
     * set validation key
     * @param string|null $key
     * @return User
     */
    public function setKey(?string $key): User    {
        $this->key = $key;
        return $this;
    }

    /**
     * set data autorisation
     * @param int|null $dataAutorisation
     * @return User
     */
    public function setDataAutorisation(?int $dataAutorisation): User    {
        if ($dataAutorisation === 0){
            $this->dataAutorisation = false;
        }
        else{
            $this->dataAutorisation = true;
        }
        return $this;
    }

    /**
     * get validation
     * @return bool|null
     */
    public function getValidation(): ?bool    {
        return $this->validation;
    }

    /**
     * get key
     * @return string|null
     */
    public function getKey(): ?string    {
        return $this->key;
    }

    /**
     * get data autorisation
     * @return bool|null
     */
    public function getDataAutorisation(): ?bool    {
        return $this->dataAutorisation;
    }

}