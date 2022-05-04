<?php
class Cart{
    private $item=[];
    public function __construct($item_id)
    {
        $data = json_decode(file_get_contents("product.json"),true);
        foreach ($data as $key => $value) {
            if($value['id']==$item_id){
                $this->item=$data[$key];
            }
        }

        
    }

    public function storeProduct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'][]= $this->item;
        }else{
            $ids=[];
            foreach ($_SESSION['cart'] as $key => $value) {
                array_push($ids,$value['id']);
            }
            if(!in_array($this->item['id'],$ids)){
                $_SESSION['cart'][]=$this->item;
            }
        }
    }


    public function removeProduct(){
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $key => $value) {

                if($value['id']==$this->item['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }

    public function updateQuantity($quant){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['id']==$this->item['id']){
                $_SESSION['cart'][$key]['quantity']=$quant;

            }
            # code...
        }

    }
    public static function getSubTotal($product_id){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['id']==$product_id){
                return number_format($value['quantity']*$value['price'],2);
            }
            # code...
        }
    }
    public static function getNumberOfCartItems(){
        return count($_SESSION['cart']);
    }

    public static  function getTotalPrice(){
        $sum=[];
        foreach ($_SESSION['cart'] as  $value) {
            $sub_sum=$value['price']*$value['quantity'];
            array_push($sum,$sub_sum);
            
        }
        return number_format(array_sum($sum),2);
    }
    public static function clearCart(){
        unset($_SESSION['cart']);
    }
}


?>