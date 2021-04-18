<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){

	$get_username = mysqli_query($conn, "SELECT username FROM user WHERE id = '$_GET[id]'");
	$data_username = mysqli_fetch_array($get_username);

	$delete_bio = mysqli_query($conn, "DELETE FROM biodata_user WHERE username = '$data_username[username]'");
	$delete_user = mysqli_query($conn, "DELETE FROM user WHERE id = '$_GET[id]'");

	if($delete_bio && $delete_user)
		go("index.php?log=delete");
}
?>