<?php


namespace Model\Entity;


use Model\Entity\ChatRoom;
use Model\Entity\User;

class Message{
    private ?int $id;
    private ?string $content;
    private ?int $date;
    private ?User $user;
    private ?ChatRoom $chatRoom;

    /**
     * Message constructor.
     * @param int $id
     * @param string|null $text
     * @param int|null $date
     * @param User|null $user
     * @param ChatRoom|null $chatRoom
     */
    public function __construct(int $id, ?string $content = null, ?int $date = null, ?User $user = null, ?ChatRoom $chatRoom = null)    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->user = $user;
        $this->chatRoom = $chatRoom;
    }

    /**
     * set content
     * @param string|null $content
     * @return Message
     */
    public function setContent(?string $content): Message    {
        $this->content = $content;
        return $this;
    }

    /**
     * set date
     * @param int|null $date
     * @return Message
     */
    public function setDate(?int $date): Message    {
        $this->date = $date;
        return $this;
    }

    /**
     * set user
     * @param User|null $user
     * @return Message
     */
    public function setUserID(?User $user): Message    {
        $this->user = $user;
        return $this;
    }

    /**
     * set chatroom
     * @param ChatRoom|null $chatRoom
     * @return Message
     */
    public function setChatRoom(?ChatRoom $chatRoom): Message    {
        $this->chatRoom = $chatRoom;
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
     * get content
     * @return string|null
     */
    public function getContent(): ?string    {
        return $this->content;
    }

    /**
     * get date
     * @return int|null
     */
    public function getDate(): ?int    {
        return $this->date;
    }

    /**
     * get user
     * @return User|null
     */
    public function getUser(): ?User   {
        return $this->user;
    }

    /**
     * get chatroom id
     * @return ChatRoom|null
     */
    public function getChatRoom(): ?ChatRoom    {
        return $this->chatRoom;
    }

}