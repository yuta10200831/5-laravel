<!DOCTYPE html>
<html lang="ja">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>エラー</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
 <div class="container mx-auto px-4 mt-6">
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 text-center">
   <h1 class="text-xl font-bold mb-4">エラーが発生しました</h1>
   @if ($errors->any())
   <div class="mb-4">
    <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
    </ul>
   </div>
   @else
   <p>タイトルまたは本文が入力されていません</p>
   @endif
   <a href="{{ url('/') }}"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    トップページに戻る
   </a>
  </div>
 </div>
</body>

</html>