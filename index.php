<?php

	/**
	* Plugin Name: Identity Verification US SSN
	* Plugin URI: https://profiles.wordpress.org/identity-verification-services
	* Description: With this API you can verify a valid user address as well as the identity.The verification requires the user to complete the total information that uniquely matches the Social Security Number in order to be verified.
	* Author: Identity Verification Services
	* Author URI: https://profiles.wordpress.org/identity-verification-services
	* Version: 2.0
	*/

	// Activation Block
	register_activation_hook(__FILE__,"ivssn_activation");

	
	function ivssn_activation(){

		global $wpdb;
		$ivssn_configurations = $wpdb->prefix . "ivssn_configurations";
		if($wpdb->get_var("SHOW TABLES LIKE '$ivssn_configurations'") != $ivssn_configurations) {
		     $sql = "CREATE TABLE $ivssn_configurations (
		      setting_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		      client_id VARCHAR(200) NOT NULL,
		      client_secret VARCHAR(200) NOT NULL,
		      auth_token VARCHAR(150),
		      redirect_url VARCHAR(200),
		      error_url VARCHAR(200)
		    );";
		    //reference to upgrade.php file
		    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		    dbDelta( $sql );
		}
		$verified_users = "ivssn_verified_users";
		if($wpdb->get_var("SHOW TABLES LIKE '$verified_users'") != $verified_users) {
		     $verified_users_sql = "CREATE TABLE $verified_users (
		      verification_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		      identity_type VARCHAR(50),
		      first_name VARCHAR(50),
		      last_name VARCHAR(50),
		      date_of_birth VARCHAR(50),
		      country VARCHAR(50),
		      is_verified varchar(50),
		      updated_date VARCHAR(50)
		    );";
		    //reference to upgrade.php file
		    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		    dbDelta( $verified_users_sql );
		}

	}


	// Deactivation Block

	register_deactivation_hook(__FILE__,'ivssn_deactivation');

	function ivssn_deactivation(){
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."ivssn_configurations,ivssn_verified_users");

	}

	add_action("admin_menu","ivssn_admin_menu");

	function ivssn_admin_menu(){
		add_menu_page("IV USA SSN","IV USA SSN",'manage_options','ivssn_configuration','ivssn_configuration');
		add_submenu_page("ivssn_configuration","Verified Users","Verified Users",'manage_options','iv_usa_ssn_verified_users','iv_usa_ssn_verified_users');
		add_submenu_page("ivssn_configuration","Non-Verified Users","Non-Verified Users",'manage_options','iv_usa_ssn_non_verified_users','iv_usa_ssn_non_verified_users');
	}

	function ivssn_configuration(){
		global $wpdb;

		if($_POST){
			$configurations=$wpdb->get_results("select * from ".$wpdb->prefix."ivssn_configurations");
			if(count($configurations)>0)
				$wpdb->update($wpdb->prefix."ivssn_configurations",$_POST,array('setting_id'=>$configurations[0]->setting_id));
			else
				$wpdb->insert($wpdb->prefix."ivssn_configurations",$_POST);
			
			wp_redirect(site_url()."/wp-admin/admin.php?page=ivssn_configuration");
		}

		$configurations=$wpdb->get_results("select * from ".$wpdb->prefix."ivssn_configurations");
		include("configurations.php");
	}


	// Verified Users List
	function iv_usa_ssn_verified_users(){
		global $wpdb;
		$usertype='Verified Users';
		$type_users="Verified Mobiles";
		$verified_users=$wpdb->get_results("select * from ivssn_verified_users where is_verified='1'");
		include("verified_users.php");
	}


	// Non Verified Users List
	function iv_usa_ssn_non_verified_users(){
		global $wpdb;
		$usertype='Non-Verified Users';
		$verified_users=$wpdb->get_results("select * from ivssn_verified_users where is_verified='0'");
		include("verified_users.php");
	}
	// Front End

	function ivssn_verification(){
		global $wpdb;
		$configurations=$wpdb->get_results("select * from ".$wpdb->prefix."ivssn_configurations");

		$states = array('AL'=>'ALABAMA','AK'=>'ALASKA','AS'=>'AMERICAN SAMOA','AZ'=>'ARIZONA','AR'=>'ARKANSAS','CA'=>'CALIFORNIA','CO'=>'COLORADO',
										'CT'=>'CONNECTICUT','DE'=>'DELAWARE','DC'=>'DISTRICT OF COLUMBIA','FM'=>'FEDERATED STATES OF MICRONESIA','FL'=>'FLORIDA','GA'=>'GEORGIA',
										'GU'=>'GUAM GU','HI'=>'HAWAII','ID'=>'IDAHO','IL'=>'ILLINOIS','IN'=>'INDIANA','IA'=>'IOWA','KS'=>'KANSAS','KY'=>'KENTUCKY','LA'=>'LOUISIANA',
										'ME'=>'MAINE','MH'=>'MARSHALL ISLANDS','MD'=>'MARYLAND','MA'=>'MASSACHUSETTS','MI'=>'MICHIGAN','MN'=>'MINNESOTA','MS'=>'MISSISSIPPI','MO'=>'MISSOURI',
										'MT'=>'MONTANA','NE'=>'NEBRASKA','NV'=>'NEVADA','NH'=>'NEW HAMPSHIRE','NJ'=>'NEW JERSEY','NM'=>'NEW MEXICO','NY'=>'NEW YORK','NC'=>'NORTH CAROLINA','ND'=>'NORTH DAKOTA',
										'MP'=>'NORTHERN MARIANA ISLANDS','OH'=>'OHIO','OK'=>'OKLAHOMA','OR'=>'OREGON','PW'=>'PALAU','PA'=>'PENNSYLVANIA','PR'=>'PUERTO RICO','RI'=>'RHODE ISLAND','SC'=>'SOUTH CAROLINA',
										'SD'=>'SOUTH DAKOTA','TN'=>'TENNESSEE','TX'=>'TEXAS','UT'=>'UTAH','VT'=>'VERMONT','VI'=>'VIRGIN ISLANDS','VA'=>'VIRGINIA','WA'=>'WASHINGTON','WV'=>'WEST VIRGINIA','WI'=>'WISCONSIN',
										'WY'=>'WYOMING','AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST','AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)','AP'=>'ARMED FORCES PACIFIC'
									);

		include("verification.php");
	}





	// Loading Styles

	add_action('wp_enqueue_scripts',"ivssn_styles");
	add_action("admin_enqueue_scripts","ivssn_styles");
	function ivssn_styles(){
		wp_register_style("ivssn_styles",plugins_url("css/ivssn_style.css",__FILE__));
		wp_enqueue_style("ivssn_styles");
	}

	// Loading Scripts
	add_action('wp_enqueue_scripts',"ivssn_scripts");
	function ivssn_scripts(){
		wp_enqueue_script('jquery');
		?>
<script>
	var site_url='<?php echo site_url()?>'
</script/>
	<?php
		wp_register_script("ivssn_scripts",plugins_url("ivssn_scripts/ivssn_scripts.js",__FILE__));
		wp_enqueue_script("ivssn_scripts");
	}


	add_action("wp_ajax_get_cities",'cities');
	add_action("wp_ajax_nopriv_get_cities",'cities');

	function cities(){
		$cities=json_decode(file_get_contents('http://api.sba.gov/geodata/city_links_for_state_of/'.$_POST['state'].'.json'));

	?>
		<select name="city" id="city">
			<option value="">Select City</option>
			<?php
				
				for($s=0;$s<count($cities);$s++){
			?>
				<option value="<?php echo $cities[$s]->name?>-<?php echo $cities[$s]->state_name?>" ><?php echo $cities[$s]->name?></option>
			<?php		
				}
			?>
		</select>
	<?php
		exit;
	}


	add_action("wp_ajax_verify",'verify_ssn');
	add_action("wp_ajax_nopriv_verify",'verify_ssn');

	function verify_ssn(){
		global $wpdb;
		$auth_url='https://api.identityverification.com/get_verified/get_auth_token/';
		$configurations=$wpdb->get_results("select * from ".$wpdb->prefix."ivssn_configurations");
		$config_credentails['client_id']=$configurations[0]->client_id;
		$config_credentails['client_secret']=$configurations[0]->client_secret;
		
		$response=ivssn_sendPostData_api($auth_url,json_encode($config_credentails));

		$usa_ssn_url='https://api.identityverification.com/get_verified/usa_ssn/';
		
		$config_data=array(
						'auth_token'=>$response->auth_token,
						'first_name'=>$_POST['first_name'],
						'last_name'=>$_POST['last_name'],
						'date_of_birth'=>$_POST['dob'],
						'building'=>$_POST['building'],
						'street'=>$_POST['street'],
						'postal_code'=>$_POST['postal_code'],
						'social_security_number'=>$_POST['social_security_number'],	

			);

		$response=ivssn_sendPostData_api($usa_ssn_url,json_encode($config_data));
		$verified_users=array(
							'identity_type'=>$response->identity_type,
							'first_name'=>$response->first_name,
							'last_name'=>$response->last_name,
							'date_of_birth'=>$response->date_of_birth,
							'country'=>$response->country,
							'is_verified'=>($response->is_identity_verified==''?'0':'1'),
						);
		//echo "<pre>";print_r($verified_users);
		$wpdb->insert("ivssn_verified_users",$verified_users);
		include('thankyou.php');
		exit;
	}



	// API Call
	function ivssn_sendPostData_api($url, $post){
		  $ch = curl_init($url);
		  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
		  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		  $resulty = curl_exec($ch);
		  curl_close($ch);  // Seems like good practice
		  return json_decode($resulty);
		}

	add_shortcode("IVS_IDENTITYVERIFICATION_USASSN","ivssn_verification");

?>