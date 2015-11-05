<div class="row" >
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
       
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Order Details</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <label class="col-sm-6">Customer:</label>
                        <label class="col-sm-6"><?=h ($pizzaOrder->userName) ?></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Pizza Size:</label>
                        <label class="col-sm-6"><?=h ($pizzaOrder->size) ?></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Topping:</label>
                        <label class="col-sm-6" id="toppingList"><?=h ($pizzaOrder->topping) ?></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Crust Type:</label>
                        <label class="col-sm-6" ><?=h ($pizzaOrder->crustType) ?></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Order Time:</label>
                        <label class="col-sm-6"><?=h ($pizzaOrder->created) ?></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Order Status:</label>
                        <span hidden id="orderStatus" ><?=h ($pizzaOrder->orderStatus) ?></span>
                        <label class="col-sm-6" id="status"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-6">Sub Total:</label>
                        <label class="col-sm-6">$<?=h ($pizzaOrder->subTotal) ?></label>
                    </div>
                     <div class="row">
                        <label class="col-sm-6">Total:</label>
                        <label class="col-sm-6">$<?=h ($pizzaOrder->total) ?>(Including Tax)</label>
                    </div>
                </div>
            </div>
        
        
    </div>
    <div class="col-md-4">
    </div>
</div>



