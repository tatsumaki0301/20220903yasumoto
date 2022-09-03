@extends('layouts.default')
<style>

  .main{
    width: 100%;
  }
  .main-title{
    margin: 0 auto;
    text-align: center;
  }
  .main-title-item{
    margin: 0px auto;
  }
  .tablearea{
    width: 70%;
    margin: 0 auto;
  }
  .formarea{
    width: 90%;
    padding: 20px;
    margin: 20 auto 0;
    border: 1px solid black;
  }
  .form-last_name{
    width: 210px;
    padding: 10px;
  }
  .form-gender{
    width: 30px;
  }
  .form-date{
    width: 100px;
    padding: 10px;
    margin: 5px 0;
  }
  .form-email{
    width: 210px;
    padding: 10px;
  }
  .form-submitarea{
    width: 100%;
    text-align: center;
  }
  .form-submit{
    background-color: black;
    color: white;
    margin: 10px auto;
    padding: 10px;
    width: 100px;
    border-radius: 5px;
  }
  .search-table-tr{
    border: 1px solid black;
    height: 100px;
  }
  .table-item{
    width: 150px;
    text-align: center;
  }
  .table-item-long{
    width: 300px;
    text-align: center;
  }
  .deletebutton{
    width: 50px;
    height: 50px;
    color: red;
    background-color: white;
    border-color: red;
    border-radius: 5px;
    margin: 10px;
  }


  svg.w-5.h-5{
    height: 30px;
  }
</style>

@section('title', 'COACHTECH')

@section('content')

  <div class="main">
    <div class="main-title">
      <h1 class="main-title-item">管理システム</h1>
    </div>

    <div class="formarea">
      <form action="find" method="POST">
        @csrf
        <table class="tablearea">
          <tr>
            <th></th>
            <td>
              <input type="hidden" name="id" value="{{$input}}">
            </td>
          </tr>
          <tr>
            <th>
              お名前
            </th>
              <td>
                <input type="text" name="full_name" class="form-full_name" value="{{$input}}">
              </td>
            <th>
              性別
            </th>
            <td>
              <input type="radio" name="gender" value="0" class="form-gender" checked>全て</input>
              <input type="radio" name="gender" value="1" class="form-gender">男性</input>
              <input type="radio" name="gender" value="2" class="form-gender">女性</input>
            </td>
          </tr>
          <tr>
            <th>登録日</th>
            <td>
              <input type="date" name="created_at" value="{{$input}}" class="form-date">-<input type="date" name="created_at" value="{{$input}}" class="form-date">
            </td>
          </tr>
          <tr>
            <th>
              メールアドレス
            </th>
            <td>
            <input type="email" name="email" class="form-email" value="{{$input}}">
            </td>
          </tr>
        </table>
        <div class="form-submitarea">
            <input type="submit" name="submit" class="form-submit" value="検索">
              <br>
            <a href="/find">リセット</a>
        </div>
      </form>
    </div>
    {{ $contacts->links('vendor\pagination\tailwind-custom') }}
    <div>
        @if (@isset($contacts))
      <table class="tablearea">
        <tr class="search-table-tr">
          <th class="table-item">ID</th>
          <th class="table-item-long">お名前</th>
          <th class="table-item">性別</th>
          <th class="table-item-long">メールアドレス</th>
          <th class="table-item-long">ご意見</th>
          <th></th>
        </tr>
      @foreach($contacts as $contact)
      <form action="/delete" method="POST">
        @csrf
        <tr>
          <td class="table-item">
            <input type="hidden" name="id" value="{{$contact->id}}">
            {{$contact->id}}
          </td>
          <td class="table-item-long">
            {{$contact->full_name}}
          </td>
          <td class="table-item">
            @if($contact->gender==1){{"男性"}}@endif
            @if($contact->gender==2){{"女性"}}@endif
          </td>
          <td class="table-item-long">
            {{$contact->email}}
          </td>
          <td class="table-item-long">
            {{ Str::limit($contact->opinion, 25)}}
          </td>
          <td>
            <button class="deletebutton">削除</button>
          </td>
        </tr>
      </form>
      @endforeach
    </table>
    @endif
    </div>
  </div>
@endsection