  <html>
  <body>
    <!-- for visitor count -->
        <form action="filter.php" method="post">
             <center><div>Website visit count:</div>
            <div class="website-counter"></div></center>
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
        </form>

        <?php
            include_once 'database.php';
            
            $sql = "SELECT * FROM animalInfo ORDER BY name asc";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) 
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
        
                echo "<table id=myTable><tr><th colspan = 3>Name</th><th colspan = 3>Category</th><th colspan = 3>Image</th><th colspan = 3>Description</th><th colspan = 3>Life Expectancy</th></tr>";
    
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {

                    echo "<tr><td colspan = 3>" . $row["name"]. "</td><td colspan = 3>" . $row["category"]. "</td><td colspan = 3>" . $row["image"]. "</td><td colspan = 3>" . $row["description"] . "</td><td colspan = 3>" . $row["lifeexp"]. "</td></tr>";

                }
     

                 echo "</table>";
                echo"</html>";
            } 
            else 
            {
                echo "0 results";
            }

?>
</body>
</html>

<script>
    var counterContainer = document.querySelector(".website-counter");
    var resetButton = document.querySelector("#reset");
    var visitCount = localStorage.getItem("page_view");

    // Check if page_view entry is present
    if (visitCount) {
    visitCount = Number(visitCount) + 1;
    localStorage.setItem("page_view", visitCount);
    } else {
    visitCount = 1;
    localStorage.setItem("page_view", 1);
    }
    counterContainer.innerHTML = visitCount;

    // Adding onClick event listener
    resetButton.addEventListener("click", () => {
    visitCount = 1;
    localStorage.setItem("page_view", 1);
    counterContainer.innerHTML = visitCount;
});
</script>,,