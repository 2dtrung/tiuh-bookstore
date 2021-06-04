<?php
  
    
    class pagination2 {
        private $_totalItem;
        private $_itemOnePage;
        private $_totalPage;
        private $_totalPageShow;
        private $_currentPage;
        public function __construct($totalItem,$currentPage,$itemOnePage,$totalPageShow) {
            $this->_totalItem=$totalItem;
            $this->_currentPage=$currentPage;
            $this->_itemOnePage=$itemOnePage;
            $this->_totalPageShow=$totalPageShow;
            $this->_totalPage=ceil($this->_totalItem/$this->_itemOnePage);
        }
        public function get_itemOnePage() {
            return $this->_itemOnePage;
        }
        public function showPagination() {
            $paginationHTML='';
            $start='';
            $prev='';
            $next='';
            $end='';
            $listPage='';
            if($this->_totalItem>1) {
                $currentLink=(isset($_SERVER["HTTPS"]) ? "https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if($this->_currentPage >1) {
                    if($this->_currentPage >=10) {
                        $currentLink=substr($currentLink,0,-8);
                        
                    }
                    else {
                        $currentLink=substr($currentLink,0,-7);
                       
                    }
                }
                if($this->_currentPage >1) {
                    $start="<li><a href='$currentLink&page=1'>Start</a></li>";
                    $prev="<li><a href='$currentLink&page=".($this->_currentPage-1)."'><</a></li>";
                }
                if($this->_currentPage <$this->_totalPage) {
                    $end="<li><a href='$currentLink&page=".$this->_totalPage."'>End</a></li>";
                    $next="<li><a href='$currentLink&page=".($this->_currentPage+1)."'>></a></li>";
                }
               

                if($this->_currentPage<$this->_totalPageShow -1) {
                    $startPage=1;
                    $endPage=$this->_totalPageShow;
                }
                else if($this->_currentPage==$this->_totalPage) {
                    $startPage=$this->_totalPage-$this->_totalPageShow+1;
                    $endPage=$this->_totalPage;
                }
                else  {
                    $startPage=$this->_currentPage-floor($this->_totalPageShow/2);
                    $endPage=$this->_currentPage+ floor($this->_totalPageShow/2);
                    if($endPage > $this->_totalPage) {
                        $startPage=$this->_totalPage-$this->_totalPageShow+1;
                        $endPage=$this->_totalPage;

                    }

                }
                
             
                for($i=$startPage; $i<=$endPage;$i++) {
                    if($i==$this->_currentPage) {
                        $listPage.="<li class='active'><a href='#'>".$i."</a></li>";
                    }
                    else {
                        $listPage.="<li ><a href='$currentLink&page=".$i."'>".$i."</a></li>";
                    }
                }
                $paginationHTML = '<ul class="pagination">'.$start.$prev.$listPage.$next.$end.'</ul>';
            }
            return $paginationHTML;
        }
    }

?>