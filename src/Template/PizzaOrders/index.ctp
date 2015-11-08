<!-- File: src/Template/PizzaOrder/index.ctp (delete links added) -->

<div class="row">
    <div class="col-md-1"></div>
    
    <div class="col-md-10">
    
       
<h3><span class="label label-info">Order List - Ordered</span></h3>
<table class="table table-bordered" id="orderTable_ordered" >
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>PostalCode</th>
        <th>City</th>
        <th>Ordered Time</th>
        <th>Order Status</th>
        <th>Action</th>
    </tr>

 <?php     
        $notCompleted = [];
        $orderCompleted = []; 
        foreach($pizzaOrders as $pizzaOrder)
        {
            if($pizzaOrder->orderStatus == 0)
            {
                array_push($notCompleted, $pizzaOrder);
            }
            else
            {
                array_push($orderCompleted, $pizzaOrder);
            }
        }
            
    
    
    
    foreach ($notCompleted as $pizzaOrder): ?>
    
    <tr id=<?= $pizzaOrder->id ?>>
        <td><?= $pizzaOrder->id ?></td>
        <td><?= $pizzaOrder->userName ?></td>
        <td><?= $pizzaOrder->postalCode ?></td>
        <td><?= $pizzaOrder->city ?></td>
        <td>
            <?= $pizzaOrder->created->format(DATE_RFC850) ?>
        </td>
        <td>Ordered</td>
        
        <td>
            <?= $this->Html->link("View", ['action' => 'view', $pizzaOrder->id]) ?>
            |
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $pizzaOrder->id],
                ['confirm' => 'Are you sure?'])
            ?>
            |
            <?= $this->Html->link('Edit', ['action' => 'edit', $pizzaOrder->id]) ?>
            |
            <?= $this->Form->postLink('Complete', ['action' => 'complete', $pizzaOrder->id])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<nav>
  <ul class="pager">
    <li><a id="back_ordered" href="" >Previous</a></li>
    <li><a id="forward_ordered" href="">Next</a></li>
  </ul>
</nav>
       
    <!-- completed order list-->
    <h3><span class="label label-info">Order List - Completed</span></h3>
<table class="table table-bordered" id="orderTable_completed" >
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>PostalCode</th>
        <th>City</th>
        <th>Ordered Time</th>
        <th>Order Status</th>
        <th>Action</th>
    </tr>

 <?php       
    
    foreach ($orderCompleted as $pizzaOrder): ?>
    
    <tr id=<?= $pizzaOrder->id ?>>
        <td><?= $pizzaOrder->id ?></td>
        <td><?= $pizzaOrder->userName ?></td>
        <td><?= $pizzaOrder->postalCode ?></td>
        <td><?= $pizzaOrder->city ?></td>
        <td>
            <?= $pizzaOrder->created->format(DATE_RFC850) ?>
        </td>
        <td>Completed</td>
        
        <td>
            <?= $this->Html->link("View", ['action' => 'view', $pizzaOrder->id]) ?>
            |
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $pizzaOrder->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>    
        
        
    </div>
    <div class="col-md-1">
    </div>
</div>
<nav>
  <ul class="pager">
    <li><a id="back_completed" href="" >Previous</a></li>
    <li><a id="forward_completed" href="">Next</a></li>
  </ul>
</nav>
