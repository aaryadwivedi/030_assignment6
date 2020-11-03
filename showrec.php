<?php include 'header.php';?>
		<div id="sub-head">
			<h1>Show Records</h1>
			<hr width="20%">
		</div>
		<div id="main-body">
			<?php if (isset($_GET['status'],$_GET['msg'])){?>
		<div class="<?php echo($_GET['status']=="OK")?"success":"error"?>">
				<?php echo $_GET['msg'];?>
		</div>
			<?php } ?>
			<table  id="css" align="center" cellspacing="2">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Price</th>
					<th colspan="2">Action</th>
				</tr>
				<?php
				require 'db.php';
				require 'florista.php';

				$db = new Database();
				$flower = new product($db->connect());
				$data = $flower->getRecords();
				
				while($row = $data->fetch(PDO::FETCH_ASSOC)){
				
				echo "<tr>";
				echo	"<td>$row[id]</td>";
				echo	"<td>$row[flower_name]</td>";
				echo	"<td>$row[price]</td>";
				echo	"<td class='edit'><a href='updateon.php?id=$row[id]'>Edit</td>";
				echo	"<td class='delete' onclick='confirm_user(\"$row[id]\",\"$row[flower_name]\")'>Delete</td>";
				echo "</tr>";
				}
				?>
			</table>
		</div>
		<script>
			function confirm_user(id, name){
				if(confirm("Do you want to delete the record of " + name)){
					window.location="delete.php?id=" +id;
				}
			}
		</script>
<?php include 'footer.php';?>	