<?php


namespace Model\Entity;

use Model\Entity\User;
use Model\Entity\Message;

class PrivateMessage{
    private ?int $id;
    private ?Message $message;
    private ?User $user1;
    private ?User $user2;

    /**
     * PrivateMessage constructor.
     * @param int|null $id
     * @param \Model\Entity\Message|null $messageID
     * @param \Model\Entity\User|null $user1
     * @param \Model\Entity\User|null $user2
     */
    public function __construct(?int $id, ?Message $messageID = null, ?User $user1 = null, ?User $user2 = null)    {
        $this->id = $id;
        $this->message = $messageID;
        $this->user1 = $user1;
        $this->user2 = $user2;
    }

    /**
     * get id
     * @return int
     */
    public function getId(): int    {
        return $this->id;
    }

    /**
     * set message id
     * @return \Model\Entity\Message|null
     */
    public function getMessageID(): ?Message    {
        return $this->message;
    }

    /**
     * get message id
     * @param \Model\Entity\Message|null $message
     * @return PrivateMessage
     */
    public function setMessageID(?Message $message): PrivateMessage    {
        $this->message = $message;
        return $this;
    }

    /**
     * get user 1
     * @return \Model\Entity\User|null
     */
    public function getUser1(): ?User    {
        return $this->user1;
    }

    /**
     * set user 1
     * @param \Model\Entity\User|null $user1
     * @return PrivateMessage
     */
    public function setUser1(?User $user1): PrivateMessage    {
        $this->user1 = $user1;
        return $this;
    }

    /**
     * return a user 2
     * @return \Model\Entity\User|null
     */
    public function getUser2(): ?User    {
        return $this->user2;
    }

    /**
     * set user 2
     * @param \Model\Entity\User|null $user2
     * @return PrivateMessage
     */
    public function setUser2ID(?User $user2): PrivateMessage    {
        $this->user2 = $user2;
        return $this;
    }



}