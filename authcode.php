<?php
session_start();

header('Content-Type: image/png');

$img = imagecreatetruecolor(150, 40);
$bgcolor = imagecolorallocate($img, rand(0,100),rand(0,100),rand(0,100));
imagefill($img, 0,0,$bgcolor);
$authcode = '';
$str = 'abcdefghijklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$strlen = strlen($str);

for($i = 0; $i < 4; $i++) {
    $text = $str[rand(0, $strlen - 1)];
    $authcode .= $text;
    $x = ((150 - 30) / 4) * $i + 15;
    $y = 30;
    $textcolor = imagecolorallocate($img, rand(150,255),rand(150,255),rand(150,255));
    imagettftext($img, '28', '0', $x, $y, $textcolor, 'AdobeHeitiStd-Regular.otf', $text);
}

$_SESSION['authcode'] = strtoupper($authcode);

for ($i = 0; $i < 8; $i++) {
    $linecolor = imagecolorallocate($img, rand(100,200),rand(100,200),rand(100,200));
    imageline($img, rand(0, 149),rand(0,39),rand(0, 149),rand(0,39), $linecolor);
}

for ($i = 0; $i < 800; $i++) {
    $pixelcolor = imagecolorallocate($img, rand(150,255),rand(150,255),rand(150,255));
    imagesetpixel($img, rand(0, 149),rand(0,39), $pixelcolor);
}

imagepng($img);