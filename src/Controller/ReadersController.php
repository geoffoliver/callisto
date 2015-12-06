<?php
namespace Callisto\Controller;

use Callisto\Controller\AppController;

/**
 * Readers Controller
 *
 * @property \Callisto\Model\Table\ReadersTable $Readers
 */
class ReadersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('readers', $this->paginate($this->Readers));
        $this->set('_serialize', ['readers']);
    }

    /**
     * View method
     *
     * @param string|null $id Reader id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reader = $this->Readers->get($id, [
            'contain' => []
        ]);
        $this->set('reader', $reader);
        $this->set('_serialize', ['reader']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reader = $this->Readers->newEntity();
        if ($this->request->is('post')) {
            $reader = $this->Readers->patchEntity($reader, $this->request->data);
            if ($this->Readers->save($reader)) {
                $this->Flash->success(__('The reader has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reader could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reader'));
        $this->set('_serialize', ['reader']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reader id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reader = $this->Readers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reader = $this->Readers->patchEntity($reader, $this->request->data);
            if ($this->Readers->save($reader)) {
                $this->Flash->success(__('The reader has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reader could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reader'));
        $this->set('_serialize', ['reader']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reader id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reader = $this->Readers->get($id);
        if ($this->Readers->delete($reader)) {
            $this->Flash->success(__('The reader has been deleted.'));
        } else {
            $this->Flash->error(__('The reader could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
