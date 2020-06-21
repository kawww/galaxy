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

  padding: 100px 20px;
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





//echo "<div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"\"><li style=\"text-align:center;list-style:none;color: #28f428;font-size: 30px;letter-spacing:4px;margin-top:5px;padding-top:5px;padding-right:25px;height:45px;background-color:#0b0c0d;}\"><a href=keva.php style=\"color: #28f428;text-decoration: none;\">GALAXY</a></li></ul></div>";


		


//rpc

if(isset($_REQ["asset"])){
	
	
	$asset=$_REQ["asset"];



		$asset=trim($asset);


		 
		 $info= $kpc->keva_filter($asset,"",360000);
		 
		 //pending

		 if($_REQ["pending"]==1){$info= $kpc->keva_pending($asset);}
		 
		 }
	 
	 else {
		 
	 

		 $info= $kpc->keva_filter($asset,$_REQ["skey"],360000);
		 
		 }
		

		
			
		
		$error = $kpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}

		



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



if($_REQ["stone"]=="1"){echo "<div class=\"timeline\">";}



foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

		$key2=strip_tags($key,"");

			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);


if(strlen($_REQ["showall"])<2)
	
			{

$value=strip_tags($value,"");

	$valuex=$value;

			

			if(stristr($value,"decodeURIComponent") == true){
				
				if($hidemkey==0){

				

				$valuex="<font size=1>".$txx." <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a> <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightx.">[ ".$heightx." ]</a></font>";
				
				
				}

				else {
				
				$arrhiden=explode("\r\n",$value);

				$valuex=$arrhiden[0];

				}
				
				}

			if(strlen($value)==34){

				$valuex="<font size=1>".$txx." [ ".$heightx." ] <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a></font>";}
				






			if(strlen($value)>18 & stristr($value,"decodeURIComponent")== false & strlen($value)<>34){

				$valuex=mb_substr($value,0,18,'utf8')."...";}



			if(strlen($x_value)>60){

				$x_value="<p><font size=2>".$x_value."</font></p>";}


			


			
			//$key=str_replace(" ","%20",$key);

			
			if(stristr($value,$_REQ["title"])==true or stristr(key,$_REQ["title"])==true){
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".bin2hex($key)."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex."</p></li>";
			
			}

//iot

if($title=="IOT"){$iotcopy="<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&mode=10 target=_blank><font size=3>( LINK )</font></a>";}

			if(!isset($_REQ["title"])){

			$stati=$_REQUEST["stat"];

			if($_REQUEST["st"]=="0" & trim($valuex)=="off"){$stati="";}

			if($_REQUEST["st"]=="1" & trim($valuex)=="on"){$stati="";}

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&mode=".$switch."&type=".$_REQ["type"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex." ".$stati." ".$iotcopy."</p></li>";
							}

			}

			else

			{

//showall

			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);

			if($_REQ["stone"]=="1"){

					
			
		
        echo "<div class=\"entry\"><div class=\"title\"><h3>".date('Y-m-d H:i',$ctime)."</h3><p>BLOCK ".$heightx."</p></div><div class=\"body\"><p>".$key."</p><ul>".$valuex."</ul></div></div>";
			
		
			
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