<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Intervention\Image\ImageManagerStatic as Image;

class Image_lib
{
    public function __construct()
    {
        // Load autoload dari composer
        require APPPATH . '../vendor/autoload.php';
    }

    public function make($path)
    {
        return Image::make($path);
    }
}
