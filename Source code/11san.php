
<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Casio franchise watch stores system</title></head>
 	<body>
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%<font size="5">CASIO G-SHOCK</font>%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%<br>		
<br>
<form name="form1" method="get" action="11san.php">
	%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	<br>
	<font size="5">Search</font>
	<br>
Input Product_ISN:
<input type="text" name="no" maxlength="20" size="20"><br>
 		
<input type="submit" value="Search">
<input type="reset"  value="reset">
</form>


<form name="form2" method="get" action="11san.php">
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
<br>
<font size="5">Add Watch data</font>
<br>   
  Product_ISN:
 		<input type="text" name="PISN" maxlength="20" size="20"><br>
 	
<?

/////////////////////////////connect///////////////////////////////////////
if (! mysql_connect("localhost", "j", "0916084684"))
	die("fail");
//else echo 'good';

//mysql_query("SET NAMES utf8");

if (! @mysql_select_db("casiowatch"))
	die("fail");
//else echo 'good';
//include('mydb.php');
///////////////////////////////////////////////////////////////////////////

		
?>

  P_id 
  	<input type="text" name="Pid" maxlength="20" size="20"><br>
 	Brand_classification
 		<input type="text" name="BC" maxlength="20" size="20"><br>
 	Place_of_production
 		<input type="text" name="POP" maxlength="20" size="20"><br>
 	Price_Per_NT	
 		<input type="text" name="PPN" maxlength="20" size="20"><br>

 		
<input type="submit" value="Add">
<input type="reset" value="reset">
</form>

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%<br>
<form name="form3" method="get" action="11san.php">
<font size="5">Update Watch data</font>
<br>
  
  <?
  Function sanitize($str=""){
  	return str_replace("'","\'",$str);}
  
  
  $sql="SELECT Product_ISN FROM `product categories`";
  $result=mysql_query($sql);
  
  ?>
   Input Product_ISN: <select name="pri" size="1">
   	
  	<? while($row=mysql_fetch_array($result)) 
  	{
  		echo "<option value=$row[0]>$row[0]</option>";
  		}
  	?>	
      </select><br>

<input type="submit" value="Search">
<input type="reset" value="reset"><br><br>


	<?

if ($_GET['pri'])
{
  $aa=$_GET['pri'];
  $sql="SELECT * FROM `product categories` where Product_ISN='$aa'";
  $result=mysql_query($sql);
  //echo $result;
  $row=mysql_fetch_array($result);
}
	?>

<form name="form4" method="get" action="11san.php">
Product_ISN: <? echo "$row[0]".'<br>';?>
<input type="hidden" name="PIS" maxlength="20" size="20"  <? echo "value=$row[0]";?> >
  
Price_Per_NT
  	<input type="text" name="ppt" maxlength="20" size="20"  <? echo "value=$row[4]";?> ><br>


<input type="submit" value="Update">
<input type="reset" value="reset">

<?

//$aaa=$_GET['ppt'];
//$aaa='".sanitize($_GET['ppt'])."';
$bbb=$_GET['PIS'];
if ($_GET['ppt'])
{
	
	$sql="UPDATE `product categories`SET`Price_Per_NT`= '".sanitize($_GET['ppt'])."' where Product_ISN='$bbb'";
	//$sql="UPDATE `product categories`SET`Price_Per_NT`= $aaa where Product_ISN='$bbb'";
	//echo '<br>'.$sql;
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
		if (mysql_affected_rows()>=1)
		echo "Update successfully ";
}
?>

</form></body></html>

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%<br>

<?

if ($_GET['PISN']);
//if ($_GET['Pid'])
{
//$a=$_GET['PISN'];
//$a='".sanitize($_GET['PISN'])."';
//'".sanitize($_GET['PISN'])."'
//$b=$_GET['Pid'];
//$b='".sanitize($_GET['Pid'])."';
//'".sanitize($_GET['Pid'])."'
//$c=$_GET['BC'];
//$c='".sanitize($_GET['BC'])."';
//'".sanitize($_GET['BC'])."'
//$d=$_GET['POP'];
//$d='".sanitize($_GET['POP'])."';
//'".sanitize($_GET['POP'])."'
//$e=$_GET['PPN'];
//$e='".sanitize($_GET['PPN'])."';
//'".sanitize($_GET['PPN'])."'
//$f=$_GET['SID'];
//$g=$_GET['QS'];
$sql="insert `product categories`(`Product_ISN`, `P_id`,`Brand_classification`, `Place_of_production`, `Price_Per_NT`) values('".sanitize($_GET['PISN'])."','".sanitize($_GET['Pid'])."','".sanitize($_GET['BC'])."','".sanitize($_GET['POP'])."','".sanitize($_GET['PPN'])."')";

//$sql="insert `product categories`(`Product_ISN`, `P_id`,`Brand_classification`, `Place_of_production`, `Price_Per_NT`) values('".sanitize($_GET['PISN'])."',$b,'$c','$d',$e)";
//$sql="insert `product categories`(`Product_ISN`, `P_id`,`Brand_classification`, `Place_of_production`, `Price_Per_NT`) values('$a',$b,'$c','$d',$e)";
//$sql="insert `product categories`(`Product_ISN`, `P_id`, `Brand_classification`, `Place_of_production`, `Price_Per_NT`,`Store_id`,`QTY_stock) values('$a',$b,'$c','$d',$e,$f,$g)";
//$sql="insert `product categories`(`P_id`, `Brand_classification`, `Place_of_production`, `Price_Per_NT`) values($b,$c,$d,$e,$f,$g)";
//echo $sql;
$result=mysql_query($sql);
if (mysql_affected_rows()>=1)
echo "Added successfully, ";

}
	

