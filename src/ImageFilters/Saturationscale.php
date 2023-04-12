<?php

namespace App\ImageFilters;

use Imagine\Filter\Advanced\OnPixelBased;
use Imagine\Filter\FilterInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;

class Saturationscale extends OnPixelBased implements FilterInterface
{
    public function __construct()
    {
        parent::__construct(function (ImageInterface $image, Point $point) {
            return $image->getColorAt($point);
        });

    }
    public function saturate()
    {

    }
}