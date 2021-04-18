<?php

if(isset($_GET['chapter_id'])){
	$chapter_id = $_GET['chapter_id'];
} else {
	$chapter_id = $verify_quiz['chapter_id'];
}

//HITUNG TOTAL KUIS
$count_question = mysqli_query($conn, "SELECT count(no_quiz) AS total_quiz FROM result_quiz WHERE username = '$_SESSION[user]' AND chapter_id = '$chapter_id'");
$question = mysqli_fetch_array($count_question);

//HITUNG JAWABAN BENAR
$count_status = mysqli_query($conn, "SELECT count(status) AS current FROM result_quiz WHERE username = '$_SESSION[user]' AND status = 1 AND chapter_id = $chapter_id");
$status = mysqli_fetch_array($count_status);

//MENAMPILKAN NILAI DENGAN 2 ANGKA DIBELAKANG KOMA
$score = number_format(100/$question['total_quiz'], '2');

//MEMBULATKAN NILAI KE 100 JIKA BENAR SEMUA
if($question['total_quiz'] == $status['current']){
	$total_score = '100.00';
} else {
    $total_score = number_format($score * $status['current'],'2');
}

?>

<!-- JIKA LULUS --> 

<?php if($total_score > 65){ ?>

	<h6 class="center">
		Selamat! Anda dinyatakan<br>
		<b class="green-text">- LULUS -</b><br>
		Nilai Anda <b><?= $total_score ?></b>, dengan grade <b><?php grade($total_score) ?></b>
	</h6>

<!-- JIKA TIDAK LULUS --> 

<?php } else { ?>

	<h6 class="center">
		Maaf, Anda dinyatakan<br>
		<b class="red-text">- TIDAK LULUS -</b><br>
		Nilai Anda <b><?= $total_score ?></b>, dengan grade <b><?php grade($total_score) ?></b>
		<br>Tetap semangat dan belajar lebih giat lagi.
	</h6>

<?php } ?>

<br>
<h6>Berikut adalah lampiran hasil pekerjaan Anda:</h6>

<table class="highlight bordered striped">
	<thead>
		<tr>
			<th width="10%">NO.</th>
			<th>STATUS</th>
			<th>NILAI</th>
		</tr>
	</thead>
	<tbody>

        <?php
        //MENAMPILKAN SEMUA DATA
        $no = 0;
        $get_quiz = mysqli_query($conn, "SELECT * FROM result_quiz WHERE username = '$_SESSION[user]' AND chapter_id = '$chapter_id'");
        while($quiz = mysqli_fetch_array($get_quiz)){ $no++;
        ?>

		<tr>
			<td><?= $no ?></td>
			<td><?= $quiz['status'] == 1? 'Benar' : 'Salah' ?></td>
			<td class="number-format"><?= $quiz['status'] == 1? $score : '0.00' ?></td>
		</tr>

		<?php } ?>

	</tbody>
	<tfoot>
		<tr>
			<th colspan="2">TOTAL NILAI</th>
			<th class="number-format"><?= $total_score ?></th>
		</tr>
	</tfoot>
</table>