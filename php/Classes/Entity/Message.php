<?php


namespace App\Classes\Entity;

class Message{
    private int $id;
    private ?string $text;
    private ?int $date;
    private ?int $userID;
    private ?int $chatRoom;

    /**
     * Message constructor.
     * @param int $id
     * @param string|null $text
     * @param int|null $date
     * @param int|null $userID
     * @param int|null $chatRoom
     */
    public function __construct(int $id, ?string $text, ?int $date, ?int $userID, ?int $chatRoom)    {
        $this->id = $id;
        $this->text = $text;
        $this->date = $date;
        $this->userID = $userID;
        $this->chatRoom = $chatRoom;
    }

    /**
     * set text
     * @param string|null $text
     * @return Message
     */
    public function setText(?string $text): Message
    {
        $this->text = $text;
        return $this;
    }

    /**
     * set date
     * @param int|null $date
     * @return Message
     */
    public function setDate(?int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    /**
     * set user
     * @param int|null $userID
     * @return Message
     */
    public function setUserID(?int $userID): Message
    {
        $this->userID = $userID;
        return $this;
    }

    /**
     * set chatroom
     * @param int|null $chatRoom
     * @return Message
     */
    public function setChatRoom(?int $chatRoom): Message
    {
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
     * get text
     * @return string|null
     */
    public function getText(): ?string    {
        return $this->text;
    }

    /**
     * get date
     * @return int|null
     */
    public function getDate(): ?int    {
        return $this->date;
    }

    /**
     * get user id
     * @return int|null  PRIMARY KEY (`id`))
ENGINE = InnoDB
     */
    public function getUserID(): ?int    {
        return $this->userID;
    }

    /**
     * get chatroom id
     * @return int|null
     */
    public function getChatRoom(): ?int    {
        return $this->chatRoom;
    }

    /**
    * get a array with information
    * @return array
    */
    public function getData() : array    {
        $array['id'] = $this->getId();
        $array['text'] = $this->getText();
        $array['date'] = $this->getDate();
        $array['user_id'] = $this->getUserID();
        $array['chat_room_id'] = $this->getChatRoom();

        return $array;
    }
}