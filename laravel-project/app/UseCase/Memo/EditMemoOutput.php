<?php

namespace App\UseCase\Memo;

use App\Models\Memo;

class EditMemoOutput
{
    private $success;
    private $message;
    private $memo;

    public function __construct(bool $success, string $message, Memo $memo)
    {
        $this->success = $success;
        $this->message = $message;
        $this->memo = $memo;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getMemo(): Memo
    {
        return $this->memo;
    }
}