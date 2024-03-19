<?php

namespace App\UseCase\Memo;

use App\Models\ValueObjects\Title;
use App\Models\ValueObjects\Content;

class EditMemoInput
{
    private $memoId;
    private $title;
    private $content;

    public function __construct(int $memoId, Title $title, Content $content)
    {
        $this->memoId = $memoId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getMemoId(): int
    {
        return $this->memoId;
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