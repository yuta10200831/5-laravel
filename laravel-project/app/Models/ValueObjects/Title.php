<?php

namespace App\Models\ValueObjects;

class Title
{
    private $title;
    private const MAX_LENGTH = 10;

    public function __construct(string $title)
    {
        $this->validate($title);
        $this->title = $title;
    }

    private function validate(string $title): void
    {
        if (empty($title)) {
            throw new \InvalidArgumentException('タイトルは空にできません。');
        }

        if (mb_strlen($title) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException('タイトルは10文字以内である必要があります。');
        }
    }

    public function getValue(): string
    {
        return $this->title;
    }
}