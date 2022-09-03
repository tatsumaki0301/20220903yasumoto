@extends('layouts.default')
<style>
  .main-area{
    width: 100%;
    text-align: center;
    margin-top: 300px;
  }
  p {
    font-size: 20px;
  }
  .topbutton{
    border: none;
    background-color: white;
    font-size: 15px;
    margin-top: 20px;
  }
</style>

@section('title', 'COACHTECH')

@section('content')

<div class="main-area">
  <p>ご意見いただきありがとうございました。</p>
  <button class="topbutton"><a href="/">トップページへ</a></button>
</div>

@endsection