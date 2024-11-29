<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;

use PDOException;



class OrderCtrl
{
    public function action_orders()
    {
        // Pobranie ID użytkownika z sesji
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);
        App::getSmarty()->assign('userName', $userName);  // Tytuł strony ("Yups")

        try {
            // Pobranie zamówień użytkownika z tabeli history_orders
            $orders = App::getDB()->query(
                "SELECT 
                ho.id_order,
                ho.created_at,
                ho.status,
                oi.id_product,
                oi.quantity,
                p.name,
                p.url
            FROM 
                history_orders ho
            LEFT JOIN 
                order_items oi ON ho.id_order = oi.id_order
            LEFT JOIN 
                products p ON oi.id_product = p.id_product
            WHERE 
                ho.id_user = :idUser
            ORDER BY 
                ho.created_at DESC",
                [
                    ':idUser' => $idUser
                ]
            )->fetchAll();

            if ($orders) {
                // Grupowanie zamówień po ich ID, aby wyświetlić szczegóły w układzie
                $groupedOrders = [];
                foreach ($orders as $order) {
                    $groupedOrders[$order['id_order']]['details'] = [
                        'created_at' => $order['created_at'],
                        'status' => $order['status'],
                    ];
                    $groupedOrders[$order['id_order']]['items'][] = [
                        'id_product' => $order['id_product'],
                        'name' => $order['name'], // Poprawiono na 'name'
                        'url' => $order['url'], // Używaj 'url', zgodnie z SQL
                        'quantity' => $order['quantity']
                    ];
                }
            } else {
                App::getMessages()->addMessage(new \core\Message("Nie znaleziono żadnych zamówień.", \core\Message::INFO));
            }
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas pobierania zamówień.", \core\Message::ERROR));
        }

        // Generowanie widoku z zamówieniami
        App::getSmarty()->assign('orders', $groupedOrders);                            // Tytuł strony ("Yups")
        App::getSmarty()->assign('page_title', 'Dane Personalne');       // Tytuł strony ("Yups")
        App::getSmarty()->assign('title', 'Dane Personalne');          // Tytuł strony ("Yups")

        App::getSmarty()->display('OrdersView.tpl');                      // Plik z widokiem strony
    }

    public function action_orderDetails()
    {
        // Pobranie ID użytkownika z sesji
        $idUser = SessionUtils::load("id_user", $keep = true);
        $userName = App::getDB()->get("users", "name", ["id_user" => $idUser]) ?? App::getDB()->get("users", "login", ["id_user" => $idUser]);
        App::getSmarty()->assign('userName', $userName);  // Tytuł strony ("Yups")

        $idOrder = ParamUtils::getFromRequest('id_order') ?? null;
        $groupedOrder = [];
        $order_details['address_shipping'] = [];
        $order_details['address_billing'] = [];
        if (!$idOrder) {
            App::getMessages()->addMessage(new \core\Message("Nie podano ID zamówienia.", \core\Message::ERROR));
            App::getRouter()->redirectTo('orders');
            return;
        }

        try {
            // Pobranie szczegółów zamówienia
            $orderDetails = App::getDB()->query("
            SELECT 
                ho.id_order,
                ho.created_at,
                ho.status AS order_status,
                ho.payment_status,
                ho.delivery_status,
                ho.total_amount,
                ho.payment_method,
                ho.delivery_method,
                ho.delivery_address,
                ho.billing_address,

                ho.code_name,
                ho.code_value,
                ho.code_type,

                oi.id_product,
                oi.quantity,
                oi.product_cost AS item_cost,

                p.name AS product_name,
                p.url AS product_image
            FROM 
                history_orders ho
            LEFT JOIN 
                order_items oi ON ho.id_order = oi.id_order
            LEFT JOIN 
                products p ON oi.id_product = p.id_product
            WHERE 
                ho.id_order = :idOrder
                ", [':idOrder' => $idOrder])->fetchAll();

            if (!$orderDetails) {
                App::getMessages()->addMessage(new \core\Message("Nie znaleziono szczegółów zamówienia.", \core\Message::INFO));
                App::getRouter()->redirectTo('orders');
                return;
            }

            // Grupowanie szczegółów zamówienia
            $groupedOrder = [
                'details' => [
                    'id_order' => $orderDetails[0]['id_order'], //
                    'created_at' => $orderDetails[0]['created_at'], //
                    'order_status' => $orderDetails[0]['order_status'],
                    'payment_status' => $orderDetails[0]['payment_status'], //
                    'delivery_status' => $orderDetails[0]['delivery_status'], //
                    'total_cost' => $orderDetails[0]['total_amount'],
                    'payment_method' => $orderDetails[0]['payment_method'], //
                    'delivery_method' => $orderDetails[0]['delivery_method'], //
                    'address_shipping' => $orderDetails[0]['delivery_address'], //
                    'address_billing' => $orderDetails[0]['billing_address'], //
                    'code_name' => $orderDetails[0]['code_name'],
                    'code_value' => $orderDetails[0]['code_value'],
                    'code_type' => $orderDetails[0]['code_type'],
                ],
                'items' => []
            ];

            foreach ($orderDetails as $item) {
                $groupedOrder['items'][] = [
                    'id_product' => $item['id_product'],
                    'name' => $item['product_name'],
                    'image_url' => $item['product_image'],
                    'quantity' => $item['quantity'],
                    'item_cost' => $item['item_cost'],
                ];
            }

            // Dekodowanie JSON-a na tablice asocjacyjne
            $order_details['address_shipping'] = json_decode($groupedOrder['details']['address_shipping'], true);
            $order_details['address_billing'] = json_decode($groupedOrder['details']['address_billing'], true);
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas pobierania szczegółów zamówienia: " . $e, \core\Message::ERROR));
        }
        App::getSmarty()->assign('order', $groupedOrder);
        App::getSmarty()->assign('order_details', $order_details);
        App::getSmarty()->assign('page_title', 'Szczegóły zamówienia');
        App::getSmarty()->display('OrderDetailsView.tpl');
    }

    public function action_orderStatus()
    {
        App::getSmarty()->assign('title', 'Sprawdź status przesyłki');          // Tytuł strony ("Yups")
        App::getSmarty()->display('OrderStatusView.tpl');                      // Plik z widokiem strony
    }

    public function action_orderStatusShow()
    {
        $id_order = ParamUtils::getFromRequest('id_order')??null;

        $status = App::getDB()->get('history_orders','status',['id_order' => $id_order])??null;

        App::getSmarty()->assign('id', $id_order);          // Tytuł strony ("Yups")
        App::getSmarty()->assign('status', $status);          // Tytuł strony ("Yups")

        App::getSmarty()->assign('title', 'Sprawdź status przesyłki');          // Tytuł strony ("Yups")
        App::getSmarty()->display('OrderStatusShowView.tpl');                      // Plik z widokiem strony
    }
}
