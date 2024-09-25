<?php
    session_start();
    header("Content-Type:image/png");
    $text = rand(1000,99999);
    $_SESSION['capcode'] = $text;
    $cimg = imagecreate(50,30);
    $black = imagecolorallocate($cimg,0,0,0);
    $white = imagecolorallocate($cimg,255,255,255);
    $font = 13;
    imagestring($cimg,$font,5,5,$text,$white);
    imagepng($cimg);
    imagedestroy($cimg);

?>