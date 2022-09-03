@extends('layouts.default')
<style>
  .main-title{
    width: 100%;
    text-align: center;
  }
  .conf-area{
    width: 90%;
    margin: 0 auto;
  }
  .conf-table{
    width: 100%;
    margin: 0 auto;
  }
  th{
    width: 500px;
  }
  .conf-item{
    padding: 20px;
    font-size: 20px;
  }
  .button-area{
    width: 100%;
    text-align: center;
    margin-top: 30px; 
  }
  .submitbutton{
    width: 100px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: black;
    color: white;
    border-radius: 5px;
  }
  .backbutton{
    border: none;
    background-color: white;
    color: blue;
    text-decoration: underline;
    font-size: 15px;
  }
  .opiniontextarea{
    border: none;
    font-size: 20px;
  }

</style>

@section('title', 'COACHTECH')

@section('content')

    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
    @endif

    <div class="main-title">
      <h1 class="main-title-item">内容確認</h1>
    </div>

    <div class="conf-area">
      <form action="edit" method="GET">
        @csrf
        <table class="conf-table">
          <tr>
            <th>お名前</th>
            <td class="conf-item">
              <input type="hidden" name="full_name" value="{{$full_name}}" >{{$full_name}} 
          </tr>
          <tr>
            <th>性別</th>
            <td class="conf-item">
              <input type="hidden" name="gender" value="{{1}}">
              @if($gender==1){{"男性"}}@endif
              <input type="hidden" name="gender" value="{{2}}">
              @if($gender==2){{"女性"}}@endif
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td class="conf-item">
              <input type="hidden" name="email" value="{{$email}}">{{$email}}
            </td>
          </tr>
          <tr>
            <th>郵便番号</th>
            <td class="conf-item">
              <input type="hidden" name=postcode value="{{$postcode}}">{{$postcode}}
            </td>
          </tr>
          <tr>
            <th>住所</th>
            <td class="conf-item">
              <input type="hidden" name="address" value="{{$address}}">{{$address}}
            </td>
          </tr>
          <tr>
            <th>建物名</th>
            <td class="conf-item">
              <input type="hidden" name="building_name" value="{{$building_name}}">{{$building_name}}
            </td>
          </tr>
          <tr>
            <th>ご意見</th>
            <td class="conf-item">
              <textarea name="opinion" rows="3" cols="40" class="opiniontextarea">{{$opinion}}</textarea>
            </td>
          </tr>
        </table>
        <div class="button-area">
          <button name="regist" type="submit" class="submitbutton" value="true">送信</button>
          <br>
            <button name="back" type="submit" class="backbutton" value="true">修正する</button>
        </div>
      </form>
    </div>

@endsection