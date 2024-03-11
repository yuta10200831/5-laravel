<form method="POST" action="{{ route('memos.store') }}">
 @csrf
 <label for="title">タイトル</label>
 <input type="text" name="title" id="title">
 <label for="content">内容</label>
 <textarea name="content" id="content"></textarea>
 <button type="submit">送信</button>
</form>