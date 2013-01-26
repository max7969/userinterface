<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index() {

		$this->load->model('category_model','',true);
		$this->load->model('image_model','',true);
		
		$aCategories = $this->category_model->getAllCategories();
		$aImages = $this->image_model->getAllImages();
		
		$aDataIndex['aCategories'] = $aCategories;
		$aDataIndex['aImages'] = $aImages;
		
		$this->load->view('header');
		$this->load->view('home',$aDataIndex);
		$this->load->view('footer');
	}
	
	public function getCatalog() {
		
		$this->load->model('image_model','',true);
		$this->load->model('category_model','',true);
		
		if(isset($_GET['aCategories']) && !is_null($_GET['aCategories'])) {
			$aCategories = $_GET['aCategories'];
			$aCategories = json_decode($aCategories);
			
			if(count($aCategories) == 0) {
				$aImages = $this->image_model->getAllImages();
			} else {
				$sCategories = '(';
				$iCpt = 0;
				foreach($aCategories as $iCategory) {
					$iCpt = $iCpt + 1;
					if ($iCpt != count($aCategories)) {
						$sCategories .= $iCategory . ',';
					} else {
						$sCategories .= $iCategory . ')';
					}
				}
				$aImages = $this->image_model->getImagesByCategoryId($sCategories);
			}
			
		} else {
			$aImages = $this->image_model->getAllImages();
		}
		
		$dataView['aImages'] = $aImages;
			
		$this->load->view('image/image_catalog',$dataView);
	}
	
	public function getImageEditionForm($iImageId) {
		
		$this->load->model('image_model','',true);
		$this->load->model('category_model','',true);
		
		if(isset($iImageId) && !is_null($iImageId)) {
			$aImage = $this->image_model->getImageById($iImageId);
			$aImage->categories = $this->category_model->getCategoryByImageId($iImageId);
			
			$dataView['aImage'] = $aImage;
			
			$this->load->view('image/image_edition',$dataView);
		} else {
			$aImages = $this->image_model->getAllImages();
			
			$dataView['aImages'] = $aImages;
			
			$this->load->view('image/image_catalog',$dataView);
		}
	}
}