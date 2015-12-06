<?php
namespace Callisto\Controller;

use Callisto\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \Callisto\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

	public function loadScript($siteAndPublisher=null){
		$this->RequestHandler->renderAs($this, 'javascript');
		$this->RequestHandler->respondAs('javascript');

		$this->response->body(__('/** Nothing to see here **/'));

		if(!$siteAndPublisher || strlen($siteAndPublisher) != 73){
			return $this->response;
		}

		$siteId = trim(substr($siteAndPublisher, 0, 36));
		$publisherId = trim(substr($siteAndPublisher, -36));
		//$referer = $this->request->referer();

		if(!$siteId || !$publisherId){// || !$referer || $referer == '/'){
			return $this->response;
		}
		/*
		$referer = trim(preg_replace('/^http[s]?:\/\//i', '', $referer), '/');
		
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
			])
			->first();

		if(!$site->publisher){
			return $this->response;
		}

		$this->response->body('alert("Hiya");');

		return $this->response;
	}
}
