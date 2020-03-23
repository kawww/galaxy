<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>WORD</title>
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

.textarea-inherit {
    width: 90%;
    overflow: auto;
    word-break: break-all;
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

 width:50%;
 padding-left:5px;

}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 5px 22px;
  margin-left:3px;
  height:45px;
    
}

div{margin:1px;border:0;padding:0;}

#door {

margin-top:0px;
  
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

width:98%;

 
  
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
                width: 440px;
				height:100px;
				word-break: break-all;
			background-color: rgb(0, 79, 74);
                text-align: center;
                margin-top: 10px;
                margin-bottom: 7px;
				margin-right: 5px;
				margin-left: 1px;
				padding-top:10px;
				padding-left:2px;
				padding-right:2px;
                flex:auto;  
				

            }
			p
			{
			margin-left: 5px;
			}
#universe {

line-height:26px;
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

<?php 

error_reporting(0);
include("rpc.php");

?>


<script>

    var maxstrlen=<?php echo $word_num; ?>;
    function Q(s){return document.getElementById(s);} 
    function checkWord(c){
        len=maxstrlen;
        var str = c.value;
        myLen=getStrleng(str);
        var wck=Q("wordCheck");
        if(myLen>len*2){
            c.value=str.substring(0,i+1);
        }
        else{
            wck.innerHTML = Math.floor((len*2-myLen)/2);
           }
    }
    function getStrleng(str){
        myLen =0;
        i=0;
        for(;(i<str.length)&&(myLen<=maxstrlen*2);i++){
        if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128) 
        myLen++;
        else
        myLen+=2;
    }
    return myLen;
}
</script>

<body>

		



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

//hidemkey

if($_REQ["hidemkey"]==1){$hidemkey=1;}


//creat new to blockchain

if(isset($_REQ["newasset"])) {

$forsub=$_REQ["newasset"];

$age= $kpc->keva_put($_REQ["asset"],$_REQ["title"],$forsub);

$url = "?asset=".$_REQ["asset"]; 

echo "<script>window.location.href=decodeURIComponent('keva.php".$url."')</script>";


}


//creat new namespace

if(isset($_REQ["namep"])) {

$forname=$_REQ["namep"];

$age= $kpc->keva_namespace($forname);

echo "<script>window.location.href=decodeURIComponent('keva.php')</script>";


}

//freekeva

if(isset($_REQ["address"])) {

$forfree=$_REQ["address"];

$checkaddress= $kpc->listtransactions("credit",100);

$listaccount = $kpc->listaccounts();

if($listaccount['credit']<1){echo "<script>alert('NO CREDIT AVAILABLE, PLEASE WAIT NEXT TIME');history.go(-1);</script>";exit;}

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

										$age= $kpc->sendfrom("credit",$forfree,"0.1");

										echo "<script>alert('GET 1 CREDIT SUCCESS');history.go(-1);</script>";



										exit;

											}

										else
								
											{ 

										$left=30-$findadd['fcon'];
		
									
										echo "<script>alert('WAIT ".$left." BLOCKS (2min/block)');history.go(-1);</script>";
										
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
											
										echo "<script>alert('GET CREDIT SUCCESS');history.go(-1);</script>";
											}

						}
	

//block

if(isset($_REQ["asset"]) & is_numeric($_REQ["asset"])==true) 
		
		{
			
			echo "<script>window.location.href=decodeURIComponent('subscription.php?block=".$_REQ["asset"]."')</script>";

			}

//add new text

