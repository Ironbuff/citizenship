<?php 
extract($_POST);
if(isset($add))
{

	if($details=="" || $sub==""  )
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
		//foreach($user as $v)
		//{
mysqli_query($conn,"insert into notice values('','$sub','$details','$group',now())");
		//}
		
		$err="<font color='green'>Notice added Successfully</font>";	
	}
}

?>
<center><h2>Add New Notice</h2></center><br>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">Select Group</div>
		<div class="col-sm-5">
		<select name="group" class="form-control"/>

				<option value="1">All</option>
				<option value="2">Registered Citizen</option>
				<option value="3">Unapproved Citizen</option>

	</select></div>
	</div>
	
	<br>
	
	
	<div class="row">
		<div class="col-sm-4">Enter Subject</div>
		<div class="col-sm-5">
		<input type="text" name="sub" class="form-control"/></div>
	</div>
	
	<br>
	<div class="row">
		<div class="col-sm-4">Enter Details</div>
		<div class="col-sm-5">
		<textarea name="details" class="form-control"></textarea></div>
	</div>
	
	
	
	 
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
		
		<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
		<input type="submit" value="Add New Notice" name="add" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	