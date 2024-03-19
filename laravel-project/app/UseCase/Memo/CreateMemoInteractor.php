<?php

namespace App\UseCase\Memo;

use App\Models\Memo;
use App\Models\ValueObjects\Title;
use App\Models\ValueObjects\Content;

class CreateMemoInteractor
{
    public function handle(CreateMemoInput $input): CreateMemoOutput
    {
        $titleValue = $input->getTitle()->getValue();
        $contentValue = $input->getContent()->getValue();

        $memo = Memo::create([
            'title' => $titleValue,
            'content' => $contentValue,
        ]);

        return new CreateMemoOutput($memo);
    }
}