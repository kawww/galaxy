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

$_REQ = array_merge($_GET, $_POST);//iotstat


$comm=trim($_REQ["username"]); 


//coin

if($comm=="KEVACOIN" or $comm=="kevacoin"){

	header("location:/shell/index.php?coin=KEVACOIN");

}

if($comm=="RAVENCOIN" or $comm=="ravencoin"){

	header("location:/shell/index.php5570511?coin=RAVENCOIN");

}


//cls


if($comm=="cls" or $comm=="clear"){

header("location:/shell");

}

//cls


if($comm=="exit"){

echo "<meta http-equiv=\"refresh\" content=\"0.1;url=/\">";

}

//os


if($comm=="os"){

header("location:/os");

}





$coin=$_REQ["coin"];

//ravencoin



if($coin=="RAVENCOIN"){

//buy

$arr=array();

$arr=explode(" ",$comm);

if($arr[0]=="buy"){

			if($arr[2]=="bitcoin" or $arr[2]=="btc")
				
						{
						$pric=12138*$arr[1];
						}

			if($arr[2]=="ethereum" or $arr[2]=="eth")
				
						{
						$pric=355*$arr[1];
						}

			if($arr[2]=="monero" or $arr[2]=="xmr")
				
						{
						$pric=97*$arr[1];
						}
			if($arr[2]=="gold")
				
						{
						$pric=1997*$arr[1];
						}
			if($arr[2]=="tesla")
				
						{
						$pric=1523*$arr[1];
						}

			if($arr[2]=="apple")
				
						{
						$pric=562*$arr[1];
						}
			if($arr[2]=="iphone")
				
						{
						$pric=9997*$arr[1];
						}
			if($arr[2]=="cola")
				
						{
						$pric=1*$arr[1];
						}
			if($arr[2]=="model9")
				
						{
						$pric=57562*$arr[1];
						}


	echo "<table style=\"color:white\">";
	echo "<tr><td width=\"150px\">".$arr[2]."</td><td align=right width=\"50px\">".$arr[1]."</td><td align=right width=\"200px\">".$pric." RVN</td></tr>";

	echo "</table>";

	echo "<br><font color=yellow>SYSTEM: ".$arr[1]." ".$arr[2]." Recieved.</font>";
    echo "<br><font size=1>Txid:511e7bc10cfa631054b83f82c2eea42a383<br>a6ac644a2916097a4540df7e8713c</font>";
	echo "<br><br>(This is demo for fun)";

	}







//getinfo


if($comm=="getinfo"){

$run= $rpc->getinfo();

foreach($run as $one=>$two)
	{
	if($one=="deprecation-warning"){continue;}
		echo $one.":".$two."<br>";

	}
}


//getassetdata

$arr=array();


$arr=explode(" ",$comm);

if($arr[0]=="getassetdata" or $arr[0]=="check" or $arr[0]=="vi"){

	$arr[1]=trim(strtoupper($arr[1]));

$run= $rpc->getassetdata($arr[1]);
echo "<table>";
foreach($run as $one=>$two)

	{


	if(strlen($two)=="46")

			{

				$two="<font size=1 style=\"word-break:break-all;\"><a href=\"".$ipfscon."".$two."\">".$two."</a></font>";
			}
	if(strlen($two)=="64")
			{
			$two="<font size=1 style=\"word-break:break-all;\"><a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$two.">".$two."</a></font>";
			}

echo "<tr><td width=\"200px\">".$one."</td><td align=left width=\"200px\">".$two."</td></tr>";

	}
echo "</table>";
}


//kaw


if($comm=="kaw"){


echo "<img src=\"https://ipfs.globalupload.io/QmdjcA9VNBU8x27yaEXfAoUHxcS8nhCs6G9e1FLrjTfVWG\">";
echo "<br><br>kawwwwwwwwwwwwwww!kaaawwww!";
}


//listmyassets


if($comm=="listmyassets" or $comm=="dir" or $comm=="ls"){

$run= $rpc->listmyassets();
echo "<table>";
foreach($run as $one=>$two)

	{
$getdata= $rpc->getassetdata($one);
if($getdata["has_ipfs"]=="0"){$one="<font color=white>".$one."</font>";$two="<font color=white>".$two."</font>";}
else
		{

	if(isset($getdata["ipfs_hash"]))

			{
				
				$one="<a href=\"".$ipfscon."".$getdata["ipfs_hash"]."\">".$one."</a>";
			}
	if(isset($getdata["txid"]))
			{
			$one="<a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$getdata["txid"].">".$one."</a>";
			}
		
		$two="<font color=\"#FFDD55 \">".$two."<font>";
		
		}
		echo "<tr><td width=\"200px\">".$one."</td><td align=right width=\"200px\">".$two."</td></tr>";
	}

	$getbalr= $rpc->getbalance();
	echo "<tr><td width=\"200px\"><font color=white>RAVENCOIN</font></td><td align=right width=\"200px\"><font color=white>".$getbalr."</font></td></tr>";
	
echo "</table>";
}


//market

if($comm=="market"){

	echo "<table style=\"color:white\">";
	echo "<tr><td width=\"200px\">Bitcoin</td><td align=right width=\"200px\">12138 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Ethereum</td><td align=right width=\"200px\">355 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Monero</td><td align=right width=\"200px\">97 RVN</td></tr>";
	echo "</table>";

	echo "<table style=\"color:#ffdd55\">";
	echo "<tr><td width=\"200px\">Gold</td><td align=right width=\"200px\">1997 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Tesla</td><td align=right width=\"200px\">1523 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Apple</td><td align=right width=\"200px\">562 RVN</td></tr>";
	echo "</table>";
	
	echo "<table style=\"color:#00ffff\">";
	echo "<tr><td width=\"200px\">Iphone (Duo)</td><td align=right width=\"200px\">9997 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Cola (1.5L)</td><td align=right width=\"200px\">1 RVN</td></tr>";
	echo "<tr><td width=\"200px\">Model9</td><td align=right width=\"200px\">57562 RVN</td></tr>";
	echo "</table>";
	
	
	echo "<br>(This is demo for fun)";

}

//open ipfs/txid

$arr=array();

$arr=explode(" ",$comm);

if($arr[0]=="open" or $arr[0]=="run"){

	$arr[1]=trim(strtoupper($arr[1]));

$run= $rpc->getassetdata($arr[1]);

foreach($run as $one=>$two)

	{


	if(strlen($two)=="46")

				{
				
				$ctwo=$two;	

				$two="<font size=1 style=\"word-break:break-all;\"><a href=\"".$ipfscon."".$two."\">".$two."</a><br>";

				//cate

				if($ctwo=="QmbAbFPTXM19EQU7yKMVLrF1trkgLckBna9C8nw3kmfXzh")

				{$two="<font size=1 style=\"word-break:break-all;\"><img src=\"https://ipfs.globalupload.io/QmbAbFPTXM19EQU7yKMVLrF1trkgLckBna9C8nw3kmfXzh\" width=\"350px\"><br><a href=\"".$ipfscon."".$ctwo."\">".$ctwo."</a></font>";
				}
				
				//applause

				if($ctwo=="QmeqzKafPJyEoQQ26rn5TH3dTCuZwaDDjs4jPje5bdG5TE")

				{$two="<font size=1 style=\"word-break:break-all;\"><img src=\"https://ipfs.globalupload.io/QmeqzKafPJyEoQQ26rn5TH3dTCuZwaDDjs4jPje5bdG5TE\" width=\"350px\"><br><a href=\"".$ipfscon."".$ctwo."\">".$ctwo."</a></font>";
				}

				//pioneer true internet

				if($ctwo=="QmRigo45XkVR8VZfiKYuYn9P1QVsKVNPZhaDCRzTekKiWt")

				{$two="<font size=3 style=\"word-break:break-all;\"><br>In fact, the digitalization and decentralization of crypto assets are a means to an end.<br><br>There are absolutely no intermediaries between you and your money&datas.<br><br>Indeed, owning crypto assets is akin to holding gold bullion bars or coins. As long as you store your crypto in a wallet you own, nobody has access to it other than you.<br><br>That's the real innovation.<br><br>That's true internet.<br><br>Asset: PIONEER/TRUE_INTERNET<br><br>Get it on: RVN_GIVEAWAY/GAME_OF_JUNE.2019</font>";
				}

			
			}
	if(strlen($two)=="64")
			{
			$two="<a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$two.">".$two."</a>";
			}



	}
	echo $two;

}


//sell

$arr=array();

$arr=explode(" ",$comm);

if($arr[0]=="sell"){

			if($arr[2]=="bitcoin" or $arr[2]=="btc")
				
						{
						$pric=12138*$arr[1];
						}

			if($arr[2]=="ethereum" or $arr[2]=="eth")
				
						{
						$pric=355*$arr[1];
						}

			if($arr[2]=="monero" or $arr[2]=="xmr")
				
						{
						$pric=97*$arr[1];
						}
			if($arr[2]=="gold")
				
						{
						$pric=1997*$arr[1];
						}
			if($arr[2]=="tesla")
				
						{
						$pric=1523*$arr[1];
						}

			if($arr[2]=="apple")
				
						{
						$pric=562*$arr[1];
						}
			if($arr[2]=="iphone")
				
						{
						$pric=9997*$arr[1];
						}
			if($arr[2]=="cola")
				
						{
						$pric=1*$arr[1];
						}
			if($arr[2]=="model9")
				
						{
						$pric=57562*$arr[1];
						}


	echo "<table style=\"color:white\">";
	echo "<tr><td width=\"150px\">".$arr[2]."</td><td align=right width=\"50px\">".$arr[1]."</td><td align=right width=\"200px\">".$pric." RVN</td></tr>";

	echo "</table>";

	echo "<br><font color=yellow>SYSTEM: ".$pric." RVN Recieved.</font>";
    echo "<br><font size=1>Txid:511e7bc10cfa631054b83f82c2eea42a383<br>a6ac644a2916097a4540df7e8713c</font>";
	echo "<br><br>(This is demo for fun)";

	}
}

