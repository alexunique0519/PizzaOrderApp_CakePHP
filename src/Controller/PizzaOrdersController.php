<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PizzaOrder Controller
 *
 * @property \App\Model\Table\PizzaOrderTable $PizzaOrder
 */
class PizzaOrdersController extends AppController
{
    //public $helpers = array('Js' => array('Jquery'));
    //public $components = array('RequestHandler');
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        //$this->set('pizzaOrder', $this->paginate($this->PizzaOrder));
        //$this->set('_serialize', ['pizzaOrder']);
        $pizzaOrders = $this->PizzaOrders->find('all');
        $this->set( compact('pizzaOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Pizza Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {       
        
        //$id = 26;
        $pizzaOrder = $this->PizzaOrders->get($id);
        
        
        
        $this->set(compact('pizzaOrder'));
        
    }
    
    private function calculatePizzaCost($province, $size, $toppingString, $crustType)
    {
        $cost = 0;
        
        //according to size
        switch ($size)
        {
        case "small":
            $cost += 5; 
          break;
        case "medium":
            $cost += 10; 
          break;
        case "large":
            $cost += 15; 
          break;
        case "X-L":
            $cost += 20;
          break;
        default:
            break;
        }
        
        
        
        $count = count($toppingString);
        $cost += ($count - 1) * 0.5;
        /*
        $pos = strpos($toppingString, ",");
        
        if ($pos === false) 
        {
            
        }
        else
        {
            $toppingArray = explode(",", $toppingString);
            
            $count = count($toppingArray);
            
            $cost += ($count - 1) * 0.5;
        
            $test = $cost;
        }
        */
        
        if($crustType == "Stuffed")
        {
            $cost += 2;
        }
        
        $subTotal = $cost;
        
        //calculate by province taxes rate
        switch ($province)
        {
        case "Ontario":
            $cost *= 1.13; 
          break;
        case "Manitoba":
            $cost *= 1.08; 
          break;
        case "Quebec":
            $cost *= 1.05; 
          break;
        case "Saskatchewan":
            $cost += 1.05;
          break;
        default:
            break;
        }
        
        $total = $cost;
        
        return array($subTotal, $total);
    }
    
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message ="";
        
        $pizzaOrder = $this->PizzaOrders->newEntity();
        if ($this->request->is('post')) {
       
            $province = $_POST['province'];
            $size = $_POST['size'];
            $toppingString = $_POST['topping'];
            $crustType = $_POST['crustType'];
                 
            $totalArray = $this->calculatePizzaCost($province, $size, $toppingString, $crustType);
            
            
            $toppings = implode(",", $toppingString);
            
            //echo $toppingsList;
            $pizzaOrder = $this->PizzaOrders->patchEntity($pizzaOrder, $this->request->data);
            
            //set value for subTotal property.
            $pizzaOrder->set('subTotal', round($totalArray[0], 2));
            $pizzaOrder->set('total', round($totalArray[1], 2));
            $pizzaOrder->set('topping', $toppings);
            
            if ($this->PizzaOrders->save($pizzaOrder)) {
                $this->Flash->success(__('The pizza order has been saved.'));
                
                return $this->redirect(['action' => 'view', $pizzaOrder->id]);
                
            } else {
                $this->Flash->error(__('The pizza order could not be saved. Please, try again.'));
            }
            
            
        
        }
        //$this->set(compact('pizzaOrder'));
        $this->set('pizzaOrder', $pizzaOrder);
      
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Pizza Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pizzaOrder = $this->PizzaOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['post', 'put'])) {
            
            $toppingArray = $_POST['topping'];
            $toppingString = implode(",", $toppingArray);
          
            
            $pizzaOrder = $this->PizzaOrders->patchEntity($pizzaOrder, $this->request->data);
            $pizzaOrder->set('topping', $toppingString);
            
            
            if ($this->PizzaOrders->save($pizzaOrder)) {
                $this->Flash->success(__('The pizza order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pizza order could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pizzaOrder'));
        $this->set('_serialize', ['pizzaOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pizza Order id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pizzaOrder = $this->PizzaOrders->get($id);
        if ($this->PizzaOrders->delete($pizzaOrder)) {
            $this->Flash->success(__('The pizza order has been deleted.'));
        } else {
            $this->Flash->error(__('The pizza order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function complete($id)
    {
         $pizzaOrder = $this->PizzaOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['post', 'put'])) {        
            
            $pizzaOrder = $this->PizzaOrders->patchEntity($pizzaOrder, $this->request->data);
            $pizzaOrder->set('orderStatus', 1);
            
            
            if ($this->PizzaOrders->save($pizzaOrder)) {
                $this->Flash->success(__('The pizza order has been completed.'));
               
            } else {
                $this->Flash->error(__('The pizza order could been completed'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
