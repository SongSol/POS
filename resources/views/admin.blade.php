<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
<!--Profit Modal-->
<div class="modal fade" id="profit" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">매출 현황</h4>
            </div>
            <div class="modal-body">
                <div class="modal-body">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Profit Modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminMenu" onclick="getMenu(); this.onclick=null;">메뉴 관리</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#profit">매출 현황</button>

<script>
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
</script>
</body>
</html>