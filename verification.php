<img src="<?php echo plugins_url('/images/loader.gif' , __FILE__)?>" style="display:none" class="loader_image">

<?php
if(count($configurations)>0 && in_array  ('curl', get_loaded_extensions())){
?>

	<div class="ivs-form1">
		<div class="ivs-message alert-static"></div>
		<form id="verify_data_ivssn" action="" method="post" enctype="multipart/form-data">
			<div class="ivs-inner-form">
				<div class="ivs-field personal_info">
					<label for="driving_license">Name </label>
					<div class="ivs-input">	
						<input type="text" name="first_name" id="name" >
						<span class="err_name err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				<div class="ivs-field personal_info">
					<label for="driving_license">Surname </label>
					<div class="ivs-input">	
						<input type="text" name="last_name" id="surname" >
						<span class="err_lname err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				<div class="ivs-field " style="float:left;width:100%">
					<label for="driving_license">Date of Birth </label>
					<div class="ivs-input">
						<select class="day "  style="width: 32% !important;float:left">
						   <option value="">Day</option>
						   <option value="01">1</option>
						   <option value="02">2</option>
						   <option value="03">3</option>
						   <option value="04">4</option>
						   <option value="05">5</option>
						   <option value="06">6</option>
						   <option value="07">7</option>
						   <option value="08">8</option>
						   <option value="09">9</option>
						   <option value="10">10</option>
						   <option value="11">11</option>
						   <option value="12">12</option>
						   <option value="13">13</option>
						   <option value="14">14</option>
						   <option value="15">15</option>
						   <option value="16">16</option>
						   <option value="17">17</option>
						   <option value="18">18</option>
						   <option value="19">19</option>
						   <option value="20">20</option>
						   <option value="21">21</option>
						   <option value="22">22</option>
						   <option value="23">23</option>
						   <option value="24">24</option>
						   <option value="25">25</option>
						   <option value="26">26</option>
						   <option value="27">27</option>
						   <option value="28">28</option>
						   <option value="29">29</option>
						   <option value="30">30</option>
						   <option value="31">31</option>
						</select>
						<select class="month " style="width: 32% !important;float:left;margin-left:5px">
						   <option value="">Month</option>
						   <option value="01">Jan</option>
						   <option value="02">Feb</option>
						   <option value="03">Mar</option>
						   <option value="04">Apr</option>
						   <option value="05">May</option>
						   <option value="06">Jun</option>
						   <option value="07">Jul</option>
						   <option value="08">Aug</option>
						   <option value="09">Sep</option>
						   <option value="10">Oct</option>
						   <option value="11">Nov</option>
						   <option value="12">Dec</option>
						</select>
						<select class="year " style="width: 33% !important;float:left;margin-left:5px">
						   <option value="">Year</option>
						   <option value="2013">2013</option>
						   <option value="2012">2012</option>
						   <option value="2011">2011</option>
						   <option value="2010">2010</option>
						   <option value="2009">2009</option>
						   <option value="2008">2008</option>
						   <option value="2007">2007</option>
						   <option value="2006">2006</option>
						   <option value="2005">2005</option>
						   <option value="2004">2004</option>
						   <option value="2003">2003</option>
						   <option value="2002">2002</option>
						   <option value="2001">2001</option>
						   <option value="2000">2000</option>
						   <option value="1999">1999</option>
						   <option value="1998">1998</option>
						   <option value="1997">1997</option>
						   <option value="1996">1996</option>
						   <option value="1995">1995</option>
						   <option value="1994">1994</option>
						   <option value="1993">1993</option>
						   <option value="1992">1992</option>
						   <option value="1991">1991</option>
						   <option value="1990">1990</option>
						   <option value="1989">1989</option>
						   <option value="1988">1988</option>
						   <option value="1987">1987</option>
						   <option value="1986">1986</option>
						   <option value="1985">1985</option>
						   <option value="1984">1984</option>
						   <option value="1983">1983</option>
						   <option value="1982">1982</option>
						   <option value="1981">1981</option>
						   <option value="1980">1980</option>
						   <option value="1979">1979</option>
						   <option value="1978">1978</option>
						   <option value="1977">1977</option>
						   <option value="1976">1976</option>
						   <option value="1975">1975</option>
						   <option value="1974">1974</option>
						   <option value="1973">1973</option>
						   <option value="1972">1972</option>
						   <option value="1971">1971</option>
						   <option value="1970">1970</option>
						   <option value="1969">1969</option>
						   <option value="1968">1968</option>
						   <option value="1967">1967</option>
						   <option value="1966">1966</option>
						   <option value="1965">1965</option>
						   <option value="1964">1964</option>
						   <option value="1963">1963</option>
						   <option value="1962">1962</option>
						   <option value="1961">1961</option>
						   <option value="1960">1960</option>
						   <option value="1959">1959</option>
						   <option value="1958">1958</option>
						   <option value="1957">1957</option>
						   <option value="1956">1956</option>
						   <option value="1955">1955</option>
						   <option value="1954">1954</option>
						   <option value="1953">1953</option>
						   <option value="1952">1952</option>
						   <option value="1951">1951</option>
						   <option value="1950">1950</option>
						   <option value="1949">1949</option>
						   <option value="1948">1948</option>
						   <option value="1947">1947</option>
						   <option value="1946">1946</option>
						   <option value="1945">1945</option>
						   <option value="1944">1944</option>
						   <option value="1943">1943</option>
						   <option value="1942">1942</option>
						   <option value="1941">1941</option>
						   <option value="1940">1940</option>
						</select>

						<br/>
						<span class="err_dob err"></span>
					</div>	
					<div class="clear"></div>
				</div>
			</div>
			<div class="ivs-inner-form">
				<div class="ivs-field personal_info">
					<label for="driving_license">Building </label>
					<div class="ivs-input">	
						 <input type="text" name="building" id="building" >
						<span class="err_building err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				<div class="ivs-field personal_info">
					<label for="driving_license">Street </label>
					<div class="ivs-input">	
						 <input type="text" name="street" id="street" >
						<span class="err_street err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				
				
				<div class="ivs-field personal_info" style="float:left;width:100%">
					<label for="driving_license">Postal Code </label>
					<div class="ivs-input">	
						 <input type="text" name="postal_code" id="postal_code" >
						<span class="err_postal_code err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				<div class="ivs-field personal_info">
					
				</div>
			</div>
			<div class="ivs-inner-form">
				<div class="ivs-field ">
					<label for="driving_license">Social Security Number </label>
					<div class="ivs-input">	
						 <input type="text" name="social_security_number" id="social_security_number" >
						<span class="err_social_security_number err"></span>
					</div>		
					<div class="clear"></div>
				</div>
				<div class="ivs-field personal_info">
					
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="ivs-field ivs-btn">	
				<label for =""></label>
				<a href="#?"  class="" id="identity_verification_usa_ssn"> Verify </a>
				<div class="clear"></div>
			</div>	
		</form>

	</div>
<?php
}else{

	echo "API Credentials Not Yet Configured";
}
?>


<div class="result" style="float:left">
</div>