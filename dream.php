<?php
error_reporting(0);

$localip='127.0.0.1';

$ipfscon="https://ipfs.globalupload.io/";

$ismine="1";
$keva_add="on";
$kevaadd=30;

//galaxy rpc setting

$grpcuser='galaxy';
$grpcpass='frontier';
$grpcportk='9992';
$grpcportr='9991';

//ravencoin rpc setting

$rrpcuser=$grpcuser;
$rrpcpass=$grpcpass;
$rrpchost=$localip;
$rrpcport=$grpcportr;

//kevacoin rpc setting

$krpcuser=$grpcuser;
$krpcpass=$grpcpass;
$krpchost=$localip;
$krpcport=$grpcportk;




class Keva {
    var $username;
    var $password;
    private $proto;
    var $host;
    var $port;
    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = $username; // RPC Username
        $this->password      = $password; // RPC Password
        $this->host          = $host; // Localhost
        $this->port          = $port;
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}




class Raven {

    var $username;
    var $password;
    private $proto;
    var $host;
    var $port;
    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = $username; // RPC Username
        $this->password      = $password; // RPC Password
        $this->host          = $host; // Localhost
        $this->port          = $port;
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}

//unicode transform

function uniworld($x_value,$address,$asset) {

	
$testvalue = $x_value;

//rasset

$letterr="$";
$lettera="!";


if($letterr==substr($x_value,0,1)){ 

$x_value=str_replace("$","",$x_value);
$address=str_replace("$","",$address);
$asset=str_replace("$","",$asset);

$lettercheck=1;
}

if($lettera==substr($x_value,-1)){ 
	
$x_value=str_replace("!","",$x_value);
$address=str_replace("!","",$address);
$asset=str_replace("!","",$asset);
$lettercheck=2;
}

//test

$search = array('g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

    foreach($search as $value){

	if(preg_match ( "'/'", $testvalue)){

			list($aleft,$aright)=explode("/",$testvalue);
		
		if(stristr($aleft,$value)!==false & stristr($aright,$value)!==false)

				{ return $x_value;}
	}

	if(preg_match ( "'#'", $testvalue)){

			list($aleft,$aright)=explode("#",$testvalue);
		
		if(stristr($aleft,$value)!==false & stristr($aright,$value)!==false  & preg_match( "'_'", $aright)==false)

				{ return $x_value;}

	}
       if(preg_match ( "'#'", $testvalue)==false & preg_match ( "'/'", $testvalue)==false & stristr($testvalue,$value)!==false){
           return $x_value;
				}
    }

//u.

$x_value=str_replace("U.","U+",$x_value);
				
				$x_value = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $x_value), ENT_NOQUOTES, 'UTF-8');

				$x_value=str_replace("U+","U.",$x_value);
				
//no special


if(strlen($x_value)==strlen($address) && preg_match ('/^[-a-zA-Z0-9 .]+$/', $x_value )){


$assetsplit=str_split($asset,4);

foreach($assetsplit as $assety)

	{

$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);}

}
else
	{
if(preg_match ('/^[-a-zA-Z0-9 .]+$/', $x_value ) && (strlen($x_value) % 4) && strlen($x_value))
					{
	
	$assetsplit=str_split($x_value,4);

foreach($assetsplit as $assety)
	
{
$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);
	

		}
	}
	else{
			
			//sub asset

		if(preg_match ( "'/'", $x_value)){

			list($aleft,$aright)=explode("/",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}

		//#asset

		if(preg_match ( "'#'", $x_value) ){

			list($aleft,$aright)=explode("#",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}


		//ID_and Lang

		

		if(preg_match ( "'_'", $x_value) ){

			list($aleft,$aright)=explode("_",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}



		}


								//else
if (!(strlen($asset) % 4) && strlen($asset)){
							$assetsplit=str_split($asset,4);

							foreach($assetsplit as $assety)
								{
								$assetx="U+".$assety."";
								$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);
								}}
	}
 }

