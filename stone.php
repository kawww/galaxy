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



?>

<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <title>MILESTONE</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<style>

html, body {
  background-color: #0b0c0d;
  color: #fff;
  font-size: 15px;

  display: flex;

  min-height: 100vh;
  width: 100vw;
  margin: 0;
  padding: 2vh 0px;
  font-family: 'Source Sans Pro', arial, sans-serif;
  font-weight: 300;

  box-sizing: border-box;
  * {
    box-sizing: border-box;
  }

}


a:link,
a:visited,
a:active{
 transition:0.5s;
color: #28f428;	
  text-decoration: none;
}

a:hover { color:yellow; }


.timeline {
  width: 100%;
  max-width: 800px;

  padding: 50px 20px;
  position: relative;
  box-shadow: 0.5rem 0.5rem 2rem 0 rgba(0, 0, 0, 0.2);
}
.timeline:before {
  content: '';
  position: absolute;
  top: 0px;
  left: calc(33% + 15px);
  bottom: 0px;
  width: 4px;
  background: #ddd;
}
.timeline:after {
  content: "";
  display: table;
  clear: both;
}

.entry {
  clear: both;
  text-align: left;
  position: relative;
  
}
.entry .title {
  margin-bottom: .5em;
  font-size:16px;
  
  float: left;
  width: 30%;
  padding-right: 34px;

  text-align: right;
  position: relative;
}
.entry .title:before {
  content: '';
  position: absolute;
  width: 8px;
  height: 8px;
  border: 4px solid salmon;
  background-color: #fff;
  border-radius: 100%;
  top: 5%;
  right: -8px;
  z-index: 99;
}
.entry .title h3 {
  margin: 0;
  font-size: 120%;
}
.entry .title p {
  margin: 0;
  line-height:50px;
  font-size: 100%;
}
.entry .body {
  margin: 0 0 3em;
  float: right;
  font-size:16px;
  width: 62%;
  padding-left: 30px;
}
.entry .body p {
  line-height: 1.4em;
}
.entry .body p:first-child {
  margin-top: 0;
  font-weight: 400;
}
.entry .body ul {
  color: #ddd;
  padding-left: 0;
  list-style-type: none;
}
.entry .body ul li:before {
  content: "¨C";
  margin-right: .5em;
}



</style>



<body>

		



<?php








		


//rpc

if(isset($_REQ["asset"])){
	
	
	$asset=$_REQ["asset"];



		$asset=trim($asset);

		$gstat=$_REQ["group"];

		if(!$gstat){$gstat="no";};

		if($gstat=="no"){$gchange="all";}
		if($gstat=="all"){$gchange="following";}
		if($gstat=="following"){$gchange="follower";}
		if($gstat=="follower"){$gchange="build";}
		if($gstat=="build"){$gchange="no";}

		$gshow=$kpc->keva_group_show($asset);
		 
		 if($gstat=="no"){

		 $info= $kpc->keva_filter($asset,"",360000);}

		 elseif($gstat=="all" or $gstat=="following" or $gstat=="build"){

		 $info= $kpc->keva_group_filter($asset,"all","",360000);}

		 else{

		 $info= $kpc->keva_group_filter($asset,"other","",360000);}
		 
	
		 
		
		 
		 }
	 
	
		

		
			
		
		$error = $kpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}

		

$gshow=$kpc->keva_group_show($asset);

		$arr=array();
		$totalass=array();
			$combine="";

		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			If($key=="_KEVA_NS_"){continue;$title=$value;}

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["adds"]=$address;
			$arr["value"]=$value;
			$arr["txx"]=$txid;

			$gettime= $kpc->getrawtransaction($txid,1);

			$arr["ctime"]=$gettime['time'];

			$arr["gnamespace"]=$namespace;

						foreach($gshow as $s_value=>$s)
				{

				if($namespace==$s["namespaceId"]){$arr["follow"]=$s["initiator"];$arr["gname"]=$s["display_name"];break;}


				}

			If($key=="ID"){$title=$value;}

			if($namespace==$asset){$arr["gname"]=$title;}
			
			
			
			foreach($gshow as $s_value=>$s)
				{

				if($namespace==$s["namespaceId"]){$arr["follow"]=$s["initiator"];break;}



				}

			array_push($totalass,$arr);

			If($key=="ID"){$title=$value;}

			
			
	
			}


			arsort($totalass);

			$listasset=$totalass;




						


			//menu


			$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

		
		

			$title=$namespace['value'];

			



		



	


	

		


				$sname=$_REQ["sname"];
				if(!$_REQ["sname"]){$sname=strtoupper($title);}



if($_REQ["stone"]=="1"){echo "<div class=\"timeline\"><div class=\"entry\"><div class=\"title\"><font size=5><b>".$sname."</b></font></div><div class=\"body\"><p>".$asset."</p><ul>".$_REQ["group"]." group</ul></div></div>";




}



foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

if($gstat=="following"){ if($follow=='1' or $gnamespace==$asset){continue;}}
		if($gstat=="follower"){if($gnamespace==$asset){continue;}}
		if($gstat=="build"){if($follow=='1'){continue;}}

	

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true){continue;}

		//check re

		if(strlen($key2) == "64"){
		
		
		
									$txcount=1;
									$txloop=$key2;

									
								

									while($txcount<50) {
									
									$txcount++;

									

									$transaction= $kpc->getrawtransaction($txloop,1);
								

									
									

									foreach($transaction['vout'] as $vout)
	   
									  {

										$op_return = $vout["scriptPubKey"]["asm"]; 

				
										$arr = explode(' ', $op_return); 

										

										if($arr[0] == 'OP_KEVA_PUT') 
										{
											 $cona=$arr[1];
											 $cons=$arr[2];
											 $conk=$arr[3];

						

											$txloop=hex2bin($cons);

										
						
		
											if(strlen($txloop)<>64){$key="RE:".$txloop;break;}
													
								
													}
												
												}
											}

										
		
		
		}

			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);


if(strlen($_REQ["showall"])<2)
	
			{

$value=strip_tags($value,"");

	$valuex=$value;

			


			
				






			if(strlen($value)>18 & stristr($value,"decodeURIComponent")== false & strlen($value)<>34){

				$valuex=mb_substr($value,0,18,'utf8')."...";}



			if(strlen($x_value)>60){

				$x_value="<p><font size=2>".$x_value."</font></p>";}


			


			
			//$key=str_replace(" ","%20",$key);

			
			if(stristr($value,$_REQ["title"])==true or stristr(key,$_REQ["title"])==true){
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".bin2hex($key)."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex."</p></li>";
			
			}



			}

			else

			{

//showall

			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);

			if($_REQ["stone"]=="1"){

		if(!$gname){$gnamer="";}else{$gnamer=$gname."<br>";}
			if($gnamespace==$asset){$gnamer=$title."<br>";}
		
        echo "<div class=\"entry\"><div class=\"title\"><h3>".date('Y-m-d H:i',$ctime)."</h3><p>".$gnamer."BLOCK ".$heightx."</p></div><div class=\"body\"><p>".$key."</p><ul>".$valuex."</ul></div></div>";
			
		
			
			}

			else{

			echo "<li style=\"background-color: rgb(0, 79,74);display:block;height:auto;width:900px;\"><a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".bin2hex($key)."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."><h4>".$key."</h4></a></li>";

			echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";}

				

					}

			}





?>

</div>



</body>
</html>