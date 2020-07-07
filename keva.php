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


//iotstat

	if($_REQ["mode"]==10)

			{

			$iotdv=hex2bin($_REQ["title"]);

			$iotst=$kpc->keva_get($_REQ["asset"],$iotdv);

	if(trim($iotst['value'])=="on"){echo "on";}
	
else
				{header("HTTP/1.0 900 off");echo $iotst['value'];}


			

			

			exit;
		
			}


//hidemkey

if($_REQ["hidemkey"]==1){$hidemkey=1;}


//comment

if(isset($_REQ["comment"])) {


$newaddress= $rpc->getnewaddress("comment");

$comment ="::RAVENCOIN_COMMENT_ADDRESS:".$newaddress; 

}

//unfollow

if(isset($_REQ["unfollow"]) & $keva_add=="on") {

$nsa=$_REQ["asset"];
$nsu=$_REQ["unfollow"];

$age= $kpc->keva_group_leave($nsa,$nsu);

$url="keva.php?lang=&asset=".$nsa."&ismine=1&group=all&manageg=following"; 

echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";


}

//creat new to blockchain

function my_substr($str, $start, $length = "", $bite = 3) {

$pos = 0; 
for ($i = 0; $i < $start; $i++) {
    if (ord(substr($str, $i, 1)) > 0xa0) {
        $pos += $bite; 
    } else {
        $pos += 1;
    }
}

//开始截取
if ($length == "") {
    return substr($str, $pos);
} else {
    if ($length < 0) {
        $length = 0;
    }
    $string = "";
    for ($i = 0; $i < $length; $i++) {
        if (ord(substr($str, $pos, 1)) > 0xa0) { 
            $string .= substr($str, $pos, $bite); 
            $pos += $bite;
        } else {
            $string .= substr($str, $pos, 1);
            $pos += 1;
        }
    }
    return $string;
}
}



if(isset($_REQ["newasset"]) & $keva_add=="on") {

$forsub=$_REQ["newasset"]."\r\n\r\n".$comment;
$nameid=$_REQ["spti"];
$fortit=strip_tags($_REQ["title"]);



$age= $kpc->keva_put($_REQ["asset"],$fortit,$forsub);

$error = $kpc->error;


if($error != "") 
	
	{

	$greaterr=$error;

	$gnum=1;

	$gtotal=(strlen($forsub) + mb_strlen($forsub,'UTF8')) / 2; 



		while($greaterr != ""){

				$gnum=$gnum+1;

				$gtest=intval($gtotal/$gnum);

			
				$gsub=my_substr($forsub,0,$gtest);

						

$age= $kpc->keva_put($_REQ["asset"],$fortit,$gsub);

$greaterr = $kpc->error;



}

$gtotal=$gtotal-$gtest;



$gleft=str_replace($gsub,"",$forsub);




while($gtotal>0){



$gsub=my_substr($gleft,0,$gtest);


sleep(1);

$age= $kpc->keva_put($_REQ["asset"],$age['txid'],$gsub);

$gleft=str_replace($gsub,"",$gleft);

$gtotal=$gtotal-$gtest;


$url ="keva.php?lang=&txid=".$age['txid']."&title=".bin2hex($fortit)."&key=".bin2hex($fortit)."&pending=1&ismine=1";

$gleftn=strlen($gleft); 

if($gleftn=="0"){break;}
			}

	}

	else
	
{

$url ="keva.php?lang=&txid=".$age['txid']."&title=".bin2hex($fortit)."&key=".bin2hex($fortit)."&pending=1&ismine=1";


}



if(strlen($_REQ["cadd"])==34)
	
{

$url="message.php?lang=".$_REQUEST["lang"]."&txid=".$age['txid']."&block=".$_REQ["title"]."&cadd=".$_REQ["cadd"]."&oldtxid=".$_REQUEST["oldtxid"]."&spid=".$_REQUEST["spid"]."&spti=".$_REQUEST["spti"]."&name=".$_REQUEST["name"]; 

}



echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

}



//addnew