if($lettercheck==1){ $x_value="$".$x_value;}
if($lettercheck==2){ $x_value=$x_value."!";}

 return $x_value;
}


function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return array($httpCode, $response);
}


function turnUrlIntoHyperlink($text){

/*

$url_pattern = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   

if(strpos($text,"<img")==false){

$text= preg_replace($url_pattern, '<a href="$0">$0</a>', $text);}

*/
          
return $text;
}


//language

$keva_myaddress="KEVA ADDRESS";
$keva_newspace="CREATE NEW SPACE";
$keva_free="GET FREE CREDIT";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";
$keva_submit="SUBMIT";
$keva_kaw="KAW";
$keva_showall="SHOW ALL CONTENTS";
$keva_showlist="SHOW LIST";
$keva_addnew="CREATE NEW WORD";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="SUBSCRIBE";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="LINK IPFS";
$keva_edit="EDIT";
$keva_delete="DEL";
$keva_broadcast="BROADCAST";
$keva_galaxylink="GALAXY LINK";
$keva_message="MESSAGE";
$keva_send="SEND";

$keva_comment="COMMENT";
$keva_create_comment="CREATE COMMENT SPACE";
$keva_sign="SIGN";
$keva_signtalk="MANAGE SIGNATURE TAG NAME";
$keva_tips="TIPS & GIFTS";




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



//you need create namespace force

$ageu= $kpc->keva_list_namespaces();

			$error = $kpc->error;
			if($error != "") 	
				{
					echo "<p>&nbsp;&nbsp;Error</p>";
					exit;
				}

			foreach($ageu as $nspace)

				{
			
			if($nspace['displayName']=="Animal Crossing Dream"){$force_namespace=$nspace['namespaceId'];}
				
				}



//creat new to blockchain




if($_REQ["newasset"]<>"") 
	
	
	{


sleep(1);

//txid

$gettxid=trim(strip_tags($_REQ["newasset"]));



$checknum=str_replace("-","",$gettxid);

$forsub="DA-".$_REQ["newasset"];
$nameid=$_REQ["spti"];

if(is_numeric($checknum)==true & strlen($gettxid)==14){
	
	
	
$checknp=$kpc->keva_group_get($force_namespace,$forsub);

if($checknp['height']<>""){




$url ="dream.php?lang=&txid=".$checknp['txid']."&title=".bin2hex($forsub)."&key=".bin2hex($forsub)."&block=".$checknp['height']."&pending=2";

echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

exit;

}

else{

$pass=0;}

}

else

{echo"<script>alert('Not Dream Code');</script>";

$url="dream.php";

echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

exit;

}



//add neww

if($pass==0)
	
{





$newaddress=$rpc->getnewaddress();

$fortit=$newaddress;



$age= $kpc->keva_put($force_namespace,$forsub,$fortit);

$error = $kpc->error;

if($error != "" or !$newaddress) 
	
	{

echo"<script>alert('Error');</script>";

$url ="dream.php?hvalue=".$_REQ["newasset"];
	  

	}

	else
	
	{

$url ="dream.php?lang=&txid=".$age['txid']."&title=".bin2hex($fortit)."&key=".bin2hex($fortit)."&pending=2";


	}


echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";


	}

}

//addnew


