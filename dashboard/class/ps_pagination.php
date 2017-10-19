<?php
class PS_Pagination {
	var $php_self;
	var $rows_per_page = 10; //Number of records to display per page
	var $total_rows = 0; //Total number of rows returned by the query
	var $links_per_page = 5; //Number of links to display per page
	var $append = ""; //Paremeters to append to pagination links
	var $sql = "";
	var $debug = false;
	var $conn = false;
	var $page = 1;
	var $max_pages = 0;
	var $offset = 0;
	
	/**
	 * Constructor
	 *
	 * @param resource $connection Mysql connection link
	 * @param string $sql SQL query to paginate. Example : SELECT * FROM users
	 * @param integer $rows_per_page Number of records to display per page. Defaults to 10
	 * @param integer $links_per_page Number of links to display per page. Defaults to 5
	 * @param string $append Parameters to be appended to pagination links 
	 */
	
	function PS_Pagination($connection, $sql, $rows_per_page = 10, $links_per_page = 5, $append = "",$byownindex = 0) {
		$this->conn = $connection;
		$this->sql = $sql;
		$this->rows_per_page = (int)$rows_per_page;
		if (intval($links_per_page ) > 0) {
			$this->links_per_page = (int)$links_per_page;
		} else {
			$this->links_per_page = 5;
		}
		$this->append = $append;
			switch($byownindex) 
		{
			case 0:
					$this->php_self = "";
			break;
					$this->php_self = htmlspecialchars($_SERVER['PHP_SELF'] );;
			case 1:
			
			break;
		}
		//$this->php_self = "products.php";//htmlspecialchars($_SERVER['PHP_SELF'] );
		if (isset($_GET['page'] )) {
			$this->page = intval($_GET['page'] );
		}
	}
	
	/**
	 * Executes the SQL query and initializes internal variables
	 *
	 * @access public
	 * @return resource
	 */
	function paginate() {
		//Check for valid mysql connection
		if (! $this->conn || ! is_resource($this->conn )) {
			if ($this->debug)
				echo "MySQL connection missing<br />";
			return false;
		}
		
		//Find total number of rows
		$all_rs = @mysql_query($this->sql );
		if (! $all_rs) {
			if ($this->debug)
				echo "SQL query failed. Check your query.<br /><br />Error Returned: " . mysql_error();
			return false;
		}
		$this->total_rows = mysql_num_rows($all_rs );
		@mysql_close($all_rs );
		
		//Return FALSE if no rows found
		if ($this->total_rows == 0) {
			if ($this->debug)
				echo "Query returned zero rows.";
			return FALSE;
		}
		
		//Max number of pages
		$this->max_pages = ceil($this->total_rows / $this->rows_per_page );
		if ($this->links_per_page > $this->max_pages) {
			$this->links_per_page = $this->max_pages;
		}
		
		//Check the page value just in case someone is trying to input an aribitrary value
		if ($this->page > $this->max_pages || $this->page <= 0) {
			$this->page = 1;
		}
		
		//Calculate Offset
		$this->offset = $this->rows_per_page * ($this->page - 1);
		
		//Fetch the required result set
		$rs = @mysql_query($this->sql . " LIMIT {$this->offset}, {$this->rows_per_page}" );
		if (! $rs) {
			if ($this->debug)
				echo "Pagination query failed. Check your query.<br /><br />Error Returned: " . mysql_error();
			return false;
		}
		return $rs;
	}
	
	/**
	 * Display the link to the first page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'First'
	 * @return string
	 */
	function renderFirst($tag = '&lsaquo; First') {
		if ($this->total_rows == 0)
			return FALSE;
		
		//if ($this->page == 1) {
		//	//return "$tag ";
		//	return '<li class="previous-off">'.$tag.'</li><a href="';
		//} else {
		//	return '<li class="previous-off">«Prev</li><a href="' . $this->php_self . '?page=1&' . $this->append . '">' . $tag . '</a> ';
		//}
		if ($this->page == 1) {
			//
			return  '<li class="first-off">'.$tag.'</li>';
		} else {
			return ' <li class="first"><a href="' . $this->php_self . '?page=' . 1 . '&' . $this->append . '">'.$tag.'</a></li>';
			
		}
	}
	