if($_REQ["mode"]==1  & $keva_add=="on"){
		
			if(isset($_REQ["title"])){
		
					$infox= $kpc->keva_get($_REQ["asset"],hex2bin($_REQ["title"]));

					extract($infox);
		
					//$key=str_replace(" ","_",$key);

								}

				//if(isset($_REQ["newerr"])){$value=hex2bin($_REQ["newerr"]);}

				if(isset($_REQ["combine"])){$value=hex2bin($_REQ["combine"]);}


echo "<html lang=\"en\" dir=\"ltr\"></html><head><title>GALAXY</title><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

echo "<style>.ck-content {min-height: 50px;font-size:20px;}</style>";

echo "</head>";

echo "<body style=\"background-color: #0b0c0d;\">";

echo "<div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"border: 1px solid #59fbea;\"><li style=\"text-align:center;list-style:none;color: #28f428;font-size: 30px;letter-spacing:4px;margin-top:5px;padding-top:5px;padding-right:25px;height:45px;background-color:#0b0c0d;}\"><a href=/keva.php style=\"color: #28f428;text-decoration: none;\">GALAXY</a></li></ul></div>";

		

			echo "<form action=\"\" method=\"post\" >";	

			if(!$value){$value=hex2bin($_REQUEST["hvalue"]);}

			$titvalue=hex2bin($_REQUEST["title"]);
			$nameid=hex2bin($_REQ['nameid']);
		

			echo "<textarea name=\"title\" id=\"edit\" placeholder=\"TITLE\" rows=\"1\" cols=\"150\">".$titvalue."</textarea><br>";
			
			echo "<textarea name=\"newasset\" id=\"editor\" rows=\"25\" cols=\"150\">".$value."</textarea>";

			echo "<div id=\"word-count\" style=\"position:absolute;padding: 10px 20px;margin-bottom: 15px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);\"></div><div style=\"padding: 10px 20px;margin-bottom: 15px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);text-align:right;font-size:10px;\"><font size=4>[ ".$nameid." ] <input name=\"comment\" type=\"checkbox\" value=\"on\"/>COMMENT & TIPS</font></div>";

			//echo "<br><textarea rows=\"2\" cols=\"50\" class=\"textarea-inherit\">LINK TXID CODE <script>window.location.href=decodeURIComponent(\"http://\")</script> \r\nMy  SPACE CODE <a href=/keva.php?lang=".$_REQUEST["lang"]."&asset=".$_REQUEST["asset"].">".$_REQUEST["asset"]."</a></textarea>";


			echo "<input type=\"hidden\" name=\"cadd\" value=\"".$_REQUEST["cadd"]."\">";
			echo "<input type=\"hidden\" name=\"oldtxid\" value=\"".$_REQUEST["oldtxid"]."\">";
			echo "<input type=\"hidden\" name=\"spid\" value=\"".$_REQUEST["spid"]."\">";
			echo "<input type=\"hidden\" name=\"spti\" value=\"".$_REQUEST["nameid"]."\">";

			echo "<br><center><input type=\"submit\" value=\"".$keva_submit."\" style=\"border: 1px solid #59fbea;webkit-appearance: none;-webkit-border-radius: 0;height:42px;background-color: rgb(0, 79, 74);color: #59fbea;padding: 5px 22px;margin-left:3px;height:45px;width:200px;font-size: 20px;\"></center></form>";
			if(!$_REQ["combine"]){
			echo "<script src='ckeditor.js'></script>";}

			echo "<script>ClassicEditor.create( document.querySelector( '#edit' ), {}).then( editor => {window.editor = editor;} ).catch( err => {console.error( err.stack );});document.querySelector('#submit').addEventListener('click', () => {const editorData =editor.getData();} );</script>";

				echo "<script>function MinHeightPlugin(editor) {this.editor=editor;}MinHeightPlugin.prototype.init = function() {this.editor.ui.view.editable.extendTemplate({attributes: {style: {minHeight:'270px'}}});};ClassicEditor.builtinPlugins.push(MinHeightPlugin);ClassicEditor .create( document.querySelector( '#editor' ), { toolbar:['heading','|','fontFamily','fontSize','fontColor','fontBackgroundColor','highlight','|','bold','italic','underline','specialCharacters','removeFormat','|','link','|','horizontalLine','|','alignment','blockQuote','code','insertTable','undo','redo'],mediaEmbed: {
            removeProviders: [ 'instagram', 'twitter', 'googleMaps', 'flickr', 'facebook', 'youtube' ]}}).then( editor => {window.editor = editor;const wordCountPlugin = editor.plugins.get( 'WordCount' );const wordCountWrapper = document.getElementById( 'word-count' );wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );} ).catch( err => {console.error( err.stack );} );</script>";

			exit;
			
			}

?>

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

