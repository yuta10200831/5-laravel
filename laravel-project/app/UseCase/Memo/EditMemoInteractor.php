<?php

namespace App\UseCase\Memo;

use App\UseCase\Memo\EditMemoInput;
use App\UseCase\Memo\EditMemoOutput;
use App\Models\Memo;

class EditMemoInteractor
{
    public function handle(EditMemoInput $input): EditMemoOutput
    {
        $memo = Memo::findOrFail($input->getMemoId());
        $memo->update([
            'title' => $input->getTitle(),
            'content' => $input->getContent(),
        ]);

        return new EditMemoOutput(true, 'Memo updated successfully.', $memo);
    }
}