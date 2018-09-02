<?php

	function pre($a){echo "<pre>"; print_r($a); echo "</pre>";}

	class nldAssistant{

		public function __construct(){

		}

		private function getContentOfFile($path){
			$handle = fopen($path, "r");
			$contents = fread($handle, filesize($path));
			fclose($handle);
			return $contents;
		}

		public function getHtaccess(){
			//$arr[$key] = htmlentities(stripslashes(utf8_encode($value)), ENT_QUOTES);
			//return htmlentities(stripslashes(utf8_encode($this->getContentOfFile(".htaccess"))), ENT_QUOTES);
			return $this->getContentOfFile(".htaccess");
		}

		public function ajaxEmit($data){
			die(json_encode($data, JSON_PRETTY_PRINT));
		}

		public function ajaxOn($method){
			if( method_exists(__CLASS__, $method) ){
				$this->ajaxEmit($this->$method());
			}
		}

	}


	/*
	echo json_encode(array("name" => "blop"));

	die();*/

	if($_POST["for"] ?? "nldAssistant"){
		if($_POST["action"] != ""){
			$nldAssistant = new nldAssistant();
			$nldAssistant->ajaxOn($_POST["action"]);
		}
	}