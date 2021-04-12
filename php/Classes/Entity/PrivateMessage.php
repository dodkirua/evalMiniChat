<?php


namespace App\Classes\Entity;


class PrivateMessage{
    private int $id;
    private ?int $messageID;
    private ?int $user1ID;
    private ?int $user2ID;

    /**
     * PrivateMessage constructor.
     * @param int $id
     * @param int|null $messageID
     * @param int|null $user1ID
     * @param int|null $user2ID
     */
    public function __construct(int $id, ?int $messageID, ?int $user1ID, ?int $user2ID)    {
        $this->id = $id;
        $this->messageID = $messageID;
        $this->user1ID = $user1ID;
        $this->user2ID = $user2ID;
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
     * @return int|null
     */
    public function getMessageID(): ?int    {
        return $this->messageID;
    }

    /**
     * get message id
     * @param int|null $messageID
     * @return PrivateMessage
     */
    public function setMessageID(?int $messageID): PrivateMessage    {
        $this->messageID = $messageID;
        return $this;
    }

    /**
     * get user 1 id
     * @return int|null
     */
    public function getUser1ID(): ?int    {
        return $this->user1ID;
    }

    /**
     * set user 1 id
     * @param int|null $user1ID
     * @return PrivateMessage
     */
    public function setUser1ID(?int $user1ID): PrivateMessage    {
        $this->user1ID = $user1ID;
        return $this;
    }

    /**
     *
     * @return int|null
     */
    public function getUser2ID(): ?int    {
        return $this->user2ID;
    }

    /**
     * @param int|null $user2ID
     * @return PrivateMessage
     */
    public function setUser2ID(?int $user2ID): PrivateMessage    {
        $this->user2ID = $user2ID;
        return $this;
    }



}