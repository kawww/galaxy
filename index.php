<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>GALAXY OS</title>
		<style>


html,
body,
.site_font {
  font-family: coda_regular, arial, helvetica, sans-serif;
}

html, body {
  background-color: #0b0c0d;
  color: #fff;
  font-size: 15px;
  margin: 0 auto -100px;
  padding: 0;
}





a:link,
a:visited,
a:active{
 transition:0.5s;
color: #28f428;	
  text-decoration: none;
}

a:hover { color:yellow; }

input[type="text"],
input[type="submit"] {
  font-size: 18px;
}



input[type="text"],
input[type="submit"] {
  border: 1px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  height:42px;
 

}

input[type="text"] {
  background-color: rgb(11, 12, 13);
  color: #ddd;

 width:500px;
 padding-left:5px;

}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 5px 22px;
margin-left:3px;
  height:45px;
    
}

div{margin:5px;border:0;padding:0;}

#door {

margin-top:15px;
  
  font-size: 15px;
  

}

#newworld{

margin-top:100px;
  
  font-size: 15px;
  

}





#tech {

  
margin-left: 11px;
padding-left: 2px;
text-align: left;
vertical-align:middle;

  border: 0px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  font-size:24px;

width:98%;

 
  
}

@keyframes textShadow {
  0% {
    text-shadow: 0.4389924193300864px 0 1px rgba(0,30,255,0.5), -0.4389924193300864px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }

  100% {
    text-shadow: 2.6208764473832513px 0 1px rgba(0,30,255,0.5), -2.6208764473832513px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
}

.crt::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: linear-gradient(rgba(18, 16, 16, 0) 80%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
  z-index: 2;
  background-size: 100% 2px;
  pointer-events: none;
}
.crt {
  animation: textShadow 0.00s infinite;
}

            #nav
            {
                /*width: 80%;*/
                margin: 0 auto;
				margin-left: 13px;
				padding-left: 3px;
                border: 0px solid #59fbea;
            }
            ul,li 
            {
                margin: 0px;
                padding: 0px;
                list-style: none;
            }
            ul 
            {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;

            }

			div:before {
  content:"";
  position:absolute;
  top:0px;
  bottom:0;
  left:0;
  right:0;
  background:linear-gradient(to bottom,transparent,#000 0px);
  animation:fadeIn 1s forwards
}

@keyframes fadeIn {
  0% {
    top:5%;
  }
  100% {
    top: 100%;
  }
}

            li
            {
                border: 1px solid #59fbea;
                width: 270px;
				height:60px;
				word-break: break-all;
			background-color: rgb(0, 79, 74);
                text-align: center;
                margin-top: 10px;
                margin-bottom: 10px;
				margin-right: 5px;
				margin-left: 5px;
				padding-top:10px;
				padding-left:2px;
				padding-right:2px;
                flex:auto;  
	

            }
#universe {

line-height:26px;
ont-weight:100px;
font-size: 22px;
position: absolute;
  
}


</style>
		<body>

		


<?php 

if(!isset($_REQUEST["asset"])) 

 {

		echo "<div id=\"nav\"><ul>";
		
		echo"<li style=\"height:100px;color:#bbb;\"><a href=console.php><h2>[ CONSOLE ]</h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ WALLET ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=asset.php><h2>[ ASSET ]</h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ Restricted ASSET ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ MESSAGE ]</a></h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ SUBSCRIBE ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ IPFS ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ DIVIDED ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ RASDAQ ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	


		echo"<li style=\"height:100px;color:#bbb;\"><a href=?asset=RUpxsSGEM4QyqaiSbSAyB64Ru2wR8qtEHf><h2>[ ASSET EXPLORER ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=explorer.php><h2>[ IPFS EXPLORER ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";

		echo "</ul></div>";

		echo "<div id=\"nav\"><ul>";

		echo"<li style=\"height:100px;color:#bbb;\"><h2><a href=https://raven.wiki target=_blank>[ WIKI ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVEN.WIKI</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><h2><a href=https://rvnstats.info target=_blank>[ STATISTICS ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RVNSTATS.INFO</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2><a href=https://ravencoin.network target=_blank>[ BLOCK EXPLORER ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVENCOIN.NETWORK</li>";	

	

			
		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://ravencoin.asset-explorer.net/  target=_blank><h2>[ ASSET MONITOR ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">ASSET-EXPLORER.NET</li>";	

		
		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://www.assetsexplorer.com  target=_blank><h2>[ ASSET NETWORK ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">ASSETEXPLORER.COM</li>";	


		echo"<li style=\"height:100px;color:#bbb;\"><a href=/http://ravenx.net  target=_blank><h2>[ ASSET EXCHANGE ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVENX.NET</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://faucet.ravenland.org  target=_blank><h2>[ ASSET FAUCET ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVENLAND.ORG</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://www.mangofarmassets.com/  target=_blank><h2>[ ASSET WALLET ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">MANGOFARMASSETS.COM</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=http://www.ravennodes.com  target=_blank><h2>[ NODES ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVENNODES.COM</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://miningpoolstats.stream/ravencoin  target=_blank><h2>[ POOL ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">MININGPOOLSTATS.STREAM</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://www.ravencoinmeetup.org  target=_blank><h2>[ MEETUP ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RAVERNCOINMEETUP.ORG</li>";

		echo "</ul></div>";

		echo "<div id=\"nav\"><ul>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://ravencoin.org  target=_blank><h2>[ RAVENCOIN.ORG ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://www.ravencoin.shop  target=_blank><h2>[ RAVENCOIN.SHOP ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";

		

		echo"<li style=\"height:100px;color:#bbb;\"><a href=http://onervn.com  target=_blank><h2>[ ONERVN.COM ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";

		

		echo "</ul></div>";

		echo "<div id=\"nav\"><ul>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=http://t.bdaily.club/  target=_blank><h2>[ IPFS URL DIRECT ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">T.BDAILY.CLUB</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://globalupload.io  target=_blank><h2>[ IPFS UPLOAD ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">GLOBALUPLOAD.IO</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://pinata.cloud  target=_blank><h2>[ IPFS UPLOAD ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">PINATA.CLOUD</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://temporal.cloud  target=_blank><h2>[ IPFS UPLOAD ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">TEMPORAL.CLOUD</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://github.com/ipfs/awesome-ipfs  target=_blank><h2>[ AWESOME IPFS ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">GITHUB</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://ipfs.io/  target=_blank><h2>[ IPFS.IO ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";
		
		
		echo "</ul></div>";

		echo "<div id=\"nav\"><ul>";

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ RITOCOIN ]</a></h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ RAPTOREUM ]</a></h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ CLASSIC ]</a></h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LOCAL</li>";	
		
		echo "</ul></div>";

		echo "<div id=\"nav\"><ul>";

		echo"<li style=\"height:100px;color:#bbb;\"><h2>[ DOWNLOAD GALAXY ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://github.com/kawww/Galaxy-OS-for-Ravencoin  target=_blank><h2>[ GALAXY OS CODE ]</h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";	

		echo"<li style=\"height:100px;color:#bbb;\"><a href=https://github.com/kawww/Galaxy-OS-for-Ravencoin/issues target=_blank><h2>[ GALAXY OS FEEDBACK ]</h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">LINK</li>";	
		
		echo "</ul></div>";


		echo "<div id=\"universe\" class=\"crt\">";
		}



