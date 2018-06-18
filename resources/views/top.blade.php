<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<hr><div style="text-align: center; float: left; width: 25%; background-color: skyblue;">화령 송어장</div>
<div id="clock" style=" text-align:center; float:left; width: 33%; background-color: skyblue;">현재 시간</div>
<div id="sales" style="text-align: center; float: left; width: 25%; background-color: skyblue;">오늘의 매출액 : </div>
<a href="/admin" style=" text-align:center; float:left; width: 17%; background-color: skyblue;">관리페이지</a>
<br><hr>
<script>
    var today   = new Date();
    var year    = today.getFullYear();
    var month   = today.getMonth() + 1;
    var day     = today.getDate();

    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }

    today = year + '-' + month + '-' + day;

    function locale (){
        return new Date().toLocaleString();
    }
    /*setInterval ( function() { document.getElementById("clock").innerHTML = locale(); } , 1000 );*/

    $.ready(
        $.get('/api/todayProfit/' + today,null,function (data) {
            document.getElementById('sales').innerHTML = "오늘의 매출액 : " + data + "원"
        })
    )
</script>