table {
color:#999;
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #999;
}
tr td{color:#999;border: 1px solid #ccc;}

</style>





<body>

		



<?php



//creat new namespace

if(isset($_REQ["namep"]) & $keva_add=="on") {

$forname=$_REQ["namep"];

$joingroup=$_REQ["joingroup"];

if(strlen($joingroup)=="34" & strlen($joingroup)=="34"){

if($_REQ["follow"]=="1"){

$age= $kpc->keva_group_join($forname,$joingroup);}else

	{

$age= $kpc->keva_group_join($joingroup,$forname);}

$url="keva.php?lang=&asset=".$joingroup."&ismine=1&manageg=following"; 

echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

}

else{

$age= $kpc->keva_namespace($forname);

echo "<script>window.location.href=decodeURIComponent('keva.php')</script>";

}


}

//freekeva

//index

$assetget=$_REQ["asset"];

if(strlen($assetget)==34 & substr($assetget,0,1)=="V"){

	$url=$freekeva."keva.php?lang=".$_REQUEST["lang"]."&address=".$assetget;

	echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

	}

//word

$freeadd=$_REQ["address"];

if(strlen($freeadd)==34) {

$forfree=$freeadd;

$checkaddress= $kpc->listtransactions("credit",100);

$listaccount = $kpc->listaccounts();

if($listaccount['credit']<1){echo "<script>alert('NO CREDIT AVAILABLE, PLEASE WAIT NEXT TIME (".$listaccount['credit'].")');history.go(-1);</script>";exit;}

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


	

			$block=$_REQ["asset"];
			
			$blockhash= $kpc-> getblockhash(intval($block));

			$blockdata= $kpc->getblock($blockhash);

			foreach($blockdata['tx'] as $txa)

			{
			
				$transaction= $kpc->getrawtransaction($txa,1);

				$rand=rand(1,99);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

					$arr = explode(' ', $op_return); 



					if($arr[0] == 'OP_KEVA_PUT') 
						
								{

								  $kadd=$vout["scriptPubKey"]["addresses"][0];
								 $conk=$arr[3];
								 $sinfo=hex2bin($conk);

								 $value=$sinfo;
										
										//comment
	
								 if(stristr($value,"::") == true)

									{
									
										$commtool=explode('::', $value);

										$value=$commtool[0];

									    foreach ($commtool as $tool) 

											{

											 if(stristr($tool,"RAVENCOIN_COMMENT_ADDRESS") == true)
												 {
											          $commentadd=trim(str_replace("RAVENCOIN_COMMENT_ADDRESS:","",$tool));
													}
											
											
											}

										}




								  if($rand<>0 & $rand<$rewardk){
								  
								  $agek= $kpc->sendfrom("credit",$kadd,$credit/10);
								 }

								  
								  if($rand<>0 & $rand<$rewardr){
								  
								  
								  $ager= $rpc->sendtoaddress($commentadd,$credit/10);}
								  
								  

								  }

								}
						  }


			
			echo "<script>window.location.href=decodeURIComponent('subscription.php?block=".$_REQ["asset"]."')</script>";

			}

if(isset($_REQ["asset"]) & strlen($_REQ["asset"])==64) 
		
		{
			
			echo "<script>window.location.href=decodeURIComponent('subscription.php?txid=".$_REQ["asset"]."')</script>";

			}


//add new text

if(isset($_REQ["mode"])){

		

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
				
				$keylink="http://galaxyos.io/keva.php?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"];
				
				$keylink=str_replace(" ","%20",$keylink);

				$keylink = str_replace("&","%26",$keylink);

				$jsonStr = '{"url": "'.$keylink.'"}';
			
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

			echo "<ul><li style=\"height:270px;\"><br><input type=\"text\" name=\"namep\" class=\"textarea-inherit\"  style=\"width:90%;\" value=\"".$_REQUEST["createname"]."\">";
		
			echo "<input type=\"hidden\" name=\"mode\" value=\"bulk\" />";

				echo "<input type=\"hidden\" name=\"joingroup\" value=\"".$_REQUEST["asset"]."\" />";

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
			$auto= $kpc->keva_put($_REQ["asset"],"WORD","3000");
			$auto= $kpc->keva_put($_REQ["asset"],"HIDE","on");
			$auto= $kpc->keva_put($_REQ["asset"],"LIST","on");
			$auto= $kpc->keva_put($_REQ["asset"],"MESSAGE","50000");
			$auto= $kpc->keva_put($_REQ["asset"],"SYSTEM","30");
			$auto= $kpc->keva_put($_REQ["asset"],"FREE","http://galaxyos.io/");
			$auto= $kpc->keva_put($_REQ["asset"],"CREDIT","0.1");
			$auto= $kpc->keva_put($_REQ["asset"],"IPFS","http://gotoipfs.com/#path=");

			$url = "?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"]; 

			echo "<script>window.location.href=decodeURIComponent('keva.php".$url."')</script>";
			
			}

//keva credit tips

			if($_REQ["mode"]==7 & $keva_add=="on")

			{
			$tips=intval($_REQ["tips"])/10;
			$sendtip= $kpc->sendtoaddress($_REQ["adds"],$tips);

					if(isset($_REQ["oldtxid"]) & strlen($_REQ["oldtxid"])>10){$jumptxid=$_REQ["oldtxid"];			$url = "subscription.php?lang=".$_REQUEST["lang"]."&txid=".$jumptxid; 

		   echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}
			
			
		
			}

//rvn tips

			if($_REQ["mode"]==8 & $keva_add=="on")

			{
			$tips=intval($_REQ["tips"])/10;
			$sendtip= $rpc->sendtoaddress($_REQ["adds"],$tips);
			
			if(isset($_REQ["oldtxid"]) & strlen($_REQ["oldtxid"])>10){$jumptxid=$_REQ["oldtxid"];			$url = "subscription.php?lang=".$_REQUEST["lang"]."&txid=".$jumptxid; 

		   echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}


		
			}


