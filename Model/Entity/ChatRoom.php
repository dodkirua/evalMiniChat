<?php


namespace Model\Entity;

class ChatRoom{
    private int $id;
    private ?string $name;

    /**
     * ChatRoom constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id,string $name)    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * get id
     * @return int
     */
    public function getId(): int    {
        return $this->id;
    }

    /**
     * get name
     * @return string|null
     */
    public function getName(): ?string    {
        return $this->name;

    }

    /**
     * set the name
     * @param string|null $name
     * @return ChatRoom
     */
    public function setName(?string $name): ChatRoom    {
        $this->name = $name;
        return $this;
    }

    /**
     * return the Chatroom information in a array
     * @return array
     */
    public function getAll() : array {
        $array['id'] = $this->getId();
        $array['name'] = $this->getName();
        return $array;
    }
}