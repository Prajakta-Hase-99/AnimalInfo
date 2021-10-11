<!DOCTYPE html>
<html>
 <head>
 	<style>
 			body{
  				/*background: #555;*/
  				max-width: 500px;
 	 				margin: auto;
 	 				padding: 10px;
 	 				background-color: lightblue;
				}	
			
			input[type=text],input[type=textarea] select {
  		    width: 100%;
  				padding: 12px 20px;
          margin: 8px 0;
  				display: inline-block;
   				border: 1px solid #ccc;
  				border-radius: 4px;
  				box-sizing: border-box;
			}
	</style>
 </head>
<body>
 	<h1>Animal Information</h1>
 		<form method="post">
 			<label for="name" style="font-size: 20px;font-family: Arial;font-weight: bold;">Name Of Animal</label>
 			<input type="text" id="name" name="name"><br>
 		
 			<p style="font-size: 20px;font-family: Arial;font-weight: bold;">Please select Category</p>
 			<input type="radio" id="herbivores" name="category" value="Herbivores">
 			<label for="herbivores">Herbivores</label><br>
 			<input type="radio" id="omnivores" name="category" value="Omnivores">
 			<label for="omnivores">Omnivores</label><br>
 			<input type="radio" id="carnivores" name="category" value="Carnivores">
 			<label for="carnivores">Carnivores</label><br><br>
 			
 			<label for="filename" style="font-size: 20px;font-family: Arial;font-weight: bold;">Image</label>
 			<input type="file" id="myFile" name="filename"><br><br>
 			
 			<label for="description" style="font-size: 20px;font-family: Arial;font-weight: bold;">Description</label><br>
 			<textarea rows="4" cols="50" id="description" name="description">Enter text here...</textarea><br><br>
 		
 			<label for="life" style="font-size: 20px;font-family: Arial;font-weight: bold;">Life Expectancy</label>
 			<select name="life" id="life">
 				<option value="null">Please Select</option>
 				<option value="0-1">0-1 year</option>
  			<option value="1-5">1-5 years</option>
  			<option value="5-10">5-10 years</option>
  			<option value="10+">10+ years</option>
			</select><br><br>
			
			<label for="captcha">Captcha</label>
				<?php
						$no1=rand(1,100); //generate random number for captcha
						$no2=rand(1,100);

						echo $no1."+".$no2; 
						if(isset($_REQUEST["submit"]))
						{
								$userans=$_REQUEST["userans"];
								$number1=$_REQUEST["no1"]; //getting number from form which genarated randomly
								$number2=$_REQUEST["no2"];
								$total=$number1+$number2; 
								if($total==$userans)      //comapring user ans and total if match the insert operation perform
								{
									include_once 'database.php';
									if(isset($_POST['submit']))
									{	 
	 									$name = $_POST['name'];
	 									$category = $_POST['category'];
	 									$filename = $_POST['filename'];
	 									$description = $_POST['description'];
	 									$life = $_POST['life'];
	 									$sql = "INSERT INTO animalInfo (name,category,image,description,lifeexp)
	 									VALUES ('$name','$category','$filename','$description','$life')";
	 								
	 									if (mysqli_query($conn, $sql)) 
	 									{
								 				echo '<script>window.location.href = "listing.php";</script>';
	 									} 
	 									else 
	 									{
												echo "Error: " . $sql . " " . mysqli_error($conn);
	 									}
	 									mysqli_close($conn);
									}
								}
								else
								{
									echo "Calculation False";
								}

						}
		?>
		<input type="hidden" name="no1" value="<?php echo $no1 ?>">
		<input type="hidden" name="no2" value="<?php echo $no2 ?>">
		<input type="text" name="userans">
		<input type="submit" value="submit" name="submit">

 	</form>
 </body>

</html>
