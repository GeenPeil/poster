<?php
if(isset($_GET['d'])) header('Content-type: image/jpeg');

$_GET['t'] = str_replace("-", "%20", str_replace("--", "%0A", $_GET['t']));

$renderImg = imagecreatefromjpeg('img/render.jpg');
$renderFont = dirname(__FILE__) . '/big_noodle_titling_oblique.ttf';
$renderColor = imagecolorallocate($renderImg, 250, 202, 6);

$textLines = explode("\n", urldecode($_GET['t']));

foreach($textLines as $no => $textLine)
{
  printline:
  if($no > 1) break;
  
  $typeSpace = imagettfbbox(250, 0, $renderFont, $textLine);
  $textWidth = abs($typeSpace[4] - $typeSpace[0]) + 10;
  if($textWidth > 3450)
  {
    $wordsLine = explode(" ", $textLine);
    
    $saved = 0;
    $i = count($wordsLine)-1;
    while($saved < $textWidth-3450)
    {
      $wordTypeSpace = imagettfbbox(250, 0, $renderFont, $wordsLine[$i]);
      $wordWidth = abs($wordTypeSpace[4] - $wordTypeSpace[0]) + 10;
      $saved += $wordWidth;
      $i--;
    }
    
    list($textLine, $addNextLine) = array_chunk($wordsLine, $i+1);
    
    $lineSpace = 3508-$textWidth+$saved+250;
  }
  elseif(isset($saved))
  {
    $lineSpace = 3508-$textWidth-$saved;
  }
  else
  {
    $lineSpace = 3508-$textWidth;
  }
  
  imagettftext($renderImg, 250, 0, $lineSpace/2, 750+$no*400, $renderColor, $renderFont, (is_array($textLine) ? implode(" ", $textLine) : $textLine));

  if(count($textLines) == 1 && !$no)
  {
    $no = 1; $textLine = implode(" ", $addNextLine);
    unset($addNextLine);
    unset($saved);
    goto printline;
  }
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
