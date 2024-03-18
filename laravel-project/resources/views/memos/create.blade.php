<!DOCTYPE html>
<html lang="ja">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>メモ登録</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

 <header class="bg-blue-900 text-white text-center py-4">
  <h1 class="text-xl">メモ登録</h1>
 </header>

 <div class="container mx-auto px-4 mt-6">
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
   <form method="POST" action="{{ route('memos.store') }}">
    @csrf
    <div class="mb-4">
     <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
     <input type="text" name="title" id="title"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      required>
    </div>

    <div class="mb-6">
     <label for="content" class="block text-gray-700 text-sm font-bold mb-2">本文</label>
     <textarea name="content" id="content"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      required></textarea>
    </div>

    <div class="flex items-center justify-between">
     <button type="submit"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">登録</button>
    </div>
   </form>
  </div>
 </div>

</body>

</html>