//iot

			if($_REQ["mode"]==9 & $keva_add=="on")

			{

			$iotdv=hex2bin($_REQ["title"]);

			$iotst=$kpc->keva_get($_REQ["asset"],$iotdv);

			

			if(trim($iotst['value'])=="on"){$iotsw=$kpc->keva_put($_REQ["asset"],$iotdv,"off"); $stat="(pending turn off)"; $st=0;}

			if(trim($iotst['value'])=="off"){$iotsw=$kpc->keva_put($_REQ["asset"],$iotdv,"on");$stat="(pending turn on)"; $st=1;}

			
			$url = "keva.php?lang=".$_REQUEST["lang"]."&asset=".$_REQ["asset"]."&type=".$_REQ["type"]."&stat=".$stat."&st=".$st; 

		   echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";


		
			}



//list keva namespace



if(!isset($_REQ["asset"]) & !isset($_REQ["txid"]))

	{
	

		echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php?lang=".$_REQUEST["lang"]."><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"asset\" maxlength=\"64\" placeholder=\"NAME ADDRESS, BLOCK NUMBER, TXID...\">";

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

$sortarr=array();
$sortto=array();

foreach($age as $y_value=>$y)

			{

			extract($y);

			$sort = $kpc->keva_get($namespaceId,sort);
	
			$sort=trim(strip_tags($sort['value']));

		

			$sortarr['sort']=$sort;
			$sortarr['displayName']=$displayName;
			$sortarr['namespaceId']=$namespaceId;

			array_push($sortto,$sortarr);
			}


arsort($sortto);



			foreach($sortto as $x_value=>$x)

			{

			extract($x);


			$hide = $kpc->keva_get($namespaceId,hide);

			if(isset($_REQ["addtx"])){

				$txx=$_REQ["addtx"];
			
			$addtx="&mode=1&title=".$txx."&nameid=".$_REQ["nameid"];


			}

if(isset($_REQ["bludit"])){$bludit="/bludit/";}

			if(!$hide['value'] ){


			$x_value=$displayName;


			echo "<a href=".$bludit."?lang=".$_REQUEST["lang"]."&asset=".$namespaceId."&ismine=1".$addtx."&gname=".bin2hex($x_value)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$x_value." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$namespaceId."</p></a></li>";

			}
			else
				{
			if($hidenkey==0){


			$x_value=$displayName;


			echo "<a href=".$bludit."?lang=".$_REQUEST["lang"]."&asset=".$namespaceId."&ismine=1".$addtx."&gname=".bin2hex($x_value)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$x_value." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$namespaceId."</p></a></li>";

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

echo "<div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"\"><li style=\"text-align:center;list-style:none;color: #28f428;font-size: 30px;letter-spacing:4px;margin-top:5px;padding-top:5px;padding-right:25px;height:45px;background-color:#0b0c0d;}\"><a href=keva.php style=\"color: #28f428;text-decoration: none;\">GALAXY</a></li></ul></div>";


		


		//rpc

if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}

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

		 elseif($gstat=="follower"){

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

		

		echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";

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

				if($namespace==$s["namespaceId"]){$arr["follow"]=$s["initiator"];$arr["gname"]=$s["display_name"];break;}


				}

			If($key=="ID"){$title=$value;}

			if($namespace==$asset){$arr["gname"]=$title;}

			
			array_push($totalass,$arr);

			

			
			
	
			}


			arsort($totalass);

			$listasset=$totalass;




			if(isset($_REQ["key"])) {

			$kkey=trim($_REQ["key"]);


			//value


					foreach ($listasset as $k=>$v) 

							{
							
								extract($v);

								

								
								$key=str_replace("%20"," ",$key);
								
								$key1=bin2hex(trim($key));
								$key2=$kkey;
								

		
								if($key1==$key2){

								

								$fkey=$key;

								$heightm=$heightx;

								$x_value="<h4>".$key."</h4>";

								//comment

								
			
								 if(stristr($value,"::") == true)
									{
									
										$commtool=explode('::', $value);

										$value=$commtool[0];

									    foreach ($commtool as $tool) 

											{

											 if(stristr($tool,"RAVENCOIN_COMMENT_ADDRESS") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("RAVENCOIN_COMMENT_ADDRESS:","",$tool)));
													}
											
											
											}

									}

								//begin

							

	

								if(strlen($key)==64){


									$txcount=1;
									$txloop=$key;
									$totalassx=array();
									$arrx=array();

									while($txcount<=$kevaadd) {
									
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

											$kadd=$vout["scriptPubKey"]["addresses"][0];

											$arrx["block"]=$txcount;
											$arrx["sadd"]=$kadd;
											$arrx["snewkey"]=hex2bin($cons);
											$arrx["sinfo"]=str_replace("\n","<br>",hex2bin($conk));
											$arrx["txa"]=$txloop;

											

											$arrx["size"]=$transaction['size'];

											$txloop=$arrx["snewkey"];
						
											array_push($totalassx,$arrx);

											

											if(strlen($txloop)<>64){break;}
													
								
													}
												
												}
											}

											arsort($totalassx);

											

										foreach ($totalassx as $txk=>$txv) 

												{
							
											extract($txv);
											
											

											$combine=$combine.$asset." ".$snewkey."<br>";
											
											//$combine=$combine.$asset." ".$txa."\r\n";

											if(strlen($snewkey)<>64){
											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><h4>".$snewkey."</h4></li>";}

											
											$newrvncheck=trim(strip_tags($sinfo));
										
										if(strlen($newrvncheck)=="46" & stristr($newrvncheck,"Qm") == true){
											$ipfscon=trim(strip_tags($ipfscon));
											$sinfo="<a href=".$ipfscon."".$newrvncheck." target=_blank>".$newrvncheck."</a>";
											}



											echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;text-align:left;\">".turnUrlIntoHyperlink($sinfo)."</li>";

												if(strlen($snewkey)<>64 or $block==$txcount){

											
											$checkcnp=$kpc->keva_group_filter($_REQ["checknp"]);

											$assetm="";

											foreach($checkcnp as $da=>$db) {

												if($db["txid"]==$txa){ $assetm=$db["namespace"];}



											}
											
											if(!$assetm){$assetm=$asset;}
													

											echo "<li style=\"background-color: rgb(0, 0, 0);border: 0px solid #000;display:block;height:auto;width:90%;font-size:10px;padding-left:20px;letter-spacing:1px;word-break: normal;\"><p align=right><a href=?lang=".$_REQUEST["lang"]."&asset=".$assetm."&key=".bin2hex($snewkey).">".$txa."</a> [ <a href=https://explorer.kevacoin.org/address/".$sadd." target=_blank>address</a> ]</p></li>";}	}	
											

												}
									
								else{

								

								echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;\"><h4>".$key."</h4></li>";}

									if(stristr($value,$asset) == false or stristr($key,"_g") == true)
										
									{

										$valuex=str_replace("\n","<br>",$value);

										if(stristr($key,"_g") == true)
											
										{

										$value=str_replace("_g:","",$key);
										
										}

										
										$kevakeytest=$kpc->keva_filter($value);

										$kevaerr = $kpc->error;

										if(!$kevaerr)
							
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


										$newrvncheck=trim(strip_tags($valuex));
										
										if(strlen($newrvncheck)=="46" & stristr($newrvncheck,"Qm") == true){
											
											$ipfscon=trim(strip_tags($ipfscon));

											$valuex="<a href=".$ipfscon."".$newrvncheck." target=_blank>".$newrvncheck."</a>";
											}

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;text-align:left;\">".turnUrlIntoHyperlink($valuex)."</li>";}
												


											}
											
											}

								else

									{
										$value=str_replace("<p>","",$value);
										$value=str_replace("</p>","",$value);
										$value=str_replace("\r\n\r\n","<br>",$value);
										$value=str_replace("\r\n","<br>",$value);

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;text-align:left;\">".turnUrlIntoHyperlink($value)."</li>";

										$arr1=explode("\r\n",$value);

										$arr1=explode("<br>",$value);


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



	
$combine=$combine.$asset." ".$txa."<br>";

	//ismine


if($_REQ["ismine"]=="1"){$ismine=1;}else{

		$vadd= $kpc->validateaddress($address);

		extract($vadd);}

		$gnamekey=hex2bin($_REQ["gname"]);


		//comment


			//button

			$age= $kpc->keva_list_namespaces();

			$error = $kpc->error;
			if($error != "") 	
				{
					echo "<p>&nbsp;&nbsp;Error</p>";
					exit;
				}

			foreach($age as $nspace)

				{
			
			if($nspace['displayName']=="COMMENT"){$cspace=$nspace['namespaceId'];}
				}

			
			
			
			if($ismine=="1"){$cspace=$asset;}

			if($webmode==0)
			
			{

			if(!$cspace){echo "</ul><ul><a href=?lang=&asset=&mode=4&nameid=&createname=COMMENT><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_create_comment." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3></font></li>";}

			else
			{
			

			echo "</ul><ul><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><a href=\"?lang=".$_REQUEST["lang"]."&mode=1&asset=".$cspace."&title=".bin2hex($txx)."&nameid=".bin2hex($key)."&cadd=".$commentadd."&spid=".$asset."\"><h4>[ + ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=\"?lang=".$_REQUEST["lang"]."&addtx=".bin2hex($txx)."&nameid=".bin2hex($key)."\"><font size=3>ADD MORE</font></a></li>";
			
			echo "<a href=\"?lang=".$_REQUEST["lang"]."&mode=1&asset=".$cspace."&title=&nameid=".bin2hex($key)."&cadd=".$commentadd."&combine=".bin2hex($combine)."\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ COMBINE ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>ALL THE WORDS</font></li>";}}

		//tips




			if(isset($commentadd)){
//tag

			echo "<li style=\"background-color: rgb(0, 0, 0);display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
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



			


			if($webmode==0)
			
			{
			




			echo "<a href=\"message.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&cadd=".$commentadd."&spid=".$asset."&spti=".bin2hex($key)."&sign=1\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_sign." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$keva_signtalk."</font></li>";

			
			
			echo "<a href=\"message.php?lang=".$_REQUEST["lang"]."&txid=b5923a655df278da1b82faab6391b7571ff18fb83ec2125763c5a7e2723ba00d&cadd=".$commentadd."&spid=".$asset."&spti=".bin2hex($key)."\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_tips." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>[ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$commentadd."&mode=8&tips=1>&nbsp;0.1&nbsp;</a> ] [ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$commentadd."&mode=8&tips=10>&nbsp;&nbsp;1&nbsp;&nbsp;</a> ] [ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$commentadd."&mode=8&tips=100>&nbsp;10&nbsp;</a> ] <a href=https://ravencoin.network/address/".$commentadd." target=_blank>RVN</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
		if(strlen($adds)==34){echo "[ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$adds."&mode=7&tips=1>&nbsp;&nbsp;1&nbsp;&nbsp;</a> ] [ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$adds."&mode=7&tips=10>&nbsp;10&nbsp;</a> ] [ <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&adds=".$adds."&mode=7&tips=100>&nbsp;100&nbsp;</a> ] <a href=https://explorer.kevacoin.org/address/".$adds." target=_blank>CREDITS</a>";$adds="";}	

		echo "</font></li></ul><ul>";

			}else

			{
			
			echo "</ul><ul><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_comment." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$commentadd."</font></li>";




			
			echo "<li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_tips." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3><a href=https://ravencoin.network/address/".$commentadd." target=_blank>RVN</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=https://explorer.kevacoin.org/address/".$adds." target=_blank>CREDITS</a></font></li></ul><ul>";
			}

			echo "<li style=\"background-color: rgb(0, 0, 0);display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
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
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#888;color:#eee;\">&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "<a href=\"https://ravenx.net\" style=\"background-color:#888;\" target=_blank>&nbsp;&nbsp;RAVENX.NET&nbsp;&nbsp;</a>&nbsp;&nbsp;</p></li></ul><ul>";
		
		
				$blocknum=$rpc->getblockcount();
				$blocknum=$blocknum-10000;
				$blockhash=$rpc->getblockhash($blocknum);

				$agex= $rpc->listsinceblock($blockhash);


			$error = $rpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}


			$arrx=array();
			$totalassx=array();


		foreach($agex['asset_transactions'] as $g_value=>$g)

				{

		extract($g);

	

		if($category=="receive"){

			$txx2= $rpc->getrawtransaction($txid);
			$raw= $rpc->decoderawtransaction($txx2);


if(strcmp($destination,$commentadd)==0)
			{

			$arrx["time"]=$time;
			$arrx["block"]=$confirmations;
			
			$arrx["name"]=$asset_name;
			$arrx["ipfs"]=$message;
			$arrx["to"]=$destination;

			if(($raw['vout'][2]['scriptPubKey']['type'])=="transfer_asset")
							{
					$arrx["from"]=$raw['vout'][2]['scriptPubKey']['addresses'][0];
							}

			
	
					array_push($totalassx,$arrx);}


					}


				}

		arsort($totalassx);

	

		foreach($totalassx as $commone){
		
		$transaction= $kpc->getrawtransaction($commone['ipfs'],1);

			$blockhash=$kpc->getblock($transaction["blockhash"]);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_PUT') 
						{

					 $cons=$arr[2];
					 $conk=$arr[3];

					//$cons=hex2bin($cons);
					  $conk=hex2bin($conk);

						$x_value=$commone['name'];
						
						$assetlink=$x_value;
						$assettwo=$x_value;


						
						
						$x_value=uniworld($x_value,$assetlink,$assettwo);

						$x_value=str_replace("_"," ",$x_value);
						
						$clink="[ Tx:".$x_value." ] <a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$commone['ipfs'].">[ TxID ] </a> [ ".date('Y-m-d H:i', $commone['time'])." ] ";

						if($commone['ipfs']<>"b5923a655df278da1b82faab6391b7571ff18fb83ec2125763c5a7e2723ba00d"){

						echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;margin-top:15px;\"><p  align=left><br>".turnUrlIntoHyperlink($conk)."<br><br><p align=right style=\"font-size:16px;\">".$clink."&nbsp;</p></li>";}

				
						} 

				 }

			}

			


		
		}
        



		//workarea

		if($ismine=="1" & $keva_add=="on"){
			
		echo "</ul><ul><a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$asset."&title=".bin2hex($fkey)."&nameid=".bin2hex($title)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_edit." ]</a> ".$keva_kcode." [ <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightm."&np=".$asset."&npn=".bin2hex($gnamekey).">".$heightm."</a> ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&np=".$asset."&npn=".bin2hex($gnamekey)."><font size=1>".$txx."</font></a></li>";
		
		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&key=".bin2hex($fkey)."&title=".$title."&sname=".$sname."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$gnamekey."</font> ".$addend."</li>";

			echo "<a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$asset."&title=".bin2hex($fkey)."&nameid=".$title."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_delete." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>".hex2bin($_REQ["key"])."  ".$addend."</font></li>";


										}


										else

										{
				
			echo "</ul><ul><p><a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&np=".$asset."&npn=".bin2hex($gnamekey)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>TXID</a> [ <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightm."&np=".$asset."&npn=".bin2hex($gnamekey).">".$heightm."</a> ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>".$txx."</font></li>";
			
										}

		
//linkipfs	

			$linkipfs = json_decode($returnContent, true);

			
			$ipfscon=$ipfscon."".$linkipfs['data']['hash_urls'][0];

			$ipfscon=strip_tags($ipfscon);

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&key=".bin2hex($fkey)."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</a> <a href=qr.php?np=".$asset."&key=".bin2hex($fkey)." target=_blank>[ QR CODE ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=\"".$ipfscon."\"  target=_blank><font size=1>".$linkipfs['data']['hash_urls'][0]."</font></a></li>";

//broadcast 
if($webmode==0){

			echo "<a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&ipfs=".$linkipfs['data']['hash_urls'][0]."&spti=".bin2hex($key)."&spid=".$asset."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_broadcast." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a></li>";

//message

			echo "<a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx."&ipfs=".$linkipfs['data']['hash_urls'][0]."&spti=".bin2hex($key)."&spid=".$asset."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_message." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a></li>";}

//galaxylink

			//echo "<a href=http://galaxyos.io/subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_galaxylink." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>galaxyos.io/subscription.php?lang=".$_REQUEST["lang"]."&txid=".$txx."</font></a></li>";

//join group

echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=4&follow=1><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ FOLLOW ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>follow ".$gnamekey."</font></a></li>";

			//galaxylink

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ BACK TO ".$gnamekey." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$asset."</font></a></li>";



									}
								}





							}
