<?php

declare(strict_types=1);

namespace Andrejus\ProductsReservation\Controller;

use Andrejus\ProductsReservation\Exception\ProductsException;

class AdsController extends Controller
{
    public function showPage(): void
    {
        $this->render('./view/page.php');
    }

    public function checkInventor(string $productName, int $quantity): void
    {
        $inventory = json_decode(file_get_contents('./data/inventory.json'), true);
        try {
            foreach ($inventory as $id => $item) {
                if ($item['name'] === $productName) {
                    if ($item['quantity'] < $quantity) {
//                        $message = 'Not enough items in stock';
                        $message = 'product "'.$productName. '" only has '.$item['quantity']. ' items in the inventory' ;
                        throw new ProductsException($message);
                    }
                    $item['quantity'] = $item['quantity'] - $quantity;
                    $item[$id] = [
                        "name" => $item['name'],
                        "quantity" => $item['quantity'],
                    ];

                    $inventory[$id] = $item[$id];
                    file_put_contents('./data/inventory.json', json_encode($inventory, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));

                    $this->handleCreateReservation($id);

                    $message = $productName.' reservation is successful';
                    throw new ProductsException($message);

                }

//            }$message = 'Product not available';
            }$message = 'product "' . $productName . '" is not in the inventory';
            throw new ProductsException($message);
        } catch (ProductsException $exception) {

            echo $exception->getMessage();
            $logger = new MessagesRegister();
            $logger->log($exception->getMessage());

        }
    }

    public function handleCreateReservation(int $id): void
    {

        $reservations = json_decode(file_get_contents('./data/reservations.json'), true);

        $newReservation = [
            'email' => $_POST['email'],
            'products_id' => $id,
            'quantity' => $_POST['quantity'],

        ];

        $reservations[] = $newReservation;
        file_put_contents('./data/reservations.json', json_encode($reservations, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));
    }


}