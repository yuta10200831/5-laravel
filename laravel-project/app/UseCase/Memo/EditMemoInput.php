<?php

namespace App\UseCase\Memo;

use App\Models\Memo;

class EditMemoInput
{
    private $memoId;
    private $title;
    private $content;

    public function __construct(int $memoId, string $title, string $content)
    {
        $this->memoId = $memoId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getMemoId(): int
    {
        return $this->memoId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}