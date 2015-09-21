<?php

$dpi = 300; // pixels per inch

function mmToPixels($mm)
{
	global $dpi;
	$inches = $mm / 25.4;
	return $inches * $dpi;
}

$x = mmToPixels($_POST['x']); // width of front in mm
$y = mmToPixels($_POST['y']); // height of front in mm
$z = mmToPixels($_POST['z']); // depth of box in mm


// width of image required
$width = (2 * $x) + (3 * $z) + $dpi; // half an inch padding either side

$height = $y + (4 * $z) + $dpi; // half an inch padding top and bottom

$image = imagecreatetruecolor($width, $height);
imagesavealpha($image, true);

// fill with transparent
$transColour = imagecolorallocatealpha($image,0x00,0x00,0x00,127);
imagefill($image, 0, 0, $transColour);

// black for the border
$borderColour = imagecolorallocate($image, 0, 0, 0);

// some widths
$padding = ($dpi / 2);
$leftTab = $z;

// Side panel
imagerectangle($image,
				$padding + $leftTab,
				$padding + ($z * 2),
				$padding + $leftTab + $z,
				$padding + ($z * 2) + $y,
				$borderColour);

// Back panel
imagerectangle($image,
				$padding + $leftTab + $z,
				$padding + ($z * 2),
				$padding + $leftTab + $z + $x,
				$padding + ($z * 2) + $y,
				$borderColour);
// Side panel
imagerectangle($image,
				$padding + $leftTab + $z + $x,
				$padding + ($z * 2),
				$padding + $leftTab + $z + $x + $z,
				$padding + ($z * 2) + $y,
				$borderColour);

// Front panel
imagerectangle($image,
				$padding + $leftTab + $z + $z + $x,
				$padding + ($z * 2),
				$padding + $leftTab + $z + $z + (2 * $x),
				$padding + ($z * 2) + $y,
				$borderColour);

// Top panel
imagerectangle($image,
				$padding + $leftTab + $z,
				$padding + ($z),
				$padding + $leftTab + $z + $x,
				$padding + ($z * 2),
				$borderColour);

// Bottom panel
imagerectangle($image,
				$padding + $leftTab + $z,
				$padding + ($z * 2) + $y,
				$padding + $leftTab + $z + $x,
				$padding + ($z * 3) + $y,
				$borderColour);

// Top flap
imagearc($image,
			$padding + $leftTab + $z + $z, $padding + $z,
			$z * 2,	$z * 2,
			180, 270, $borderColour);
imagearc($image,
			$padding + $leftTab + $x, $padding + $z,
			$z * 2,	$z * 2,
			270, 360, $borderColour);
imageline($image,
			$padding + $leftTab + $z + $z,
			$padding,
			$padding + $leftTab + $x,
			$padding,
			$borderColour);

// left flap
imagepolygon($image,
			array(
				$padding + $leftTab,	$padding + ($z * 2),
				$padding + $leftTab,	$padding + ($z * 2) + $y,
				$padding,			$padding + ($z * 2) + (0.9 * $y),
				$padding,			$padding + ($z * 2) + (0.1 * $y),
			),
			4, $borderColour);

// top flap
imagepolygon($image,
			array(
				$padding + $leftTab + (0.1 * $z),	$padding + $z,
				$padding + $leftTab + (0.9 * $z),	$padding + $z,
				$padding + $leftTab + $z,			$padding + ($z * 2),
				$padding + $leftTab,				$padding + ($z * 2),
			),
			4, $borderColour);
// top flap
imagepolygon($image,
			array(
				$padding + $leftTab + $x + (1.1 * $z),	$padding + $z,
				$padding + $leftTab + $x + (1.9 * $z),	$padding + $z,
				$padding + $leftTab + $x + (2 * $z),		$padding + ($z * 2),
				$padding + $leftTab + $x + $z,			$padding + ($z * 2),
			),
			4, $borderColour);

// bottom flap
imagepolygon($image,
			array(
				$padding + $leftTab + $z + (0.1 * $x),	$padding + $y + (4 * $z),
				$padding + $leftTab + $z + (0.9 * $x),	$padding + $y + (4 * $z),
				$padding + $leftTab + $z + $x,			$padding + $y + (3 * $z),
				$padding + $leftTab + $z,				$padding + $y + (3 * $z),
			),
			4, $borderColour);

// bottom flap
imagepolygon($image,
			array(
				$padding + $leftTab + (0.1 * $z),	$padding + $y + (3 * $z),
				$padding + $leftTab + (0.9 * $z),	$padding + $y + (3 * $z),
				$padding + $leftTab + $z,			$padding + $y + (2 * $z),
				$padding + $leftTab,				$padding + $y + (2 * $z),
			),
			4, $borderColour);
// bottom flap
imagepolygon($image,
			array(
				$padding + $leftTab + $x + (1.1 * $z),	$padding + $y + (3 * $z),
				$padding + $leftTab + $x + (1.9 * $z),	$padding + $y + (3 * $z),
				$padding + $leftTab + $x + (2 * $z),		$padding + $y + (2 * $z),
				$padding + $leftTab + $x + $z,			$padding + $y + (2 * $z),
			),
			4, $borderColour);

// finger hole
imagearc($image,
			$padding + $leftTab + $z + $x + $z + ($x / 2), $padding + $z + $z,
			$x / 4,	$x / 4,
			0, 180, $borderColour);

header("Content-Type: image/png");
header('Content-Disposition: attachment; filename="tuckbox-'.$_POST['x'].'-'.$_POST['y'].'-'.$_POST['z'].'.png"');
imagepng($image);