if(isset($_REQ["mode"])){

		if($_REQ["mode"]==1  & $keva_add=="on"){
		
			if(isset($_REQ["title"])){
		
					$infox= $kpc->keva_get($_REQ["asset"],hex2bin($_REQ["title"]));

					extract($infox);
		
					//$key=str_replace(" ","_",$key);

								}


				
			echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=keva.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li></ul>";	

			

			echo "<ul><li style=\"height:670px;\"><br><input type=\"text\" name=\"title\" class=\"textarea-inherit\"  style=\"width:90%;\" placeholder=\"TITLE\" value=\"".$key."\"><br><br><textarea onKeyUp=\"javascript:checkWord(this);\" onMouseDown=\"javascript:checkWord(this);\" rows=\"25\" cols=\"150\" name=\"newasset\" class=\"textarea-inherit\" id=\"pasteArea\" placeholder=\"\">".$value."</textarea>";

			echo "<br><textarea rows=\"1\" cols=\"150\" class=\"textarea-inherit\">LINK TXID CODE <script>window.location.href=decodeURIComponent(\"http://\")</script></textarea>";
		
			echo "<input type=\"hidden\" name=\"mode\" value=\"bulk\" />";

			echo "<br><br><span style=\"font-family: Georgia; font-size: 22px;\" id=\"wordCheck\">".$word_num."</span> [ ".hex2bin($_REQ['nameid'])." ] <br><br><input type=\"submit\" value=\"".$keva_submit."\"> </li></ul></div></form></div>";

			exit;
			
			}

//ipfs

			if($_REQ["mode"]==2)
				
				{

				$url = "http://linkipfs.com";

					if(isset($_REQ["key"]))
		
					{
	

					$keylink="http://galaxyos.io/keva.php?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"]."&key=".$_REQ["key"];			
					$keylink=str_replace(" ","%20",$keylink);

					$keylink = str_replace("&","%26",$keylink);

					$jsonStr = '{"url": "'.$keylink.'"}';

			
					}
			
				else
				
					{

				$jsonStr = '{"url": "http://galaxyos.io/keva.php?lang=".$_REQUEST["lang"]."&asset='.$_REQ["asset"].'"}';
			
					}



			list($returnCode, $returnContent) = http_post_json($url, $jsonStr);


				}
		
//subscribe

			if($_REQ["mode"]==3 & $keva_add=="on")
				
				{

					$namespace= $kpc->keva_list_namespaces();

					$subraven= $rpc->subscribetochannel($_REQ["sname"]);

					foreach ($namespace as $q=>$w) {


						if($w['displayName']==$keva_subscription)
							
											{
									
						$newadd=$kpc->keva_put($w['namespaceId'],$_REQ["title"],$_REQ["asset"]);
														
						$addend="Success";

														}

													}

				

				}
		
		}

//create new space

if($_REQ["mode"]==4  & $keva_add=="on"){
		
				
			echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=keva.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li></ul>";	

			echo "<ul><li style=\"height:270px;\"><br><input type=\"text\" name=\"namep\" class=\"textarea-inherit\"  style=\"width:90%;\">";
		
			echo "<input type=\"hidden\" name=\"mode\" value=\"bulk\" />";

			echo "<br><br><br><br><input type=\"submit\" value=\"".$keva_submit."\"> </li></ul></div></form></div>";

			exit;
			
			}


//delete

			if($_REQ["mode"]==5 & $keva_add=="on")

			{
			
			$age= $kpc->keva_delete($_REQ["asset"],hex2bin($_REQ["title"]));

			$url = "?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"]; 

			echo "<script>window.location.href=decodeURIComponent('keva.php".$url."')</script>";
			
			}

//console

			if($_REQ["mode"]==6 & $keva_add=="on")

			{

			$auto= $kpc->keva_put($_REQ["asset"],"LANGUAGE","en");
			$auto= $kpc->keva_put($_REQ["asset"],"WORD","1500");
			$auto= $kpc->keva_put($_REQ["asset"],"HIDE","on");
			$auto= $kpc->keva_put($_REQ["asset"],"LIST","on");
			$auto= $kpc->keva_put($_REQ["asset"],"MESSAGE","50000");
			$auto= $kpc->keva_put($_REQ["asset"],"SYSTEM","30");

			$url = "?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"]; 

			echo "<script>window.location.href=decodeURIComponent('keva.php".$url."')</script>";
			
			}

//list keva namespace



if(!isset($_REQ["asset"]) & !isset($_REQ["txid"]))

	{
	

		echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"asset\" maxlength=\"34\" placeholder=\"NAME ADDRESS, BLOCK NUMBER...\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"".$keva_kaw."\"></li></ul></div></form></div>";
	
//list

		$age= $kpc->keva_list_namespaces();

		
			
			$error = $kpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}

