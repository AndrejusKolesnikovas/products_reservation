<?php

declare(strict_types=1);

namespace Andrejus\ProductsReservation\Controller;

class MessagesRegister
{
    public function log(string $message): void
    {
        $date = new \DateTime();
        $logMessage = $date->format('Y-m-d H:i:s') . ' ' . $message;
      file_put_contents('./var/messages.txt', $logMessage . PHP_EOL, FILE_APPEND);
    }
}