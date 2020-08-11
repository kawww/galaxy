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


$comm= $_REQ["username"]; 


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




//cls


if($comm=="cls" or $comm=="clear"){

header("location:/shell");

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


?>