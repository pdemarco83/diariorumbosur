 <?php
$from   = 'USD'; /*change it to your required currencies */
$to     = 'ARS';
$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
$handle = @fopen($url, 'r');
 
if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
}
$allData = explode(',',$result); /* Get all the contents to an array */
$dollarValue = $allData[1];
 
echo 'DÓLAR '.$dollarValue;
?>

<?php
$from   = 'EUR'; /*change it to your required currencies */
$to     = 'ARS';
$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
$handle = @fopen($url, 'r');
 
if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
}
$allData = explode(',',$result); /* Get all the contents to an array */
$euroValue = $allData[1];
 
echo 'EURO '.$euroValue;

?>