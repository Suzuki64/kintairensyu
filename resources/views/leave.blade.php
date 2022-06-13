@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/leave.css') }}">
@endsection

@section('content')

<div class=message>{{$message}}</div>

<table>
  <tr>
    <th>名前</th>
    <th>開始時間</th>
    <th>終了時間</th>
  </tr>
  <tr>
    <td>{{$name}}</td>
    <td>{{$attdtime}}</td>
    <td>{{$lvetime}}</td>
  </tr>
</table> 
@endsection