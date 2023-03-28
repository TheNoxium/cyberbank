

Ваш баланс:
<?php echo htmlspecialchars($user['Balans']); ?><br>


<?php
 


$user_Login = htmlspecialchars($user['Login']);

$sql = "SELECT * FROM $user_Login";
if($result = mysqli_query($db, $sql)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    //echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>История переводов</th>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["transfhistory"] . "</td>";
            
        echo "</tr> ";

            echo "<td>" . $row["transf_date"] . "</td>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($db);
?>





