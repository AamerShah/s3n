<?php
error_reporting(0);
$state=0;
$qq='';
$comp_src = file_get_contents('./comp/temp_xss.txt');
$url = 'https://xss.is/forums/-/index.rss';

include './cURL.php';

if(strstr( $headers, "HTTP/1.1 200" ) == false) {$state=1; $qq.=' Error '; goto a;}
if( $result == "" ) {echo B; mail("To: alerts@example.com","Crash","Criteria hit: Blank response","From: xs@example.com");goto a;}
if ( $result == $comp_src ) goto a;

$raw_t = $result;
$raw_t = str_replace(array("\n", "\r", "\t", "\v", "\0", "}", "{", '"'), '', $raw_t);

include './workers/watsonlate.php';
if(strstr( $respo, 'watson-forbidden-error' ) == true) {echo 'translate'; mail("To: alerts@example.com","t_api_exhaust","Criteria hit: Watson_Died","From: xs@example.com");goto a;}

$lres=strtolower($respo);

file_put_contents("./comp/temp_xss.txt", $result);

include './workers/search.php';

a: echo " X_Executed: " . $state . " | " . $qq;
if($state==1){
    $filename = "XF-".date("Ymd").'-'.date("Hm").'-'.date("s").'.txt';
    file_put_contents("./dumps/".$filename."", $respo, FILE_APPEND | LOCK_EX);
    $initiator = "XF";
    include './notifier.php';
}
    echo "<br />";
?>
