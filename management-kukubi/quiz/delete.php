<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$gi_quiz = mysqli_query($conn, "SELECT image FROM quiz WHERE id = '$_GET[id_quiz]'");
	$ri_quiz = mysqli_fetch_array($gi_quiz);
	
	if($ri_quiz['image'] != '0')
		unlink($ri_quiz['image']);
	
	$delete = mysqli_query($conn, "DELETE FROM quiz WHERE id = '$_GET[id_quiz]'");

	if($delete)
		go("index.php?id=$_GET[id]&log=delete");
}
?>