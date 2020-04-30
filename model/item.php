<?php
	class Item{
		var $item_id;
		var $item_name;
		var $item_stock;
		var $item_price;
		var $item_desc;
		function getitemid() {return $this->item_id;}
		function getitemname() {return $this->item_name;}
		function getitemprice() {return $this->item_stock;}
		function getitemstock(){return $this->item_price;}
		function getitemdesc() {return $this->item_desc;}
		function setitemid($str) {$this->item_id =$str;}
		function setitemname($str) {$this->item_name =$str;}
		function setprice($str) {$this->item_stock =$str;}
		function setitemstock($str){$this->item_price=$str;}
		function setitemdesc($str) {$this->item_desc =$str;}
	}
?>