//article over
					else



//menu


							{


			//menu


			$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

		
		

			$title=$namespace['value'];

			
//iot

if($title=="IOT"){$hidemkey=1;$switch=9;}

//ismine


if($_REQ["ismine"]=="1"){$ismine=1;}else{

		$vadd= $kpc->validateaddress($address);




		extract($vadd);}

		

		if($hidemkey==0){

		echo "<li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$title." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"font-size:18px\">".$asset."</p></li>";

		echo"<li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;color:#bbb;display:block;\"><form action=\"keva.php\" method=\"post\" ><h4><input type=\"text\" name=\"title\" maxlength=\"64\" placeholder=\"TITLE\" style=\"width:200px;\"><input type=\"hidden\" name=\"fromasset\" value=\"".$shopaddress."\"> <input type=\"submit\" value=\"".$keva_kaw."\"></h4><input type=\"hidden\" name=\"asset\" value=".$_REQ["asset"]." /></form></li>";	

			//group



		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=".$gchange."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ GROUP:".$gstat." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><font size=3 color=ffffff> ".$fing." <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=all&manageg=following>Following</a> &nbsp; ".$fer." <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=all&manageg=follower>Followers</a></font></li>";

		//milestone

			echo "<a href=stone.php?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=11&stone=1&group=".$gstat." target=_blank><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ MILESTONE ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\">-</a></li>";

		if($_REQ["showall"]=="11"){
			
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=1&ismine=".$ismine."&group=".$gstat."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_showlist." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"></li>";

$linkipfs = json_decode($returnContent, true);

			$ipfscon=trim(strip_tags($ipfscon));


			$ipfscon=str_replace("http://gotoipfs.com/#path=",$ipfscon,$linkipfs['data']['hash_urls'][1]);

			


//ipfs

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=".$ipfscon." target=_blank><font size=1>".$linkipfs['data']['hash_urls'][0]."</font></a></li>";

//bludit

if($gstat=="no"){$gnameto="&gname=".bin2hex($title);}

			echo "<a href=bludit/?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=11&bludit=1&group=".$gstat."".$gnameto." target=_blank><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ BLUDIT ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\">-</a></li>";
			
			}
		

			
		
		
		
		
		else 
			
		{echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&showall=11&ismine=".$ismine."&group=".$gstat."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_showall." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\">-</a></li>";

		}

	



		

		


		if($ismine=="1"  & $keva_add=="on"){echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=1&nameid=".bin2hex($title)."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_addnew." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=2>".$keva_addnewmemo."</font></a></li>";

	

		//echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$title."&sname=".$sname."&mode=3><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">".$title."</font> ".$addend."</p></li>";
		
		if($title=="CONSOLE"){
		
		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&title=".$title."&sname=".$sname."&mode=6><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ONE-KEY SETUP ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">AUTOMATIC CREATE CONSOLE</p></li>";}
		}

		





			//echo "<a href=http://galaxyos.io/keva.php?asset=".$asset."><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_galaxylink." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1>galaxyos.io/keva.php?asset=".$asset."</font></a></li>";


				$sname=$_REQ["sname"];
				if(!$_REQ["sname"]){$sname=strtoupper($title);}

	

//add group

if($_REQ["manageg"]=="following" or $_REQ["manageg"]=="follower"){

	if($keva_add=="on"){

echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=4><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ JOIN GROUP ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"font-size:18px\">follow namespace</p></li>";}}



		}

echo "</ul><ul>";



//manage follow




		if($_REQ["manageg"]=="following")
			
		{

			foreach($gshow as $s_value=>$s)

			{

			if($s["initiator"]=='1'){continue;}

	
			$key2=$s["display_name"];
			$value=$s["namespaceId"];


			//follow

			
	
			$valuex="<font size=3><a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&unfollow=".$value.">Unfollow</a></font>";

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$value."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\"><h4>".$key2."</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex." ".$stati." ".$iotcopy."</p></li>";}


			echo "</ul></div></div></ul></div></div>";

			exit;
			
		
		}


		if($_REQ["manageg"]=="follower")
			
		{

			foreach($gshow as $s_value=>$s)

			{

			if($s["initiator"]=='0'){continue;}

	
			$key2=$s["display_name"];
			$value=$s["namespaceId"];


			//follow

		
	
			$valuex="<font size=3><a href=?lang=".$_REQUEST["lang"]."&joingroup=".$asset."&namep=".$value.">follow</a></font>";

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$value."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\"><h4>".$key2."</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex." ".$stati." ".$iotcopy."</p></li>";}


			echo "</ul></div></div></ul></div></div>";

			exit;
			
		
		}



//list

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

										
						
		
											if(strlen($txloop)<>64){$key2="RE:".$txloop;break;}
													
								
													}
												
												}
											}

										
		
		
		}

			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

	if($gstat=="no"){$nmspace=$asset;$gnamespace=$asset;$gname=$title;}else{$nmspace=$gnamespace;$ismine=0;}

