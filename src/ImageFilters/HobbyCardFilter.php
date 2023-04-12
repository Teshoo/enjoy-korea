<?php

namespace App\ImageFilters;

use Imagine\Filter\Advanced\Grayscale;
use Imagine\Filter\Advanced\OnPixelBased;
use Liip\ImagineBundle\Imagine\Filter\Loader;
use Liip\ImagineBundle\Imagine\Filter\Loader\LoaderInterface;
use Imagine\Filter\FilterInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Imagine\Image\Palette\PaletteInterface;

class HobbyCardFilter implements LoaderInterface
{
    private int $saturation;

    public function load(ImageInterface $image, array $options = [/*'saturation' => $saturation*/])
    {

        for($x = 0; $x < $image->getSize()->getWidth(); $x++) {
            for($y = 0; $y < $image->getSize()->getHeight(); $y++) {
                $point = new Point($x, $y);
                $r = $image->getColorAt($point)->getValue('red');
                $g = $image->getColorAt($point)->getValue('green');
                $b = $image->getColorAt($point)->getValue('blue');
                $alpha = $image->getColorAt($point)->getAlpha();
                list($h, $s, $l) = $this->rgb2hsl($r, $g, $b);
                $s = $s * (100 + /*$saturation*/ 20 ) /100;
                if($s > 1) $s = 1;
                list($r, $g, $b) = $this->hsl2rgb($h, $s, $l);
                $palette = new PaletteInterface();
                $palette = $palette->color([$r, $g,$b], $alpha);
                //$image->draw()->dot($point, ColorInterface);
                $image->draw()->dot($point, $palette);
                //imagesetpixel($image->get(), $x, $y, imagecolorallocatealpha($image, $r, $g, $b, $alpha));
            }
        }
    }

    private function rgb2hsl($r, $g, $b)
    {
        $var_R = ($r / 255);
        $var_G = ($g / 255);
        $var_B = ($b / 255);

        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $v = $var_Max;

        if ($del_Max == 0) {
            $h = 0;
            $s = 0;
        } else {
            $s = $del_Max / $var_Max;

            $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

            if      ($var_R == $var_Max) $h = $del_B - $del_G;
            else if ($var_G == $var_Max) $h = ( 1 / 3 ) + $del_R - $del_B;
            else if ($var_B == $var_Max) $h = ( 2 / 3 ) + $del_G - $del_R;

            if ($h < 0) $h++;
            if ($h > 1) $h--;
        }

        return array($h, $s, $v);
    }

    private function hsl2rgb($h, $s, $l)
    {
        if($s == 0) {
            $r = $g = $B = $v * 255;
        } else {
            $var_H = $h * 6;
            $var_i = floor( $var_H );
            $var_1 = $v * ( 1 - $s );
            $var_2 = $v * ( 1 - $s * ( $var_H - $var_i ) );
            $var_3 = $v * ( 1 - $s * (1 - ( $var_H - $var_i ) ) );

            if       ($var_i == 0) { $var_R = $v     ; $var_G = $var_3  ; $var_B = $var_1 ; }
            else if  ($var_i == 1) { $var_R = $var_2 ; $var_G = $v      ; $var_B = $var_1 ; }
            else if  ($var_i == 2) { $var_R = $var_1 ; $var_G = $v      ; $var_B = $var_3 ; }
            else if  ($var_i == 3) { $var_R = $var_1 ; $var_G = $var_2  ; $var_B = $v     ; }
            else if  ($var_i == 4) { $var_R = $var_3 ; $var_G = $var_1  ; $var_B = $v     ; }
            else                   { $var_R = $v     ; $var_G = $var_1  ; $var_B = $var_2 ; }

            $r = $var_R * 255;
            $g = $var_G * 255;
            $B = $var_B * 255;
        }
        return array($r, $g, $B);
    }
}