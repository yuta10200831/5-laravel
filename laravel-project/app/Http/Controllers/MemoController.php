<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Memo;
use App\UseCase\Memo\CreateMemoInput;
use App\UseCase\Memo\CreateMemoInteractor;
use App\UseCase\Memo\EditMemoInput;
use App\UseCase\Memo\EditMemoInteractor;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Memo::query();
        $search = $request->input('search');
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%" . $search . "%")
                ->orWhere('content', 'LIKE', "%" . $search . "%");
            });
        }

        $memos = $query->paginate(10);

        return view('memos.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $input = new CreateMemoInput($validatedData['title'], $validatedData['content']);
        $interactor = new CreateMemoInteractor();
        $output = $interactor->handle($input);
        return redirect()->route('memos.index')->with('success', 'メモを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memo = Memo::findOrFail($id);
        return view('memos.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = new EditMemoInput($id, $request->title, $request->content);
        $interactor = new EditMemoInteractor();
        $output = $interactor->handle($input);
        return redirect()->route('memos.index')->with('success', 'メモを作成しました。');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();
        return redirect()->route('memos.index');
    }
}