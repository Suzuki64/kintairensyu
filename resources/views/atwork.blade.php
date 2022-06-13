@extends('layouts.layout')
<style>

</style>

@section('content')
<form action="/leave" method="post">
@csrf
  <div class=btn_attendance>
    <input type="submit" value=勤務終了>
  </div>

  <table>
    <tr>
      <th>名前</th>
      <th>開始時間</th>
      <th>終了時間</th>
    </tr>
    <tr>
      <td><input type="text" name="name" value={{$name}} disabled></td>
      <td>{{$attdtime}}</td>
      <td></td>
    </tr>
  </table>
</form>

@endsection
  