<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setX(int $newX):void
    {
        $this->x = $newX;
    }

    public function setY(int $newY):void
    {
        $this->y = $newY;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "({$p1->getX()}, {$p1->getY()})".PHP_EOL;
echo "({$p2->getX()}, {$p2->getY()})".PHP_EOL;

function swapPoints(object &$p1, object &$p2): void
{
    $temporaryObject = clone $p1;

    $p1->setX($p2->getX());
    $p1->setY($p2->getY());

    $p2->setX($temporaryObject->getX());
    $p2->setY($temporaryObject->getY());
}

swapPoints($p1,$p2);

echo "({$p1->getX()}, {$p1->getY()})".PHP_EOL;
echo "({$p2->getX()}, {$p2->getY()})".PHP_EOL;