<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Catergories Controller
 *
 */
class CatergoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Catergories->find();
        $catergories = $this->paginate($query);

        $this->set(compact('catergories'));
    }

    /**
     * View method
     *
     * @param string|null $id Catergory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catergory = $this->Catergories->get($id, contain: []);
        $this->set(compact('catergory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catergory = $this->Catergories->newEmptyEntity();
        if ($this->request->is('post')) {
            $catergory = $this->Catergories->patchEntity($catergory, $this->request->getData());
            if ($this->Catergories->save($catergory)) {
                $this->Flash->success(__('The catergory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catergory could not be saved. Please, try again.'));
        }
        $this->set(compact('catergory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Catergory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catergory = $this->Catergories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catergory = $this->Catergories->patchEntity($catergory, $this->request->getData());
            if ($this->Catergories->save($catergory)) {
                $this->Flash->success(__('The catergory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catergory could not be saved. Please, try again.'));
        }
        $this->set(compact('catergory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Catergory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catergory = $this->Catergories->get($id);
        if ($this->Catergories->delete($catergory)) {
            $this->Flash->success(__('The catergory has been deleted.'));
        } else {
            $this->Flash->error(__('The catergory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
