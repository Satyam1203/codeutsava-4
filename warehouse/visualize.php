<!DOCTYPE html>
<html lang="en-US">
<body>

<h1>Product Visualization</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
var arr=[['Product','Quantity']];
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
  var data = google.visualization.arrayToDataTable(arr);


  var options = {'title':'Product Quantity', 'width':550, 'height':400};


  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
 <?php
       $con=mysqli_connect('localhost','root','','codeutsava');
       $q="select * from  category_detail natural join product_detail GROUP BY catId ";
       $q2="select sum(qty) as totalqty,catName from category_detail natural join product_detail GROUP BY catId";
       $res=mysqli_query($con,$q2);
       while($row=mysqli_fetch_array($res))
       {
           echo"<script>var ele=['$row[catName]',$row[totalqty]]
           arr.push(ele);
           </script>";
      }
    
    ?>

</body>
</html>
