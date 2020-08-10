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


//getinfo


if($comm=="kaw"){


echo "<img src=\"https://ipfs.globalupload.io/QmdjcA9VNBU8x27yaEXfAoUHxcS8nhCs6G9e1FLrjTfVWG\">";
echo "<br><br>kawwwwwwwwwwwwwww!kaaawwww!";
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
echo "</table>";
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


?>