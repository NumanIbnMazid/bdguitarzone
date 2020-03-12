<!--head-area-->
	<?php include_once 'admin/template/adminHead.php' ?>
<!--//head-area--> 
	
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
	<!--header-area-->
		<?php include_once 'admin/template/adminHeader.php' ?>
	<!--//header-area-->   

<?php
	include_once 'dbCon.php';
	$con = connect();

	$sql = "SELECT * FROM `product` ORDER BY product_id DESC";
	
	$result = $con->query($sql);
	
?>	
<div class="products">	 
	<div class="container">
		<li style="padding-bottom: 20px;">Product List</li>
		<table border="1">
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Product Brand</th>
				<th>Product Category</th>
				<th>Product Price</th>	
				<th>Product Image</th>
				<th>Product Description</th>
				<th>Product Quantity</th>				
			</tr>
		<?php 
			foreach($result as $r) {
			?>
				<tr>
					<style type="text/css">
						
					</style>
					<td><?=$r['product_id']?></td>
					<td><a href="single.php?pro-id=<?=$r['product_id']?>"><?=$r['product_name']?></a></td>
					<td><?=$r['brands']?></td>
					<td><?php echo $r['cat'];?></td>
					<td><?php echo $r['product_price'];?></td>
					<td><a href="single.php?pro-id=<?=$r['product_id']?>"><img src="images/products/<?=$r['product_image']?>" class="img-responsive" style="width:150px; height:150px;" alt="<?=$r['product_name']?>"></a></td>
					<td><?php echo $r['product_description'];?></td>
					<td><?php echo $r['stock_quantity'];?></td>
			
					<td><i class="fa fa-cog" aria-hidden="true"></i><a href="productEditForm.php?product-id=<?=$r['product_id']?>"> Edit </a></td>
					<td><i class="fa fa-trash-o" aria-hidden="true"></i><a href="productDeleteForm.php?product-id=<?=$r['product_id']?>" onclick="return confirm('Are you sure you want to Delete?')"><span class="text-danger"> Delete </span></a></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
    <!--footer-area-->
		<?php include_once 'admin/template/adminFooter.php' ?>
	<!--//footer-area-->

<?php }else {?>
	<?php 
	session_start();
	session_destroy();	
	echo  '<script>alert("Something went wrong, Please try again later."); window.location.href = "http://localhost/bdguitarzone/index.php";</script>'; ?>
<?php } ?>
