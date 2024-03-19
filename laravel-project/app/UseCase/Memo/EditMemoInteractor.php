<?php

namespace App\UseCase\Memo;

use App\Models\Memo;
use App\Models\ValueObjects\Title;
use App\Models\ValueObjects\Content;

class EditMemoInteractor
{
    public function handle(EditMemoInput $input): EditMemoOutput
    {
        $titleValue = $input->getTitle()->getValue();
        $contentValue = $input->getContent()->getValue();

        $memo = Memo::findOrFail($input->getMemoId());
        $memo->update([
            'title' => $titleValue,
            'content' => $contentValue,
        ]);

        return new EditMemoOutput(true, 'Memo updated successfully.', $memo);
    }
}