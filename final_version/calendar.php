<?php
class Calendar {
    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    /********************* PUBLIC **********************/

    /**
    * print out the calendar
    */
    public function show() {
      if (isset($_GET['year'])) {

      $year = $_GET['year'];

      } else {

      $year = date("Y", time());

      }

      if (isset($_GET['month'])) {

      $month = $_GET['month'];

      } else {

      $month = date("m", time());

      }

        if(null==$year&&isset($_GET['year'])){

            $year = $_GET['year'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['month'])){

            $month = $_GET['month'];

        }else if(null==$month){

            $month = date("m",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';
                                $content.='<div class="clear"></div>';
                                $content.='<ul class="dates">';

                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){

                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }

                                $content.='</ul>';

                                $content.='<div class="clear"></div>';

                        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = $this->currentDay;

            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }
//BACKUP
  if($this->currentDate == date('Y-m-d',strtotime(date("y",time()).'-'.date("m",time()).'-'.(date("d",time())))))

  return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"style="background: red;" onclick="events()">'.$cellContent.'</li>';

  else if($cellNumber%7==0) return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'"style="color: red;" onclick="events()">'.$cellContent.'</li>';

  else if($this->currentDate) return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').'" onclick="events()">'.$cellContent.'</li>';

  else return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';

//END_BACKUP*/
/*//TESTING
if($this->currentDate == date('Y-m-d',strtotime(date("y",time()).'-'.date("m",time()).'-'.(date("d",time())))))
{
          return '<li id="day" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                  ($cellContent==null?'mask':'').'"style="background: red;">'.$cellContent.'</li>';
}
else {

  if($cellNumber%7==0)
    return '<li id="day" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
          ($cellContent==null?'mask':'').'"style="color: red;">'.$cellContent.'</li>';


        return '<li id="day" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
}
//END_TESTING*/
    }

    /**
    * create navigation
    */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                    '<span class="title" onclick="reload()">'.date('M Y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }

    /**
    * create calendar week labels
    */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

if($label=="Sun"){
$content.='<li class="'.($label==6?'end title':'start title').' title"style="color:red">'.$label.'</li>';
}
else{
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
}
        }

        return $content;
    }



    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }

    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}
//session_start();
  //$_SESSION["day"]="da \n";
  //$_SESSION["day"]=null;
?>
<script>

function reload() {
  window.location.assign("index.php");
}
</script>
<style>
/*******************************Calendar Top Navigation*********************************/
div#calendar{
  margin:0px auto;
  padding:0px;
  width: 602px;
  font-family:Helvetica, "Times New Roman", Times, serif;
}

div#calendar div.box{
    position:relative;
    top:0px;
    left:0px;
    width:100%;
    height:40px;
    background-color:   #787878 ;
    border-radius: 10px;
    margin-bottom: 10px;
}

div#calendar div.header{
    line-height:40px;
    vertical-align:middle;
    position:absolute;
    left:11px;
    top:0px;
    width:582px;
    height:40px;
    text-align:center;
}

div#calendar div.header a.prev,div#calendar div.header a.next{
    position:absolute;
    top:0px;
    height: 17px;
    display:block;
    cursor:pointer;
    text-decoration:none;
    color:#FFF;
}

div#calendar div.header span.title{
    color:#FFF;
    font-size:18px;
}


div#calendar div.header a.prev{
    left:0px;
}

div#calendar div.header a.next{
    right:0px;
}




/*******************************Calendar Content Cells*********************************/
div#calendar div.box-content{
    border:1px solid #787878 ;
    //border-top:none;
    border-radius: 10px;
}



div#calendar ul.label{
    float:left;
    margin: 0px;
    padding: 0px;
    margin-top:5px;
    margin-left: 5px;
}

div#calendar ul.label li{
    margin:0px;
    padding:0px;
    margin-right:5px;
    float:left;
    list-style-type:none;
    width:80px;
    height:40px;
    line-height:40px;
    vertical-align:middle;
    text-align:center;
    color:#000;
    font-size: 15px;
    background-color: transparent;
}


div#calendar ul.dates{
    float:left;
    margin: 0px;
    padding: 0px;
    margin-left: 5px;
    margin-bottom: 5px;
}

/** overall width = width+padding-right**/
div#calendar ul.dates li{
    margin:0px;
    padding:0px;
    margin-right:5px;
    margin-top: 5px;
    line-height:80px;
    vertical-align:middle;
    float:left;
    list-style-type:none;
    width:80px;
    height:80px;
    font-size:25px;
    background-color: #DDD;
    color:#000;
    text-align:center;
    border-radius: 10px;
}

:focus{
    outline:none;
}
div#calendar ul.dates :hover{
  background: grey;
}
div.clear{
    clear:both;
}
</style>
