<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>註冊會員</title>
</head>
<body>

@if (Session::has('msg'))
    <div style="margin-top: 20px;">
        <div class="alert alert-danger alert-warning" role="alert">
            {{ session('error') }}
        </div>
    </div>
@endif

<form method="post" action="{{url("/api/user")}}">
    @csrf
    <table align="center" border="1">

        <tr>
            <td>帳號</td>
            <td><input name="account" type="text" placeholder="請輸入帳號" required></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input name="password" type="password" placeholder="請輸入密碼" required></td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td><input name="password_check" type="password" placeholder="請再次輸入密碼" required></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input name="name" type="text" placeholder="請輸入姓名" required></td>
        </tr>
        <tr>
            <td>性別</td>
            <td><input name="sex" type="radio" value="male" required>男性<input name="sex" type="radio" value="female"
                                                                              required>女性
            </td>
        </tr>
        <tr>
            <td>電子信箱</td>
            <td><input name="email" type="email" placeholder="請輸入電子信箱" required></td>
        </tr>
        <tr>
            <td>電話號碼</td>
            <td><input name="phone" type="tel" placeholder="請輸入電話號碼" required></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit"></td>
        </tr>
    </table>
</form>


</body>
</html>
