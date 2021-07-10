
<?php  
  session_start();
  include 'connection.php';
  //SELECT COUNT(*) as total,keyword from chart WHERE chart.keyword="rara"
  //SELECT COUNT(*) as total,keyword from chart GROUP BY keyword

 $query = "SELECT keyword, COUNT(*) as total from chart GROUP BY keyword";  
 $result = mysqli_query($con, $query);  

 
 ?>  
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Keyword', 'total count'],
          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["keyword"]."', ".$row["total"]."],";  
                          }  
                          ?>  
          
        ]);

        var options = {
          title: 'Keyword per research'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<style>
body{
  background: url("2.jpg");
  
}
    table{
      
                width: 100%;
                border-collapse: collapse;
                height: auto;
        text-align: center;
        
        color: white;
        font-weight: bold;

            }
    
    th{
        font-size: 17px;
        text-decoration: underline;
        font-style: italic;
    }
    
    .main{
      background-image: url("1.jpg");
        width: 80%;
        box-shadow: 0px 0px 20px red;
        border-radius: 20px;
        overflow: auto;
        margin-left: 10%;
        margin-top: 2%;
        height:270px;
        background: rgba(0, 0, 0, 0.57);
    }
.box{
  
  width:74%;
  height:160px;
  background-image: url("1.jpg");
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
 border:solid 1px #CF0403;
  border-radius: 12px;

}


ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 200px;
  height: 40px;
  background-color: purple;
  opacity: .8;
  line-height: 40px;
  text-align: center;
  font-size: 20px;
  margin-right: 2px;
}
ul li a{
  text-decoration: none;
  color: white;
  display: block;
}
ul li a:hover{
  background-color: green;
}
ul li ul li{
  display: none;
}
ul li:hover ul li{
  display: block;

}
.nav{
  padding-left:12%;

}
.three{
  margin-left: 60%;
  margin-top: 5px;
  box-shadow:0px 0px 15px green;
}



    button{
        margin-top: 10px;
    }
</style>
  </head>
  <body>
  <!-- <a href="paperlibarary.php">Back</a> -->
  <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
            <td style="color:black"><h1 align="center"><marquee><i>Welcome To Online Academic Paper Management System</i>  </marquee></h1></td></tr>
        <tr>
          <td align="center"><b><i><mark style="color:white;background-color:maroon";>ADMIN PANEL</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
        <ul>
          <li><a href="paperlibarary.php">Admin Dashboard</a></li>
          <li><a style="background-color: green">Statistics</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
           </div>
    <br><br><br><br>
  
     
    <div id="piechart" style="width: 600px;   background-image: url '1.jpg'; height: 300px; margin-left:350px; "> </div>
   
    <div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:84%; height:40px; margin-left:9%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">All content copyright &copy; Bariyait, Inc .Thank You.</h6></marquee>


        </div>
  </body> 
</html>