<?php
if(isset($_GET['d'])) header('Content-type: image/jpeg');

$_GET['t'] = str_replace("-", "%20", str_replace("--", "%0A", $_GET['t']));

$renderImg = imagecreatefromjpeg('img/render.jpg');
$renderFont = dirname(__FILE__) . '/big_noodle_titling_oblique.ttf';
$renderColor = imagecolorallocate($renderImg, 250, 202, 6);

$textLines = explode("\n", urldecode($_GET['t']));

foreach($textLines as $no => $textLine)
{
  if($no > 1) break;
  
  $typeSpace = imagettfbbox(250, 0, $renderFont, $textLine);
  $textWidth = abs($typeSpace[4] - $typeSpace[0]) + 10;
  imagettftext($renderImg, 250, 0, (3508-$textWidth)/2, 750+$no*400, $renderColor, $renderFont, $textLine);
}

if(!isset($_GET['d'])) ob_start(); 
imagejpeg($renderImg);
imagedestroy($renderImg);

if(!isset($_GET['d'])) {
  $imgData = ob_get_contents();
  ob_get_clean();
  echo base64_encode($imgData);
}
?>