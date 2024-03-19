<?php

namespace App\UseCase\Memo;

use App\Models\ValueObjects\Title;
use App\Models\ValueObjects\Content;

class CreateMemoInput
{
    private $title;
    private $content;

    public function __construct(Title $title, Content $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getContent(): Content
    {
        return $this->content;
    }
}