
<h1>Список пользователей сайта:</h1>

<ul>
<?php
$query_1 = mysqli_query($db,"SELECT * FROM Accounts");
while ( $assoc_1 = mysqli_fetch_assoc($query_1) ) {
echo '<li><a href="'.URL.'/admin/edit/?id='.intval($assoc_1['ID']).'">' . htmlspecialchars($assoc_1['Login']) . '</a></li>';
}
?>
</ul>