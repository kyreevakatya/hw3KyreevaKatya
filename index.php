<?php

declare(strict_types=1);

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setblue($blue);
    }

    private function setRed(int $red)
    {
        $this->validate($red);

        $this->red = $red;
    }

    public function getRed(): int
    {
        return $this->red;

    }

    private function setGreen(int $green)
    {
        $this->validate($green);

        $this->green = $green;
    }

    public function getGreen(): int
    {
        return $this->green;

    }

    private function setBlue(int $blue)
    {
        $this->validate($blue);

        $this->blue = $blue;
    }

    public function getBlue(): int
    {
        return $this->blue;

    }

    private function validate($value)
    {
        if ($value < 0 || $value > 255) {
            exit ('Число должно быть в диапазоне от 0 до 255');
        }
    }

    public function equals(Color $color): bool
    {
        return $this->getRed() == $color->getRed() &&
            $this->getGreen() == $color->getGreen() &&
            $this->getBlue() == $color->getBlue();
    }

    public function mix(Color $color): Color
    {
        return new Color((int)(($this->getRed() + $color->getRed()) / 2),
            (int)(($this->getGreen() + $color->getGreen()) / 2),
            (int)(($this->getBlue() + $color->getBlue()) / 2));

    }

    public static function random(): self
    {
        return new self (rand(0, 255), rand(0, 255), rand(0, 255));
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

$color1 = Color:: random();
$color2 = Color:: random();
$mixedColor1 = $color1->mix($color2);

var_dump($mixedColor1);

if (!$color1->equals($mixedColor1)) {
    echo 'Цвета не равны';
}
