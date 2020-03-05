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

div{border:0;padding:0;}

#door {

margin-top:15px;
  
  font-size: 15px;
  

}

#newworld{

margin-top:100px;
  
  font-size: 15px;
  

}





#tech {

  


text-align: left;
vertical-align:middle;

  border: 0px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  font-size:24px;

width:100%;

 
  
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
                margin-top: 8px;
                margin-bottom: 7px;
				margin-right: 5px;
				margin-left: 5px;
				padding-top:0px;
				padding-left:10px;
				padding-right:2px;
                flex:auto;  
				

            }
#universe {

line-height:10px;
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
error_reporting(0);
include("rpc.php");

$rpc = new Raven();

$kpc = new Keva();

$_REQ = array_merge($_GET, $_POST);




$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;


if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}


echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:8px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php><b>GALAXY</b></a></li></div></form></div>";
	

$txid=$_REQ["txid"];

$cons=$_REQ["space"];
$conk=$_REQ["key"];
$cname=$_REQ["name"];

if(isset($txid) & strlen($txid)=="64")
	
			{

			
			$transaction= $kpc->getrawtransaction($txid,1);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_UNKNOWN') 
						{

					 $cons=$arr[2];
					 $conk=$arr[3];
				
						} 

				 }

			}

			


if(isset($cons) & isset($conk))
	
		{

$cons=hex2bin($cons);
$conk=hex2bin($conk);



		$snewkey=$cons;

		$rname=$_REQ["name"];

		$sinfo=$conk;
		
		$getrtx= $rpc->getassetdata($rname);

		echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";



								$x_value="<h4>".$snewkey."</h4>";

								$value=$sinfo;
								
								$asset=$sinfo;
								
								echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:100px;width:900px;\"><h1>".$snewkey."</h1><br><a href=?name=".$rname.">".$rname."</a></li>";

								

										$valuex=str_replace("\n","<br>",$value);

	

									
						
												echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;line-height:60px;font-size:48px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";
																			
											

							
					echo "</ul></div></div>";	
					exit;
	
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


if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=? >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?unicode=1 >[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:5px;padding-left:15px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=/subscription.php><li style=\"background-color: rgb(0, 79, 74);height:80px;display:block;width:800px;\"><h3>SUBSCRIPTION</h3></a></li>";



if(isset($_REQUEST["asset"]))
{
echo "<a href=/channel.php?&asset=".$_REQUEST["asset"]."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:60px;display:block;\"><h4>".$_REQUEST["asset"]."</h4></a></li>";
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



if(strlen($ipfs)=="64")

			{

			
			
			$transaction= $kpc->getrawtransaction($ipfs,1);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_UNKNOWN') 
						{

					 $title=hex2bin($arr[2]);
					 $asset=hex2bin($arr[3]);
			
				
					} 

			 }






$stitle2=$title;
$stitle="<a href=/subscription.php?space=".bin2hex($title)."&key=".bin2hex($asset)."&name=".$x_value."><font color=ffffff>".$stitle2."</font></a>";



if(isset($cname)){

	if($cname==$x_value){

				
				echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:150px;width:800px;\"><table cellspacing=\"30px\" ><tr><td width=550px align=left><a href=/subscription.php?space=".bin2hex($title)."&key=".bin2hex($asset)."&name=".$x_value."><b><font size=7>".$x_value."</font></b></a></td><td  align=right><font size=6>".$time."</font></td></tr><tr><td align=left><font size=6>".$stitle."</font></td><td   align=right></td></tr></table></li>";
				}
			
				}

				else
					{

				
				echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:150px;width:800px;\"><table cellspacing=\"30px\" ><tr><td width=550px align=left><a href=/subscription.php?space=".bin2hex($title)."&key=".bin2hex($asset)."&name=".$x_value."><b><font size=6>".$x_value."</font></b></a></td><td  align=right><font size=6>".$time."</font></td></tr><tr><td align=left><font size=5>".$stitle."</font></td><td   align=right></td></tr></table></li>";
				}
			

				}

			}

		echo "</ul></div></div>";



	








?>
</ul></div>
</div>
</body>
</html>