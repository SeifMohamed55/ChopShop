<?php
/*
    include 'C:\xampp\htdocs\omar\project\Product.php';
    */
 

    class Order{
        protected $orderID;
        private $userID;
        protected $products = array();
        private $shippingAddress;
        private Payment $payment;
    

    public function __construct($userID, $products, $shippingAddress, $payment){
        $this->userID = $userID;
        $this->products = $products;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment; 
    }

    function getOrderId(){
        return $this->orderID;
    }

    function getUserId(){
        return $this->userID;
    }

    function getProduct(){
        return $this->products;
    }

    function getShippingAddress(){
        return $this->shippingAddress;
    }

    function getPayment(){
        return $this->payment;
    }
    static function putOrder(array $products, $email, $address, Payment $pay){
        $database = new Database();
        $ID = User::getIDFromEmail($email); 
        $i = 0;
        $order = new Order($ID, $products, $address, $pay);
        $date = date("y-m-d");
        $sqldate = date('Y-m-d', strtotime($date));
        $stmt = $database->execute("INSERT into [order]([user_ID], buy_date, shipping_address) 
    VALUES(?,?,?)", array($ID, $sqldate, $address));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
            return false;
        $stmt = $database->execute("SELECT TOP 1 order_ID FROM [order] ORDER BY order_ID DESC",null);
        sqlsrv_fetch( $stmt );
        $order_ID = sqlsrv_get_field($stmt, 0);
        foreach ($products as $prod) {
            if (!is_a($prod, 'Product')) {
              throw new InvalidArgumentException('Invalid class type');
            }
            $stmt = $database->execute("INSERT into [order_items] values (?,?,?)", array($prod->getBarcode(), $order_ID, $prod->getQuantity()));
            $rows_affected = sqlsrv_rows_affected($stmt);
            if ($rows_affected == 0)
                return false;
            $stmt = $database->execute("INSERT INTO payment(user_ID, order_ID, pay_method, pay_status, pay_amount, pay_date)
            VALUES(?,?,?,?,?,?)",array($ID, $order_ID, $pay->getPayMethod(), $pay->getPayStatus(), $pay->getPayAmount(), $sqldate));
             $rows_affected = sqlsrv_rows_affected($stmt);
             if ($rows_affected == 0)
                 return false;
            return $order;
        }
 
    }
} 
?>