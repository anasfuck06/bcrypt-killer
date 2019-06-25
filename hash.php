<?php
error_reporting(0);
function brute($hash,$list){
	$z=file_get_contents($list);
	$x=explode("\n",$z);
	foreach($x as $i => $xx){
		$ix=$i+1;
		if(password_verify($xx, $hash)){
			echo "[ Found ] $hash = $xx | $ix\n";
			exit();
		}else{
			echo "[$ix] $xx -> [ Not Found ]\n";
		}
	}
}
if($argv[1] && $argv[2]){
	brute($argv[1], $argv[2]);
}else{
	echo "{ PHP HASH BruteForce }\nUsage : hash.php [hash] [wordlist]\n\n Code by FilthyRoot\n";
}
?>
