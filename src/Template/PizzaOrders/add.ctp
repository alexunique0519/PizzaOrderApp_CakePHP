<!-- File: src/Template/PizzaOrder/add.ctp -->

<h1>New Order</h1>
<?php
    echo $this->Form->create($pizzaOrder);
    echo $this->Form->input('userName');
    echo $this->Form->input('email');
    echo $this->Form->input('postalCode');
    //define the province array
    $provinceArray = array('Ontario', 'Quebec', 'Manitoba', 'Saskatchewan');
    echo $this->Form->input('province', array(
    'type' => 'select',
    'options' => $provinceArray,
    'empty' => 'Select Province', // <-- Shows as the first item and has no value
    'id' => 'province'));
    echo $this->Form->input('city');
    //define the size array
    $sizeArray = array('small', 'medium', 'Large', 'X-L');
    echo $this->Form->input('size', array(
    'type' => 'select',
    'options' => $sizeArray,
    'empty' => 'Select Pizza Size',
    'id' => 'size'));
    
   echo $this->Form->input('topping', array('type'=>'select', 'multiple'=>'checkbox', 'options'=>array('pepperoni'=>'Pepperoni', 'baconStrips'=>'Bacon Strips', 'chicken' => 'Chicken', 'groundBeef' => 'Ground Beef', 'broccoli' => 'Broccoli', 'grilledZucchini' => 'Grilled Zucchini', 'greenPepper' => 'Green Pepper', 'mushRoom' => 'MushRoom', 'cheeseBlend' => 'Cheese Blend', 'extraCheese' => 'Extra Cheese', 'parmesanCheese' => 'Parmesan Cheese', 'cheese' => 'Cheese')));

    $crustTypeArray = array('Hand-tossed', 'Pan', 'Stuffed', 'Thin');
    echo $this->Form->input('crustType', array(
        'type' => 'select', 
        'options' => $crustTypeArray,
        'empty' => 'Select Crust Type',
        'id' => 'crustType'));
  
        
    echo $this->Form->button('Save Order', array('class' => 'btn btn-primary'));
    echo $this->Form->end();
?>