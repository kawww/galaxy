<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>CHANNEL</title>
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
zoom:1.15;	
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
  height:36px;
 
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

div{margin:0px;border:0;padding:0;}

	#door {

	margin-top:10px;
  
	font-size: 15px;
  

	}

#newworld

	{

	margin-top:60px;
  
	font-size: 15px;
 
	}





#tech {

  
	margin-left: 0px;
	padding-left: 2px;
	text-align: left;
	vertical-align:middle;
	border: 0px solid #59fbea;
	font-family: coda_regular, arial, helvetica, sans-serif;
	-webkit-appearance: none;
	-webkit-border-radius: 0;
	font-size:24px;

	width:94%;

 
  
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
                
                margin: 0 auto;
			
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

line-height:20px;
ont-weight:60px;
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
error_reporting(0);
include("rpc.php");

$rpc = new Raven();

$rpc->host=$localip;

$_REQ = array_merge($_GET, $_POST);

$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;


if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}


	echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\" class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:18px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"sub\" maxlength=\"30\" placeholder=\"ASSET\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"SUBSCRIBE\"></li></ul></div></form></div>";


if(isset($_REQ["sub"])){ 

$sub=strtoupper(trim($_REQ["sub"]));

$ages= $rpc->subscribetochannel($sub);

}

//broadcast

if(isset($_REQ["txid"]) or isset($_REQ["ipfs"]))
	
	{ 

$assetlist=$rpc->listmyassets();

if(isset($_REQ["ipfs"])){$messc=$_REQ["ipfs"];}

if(isset($_REQ["txid"])){$messc=$_REQ["txid"];}

if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=channel.php?txid=".$_REQ["txid"]."&ipfs=".$_REQ["ipfs"].">[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=channel.php?txid=".$_REQ["txid"]."&ipfs=".$_REQ["ipfs"]."&unicode=1>[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=channel.php><li style=\"background-color: rgb(0, 79, 74);height:90px;display:block;padding-top:0px;\"><h4>CHANNEL</h4></a></li>";




foreach($assetlist as $asset=>$num)

		{

if(stristr($asset,"!"))
	
				{
						
						$assetx=str_replace("!","",$asset);

						$x_value=$assetx;

						$assetlink=$x_value;
						$assettwo=$x_value;

		if($turn==1)

		{
		$x_value=uniworld($x_value,$assetlink,$assettwo);
		}
	$x_value=str_replace("U+","",$x_value);

echo "<a href=subscription.php?&asset=".$assetx."&uname=".$x_value."&txid=".$_REQ["txid"]."&ipfs=".$_REQ["ipfs"]."><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;\"><h4>".$x_value."</h4></a></li>";
								

						}

		}

		exit;
	}

//subscribe all

if(isset($_REQ["mode"])){ 

	if($_REQ["mode"]=="all"){

$assetlist=$rpc->listmyassets();

foreach($assetlist as $asset=>$num){

$ages= $rpc->subscribetochannel($asset);

}}

if($_REQ["mode"]=="3")

{$ages= $rpc->unsubscribefromchannel($_REQ["asset"]);$url = "channel.php"; Header("Location:$url"); }


}





	
	


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








if(isset($_REQUEST["asset"]))
{

if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=?&asset=".$_REQUEST["asset"]." >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?unicode=1&asset=".$_REQUEST["asset"]." >[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=channel.php><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;padding-top:0px;\"><h4>CHANNEL</h4></a></li></ul>";

$x_value=$_REQ["asset"];

		

		$assetlink=$x_value;
		$assettwo=$x_value;


		if($turn==1)

		{
		$x_value=uniworld($x_value,$assetlink,$assettwo);
		}

echo "<ul><a href=channel.php?&asset=".$_REQUEST["asset"]."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;\"><h4>".$x_value."</h4></a></li>";
if($unsub=="on"){
echo "<a href=channel.php?&asset=".$_REQ["asset"]."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;\"><h4>UNSUBSCRIBE</h4></a></li></ul><ul>";}



}else{

if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=? >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?unicode=1>[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=channel.php><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;padding-top:0px;\"><h4>CHANNEL</h4></a></li></ul>";


echo "<ul><a href=channel.php?mode=all><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;padding-top:0px;\"><h4>SUBSCRIBE ALL ASSETS</h4></a></li></ul><ul>";

	$agec= $rpc->viewallmessagechannels();


		foreach($agec as $cv=>$c)

			{

		$c=str_replace("!","",$c);


		$x_value=$c;

		$assetlink=$x_value;
		$assettwo=$x_value;


		if($turn==1)

		{
		$x_value=uniworld($x_value,$assetlink,$assettwo);
		}


		$x_value=str_replace("U+","",$x_value);


		echo "<a href=channel.php?&asset=".$c."&mode=2&unicode=".$_REQ["unicode"]."><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;\"><h4>".$x_value."</h4></a></li>";
			}


	

	}


		echo "</ul><ul>";


		foreach($age as $xx_value=>$xx)

			{

		extract($xx);

		$name=str_replace("!","",$name);


	

		$x_value=$name;

		

		$assetlink=$x_value;
		$assettwo=$x_value;


		if($turn==1)

		{
		$x_value=uniworld($x_value,$assetlink,$assettwo);
		}


		$x_value=str_replace("U+","",$x_value);


		if(strlen($ipfs)=="46")

			{

				$messone="<a href=https://gotoipfs.com/#path=".$ipfs.">IPFS</a>";
			}
		if(strlen($ipfs)=="64")
			{
			$messone="<a href=subscription.php?txid=".$ipfs.">TXID</a>";
			}



	if(isset($_REQUEST["asset"]) & $_REQUEST["asset"]==$name) {


		echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:80px;font-size:70%\"><table cellspacing=\"10px\"><tr><td width=\"140px\" align=right>".$time."</td><td align=left><a href=?&unicode=".$turn."&asset=".$x_value."&mode=2><b><font size=4>".$x_value."</font></b></a></td></tr><tr><td width=\"140px\" align=right>".$messone."</td><td align=left><font size=2>".$ipfs."</font></td></tr></table></li>";
			
				}

	if(!isset($_REQUEST["asset"])) {

				
				echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:80px;width:1000px;font-size:70%\"><table cellspacing=\"10px\"><tr><td width=\"140px\" align=right>".$time."</td><td align=left><a href=?&unicode=".$turn."&asset=".$name."&mode=2&unicode=".$_REQ["unicode"]."><b><font size=4>".$x_value."</font></b></a></td></tr><tr><td width=\"140px\"  align=right>".$messone."</td><td align=left>".$ipfs."</td></tr></table></li>";
				
				}
			}

		
		
		echo "</ul></div></div>";

	

	








?>

</body>
</html>