/////////////////////////////////////////////////////////////////////////

if ($_GET['del'])
{
$a=$_GET['del'];
$s="delete from `product categories` where P_id=$a";
mysql_query($s);
echo 'Successfully delete '.mysql_affected_rows();
//echo 'Successfully delete '.mysql_affected_rows().'data';
}



//$no=$_GET['no'];
//'".sanitize($_GET['no'])."'
if (!$_GET['no'])

$sql="SELECT * FROM `product categories` JOIN stores_products ON P_id=Product_id";

else
//$sql="select * from stores ";
$sql="SELECT * FROM `product categories` JOIN stores_products ON P_id=Product_id where Product_ISN='".sanitize($_GET['no'])."'";

if ($_GET['order']==1)
{$sql="SELECT * FROM `product categories` JOIN stores_products ON P_id=Product_id";}

if ($_GET['order']==2)
{$sql="SELECT * FROM `product categories` JOIN stores_products ON P_id=Product_id order by Price_Per_NT DESC";}

//echo $sql;


$result=mysql_query($sql); 
echo 'There are'.mysql_num_rows($result).'data.';

$row=mysql_fetch_array($result);

//echo "$row";


//echo "kkkkk";
//echo "$row[8]";
//echo "kkkkk";
//<tr bgcolor=#0033FF>
//<a href="11san.php?order=1">Price_Per_NT</a>
if (!$_GET['order']){
echo "<table width= 60%  border=1 align=center cellspacing=0 cellpadding=0>";
echo "<tr bgcolor=#D4D4D4> 
     	  <td>Product_ISN</td>
		 		<td>P_id</td>
				<td>Brand_classification</td>
				<td>Place_of_production</td>
				<td><a href=11san.php?order=1>Price_Per_NT</a></td>	
				<td>Store_id</td>	
				<td>QTY_stock</td>
				<td>Store</td>
				<td>Product_total_stock</td>
			  <td>Production Suspension</td>	
      </tr>";}
if ($_GET['order']==2){
echo "<table width= 60%  border=1 align=center cellspacing=0 cellpadding=0>";
echo "<tr> 
     	  <td>Product_ISN</td>
		 		<td>P_id</td>
				<td>Brand_classification</td>
				<td>Place_of_production</td>
				<td><a href=11san.php?order=1>Price_Per_NT</a></td>
				<td>Store_id</td>	
				<td>QTY_stock</td>
				<td>Store</td>
				<td>Product_total_stock</td>	
				<td>Production Suspension</td>						
      </tr>";}
if ($_GET['order']==1){
echo "<table width= 60%  border=1 align=center cellspacing=0 cellpadding=0>";
echo "<tr> 
     	  <td>Product_ISN</td>
		 		<td>P_id</td>
				<td>Brand_classification</td>
				<td>Place_of_production</td>
				<td><a href=11san.php?order=2>Price_Per_NT</a></td>
				<td>Store_id</td>	
				<td>QTY_stock</td>	
				<td>Store</td>
				<td>Product_total_stock</td>
				<td>Production Suspension</td>					
      </tr>";}
      
      
//echo "kkkkk";
//echo "$row[5]";
//echo "kkkkk";


/*
echo $row['0'];
echo $row['1'];
echo $row['2'];
echo $row['3'];
echo $row['4'];
echo $row['5'];
echo $row['6'];
*/

//echo "<table width= 50%  border=1 align=center cellspacing=0 cellpadding=0>";
while ($row=mysql_fetch_array($result))	
//for($i=0; $i<20; $i++)
{
		echo "<tr>
			<td>$row[0] </td>
			<td>$row[1] </td>
			<td>$row[2] </td>
			<td>$row[3] </td>
			<td>$row[4] </td>
			<td>$row[6] </td>
			<td>$row[8] </td>
			<td><a href=ss.php>Store</a></td>
			<td><a href=ps.php>total_stock</a></td>	
			<td><a href=11san.php?del=$row[1]>Delete</a></td>				
	    </tr>";
}

//<td><a href=11san.php>Delete</a></td>	 	

echo "</table>";




?>