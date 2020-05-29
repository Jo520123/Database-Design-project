<?
if (! mysql_connect("localhost", "j", "0916084684"))
	die("fail");
//else echo 'good';

//mysql_query("SET NAMES utf8");

if (! @mysql_select_db("casiowatch"))
	die("fail");
//else echo 'good';
//include('mydb.php');


//$no1=$_GET['Si'];
//$sql="SELECT * FROM `stores`";
//$sql="SELECT * FROM `stores` where Store_id=$no1";
$sql="SELECT * FROM `product categories` JOIN product_tab ON P_id=Product_id";
//echo $sql;


$result=mysql_query($sql);
echo 'There are'.mysql_num_rows($result).'data';
$row=mysql_fetch_array($result);

echo "<table width= 60%  border=1 align=center cellspacing=0 cellpadding=0>";
echo "<tr> 
     	  <td>Product_ISN</td>
		 		<td>P_id</td>
				<td>Brand_classification</td>
				<td>Place_of_production</td>
				<td>Price_Per_NT</td>
				<td>Total_stock</td>				
				<td>Back to product</td>			
      </tr>";


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
			<td><a href=11san.php>Product</a></td>			
	    </tr>";
}



/*
 Store_id
 		<input type="text" name="SID" maxlength="20" size="20"><br>
 	QTY_stock
 		<input type="text" name="QS" maxlength="20" size="20"><br>
*/

echo "</table>";

?>