<?php
require 'helper.php';

class Paginator {
    private $limit;
    private $page;
    private $total;  
    private $path;
    
    function __construct($path) {
        $this->path = $path;
    }
   

    function getData($limit = 10, $page = 1) {
        $this->limit = $limit;
        $this->page = $page;

        $results =  getAllImageNames($this->path);
       
        $this->total = count($results);
    }
    
    function createLinks($links, $list_class) {
        $last = ceil($this->total / $this->limit);
        $start = (($this->page - $links) > 0) ? $this->page - $links : 1;
        $end = (($this->page + $links) < $last) ? $this->page + $links : $last;
        
        $html = '<ul class="' . $list_class . '">';
        $class = ($this->page == 1) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&page=' . ($this->page - 1) . '">&laquo;</a></li>';
        
        if($start > 1) {
            $html .= '<li><a href="?limit=' . $this->limit . '&page=1">1</a></li>';
            $html .= '<li class="disabled"><span>...</span></li>';
        }
        
        for($i = $start; $i < $end; $i++) {
            $class = ($this->page == $i) ? "active" : "";
            $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&page=' . $i . '">' . $i . '</a></li>';
        }
        
        if($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="?limit=' . $this->limit . '&page=' . $last . '">' . $last . '</a></li>';
        }
        
        $class = ($this->page == $last) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&page=' . ($this->page + 1) . '">&raquo;</a></li>';
        
        $html .= '</ul>';
        
        return $html;
    }

}

