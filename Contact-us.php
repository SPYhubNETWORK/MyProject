	<?php include_once("header.php");?><!--Header-->


	<div class="main">

		<!-- div of Contact form start -->
		<div class="container">
			<div class="row">
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 padd-head '>
					<!-- About us headig -->
					<center><h4 class="heading">Contact Us</h4></center>
				</div>
				<!-- Brand/logo -->
				<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 '>
					<img src="image/contactus.jpg" height="350" width="350">
				</div>
						<!-- contact form -->
				<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 contact-form'>
					<center><img src="image/takulogo2.jpg" height="70" width="70"></center>
					<center><h5 style="padding: 10px">How ,I can help you ?<br>&#9990;</h5></center>
					<form action='' method="POST" id='contact-form'>
						  <div class="form-group">
						    
						    <input type="text" class="form-control" name='name' id="name" placeholder="Enter Your Name*" 
						    onkeyup="document.getElementById('nameErr').innerHTML=''" required="">
						    <label class="text-danger " id="nameErr"></label>
						  </div>
						  <div class="form-group">
						   
						    <input type="number" class="form-control" name='phone' id="phone" placeholder="Enter Your Phone*" 
						    onkeyup="document.getElementById('phoneErr').innerHTML=''" required>
						    <label class="text-danger " id="phoneErr"></label>
						  </div>
						  <div class="form-group">
						    
						    <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp" placeholder="Enter email*"
						    onkeyup="document.getElementById('emailErr').innerHTML=''" required>
						    <label class="text-danger " id="emailErr"></label>
						  </div>
						  <div class="form-group">
						    
						    <input type="text" class="form-control"  name='txt-subject' id="txt-subject" placeholder="What is your Subject*"
						    onkeyup="document.getElementById('subjectErr').innerHTML=''" required>
						    <label class="text-danger" id="subjectErr"></label>
						  </div>
						  <div class="form-group">
						    
						    <textarea class="form-control" name='txt-message' id="txt-message" rows="3" placeholder="What's in your mind?"
						    onkeyup="document.getElementById('messageErr').innerHTML=''" required='required'></textarea>
						    <label class="text-danger " id="nameErr"></label>
						  </div>
						  <div class="submit">
						  	<button type="submit" id='btnSubmit' class="btn btn-primary">Submit</button>
						  </div>
						  
						  <div id="mail-status"></div>
					</form>
				</div>
			</div>
		</div>
		<!-- div of Contact form End -->

		<!-- div of map form start -->
		<div class="map">
			<div class="map animatedParent">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12  mnp">
							<h4><i>Locate Us On Map</i> &#9906;</h4>
							<div class="map-text animated fadeInDownShort go">
							    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.5696403603274!2d74.23843217417667!3d16.698405622289513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc101e7b54f2fab%3A0xeca671d8f385eef1!2sHaripriya%20Plaza!5e0!3m2!1sen!2sin!4v1699685748606!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- div of map form End -->
	</div>

	<!--////////php///////////-->
<script>

 $(document).ready(function () {

		$("#btnSubmit").click(function (event) {

			event.preventDefault();

			  var data = new FormData($('#contact-form')[0]);

			  if($('#name').val().trim()==''){

				 document.getElementById("nameErr").innerHTML = "Please provide Name";

				 document.getElementById("name").focus();

				 return;

			  }

			  if($('#email').val().trim()==''){

				 document.getElementById("emailErr").innerHTML = "Please provide Email";

				 document.getElementById("email").focus();

				 return;

			  }

			  if($('#phone').val().trim()==''){

				 document.getElementById("phoneErr").innerHTML = "Please provide Mobile Number";

				 document.getElementById("phone").focus();

				 return;

			  }
			   if($('#txt-subject').val().trim()==''){

				 document.getElementById("subjectErr").innerHTML = "Please provide subject";

				 document.getElementById("txt-subject").focus();

				 return;

			  }

			  if($('#txt-message').val().trim()==''){

				 document.getElementById("messageErr").innerHTML = "Please provide Message";

				 document.getElementById("txt-message").focus();

				 return;

			  }

			  $("#btnSubmit").prop("disabled", true);

			  

   

   	 //alert(dataString);

    	//var form = $(this);

		 $.ajax({

            type: "POST",

            url: "result.php",

            data: data,

            processData: false,

				contentType: false,

				cache: false,

				success: function(data) { 
 				console.log(data);
               $("#mail-status").removeClass('text-danger');

						$("#mail-status").addClass('text-success');

						$("#mail-status").html("We have received your enquiry successfully!");
						alert("We have received your enquiry successfully!, our team contact soon..")

						$("#btnSubmit").prop("disabled", false);

						$('#name').val('');

						$('#email').val('');

						$('#phone').val('');
						$('#txt-subject').val('');

						$('#txt-message').val('');

            },

            error:function(error){

                $("#mail-status").removeClass('text-success');

						$("#mail-status").addClass('text-danger');

						$("#mail-status").html("Something went wrong..Please try again!");

            }

				

            

        

        });//ajax

	});//2nd Function

      });//1st function

    </script>
			<!-- Division of Footer -->
	<?php include_once("footer.php");?><!--Footer-->

