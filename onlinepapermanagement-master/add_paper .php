<?php include("connection.php");
       session_start();
    // $_SESSION['papername']=$papername;

$msg="";

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sub']))

{
 
//   $_SESSION['book_id']=$book_id;
  $bookname=$_POST['booksname'];
  $authorname=$_POST['authorname'];
  $id=$_POST['book_id'];  
  $copy=$_POST['copies'];
 $year=$_POST['years'];
  $avl_cpy=$copy;


  if($bookname!="" && $authorname!="" && $id!="" && $copy!="")
  {  
     
  
     $file_name = $_FILES['file']['name'];
	 $new_file_name=$id.".pdf";
     $file_tmp_loc = $_FILES['file']['tmp_name'];
	 $file_store = "ebooks/";
     $fpath=$file_store.$new_file_name;
	 $accepted=array("pdf");

	 
	 
	if(!in_array(pathinfo($file_name,PATHINFO_EXTENSION),$accepted))
	{
	$msg= $file_name."<br> is not acceptable file type";
	}
	else
	{
	  
	  move_uploaded_file($_FILES['file']['tmp_name'],$file_store.$new_file_name);
	  
	 }

       
      
    //   $insert="INSERT INTO `paper`(`id`, `papername`, `authorname`, `publisher`, `year`, `file_name`, `path`) VALUES('".$id."','".$bookname."','".$authorname."','".$copy."','".$year."','".$file_name."','".$fpath."')";
    //   printf($insert);
//    $insert= "INSERT INTO `papers`(`id`, `book_id`, `papername`, `authorname`, `publisher`, `year`, `file_name`, `path`) VALUES (id,'$id','$bookname','$authorname','$copy','$year','$file_name','$fpath')";
   $insert="INSERT INTO `papers`(`id`, `book_id`, `papername`, `authorname`, `publisher`, `year`, `file_name`, `path`) VALUES (id,'$id','$bookname','$authorname','$copy','$year','$file_name','$fpath')";
   printf($insert);
      $data=mysqli_query($con,$insert); 
      printf($data);
      if($data)
	  {
      
        header("location:paperlibarary.php");
	    $msg= "Sccessfully Added";
	  }
      else{
          $msg="Something Went Wrong";
      }
   }
	  else
	  {
	    $msg= "All field are required";
	  }

	session_destroy();
}

?>

<html>
<head>
<title>Add_Paper</title>


<style>
body{
  background: url(2.jpg);
}
.box{
  width:74%;
  height:160px;

  background-image: url(1.jpg);
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
  border-radius:12px;
  box-shadow:0px 0px 15px lightgreen;
   border:solid 1px #CF0403;
  border-radius: 12px;
}

	 .header{
	         width:400px;
			color:#FFFFFF;
			 display: inline-block;
			 width:73.5%;
			 height:370px;
			 margin-left:13%;
       background-image: url("1.jpg");
       background-size: cover;
			 box-shadow:0px 0px 15px lightgreen;
       border-radius:12px;
         border:solid 1px #CF0403;

			 }


	.title
	       {
				color:#FFFFFF;
			   font-size:20px;
			 	font-weight:10px;
				
				background:rgba(0,0,0,0.5);
                margin-top: 4%;
				margin-right:56%;
			
				font-style:italic;
				}
	.title h2{
	           background:#660000;
			   border:none;
         margin-left:20px;
         margin-top: 10px;
			  padding-top:3px;
        padding-bottom: 2px;
			    padding-left:150px;
				border-radius:15px;
        width:280px;
	           }

	.container{
        margin-top: 15px;
	            margin-left:20%;

				font-weight:10px;
				height:350px;
				background:rgba(0,0,0,0.5);
				padding-left:3%;
                width:600px;
        box-shadow:0px 0px 15px lightgreen;
        border-radius:18px;
        overflow:auto;
				}

   .header input[type="submit"]
          {

		    font-size:25px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:110% ;
            margin-top: 10px;
			background:#660000;
			color:#FFFFFF;
			border-radius:18px;
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


</style>
</head>
<body>

  <div class="box">
   <table  style ="border-color:red; font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:black"><h1 align="center"><marquee>Welcome To Online Academic Paper Management System</marquee></h1></td>
      </tr>
      <tr>
      <td align="center"><b><i><mark style="color:white;background-color:maroon";>ADMIN PANEL</mark></i></b></td>
      </tr>
    </table>
  </div>
<div class="nav">
<ul>
  <li><a href = "paperlibarary.php">Home</a></li>
  <li ><a href = "add_paper.php"  style="background-color:green">Add Paper</a></li>
  <li><a href="charts.php">Statistics</a></li>
  <li><a href = "index.php">Logout</a></li>
</ul>
<br><br><br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
<div class = "header">


  <div class = "container">
    <div style="color:orange" align="center">
    <h2>Add Paper</h2>
      </div>

  <table style= "color:#FFFFFF;padding-top:10px;">
   <tr>
     <td>ID :</td>
     <td><input type="number" name="book_id" placeholder="Paper ID"/></td>
     </tr>
	<tr>
	  <td>Paper Name :</td>
	 <td><input type="text" name="booksname" placeholder="Paper Name"/></td>
        <td style="color:red;font-weight:bold;text-align:center"><?php echo $msg; ?></td>
	</tr>
   <tr>
     <td>Author Name :</td>
     <td><input type="text" name="authorname" placeholder="Author Name"/></td>
	</tr>
	<tr>
	  <td>Publisher :</td>
	 <td><input type="text" name="copies" placeholder="Publisher"/></td>
	</tr>
   
  <tr>
     <td>Year :</td>
     <td><input type="number" name="years" placeholder="Year"/></td>
     </tr>

	<tr>
	 <td>UPLOAD EPaper :</td>
	 <td><input type="file" name="file"  /></td>
	</tr>
      <tr>
	  <td><h2><input style="margin-left:180%;margin-top:10%;" type="submit" name="sub" value="SUBMIT"/></h2></td>
	  </tr>
   </table>

 </form>
</div>
</div>


<div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:84%; height:40px; margin-left:9%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">All content copyright &copy; Bariyait, Inc .Thank You.</h6></marquee>


        </div>
</body>
</html>
<html>