if(!$_REQ["pending"]){


	//keva account

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


		
		



echo "<html lang=\"en\" dir=\"ltr\"></html><head><title>GALAXY</title><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

echo "<style>html, body {background-color: #0b0c0d;color: #fff;font-size: 15px;margin: 0 auto -100px;padding: 0;}a:link,a:visited,a:active{transition:0.5s;color: #28f428;	text-decoration: none;}a:hover { color:yellow; }.timeline {width:380px;padding-top:20px;position: relative;}.timeline:before {content: '';position: absolute;top: 0px;left: calc(42%);bottom: 0px;width: 2px;background: #ddd;}.timeline:after {content: ''; display: table;clear: both;}.entry {clear: both;text-align: left;position: relative;}.entry .title {margin-bottom: .5em;font-size:16px;float: left;width: 40%;text-align: right;position: relative;}.entry .title:before {}.entry .title h3 {margin: 0;font-size: 120%;}.entry .title p {margin: 0;line-height:30px;font-size: 100%;}.entry .body {float: right;font-size:16px;width: 55%;padding-top:1px;}.entry .body p {line-height: 1.4em;}.entry .body p:first-child {margin-top: 0;font-weight: 400;}entry .body ul {color: #ddd;padding-left: 0;list-style-type: none;}.entry .body ul li:before {content: '¨C';margin-right: .5em;}</style>";

echo "</head>";

echo "<body style=\"background-color: #0b0c0d;\">";


echo "<div style=\"padding: 5px;margin-bottom: 10px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);text-align:right;font-size:10px;\"><p style=\"padding-right:7px;\">[ <a href=https://explorer.kevacoin.org/address/".$shopaddress." target=_blank><font color=grey>PUBLIC KEVACOIN ADDRESS</font></a> ] [ <a href=\"https://api.qrserver.com/v1/create-qr-code/?size=300x300&data="."http://".$_SERVER['HTTP_HOST']."/dream\" target=_blank><font color=grey>Dream QR CODE</font></a> ]</p></div>";
		

			echo "<form action=\"\" method=\"post\" >";	

			if(!$value){$value=hex2bin($_REQUEST["hvalue"]);}

			$titvalue=hex2bin($_REQUEST["title"]);
			$nameid=hex2bin($_REQ['nameid']);
		

		

			echo "<input type=\"hidden\" name=\"title\" value=\"".$titvalue."\">";
			
			echo "<div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"padding-left:30px;border: 0px solid #59fbea;height:50px;margin-top:5px;padding-top:10px;\"><li style=\"list-style:none;color: #28f428;font-size:30px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;\"><center>";

			echo "DA-<input type=\"text\" name=\"newasset\" id=\"editor\" class=\"textarea-inherit\"  style=\"width:260px;border: 1px solid #59fbea;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:36px;font-size: 30px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;
\" value=\"".$_REQUEST["hvalue"]."\" maxlength=14 placeholder=\"0000 0000 0000\"></center></li></ul>";


echo "<li style=\"list-style:none;color: #28f428;font-size:30px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;\">";

echo "<center><input type=\"submit\" value=\"SHARE (".$credit.")\" style=\"border: 1px solid #59fbea;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;height:36px;background-color: rgb(0, 79, 74);color: #59fbea;margin-left:60px;width:180px;font-size: 20px;padding-top:0px;\"></center></li></ul></div>";

echo "<script>document.getElementById(\"editor\").addEventListener(\"input\", function(){var op=\"\";var tmp = document.getElementById(\"editor\").value.replace(/\-/g, \"\");for (var i=0;i<tmp.length;i++){if (i%4===0 && i>0){op = op + \"-\" + tmp.charAt(i);} else {op = op + tmp.charAt(i);} }document.getElementById(\"editor\").value = op;});</script>";
			

			$credit=$credit-10;
			
			if($credit>1){
			
			echo "";}

			else
				{
			
			echo "<br><center><font color=white>CREDIT is not enough to upload datas on blockchain. Please wait/ask others to donate or mining some by yourself.</font></center>";}

			
			echo "</form>";






//menu




			//menu

	$namespace=$force_namespace;

	$asset=$namespace;

	$title="Animal Crossing Dream";




		$asset=trim($asset);
		
		$gstat=$_REQ["group"];

		if(!$gstat){$gstat="following";};

		if($gstat=="following"){$gchange="all";$acshow="COLLECT";}
		if($gstat=="all"){$gchange="follower";$acshow="ALL";}
		
		if($gstat=="follower"){$gchange="following";$acshow="SHARE";}
		

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

//menu list
			
echo "<div style=\"border: 0px solid #59fbea;display:block;width:100%;\"><ul style=\"display:flex;flex-direction: row;flex-wrap: wrap;padding-left:1px;padding-right:5px;\">";
		

		if($hidemkey==0){


			echo "<li style=\"width:550px;border: 1px solid #59fbea;word-break: break-all;background-color: rgb(0, 79, 74);text-align: center;margin-top: 10px;margin-bottom: 7px;margin-right: 5px;margin-left: 1px;padding-top:10px;padding-left:2px;padding-right:2px;flex:auto; background-color: rgb(0, 79, 74);height:120px;display:block;\"><h2>[ ".$title." ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"padding-top:5px;\"><font size=3>".$asset."</font></li>";



			//group





		echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=".$gchange."><li style=\"width:550px;border: 1px solid #59fbea;word-break: break-all;background-color: rgb(0, 79, 74);text-align: center;margin-top: 10px;margin-bottom: 7px;margin-right: 5px;margin-left: 1px;padding-top:10px;padding-left:2px;padding-right:2px;flex:auto; background-color: rgb(0, 79, 74);height:120px;display:block;\"><h2>[ ".$acshow." ]</h2><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p style=\"padding-top:5px;\"><font size=3 color=ffffff> ".$fing." <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=all&manageg=following>COLLECT</a> &nbsp; ".$fer." <a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&ismine=".$ismine."&group=all&manageg=follower>SHARE</a></font></p></li>";







				$sname=$_REQ["sname"];
				if(!$_REQ["sname"]){$sname=strtoupper($title);}

	





		}

echo "</ul><ul style=\"display:flex;flex-direction: row;flex-wrap: wrap;padding-left:1px;padding-right:5px;\">";



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

			echo "<a href=keva.php?lang=".$_REQUEST["lang"]."&asset=".$value."><li style=\"padding-right:5px;width:550px;border: 1px solid #59fbea;word-break: break-all;background-color: rgb(0, 79, 74);text-align: center;margin-top: 10px;margin-bottom: 7px;margin-right: 5px;margin-left: 1px;padding-top:10px;padding-left:2px;padding-right:2px;flex:auto; background-color: rgb(0, 79, 74);height:120px;display:block;\"><h4>".$key2." NAMESPACE</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$value."</p></li>";}


			echo "</ul></div></div>";

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

			echo "<a href=keva.php?lang=".$_REQUEST["lang"]."&asset=".$value."><li style=\"padding-right:5px;width:550px;border: 1px solid #59fbea;word-break: break-all;background-color: rgb(0, 79, 74);text-align: center;margin-top: 10px;margin-bottom: 7px;margin-right: 5px;margin-left: 1px;padding-top:10px;padding-left:2px;padding-right:2px;flex:auto; background-color: rgb(0, 79, 74);height:120px;display:block;\"><h4>".$key2."</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><p>".$value."</p></li>";}


			echo "</ul></div></div></ul></div></div>";

			exit;
			
		
		}



