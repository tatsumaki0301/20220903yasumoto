@extends('layouts.default')
<style>
  .main-title{
    width: 100%;
    margin: 0 auto;
    text-align: center;
  }
  .formarea{
    width: 90%;
    margin: 0 auto;
  }
  .form-table{
    width: 100%;
    margin: 0 auto;
  }
  .form-mark{
    color: red;
    margin-left: 10px;
  }
  .form-full_name{
    width: 300px;
    padding: 10px;
    margin-bottom: 10px;
  }
  .form-gender{
    margin: 20px;
  }
  .form-email{
    width: 300px;
    padding: 10px;
    margin-bottom: 10px;
  }
  .form-postcode{
    width: 200px;
    padding: 5px;
    margin: 20px 0 10px 5px;
  }
  .form-address{
    width: 300px;
    padding: 10px;
    margin: 20px 0 10px 0;
  }
  .form-building_name{
    width: 300px;
    padding: 10px;
    margin: 20px 0 10px 0;
  }
  .form-opinion{
    margin: 20px 0 10px 0;
    font-size: 20px;
  }
  th {
    text-align: end;
  }
  .form-submit{
    width: 100%;
    margin: 20px auto;
    text-align: center;
  }
  .form-submitbutton{
    width: 100px;
    padding: 10px;
    margin: 0 auto;
    background-color: black;
    color: white;
    border-radius: 5px;
  }

</style>

@section('title', 'COACHTECH')

@section('content')

    @if (count($errors) > 0)
    @endif

    <div class="main-title">
      <h1 class="main-title-item">お問い合わせ</h1>
    </div>

    <div class="formarea">
      <form action="create" method="POST">
        @csrf
        <table class="form-table">
          <tr>
            <th></th>
            <td>
              <input type="hidden" name="id">
            </td>
          </tr>
          <tr>
            <th>
              お名前
              <span class="form-mark">＊　</span>
              <br>
              　
            </th>
              <td>
                <input type="text" name="full_name" class="form-full_name" value="{{old('full_name')}}">
                <br>
                <span class="full_name-item">例）山田　太郎</span>
              </td>
          </tr>
          @if ($errors->has('full_name'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('full_name')}}
            </td>
          </tr>
          @endif
          <tr>
            <th>
              性別
              <span class="form-mark">＊　</span>
            </th>
            <td>
              <input type="radio" name="gender" value="1" {{old('gender') == '1' ? 'checked' : ''}} class="form-gender" checked>男性</input>
              <input type="radio" name="gender" value="2" {{old('gender') == '2' ? 'checked' : ''}} class="form-gender">女性</input>
            </td>
          </tr>
          @if ($errors->has('gender'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('gender')}}
            </td>
          </tr>
          @endif
          <tr>
            <th>
              メールアドレス
              <span class="form-mark">＊　</span>
              <br>
              　
            </th>
            <td>
            <input type="email" name="email" class="form-email" value="{{old('email')}}">
            <br>
            <span class="email">test@example.com</span>
            </td>
          </tr>
          @if ($errors->has('email'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('email')}}
            </td>
          </tr>
          @endif
          <tr>
            <th>
              郵便番号
              <span class="form-mark">＊　</span>
            </th>
            <td>
            〒<input type="text" pattern="\d{3}-\d{4}" name="postcode" class="form-postcode" value="{{old('postcode')}}">
            <br>
            <span class="postcode">
              例）123-4567
            </span>
            </td>
          </tr>
          @if ($errors->has('postcode'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('postcode')}}
            </td>
          </tr>
          @endif
          <tr>
            <th>
              住所
              <span class="form-mark">＊　</span>
            </th>
            <td>
              <input type="text" name="address" class="form-address" value="{{old('address')}}">
              <br>
              <span class="form-address">
                例）東京都渋谷区千駄ヶ谷１－２－３
              </span>
            </td>
          </tr>
          @if ($errors->has('address'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('address')}}
            </td>
          </tr>
          @endif
          <tr>
            <th>
              建物名　　
            </th>
            <td>
              <input type="text" name="building_name" class="form-building_name" value="{{old('building_name')}}">
              <br>
              <span class="building_name">例）千駄ヶ谷マンション１０１</span>
            </td>
          </tr>
          <tr>
            <th>
              ご意見
              <span class="form-mark">＊　</span>
            </th>
            <td>
              <textarea type="text" name="opinion" rows="6" cols="40" class="form-opinion" maxlength="120">{{old('opinion')}}</textarea>
            </td>
          </tr>
          @if ($errors->has('opinion'))
          <tr>
            <th></th>
            <td>
              ・{{$errors->first('opinion')}}
            </td>
          </tr>
          @endif
        </table>
        <div class="form-submit">
          <input type="submit" name="submit" class="form-submitbutton" value="確認">
        </div>
      </form>
    </div>


@endsection