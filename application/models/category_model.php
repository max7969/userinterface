<?php

class Category_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function insertCategory($sName = null) {
		
		if (!is_null($sName)) {
			
			$sQuery = ' INSERT INTO categories (name) VALUES ("' . $sName . '")';
			
			$this->db->query($sQuery);
			
			return true;
		}
		
		return false;
	}
	
	function getCategoryById($iId = null) {

		if (!is_null($iId)) {
				
			$sQuery = ' SELECT c.id, c.name FROM categories c WHERE c.id = ' . $iId;
				
			$oResult = $this->db->query($sQuery);
				
			return $oResult->result();
		}
		
		return false;
	}
	
	function getAllCategories() {
		
		$sQuery = ' SELECT c.id, c.name FROM categories c';
		
		$oResult = $this->db->query($sQuery);
		
		return $oResult->result();
	}
	
	function getCategoryByImageId($iIdImage = null) {
		
		if (!is_null($iIdImage)) {
			
			$sQuery = ' SELECT c.id, c.name FROM categories c '
					. ' INNER JOIN image_categories ic ON ic.id_category = c.id '
					. ' WHERE ic.id_image = ' . $iIdImage;
			
			$oResult = $this->db->query($sQuery);
			
			return $oResult->result();
		}
		
		return false;
	}
}