//list

echo "</div><center><div class=\"timeline\">";

$xtime="";

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

	$key2=strip_tags($key,"");
	
		if($gstat=="following"){ if($follow=='1' or $gnamespace==$asset){continue;}}
		if($gstat=="follower"){if($gnamespace==$asset or strlen($key)<>17){continue;}}
		if($gstat=="build"){if($follow=='1'){continue;}}

	
if($gstat=="all"){if(strlen($key)<>17){continue;}}

		
	

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

			$x_value=$key2;

		
			$key=trim($key);
			$keylink=bin2hex($key);

	if($gstat=="no"){$nmspace=$asset;$gnamespace=$asset;$gname=$title;}else{$nmspace=$gnamespace;$ismine=0;}

if($gnamespace==$asset){$gname=$title;};



//showall

	if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);
$stime=date('Ymd',$gtime);
			if($xtime==$stime){$stime="";}

		$xtime=$stime;

		if($gname=="Animal Crossing Dream"){$gname="Dream Code";}

		if(!$gname){$gnamer="";}else{$gnamer=$gname."<br>";}
			if($gnamespace==$asset){$gnamer=$title."<br>";$gnamer="SHARE";}


		
        echo "<div class=\"entry\"><div class=\"title\"><h3>".$gnamer."</h3></div><div class=\"body\"><p><font size=4><b><a href=\"dream.php?lang=&txid=".$txx."&title=".bin2hex($x_value)."&key=".bin2hex($x_value)."&pending=2\">".$x_value."</a></b></font></p></div></div>";
			
		
			
		

				

					

			}


		echo "</div><center>";


	
			

	
