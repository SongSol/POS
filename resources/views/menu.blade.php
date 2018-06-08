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
    <title>Document</title>
</head>
<body>
    @include('top')
    <div id="div" style="text-align: center">{{$room_no}}번방</div><br><hr>
    <div style="float: left; width: 70%">
        <table class="table-bordered" id="menutable">
            <thead align="center">
                <tr>
                    <td colspan="5">메뉴판</td>
                </tr>
            </thead>
            <tr align="center">
                <td width="1000px">품명</td>
                <td width="20%">갯수</td>
                <td width="20%">취소</td>
            </tr>
            <tbody align="center" id="tbody">
                <tr id="tr"></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" id="total_price" style="text-align: center;">원</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="float: right; width: 30%;" id="MenuButton">
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    var total_price = 0;
    var menu_table = $('#menutable');
    $(document).ready(function () {
        $.get('/getMenu',null,function (res) {
            for(var i = 0; i < res.length; i++) {
                $('#MenuButton').append('<button class="btn btn-success" style="width: 150px; height: 150px;" value="' + res[i]['name'] + '" onclick="add_row(value,' + res[i]['price'] + ')">' + res[i]['name'] + '</button>')
            }
        })
    });

    function add_row(name,price) {
        console.log(total_price);
        for (var i = 0; i < menu_table.rows.length; i++) {
            for(var j = 0; j < menu_table.cells.length; j++) {
                if (menu_table.rows[i].cells[j].innerHTML == name) {
                    console.log("있습니다.");
                }
                else {
                    continue;
                }
            }
        }
        var tbody   = document.getElementById('tbody');
        var row     = tbody.insertRow(tbody.rows.length);
        var cell0  = row.insertCell(0);
        var cell1  = row.insertCell(1);
        var cell2  = row.insertCell(2);
        cell0.innerHTML = name;
        cell1.innerHTML = 1;
        cell2.innerHTML = '<button class="btn-danger">메뉴취소</button>';
        total_price += price;
        document.getElementById('total_price').innerHTML = total_price + ' 원';
    }
</script>
</html>