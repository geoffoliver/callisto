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

	public function loadScript($siteId=null, $publisherId=null){
		$this->RequestHandler->renderAs($this, 'javascript');
		$this->RequestHandler->respondAs('javascript');

		$this->response->body(__('/** Invalid Site **/'));

		if(!$siteId || !$publisherId){
			return $this->response;
		}

		$conditions = [
			'id' => $siteId,
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
				}
			])
			->first();

		$this->response->body(print_r($site->domain, true));

		return $this->response;
	}
}
