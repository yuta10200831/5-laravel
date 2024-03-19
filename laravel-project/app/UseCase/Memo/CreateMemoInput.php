<?php

namespace App\UseCase\Memo;

class CreateMemoInput
{
    public $title;
    public $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
}