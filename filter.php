<html>
<body>
	<form action="listing.php">
	<input type="submit" value="Back" name="Back">
</form>
	</body>
</html>

<?php
include_once 'database.php';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    
    $query = "SELECT * FROM `animalInfo` WHERE CONCAT(`category`, `lifeexp`) LIKE '%".$valueToSearch."%'";
    $search_result = $conn->query($query);
      if ($search_result->num_rows > 0) 
      {
        echo "<html>";
        echo "<head><h1><center>Animal Information</cente</h1></head>";
        echo "<style>
            body{
                  width: 100%;
                  margin: auto;
                  padding: 10px;
                  background-color: lightblue;
                }
            
            table {
                   width: 100%;
                   border-collapse: collapse;
                }
            table,th,td{
                   border: 1px solid black;
                }";
        echo "</style>";
        
        echo "<table id=myTable><tr><th colspan = 1>ID</th><th colspan = 3>Name</th><th colspan = 3>Category</th><th colspan = 3>Image</th><th colspan = 3>Description</th><th colspan = 3>Life Expectancy</th></tr>";
   
        // output data of each row
        while($row = mysqli_fetch_array($search_result)) 
        {

            echo "<tr><td colspan = 1>" . $row["id"]. "</td><td colspan = 3>" . $row["name"]. "</td><td colspan = 3>" . $row["category"]. "</td><td colspan = 3>" . $row["image"]. "</td><td colspan = 3>" . $row["description"] . "</td><td colspan = 3>" . $row["lifeexp"]. "</td></tr>";

        }
            echo "</table>";
        echo"</html>";
	}
}
else 
{
    $query = "SELECT * FROM `animalInfo`";
    $search_result = $conn->query($query);
    if ($search_result->num_rows > 0) 
    {
        echo "<html>";
        echo "<head><h1><center>Animal Information</cente</h1></head>";
        echo "<style>
            body{
            width: 100%;
            margin: auto;
            padding: 10px;
            background-color: lightblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table,th,td{
         border: 1px solid black;
         }";
        echo "</style>";
        echo "<table id=myTable><tr><th colspan = 1>ID</th><th colspan = 3>Name</th><th colspan = 3>Category</th><th colspan = 3>Image</th><th colspan = 3>Description</th><th colspan = 3>Life Expectancy</th></tr>";
    
        // output data of each row
        while($row = mysqli_fetch_array($search_result)) 
        {

            echo "<tr><td colspan = 1>" . $row["id"]. "</td><td colspan = 3>" . $row["name"]. "</td><td colspan = 3>" . $row["category"]. "</td><td colspan = 3>" . $row["image"]. "</td><td colspan = 3>" . $row["description"] . "</td><td colspan = 3>" . $row["lifeexp"]. "</td></tr>";

        }
     echo "</table>";
    echo"</html>";
    }
}
?>