if($gnamespace==$asset){$gname=$title;};

if(strlen($_REQ["showall"])<2)
	
			{

$value=strip_tags($value,"");

	$valuex=$value;



			

			if(stristr($value,"decodeURIComponent") == true){
				
				if($hidemkey==0  & $keva_add=="on"){

				

				$valuex="<font size=1>".$txx." <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$nmspace."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$nmspace."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a> <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightx.">[ ".$heightx." ]</a></font>";
				
				
				}

				else {
				
				$arrhiden=explode("\r\n",$value);

				$valuex=$arrhiden[0];

				}
				
				}

			if(strlen($value)==34  & $keva_add=="on" & !$_REQ["manageg"]){

				$valuex="<font size=1>".$txx." [ ".$heightx." ] <a href=?lang=".$_REQUEST["lang"]."&mode=1&asset=".$nmspace."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_edit." ]</a> <a href=?lang=".$_REQUEST["lang"]."&mode=5&asset=".$nmspace."&title=".bin2hex($key)."&nameid=".bin2hex($title).">[ ".$keva_delete." ]</a> <a href=channel.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_broadcast." ]</a> <a href=message.php?lang=".$_REQUEST["lang"]."&txid=".$txx.">[ ".$keva_message." ]</a></font>";}
				






			if(strlen($value)>18 & stristr($value,"decodeURIComponent")== false & strlen($value)<>34){

				$valuex=mb_substr($value,0,18,'utf8')."...";}



			if(strlen($x_value)>60){

				$x_value="<p><font size=2>".$x_value."</font></p>";}


			


			
			//$key=str_replace(" ","%20",$key);

			
			if(stristr($value,$_REQ["title"])==true or stristr(key,$_REQ["title"])==true){
			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$nmspace."&title=".bin2hex($key)."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex."</p></li>";
			
			}

