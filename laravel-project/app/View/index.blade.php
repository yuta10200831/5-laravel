@foreach ($memos as $memo)
<div>{{ $memo->title }}</div>
<div>{{ $memo->content }}</div>
<a href="{{ route('memos.show', $memo) }}">詳細</a>
<a href="{{ route('memos.edit', $memo) }}">編集</a>
<form method="POST" action="{{ route('memos.destroy', $memo) }}">
 @csrf
 @method('DELETE')
 <button type="submit">削除</button>
</form>
@endforeach

<a href="{{ route('memos.create') }}">新規作成</a>