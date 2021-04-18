<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){

	$delete = mysqli_query($conn, "DELETE FROM glossarium WHERE id = '$_GET[id]'");

	if($delete)
		go("index.php?log=delete");
}
?>