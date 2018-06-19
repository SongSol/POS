<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>관리페이지</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
@include('top')
<!-- AdminMenu Modal -->
<div class="modal fade" id="adminMenu" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">메뉴 관리</h4>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <input type="text" class="form-control-static" placeholder="메뉴명" id="name">
                    <input type="text" class="form-control-static" placeholder="가격" id="price">
                    <input type="button" class="btn-success btn-sm" value="추가" onclick="add_menu()"><br>
                    <table class="table table-hover" id="menu">
                        <thead>
                        <th style="text-align: center">메뉴명</th>
                        <th style="text-align: center">가격</th>
                        <th style="text-align: center">메뉴삭제</th>
                        </thead>
                        <tbody id="tbody" style="text-align: center"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="save_menu()">저장</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End AdminMenu Modal-->

<!-- Profit Modal -->
<div class="modal fade" id="profit" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">상세 매출</h4>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <table class="table table-striped" id="profit_table">
                        <thead align="center">
                        <tr style="background-color: lightgoldenrodyellow">
                            <td>테이블</td>
                            <td>판매 가격</td>
                            <td>결제 수단</td>
                            <td>결제 시간</td>
                        </tr>
                        </thead>
                        <tbody id="profit_tbody" align="center"></tbody>
                    </table><br>
                    카드 : <label id="card"></label>&nbsp;
                    현금 : <label id="cash"></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Profit Modal-->

<!--Calendar-->
<table id="calendar" class="table" border="1" style="height: 800px;">
    <tbody align="center">
    <tr align="center">
        <td onclick="prevCalendar()" style="background-color: gainsboro;"><br><br>←</td>
        <td colspan="5" id="calendarYM" style="font-size: 30px; background-color: #20c997">yyyy년 m월</td>
        <td onclick="nextCalendar()" style="background-color: gainsboro;"><br><br>→</td>
    </tr>
    <tr align="center" style="background-color: lightgoldenrodyellow;">
        <td width="13%">일</td>
        <td width="13%">월</td>
        <td width="13%">화</td>
        <td width="13%">수</td>
        <td width="13%">목</td>
        <td width="13%">금</td>
        <td width="13%">토</td>
    </tr>
    </tbody>
</table>
<!--End Calendar-->

