<?php
	/*** Important do not change ***/
	session_start();
	if(!isset($_SESSION['simple_login'])){
		header("Location: index.php");
		exit();
	}
	/*** Important END ***/
?>

<!-------- Write you stuff down here -------->

<div align="center">
 <h1 align="center">Welcome, <?php echo $_SESSION['simple_login']; ?></h1>
<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d;
</script>
    <body color=grey>
        <form action="DecisionMaker.php"><br>
        <div class="group">
        
					<label for="pass" class="label">Equipment</label>
					<style>
						#EquipmentName option{
								background-color: black;
								color: white;
						}
					</style>
        
<!--<input name="EquipmentName" id="EquipmentName" placeholder="Equipment Name" type="text"><br>-->
        					<select class="input" data-live-search="true" name="EquipmentName" id="EquipmentName" required>
					
<option value="" selected="selected">-Your Equipment-</option>
<option value="Autoclave">Autoclave</option>
<option value="Stethoscope">Stethoscope</option>
<option value="Stethoscope">Equipment1</option>
<option value="Stethoscope">Equipment2</option>
<option value="Stethoscope">Equipment3</option>
<option value="Stethoscope">Equipment4</option>
                            </select>


				</div>
<input type="submit" value="Submit"></form>

<p align="center"><a href="logout.php">Logout</a></p>
</div>
	</body>
</html>