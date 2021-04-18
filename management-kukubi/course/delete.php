<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$delete = mysqli_query($conn, "DELETE FROM chapter WHERE id = '$_GET[id_course]'");

	if($delete)
		go("index.php?id=$_GET[id]&log=delete");
}
?>