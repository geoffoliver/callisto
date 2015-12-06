<?php
namespace Callisto\Controller;

use Cake\Utility\Hash;
use Callisto\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \Callisto\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

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
		//$referer = $this->request->referer();

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
		
		$this->response->header('Access-Control-Allow-Origin', Hash::get($referer, 'scheme').'://'.Hash::get($referer, 'host'));
		$this->response->body(json_encode([
			'ads' => $site->ads
		]));

		return $this->response;
	}
}
