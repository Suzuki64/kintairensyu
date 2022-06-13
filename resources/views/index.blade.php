@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@if(!empty($record->value('leave')) || $record->value('date')!=$now->toDatestring())
  <form action="/atwork" method="post">
  @csrf
    <div class=btnbox>
      <input type="submit" value=勤務開始 class=attd_btn>
    </div>
    <table>
      <tr>
        <th>名前</th>
        <th>開始時間</th>
        <th>終了時間</th>
      </tr>
      <tr>
        <td>
          <input type="text" name="name" value="{{$name}}" class=name disabled>
        </td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </form>

@else

<div class=message>{{$message}}</div>

  <form action="/leave" method="post">
  @csrf
    <div class=btnbox>
      <input type="submit" value=勤務終了 class=attd_btn>
    </div>
    <table>
      <tr>
        <th>名前</th>
        <th>開始時間</th>
        <th>終了時間</th>
      </tr>
      <tr>
        <td>
          <input type="text" name="name" value={{$name}} class=name disabled>
        </td>
        <td>{{$attdtime}}</td>
        <td></td>
      </tr>
    </table>
  </form>
@endif
@endsection
  