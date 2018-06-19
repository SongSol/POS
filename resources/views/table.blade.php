<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title> @yield('title')</title>
</head>
<body>
    @include('top')
    <div style="float: left; width: 33%; line-height: 1.3em;">
        작은 방<br>
        <table><tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(1)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>1번</thead>
                            <tbody id="tbody1" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table></button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(2)" style="width: 160px; height: 160px;" id="2">
                        <table>
                            <thead>2번</thead>
                            <tbody id="tbody2" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(3)" style="width: 160px; height: 160px;" id="3">
                        <table>
                            <thead>3번</thead>
                            <tbody id="tbody3" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table></button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        홀<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(4)" style="width: 160px; height: 160px;" id="4">
                        <table>
                            <thead>4번</thead>
                            <tbody id="tbody4" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(5)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>5번</thead>
                            <tbody id="tbody5" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(6)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>6번</thead>
                            <tbody id="tbody6" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(7)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>7번</thead>
                            <tbody id="tbody7" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(8)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>8번</thead>
                            <tbody id="tbody8" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(9)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>9번</thead>
                            <tbody id="tbody9" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(10)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>10번</thead>
                            <tbody id="tbody10" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(11)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>11번</thead>
                            <tbody id="tbody11" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 33%;">
        큰 방<br>
        <table>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(12)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>12번</thead>
                            <tbody id="tbody12" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(13)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>13번</thead>
                            <tbody id="tbody13" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-success" onclick="toMenu(14)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>14번</thead>
                            <tbody id="tbody14" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
                <td><button class="btn-lg btn-success" onclick="toMenu(15)" style="width: 160px; height: 160px;">
                        <table>
                            <thead>15번</thead>
                            <tbody id="tbody15" style="font-size: 10pt">
                            <tr id="row" align="center">
                                <td></td>
                                <td style="width: 50%;"></td>
                            </tr>
                            </tbody>
                        </table>
                    </button></td>
            </tr>
        </table>
    </div>
</body>
<script>
    function toMenu(room_no) {
        location.replace('/table/' + room_no);
    }
    $(document).ready(function () {
        $.get('/api/getAllOrder',null,function (data) {
            console.log(data);
            for(var i = 0; i < data.length; i++) {
                var tbody   = document.getElementById('tbody' + data[i]['table_no']);
                var row     = tbody.insertRow(tbody.rows.length);
                var cell0   = row.insertCell(0);
                var cell1   = row.insertCell(1);
                cell0.innerHTML = data[i]['name'];
                cell1.innerHTML = data[i]['count'];
            }
        });
    });
    $(document).ready(function(){
        $('selector').css('width', $(window).width());
        $('selector').css('height', $(window).height());
        $(window).resize(function() {
            $('selector').css('width', $(window).width());
            $('selector').css('height', $(window).height());
        });
    });
</script>
</html>