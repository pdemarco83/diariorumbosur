<?php
/**
* The Sidebar containing the main widget areas.
*
* @package diariorumbosur
* @since diariorumbosur 1.0
*/
?>
<div id="secondary" class="widget-area" role="complementary">

<div class="cotizacion">
	<h1 class="widget-title">Cotización Peso Argentino</h1>

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

	echo '<p><b>DÓLAR</b> '.$dollarValue.' | ';

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

	echo '<b>EURO</b> '.$euroValue.'<br />';
	
	?>

</div>


    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary .widget-area -->