//ravencoin 

//kevacoin

if($coin=="KEVACOIN"){

$arr=array();

$arr=explode(" ",$comm);


//blocknum


if($comm=="block"){

$run= $kpc->getblockcount();


		echo $run;


}

if($arr[0]=="block"){

	$run= $kpc->getblockcount();
	
	if($arr[1]>$run){
	
	$time=($arr[1]-$run)*2/60;
	$day=$time/24;

	echo "BLOCK ".$run;
	echo "<br>BLOCK ".$arr[1];
	echo "<br><br><font color=white>".intval($day)." Days (".intval($time)." hours)</font>";
	
	}else{
	
	$blockhash= $kpc-> getblockhash(intval($arr[1]));

	

		$blockdata= $kpc->getblock($blockhash);

		foreach($blockdata['tx'] as $txa)
		{
			
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arrb = explode(' ', $op_return); 

					if($arrb[0] == 'OP_KEVA_PUT') 
								{

								 $cona=$arrb[1];
								 $cons=$arrb[2];
								 $conk=$arrb[3];
								 $sadd=$cona;
								 $snewkey=hex2bin($cons);
								 $sinfo=hex2bin($conk);

								  $kadd=$vout["scriptPubKey"]["addresses"][0];
								  $asset=Base58Check::encode( $cona, false , 0 , false);

								  $namespace= $kpc->keva_get($asset,"_KEVA_NS_");

									$title=bin2hex($namespace['value']);

								  echo "<li style=\"display:block;height:auto;width:350px;\"><h2>".$snewkey."</h2><font color=white><p align=left>".turnUrlIntoHyperlink($sinfo)."</p></font><p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$transaction['time'])." BLOCK ".$arr[1]."</p></li>";

						
								}}}
	
	}



}


