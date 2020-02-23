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

::-webkit-scrollbar { width: 0 !important }



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

 width:300px;
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
                width: 430px;
				height:100px;
				word-break: break-all;
				background-color: rgb(0, 79, 74);
                text-align: center;
                margin-top: 10px;
                margin-bottom: 7px;
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

p
{

color:#ccc;
margin-top:2px;

}

</style>
		<body>

		


<?php 

include("rpc.php");

$rpc = new Linda();

$_REQ = array_merge($_GET, $_POST);


if(isset($_REQ["sub"])){ 

$sub=strtoupper(trim($_REQ["sub"]));

$ages= $rpc->subscribetochannel($sub);

}


$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;


if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}


echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"sub\" maxlength=\"30\" placeholder=\"ASSET\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"SUBSCRIBE\"></div></form></div>";
	


$agex= $rpc->viewallmessages();



		
			
			$error = $rpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}


$arrx=array();
$totalassx=array();


		foreach($agex as $g_value=>$g)

	{

		

	

		



			$arrx["block"]=$g['Block Height'];
			$arrx["time"]=substr($g['Time'],0,16);
			$arrx["name"]=str_replace("!","",$g['Asset Name']);
			$arrx["ipfs"]=$g['Message'];
			

			if(($raw['vout'][2]['scriptPubKey']['type'])=="transfer_asset")
				{
					$arrx["from"]=$raw['vout'][2]['scriptPubKey']['addresses'][0];
				}

			
			
			
			array_push($totalassx,$arrx);






		


	}

arsort($totalassx);

$age=$totalassx;


if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=? >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?unicode=1 >[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;padding-left:15px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=/channel.php><li style=\"background-color: rgb(0, 79, 74);height:100px;display:block;\"><h4>CHANNEL</h4></a></li>";



if(isset($_REQUEST["asset"]))
{
echo "<a href=/channel.php?&asset=".$_REQUEST["asset"]."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:100px;display:block;\"><h4>".$_REQUEST["asset"]."</h4></a></li>";
}else{


	$agec= $rpc->viewallmessagechannels();


		foreach($agec as $cv=>$c)

			{

		$c=str_replace("!","",$c);
echo "<a href=/channel.php?&asset=".$c."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:100px;display:block;\"><h4>".$c."</h4></a></li>";
			}

}

		foreach($age as $xx_value=>$xx)

			{

				extract($xx);

				$x_value=$name;

$assetlink=$x_value;
$assettwo=$x_value;


if($turn==1)

{
$x_value=uniworld($x_value,$assetlink,$assettwo);
}


$x_value=str_replace("U+","",$x_value);



if(isset($_REQUEST["asset"]) & $_REQUEST["asset"]==$name) {


	echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:40px;width:800px;font-size:70%\"><table ><tr><td width=\"160px\">".$time."</td><td><a href=https://gotoipfs.com/#path=".$ipfs.">".$ipfs."</a></td></tr></table></li>";
			
				}

	if(!isset($_REQUEST["asset"])) {

				
				echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:40px;width:800px;font-size:70%\"><table ><tr><td width=\"140px\">".$time."</td><td width=\"280px\" align=left><a href=/?&unicode=".$turn."&asset=".$x_value.">".$x_value."</a></td><td><a href=https://gotoipfs.com/#path=".$ipfs.">".$ipfs."</a></td></tr></table></li>";
				
				}
			}

		echo "</ul></div></div>";

	echo "<div id=\"universe\" class=\"crt\">";

	


/*

if(isset($_REQUEST["asset"])) {


//check server


	if(strlen(trim($_REQUEST["asset"]))<>34)
	{$ec=strtoupper($_REQUEST["asset"]);}else {$ec=$_REQUEST["asset"];} 


echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"asset\" maxlength=\"34\" value=\"".$ec."\" placeholder=\"ASSET OR ADDRESS\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"KAW\"></div></form></div>";
		echo "<div id=\"universe\" class=\"crt\">";


//rpc



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
    
	
	$address="ONERVN";
	
	$turn=0;

	
	$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=onervn&unicode=1&".$sort." >[ TURN-ON ]</a><br>";
	$unioff=" ";
		

	}





$rawtransaction =  $rpc->listmyassets();


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



foreach($age as $x_value=>$x)

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
	   			echo "<li style=\"background-color:#0b0c0d;\">".$x_value."</li>";		
				}

			//ipfs yes

			else

				{

				echo "<a href=\"https://gotoipfs.com/#path=".$ipfs_hash."\" target=_blank><li><p>".$x_value."</p></a></li>";	
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
if(strpos($x_value, "/")>15){
$x_value=replaceString("/","/<br>",$x_value);}}

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


		echo "<a href=?unicode=".$turn."&sort=2&asset=".$u_value."><li style=\"background-color: #0b0c0d;height:200px;width:430px;\"><h2>[ ".$assetnum." ] </h2><div style=\"color:#ccc;\">".$x_value."</div><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p>".number_format($amount,$units)." ".$reisx."</p></a></li>";
		
				}

			//ipfs yes

			else

				{
		
				
			

				echo "<a href=?unicode=".$turn."&sort=2&asset=".$u_value."><li style=\"width:430px;height:200px;\"><h2>[ ".$assetnum." ] </h2><a href=\"https://gotoipfs.com/#path=".$ipfs."\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"><p>".number_format($amount,$units)." ".$reisx."</p></a></li>";
				
			
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



		echo "<a href=?unicode=".$turn."&sort=3&asset=".$add."><li style=\"width:430px;height:150px;\"><h2>[ ".$num." ]</h2><p style=\"font-size:20px;\">".$add."<br><br></p></a></li>";
			
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



$x_value="<h4 style=\"font-size:21px;\">".$x_value."</h4>";

		
			echo "<a href=?&unicode=".$turn."&asset=".$assetlink."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:431px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"><p>".$x."</p></a></li>";

			}

	}

}

*/

//echo "<br><br>&nbsp;&nbsp;<a href=http://onervn.com/search?asset=".$address." >http://onervn.com/search?asset=".$address."</a>&nbsp;<br>";





?>
</ul></div>
</div>
</body>
</html>