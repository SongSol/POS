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
        <table class="table-bordered">
            <thead align="center">
                <tr>
                    <td colspan="5">메뉴판</td>
                </tr>
            </thead>
            <tr align="center">
                <td width="75%">품명</td>
                <td width="20%">갯수</td>
                <td width="20%">취소</td>
            </tr>
            <tbody align="center" id="tbody">
                <tr id="tr"></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">원</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="float: right; width: 30%;">
        <table>
            <tr>
                <td><button class="btn-lg btn-warning" onclick="add_row('음식1')">음식1</button></td>
                <td><button class="btn-lg btn-warning" onclick="add_row('음식2')">음식2</button></td>
                <td><button class="btn-lg btn-warning" onclick="add_row('음식3')">음식3</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-warning">음식4</button></td>
                <td><button class="btn-lg btn-warning">음식5</button></td>
                <td><button class="btn-lg btn-warning">음식6</button></td>
            </tr>
            <tr>
                <td><button class="btn-lg btn-warning">음식</button></td>
                <td><button class="btn-lg btn-warning">음식</button></td>
                <td><button class="btn-lg btn-warning">음식</button></td>
            </tr>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    function add_row(name) {
        var tr = $('#tr');
        var td = tr.children();
        td.each(function (i) {
            console.log(td.eq(i).text());
            if (td.eq(i).text() == name) {
                console.log("있");
            }
        });
        var tbody   = document.getElementById('tbody');
        var row     = tbody.insertRow(tbody.rows.length);
        var cell0  = row.insertCell(0);
        var cell1  = row.insertCell(1);
        var cell2  = row.insertCell(2);
        cell0.innerHTML = name;
        cell1.innerHTML = 1;
        cell2.innerHTML = '<button class="btn-danger">-</button>';
        this.no++;
    }
</script>
</html>