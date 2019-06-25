<?php
#error_reporting(0);
function brute($hash,$pass){
static $status=0;
$ax=file_get_contents($hash);
$bx=file_get_contents($pass);
$a=explode("\n",$ax);
$b=explode("\n",$bx);
echo "[+] Cracking ... \n";
foreach($a as $aa){
	foreach($b as $bb){
		if($aa == NULL or $bb == NULL){continue;}
		elseif(password_verify($bb, $aa)){
			echo "[+] Found! $aa = $bb\n";
			$status++;
		}else{
			echo "";
		}
	}
}
if($status == 0){
	echo "[-] Nothing is found.\n";
}
}
if($argv[1] && $argv[2]){
	brute($argv[1],$argv[2]);
}else{
	echo "| PHP HASH CRACKER |\nUsage : ".$_SERVER['PHP_SELF']." [hash.txt] [wordlist.txt]\nCode by FilthyRoot\n";
}
?>
