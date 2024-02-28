<?php

namespace ECF;

class Comments{
    private int $id;
    private string $name;
    private string $email;
    private string $body;
    private string $createdAt;
    private int $postId;

    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string{
        return $this->email;
    }

    /**
     * @return string
     */
    public function getBody(): string{
        return $this->body;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string{
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getPostId(): int{
        return $this->postId;
    }

}