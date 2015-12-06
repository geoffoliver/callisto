<?php
namespace Callisto\Controller;

use Callisto\Controller\AppController;

/**
 * Memberships Controller
 *
 * @property \Callisto\Model\Table\MembershipsTable $Memberships
 */
class MembershipsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subscriptions', 'Readers']
        ];
        $this->set('memberships', $this->paginate($this->Memberships));
        $this->set('_serialize', ['memberships']);
    }

    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Subscriptions', 'Readers']
        ]);
        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The membership could not be saved. Please, try again.'));
            }
        }
        $subscriptions = $this->Memberships->Subscriptions->find('list', ['limit' => 200]);
        $readers = $this->Memberships->Readers->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'subscriptions', 'readers'));
        $this->set('_serialize', ['membership']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The membership could not be saved. Please, try again.'));
            }
        }
        $subscriptions = $this->Memberships->Subscriptions->find('list', ['limit' => 200]);
        $readers = $this->Memberships->Readers->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'subscriptions', 'readers'));
        $this->set('_serialize', ['membership']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
