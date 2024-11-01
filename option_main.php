<?php
	if(isset($_POST['wcf_sve_btn'])){
		
		$enble_enqry_all = sanitize_key($_POST['cart_disable']);
		$hide_price_all = sanitize_key($_POST['price_hide_all']);
		$button_text = sanitize_text_field($_POST['wcf_btn_lbl']);
		$recipient = sanitize_email($_POST['wcf_enq_btn_email']);
		
		update_option('wcf_recep_mail', $recipient);
		
		if(empty($button_text)) { 
		update_option('wcf_enqry_button', 'Enquiry Now');
		
		
		}else{
			
			 update_option('wcf_enqry_button', $button_text); 
			
		}
		 if(!empty($enble_enqry_all)) { 
	$enable = 1;
	update_option('wcf_enqry_enable', '1'); 
	} else { 
	$enable = 0;
	update_option('wcf_enqry_enable', ''); 
	}
	
	if(!empty($hide_price_all)) { 
	$enable = 1;
	update_option('wcf_price_hide', '1'); 
	} else { 
	$enable = 0;
	update_option('wcf_price_hide', ''); 
	}
	
	}	
	
?>
	<div class="container">
	<div style="margin-bottom:50px; margin-top:50px;">
	<h2>WCF Remove & Replace Cart Button</h2>
	 <hr />

	</div>
 
	  <form method="post" class="form-horizontal" action="">
	  
		<div class="mb-6 row">
		  <label class="col-sm-4 col-form-label" for="cart_replace">Hide Cart Button (Enable Enquiry Button):</label>
			<div class="col-sm-6">
					<input type="hidden" class="form-control" value="0" id="cart_replace" name="cart_disable">
					 <?php if(get_option('wcf_enqry_enable') != '') {?>
					<input type="checkbox" class="form-control" id="cart_replace" name="cart_disable" checked><label style="margin-left:15px; margin-top:6px;">Enable Cart (For whole website)</label>
					<?php } else {?>
					<input type="checkbox" class="form-control" id="cart_replace" name="cart_disable"><label style="margin-left:15px; margin-top:6px;">Enable Cart (For whole website)</label>
					<?php } ?>
			</div>
		</div><br>
		<div class="mb-6 row">
		  <label class="col-sm-4 col-form-label" for="hide_price">Hide Price:</label>
		
			<div class="col-sm-6">
					<input type="hidden" value="0" class="form-control" id="hide_price" name="price_hide_all">
					<?php if(get_option('wcf_price_hide') != '') {?>
					<input type="checkbox" class="form-control" id="hide_price" name="price_hide_all" checked><label style="margin-left:15px; margin-top:6px;">Hide (For whole website)</label>
					<?php } else {?>
					<input type="checkbox" class="form-control" id="hide_price" name="price_hide_all"><label style="margin-left:15px; margin-top:6px;">Hide (For whole website)</label>
					<?php } ?>
			</div>	
		</div><br>
		
		<div class="mb-6 row">
			  <label class="col-sm-4 col-form-label" for="btn_lbl">Enquiry Button Text:</label>
			 
			<div class="col-sm-6">          
				<input type="text" class="form-control" id="btn_lbl" placeholder="Enter Button Text" name="wcf_btn_lbl"  value="<?php esc_html_e( get_option('wcf_enqry_button'));?>">
			</div>
		</div><br>
		
		<div class="mb-6 row">
			  <label class="col-sm-4 col-form-label" for="btn_cat">Hide category wise:</label>
			  <div class="col-sm-6">
					<select class="form-select" aria-label="Default select example" disabled>
							  <option selected>--Select Category--</option>
							  <option value="1">One</option>
							  <option value="2">Two</option>
							  <option value="3">Three</option>
							</select><label style="color:red;">(Pro Version)</label>
				<!--<input type="text" class="form-control" id="btn_cat" placeholder="Enter Category Id (Pro)" name="wcf_cat_wise" disabled><label style="color:red;">(Pro Version)</label>-->
			</div>
		</div><br>
		<div class="mb-6 row">
			  <label class="col-sm-4 col-form-label" for="btn_cat">Enquiry Button Color:</label>
			  <div class="col-sm-6">          
				<input type="color" class="form-control form-control-color" id="btn_colr" placeholder="Select Color (Pro)" name="wcf_enq_btn_clr" disabled ><label style="color:red;">(Pro Version)</label>
			  </div>
		</div><br>
	
		<div class="mb-6 row">
			    <label class="col-sm-4 col-form-label" for="btn_enq_email">Enquiry Email (Recipient Email):</label>
			
			 <div class="col-sm-6">          
				<input type="email" class="form-control" id="btn_enq_email" placeholder="Enter Recipient Email" name="wcf_enq_btn_email" value="<?php esc_html_e(get_option('wcf_recep_mail'));?>" required><label style="color:red;"></label>
			 </div>
		</div><br>
		<div class="mb-6 row">
			
				<label class="col-sm-4 col-form-label" for="btn_clr">Hide Cart Button (On Specific Product):</label>
			
			 <div class="col-sm-6">     
				<input type="checkbox" class="form-control" id="btn_clr" name="cart_active" disabled><label style="margin-left:15px; margin-top:6px;" >Enable <span style="color:red;">(Pro Version)</span></label>
			</div>
		</div><br>
		<div class="mb-6 row">
		 
				<label class="col-sm-4 col-form-label" for="btn_sub"></label>
			
			<div class="col-sm-6">  
				<button type="submit" class="btn btn-primary" name="wcf_sve_btn">Save Changes</button>
			</div>
		</div>
	  </form>
	</div>