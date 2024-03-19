<?php

namespace App\UseCase\Memo;

use App\Models\Memo;

class CreateMemoOutput
{
    private $memo;

    public function __construct(Memo $memo)
    {
        $this->memo = $memo;
    }

    public function getMemo()
    {
        return $this->memo;
    }
}