<?php

class Image_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function insertImage($sFileName = null) {
		
		if (!is_null($sFileName)) {
			
			$sQuery = ' INSERT INTO images (file_name) VALUES ("' . $sFileName .'")';
			
			$this->db->query($sQuery);
			
			return true;
		}
		
		return false;
	}
	
	function getImageById($iId = null) {
		
		if (!is_null($iId)) {
			
			$sQuery = ' SELECT i.id, i.file_name FROM images i WHERE i.id = ' . $iId;
			
			$oResult = $this->db->query($sQuery);
			
			$aResult = $oResult->result();
			
			return $aResult[0];
		}
		
		return false;
	}
	
	function getAllImages() {
		
		$sQuery = ' SELECT i.id, i.file_name FROM images i';
		
		$oResult = $this->db->query($sQuery);
		
		return $oResult->result();
	}
	
	function getImagesByCategoryId($aIdCategory = null) {
		
		if (!is_null($aIdCategory) && count($aIdCategory) > 0) {
		
			$sQuery = ' SELECT i.id, i.file_name '
					. ' FROM images i '
					. ' INNER JOIN image_categories ic ON ic.id_image = i.id '
					. ' WHERE ic.id_category IN ' . $aIdCategory
					. ' GROUP BY i.id';
			
			$oResult = $this->db->query($sQuery);
			
			return $oResult->result();
		}
		
		return false;
	}
}