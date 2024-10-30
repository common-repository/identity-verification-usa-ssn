<div class="wrap ivs-bc">
	<h2 class="update-nag"> Identity Verification USA SSN - Client Key & Client Secret </h3>
	<hr>
	<div class="setting">
		<form action="" method="post">
			<table class="form-table">
				<tr>
					<td>
						Client Key
					</td>
					<td>
					
						<input type="text"  name="client_id" required value="<?php echo (count($configurations)>0?$configurations[0]->client_id:'')?>">
					</td>
				</tr>
				<tr>
					<td>
						Client Secret
					</td>
					<td>
						<input type="text"  name="client_secret" required value="<?php echo (count($configurations)>0?$configurations[0]->client_secret:'')?>">
					</td>
				</tr>
				<tr>
					<td>
						Redirect Url
					</td>
					<td>
						<input type="text"  name="redirect_url" required value="<?php echo (count($configurations)>0?$configurations[0]->redirect_url:'')?>">
					</td>
				</tr>
				<tr>
					<td>
						Error Url
					</td>
					<td>
						<input type="text"  name="error_url" required value="<?php echo (count($configurations)>0?$configurations[0]->error_url:'')?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right" class="td-btn">
						<input type="submit" value="Save"  class="btn">
					</td>
				</tr>
			</table>	
		</form>
		<?php
		if($configurations[0]->client_id!=''){
		?>
			<div class="update-nag">Short Code : [IVS_IDENTITYVERIFICATION_USASSN]</div>
		<?php
		}else{
		?>
			<div class="update-nag">Please Configure to Generate Short Code</div>
		<?php
		}
		?>
		<?php
	 	if  (!in_array  ('curl', get_loaded_extensions())) {
        	echo '<div class="update-nag">Install Curl on Your Server to Run this plugin</div>';
   	 	}
   	 	?>
	</div>
</div>