//iot

if($title=="IOT"){$iotcopy="<a href=?lang=".$_REQUEST["lang"]."&asset=".$nmspace."&title=".$keylink."&key=".bin2hex($key)."&mode=10 target=_blank><font size=3>( LINK )</font></a>";}

			if(!isset($_REQ["title"])){

			$stati=$_REQUEST["stat"];

			if($_REQUEST["st"]=="0" & trim($valuex)=="off"){$stati="";}

			if($_REQUEST["st"]=="1" & trim($valuex)=="on"){$stati="";}



			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$nmspace."&title=".$keylink."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&mode=".$switch."&type=".$_REQ["type"]."&ismine=".$ismine."&group=".$gchange."&gname=".bin2hex($gname)."&checknp=".$asset."><li style=\"background-color: rgb(0, 79, 74);height:130px;width:600px;display:block;\">".$x_value."<hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$valuex." ".$stati." ".$iotcopy."</p></li>";
							}

			}

			else

			{

//showall

			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}


			$clink="[ <a href=?lang=".$_REQUEST["lang"]."&asset=".$gnamespace.">".$gname."</a> ] [ ".$gnamespace." ] [ ".date('Y-m-d H:i', $gtime)." ] ";

			echo "<li style=\"background-color: rgb(0, 79,74);display:block;height:auto;width:900px;\"><a href=?lang=".$_REQUEST["lang"]."&asset=".$nmspace."&title=".bin2hex($key)."&key=".bin2hex($key)."&sname=".$_REQ["sname"]."&ismine=".$ismine."&group=".$gchange."&gname=".bin2hex($gname)."&checknp=".$asset."><h4>".$x_value."</h4></a></li>";

			$valuex=str_replace("\n","<br>",$value);


			echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;text-align:left;width:900px;\"><p align=left>".turnUrlIntoHyperlink($valuex)."</p><br><br><p align=right style=\"font-size:16px;\">".$clink."&nbsp;</p></li>";

				

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