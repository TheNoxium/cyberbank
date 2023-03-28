<?php
 


$user_Login = htmlspecialchars($user['Login']);


$sql = mysqli_query($db, "SELECT `transfhistory`, `transf_date` FROM $user_Login ORDER BY `transf_date` DESC limit 0,5");
while ($result = mysqli_fetch_array($sql)) {
   
  echo "{$result['transfhistory']}: {$result['transf_date']} <br>";
}



?>

