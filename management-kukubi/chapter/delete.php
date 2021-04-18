<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){

	//HITUNG MATERI
	$gc_course = mysqli_query($conn, "SELECT count(*) AS total FROM chapter WHERE chapter_id = '$_GET[id]'");
	$rc_course = mysqli_fetch_array($gc_course);

	//HITUNG KUIS
	$gc_quiz = mysqli_query($conn, "SELECT count(*) AS total FROM quiz WHERE chapter_id = '$_GET[id]'");
	$rc_quiz = mysqli_fetch_array($gc_quiz);

	//HAPUS MATERI JIKA ADA
	if($rc_course > 0){
		$delete = mysqli_query($conn, "DELETE FROM chapter WHERE chapter_id = '$_GET[id]'");
	}

	//HAPUS KUIS JIKA ADA
	if($rc_quiz > 0){
		$gi_quiz = mysqli_query($conn, "SELECT image FROM quiz WHERE chapter_id = '$_GET[id]'");
		while($ri_quiz = mysqli_fetch_array($gi_quiz)){
			if($ri_quiz['image'] != '0')
				unlink($ri_quiz['image']);
		}

		$delete = mysqli_query($conn, "DELETE FROM quiz WHERE chapter_id = '$_GET[id]'");
	}

	//HAPUS CHAPTER
	$delete = mysqli_query($conn, "DELETE FROM data_surat WHERE id = '$_GET[id]'");

	if($delete)
		go("index.php?log=delete");
}
?>