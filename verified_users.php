<h3 class="update-nag"><?php echo $usertype?></h3>
<?php
if(count($verified_users)>0){
?>
<table class="tbl-list">
	<tr>
		<th>
			Name
		</th>
		<th>
			Identity Type
		</th>
		<th>
			Date Of Birth
		</th>
		<th>
			Country
		</th>
		
	</tr>
<?php
	for($r=0;$r<count($verified_users);$r++){
?>
	<tr>
		<td>
			<?php echo ucfirst($verified_users[$r]->first_name)." ".ucfirst($verified_users[$r]->last_name)?>
		</td>
		<td>
			<?php echo ucwords(str_replace("_"," ",$verified_users[$r]->identity_type))?>
		</td>
		<td>
			<?php echo ucfirst($verified_users[$r]->date_of_birth)?>
		</td>
		<td>
			<?php echo ucfirst($verified_users[$r]->country)?>
		</td>
		
	</tr>
<?php		
	}
?>
</table>
<?php
}else{
	echo "<br/>No Data Found";
}
?>