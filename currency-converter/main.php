<?php declare(strict_types=1);

use App\App;

require_once 'vendor/autoload.php';

$howMuch = (float)readline('How much you want to convert:');
$toCurrency = (string)readline('Convert To Currency:');

$app = new App($howMuch, $toCurrency);
$app->start();
$convert = $app->getConvert();

echo PHP_EOL;
echo 'Rate is :' . $convert->getRate() . PHP_EOL;
echo 'Now you have:' . $convert->getResult() . ' ' . $convert->getUserRequestCurrency() . PHP_EOL;