//credit account

	$messageacc="credit";

	$listaccount = $kpc->listaccounts();
				
				

			if(isset($listaccount['credit']))
			
					{
						$accaddress=$kpc->getaddressesbyaccount($messageacc);
					
						$shopaddress=$accaddress[0];
						
						$shopbalance=$kpc->getbalance($shopaddress);

						$errorshop = $kpc->error;

						if($errorshop != "") 
			
						{
							echo "<p>&nbsp;&nbsp;error,message address</p>";
							exit;
						}
					}
			
					else

					{

				

					$shopaddress = $kpc->getnewaddress($messageacc);

					$shopbalance=$kpc->getbalance($shopaddress);

					$errorshop = $kpc->error;

					if($errorshop != "") 
		
						{
							echo "<p>&nbsp;&nbsp;Error,create new messages</p>";
						exit;
						}
					}

			$credit=intval(($listaccount['credit'])*10);


			echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";

			echo "<li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_myaddress." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$shopaddress."</p></li>";

			if($keva_add=="on"){echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=4&nameid=".$title."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_newspace." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:14px\">".$keva_newspacememo."</p></a></li>";
			
			echo "<a href=".$freekeva."keva.php?lang=".$_REQUEST["lang"]."&address=".$shopaddress."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_free." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$credit."</p></a></li>";
			
			
			}




			foreach($age as $x_value=>$x)

			{

			extract($x);


			$hide = $kpc->keva_get($namespaceId,hide);

			if(!$hide['value'] ){


			$x_value=$displayName;


			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$namespaceId."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$x_value." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$namespaceId."</p></a></li>";

			}
			else
				{
			if($hidenkey==0){


			$x_value=$displayName;


			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$namespaceId."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$x_value." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$namespaceId."</p></a></li>";

			}}

			}

		echo "</ul></div></div>";



		}


//list namespace finish

//list namespace address

if(isset($_REQ["txid"])) {

		$agetx= $kpc->gettransaction($_REQ["txid"]);

}



if(isset($_REQ["asset"]) or isset($_REQ["txid"])) 
	
	{



		echo "<div id=\"door\"  class=\"crt\"><form action=\"keva.php\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=keva.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"title\" maxlength=\"34\" placeholder=\"KEY WORDS\">";

		echo "<input type=\"hidden\" name=\"asset\" value=".$_REQ["asset"]." />";
		echo "<input type=\"submit\" value=\"".$keva_kaw."\"></div></form></div>";
	


		//rpc

if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}