//getinfo


if($comm=="getinfo"){

$run= $kpc->get_info();

foreach($run as $one=>$two)
	{
	if($one=="deprecation-warning"){continue;}
		echo $one.":".$two."<br>";

	}
}



//open



if($arr[0]=="open"){

			if(strlen($arr[1])=="34")
				
						{

						$asset=$arr[1];

						$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);

						header("location:/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no&shell=1");
						}

				if(is_numeric($arr[1])){

						$blength=substr($arr[1] , 0 , 1);
							$block=substr($arr[1] , 1 , $blength);
								$btxn=$blength+1;
								$btx=substr($arr[1] , $btxn);




									$blockhash= $kpc->getblockhash(intval($block));

									$blockdata= $kpc->getblock($blockhash);

						$txa=$blockdata['tx'][$btx];
				
					$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arrb = explode(' ', $op_return); 

					if($arrb[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arrb[0];
								 $cons=$arrb[1];
								 $conk=$arrb[2];

								}
						  }
				
				$asset=Base58Check::encode( $cons, false , 0 , false);

				$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);

						

						header("location:/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no&shell=1");
			}



	

	}



//number


if(is_numeric($comm)){

$blength=substr($comm , 0 , 1);
$block=substr($comm , 1 , $blength);
$btxn=$blength+1;
$btx=substr($comm , $btxn);




$blockhash= $kpc->getblockhash(intval($block));

$blockdata= $kpc->getblock($blockhash);

$txa=$blockdata['tx'][$btx];
				
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=$arr[2];
								

								}
						  }
				
				$asset=Base58Check::encode( $cons, false , 0 , false);

				$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);

						

						header("location:/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no&shell=1");
			}


