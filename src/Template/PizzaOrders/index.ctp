<!-- File: src/Template/PizzaOrder/index.ctp (delete links added) -->
<p><?= $this->Html->link('Add Order', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>PostalCode</th>
        <th>City</th>
        <th>Ordered Time</th>
        <th>Order Status</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $articles query object, printing out article info -->

    <?php foreach ($pizzaOrders as $pizzaOrder): ?>
    <tr>
        <td><?= $pizzaOrder->id ?></td>
        <td><?= $pizzaOrder->user ?></td>
        <td><?= $pizzaOrder->postalCode ?></td>
        <td><?= $pizzaOrder->city ?></td>
        <td>
            <?= $pizzaOrder->created>format(DATE_RFC850) ?>
        </td>
        <td><?= $pizzaOrder->orderStatus ?></td>
        
        <td>
            <?= $this->Html->link("View", ['action' => 'view', $pizzaOrder->id]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $pizzaOrder->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $pizzaOrder->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>