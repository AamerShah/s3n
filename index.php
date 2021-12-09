<?php $tyme = microtime();
$tyme = explode(' ', $tyme);
$tyme = $tyme[1] + $tyme[0];
$strt = $tyme;?>

<?php
include_once 'principal.php';
include_once 'principal2.php';
?>

<hr /><?php
$tyme = microtime();
$tyme = explode(' ', $tyme);
$tyme = $tyme[1] + $tyme[0];
$fin = $tyme;
$total_time = round(($fin - $strt), 4);
echo 'Time consumed '.$total_time.' seconds.';
?>
