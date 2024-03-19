<?php

namespace App\UseCase\Memo;

use App\UseCase\Memo\CreateMemoInput;
use App\UseCase\Memo\CreateMemoOutput;
use App\Models\Memo;

class CreateMemoInteractor
{
    public function handle(CreateMemoInput $input): CreateMemoOutput
    {
        $memo = Memo::create([
            'title' => $input->title,
            'content' => $input->content,
        ]);

        return new CreateMemoOutput($memo);
    }
}