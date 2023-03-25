<pre>
    <?php
$logtrans = mysqli_query($db,"SELECT * FROM `Accounts` WHERE `login`='govno7'");
$logtrans = mysqli_fetch_all($logtrans);
var_dump($logtrans);
?>
</pre>