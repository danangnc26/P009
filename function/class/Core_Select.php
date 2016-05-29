<?php
include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'..\config\Database.php';

class Select implements Iterator{
	
	protected $_query;
	protected $_sql;
	protected $_pointer = 0;
	protected $_numResult = 0;
	protected $_results = array();
	
	function __construct($sql){
		$this->_sql = $sql;
	}
	
	function rewind(){
		$this->_pointer = 0;
	}
	
	function key(){
		return $this->_pointer;
	}
	
	protected function _getQuery(){
		if(!$this->_query){
			$connection = Database::open();
			$this->_query = $connection->query($this->_sql);
			// if ($this->_query->num_rows > 0) {
			//     // output data of each row
			//     while($row = $this->_query->fetch_assoc())

			//         $data[] = $row;

			//         return $data;
			    

			// } else {

			// 	return null;

			// }

			if(!$this->_query){
				throw new Exception('Gagal membaca data dari database:'.mysql_error());
			}
		}
		return $this->_query;
	}
	
	protected function _getNumResult(){
		if(!$this->_numResult){
			$this->_numResult = $this->_getQuery()->num_rows;
		}
		return $this->_numResult;
	}
	
	function valid(){
		if($this->_pointer >= 0 && $this->_pointer < $this->_getNumResult()){
			return true;
		}
		return false;
	}
	
	protected function _getRow($pointer){
		if(isset($this->_results[$pointer])){
			return $this->_results[$pointer];
		}
		$row = mysqli_fetch_object($this->_getQuery());
		if($row){
			$this->_results[$pointer] = $row;
		}
		return $row;
	}
	
	function next(){
		$row = $this->_getRow($this->_pointer);
		if($row){
			$this->_pointer ++;
		}
		return $row;
	}
	
	function current(){
		return $this->_getRow($this->_pointer);
	}
	
	function close(){
		mysql_free_result($this->_getQuery());
		Database::close();
	}
	
} 
