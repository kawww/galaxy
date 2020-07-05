<?php

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

//rpc



if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}

if(!$_REQ["asset"]){$asset="NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS";}

if(isset($_REQ["txid"])){$asset=$agetx['details'][0]['keva'];$asset=str_replace("update:","",$asset);$asset=str_replace("new:","",$asset);$asset=trim($asset);}

	

		$asset=trim($asset);
		
		$gstat=$_REQ["group"];

		if(!$gstat){$gstat="no";};

		if($gstat=="no"){$gchange="following";}
		if($gstat=="following"){$gchange="all";}
		if($gstat=="all"){$gchange="follower";}
		
		if($gstat=="follower"){$gchange="build";}
		if($gstat=="build"){$gchange="no";}

$gshow=$kpc->keva_group_show($asset);

$fing=0;
$fer=0;

			foreach($gshow as $s_value=>$s)
				{

				if($s["initiator"]==0){$fing=$fing+1;}
				if($s["initiator"]==1){$fer=$fer+1;}
			
			}




		 
		if($gstat=="no"){

		 $info= $kpc->keva_filter($asset,"",360000);}

		 elseif($gstat=="all" or $gstat=="following" or $gstat=="build"){

		 $info= $kpc->keva_group_filter($asset,"all","",360000);}

		 elseif($gstat=="foller"){

		 $info= $kpc->keva_group_filter($asset,"other","",360000);}

		 else{ $info= $kpc->keva_group_filter($asset,"all","",360000);}

		 
		 //pending

		 if($_REQ["pending"]==1){$info= $kpc->keva_pending($asset);}
		 

	 
	 

		
			
		
		$error = $kpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error list</p>";
					exit;
				}

		

		

		$arr=array();
		$totalass=array();
			$combine="";

		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			If($key=="_KEVA_NS_"){$title=$value;continue;}

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["adds"]=$address;
			$arr["value"]=$value;
			$arr["txx"]=$txid;
			$arr["gnamespace"]=$namespace;
			
			$gtime= $kpc->getrawtransaction($txid,1);

			$arr["gtime"]=$gtime["time"];

			foreach($gshow as $s_value=>$s)
				{
				$arr["gname"]=="";
				if($namespace==$s["namespaceId"]){$arr["follow"]=$s["initiator"];$arr["gname"]=$s["display_name"];break;}


				}

			If($key=="ID"){$title=$value;}

			if($namespace==$asset){$arr["gname"]=$title;}

			
			array_push($totalass,$arr);

			

			
			
	
			}


			arsort($totalass);

			$listasset=$totalass;



			//menu


			$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

		
		

			$title=$namespace['value'];

			$sname=$_REQ["sname"];
			
			if(!$_REQ["sname"]){$sname=strtoupper($title);}







?>
