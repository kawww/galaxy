<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET SEARCH</title>
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

 width:300px;
 padding-left:5px;

}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 5px 22px;

  height:45px;
    
}

div{margin:5px;border:0;padding:0;}

#door {

margin-top:15px;
  
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
  font-size:26px;

width:800px;

 
  
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
                border: 2px solid #59fbea;
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

line-height:24px;
ont-weight:100px;

font-size: 22px;
position: absolute;
  
}


</style>
		<body>

		<div id="door"  class="crt">
		<form action="" method="post" >
		<div id="tech"  class="crt"><ul><li style="margin-top:20px;height:35px;border: 1px solid #59fbea;width:30px;background-color:black;"><a href="/"><b>GALAXY EXPLORER</b></a></li>
		
		<li  style="border:0px;width:100px;text-align:left;background-color:black;"><input type="text" name="asset" maxlength="31" value="<?php if(isset($_REQUEST["asset"])) {echo strtoupper($_REQUEST["asset"]);} ?>" >
		<input type="hidden" name="one" value="rvn" />
		<input type="submit" value="KAW"></div>
		</form>
		</div>

<div id="universe" class="crt">

<?php




if(isset($_REQUEST["asset"])) {


//check server


include("rpc.php");

$rpc = new Linda();


//rpc

$_REQ = array_merge($_GET, $_POST);

$asset=$_REQ["asset"];

$asset=strtoupper(trim($asset));



$turn=9;
$u=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;

if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}

if(isset($_REQ["sort"])){$sort="sort=1";$sortnum=1;}

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
//all to unicode




if(check_utf8($asset)==true && preg_match('/[A-Za-z]/', $asset)==false && preg_match('/[0-9]/', $asset)==false){

	$asset=utf8_to_unicode($asset); 
	$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; ".trim($_REQ["asset"]);
	$unioff=" <a href=/?asset=".$asset."&unicode=0&u=1&".$sort." >[ TURN-OFF ]</a><br>";
	
	$turn=1;
	
	
	}else{

		$unioff="&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?asset=".$asset."&unicode=1&".$sort." >[ TURN-ON ]</a><br>";

		if(isset($ux) && $ux==1){

			$unioff="&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=/?asset=".$asset."&unicode=2&u=1&".$sort." >[ TURN-ON ]</a><br>";}

		
			}



if(isset($turn) && !isset($ux) && $turn==1)
	
{



$unicode="&nbsp;&nbsp;<font color=#28f428>UNICODE</font>&nbsp; ".$asset;
$unioff=" <a href=/?asset=".$asset."&unicode=0&".$sort." >[ TURN-OFF ]</a><br>";
	
	
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

	
	$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=/?asset=onervn&unicode=1&".$sort." >[ TURN-ON ]</a><br>";
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



echo "&nbsp;&nbsp;&nbsp;<a href=\"/?sort=1&asset=".$address."\">[ SORT ]</a>".$unicode."".$unioff." <br><div id=\"nav\"><ul>";

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
$x_value=replaceString("/","/<br>",$x_value);}

}

if($sortnum<>1)

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

}


if(isset($turn) && $turn==1){



if($unicode!="")

{


$x_value=uniworld($x_value,$address,$asset);


}


}





$x_value=str_replace("U+","",$x_value);


			if(!$ipfs)

				{


			echo "<li style=\"background-color: black;height:180px;\"><h2><a href=/list?asset=".$u_value.">[ ".$assetnum." ] </a></h2>".$x_value."<hr>".number_format($amount,$units)." ".$reisx."  </li>";
		
				}

			//ipfs yes

			else

				{
		
				
			

				echo "<li style=\"height:180px;\"><h2><a href=/list?asset=".$u_value.">[ ".$assetnum." ] </a></h2><a href=\"https://gotoipfs.com/#path=".$ipfs."\" target=_blank>".$x_value."</a><hr>".number_format($amount,$units)." ".$reisx."  </li>";
				
			
				}

	   
			}
				
				}

}

//echo "<br><br>&nbsp;&nbsp;<a href=http://onervn.com/search?asset=".$address." >http://onervn.com/search?asset=".$address."</a>&nbsp;<br>";





?>
</ul></div>
</div>
</body>
</html>