<?php
include 'header.php';
require 'db.php';
require 'florista.php';

$db= new Database();
$florista = new product($db->connect());

$florista->id=$_GET['id']??"NA";

$data=$florista->getByID();
if($data->rowCount()>0){
	$row=$data->fetch(PDO::FETCH_ASSOC);
	$id=$row['id'];
	$name=$row['flower_name'];
	$price=$row['price'];
}

?>
<div id="sub-head">
		<h1>Update Record</h1>
		<hr width="20%">
	</div>
	<div id="main-body" style="text-align: left">
		<form action="update.php" method="post">
			<table align="center" cellspacing="2">
				<tr>
					<td>Product id</td>
					<td><input type="number" disabled name="id1" id="id1" value=<?php echo $id ??"";?>>
						<input type="hidden" name="id" id="id" value=<?php echo $id ??"";?>>
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name" value=<?php echo $name ?? ""; ?>></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="number" name="price" id="price" min="50" step="10" value=<?php echo $price??""; ?>></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br>
						<input type="submit" value="Update ">
						<input type="reset" value="Clear">
					</td>
				</tr>
			</table>
		</form>
		<?php if (isset($_GET['status'],$_GET['msg'])){?>
		<div class="<?php echo($_GET['status']=="OK")?"success":"error"?>">
				<?php echo $_GET['msg'];?>
		</div>
			<?php } ?>