	/**
	 * Display the link to the last page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'Last'
	 * @return string
	 */
	function renderLast($tag = 'Last &rsaquo;') {
		if ($this->total_rows == 0)
			return FALSE;
		
		if ($this->page == $this->max_pages) {
			return '<br/><br/><br/><li class="last-off">'.$tag.'</li>';
		} else {
			return ' <li class="last"><a href="' . $this->php_self . '?page=' . $this->max_pages . '&' . $this->append . '">' . $tag . '</a></li>';
		}
	}
	
	/**
	 * Display the next link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '>>'
	 * @return string
	 */
	function renderNext($tag = 'Next &raquo;') {
		if ($this->total_rows == 0)
			return FALSE;
		
		if ($this->page < $this->max_pages) {
			//enable next link
			return '<li class="next"><a href="' . $this->php_self . '?page=' . ($this->page + 1) . '&' . $this->append . '">' . $tag . '</a></li>';
		} else {
			return '<li class="next-off">'.$tag.'</li>';
		}
	}
	/**
	 * Display the previous link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '<<'
	 * @return string
	 */
	function renderPrev($tag = '&laquo; Prev') { 
		if ($this->total_rows == 0)
			return FALSE;
		
		if ($this->page > 1) {
			//return ' <a href="' . $this->php_self . '?page=' . ($this->page - 1) . '&' . $this->append . '">' . $tag . '</a>';
			return ' <li class="previous"><a href="' . $this->php_self . '?page=' . ($this->page - 1) . '&' . $this->append . '">'.$tag.'</a></li>';
		} else {
			return ' <li class="previous-off">'.$tag.'</li>';
		}
	}
	
	/**
	 * Display the page links
	 *
	 * @access public
	 * @return string
	 */
		function renderNav($prefix = '<li>', $suffix = '</li>') {
		
		if ($this->total_rows == 0)
			return FALSE;
		
		$batch = ceil($this->page / $this->links_per_page );
		$end = $batch * $this->links_per_page;
		if ($end == $this->page) {
			//$end = $end + $this->links_per_page - 1;
		//$end = $end + ceil($this->links_per_page/2);
		}
		if ($end > $this->max_pages) {
			$end = $this->max_pages;
		}
		$start = $end - $this->links_per_page + 1;
		$links = '';
		
		for($i = $start; $i <= $end; $i ++) {
			if ($i == $this->page) {
				$links .= '<li class="active">'.$i. $suffix;
			} else {
				//$links .= ' ' . $prefix . '<a href="' . $this->php_self . '?page=' . $i . '&' . $this->append . '">' . $i . '</a>' . $suffix . ' ';
				//<li><a href="?page=2">1</a></li>
				$links .= $prefix . '<a href="' . $this->php_self . '?page=' . $i . '&' . $this->append . '">' . $i . '</a>' . $suffix;
			}
		}
		
		return $links;
	}
	
	/**
	 * Display full pagination navigation
	 *
	 * @access public
	 * @return string
	 */
	function renderFullNav($prefix ='<ul id="pagination-flickr">', $suffix ='</ul>') {
		//Show Full Naviagation bar
		return $prefix . $this->renderFirst().$this->renderPrev() . $this->renderNav() . $this->renderNext().$this->renderLast().$suffix ; 
	}
	function rendernavi($prefix ='<ul id="pagination-flickr">', $suffix ='</ul>') {
		//Show Full Naviagation bar
		return $prefix .$this->renderPrev() . $this->renderNav() . $this->renderNext().$suffix ; 
	}
	/**
	 * Set debug mode
	 *
	 * @access public
	 * @param bool $debug Set to TRUE to enable debug messages
	 * @return void
	 */
	function setDebug($debug) {
		$this->debug = $debug;
	}
}
?>
