<?php

namespace App\Models\ValueObjects;

class Content
{
    private $content;
    private const MAX_LENGTH = 200;

    public function __construct(string $content)
    {
        $this->validate($content);
        $this->content = $content;
    }

    private function validate(string $content): void
    {
        if (empty($content)) {
            throw new \InvalidArgumentException('内容は空にできません。');
        }

        if (mb_strlen($content) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException('内容は200文字以内である必要があります。');
        }
    }

    public function getValue(): string
    {
        return $this->content;
    }
}