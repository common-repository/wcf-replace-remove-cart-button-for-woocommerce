<?php

echo'<div class="modal" id="myModal_'.$id.'">';

?>
  <div class="modal-dialog">
    <div class="modal-content">

	
      <!-- Modal Header -->
	<div class="modal-header">
        <h4 class="modal-title">Product Enquiry</h4>
		
		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		
	</div>


      <!-- Modal body -->
	<div class="modal-body">
	
	<div id="proname"></div>
	
 <p style="text-align:left;">Product Name: <?php echo $product_title; ?><span style="margin-left:15px;"></span></p>
	<h6 id="modal_body"></h6>
        <form method="post" class="form-inline" action="" >
    <div class="mb-6 row">
      <label class="col-sm-2 col-form-label" for="enq_name">Name:</label>
	  <div class="col-sm-10">
      <input type="text" class="form-control" id="enq_name" placeholder="Enter your name"  name="wcf_enq_name" required>
	  </div>
    </div><br>
	
	<div class="mb-6 row">
      <label class="col-sm-2 col-form-label"  for="enq_email">Email:</label>
	   <div class="col-sm-10">
      <input type="email" class="form-control" id="enq_email" placeholder="Enter your email"  name="wcf_enq_email">
	  </div>
    </div><br>
	<div class="mb-6 row">
      <label class="col-sm-2 col-form-label"  for="enq_contact">Phone:</label>
	   <div class="col-sm-10">
		<input type="text" class="form-control" id="enq_contact" placeholder="Enter your phone no."  name="wcf_enq_contact" required>
	   </div>
    </div><br>
   
	<div class="mb-6 row">
		<label class="col-sm-2 col-form-label"  for="enq_contact">Message:</label>
		<div class="col-sm-10">
		<textarea class="form-control" name="wcf_prod_comment" id="prod_comment" rows="5" cols="50" placeholder="Comment here.."></textarea>
		</div>
	</div><hr/>
    
   
	<div class="mb-6 row">
		<label class="col-sm-2 col-form-label"  for="enq_contact"></label>
		<div class="col-sm-10">
		 <button type="submit" class="btn btn-primary" name="enq_sub">Submit</button>
		</div>
	</div><br>
  </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
	
    </div>
  </div>
</div>

		<?php
		if(isset($_POST['enq_sub'])){
				 
				 $name = sanitize_text_field($_POST['wcf_enq_name']);
				 $user_email = sanitize_email($_POST['wcf_enq_email']);
				 $to = get_option('wcf_recep_mail');
				 $phone = sanitize_text_field($_POST['wcf_enq_contact']);
				 $message = sanitize_textarea_field($_POST['wcf_prod_comment']);
				 $from = get_option('admin_email');
				 $subject = 'Product Enquiry';
				  
						//echo '<li>' . esc_html( $user->display_name ) .'&nbsp;'. '[' . esc_html( $user->user_email ) . ']</li>';
						$headers = array(
					'From: Product Enquiry <' . $from . '>',
					'Content-Type: text/html; charset=UTF-8'
					
				);
				$headers = implode("\r\n", $headers);
				//Here put your Validation and send mail
			 
			  
			  $message_body = '<b>You Have Enquiry For: '.$product_title.'!</b><br>'
								.'Name: '.$name.'<br>'
								.'Email: '.$user_email.'<br>'
								.'Phone: '.$phone.'<br>'
								.'Message: '.$message.'<br>';
								
			   //  $sent = wp_mail($user_email, $subject, $message, $headers);
			   $sent = wp_mail($to, $subject, $message_body, $headers);
							
							$succes = true;
							
			/*  if($succes==true){
				   
				   
			   }else{
				   
				   echo "Oops! Something went wrong";
				   
			   } 
					*/		
				 
			 }


		?>