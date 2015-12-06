<?php
namespace Callisto\Controller;

use Callisto\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Sites Controller
 *
 * @property \Callisto\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Publishers']
        ];
        $this->set('sites', $this->paginate($this->Sites));
        $this->set('_serialize', ['sites']);
    }

    /**
     * View method
     *
     * @param string|null $id Site id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => ['Publishers', 'Subscriptions', 'Ads']
        ]);
        $this->set('site', $site);
        $this->set('_serialize', ['site']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $site = $this->Sites->newEntity();
        if ($this->request->is('post')) {
            $site = $this->Sites->patchEntity($site, $this->request->data);
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
        $publishers = $this->Sites->Publishers->find('list', ['limit' => 200]);
        $this->set(compact('site', 'publishers'));
        $this->set('_serialize', ['site']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Site id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $site = $this->Sites->patchEntity($site, $this->request->data);
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
        $publishers = $this->Sites->Publishers->find('list', ['limit' => 200]);
        $this->set(compact('site', 'publishers'));
        $this->set('_serialize', ['site']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $site = $this->Sites->get($id);
        if ($this->Sites->delete($site)) {
            $this->Flash->success(__('The site has been deleted.'));
        } else {
            $this->Flash->error(__('The site could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
	}

	public function loadScript(){
		$this->RequestHandler->renderAs($this, 'json');
		$this->RequestHandler->respondAs('json');
		$this->response->body(__('{}'));

		if(!$this->request->is('post')){
			return $this->response;
		}
	
		$siteAndPublisher = Hash::get($this->request->data, 'site');
		if(!$siteAndPublisher || strlen($siteAndPublisher) != 73){
			return $this->response;
		}

		$siteId = trim(substr($siteAndPublisher, 0, 36));
		$publisherId = trim(substr($siteAndPublisher, -36));

		if(!$siteId || !$publisherId){// || !$referer || $referer == '/'){
			return $this->response;
		}
		$referer = parse_url($this->request->referer());
		/*
		if(strpos($referer, '/') !== false){
			$ref = explode('/', $referer);
			$referer = $ref[0];
		}
		*/
		$conditions = [
			'id'           => $siteId,
			'active'       => true,
			'publisher_id' => $publisherId
		];

		if(!$this->Sites->exists($conditions)){
			return $this->response;
		}

		$site = $this->Sites->find('all')
			->where([
				'Sites.id'           => $siteId,
				'Sites.active'       => true,
				'Sites.publisher_id' => $publisherId
			])
			->contain([
				'Publishers' => function($q){
					return $q->where([
						'Publishers.active' => true
					]);
				},
				'Ads'
			])
			->first();

		if(!$site->publisher){
			return $this->response;
		}

		if(!preg_match('/'.$site->domain.'$/', Hash::get($referer, 'host'))){
			return $this->response;
		}

		$this->response->header('Access-Control-Allow-Origin', Hash::get($referer, 'scheme').'://'.Hash::get($referer, 'host'));
		$this->response->body(json_encode([
			'ads' => $site->ads
		]));

		return $this->response;
	}
}