//number fingerprint

if(is_numeric($arr[0]) & $arr[1]<>""){

						$blength=substr($arr[0] , 0 , 1);
							$block=substr($arr[0] , 1 , $blength);
								$btxn=$blength+1;
								$btx=substr($arr[0] , $btxn);




									$blockhash= $kpc->getblockhash(intval($block));

									$blockdata= $kpc->getblock($blockhash);

						$txa=$blockdata['tx'][$btx];

						
				
					$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arrb = explode(' ', $op_return); 

					if($arrb[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arrb[0];
								 $cons=$arrb[1];
								 $conk=$arrb[2];
								 $cond=$vout["scriptPubKey"]["addresses"][0];

								}
						  }
				
				$asset=Base58Check::encode( $cons, false , 0 , false);

				$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);

						$keyck=strip_tags(substr(str_replace($arr[0],"",$comm),1));

						

				$kvalue= $kpc->keva_get($asset,$keyck);

			



				echo $asset;

				echo "<br>".$cond;

				if($kvalue['value']<>""){
				
				
							//comment
		
								 if(stristr($kvalue['value'],"::") == true)
									{
									
										$commtool=explode('::', $kvalue['value']);

										$value=$commtool[0];

										if(strlen(trim(strip_tags($commtool[1]))) == 34)
												 {
											      $commentadd=trim(strip_tags($commtool[1]));

												 
													}


							

									    foreach ($commtool as $tool) 

											{

											 if(stristr($tool,"RAVENCOIN_COMMENT_ADDRESS") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("RAVENCOIN_COMMENT_ADDRESS:","",$tool)));
													}
											if(stristr($tool,"rvnkaw") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("rvnkaw:","",$tool)));
													}

													
											
											
											
											}

									}



				$transaction= $kpc->getrawtransaction($kvalue['txid'],1);

				echo "<li style=\"display:block;height:auto;width:350px;\"><h2>".$kvalue['key']."</h2><font color=white><p align=left>".turnUrlIntoHyperlink($kvalue['value'])."</p></font>";

				if($commentadd<>""){


				echo "</li><li style=\"display:block;height:auto;width:350px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
			$giftasset=$rpc->listtagsforaddress($commentadd);

			foreach($giftasset as $gift=>$giftn)

			{

				//$assetinfo = $rpc->getassetdata($gift);

				$gift=str_replace("#","",$giftn);

				$gift_value=$gift;

				$assetlink=$gift_value;
				$assettwo=$gift_value;


		
				$gift_value=uniworld($gift_value,$assetlink,$assettwo);
			

				$gift_value=str_replace("U+","",$gift_value);

				$giftn=$gift_value;
				
				$giftn=str_replace("_"," ",$giftn);

/*

				if(strlen($assetinfo["txid"])==64){$giftlink="subscription.php?lang=".$_REQUEST["lang"]."&txid=".$assetinfo["txid"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				*/

				$giftlink="asset.php?lang=&unicode=0&sort=1&asset=".$gift_value;

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#888;color:#eee;height:30px\">&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "</p></li>";
			
						echo "<li style=\"display:block;height:auto;width:350px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
			$giftasset=$rpc->listassetbalancesbyaddress($commentadd);

			foreach($giftasset as $gift=>$giftn)

			{

				$assetinfo = $rpc->getassetdata($gift);

				$gift_value=$gift;

				$assetlink=$gift_value;
				$assettwo=$gift_value;


		
				$gift_value=uniworld($gift_value,$assetlink,$assettwo);
			

				$gift_value=str_replace("U+","",$gift_value);

				$gift_value=str_replace("_"," ",$gift_value);

				if(strlen($assetinfo["txid"])==64){$giftlink="subscription.php?lang=".$_REQUEST["lang"]."&txid=".$assetinfo["txid"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#16f516;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#00b271;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#ffffff;color:#eee;\">&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "&nbsp;&nbsp;</p><p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$transaction['time'])." BLOCK ".$kvalue['height']." <a href=/subscription.php?lang=&txid=".$kvalue['txid']."  target=_blank>TxID</a></p></li>";
				
				echo "<hr><font size=1>The content support blockchain signature/assets powered by ravencoin. The address is </font>".$commentadd."<br>";
				
				
				
				
				
				
				}

				else { echo "<p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$transaction['time'])." BLOCK ".$kvalue['height']." <a href=/subscription.php?lang=&txid=".$kvalue['txid']."  target=_blank>TxID</a></p></li>";}
			
				}else{
				
				$info= $kpc->keva_filter($asset,"",360000);

				foreach($info as $x_value=>$x)

						{
				
						extract($x);

						If($height==$arr[1]){

							//comment
		
								 if(stristr($value,"::") == true)
									{
									
										$commtool=explode('::', $value);

										$value=$commtool[0];

										if(strlen(trim(strip_tags($commtool[1]))) == 34)
												 {
											      $commentadd=trim(strip_tags($commtool[1]));

												 
													}


							

									    foreach ($commtool as $tool) 

											{

											 if(stristr($tool,"RAVENCOIN_COMMENT_ADDRESS") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("RAVENCOIN_COMMENT_ADDRESS:","",$tool)));
													}
											if(stristr($tool,"rvnkaw") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("rvnkaw:","",$tool)));
													}

													
											
											
											
											}

									}


							
							$transaction= $kpc->getrawtransaction($txid,1);
							
							echo "<li style=\"display:block;height:auto;width:350px;\"><h2>".$key."</h2><font color=white><p align=left>".turnUrlIntoHyperlink($value)."</p></font>";
							
							if($commentadd<>""){


				echo "</li><li style=\"display:block;height:auto;width:350px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
			$giftasset=$rpc->listtagsforaddress($commentadd);

			foreach($giftasset as $gift=>$giftn)

			{

				//$assetinfo = $rpc->getassetdata($gift);

				$gift=str_replace("#","",$giftn);

				$gift_value=$gift;

				$assetlink=$gift_value;
				$assettwo=$gift_value;


		
				$gift_value=uniworld($gift_value,$assetlink,$assettwo);
			

				$gift_value=str_replace("U+","",$gift_value);

				$giftn=$gift_value;
				
				$giftn=str_replace("_"," ",$giftn);

/*

				if(strlen($assetinfo["txid"])==64){$giftlink="subscription.php?lang=".$_REQUEST["lang"]."&txid=".$assetinfo["txid"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				*/

				$giftlink="asset.php?lang=&unicode=0&sort=1&asset=".$gift_value;

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#888;color:#eee;height:30px\">&nbsp;&nbsp;<font color=\"#ffcc00\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "</p></li>";
			
						echo "<li style=\"display:block;height:auto;width:350px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
			$giftasset=$rpc->listassetbalancesbyaddress($commentadd);

			foreach($giftasset as $gift=>$giftn)

			{

				$assetinfo = $rpc->getassetdata($gift);

				$gift_value=$gift;

				$assetlink=$gift_value;
				$assettwo=$gift_value;


		
				$gift_value=uniworld($gift_value,$assetlink,$assettwo);
			

				$gift_value=str_replace("U+","",$gift_value);

				$gift_value=str_replace("_"," ",$gift_value);

				if(strlen($assetinfo["txid"])==64){$giftlink="subscription.php?lang=".$_REQUEST["lang"]."&txid=".$assetinfo["txid"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#16f516;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#00b271;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#ffffff;color:#eee;\">&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "&nbsp;&nbsp;</p><p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$transaction['time'])." BLOCK ".$height."  <a href=/subscription.php?lang=&txid=".$txid." target=_blank>TxID</a></p></li>";
				
				echo "<hr><font size=1>The content support blockchain signature/assets powered by ravencoin. The address is </font>".$commentadd."<br>";
				
				
				
				
				
				
				}else {

				echo "<p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$transaction['time'])." BLOCK ".$height."  <a href=/subscription.php?lang=&txid=".$txid." target=_blank>TxID</a></p></li>";}
							
							
							}

						}
				
				
				}



						

						
			}

//namespace

if(strlen($comm)=="34" & !ctype_space($comm))
				
						{
if(substr($comm,0,1)=="V"){

	$forfree=$comm;

$checkaddress= $kpc->listtransactions("credit",100);

$listaccount = $kpc->listaccounts();

if($listaccount['credit']<1){echo "NO CREDIT AVAILABLE, PLEASE WAIT NEXT TIME ".$listaccount['credit'];exit;}

$ok=0;

		$farr=array();
		$ftotal=array();

		foreach($checkaddress as $freetx)

			{
			
			extract($freetx);

			

			$farr["fcon"]=$confirmations;
			$farr["fadd"]=$address;
		
			array_push($ftotal,$farr);

			}


			asort($ftotal);

		foreach($ftotal as $findadd){




									
						if($findadd['fadd']==$forfree)

										{
							
										

										if($findadd['fcon']>30)

											{

										$age= $kpc->sendfrom("credit",$forfree,$credit);

										echo "GET 0.1 KVA OK!";



										exit;

											}

										else
								
											{ 

										$left=30-$findadd['fcon'];
		
									
										echo "PLEASE WAIT ".$left." BLOCKS (2min/block)";
										
										exit;

											}

										}
										else


										{

											$ok=9;
										}
										
									}
										if($ok=9)
											
											{$age= $kpc->sendfrom("credit",$forfree,"0.1");
											
										echo "GET 0.1 KVA OK!";
											}


	}else{
						$asset=$comm;

						$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);

						header("location:/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no&shell=1");

						}
					}



//txid

if(strlen($comm)=="64" & !ctype_space($comm))
				
						{

					
						$txa=$comm;
				
						$transaction= $kpc->getrawtransaction($txa,1);

						foreach($transaction['vout'] as $vout)
	   
						  {

						$op_return = $vout["scriptPubKey"]["asm"]; 

				
						$arr = explode(' ', $op_return); 

						if($arr[0] == 'OP_KEVA_PUT') 
								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=hex2bin($arr[2]);
								 $conv=hex2bin($arr[3]);
								 $ctime=$transaction["time"];
								 $block= $kpc->getblockheaderbyhash($transaction["blockhash"]);

								}
						  }

				$asset=Base58Check::encode( $cons, false , 0 , false);

				echo $asset;

				$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

						$title=bin2hex($namespace['value']);


				echo "<li style=\"display:block;height:auto;width:350px;\"><h2>".$conk."</h2><font color=white><p align=left>".turnUrlIntoHyperlink($conv)."</p></font><p><a href=\"/stone.php?lang=&asset=".$asset."&showall=11&stone=1&group=no\" target=_blank>".$namespace['value']."</a>  ".date('Y-m-d H:i',$ctime)." BLOCK ".$block['block_header']['height']."  <a href=/subscription.php?lang=&txid=".$txa." target=_blank>TxID</a></p></li>";

						}
				

					

}

?>