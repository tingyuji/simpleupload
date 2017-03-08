<?php
require_once 'database_wcc.php';
setlocale(LC_ALL, 'zh_CN.utf-8');

class logClass extends database_wcc {
	private $test_datasource = 'test_datasource';
	function __construct ($config=NULL){
		parent::__construct($this->test_datasource);
	}
		

	function getAll(){
		$sql = "select * from log order by id asc";
		return $this->selectArray($sql);		
	}
	
	function add($page,$action){
		$sql = "INSERT  INTO log(page,action,time) Values('$page','$action',now())";
    	//echo $sql;
    	//echo '<br>';
    	$this->update_sql($sql);
	}	
		
}