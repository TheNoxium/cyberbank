
<div id="nav-link ">

     <div class="submitButton3 ">
<?php
 


$user_Login = htmlspecialchars($user['Login']);



$sql = "SELECT * FROM $user_Login ORDER BY `transf_date` DESC limit 0,5";
if($result = mysqli_query($db, $sql)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    //echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>История переводов</th>";
    foreach($result as $row){
      echo "<td>";
      echo "</tr>";
      echo "</tr>";
      echo "<td>";
      echo "</tr>";
      echo "<td>";
      echo "</tr>";
        echo "<tr>";
            echo "<td>" . $row["transfhistory"] . "</td>";
            
            
        echo "</tr>";
        echo "<td>" . $row["transfmessage"] . "</td>";
        echo "</tr>";
        echo "<td>" . $row["transf_date"] . "</td>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        echo "<td>";
        echo "</tr>";
        
        
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($db);

?>


    </div>

</form>

