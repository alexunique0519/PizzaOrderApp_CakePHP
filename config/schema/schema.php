<?php
class PizzaOrderSchema extends CakeSchema {


    public $pizzaOrder = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
        'userName' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 255),
        'postalCode' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => 7),
        'city' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => 100),
        'email' => array('type') => 'string', 'null' => false, 'default' => '', 'length' => 255
        'province' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
        'telNumber' => array('type' => 'string', 'null' => false, 'default' => '', 'length'=> 20),
        'size' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => 20),
        'topping' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => 255),
        'crustType' => array('type' => 'string', 'null' => false, 'default' => '', 'length' => 20),
        'orderStatus' => array('type' =>'bit', 'null'=> false, 'default' => 0),
        'timeStamp' => array('type' => 'DATETIME','null' => false )
    )
    

}
    
    
    
    
?>