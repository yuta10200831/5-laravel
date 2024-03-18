<!DOCTYPE html>
<html lang="ja">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>トップページ</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

 <header class="bg-blue-900 text-white text-center py-4">
  <h1 class="text-xl">メモ一覧</h1>
 </header>

 <div class="container mx-auto px-4 mt-6">
  <div class="mb-4 text-right">
   <form action="{{ route('memos.index') }}" method="GET">
    <div class="flex">
     <input type="text" name="search" class="shadow appearance-none border rounded py-2 px-3 mr-4 text-grey-darker"
      placeholder="検索" value="{{ request('search') }}">
     <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">検索</button>
    </div>
   </form>
   <a href="{{ route('memos.create') }}"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">新規作成</a>
  </div>

  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
   <table class="table-auto w-full">
    <thead>
     <tr class="bg-gray-200">
      <th class="px-4 py-2">タイトル</th>
      <th class="px-4 py-2">内容</th>
      <th class="px-4 py-2">作成日時</th>
      <th class="px-4 py-2">操作</th>
     </tr>
    </thead>
    <tbody>
     @foreach ($memos as $memo)
     <tr>
      <td class="border px-4 py-2">{{ $memo->title }}</td>
      <td class="border px-4 py-2">{{ $memo->content }}</td>
      <td class="border px-4 py-2">{{ $memo->created_at->format('Y-m-d H:i:s') }}</td>
      <td class="border px-4 py-2">
       <a href="{{ route('memos.edit', $memo) }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">編集</a>
       <form action="{{ route('memos.destroy', $memo) }}" method="post" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">削除</button>
       </form>
      </td>
     </tr>
     @endforeach
    </tbody>
   </table>
   <!-- ページネーションリンク -->
   <div class="mt-4">
    {{ $memos->appends(['search' => request('search')])->links() }}
   </div>
  </div>
 </div>

</body>

</html>