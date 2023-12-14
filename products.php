	<?php include_once("header.php");
include('hms/include/config.php');

	?> <!--Header-->


	<div class="main">

		<div class="banner">
    		<div class="container dress-bann-contain">
       			<div class='row dress-bann-row'>
       				
       			</div>
		    </div>
		</div>
		<!-- Division/section of Boys ,Start-->
		<div class="container div-boys">
			<div class='row'>
				<!-- Division/section of Heading -->
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 padd-head boy-heading'>
					<center><h4>For Boys</h4></center>
				</div>
 <?php
             $procat='babydresses';
                          $protag='boy';
$sql=mysqli_query($con,"select * from product where procat='$procat' and protag='$protag'");
if (!empty($sql)) {

while($row=mysqli_fetch_array($sql))
{ 
?>
				<!-- Division/section of product-card1 ,start-->
				<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 '>
					<div class='boy-product1'>
						  <div class="card">
						  <div class="row ">
							<div class="col-md-4">
								<img src="hms/images/<?php echo $row['proimg'];?>" class="" height="150" width="150">
							</div>
							  <div class="col-md-8 px-3">
								<div class="card-block px-3 card-blockpadd">
								  <h4 class="card-title"><?php echo $row['proname'];?></h4>
								  <span id='pricebox1'><b><?php echo $row['proprice'];?> &#8377 </b></span>
										<p class="card-text"><?php echo $row['prodesc'];?></p>
										<!--<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<p>Please select your age:<br>this is only for <b>3 to 12 months</b> baby</p>
											
										</div>-->
										<br>
										<form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-success btn button">Add To Cart</button>
                                      </form>
                                       <div class="alert-message"></div>
								  <!--<a href="#" class="btn btn-primary" onclick="buy()"><i class="fa fa-shopping-cart" style="font-size:20px; color: white;"></i> Buy Now</a>-->
								</div>
							  </div>
							</div>
						  </div>
					  </div>
				</div>


<?php }}else{
                echo "No Records.";
              } ?>


			</div>

			
			<!-- Division/section of Row3 ,End-->
		</div>
		<!-- Division/section of Boys ,End-->


		<!-- Division for girls section -->
		<div class="container div-girl">
			<!-- Division/section of Row1-girl ,start-->
			<div class='row card-row-padd'>
				<!-- Division/section of Heading-girl -->
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 padd-head girl-heading'>
					<center><h4>For Girls</h4></center>
				</div>
				<?php
             			$procat='babydresses';
                          $protag='girl';
					$sql=mysqli_query($con,"select * from product where procat='$procat' and protag='$protag'");
					if (!empty($sql)) {

				while($row=mysqli_fetch_array($sql))
			{ 
			?>
				<!-- Division/section of product-card1 ,start-->
				<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 '>
					<div class='boy-product1'>
						  <div class="card">
						  <div class="row ">
							<div class="col-md-4">
								<img src="hms/images/<?php echo $row['proimg'];?>" class="" height="150" width="150">
							</div>
							  <div class="col-md-8 px-3">
								<div class="card-block px-3 card-blockpadd">
								  <h4 class="card-title"><?php echo $row['proname'];?></h4>
								  <span id='pricebox1'><b><?php echo $row['proprice'];?> &#8377 </b></span>
										<p class="card-text"><?php echo $row['prodesc'];?></p>
										<!--<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<p>Please select your age:<br>this is only for <b>3 to 12 months</b> baby</p>
											
										</div>-->
										<br>
										<form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-success btn button">Add To Cart</button>
                                      </form>
                                       <div class="alert-message"></div>
								  <!--<a href="#" class="btn btn-primary" onclick="buy()"><i class="fa fa-shopping-cart" style="font-size:20px; color: white;"></i> Buy Now</a>-->
								</div>
							  </div>
							</div>
						  </div>
					  </div>
				</div>


				<?php }}else{
                echo "No Records.";
            } ?>
				
				
			<!-- Division/section of Row3 ,End-->
		</div>
		<!-- Division/section of Girls ,End-->
	</div>
	<!-- Division/section of Main ,End-->

   
<script>
  $(document).ready(function(){
 $(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();

$.ajax({
url:'action.php',
method:'post',
data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
success:function(response){
  console.log(response);
  $(".alert-message").html(response);
  //window.scrollto(0,0);
  load_cart_item_number();
}
});

 });

  load_cart_item_number();
function load_cart_item_number(){
  $.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){

  $("#cart-item").html(response);
  
}
});
}

  });
 
</script>
	<?php include_once("footer.php");?><!--Footer-->

	