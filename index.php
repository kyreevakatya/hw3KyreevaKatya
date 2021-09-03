<?php

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this-> setRed ($red);
        $this-> setGreen ($green);
        $this-> setblue ($blue);
    }

    private function setRed ( int $red)
    {
        if ($red <0 || $red >255) {
            exit ('Число должно быть в диапазоне от 0 до 255');
    }
        if (is_float($red)){
            return round($red);
        }
        $this->red= $red;
    }

    public function getRed (): int
    {
        return $this-> red;

    }
    private function setGreen (int $green)
    {
        if ($green <0 || $green >255) {
            exit ('Число должно быть в диапазоне от 0 до 255');
        }
        if (is_float($green)){
            return round($green);
        }
        $this->green= $green;
    }

    public function getGreen (): int
    {
        return $this-> green;

    }
    private function setBlue ( int $blue)
    {
        if ($blue <0 || $blue >255) {
            exit ('Число должно быть в диапазоне от 0 до 255');
        }
        if (is_float($blue)){
            return round($blue);
        }
        $this->blue= $blue;
    }

    public function getBlue (): int
    {
        return $this-> blue;

    }
    public function equals (Color $color): bool
    {
        if ($this->getRed()==$color-> getRed() && $this->getGreen()==$color-> getGreen() && $this->getBlue()==$color-> getBlue() ){
            return true;
        } else {
            return false;
        }

    }
    public function mix (Color $color): Color
    {
        return new Color(($this->getRed()+$color-> getRed())/2, ($this->getGreen()+$color-> getGreen())/2, ($this->getBlue()+$color-> getBlue())/2);

    }


}

$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));
$mixedColor->getRed(); // 150
$mixedColor->getGreen(); // 150
$mixedColor->getBlue(); // 150

if (!$color->equals($mixedColor)) {
    echo 'Цвета не равны';
}

