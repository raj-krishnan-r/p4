<?php
function datediff($start,$end)
{
$start_ts = strtotime($start);
$end_ts = strtotime($end);
$diff = $end_ts - $start_ts;
$diff= round($diff/86400);
return $diff;
}
function datestrip($st,$mode)
{
$date=$st;
if(strlen($date)==19)
{
if($mode=='d')
{
return substr($date,0,10);
}
if($mode=='t')
return substr($date,11,8);
}
else
{
echo "Invalid date format, it has to be like 2014-04-13 02:04:03";
	}
}
?>
