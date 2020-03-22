<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>TAG</title>
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

 width:360px;
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

$kpc = new Keva();

$kpc->username=$krpcuser;
$kpc->password=$krpcpass;
$kpc->host=$krpchost;
$kpc->port=$krpcport;

$rpc = new Raven();

$rpc->username=$rrpcuser;
$rpc->password=$rrpcpass;
$rpc->host=$rrpchost;
$rpc->port=$rrpcport;

$_REQ = array_merge($_GET, $_POST);


$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;


if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}


echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-left:0px;padding-left:0px;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;width:0px;\"><a href=index.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"asset\" maxlength=\"34\" placeholder=\"ASSET\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"KAW\"></div></form></div>";

	$arrx=array();

			$totalassx=array();

$tagasset=$_REQ["asset"];

if($webmode==1){$tagasset="-";}



if(!$tagasset){



$agex= $rpc->listaddressgroupings();


		
			
			$error = $rpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}

		


			foreach($agex as $g)

			{
			
			

			$tagcheck= $rpc->listtagsforaddress($g[0][0]);

			
			if(empty($tagcheck)==false){

			foreach($tagcheck as $m){

			$arrx["tag"]=$m;

			$arrx["add"]=$g[0][0];
			
			array_push($totalassx,$arrx);}}

			
					}

	
				}else

					{
			
			$tagcheck= $rpc->listtagsforaddress($_REQ["asset"]);

		

			foreach($tagcheck as $g)

			{

			$arrx["tag"]=$g;

			$arrx["add"]=$_REQ["asset"];
			
			array_push($totalassx,$arrx);
			}

			}	

	$age=$totalassx;

if(!$agex[0][0][0]){$tagadd=$_REQ["asset"];}else{$tagadd=$agex[0][0][0];}


if($webmode==1){$tagadd=$tag_address;}

if($_REQUEST["lang"]=="en" or !$_REQUEST["lang"]){


if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=?lang=".$_REQUEST["lang"]."& >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?lang=".$_REQUEST["lang"]."&unicode=1 >[ TURN-ON ]</a><br>";}}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=/tag.php><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;width:730px;\"><h4>".$tag_address."</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$tagadd."</font></a></li></ul><ul>";

		foreach($age as $xx)

			{

		
$tag=$xx[tag];
$add=$xx[add];
			

		
				$x_value=$tag;

		

				if($turn==1)

					{
						$x_value=str_replace("#","",$x_value);
						$assetlink=$x_value;
						$assettwo=$x_value;
						$x_value=uniworld($x_value,$assetlink,$assettwo);
						$x_value="#".$x_value;
					}

				$x_value=str_replace("U+","",$x_value);

				$ipfs= $rpc->getassetdata($tag);

				if(strlen($ipfs['ipfs'])=="46")

				{

				$messone=" <a href=https://gotoipfs.com/#path=".$ipfs['ipfs'].">".$x_value."</a>";
				}

				if(strlen($ipfs['txid'])=="64")

				{

				$messone=" <a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$ipfs['txid'].">".$x_value."</a>";

		
				}


				if(($ipfs['has_ipfs'])=="0")
				{
				$messone=$x_value;
				}





			echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:40px;width:600px;font-size:70%\"><table><tr><td width=\"200px\" align=left>".$messone."</td><td width=\"400px\" align=left><a href=?lang=".$_REQUEST["lang"]."&unicode=".$turn."&asset=".$add.">".$add."</a></td></tr></table></li>";
			
			}
			
		echo "</ul></div></div>";

	

	









?>

</div>
</body>
</html>