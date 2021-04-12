<?php


namespace App\Classes\Entity;


class ChatRoom{
    private int $id;
    private ?string $name;

    /**
     * ChatRoom constructor.
     * @param int $id
     */
    public function __construct(int $id)    {
        $this->id = $id;
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


}