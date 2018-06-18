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
                <td><button class="btn-lg btn-success" onclick="toMenu(1)" style="width: 150px; height: 150px;">1번<br>
                    <table>
                        <tbody id="tbody_1">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(2)" style="width: 150px; height: 150px;" id="2">2번<br>
                        <table>
                            <tbody id="tbody_2">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(3)" style="width: 150px; height: 150px;" id="3">3번<br>
                        <table>
                            <tbody id="tbody_3">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table></button></td></button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        홀<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(4)" style="width: 150px; height: 150px;" id="4">4번<br>
                        <table>
                            <tbody id="tbody_4">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(5)" style="width: 150px; height: 150px;" id="5">5번<br>
                        <table>
                            <tbody id="tbody_5">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table></button></td></button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(6)" style="width: 150px; height: 150px;" id="6">6번<br>
                        <table>
                            <tbody id="tbody_6">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(7)" style="width: 150px; height: 150px;" id="6">7번<br>
                        <table>
                            <tbody id="tbody_7">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(8)" style="width: 150px; height: 150px;" id="6">8번<br>
                        <table>
                            <tbody id="tbody_8">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(9)" style="width: 150px; height: 150px;" id="6">9번<br>
                        <table>
                            <tbody id="tbody_9">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(10)" style="width: 150px; height: 150px;" id="6">10번<br>
                        <table>
                            <tbody id="tbody_10">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(11)" style="width: 150px; height: 150px;" id="6">11번<br>
                        <table>
                            <tbody id="tbody_11">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        큰 방<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(12)" style="width: 150px; height: 150px;" id="6">12번<br>
                        <table>
                            <tbody id="tbody_12">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(13)" style="width: 150px; height: 150px;" id="6">13번<br>
                        <table>
                            <tbody id="tbody_13">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(14)" style="width: 150px; height: 150px;" id="6">14번<br>
                        <table>
                            <tbody id="tbody_14">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(15)" style="width: 150px; height: 150px;" id="6">15번<br>
                        <table>
                            <tbody id="tbody_15">
                            <tr>
                            </tr>
                            </tbody>
                        </table></button></td></button></td>
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
        for(var i = 1; i < 15; i++) {
            $.get('/api/getOrder/' + i,null,function (data) {
                var tbody = document.getElementById('tbody_' + i);
                var row = tbody.insertRow(tbody.rows.length);
                for (var j = 0; j < data.length; j++) {
                    var cell0  = row.insertCell(0);
                    var cell1  = row.insertCell(1);
                    cell0.innerHTML = data[j]['name'];
                    cell1.innerHTML = data[j]['count'];
                }
            })
        }
    })
</script>
</html>