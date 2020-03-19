<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>SYSTEM</title>
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

$blocknext=$_REQ["blocknext"];

if(!$blocknext){

$blocknow=$kpc-> getblockcount();$blocknow=intval($blocknow)+1;}else{$blocknow=intval($blocknext)+1;}


if($webmode==1){

$blockread=$blocknow-$sysweb;}else{

$blockread=$blocknow-$syslocal;}


$blockshow=$blocknow-1;

//block

$arr=array();
$arrx=array();
$totalass=array();

while($blocknow>$blockread)
	
 {

		$blocknow=$blocknow-1;

		$block=$blocknow;


		
		

		$blockhash= $kpc-> getblockhash(intval($block));

	

		$blockdata= $kpc->getblock($blockhash);

			
		
	

		foreach($blockdata['tx'] as $txa)

		{
			
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_PUT') 
								{
								$cona=$arr[1];
								 $cons=$arr[2];
								 $conk=$arr[3];

								$arrx["block"]=$block;
								$arrx["sadd"]=hex2bin($cona);
								$arrx["snewkey"]=hex2bin($cons);
								$arrx["sinfo"]=hex2bin($conk);
								$arrx["txa"]=$txa;

								$arrx["size"]=$transaction['size'];

								array_push($totalass,$arrx);

							


								}
						  }

		}

	

								arsort($totalass);
			
}

echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";

if(count($totalass)==0){
	
	
	echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>NO CONTENTS FOUND IN THESE BLOCKS [ ".$blockshow." ]  - [ ".$blockread." ]</p></li>";

	
	if($webmode==1){



echo "<a href=?blocknext=".$blocknow."><li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>NEXT ".$sysweb."  BLOCK</h3></a></li>";}

else{

echo "<a href=?blocknext=".$blocknow."><li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>NEXT  ".$syslocal."   BLOCK</h3></a></li>";}

exit;
}


foreach ($totalass as $k=>$v) 

							{
							
								extract($v);


$asset = $rpc->getassetdata($snewkey);

if(isset($asset) & $asset['has_ipfs']==1){$snewkey="<a href=subscription.php?txid=".$asset['txid'].">".$snewkey."</a>";}


$x_value=$snewkey;

	$sinfo=str_replace("<script>","< script >",$sinfo);

								$value=$sinfo;
								
								$asset=$sinfo;
								
								

											
									
										$valuex=str_replace("\n","<br>",$value);


			//namespace channel
											if(strlen($value)==34)


							
											{

										
									
											if(!isset($_REQ["sub"])){

											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>".$snewkey."</h3></li>";


											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left><a href=keva.php?asset=".$value."&showall=11>".turnUrlIntoHyperlink($valuex)."</a></p></li>";

												
											echo "<li style=\"background-color: rgb(0, 0, 0);border: 0px solid #000;display:block;height:auto;width:90%;font-size:10px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=right><a href=subscription.php?txid=".$txa.">".$txa."</a>  [ ".$block." ]  < <a href=subscription.php?block=".$block."&sub=".$size.">".$size."</a> > </p></li>";		
											
										
													}



											}
											
											if(strlen($value)<>34)
											
											{

										

											$valuem=substr($value,0,34);

											

											$vmkpc=$kpc->keva_filter($valuem);

			
									

											if(!$vmkpc) 
		
											   {
	
											
														
											

											if(isset($_REQ["sub"]) & $_REQ["sub"]==$size)
														
													
													{

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>".$snewkey."</h3></li>";

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";

													
											echo "<li style=\"background-color: rgb(0, 0, 0);border: 0px solid #000;display:block;height:auto;width:90%;font-size:10px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=right><a href=subscription.php?txid=".$txa.">".$txa."</a>  [ ".$block." ] < <a href=subscription.php?block=".$block."&sub=".$size.">".$size."</a> > </p></li>";		

									
												}

												//no sub tx

										if(!isset($_REQ["sub"])){

											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>".$snewkey."</h3></li>";

												  if(stristr($valuex,"src") == true)
											{
												
												echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>".$valuex."</p></li>";}	  
											

													else


											{echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";}

													
											echo "<li style=\"background-color: rgb(0, 0, 0);border: 0px solid #000;display:block;height:auto;width:90%;font-size:10px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=right><a href=subscription.php?txid=".$txa.">".$txa."</a>  [ ".$block." ] < <a href=subscription.php?block=".$block."&sub=".$size.">".$size."</a> > </p></li>";		

												}

											}

											
										

											else

											{

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>".$snewkey."</h3></li>";


												
										$arr1=explode("\n",$value);
											
										
									
										foreach ($arr1 as $m=>$n) {

											if(strlen($n)>34){


											list($names,$keys)=explode(" ",$n);
												
												
											$listasset= $kpc->keva_get($names,trim($keys));
													
											

											foreach ($listasset as $v) 

													{
			
											extract($v);	
											
											
		
											$valuex=str_replace("\n","<br>",$v);

											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:90%;line-height:40px;font-size:24px;padding-top:30px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";



											
													}




			
													}


			
	
														}

															
											echo "<li style=\"background-color: rgb(0, 0, 0);border: 0px solid #000;display:block;height:auto;width:90%;font-size:10px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=right><a href=subscription.php?txid=".$txa.">".$txa."</a> [ ".$block." ] < <a href=subscription.php?block=".$block."&sub=".$size.">".$size."</a> > </p></li>";	
											}



											}

																	
											

							
					
									
				
								} 


			

				


		

	


if($webmode==1){

echo "<a href=?blocknext=".$blocknow."><li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>NEXT  ".$sysweb."  BLOCK</h3></a></li>";}

else{

echo "<a href=?blocknext=".$blocknow."><li style=\"background-color: rgb(0, 79, 74);display:block;height:60px;width:90%;margin-top:50px;padding-bottom:0px;\"><h3>NEXT  ".$syslocal."   BLOCK</h3></a></li>";}



?>
</ul></div>
</div>
</body>
</html>