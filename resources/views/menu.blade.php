<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    @include('top')
    <div class="modal fade" id="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    계산
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body" align="center">
                    <button class="btn btn-success" style="width: 150px; height: 150px;" onclick="payment('cash')">현금</button>
                    <button class="btn btn-danger" style="width: 150px; height: 150px;" onclick="payment('card')">카드</button>
                </div>
            </div>
        </div>
    </div>
    <div id="div" style="text-align: center">{{$room_no}}번방</div><br><hr>
    <div style="float: left; width: 70%">
        <table class="table-bordered">
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
        </table>
        <table class="table-bordered" id="menutable">
            <tbody id="tbody" align="center">
                <tr id="tr">
                    <td id="name" width="1000px"></td>
                    <td width="20%" id="count"></td>
                    <td width="20%"></td>
                </tr>
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
<script>
    var menuArray = new Array();
    var orderArray = {};
    var total_price = 0;
    $(document).ready(function () {
        sessionStorage.clear();
        $.get('/api/getMenu',null,function (res) {
            for(var i = 0; i < res.length; i++) {
                $('#MenuButton').append('<button class="btn btn-success" style="width: 150px; height: 150px;" value="' + res[i]['name'] + '" onclick="add_row(value,' + res[i]['price'] + ')">' + res[i]['name'] + '</button>')
                var menuInfo = new Object();
                menuArray[res[i]['name']] = res[i]['price'];
            }
            $('#MenuButton').append('<br><button class="btn btn-info" style="width: 150px; height: 150px;" onclick="order()">주문완료</button><button type="button" class="btn btn-danger" style="width: 150px; height: 150px;" data-toggle="modal" data-target="#modal">계산</button>');
        })
        $.get('/api/getOrder/' + '{{$room_no}}',null,function (res) {
            for(var i = 0; i < res.length; i++) {
                var tbody   = document.getElementById('tbody');
                sessionStorage.setItem(res[i]['name'] + '_count',res[i]['count']);
                orderArray[res[i]['name']] = res[i]['count'];
                var row     = tbody.insertRow(tbody.rows.length);
                var cell0  = row.insertCell(0);
                var cell1  = row.insertCell(1);
                var cell2  = row.insertCell(2);
                cell0.innerHTML = res[i]['name'];
                cell1.innerHTML = '<p id="' + res[i]['name'] + '_count' + '">' + res[i]['count'] + '</p>';
                cell2.innerHTML = '<button class="btn-danger" id="cancelBtn" onclick="cancelMenu(this)">메뉴취소</button>';
                $("#cancelBtn").attr("id",res[i]['name']);
                total_price += menuArray[res[i]['name']] * res[i]['count'];
                document.getElementById('total_price').innerHTML = total_price + ' 원';
            }
        })
    });

    function add_row(name,price) {
        var table = $("#menutable");
        if (sessionStorage.getItem(name + '_count') != null && sessionStorage.getItem(name + '_count') != 0) {
            sessionStorage.setItem(name + '_count',Number(sessionStorage.getItem(name + '_count')) + 1);
            orderArray[name] = sessionStorage.getItem(name + '_count');
            document.getElementById(name + '_count').innerHTML = orderArray[name];
            total_price += price;
            document.getElementById('total_price').innerHTML = total_price + ' 원';
        } else if (sessionStorage.getItem(name + '_count') == null || sessionStorage.getItem(name + '_count') == 0) {
            sessionStorage.setItem(name + '_count', 1);
            sessionStorage.setItem('total', total_price);
            var tbody   = document.getElementById('tbody');
            var row     = tbody.insertRow(tbody.rows.length);
            var cell0  = row.insertCell(0);
            var cell1  = row.insertCell(1);
            var cell2  = row.insertCell(2);
            cell0.innerHTML = name;
            cell1.innerHTML = '<p id="' + name + '_count' + '">' + sessionStorage.getItem(name + '_count') + '</p>';
            cell2.innerHTML = '<button class="btn-danger" id="cancelBtn" onclick="cancelMenu(this)">메뉴취소</button>';
            $("#cancelBtn").attr("id",name);
            total_price += price;
            document.getElementById('total_price').innerHTML = total_price + ' 원';
            orderArray[name] = 1;
        }
        console.log(sessionStorage.getItem(name+'_count'));
    }
    function order() {
        sessionStorage.setItem('{{$room_no}}',JSON.stringify(orderArray));
        $.ajax({
            type:'POST',
            url:'/api/regOrder',
            dataType: 'json',
            data: {
                'order':JSON.stringify(orderArray),
                'table_no':'{{$room_no}}'
            },
            success:function (data) {
                if (data == true) {
                    alert("주문 완료");
                    window.location.href='/table';
                }
            },
            error:function (error) {
                console.log(error);
            }
        })
    }
    function cancelMenu(name) {
        console.log(orderArray[name.id]);
        orderArray[name.id] -= 1;
        document.getElementById(name.id + '_count').innerHTML = orderArray[name.id];
        sessionStorage.setItem(name.id + '_count', sessionStorage.getItem(name.id + '_count') - 1);
        total_price -= menuArray[name.id];
        document.getElementById('total_price').innerHTML = total_price + ' 원';
        if (orderArray[name.id] == 0) {
            sessionStorage.removeItem(name.id + '_count');
            $(name).parent().parent().remove();
        }

    }

    function home() {
        location.href='/table';
    }

    function payment(method) {
        $.post('/api/payment',{
            'table_no':'{{$room_no}}',
            'method':method,
            'total_price':total_price
        }, function (data) {
            if (data == 'true') {
                alert("계산 완료");
                window.location.href='/table';
            }
        })
    }
</script>
</html>