<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Examples Controller
 *
 * @property \App\Model\Table\ExamplesTable $Examples
 */
class ExamplesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Examples->find()->select(['id', 'name', 'price', 'stock', 'status', 'detail']);
        $examples = $this->paginate($query);

        $this->set(compact('examples'));
    }

    /**
     * View method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $example = $this->Examples->get($id, contain: []);
        $this->set(compact('example'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $example = $this->Examples->newEmptyEntity();
        if ($this->request->is('post')) {
            $example = $this->Examples->patchEntity($example, $this->request->getData());
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
        $this->set(compact('example'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $example = $this->Examples->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $example = $this->Examples->patchEntity($example, $this->request->getData());
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
        $this->set(compact('example'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $example = $this->Examples->get($id);
        if ($this->Examples->delete($example)) {
            $this->Flash->success(__('The example has been deleted.'));
        } else {
            $this->Flash->error(__('The example could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function addToCart($id)
    {
        $product = $this->Examples->get($id);

        $cart = $this->request->getSession()->read('Cart') ?? [];


        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] >= $product->stock) {
                $this->Flash->error(__('The product is out of stock.'));
                return $this->redirect(['action' => 'index']);
            }
            $cart[$id]['quantity'] += 1;
        } else {
            if ($product->stock != 0) {


                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'id' => $id
                ];
            } else {
                $this->Flash->error(__('The product is out of stock.'));
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->request->getSession()->write('Cart', $cart);

        return $this->redirect(['action' => 'index']);
    }

    public function removeFromCart($id)
    {
        $cart = $this->request->getSession()->read('Cart') ?? [];

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            } else {
                unset($cart[$id]);
            }
        }

        $this->request->getSession()->write('Cart', $cart);
        return $this->redirect(['action' => 'index']);
    }

    public function clearsession()
    {
        $this->request->getSession()->delete('Cart');
        return $this->redirect(['action' => 'index']);
    }
}