if(isset($_REQ["txid"])){$asset=$agetx['details'][0]['keva'];$asset=str_replace("update:","",$asset);$asset=str_replace("new:","",$asset);$asset=trim($asset);}

	

		$asset=trim($asset);


	 if(!$_REQ["skey"]){$info= $kpc->keva_filter($asset,"",360000);}
	 
	 else {$info= $kpc->keva_filter($asset,$_REQ["skey"],360000);}
		

		
			
		
		$error = $kpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}



		echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";

		$arr=array();
		$totalass=array();

		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			If($key=="_KEVA_NS_"){continue;$title=$value;}

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["adds"]=$address;
			$arr["value"]=$value;
			$arr["txx"]=$txid;
			
			array_push($totalass,$arr);

			If($key=="ID"){$title=$value;}

			
			
	
			}


			arsort($totalass);

			$listasset=$totalass;



			if(isset($_REQ["key"])) {

			$kkey=urldecode($_REQ["key"]);


			//value







					foreach ($listasset as $k=>$v) 

							{
							
								extract($v);

								

								$key1=bin2hex(trim($key));
								$key2=bin2hex(trim($kkey));
		
								if($key1==$key2){

								$fkey=$key;

								$heightm=$heightx;

								$x_value="<h4>".$key."</h4>";

								

								echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><h4>".$key."</h4></li>";

									if(stristr($value,$asset) == false)
										
									{

										$valuex=str_replace("\n","<br>",$value);

	

										if(strlen($value)==strlen($asset))
							
											{

										echo "<script>window.location.href=decodeURIComponent('keva.php?lang=".$_REQUEST["lang"]."&asset=".$value."&showall=11')</script>";

											}
											else

											{
						
											  if(stristr($valuex,"decodeURIComponent") == true or stristr($valuex,"src") == true)
											{
												
												echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><p align=left>".$valuex."</p></li>";}	  
											

													else
											{
										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";}
												


											}
											
											}

								else

									{

										$arr1=explode("\n",$value);


										foreach ($arr1 as $m=>$n) {

											$n=trim(str_replace($asset,"",$n));


											foreach ($listasset as $k=>$v) 

													{
			
											extract($v);	

										
		
										if($key==$n){


										$valuex=str_replace("\n","<br>",$value);


										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";
					}

				}
			
	
			}

			}


		$vadd= $kpc->validateaddress($adds);
		$fkey=str_replace("%20"," ",$fkey);

		extract($vadd);

		$tadd=$kpc->keva_list_namespaces();

		foreach ($tadd as $t)

					{

					if($t['namespaceId']==$asset){$title=$t['displayName'];}
									
							
					}

			$sname=$_REQ["sname"];

			if(!$_REQ["sname"]){$sname=strtoupper($title);}



		if($ismine=="1" & $keva_add=="on"){echo "</ul><ul><p><a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($fkey)."&nameid=".bin2hex($title)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_edit." ]</a> ".$keva_kcode." [ <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightm.">".$heightm."</a> ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><font size=1>".$txx."</font></li>";
		
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&key=".$fkey."&title=".$title."&sname=".$sname."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$title."</font> ".$addend."</li>";

			echo "<a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($fkey)."&nameid=".$title."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_delete." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$key."</font> ".$addend."</li>";


										}


										else

										{
				
			echo "</ul><ul><p><a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>TXID</a> [ <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightm.">".$heightm."</a> ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>".$txx."</font></li>";
			
										}

		
//linkipfs	

			$linkipfs = json_decode($returnContent, true);


			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&key=".$fkey."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=".$linkipfs['data']['hash_urls'][1]." target=_blank><font size=1>".$linkipfs['data']['hash_urls'][0]."</font></a></li>";

//broadcast 
if($webmode==0){

			echo "<a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&ipfs=".$linkipfs['data']['hash_urls'][0]."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_broadcast." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a></li>";

//message

			echo "<a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&ipfs=".$linkipfs['data']['hash_urls'][0]."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_message." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a></li>";}

//galaxylink

			echo "<a href=http://galaxyos.io/subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_galaxylink." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>galaxyos.io/subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."</font></a></li>";



									}
								}





							}
//article over
					else
//menu
							{


			//menu


			$namespace= $kpc->keva_list_namespaces();

			foreach ($namespace as $q=>$w) {

		

			if($w['namespaceId']==$asset){$title=$w['displayName'];}

			}




		

		if($hidemkey==0){

		echo "<li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$title." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$asset."</p></li>";


		if(strlen($_REQ["showall"])>1){echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=1><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_showlist." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\">-</a></li>";echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$title."&sname=".$sname."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">".$title."</font> ".$addend."</p></li>";}
		else 
			
		{echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=11><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_showall." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\">-</a></li>";

		}



		$vadd= $kpc->validateaddress($address);




		extract($vadd);


		$linkipfs = json_decode($returnContent, true);


		if($ismine=="1"  & $keva_add=="on"){echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=1&nameid=".bin2hex($title)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_addnew." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=2>".$keva_addnewmemo."</font></a></li>";

		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$title."&sname=".$sname."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">".$title."</font> ".$addend."</p></li>";
		
		if($title=="CONSOLE"){
		
		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$title."&sname=".$sname."&mode=6><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ONE-KEY SETUP ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">AUTOMATIC CREATE CONSOLE</p></li>";}
		}

		



		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=".$linkipfs['data']['hash_urls'][1]." target=_blank><font size=3>".$linkipfs['data']['hash_urls'][0]."</font></a></li></ul><div id=\"nav\"><ul>";
		

			}


				$sname=$_REQ["sname"];
				if(!$_REQ["sname"]){$sname=strtoupper($title);}







foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

		
			$x_value="<h4>[ ".$key." ]</h4>";
			$valuex=$value;
			$key=trim($key);
			$keylink=urlencode($key);


if(strlen($_REQ["showall"])<2)
	
			{
			

			if(stristr($value,"decodeURIComponent") == true){
				
				if($hidemkey==0){

				

				$valuex="<font size=1>".$txx." <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a></font>";
				
				
				}

				else {
				
				$arrhiden=explode("\r\n",$value);

				$valuex=$arrhiden[0];

				}
				
				}

			if(strlen($value)==34){

				$valuex="<font size=1>".$txx." [ ".$heightx." ] <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a></font>";}



			if(strlen($value)>18 & stristr($value,"decodeURIComponent")== false & strlen($value)<>34){

				$valuex=mb_substr($value,0,18,'utf8')."....";}

			


			
			$key=str_replace(" ","%20",$key);

			
			if(stristr($value,$_REQ["title"])==true or stristr(key,$_REQ["title"])==true){
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$key."&key=".$key."&sname=".$_REQ["sname"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex."</p></li>";
			
			}


			if(!isset($_REQ["title"])){

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".$key."&sname=".$_REQ["sname"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex."</p></li>";
							}

			}

			else

			{

			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}


			

			echo "<li style=\"background-color: rgb(0, 79,74);display:block;height:auto;width:900px;\"><a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$key."&key=".$key."&sname=".$_REQ["sname"]."><h4>[ ".$key." ]</h4></a></li>";

			$valuex=str_replace("\n","<br>",$value);


			echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p></li>";

				

					}

			}


		echo "</ul></div></div>";


	}
			

	



}	
	











?>
</ul></div>
</div>





</body>
</html>