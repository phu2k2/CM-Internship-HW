<?php
class Rectangles extends Shape implements Resizable
{
    private $height;
    private $width;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }
    
    public function getHeight()
    {
        return $this->height;
    }

    public function resize($width = null, $height = null)
    {
        if ($width > 0) {
            $this->width *= $width;
        }
        if ($height > 0) {
            $this->height *= $height;
        }
        return $this;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}
