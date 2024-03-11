<form method="POST" action="{{ route('memos.update', $memo) }}">
 @csrf
 @method('PUT')
 <label for="title">タイトル</label>
 <input type="text" name="title" id="title" value="{{ $memo->title }}">
 <label for="content">内容</label>
 <textarea name="content" id="content">{{ $memo->content }}</textarea>
 <button type="submit">更新</button>
</form>