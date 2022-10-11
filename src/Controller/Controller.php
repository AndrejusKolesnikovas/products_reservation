<?php

declare(strict_types=1);

namespace Andrejus\ProductsReservation\Controller;

class Controller
{
    public function render(string $inner): void
    {
        require './view/page.php';
    }
}