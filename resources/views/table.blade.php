<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title> @yield('title')</title>
</head>
<body>
    @include('top')
    <div style="float: left; width: 33%; line-height: 1.3em;">
        작은 방<br>
        <table><tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(1)" style="width: 150px; height: 150px;" id="1">1번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(2)" style="width: 150px; height: 150px;" id="2">2번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(3)" style="width: 150px; height: 150px;" id="3">3번</button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        홀<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(4)" style="width: 150px; height: 150px;" id="4">4번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(5)" style="width: 150px; height: 150px;" id="5">5번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(6)" style="width: 150px; height: 150px;" id="6">6번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(7)" style="width: 150px; height: 150px;" id="7">7번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(8)" style="width: 150px; height: 150px;" id="8">8번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(9)" style="width: 150px; height: 150px;" id="9">9번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(10)" style="width: 150px; height: 150px;" id="10">10번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(11)" style="width: 150px; height: 150px;" id="11">11번</button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        큰 방<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(12)" style="width: 150px; height: 150px;" id="12">12번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(13)" style="width: 150px; height: 150px;" id="13">13번</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(14)" style="width: 150px; height: 150px;" id="14">14번</button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(15)" style="width: 150px; height: 150px;" id="15">15번</button></td>
            </tr>
        </table>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    function toMenu(room_no) {
        location.replace('/table/' + room_no);
    }

    $(document).ready(function () {
        console.log(sessionStorage.getItem(1));
    })

    $(document).ready(function () {
        for(var i = 0; i < 14; i++) {
            document.getElementById(i).innerHTML = i
        }
    })
</script>
</html>