<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    歡迎回來 {{$data}}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>


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