<script>
    var month_profit = 0;
    function getMenu() {
        $.get('/api/getMenu',null,function (data) {
            for (var i = 0; i < data.length; i++) {
                var tbody   = document.getElementById('tbody');
                var row     = tbody.insertRow(tbody.rows.length);
                var cell0   = row.insertCell(0);
                var cell1   = row.insertCell(1);
                var cell2   = row.insertCell(2);
                cell0.innerHTML = data[i]['name'];
                cell1.innerHTML = data[i]['price'];
                cell2.innerHTML = "<button class='btn btn-danger' onclick='del_menu(this)'>삭제</button>";
            }
        })
    }

    function add_menu() {
        var name    = document.getElementById('name').value;
        var price   = document.getElementById('price').value;
        if(name == '' || price == '') {
            alert('메뉴명이나 가격을 입력하세요.');
        }
        else {
            var tbody   = document.getElementById('tbody');
            var row     = tbody.insertRow(tbody.rows.length);
            var cell0   = row.insertCell(0);
            var cell1   = row.insertCell(1);
            var cell2   = row.insertCell(2);
            cell0.innerHTML = name;
            cell1.innerHTML = price;
            cell2.innerHTML = "<button class='btn btn-danger' onclick='del_menu(this)'>삭제</button>";
        }
    }
    
    function del_menu(obj) {
        $(obj).parent().parent().remove()
    }
    
    function save_menu() {
        var table = document.getElementById('menu');
        var data = [];

        var headers = [];
        for(var i=0; i<table.rows[0].cells.length; i++) {
            headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
        }

        for(var i=1; i<table.rows.length; i++) {
            var tableRow = table.rows[i];
            var rowData = {};
            for(var j=0; j<tableRow.cells.length - 1; j++) {
                rowData[headers[j]] = tableRow.cells[j].innerHTML;
            }
            data.push(rowData);
        }
        $.post(
            '/api/regMenu',
            {'menu':data},
            function (res) {
                if (res == 'true'){
                    alert('추가 완료!');
                    window.location.reload();
                } else console.log(res);
            }
        )
    }

    <!-- Calendar -->
    var today = new Date();

    function prevCalendar() {
        today = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
        month_profit = 0;
        showCalendar();
    }

    function nextCalendar() {
        today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
        month_profit = 0;
        showCalendar();
    }

    function showCalendar () {
        var day_profit = 0;
        var month = 1 + today.getMonth();
        month = month >= 10 ? month : '0' + month;
        $.get('/api/getAllProfit',null,function (data) {
            var startDay    = new Date(today.getFullYear(), today.getMonth(), 1);
            var lastDay     = new Date(today.getFullYear(),today.getMonth() + 1, 0);
            var calendar    = document.getElementById('calendar');
            var calendarYM  = document.getElementById('calendarYM');
            calendarYM.innerHTML = today.getFullYear() + "년" + (today.getMonth() + 1) + "월";

            while(calendar.rows.length > 2) {
                calendar.deleteRow(calendar.rows.length - 1);
            }

            var row = null;
            row = calendar.insertRow();
            var cnt     = 0;
            var cell    = null;
            var cell1   = null;
            for (var i = 0; i < startDay.getDay(); i++) {
                cnt += 1;
                cell = row.insertCell();
            }
            for (var i = 1; i < lastDay.getDate() + 1; i++) {
                var day = i >= 10 ? i : '0' + i;
                for (var j = 0; j < data.length; j++) {
                    if (data[j]['pay_time'] > today.getFullYear() + '-' + month + '-' + day + ' 00:00:00' && data[j]['pay_time'] < today.getFullYear() + '-' + month + '-' + day + ' 23:59:59') {
                        day_profit = day_profit + data[j]['total_price'];
                        month_profit = month_profit + day_profit;
                    }
                }
                cell = row.insertCell();
                cnt += 1;
                if (day_profit != 0) {
                    cell.innerHTML = i + "일" + "<br><br><a data-toggle='modal' data-target='#profit' onclick='getProfit(" + today.getFullYear() + "," + month + "," + day + ")'>" + day_profit + "원</a>";
                    day_profit = 0;
                } else
                    cell.innerHTML = i + "일" + "<br><br>" + "-";
                if (cnt % 7 == 0)
                    row = calendar.insertRow();
            }
        });
    }

    $(document).ready(function () {
        showCalendar();
    });

    function getProfit(year,month,day) {
        var card_total_price = 0;
        var cash_total_price = 0;
        $("#profit_tbody").empty();
        var month = month >= 10 ? month : '0' + month;
        var day = day >= 10 ? day : '0' + day;
        var date = year + '-' + month + '-' + day;
        $.get('/api/getProfit/' + date,null,function (data) {
            for(var i = 0; i < data.length; i++) {
                var pay_type = data[i]['pay_type'] == 'card' ? '카드' : '현금'

                if (data[i]['pay_type'] == 'card')
                    card_total_price = card_total_price + data[i]['total_price'];
                else if (data[i]['pay_type'] == 'cash')
                    cash_total_price = cash_total_price + data[i]['total_price'];

                var tbody   = document.getElementById('profit_tbody');
                var row     = tbody.insertRow(tbody.rows.length);
                var cell0   = row.insertCell(0);
                var cell1   = row.insertCell(1);
                var cell2   = row.insertCell(2);
                var cell3   = row.insertCell(3);
                cell0.innerHTML = data[i]['table_no'] + "번";
                cell1.innerHTML = data[i]['total_price'] + "원";
                cell2.innerHTML = pay_type;
                cell3.innerHTML = data[i]['pay_time'];
            }
            document.getElementById('card').innerHTML = card_total_price + "원";
            document.getElementById('cash').innerHTML = cash_total_price + "원";
        });

    }
    <!-- End Calendar -->
</script>
</body>
</html>