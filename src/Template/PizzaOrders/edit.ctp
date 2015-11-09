<!-- File: src/Template/PizzaOrder/add.ctp -->

<div >
    
   
    <?php 
       echo $this->Form->create($pizzaOrder, ['novalidate' => true]);
    ?>    
    
    <span hidden id="editToppings"><?= $pizzaOrder->topping ?></span>
    
   <div class="row">
       <div class="col-md-2">
       </div>
       
       <div class="col-md-8">
           <div class="row">
           <h3 ><span class="label label-info">Edit Order</span></h3>
           </div>        
       
       <div class="col-md-6 panel panel-default" id="panel">

           <div class="panel-heading">
                <h4 class="text-center">Customer Information</h4>
           </div>
           <div class="panel-body">
                <?php    

                echo $this->Form->input('userName', array('class' => 'form-control', 'id' => 'customerName'));
                echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'nameError'));

                echo $this->Form->input('postalCode', array('class' => 'form-control', 'id' => 'postalCode'));
                echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'postalCodeError'));

                //define the province array
                $provinceArray = ['Ontario' => 'Ontario', 'Quebec' => 'Quebec', 'Manitoba' => 'Manitoba', 'Saskatchewan' => 'Saskatchewan' ];
                echo $this->Form->input('province', array(
                'type' => 'select',
                'options' => $provinceArray,
                'empty' => 'Select Province', 
                'class' => 'form-control',
                'id' => 'province'));
                echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'provinceError'));

                echo $this->Form->input('city', array('class' => 'form-control', 'id' => 'city'));
                echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'cityError'));

                echo $this->Form->input('email', array('class' => 'form-control', 'id' => 'email'));
                 echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'emailError'));

                echo $this->Form->input('telNumber', array('class' => 'form-control', 'id' => 'telephoneNumber'));
                echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'telephoneNumberError'));

                ?>
           </div>
       </div>
       
       <div class="col-md-6 panel panel-default" id="panel">
           
            <div class="panel-heading">
                <h4 class="text-center">Order Information</h4>
            </div>
            <div class="panel-body">
                <div>
                <?php 
                    //define the size array
                    $sizeArray = array('small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'X-L' => 'X-Large');
                    echo $this->Form->input('size',  array(
                    'type' => 'select',
                    'options' => $sizeArray,
                    'empty' => 'Select Pizza Size',
                    'class' => 'form-control',
                    'id' => 'pizzaSize')); 
                    echo $this->Html->tag('span', '', array('class' => 'hidden', 'id' => 'pizzaSizeError'));
                ?>
                </div>
                <div>
                    <div>
                        <label class="control-label form-label">Toppings</label>
                    </div>

                    <div class="form-control" id="topping">
                        <div>
                            <label class="checkbox-inline col-sm-6">
                                <input type="checkbox" id="pepperoni" name="topping[]" value="pepperoni">Pepperoni
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="baconStrips"  name="topping[]" value="baconStrips">Bacon Strips
                            </label>
                        </div>
                        <div>
                            <label class="checkbox-inline col-sm-6">
                                <input type="checkbox" id="chicken" name="topping[]" value="chicken">Chicken
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="groundBeef" name="topping[]" value="groundBeef">Ground Beef
                            </label>
                        </div>
                        <div>
                            <label class="checkbox-inline col-sm-6">
                                <input class="" type="checkbox" id="broccoli" name="topping[]" value="broccoli">Broccoli
                            </label>
                            <label class="checkbox-inline">
                                <input class="" type="checkbox" id="grilledZucchini" name="topping[]" value="grilledZucchini">Grilled Zucchini
                            </label>

                        </div>
                        <div>
                            <label class="checkbox-inline col-sm-6">
                                <input class="" type="checkbox" id="greenPepper" name="topping[]" value="greenPepper">Green Pepper
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="mushRoom" name="topping[]" value="mushRoom">Mushroom
                            </label>
                        </div>
                        <div>
                            <label class="checkbox-inline col-sm-6">
                                <input class="" type="checkbox" id="cheeseBlend" name="topping[]" value="cheeseBlend">Cheese Blend
                            </label>
                            <label class="checkbox-inline ">
                                <input class="" type="checkbox" id="extraCheese" name="topping[]" value="extraCheese">Extra Cheese
                            </label>
                        </div>
                        <div>
                            <label class="checkbox-inline col-sm-6" style="padding-right: 0px;">
                                <input class="" type="checkbox" id="parmesanCheese" name="topping[]" value="parmesanCheese">Parmesan Cheese
                            </label>
                            <label class="checkbox-inline ">
                                <input class="" type="checkbox" id="cheese" name="topping[]" value="cheese">Cheese
                            </label>
                        </div>
                    </div>
                    <span id="toppingsError" class="hidden"></span>                
                </div>
                <?php
                    $crustTypeArray = array('Hand-tossed', 'Pan', 'Stuffed', 'Thin');
               ?>
                
               <?php
                    $crustTypeArray = array('Hand-tossed' => 'Hand-tossed', 'Pan' => 'Pan', 'Stuffed' => 'Stuffed', 'Thin' => 'Thin');
                    echo $this->Form->input('crustType', array(
                        'type' => 'select', 
                        'options' => $crustTypeArray,
                        'empty' => 'Select Crust Type',
                        'id' => 'crustType',
                        'class' => 'form-control'));
                ?>
                 <span id="crustTypeError" class="hidden"></span>
           </div>
            
       </div>
           <?php $user = $this->request->session()->read('Auth.User');
                     if(!empty($user)){
                      echo $this->Html->link('Back to Order List', ['controller' => 'pizzaOrders','action' => 'index'], ['id' => 'orderListLink', 'class' => 'pull-right']);
                             }
                            ?>
              
       </div>
       <div class="col-md-2">
      </div>
</div>
    

<div class="row">
    <div class="col-md-5">
    </div>
    <div class="col-md-2">
       <!-- <input type="button" id="submit" value="submit" class="btn btn-primary btn-lg btn-block" ng-click="onSubmit()"/>-->
       <input type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block"/>
    <?php  
        echo $this->Form->end();
    ?>
    </div>
     <div class="col-md-5">
    </div>
</div>


</div>


       