exit;

}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GALAXY</title>
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
                width: 500px;
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

if(isset($_REQ["txid"])) 
	
	{

			if($_REQ["mode"]==2)
				
				{

				$url = "http://linkipfs.com";

			
				
				$keylink="http://galaxyos.io/force.php?lang=".$_REQUEST["lang"]."&txid=".$_REQ["txid"];
				
				$keylink=str_replace(" ","%20",$keylink);

				$keylink = str_replace("&","%26",$keylink);

				$jsonStr = '{"url": "'.$keylink.'"}';
		
			list($returnCode, $returnContent) = http_post_json($url, $jsonStr);


				}


echo "<div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"\"><li style=\"text-align:center;list-style:none;color: #28f428;font-size: 30px;letter-spacing:4px;margin-top:5px;padding-top:5px;padding-right:25px;height:45px;background-color:#0b0c0d;}\"><a href=/ style=\"color: #28f428;text-decoration: none;\">GALAXY</a></li></ul></div>";

echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";

$txidget=$_REQ["txid"];

		

		$transaction= $kpc->getrawtransaction($txidget,1);

			$blockhash=$kpc->getblock($transaction["blockhash"]);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_PUT') 
						{

					 $key=hex2bin($arr[2]);
					 $value=hex2bin($arr[3]);

					 $kadd=$vout["scriptPubKey"]["addresses"][0];

					 $blockone=$locktime;
				
						} 

				 }
				 $heightm=$blockhash["height"];
				
				 


			//value


				
							
							

								
								$key=str_replace("%20"," ",$key);
								
								$key1=bin2hex(trim($key));
								$key2=$kkey;
								
			

								$fkey=$key;

								

								$x_value="<h4>".$key."</h4>";

						

								//begin

							
								//title

								$gettxid=trim(strip_tags($txidget));

								

	
		


								if(strlen($gettxid)=="64"){


									$txcount=1;
									$txloop=$gettxid;
									$totalassx=array();
									$arrx=array();

									
										$valuex=str_replace("\n","<br>",$value);

										$newrvncheck=trim(strip_tags($valuex));
										
										if(strlen($valuex)<>34){$valuex="";}

										$commentadd=$valuex;

										if($_REQ["block"]<>""){$blocknum="/BLOCK ".$_REQ["block"];}
						
										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;\"><h4>Dream Code</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><p style=\"padding-top:20px;\"><font size=10>".$key."</font></p></li>";

										if(strlen($key)<>17){
										
										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;\"><p>".$value."</p></li>";
										
										}
														

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;\"><h4>RAVENCOIN ADDRESS</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=2><a href=https://ravencoin.network/address/".$valuex." target=_blank>".$valuex."</a></font></li>";

										echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;\"><h4>KEVACOIN TXID".$blocknum."</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=2>".$txidget."</font></li>";


										

									
											
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



	
$combine=$combine.$asset." ".$txa."\r\n";


		//comment


			//button

		
			echo "</ul><ul><a href=\"?lang=".$_REQUEST["lang"]."\"><li style=\"background-color: rgb(0, 79, 74);height:100px;display:block;\"><h4>[ HOME ]</h4></a></li></ul><ul>";

		//tips




			if(isset($commentadd)){
//tag

	$giftasset=$rpc->listtagsforaddress($commentadd);

			if(empty($giftasset)==false){

			echo "<li style=\"background-color: rgb(0, 0, 0);display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
		

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
			
			echo "</ul><ul>";

			}

			$giftasset=$rpc->listassetbalancesbyaddress($commentadd);

		
			if(empty($giftasset)==false){

			echo "<li style=\"background-color: rgb(0, 0, 0);display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
		
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
		
			echo "</p></li></ul><ul>";
			}
		
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

		
		if(strlen($commone['ipfs'])=="46"){

			$clink="[ Tx:".$x_value." ] <a href=".$ipfscon."".$commone['ipfs'].">[ IPFS ] </a> [ ".date('Y-m-d H:i', $commone['time'])." ] ";

						echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;margin-top:15px;\"><p  align=left><br><img src=\"".$ipfscon."".$commone['ipfs']."\" width=\"800\"><br><br><p align=right style=\"font-size:16px;\">".$clink."&nbsp;</p></li>";

				
						} 

		
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

						echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:auto;width:900px;margin-top:15px;\"><p  align=left><br>".$conk."<br><br><p align=right style=\"font-size:16px;\">".$clink."&nbsp;</p></li>";}

				
						} 

				 }

			

			
			}

		
		}
        
	

		//workarea

