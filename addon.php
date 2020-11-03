<?php include 'header.php';?>
	<div id="sub-head">
		<h1>Add Records</h1>
		<hr width="20%">
	</div>
	<div id="main-body" style="text-align: left">
		<form action="add.php" method="post">
			<table align="center" cellspacing="2">
				<tr>
					<td>Product id</td>
					<td><input type="number" name="id" id="id"></td>
				</tr>
				<tr>	
					<td>Name</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="number" name="price" id="price" min="50" step="10"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br>
						<input type="submit" value="Add">
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
<?php include 'footer.php';?>	