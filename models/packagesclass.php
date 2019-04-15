<!-- Author: Ariel Contreras -->
<!-- OOP model for packages -->
<?php 

	class package{
		private $ImgUrl;
		private $Name;
		private $Desc;
		private $StartDate;
		private $EndDate;
		private $Price;
		public function __construct($packageData){
			$this->ImgUrl = $packageData["PkgImgUrl"];
			$this->Name = $packageData["PkgName"];
			$this->Desc = $packageData["PkgDesc"];
			$this->StartDate = $packageData["PkgStartDate"];
			$this->EndDate = $packageData["PkgEndDate"];
			$this->Price = $packageData["PkgBasePrice"];
		}
		public function getImgUrl(){
			return $this->ImgUrl;
		}
		public function getName(){
			return $this->Name;
		}
		public function getDesc(){
			return $this->Desc;
		}
		public function getStartDate(){
			return $this->StartDate;
		}
		public function getEndDate(){
			return $this->EndDate;
		}
		public function getPrice(){
			return $this->Price;
		}
		public function setImgUrl($ImgUrl){
			$this->ImgUrl = $ImgUrl;
		}
		public function setName($Name){
			$this->Name = $Name;
		}
		public function setDesc($Desc){
			$this->Desc = $Desc;
		}
		public function setStartDate($StartDate){
			$this->StartDate = $StartDate;
		}
		public function setEndDate($EndDate){
			$this->EndDate = $EndDate;
		}
		public function setPrice($Price){
			$this->Price = $Price;
		}
		public function toString(){
			$output = $this->ImgUrl . ',';
			$output .= $this->Name . ',';
			$output .= $this->Desc . ',';
			$output .= $this->StartDate . ',';
			$output .= $this->EndDate . ',';
			$output .= $this->Price;
			return $output;
		}
	}
?>