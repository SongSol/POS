<hr><div style="text-align: center; float: left; width: 25%; background-color: skyblue;">화령 송어장</div>
<div id="clock" style=" text-align:center; float:left; width: 33%; background-color: skyblue;">현재 시간</div>
<div id="sales" style="text-align: center; float: left; width: 25%; background-color: skyblue;">오늘의 매출액 : </div>
<a href="/admin" style=" text-align:center; float:left; width: 17%; background-color: skyblue;">관리페이지</a>
<br><hr>
<script>
    function locale (){ 	 return new Date().toLocaleString(); 	 }
    setInterval ( function() { document.getElementById("clock").innerHTML = locale(); } , 1000 );
</script>