<?php

namespace ECF;

use DateTime;
use Exception;

class Posts{
    private int $id;
    private string $title;
    private string $body;
    private string $createdAt;
    private string $author;


    /**
     * @throws Exception
     */
    public function loadFromDb(array $data): void
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->author = $data['author'];
        $this->createdAt = $data['createdAt'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }


}