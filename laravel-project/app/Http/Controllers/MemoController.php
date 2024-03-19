<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Memo;
use App\UseCase\Memo\CreateMemoInput;
use App\UseCase\Memo\CreateMemoInteractor;
use App\UseCase\Memo\EditMemoInput;
use App\UseCase\Memo\EditMemoInteractor;
use App\Models\ValueObjects\Title;
use App\Models\ValueObjects\Content;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:10',
            'content' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('memos.create')
                ->withInput()
                ->withErrors($validator);
        }

        $title = new Title($request->input('title'));
        $content = new Content($request->input('content'));

        $input = new CreateMemoInput($title, $content);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:10',
            'content' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('memos.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }

        $title = new Title($request->input('title'));
        $content = new Content($request->input('content'));

        $input = new EditMemoInput($id, $title, $content);
        $interactor = new EditMemoInteractor();
        $output = $interactor->handle($input);

        return redirect()->route('memos.index')->with('success', 'メモが更新されました。');
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