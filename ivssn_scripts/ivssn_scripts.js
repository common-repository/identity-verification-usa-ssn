jQuery(document).ready(function(){


	


	jQuery("#identity_verification_usa_ssn").click(function(){
	 	var regex_name=/^([a-zA-Z]+\s)*[a-zA-Z|_|-]+$/;
       	var regex_number= /^[0-9]{5}$/;
        var regex_no_nine= /^[0-9]{9}$/;
        var regex_no=/^[0-9]+$/;
		 var postdata='';

		 if(jQuery("#name").val()==''){
		 	jQuery("#name").focus();
		 	jQuery("#name").css("border","1px solid red");
		 	jQuery(".err_name").text("Please Enter Name");;
		 	return false;
		 }
		 else if(!regex_name.test(jQuery("#name").val())){
		 	jQuery("#name").focus();
		 	jQuery("#name").css("border","1px solid red");
		 	jQuery(".err_name").text("Please Enter Valid Name");;
		 	return false;	
		 }else{
		 	jQuery("#name").css("border","1px solid #dfdfdf");
		 	jQuery(".err_name").text("");;
		 }
		 if(jQuery("#surname").val()==''){
		 	jQuery("#surname").focus();
		 	jQuery("#surname").css("border","1px solid red");
		 	jQuery(".err_lname").text("Please Enter Surname");;
		 	return false;
		 }
		 else if(!regex_name.test(jQuery("#surname").val())){
		 	jQuery("#surname").focus();
		 	jQuery("#surname").css("border","1px solid red");
		 	jQuery(".err_lname").text("Please Enter Valid Surname");;
		 	return false;	
		 }else{
		 	jQuery("#surname").css("border","1px solid #dfdfdf");
		 	jQuery(".err_lname").text("");;
		 }

	 	 if(jQuery(".day").val()=='' || jQuery(".month").val()=='' || jQuery(".year").val()==''){
          jQuery(".err_dob").text("Please Select Your Date of Birth");
          
          return false;
        }else{
          
          jQuery(".err_dob").text("");
        }

        if(jQuery("#building").val()==''){
		 	jQuery("#building").focus();
		 	jQuery("#building").css("border","1px solid red");
		 	jQuery(".err_building").text("Building Field is Madatory");;
		 	return false;
		 }
		 else{
		 	jQuery("#building").css("border","1px solid #dfdfdf");
		 	jQuery(".err_building").text("");;
		 }
		 if(jQuery("#street").val()==''){
		 	jQuery("#street").focus();
		 	jQuery("#street").css("border","1px solid red");
		 	jQuery(".err_street").text("Street Field is Madatory");;
		 	return false;
		 }
		 else{
		 	jQuery("#street").css("border","1px solid #dfdfdf");
		 	jQuery(".err_street").text("");;
		 }

		 if(jQuery("#postal_code").val()==''){
		 	jQuery("#postal_code").focus();
		 	jQuery("#postal_code").css("border","1px solid red");
		 	jQuery(".err_postal_code").text("Please Enter Your Postal Code");;
		 	return false;
		 }else if(!regex_no.test(jQuery("#postal_code").val())){
		 		
		 	
	 			jQuery("#postal_code").focus();
		 		jQuery("#postal_code").css("border","1px solid red");
		 		jQuery(".err_postal_code").text("Please Enter Valid Postal Code");
		 	
		 	
		 	return false;
		 }
		 else{
		 		var postal_code=jQuery("#postal_code").val();
		 		if(postal_code.length<5 || postal_code.length>9){

		 			jQuery("#postal_code").focus();
			 		jQuery("#postal_code").css("border","1px solid red");
			 		jQuery(".err_postal_code").text("Please Enter Valid Postal Code betweeb 5-9");
			 		return false;
			 	}else{
		 			jQuery("#postal_code").css("border","1px solid #dfdfdf");
		 			jQuery(".err_postal_code").text("");;
		 		}
		 }
		 if(jQuery("#social_security_number").val()==''){
		 	jQuery("#social_security_number").focus();
		 	jQuery("#social_security_number").css("border","1px solid red");
		 	jQuery(".err_social_security_number").text("Please Enter Social Security Numbe");;
		 	return false;
		 }else if(!regex_no.test(jQuery("#social_security_number").val())){
	 		jQuery("#social_security_number").focus();
		 	jQuery("#social_security_number").css("border","1px solid red");
		 	jQuery(".err_social_security_number").text("Please Enter Valid Social Security Number");;
		 	return false;
		 }
		 else{
		 	jQuery("#social_security_number").css("border","1px solid #dfdfdf");
		 	jQuery(".err_social_security_number").text("");;
		 }
		 

		 var dob=jQuery(".day").val()+"-"+jQuery(".month").val()+"-"+jQuery(".year").val();
		 postdata="first_name="+jQuery("#name").val()+"&last_name="+jQuery("#surname").val()+"&dob="+dob+"&building="+jQuery("#building").val()+"&street="+jQuery("#street").val()+"&postal_code="+jQuery("#postal_code").val()+"&social_security_number="+jQuery("#social_security_number").val();

		 jQuery(".loader_image").css("display","block");
              jQuery("body").css("opacity",'0.5');
		jQuery.ajax({
			url:site_url+"/wp-admin/admin-ajax.php?action=verify",
			type:'post',
			data:postdata,
			success:function(result_ivs){
				 jQuery(".loader_image").css("display","none");
              jQuery("body").css("opacity",'1');
				jQuery(".ivs-form1").slideUp("slow");
				jQuery(".result").css("display","block");
				jQuery(".result").slideDown("slow");
				jQuery(".result").html(result_ivs);
			}
		});
	})
})