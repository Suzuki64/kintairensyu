@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

  <div class=errorbox> 
  @if (count($errors) > 0)
  <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif
  </div>
<div class="create">
  <div class="create_ttl">{{$name}}さんの勤怠</div>
  <form class="create_rec" action="/mypage/create" method="post">
  @csrf
    <input class="create_date" type="date" name="date">
    <input class="create_attn" type="time" name="attendance">
    <input class="create_lve" type="time" name="leave">
    <input type="hidden" name="user_id" value={{Auth::id()}}>
    <button class="create_btn" type="submit">作成</button>
  </form>
</div>

<form class="search" action="/mypage">
@csrf
  <table>
    <tr>
      <th>
        <div>日時</div>
      </th>
      <th>
        <div>出勤時間</div>
      </th>
      <th>
        <div>退勤時間</div>
      </th>
    </tr>
    <tr>
      <td>
        <input class="search_date" type="date" name="search_date">
      </td>
      <td>
        <input class="search_attn_from" type="time" name="search_attn_from">
        <input class="search_attn_to" type="time" name="search_attn_to">
      </td>
      <td>
        <input class="search_lve_from" type="time" name="search_lve_from">
        <input class="search_lve_to" type="time" name="search_lve_to">
      </td>
    </tr>
  </table>
  <div class="search_btn">
    <button type="submit">検索</button>
  </div>
</form>

<table>
  <tr>
    <th>日付</th>
    <th>開始時間</th>
    <th>終了時間</th>
  </tr>
  @foreach ($items as $item)
  <form action="?" method="post">
    @csrf
    <tr>
      <td>
        <input class="timeinput" type="date" name="date" value="{{$item->date}}">
      </td>
      <td>
        <input class="timeinput" type="time" name="attendance" value="{{$item->attendance}}">
      </td>
      <td>
        <input class="timeinput" type="time" name="leave" value="{{$item->leave}}">
      </td>
      <td>
        <button class="update_btn" type="submit" formaction="/mypage/update">更新</button>
      </td>
      <td>
        <button class="del_btn" type="submit" formaction="/mypage/delete">削除</button>
      </td>
      <td>
        <input type="hidden" name="id" value="{{$item->id}}">
      </td>
    </tr>
  </form>
  @endforeach
</table>

<div class="paginate">
	{{ $items->appends(request()->query())->links() }}
</div>

@endsection