/*
	echo "</ul><ul><li style=\"background-color: rgb(0, 79, 74);height:100px;display:block;\"><h4>HOW TO MANAGE DATAS ON BLOCKCHAIN</h4></li>";
			
			
	echo "</ul><ul><a href=\"system.php\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ SYSTEM ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>EXPLORER DATA ON KEVACOIN BLOCKCHAIN</font></li>";

	echo "<a href=\"keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=4348414e4745&key=4348414e4745\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ CHANGE ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=2>CHANGE RAVENCOIN ADDRESS & GET NAMESPACE KEY CONTENT</font></li>";

		echo "<a href=\"keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=5349474e4154555245&key=5349474e4154555245\"><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_sign." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$keva_signtalk."</font></li>";
			
			
			echo "<a href=keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=45444954&key=45444954><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_edit." ]</a> ".$keva_kcode." [ <a href=subscription.php?lang=".$_REQUEST["lang"]."&block=".$heightm.">".$heightm."</a> ]</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"></a><font size=3>EDIT AND OPEN DATA WITH BLOCK NUMBER</font></li>";
		
			echo "<a href=keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=535542534352494245&key=535542534352494245><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_subscribe." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>LET EVERYONE GET YOUR DATA</font></li>";

			echo "<a href=keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=44454c&key=44454c><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_delete." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>UNLINK THE DATA</font></li>";


										



		
//linkipfs	

			$linkipfs = json_decode($returnContent, true);

			
			$ipfscon=$ipfscon."".$linkipfs['data']['hash_urls'][0];

			echo "<a href=?lang=".$_REQUEST["lang"]."&txid=".$txidget."&pending=2&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=\"".$ipfscon."\"  target=_blank><font size=1>".$linkipfs['data']['hash_urls'][0]."</font></a></li>";

//broadcast 

			echo "<a href=keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=535542534352494245&key=535542534352494245><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_broadcast." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>CREATE CHANNEL WITH  RAVENCOIN ASSET</font></li>";

//message

			echo "<a href=keva.php?lang=&asset=NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS&title=4d455353414745&key=4d455353414745><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_message." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>SEND MESSAGE WITH  RAVENCOIN ASSET</font></li>";

//galaxylink

			echo "<a href=http://galaxyos.io/force.php?lang=".$_REQUEST["lang"]."&txid=".$txidget."&pending=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_galaxylink." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=1></font></a></li>";

			//galaxylink

			echo "<a href=/><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ TO GALAXY ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>GALAXYOS.IO</font></li>";


*/

//article over


}	
	
else



//menu


							{


			//menu

	$namespace=$force_namespace;

	$asset=$namespace;

		
		

			$title="Animal Crossing Dream";

			
echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\"><ul>";
		

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

			echo "<a href=?lang=".$_REQUEST["lang"]."&asset=".$asset."&mode=2&showall=11><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>[ ".$keva_linkipfs." ]</h4></a><hr style=\"background-color:#59fbea;height:1px;border:none;\"><a href=".$ipfscon." target=_blank><font size=1>".$linkipfs['data']['hash_urls'][0]."</font></a></li>";

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
			

	




	







?>
</ul></div>
</div>

</body>
</html>