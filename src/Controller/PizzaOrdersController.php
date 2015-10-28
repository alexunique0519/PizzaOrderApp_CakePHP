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
        $pizzaOrders = $this->PizzaOrder->get($id, [
            'contain' => []
        ]);
        $this->set('pizzaOrder', $pizzaOrders);
        $this->set('_serialize', ['pizzaOrder']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pizzaOrder = $this->PizzaOrders->newEntity();
        if ($this->request->is('post')) {
            $pizzaOrder = $this->PizzaOrders->patchEntity($pizzaOrder, $this->request->data);
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pizzaOrder = $this->PizzaOrder->patchEntity($pizzaOrder, $this->request->data);
            if ($this->PizzaOrder->save($pizzaOrder)) {
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
}
