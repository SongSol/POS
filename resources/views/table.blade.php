<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
</head>
<body>
    @include('top')
    <div style="float: left; width: 33%; line-height: 1.3em;">
        작은 방<br>
        <table><tr>
                <td><button class="btn-lg btn-success">1번</button></td>
                <td><button class="btn-lg btn-success">2번</button></td>
                <td><button class="btn-lg btn-success">3번</button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        홀<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success">4번</button></td>
                <td><button class="btn-lg btn-success">5번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success">6번</button></td>
                <td><button class="btn-lg btn-success">7번</button></td>
                <td><button class="btn-lg btn-success">8번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success">9번</button></td>
                <td><button class="btn-lg btn-success">10번</button></td>
                <td><button class="btn-lg btn-success">11번</button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        큰 방<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success">12번</button></td>
                <td><button class="btn-lg btn-success">13번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success">14번</button></td>
                <td><button class="btn-lg btn-success">15번</button></td>
            </tr>
        </table>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
</html>