if(isset($_REQUEST["asset"])) {

	if(strlen(trim($_REQUEST["asset"]))<>34)
	{$ec=strtoupper($_REQUEST["asset"]);}else {$ec=$_REQUEST["asset"];} 

	if($_REQUEST["asset"]=="RUpxsSGEM4QyqaiSbSAyB64Ru2wR8qtEHf"){$ec="";}


		echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:black;\"><a href=index.php><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:black;\"><input type=\"text\" name=\"asset\" maxlength=\"34\" value=\"".$ec."\" placeholder=\"ASSET OR ADDRESS\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"KAW\"></div></form></div>";

if($_REQUEST["asset"]=="RUpxsSGEM4QyqaiSbSAyB64Ru2wR8qtEHf"){
echo "<div id=\"nav\"><ul>";
		
		
		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=GETTING_STARTED ><h2>[ GETTING STARTED ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">GETTING_STARTED </li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=GOTO/ ><h2>[ GO TO ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">GOTO </li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=T.D><h2>[ Trust Domain ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">T.D</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=onervn><h2>[ ONERVN ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">ONERVN.COM</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=RVNCOIN/SONGS ><h2>[ RAVEN SONGS ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">RVNCOIN/SONGS</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=tarot ><h2>[ TAROT ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">TAROT</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=healer ><h2>[ HEALER ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">HEALER</li>";


		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=equa ><h2>[ EQUA start ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">EQUA</li>";

		echo"<li style=\"height:100px;color:#bbb;\"><a href=index.php?asset=com ><h2>[ COM ]</a></h2></a><hr style=\"background-color:#59fbea;height:1px;border:none;\">.COM</li>";

}

		echo "</ul></div>";

		if($_REQUEST["asset"]=="RUpxsSGEM4QyqaiSbSAyB64Ru2wR8qtEHf"){exit;}

		echo "<div id=\"universe\" class=\"crt\">";


//check server


include("rpc.php");

$rpc = new Linda();


//rpc

$_REQ = array_merge($_GET, $_POST);

$asset=$_REQ["asset"];

$asset=trim($asset);

$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;

if(strlen($asset)==34){$sortnum=3;$qr=$asset;}


$asset=strtoupper($asset);





if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}

if(isset($_REQ["sort"])){if($_REQ["sort"]==1){$sort="sort=1";$sortnum=1;}if($_REQ["sort"]==2){$sort="sort=1";$sortnum=2;}}



if($sortnum==9 or $sortnum==1){

//all to unicode

if(isset($turn) && isset($ux) && $turn==2 && $ux==1)
	
{



	$unicode="<br>&nbsp;&nbsp;Unicode: ".$asset;

	$assetm=$asset;
	
	$assetsplit=str_split($asset,4);

	foreach($assetsplit as $assety)
	{
	$assetx="U+".$assety."";
	$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

	$asset=str_replace($assety,$utf8string,$asset);
	
	}



}
//search to unicode
//ux unicode click



if(check_utf8($asset)==true && preg_match('/[A-Za-z]/', $asset)==false && preg_match('/[0-9]/', $asset)==false){

	$asset=utf8_to_unicode($asset); 
	$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; ".trim($_REQ["asset"]);
	$unioff=" <a href=?asset=".$asset."&unicode=0&u=1&".$sort." >[ TURN-OFF ]</a><br>";
	
	$turn=1;
	
	
	}else{

		$unioff="&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=".$asset."&unicode=1&".$sort."  >[ TURN-ON ]</a><br>";

		//all to unicode

		if(isset($ux) && $ux==1){

			$unioff="&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=".$asset."&unicode=2&u=1&".$sort." >[ TURN-ON ]</a><br>";}

		
			}



if(isset($turn) && $ux==9 && $turn==1)
	
{



$unicode="&nbsp;&nbsp;<font color=#28f428>UNICODE</font>&nbsp; ".$asset;
$unioff=" <a href=?asset=".$asset."&unicode=0&".$sort." >[ TURN-OFF ]</a><br>";
	
	
}


	if(strpos($asset,"#") !== false or strpos($asset,"deid@") !== false or strpos($asset,"DEID@") !== false){

	

	$asset=str_replace("deid@","DEID#",$asset);
	$asset=str_replace("DEID@","DEID#",$asset);

	list($assa,$assb)=explode("#",$asset);

	$assa=strtoupper($assa);
	$asset=$assa."#".$assb;
	
	}else{
$asset=strtoupper($asset);}

$address=$asset;


//check address

if(!$address)

	{
    
	
	$address="";
	
	$turn=0;

	
	$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=onervn&unicode=1&".$sort." >[ TURN-ON ]</a><br>";
	$unioff=" ";
		

	}





$rawtransaction = $rpc->listassets();


//check error

$error = $rpc->error;

if($error != "") 
	
	{

	echo "<p>&nbsp;&nbsp;Error,R</p>";
	exit;

	}


//check faucet number

if($sortnum==1){
	
	
	$sortword="<a href=\"?unicode=".$turn."&asset=".$address."\">[ FAST ]</a>&nbsp;";


}else
	
{
	
	$sortword="<a href=\"?unicode=".$turn."&sort=1&asset=".$address."\">[ SORT ]</a>";

}

echo "&nbsp;&nbsp;&nbsp;<div style=\"text-align:left;margin-top:0px;padding-left:15px;height:40px;\">".$sortword."".$unicode."".$unioff."</div> <div id=\"nav\"><ul>";

//get search data

$age=$rawtransaction;


$totalass=array();
$totalsearch=array();



foreach($age as $x=>$x_value)

	{

		if(stristr($x_value,$address) == true)

			{



//sort or not


			$y_value=$x_value;

if($sortnum==1)

				{
$arr=array();
			$assetadd= $rpc->listaddressesbyasset($y_value);
			
			$assetnum=count($assetadd);
			
			

			$info = $rpc->getassetdata($y_value);
			
			$ipfs_hash="";

			extract($info);

			$arr["num"]=$assetnum;
			$arr["asset"]=$y_value;
			$arr["ipfsx"]=$ipfs_hash;
			$arr["amount"]=$amount;
			$arr["units"]=$units;
			$arr["reissuable"]=$reissuable;

			array_push($totalass,$arr);
		

				}
	

else{

$info=$rpc->getassetdata($x_value);
}




if(isset($turn) && $turn==1){



if($unicode!="")

{


$x_value=uniworld($x_value,$address,$asset);


}


}





$x_value=str_replace("U+","",$x_value);



$ipfs_hash="";

extract($info);



if(strlen($x_value)>20){

$count=1;
if(preg_match ( '/[\Q~!#\E]/', $x_value)){
	
	list($assetl,$assetr)=explode("#",$x_value);if(strlen($assetr)>5){
	$x_value=str_replace("#","#<br>",$x_value);}}else{
if(strpos($x_value, "/")>15){
$x_value=replaceString("/","/<br>",$x_value);}}

}else{$x_value=$x_value."<br><br>";}

if($sortnum==9)

				{

			if(!$ipfs_hash)

				{
	   			echo "<li style=\"background-color: black;\">".$x_value."</li>";		
				}

			//ipfs yes

			else

				{

				echo "<li><a href=\"https://gotoipfs.com/#path=".$ipfs_hash."\" target=_blank>".$x_value."</a></li>";		
		}
				}
	}	
}

if($sortnum==1)

				{
				
arsort($totalass);

$listasset=$totalass;


foreach ($listasset as $k=>$v) 
			{
			
			
			$x_value="";
			$ipfs="";
			$assetnum="";

			extract($v);

			$x_value=$asset;
			$ipfs=$ipfsx;
			$assetnum=$num;




			$f_value=$x_value;
			$u_value=$x_value;
			$u_value=str_replace("/","%2F",$u_value);
			$u_value=str_replace("#","%23",$u_value);
$reisx="";
if($reissuable==0){$reisx="<font color=red>NOT Reissuable</font>";}

			if(strlen($x_value)>20){

$count=1;
if(preg_match ( '/[\Q~!#\E]/', $x_value)){
	
	list($assetl,$assetr)=explode("#",$x_value);if(strlen($assetr)>5){
	$x_value=str_replace("#","#<br>",$x_value);}}else{
$x_value=replaceString("/","/<br>",$x_value);}

}else{$x_value=$x_value."<br><br>";}


if(isset($turn) && $turn==1){



if($unicode!="")

{


$x_value=uniworld($x_value,$address,$asset);


}


}





$x_value=str_replace("U+","",$x_value);


			if(!$ipfs)

				{


			echo "<li style=\"background-color: black;height:200px;\"><h2><a href=?unicode=".$turn."&sort=2&asset=".$u_value.">[ ".$assetnum." ] </a></h2>".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\">".number_format($amount,$units)." ".$reisx."  </li>";
		
				}

			//ipfs yes

			else

				{
		
				
			

				echo "<li style=\"height:200px;\"><h2><a href=?unicode=".$turn."&sort=2&asset=".$u_value.">[ ".$assetnum." ] </a></h2><a href=\"https://gotoipfs.com/#path=".$ipfs."\" target=_blank>".$x_value."</a><hr style=\"background-color:#59fbea;height:1px;border:none;\">".number_format($amount,$units)." ".$reisx."  </li>";
				
			
				}

	   
			}
				
				}

		}


//list

if($sortnum==2)

				{

echo "<div id=\"nav\"><ul>";
$arr=array();
$totalsearch=array();

$assetadd= $rpc->listaddressesbyasset($asset);

foreach($assetadd as $y=>$y_value)

	{

		

			

			$arr["num"]=$y_value;
			$arr["add"]=$y;

array_push($totalsearch,$arr);

	}

arsort($totalsearch);

foreach ($totalsearch as $k=>$v) 

						{

extract($v);



			echo "<li style=\"width:360px;height:150px;\"><h2>[ ".$num." ]</h2><a href=?unicode=".$turn."&sort=3&asset=".$add.">".$add."</a></li>";
			
	}	



	}


	if($sortnum==3)

				{
		
			$age = $rpc->listassetbalancesbyaddress($qr);
			
			$error = $rpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}

if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=?asset=".$qr."&unicode=&sort=3 >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=".$qr."&unicode=1&sort=3 >[ TURN-ON ]</a><br>";}

echo "&nbsp;&nbsp;<div style=\"text-align:left;margin-top:0px;padding-left:15px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";


		foreach($age as $x_value=>$x)

			{

$assetlink=$x_value;
$assettwo=$x_value;


if($turn==1)

{
$x_value=uniworld($x_value,$assetlink,$assettwo);
}


$x_value=str_replace("U+","",$x_value);



if(strlen($x_value)>20){

$count=1;

if(preg_match ( '/[\Q~!#\E]/', $x_value)){
	
	list($assetl,$assetr)=explode("#",$x_value);if(strlen($assetr)>5){
	$x_value=str_replace("#","#<br>",$x_value);}}else{
$x_value=replaceString("/","/<br>",$x_value);}

}else{$x_value=$x_value."<br><br>";}


			echo "<li style=\"background-color: rgb(0, 79, 74);;height:110px;\"><a href=?&unicode=".$turn."&sort=2&asset=".$assetlink.">".$x_value."</a><hr style=\"background-color:#59fbea;height:1px;border:none;\">".$x."</li>";

			}

	}

}

//echo "<br><br>&nbsp;&nbsp;<a href=http://onervn.com/search?asset=".$address." >http://onervn.com/search?asset=".$address."</a>&nbsp;<br>";





?>
</ul></div>
</div>
</body>
</html>