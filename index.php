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

a:hover { color:grey; }

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
  height:30px;
 
  margin-top: 10px;
}

input[type="text"] {
  background-color: rgb(11, 12, 13);
  color: #ddd;
 margin-left: 13px;
 width:278px;
}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 1px 15px;
  height:34px;
}

div{margin:5px;border:0;padding:0;}

#door {


    
  font-size: 15px;
  

}



#universe {

line-height:20px;


font-size: 18px;
position: absolute;
  
}

#tech {
background-color: rgb(0, 79, 74);
margin-left: 13px;
padding-left: 3px;
text-align: center;
vertical-align:middle;
line-height:50px;
  border: 1px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  font-size:26px;

width:275px;

 
  
}

@keyframes flicker {
  0% {
    opacity: 0.27861;
  }
  5% {
    opacity: 0.34769;
  }
  10% {
    opacity: 0.23604;
  }
  15% {
    opacity: 0.90626;
  }
  20% {
    opacity: 0.18128;
  }
  25% {
    opacity: 0.83891;
  }
  30% {
    opacity: 0.65583;
  }
  35% {
    opacity: 0.67807;
  }
  40% {
    opacity: 0.26559;
  }
  45% {
    opacity: 0.84693;
  }
  50% {
    opacity: 0.96019;
  }
  55% {
    opacity: 0.08594;
  }
  60% {
    opacity: 0.20313;
  }
  65% {
    opacity: 0.71988;
  }
  70% {
    opacity: 0.53455;
  }
  75% {
    opacity: 0.37288;
  }
  80% {
    opacity: 0.71428;
  }
  85% {
    opacity: 0.70419;
  }
  90% {
    opacity: 0.7003;
  }
  95% {
    opacity: 0.36108;
  }
  100% {
    opacity: 0.24387;
  }
}
@keyframes textShadow {
  0% {
    text-shadow: 0.4389924193300864px 0 1px rgba(0,30,255,0.5), -0.4389924193300864px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  5% {
    text-shadow: 2.7928974010788217px 0 1px rgba(0,30,255,0.5), -2.7928974010788217px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  10% {
    text-shadow: 0.02956275843481219px 0 1px rgba(0,30,255,0.5), -0.02956275843481219px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  15% {
    text-shadow: 0.40218538552878136px 0 1px rgba(0,30,255,0.5), -0.40218538552878136px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  20% {
    text-shadow: 3.4794037899852017px 0 1px rgba(0,30,255,0.5), -3.4794037899852017px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  25% {
    text-shadow: 1.6125630401149584px 0 1px rgba(0,30,255,0.5), -1.6125630401149584px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  30% {
    text-shadow: 0.7015590085143956px 0 1px rgba(0,30,255,0.5), -0.7015590085143956px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  35% {
    text-shadow: 3.896914047650351px 0 1px rgba(0,30,255,0.5), -3.896914047650351px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  40% {
    text-shadow: 3.870905614848819px 0 1px rgba(0,30,255,0.5), -3.870905614848819px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  45% {
    text-shadow: 2.231056963361899px 0 1px rgba(0,30,255,0.5), -2.231056963361899px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  50% {
    text-shadow: 0.08084290417898504px 0 1px rgba(0,30,255,0.5), -0.08084290417898504px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  55% {
    text-shadow: 2.3758461067427543px 0 1px rgba(0,30,255,0.5), -2.3758461067427543px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  60% {
    text-shadow: 2.202193051050636px 0 1px rgba(0,30,255,0.5), -2.202193051050636px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  65% {
    text-shadow: 2.8638780614874975px 0 1px rgba(0,30,255,0.5), -2.8638780614874975px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  70% {
    text-shadow: 0.48874025155497314px 0 1px rgba(0,30,255,0.5), -0.48874025155497314px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  75% {
    text-shadow: 1.8948491305757957px 0 1px rgba(0,30,255,0.5), -1.8948491305757957px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  80% {
    text-shadow: 0.0833037308038857px 0 1px rgba(0,30,255,0.5), -0.0833037308038857px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  85% {
    text-shadow: 0.09769827255241735px 0 1px rgba(0,30,255,0.5), -0.09769827255241735px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  90% {
    text-shadow: 3.443339761481782px 0 1px rgba(0,30,255,0.5), -3.443339761481782px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  95% {
    text-shadow: 2.1841838852799786px 0 1px rgba(0,30,255,0.5), -2.1841838852799786px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
  100% {
    text-shadow: 2.6208764473832513px 0 1px rgba(0,30,255,0.5), -2.6208764473832513px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
}
.crt::after {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(18, 16, 16, 0.1);
  opacity: 0;
  z-index: 2;
  pointer-events: none;
  animation: flicker 0.00s infinite;
}
.crt::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
  z-index: 2;
  background-size: 100% 2px, 3px 100%;
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
                width: 260px;
				height:50px;
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


</style>
		<body>

		<div id="door"  class="crt">
		<form action="" method="post" >
		<div id="tech"  class="crt"><a href="/"><b>GALAXY EXPLORER</b></a></div>
		
		<input type="text" name="asset" maxlength="31">
		<input type="hidden" name="one" value="rvn" />
		<input type="submit" value="KAW">
		</form>
		</div>

<div id="universe" class="crt">

<?php


function replaceString($search,$replace,$content,$limit=1){
    if(is_array($search)){
        foreach ($search as $k=>$v){
            $search[$k]='`'.preg_quote($search[$k],'`').'`';
        }
    }else{
        $search='`'.preg_quote($search,'`').'`';
    }
 
    $content=preg_replace("/alt=([^ >]+)/is",'',$content);
    return preg_replace($search,$replace,$content,$limit);
}





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

if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}



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
	$unicode="<br>&nbsp;&nbsp;<font color=green>Unicode</font>: ".trim($_REQ["asset"]);
	$unioff=" <a href=/?asset=".$asset."&unicode=0&u=1 >[ TURN-OFF ]</a><br>";
	
	$turn=1;
	
	
	}else{

		$unioff="<br>&nbsp;&nbsp;<font color=red>Unicode</font> <a href=?asset=".$asset."&unicode=1 >[ TURN-ON ]</a><br>";

		if(isset($ux) && $ux==1){

			$unioff="<br>&nbsp;&nbsp;<font color=red>Unicode</font> <a href=/?asset=".$asset."&unicode=2&u=1 >[ TURN-ON ]</a><br>";}

		
			}



if(isset($turn) && !isset($ux) && $turn==1)
	
{



$unicode="<br>&nbsp;&nbsp;<font color=#28f428>Unicode</font>: ".$asset;
$unioff=" <a href=/?asset=".$asset."&unicode=0 >[ TURN-OFF ]</a><br>";
	
	
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

	
	$unicode="<br>&nbsp;&nbsp;<font color=red>Unicode</font> <a href=/?asset=onervn&unicode=1 >[ TURN-ON ]</a><br>";
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



echo "<p>&nbsp;&nbsp;<font color=red>".$address."</font>&nbsp;<a href=/search/sort.php?asset=".$address."> [ Sort ]</a> <br>&nbsp;&nbsp;".$unicode." ".$unioff."</p><div id=\"nav\"><ul>";

//get search data

$age=$rawtransaction;


foreach($age as $x=>$x_value)

	{

		if(stristr($x_value,$address) == true)

			{

$info=$rpc->getassetdata($x_value);


if(isset($turn) && $turn==1){



if($unicode!="")

{




$x_value=str_replace("U.","U+",$x_value);
				
				$x_value = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $x_value), ENT_NOQUOTES, 'UTF-8');

				$x_value=str_replace("U+","U.",$x_value);
				



if(strlen($x_value)==strlen($address)){
$assetsplit=str_split($asset,4);

foreach($assetsplit as $assety)
	{
$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);}
}
else
	{
if(!preg_match ( '/[\Q~!@#$%^&*()+-_=.:?<>\E]/', $x_value ))
					{
	
	$assetsplit=str_split($x_value,4);

foreach($assetsplit as $assety)
	
{
$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);
	

		}
	}
	else{
			
			//sub asset

		if(preg_match ( "'/'", $x_value)){

			list($aleft,$aright)=explode("/",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}

		//#asset

		if(preg_match ( "'#'", $x_value) ){

			list($aleft,$aright)=explode("#",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}


		//ID_and Lang

		

		if(preg_match ( "'_'", $x_value) ){

			list($aleft,$aright)=explode("_",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}



		}


								//else
if (!(strlen($asset) % 4) && strlen($asset)){
							$assetsplit=str_split($asset,4);

							foreach($assetsplit as $assety)
								{
								$assetx="U+".$assety."";
								$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);
								}}
	}
 }
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

			if(!$ipfs_hash)

				{
	   			echo "<li>".$x_value."</li>";		
				}

			//ipfs yes

			else

				{

				echo "<li><a href=\"https://gotoipfs.com/#path=".$ipfs_hash."\" target=_blank>".$x_value."</a></li>";		
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