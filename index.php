<?php session_start();
include('../../php/connection.php');
include('../../php/country.php');
$userid = $_SESSION['userid'];
?>
<html>
<head>
<link rel="SHORTCUT ICON" href="../../favicon.ico" type="image/x-icon">
<title>Myshortcut Mobile</title>
<meta name="viewport" content="user-scalable=0"/>
<META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Encoding" content="gzip" />
<meta http-equiv="Accept-Encoding" content="gzip, deflate" />
<meta http-equiv="cache-control" content="max-age=86400" />
<meta name="Keywords" content="Watch your favorite Live TV, Movies, Shows, Video from your Browser on your TV">
<meta name="Description" content="Better way to browse and manage your favorite sites on Laptop, Mobile, Tablet and on TV">
<link type="text/css" rel="stylesheet" href="../tv.css">
<link type="text/css" rel="stylesheet" href="../nav.css">
<script type="text/javascript" src="../jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../js/ms.js"></script>
<script type="text/javascript" src="../../js/mtv.js"></script>
<script>
 
</script>
</head>
<body TOPMARGIN=0 LEFTMARGIN=0 MARGINHEIGHT=0 MARGINWIDTH=0>
<div class="searchdiv">
<div align="left" style="padding-left:40px;padding-right:40px;">
<input type='search' name='s' id='s' class='searchTextType' autocapitalize="none" autocomplete='off' autocorrect="off"
x-webkit-speech="" x-webkit-grammar="builtin:search" lang="en" dir="ltr" spellcheck="false" placeholder="Search Sites" 
onkeyup="javascript:getChannelByKeywordm(this.value,'<?=$ip?>','<?=$country?>')" 
onclick="javascript:getChannelByKeywordm(this.value,'<?=$ip?>','<?=$country?>')" />
</div>
</div>
<div class="mfilter">
<? if ($_SESSION['loggedIn'] == "Y") { ?>
<label style="font-size:2em">
Hi <?=$_SESSION['firstName']?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../../php/logout.php?backurl=../tv/m">Logout</a>&nbsp;&nbsp;
</label>
<? } else {?>
<label style="font-size:3em">
<a href="javascript:void(0)" onclick="javascript:login('../login.php')">Login</a>&nbsp;&nbsp;
<a href="../../register.php" target="_blank" >Register</a>&nbsp;&nbsp;</label>
<? }?>
<select class="mfilterby" name="filter" id="filter" onChange="javascript:getChannelByCategorym(this.value,'<?=$ip?>','<?=$country?>')">
<option value="-1">Home</option>
<option value="2">Live TV</option>
<option value="1">Movies</option>
<option value="10">Shopping</option>
<option value="5">News</option>
<option value="3">Social</option>
<option value="12">Email</option>
<option value="4">TV Shows</option>
<option value="64" >Tech News</option>
<option value="31">Shopping India</option>
<option value="8" >Travel</option>
<option value="18">Banks</option>
<option value="6">Jobs</option>
<option value="14">Cloud</option>
<option value="27" >Games</option>
<option value="15" >Deals</option>
<option value="49">Cars</option>
<option value="47">Kids</option>
<option value="11">Music</option>
<option value="33" >Technology</option>
<option value="53" >Productivity</option>
<option value="-1">-- A to Z --</option>
<option value="f<?=$userid?>">Myfavorite</option>
<?
$id = $_GET["id"];
$query = "select * from tvcat where deleted = 0 order by tvcat_name";
$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    //$message .= 'Whole query: ' . $query;
    die($message);
}
$count = 0;
$modulus = 0;
$rowcount = mysql_num_rows($result);

if ($rowcount > 0){	
	while ($row = mysql_fetch_assoc($result)) {	   
	    $tvcat_id = $row['tvcat_id'];
	    $tvcat_name = $row['tvcat_name'];
	?>
	<option value="<?=$tvcat_id?>" <? if ($id == $tvcat_id){?> selected <?}?>><?=$tvcat_name?></option>
	<?}
}?>
</select>
</div>
<div id="m" class="midm">
<? include('../getChannelm.php'); ?>
</div><br><br>
<div class="footer"></div>
<div id="bottom" class="midb" style="position:fixed;left:0px;bottom:0;width:100%;height:100p;">
<!--  <script>
 getBottomChannelm(56);
 //56 62
 </script>
 -->
</div>
<!-- statcounter -->
<!--  
<script type="text/javascript">sc_project=3687573;sc_invisible=1;sc_partition=44;sc_security="bba2bee7";</script>
<script type="text/javascript" src="../../counter_xhtml.js"></script>
<noscript>
<div class=statcounter><a href="http://www.statcounter.com/" target="_blank">
<img class=statcounter src="http://c45.statcounter.com/3687573/0/bba2bee7/1/" alt="counter customizable free hit"></a></div>
</noscript>
-->
</body>
</html>