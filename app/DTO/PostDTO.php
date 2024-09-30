<?php

namespace App\DTO;

class PostDTO
{
    public $title;
    public $content;
    public $author;

    public function __construct($title, $content, $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->author,
        ];
    }
}
