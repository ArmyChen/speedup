<?php

/**
 * Example Application
 *
 * @package Example-application
 */

class captcha
{
    private $charset = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    private $code;
    private $path;
    private $codelen = 4;
    private $width = 76;
    private $height = 36;
    private $img;
    private $font;
    private $fontsize = 14;
    private $fontcolor;

    public function __construct()
    {
		$this->path = str_replace("\\", '/', dirname(__FILE__));
		$this->font = $this->path . '/fonts.ttf';
    }

    private function createCode()
    {
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codelen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $_len)];
        }
    }

    private function createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, mt_rand(150, 220), mt_rand(150, 220), mt_rand(150, 220));
        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    }

    private function createFont()
    {
        $_x = $this->width / $this->codelen;
        for ($i = 0; $i < $this->codelen; $i++) {
            $this->fontcolor = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imagettftext($this->img, $this->fontsize, mt_rand(-30, 30), $_x * $i + mt_rand(1, 5), $this->height / 1.4, $this->fontcolor, $this->font, $this->code[$i]);
        }
    }

    private function createLine()
    {
		for ($i = 0; $i < 80; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
			imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->height), '*', $color);
		}
		for ($i = 0; $i < 6; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
		}
    }

    private function outPut()
    {
		header("Pragma:no-cache");
		header("Cache-Control:no-cache");
		header("Expires:0");
		header('X-Powered-By: BFE/1.0.8.5 (Cdn Cache Server V2.0)');
		header('Content-type:image/png');
		imagepng($this->img);
		imagedestroy($this->img);
    }

    public function doimg()
    {
		$this->createBg();
		$this->createCode();
		$this->createLine();
		$this->createFont();
		$this->outPut();
    }

    public function getCode()
    {
        return strtoupper($this->code);
    }
}