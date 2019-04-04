<?php 

	class package{
		private $packageURL;
		private $packageName;
		private $packageDesc;
		private $packageStartDate;
		private $packageEndDate;
		private $packagePrice;
		public function __construct($packageData){
			$this->packageURL = $packageData["travelimg"];
			$this->packageName = $packageData["travelname"];
			$this->packageDesc = $packageData["traveldesc"];
			$this->packageStartDate = $packageData["travelstart"];
			$this->packageEndDate = $packageData["travelend"];
			$this->packagePrice = $packageData["travelprice"];
		}
		public function getpackageURL(){
			return $this->packageURL;
		}
		public function getpackageName(){
			return $this->packageName;
		}
		public function getpackageDesc(){
			return $this->packageDesc;
		}
		public function getpackageStartDate(){
			return $this->packageStartDate;
		}
		public function getpackageEndDate(){
			return $this->packageEndDate;
		}
		public function getpackagePrice(){
			return $this->packagePrice;
		}
		public function setpackageURL($packageURL){
			$this->packageURL = $packageURL;
		}
		public function setpackageName($packageName){
			$this->packageName = $packageName;
		}
		public function setpackageDesc($packageDesc){
			$this->packageDesc = $packageDesc;
		}
		public function setpackageStartDate($packageStartDate){
			$this->packageStartDate = $packageStartDate;
		}
		public function setpackageEndDate($packageEndDate){
			$this->packageEndDate = $packageEndDate;
		}
		public function setpackagePrice($packagePrice){
			$this->packagePrice = $packagePrice;
		}
		public function toString(){
			$output = $this->packageURL . ',';
			$output .= $this->packageName . ',';
			$output .= $this->packageDesc . ',';
			$output .= $this->packageStartDate . ',';
			$output .= $this->packageEndDate . ',';
			$output .= $this->packagePrice;
			return $output;
		}
	}
?>