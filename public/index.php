<?php
declare(strict_types=1);

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

echo '<pre>';

/*
$datetime = new DateTime('now');
echo $datetime->format( 'd/m/Y H:i' );


echo '<br>';

$datetime->setTimezone( new DateTimeZone('Europe/Rome') )->setDate(2021,05,01);
echo $datetime->getTimezone()->getName() . ' ' .  $datetime->format( 'd/m/Y H:i' );

echo '<br>';
echo '<br>';


$date = '15/05/2023 13:58';

$datetime2 = new DateTime( str_replace( '/', '-', $date ) );
var_dump($datetime2);


$datetime3 = DateTime::createFromFormat( 'd/m/Y H:i', $date )->setTime(0,0);
var_dump($datetime3);
*/
/*
$dateTime1 = new DateTIme('05/25/2021 9:15 AM');
$dateTime2 = new DateTIme('05/25/2021 9:14 AM');

var_dump( $dateTime1 < $dateTime2 );
var_dump( $dateTime1 > $dateTime2 );
var_dump( $dateTime1 == $dateTime2 );
var_dump( $dateTime1 <=> $dateTime2 );

var_dump( $dateTime1->diff( $dateTime2 ) );
var_dump( $dateTime2->diff( $dateTime1 ) );


var_dump( $dateTime1->diff( $dateTime2 )->format( '%R %Y years, %m months, %d days, %h hours, %i minutes' ) );
var_dump( $dateTime2->diff( $dateTime1 )->format( '%R %Y years, %m months, %d days, %h hours, %i minutes ' )  );


$interval = new DateInterval( 'P3M2D' );

$dateTime1->add( $interval );
echo $dateTime1->format("d/m/Y H:i:s");
echo '<br>';
$dateTime1->sub( $interval );
echo $dateTime1->format("d/m/Y H:i:s");
*/

$from = new DateTime();
$to = (clone $from)->add( new DateInterval('P1M') );

echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y');

echo '<br>';

$from1 = new DateTimeImmutable();
$to2 = $from1->add( new DateInterval('P1M') );

echo $from1->format('d/m/Y') . ' - ' . $to2->format('d/m/Y');