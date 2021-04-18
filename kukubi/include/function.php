<?php
function popUp($msg){
	echo "
	<script>
		window.alert('$msg'); 
	</script>";
}

function msgBox($msg, $go){
	echo "
	<script>
		window.alert('$msg'); 
		window.location='$go';
	</script>";
}

function go($url){
	echo "
	<script> 
		window.location='$url';
	</script>";
}

function back(){
	echo "
	<script> 
		window.history.back();
	</script>";
}

function alert($color, $font_color, $message){
	echo "<div class='card-panel $color'>
			<span class='$font_color'>$message</span>
		</div>";
}

function grade($total_score){
	if($total_score >= 0 && $total_score < 10){
		$grade = 'E';
	} else if($total_score >= 10 && $total_score < 18){
		$grade = 'E+';
	} else if($total_score >= 18 && $total_score < 28){
		$grade = 'D-';
	} else if($total_score >= 28 && $total_score < 36){
		$grade = 'D';
	} else if($total_score >= 36 && $total_score < 46){
		$grade = 'D+';
	} else if($total_score >= 46 && $total_score < 55){
		$grade = 'C-';
	} else if($total_score >= 55 && $total_score < 63){
		$grade = 'C';
	} else if($total_score >= 63 && $total_score < 70){
		$grade = 'C+';
	} else if($total_score >= 70 && $total_score < 75){
		$grade = 'B-';
	} else if($total_score >= 75 && $total_score < 80){
		$grade = 'B';
	} else if($total_score >= 80 && $total_score < 85){
		$grade = 'B+';
	} else if($total_score >= 85 && $total_score < 90){
		$grade = 'A-';
	} else if($total_score >= 90 && $total_score <= 100){
		$grade = 'A';
	} 

	echo $grade;
}

function randomChar($length, $count, $characters) {  
    $symbols = array();
    $code_verify = array();
    $used_symbols = '';
    $code = '';
 
    $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '1234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
    $characters = explode(",", $characters); 

    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value];
    }

    $symbols_length = strlen($used_symbols) - 1; 
     
    for ($p = 0; $p < $count; $p++) {
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); 
            $code .= $used_symbols[$n];
        }
        $code_verify[] = $code;
    }
     
    return $code_verify; 
}

function tanggal($time){
	$waktu = explode(" ", $time);
	$tanggal = explode("-", $waktu[0]);

	if($tanggal[1] == '01'){
		$bulan = 'Januari';
	} else if($tanggal[1] == '01'){
		$bulan = 'Januari';
	} else if($tanggal[1] == '02'){
		$bulan = 'Februari';
	} else if($tanggal[1] == '03'){
		$bulan = 'Maret';
	} else if($tanggal[1] == '04'){
		$bulan = 'April';
	} else if($tanggal[1] == '05'){
		$bulan = 'Mei';
	} else if($tanggal[1] == '06'){
		$bulan = 'Juni';
	} else if($tanggal[1] == '07'){
		$bulan = 'Juli';
	} else if($tanggal[1] == '08'){
		$bulan = 'Agustus';
	} else if($tanggal[1] == '09'){
		$bulan = 'September';
	} else if($tanggal[1] == '10'){
		$bulan = 'Oktober';
	} else if($tanggal[1] == '11'){
		$bulan = 'November';
	} else if($tanggal[1] == '12'){
		$bulan = 'Desember';
	}

	echo $tanggal[2]." ".$bulan." ".$tanggal[0];
}
?>