<?php

//walletnode ip

$localip='127.0.0.1';

//on/off

$webmode=0;
$rewardk=0;
$rewardr=0;

//hidemenu

$hidemkey=0;

//index word

$indexm=1;

//language, google translate.If you want to fix translation, you can edit this file below or online //https://github.com/kawww/Galaxy/blob/master/rpc.php

//Now support en cn kr jp bs bg nl tl fr de id it po pt ro ru es th tr af

$lang="en";



//system

$sysweb=10;
$syslocal=30;
$kevaadd=30;

//freekeva

$freekeva="http://galaxyos.io/";

$credit=0.1;



//freeasset


$freeasset="http://galaxyos.io/";

$wid="NZw8rWKkVxEXpXdtxkvfAP75vYXMFjfdhA";


//hide namespace

$hidenkey=1;

//ipfs

$ipfscon="http://gotoipfs.com/#path=";


if($webmode==1){

$keva="off";
$keva_add="off";
$unsub="off";

$message_num=5000;

$tag_addresss="-";



}

if($webmode==0){

$keva="on";
$keva_add="on";
$unsub="on";

$message_num=50000;

}

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

//$text=str_replace(array("\r", "\n", "\r\n"), '<br>', $text);

$text="<p style=\"font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif;
 \">".nl2br($text)."</p>";
          
return $text;
}



function getLine($file, $line, $length = 40960){
    $returnTxt = null; 
    $i = 1; 
 
    $handle = @fopen($file, "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, $length);
            if($line == $i) $returnTxt = $buffer;
            $i++;
        }
        fclose($handle);
    }
    return $returnTxt;}

//utf

function check_utf8($str)
  {
      $len = strlen($str);
      for($i = 0; $i < $len; $i++){
          $c = ord($str[$i]);
          if ($c > 128) {
              if (($c > 247)) return false;
              elseif ($c > 239) $bytes = 4;
              elseif ($c > 223) $bytes = 3;
              elseif ($c > 191) $bytes = 2;
              else return false;
              if (($i + $bytes) > $len) return false;
              while ($bytes > 1) {
                  $i++;
                  $b = ord($str[$i]);
                  if ($b < 128 || $b > 191) return false;
                  $bytes--;
              }
          }
      }
      return true;
  } // end of 


function utf8_to_unicode( $str ) {

    $unicode = array();        
    $values = array();
    $lookingFor = 1;

    for ($i = 0; $i < strlen( $str ); $i++ ) {
        $thisValue = ord( $str[ $i ] );
    if ( $thisValue < ord('A') ) {
        // exclude 0-9
        if ($thisValue >= ord('0') && $thisValue <= ord('9')) {
             // number
             $unicode[] = chr($thisValue);
        }
        else {
             $unicode[] = '%'.dechex($thisValue);
        }
    } else {
          if ( $thisValue < 128) 
        $unicode[] = $str[ $i ];
          else {
                if ( count( $values ) == 0 ) $lookingFor = ( $thisValue < 224 ) ? 2 : 3;                
                $values[] = $thisValue;                
                if ( count( $values ) == $lookingFor ) {
                    $number = ( $lookingFor == 3 ) ?
                        ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ):
                        ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64 );
            $number = dechex($number);
            $unicode[] = (strlen($number)==3)?"0".$number:"".$number;
                    $values = array();
                    $lookingFor = 1;
          } // if
        } // if
    }
    } // for
    return implode("",$unicode);

} // utf8_to_unicod


function replaceString($search,$replace,$content,$limit=1){
    if(is_array($search)){
        foreach ($search as $k=>$v){
            $search[$k]='`'.preg_quote($search[$k],'`').'`';
        }
    }else{
        $search='`'.preg_quote($search,'`').'`';
    }
 
    $content=preg_replace("/alt=([^ >]+)/is",'',$content);
    return preg_replace($search,$replace,$content,$limit);
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


//console

//language

$kpc = new Keva();

$kpc->username=$krpcuser;
$kpc->password=$krpcpass;
$kpc->host=$krpchost;
$kpc->port=$krpcport;

$consolecheck= $kpc->keva_list_namespaces();

foreach($consolecheck as $conc){

if($conc['displayName']=="CONSOLE"){$consolespace=$conc['namespaceId'];}

		}


if(isset($consolespace))
	
		{

		//lang

	   $langcheck=$kpc->keva_get($consolespace,"LANGUAGE");


	   if(strlen(strip_tags($langcheck['value']))==2){$lang=strip_tags($langcheck['value']);}

	   //system

	   $systemcheck=$kpc->keva_get($consolespace,"SYSTEM");


	   if(isset($systemcheck['value'])){$syslocal=strip_tags($systemcheck['value']);}


	   //message

	   $messagecheck=$kpc->keva_get($consolespace,"MESSAGE");


	   if(isset($messagecheck['value'])){$message_num=strip_tags($messagecheck['value']);}

	   //list

		$listcheck=$kpc->keva_get($consolespace,"LIST");


	   if(strip_tags($listcheck['value'])=="on"){$indexm=1;}
	   if(strip_tags($listcheck['value'])=="off"){$indexm=0;}

	    //hide 

		$hidecheck=$kpc->keva_get($consolespace,"HIDE");


	   if(strip_tags($hidecheck['value'])=="on"){$hidenkey=1;}
	   if(strip_tags($hidecheck['value'])=="off"){$hidenkey=0;}

	   	//word

		$wordcheck=$kpc->keva_get($consolespace,"WORD");


		if(isset($wordcheck['value'])){$word_num=strip_tags($wordcheck['value']);}

		//freekeva

		$freecheck=$kpc->keva_get($consolespace,"FREE");

		if(isset($freecheck['value']) & $freecheck['value']<>""){$freekeva=strip_tags($freecheck['value']);}	

		//ipfs

		$ipfscheck=$kpc->keva_get($consolespace,"IPFS");

		if(isset($ipfscheck['value'])){$ipfscon=strip_tags($ipfscheck['value']);}	

		//credit

		$creditcheck=$kpc->keva_get($consolespace,"CREDIT");

		if(isset($creditcheck['value'])){$credit=strip_tags($creditcheck['value']);}	

		}



//check58

class Hash
{
    public static function SHA256(string $data, $raw = true): string
    {
        return hash('sha256', $data, $raw);
    }

    public static function sha256d(string $data): string
    {
        return hash('sha256', hash('sha256', $data, true), true);
    }

    public static function RIPEMD160(string $data, $raw = true): string
    {
        return hash('ripemd160', $data, $raw);
    }
}

class Base58
{
    const AVAILABLE_CHARS = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public static function encode($num, $length = 58): string
    {
        return Crypto::dec2base($num, $length, self::AVAILABLE_CHARS);
    }

    public static function decode(string $addr, int $length = 58): string
    {
        return Crypto::base2dec($addr, $length, self::AVAILABLE_CHARS);
    }
}

/**
 * @codeCoverageIgnore
 */
class Base58Check
{
    /**
     * Encode Base58Check
     *
     * @param string $string
     * @param int $prefix
     * @param bool $compressed
     * @return string
     */
    public static function encode(string $string, int $prefix = 128, bool $compressed = true)
    {
        $string = hex2bin($string);

        if ($prefix) {
            $string = chr($prefix) . $string;
        }

        if ($compressed) {
            $string .= chr(0x01);
        }

        $string = $string . substr(Hash::SHA256(Hash::SHA256($string)), 0, 4);

        $base58 = Base58::encode(Crypto::bin2bc($string));
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] != "\x00") {
                break;
            }

            $base58 = '1' . $base58;
        }
        return $base58;
    }

    /**
     * Decoding from Base58Check
     *
     * @param string $string
     * @param int $removeLeadingBytes
     * @param int $removeTrailingBytes
     * @param bool $removeCompression
     * @return bool|string
     */
    public static function decode(string $string, int $removeLeadingBytes = 1, int $removeTrailingBytes = 4, bool $removeCompression = true)
    {
        $string = bin2hex(Crypto::bc2bin(Base58::decode($string)));

        //If end bytes: Network type
        if ($removeLeadingBytes) {
            $string = substr($string, $removeLeadingBytes * 2);
        }

        //If the final bytes: Checksum
        if ($removeTrailingBytes) {
            $string = substr($string, 0, -($removeTrailingBytes * 2));
        }

        //If end bytes: compressed byte
        if ($removeCompression) {
            $string = substr($string, 0, -2);
        }

        return $string;
    }
}


/**
 * @codeCoverageIgnore
 */
class Crypto
{
    public static function bc2bin($num)
    {
        return self::dec2base($num, 256);
    }

    public static function dec2base($dec, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);
        $value = "";

        if (!$digits) {
            $digits = self::digits($base);
        }

        while ($dec > $base - 1) {
            $rest = bcmod($dec, $base);
            $dec = bcdiv($dec, $base);
            $value = $digits[$rest] . $value;
        }
        $value = $digits[intval($dec)] . $value;

        return (string)$value;
    }

    public static function base2dec($value, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);

        if ($base < 37) {
            $value = strtolower($value);
        }
        if (!$digits) {
            $digits = self::digits($base);
        }

        $size = strlen($value);
        $dec = "0";

        for ($loop = 0; $loop < $size; $loop++) {
            $element = strpos($digits, $value[$loop]);
            $power = bcpow($base, $size - $loop - 1);
            $dec = bcadd($dec, bcmul($element, $power));
        }

        return (string)$dec;
    }

    public static function digits($base)
    {
        if ($base > 64) {
            $digits = "";
            for ($loop = 0; $loop < 256; $loop++) {
                $digits .= chr($loop);
            }
        } else {
            $digits = "0123456789abcdefghijklmnopqrstuvwxyz";
            $digits .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
        }
        $digits = substr($digits, 0, $base);

        return (string)$digits;
    }

    public static function bin2bc($num)
    {
        return self::base2dec($num, 256);
    }
}

 function getBase58CheckAddress($addressBin){
            $hash0 = Hash::SHA256($addressBin);
            $hash1 = Hash::SHA256($hash0);
            $checksum = substr($hash1, 0, 4);
            $checksum = $addressBin . $checksum;
            $result = Base58::encode(Crypto::bin2bc($checksum));

            return $result;
        }


//language

$index_local="LOCAL";
$index_console="CONSOLE";
$index_word="WORD";
$index_subscription="SUBSCRIPTION";
$index_channel="CHANNEL";
$index_message="MESSAGE";
$index_asset="ASSET";
$index_tag="TAG";
$index_assetexplorer="ASSET EXPLORER";
$index_ipfsexplorer="IPFS EXPLORER";
$index_checkasset="CHECK ASSETS AVAILIABLE";
$index_link="LINK";
$index_ipfsupload="IPFS UPLOAD";
$index_magnet="MAGNET TXID";
$index_system="SYSTEM";


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




$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN NODE INFO";
$console_rvn_blockchain="RVN BLOCKCHAIN INFO";
$console_rvn_count="RVN BLOCK COUNT";
$console_rvn_mining="RVN TESTNET";
$console_keva_help="kevaCOIN";
$console_keva_node="keva NODE INFO";
$console_keva_blockchain="keva BLOCKCHAIN INFO";
$console_keva_count="keva BLOCK COUNT";
$console_keva_mining="TESTNET MINING";

$system_noblock="NO CONTENTS FOUND IN THESE BLOCKS ";

$subscribe_broadcast="CONFIRM BROADCAST";
$subscribe_sub="SUBSCRIPTION";

$channel_title="CHANNEL";
$channel_unsub="UNSUBSCRIBE";
$channel_suball="SUBSCRIBE ALL ASSETS";

$message_title="MESSAGE";
$message_address="MESSAGE NODE ADDRESS";
$message_send="SENDER ADDRESS";
$message_my="MY ADDRESS";

$tag_address="TAG NODE ADDRESS";

$check_asset="Bulk Assets Search";
$check_only="Show Availiable Only";
$check_ok="Available";
$check_not="Not Available";
$check_unicode="CHECK UNICODE";


if($lang=="en" or $_REQUEST["lang"]=="en" or $_REQUEST["lang"]=="")

{

$langs="cn";

}


if($lang=="cn" or $_REQUEST["lang"]=="cn")

{

$langs="kr";
$turn=1;

$index_local="本地";
$index_console="控制台";
$index_word="链文字";
$index_subscription="订阅";
$index_channel="频道";
$index_message="消息";
$index_asset="资产";
$index_tag="标签";
$index_assetexplorer="资产浏览器";
$index_ipfsexplorer="IPFS浏览器";
$index_checkasset="查询资产注册";
$index_link="网址";
$index_system="系统";

$keva_myaddress="链文字地址";
$keva_newspace="创建新空间";
$keva_newspacememo="通过区块链到银河每一个角落";
$keva_free="获取免费点数";
$keva_submit="写入区块链";
$keva_kaw="搜索";
$keva_showall="显示全部内容";
$keva_showlist="显示列表";
$keva_addnew="新建链文档";
$keva_addnewmemo="一小步, 亦是一大步";
$keva_subscribe="订阅空间";
$keva_subscription="订阅";
$keva_linkipfs="生成IPFS链接";
$keva_edit="编辑";
$keva_kcode="K码";
$keva_delete="删除";
$keva_broadcast="广播";
$keva_galaxylink="银河链接";
$keva_message="消息";
$keva_send="发送";

$keva_comment="评论";
$keva_create_comment="创建评论空间";
$keva_sign="签名";
$keva_signtalk="管理签名";
$keva_tips="打赏/送礼物";


$console_rvn_help="RAVENCOIN鸟币";
$console_rvn_node="鸟链节点信息";
$console_rvn_blockchain="鸟链区块信息";
$console_rvn_count="鸟链区块数";
$console_rvn_mining="鸟链测试网";
$console_keva_help="kevaCOIN币";
$console_keva_node="K链节点信息";
$console_keva_blockchain="K链区块信息";
$console_keva_count="K链区块数";
$console_keva_mining="K链测试网";

$system_noblock="这些区块没有内容，请按下边按钮继续看更多区块，现在区块范围";

$subscribe_sub="订阅";
$subscribe_broadcast="确认广播";

$channel_title="频道";
$channel_unsub="取消订阅";
$channel_suball="订阅全部";

$message_title="消息";
$message_address="消息接收地址";
$message_send="发送地址";
$message_my="接收地址";

$tag_address="标签接收地址";

$check_asset="批量搜索";
$check_only="只看可用";
$check_ok="可注册";
$check_not="不可注册";


}

//korean

if($lang=="kr" or $_REQUEST["lang"]=="kr")

{

$langs="jp";
$turn=1;


$index_local="LOCAL";
$index_console="콘솔";
$index_word="WORD";
$index_subscription="구독";
$index_channel="채널";
$index_message="메시지";
$index_asset="자산";
$index_tag="태그";
$index_assetexplorer="자산 탐험가";
$index_ipfsexplorer="IPFS EXPLORER";
$index_checkasset="자산 확인 가능";
$index_link="LINK";
$index_system="시스템";


$keva_myaddress="keva ADDRESS";
$keva_newspace="새 공간 만들기";
$keva_free="무료 크레딧 받기";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";
$keva_submit="SUBMIT";
$keva_kaw="KAW";
$keva_showall="모든 콘텐츠 표시";
$keva_showlist="쇼리스트";
$keva_addnew="새로운 단어 만들기";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="구독";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="링크 IPFS";
$keva_edit="편집";
$keva_delete="삭제";
$keva_broadcast="방송";
$keva_galaxylink="GALAXY LINK";
$keva_message="메시지";
$keva_send="SEND";

$keva_comment="논평";
$keva_create_comment="크리 멘트 주석 공간";
$keva_sign="서명";
$keva_signtalk="서명 관리";
$keva_tips="보상 / 선물";


$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN 노드 정보";
$console_rvn_blockchain="RVN 블록 체인 정보";
$console_rvn_count="RVN 블록 수";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="keva 노드 정보";
$console_keva_blockchain="keva 블록 체인 정보";
$console_keva_count="keva 블록 수";
$console_keva_mining="테스트 넷 마이닝";

$system_noblock="이 블록에 내용이 없습니다";

$subscribe_broadcast="방송 확인";
$subscribe_sub="신청";

$channel_title="채널";
$channel_unsub="구독 취소";
$channel_suball="모든 자산을 구독하십시오";

$message_title="MESSAGE";
$message_address="메시지 노드 주소";
$message_send="발신자 주소";
$message_my="내 주소";

$tag_address="태그 노드 주소";

$check_asset="대량 자산 검색";
$check_only="사용 가능한만 표시";
$check_ok="유효한";
$check_not="사용할 수 없습니다";

}

//japansese



if($lang=="jp" or $_REQUEST["lang"]=="jp")

{

$langs="bs";
$turn=1;

$index_local="LOCAL";
$index_console="コンソール";
$index_word="WORD";
$index_subscription="サブスクリプション";
$index_channel="チャネル";
$index_message="メッセージ";
$index_asset="資産";
$index_tag="ラベル";
$index_assetexplorer="アセットエクスプローラー";
$index_ipfsexplorer="IPFS EXPLORER";
$index_checkasset="利用可能な資産を確認";
$index_linkipfs="IPFS URL DIRECT";
$index_ipfsupload="IPFS UPLOAD";
$index_link="LINK";
$index_system="システム";

$keva_myaddress="keva ADDRESS";
$keva_newspace="新しいスペースを作成";
$keva_free="無料クレジットを取得";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";
$keva_submit="SUBMIT";
$keva_kaw="KAW";
$keva_showall="すべてのコンテンツを表示";
$keva_showlist="リストを表示";
$keva_addnew="新しい単語を作成";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="申し込む";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="LINK IPFS";
$keva_edit="編集";
$keva_delete="削除";
$keva_broadcast="放送";
$keva_galaxylink="GALAXY LINK";
$keva_message="メッセージ";
$keva_send="送信";

$keva_comment="コメント";
$keva_create_comment="コメントスペースを作成";
$keva_sign="署名";
$keva_signtalk="署名の管理";
$keva_tips="報酬/ギフト";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVNノード情報";
$console_rvn_blockchain="RVNブロックチェーン情報";
$console_rvn_count="RVNブロック数";
$console_rvn_mining="RVNTestnet";
$console_keva_help="kevaCOIN";
$console_keva_node="kevaノード情報";
$console_keva_blockchain="kevaブロックチェーン情報";
$console_keva_count="kevaブロック数";
$console_keva_mining="Testnetマイニング";

$system_noblock="これらのブロックにコンテンツが見つかりません";

$subscribe_broadcast="ブロードキャストの確認";
$subscribe_sub="サブスクリプション";

$channel_title="チャンネル";
$channel_unsub="unsubcribe";
$channel_suball="すべてのアセットを購読する";

$message_title="メッセージ";
$message_address="メッセージノードアドレス";
$message_send="送信者アドレス";
$message_my="私の住所";

$tag_address="タグノードアドレス";

$check_asset="一括アセット検索";
$check_only="利用可能なもののみ表示";
$check_ok="利用可能";
$check_not="利用不可";

}



//bosnian

if($lang=="bs" or $_REQUEST["lang"]=="bs")

{

$langs="bg";
$turn=1;

$index_local="Lokalno";
$index_console="Konzola";
$index_word="WORD";
$index_subscription="Pretplata";
$index_channel="Kanal";
$index_message="Poruka";
$index_asset="Imovina";
$index_tag="Oznaka";
$index_assetexplorer="Istraživač imovine";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Provjeri imovinu";
$index_link="Veza";
$index_system="Sistem";


$keva_myaddress="keva ADRESA";
$keva_newspace="Stvori novi prostor";
$keva_free="Uzmite besplatni kredit";

$keva_submit="Pošaljite";
$keva_kaw​​="KAW";
$keva_showall="Prikaži sve sadržaje";
$keva_showlist="Prikaži listu";
$keva_addnew="Stvori novu reč";
$keva_subscribe="Pretplati se";
$keva_subscription="Pretplata";
$keva_linkipfs="Veza IPFS";
$keva_edit="Uređivanje";
$keva_delete="Izbriši";
$keva_broadcast="Prenos";
$keva_galaxylink="GALAXY LINK";
$keva_message="Poruka";
$keva_send="Pošalji";

$keva_comment="KOMENTAR";
$keva_create_comment="USPOREDI PROSTOR KOMENTARA";
$keva_sign="POTPIS";
$keva_signtalk="UPRAVLJAČKA POTPISA";
$keva_tips="Nagrada / POKLONI";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN informacije o čvoru";
$console_rvn_blockchain="RVN informacije o blockchainu";
$console_rvn_count="Broj RVN blokova";
$console_rvn_mining="RVN testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Podaci o čvoru keva";
$console_keva_blockchain="Podaci o blokadi keva";
$console_keva_count="Broj keva blokova";
$console_keva_mining="Ispitaj neto iskopavanje";

$system_noblock="U ovim blokovima nije pronađen sadržaj";

$subscribe_broadcast="Potvrdi emitiranje";
$subscribe_sub="Pretplata";

$channel_title="Kanal";
$channel_unsub="Odjavi se";
$channel_suball="Pretplatite se na sva sredstva";

$message_title="Poruka";
$message_address="Adresa čvora poruke";
$message_send="Adresa pošiljatelja";
$message_my="Moja adresa";

$tag_address="Adresa čvora oznake";

$check_asset="Skupna pretraga imovine";
$check_only="Prikaži samo dostupno";
$check_ok="Dostupno";
$check_not="Nije dostupno";

}

//bulgarian



if($lang=="bg" or $_REQUEST["lang"]=="bg")

{

$langs="nl";
$turn=1;


$index_local="Местни";
$index_console="конзолата";
$index_word="WORD";
$index_subscription="абонамент";
$index_channel="Channel";
$index_message="Съобщение";
$index_asset="активи";
$index_tag="Маркер";
$index_assetexplorer="Изследовател на активи";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Проверка на актива";
$index_link="Връзка";
$index_system="система";


$keva_myaddress="КЕВА АДРЕС";
$keva_newspace="Създаване на ново пространство";
$keva_free="Вземете безплатен кредит";
$keva_submit="Изпращане";
$keva_kaw​​="Kaw";
$keva_showall="Покажи всички съдържания";
$keva_showlist="Покажи списък";
$keva_addnew="Създаване на нова дума";
$keva_subscribe="Абониране";
$keva_subscription="абонамент";
$keva_linkipfs="Връзка IPFS";
$keva_edit="Edit";
$keva_delete="Delete";
$keva_broadcast="Broadcast";
$keva_galaxylink="ГАЛАКСИЙНА ВРЪЗКА";
$keva_message="Съобщение";
$keva_send="Изпращане";


$keva_comment="Коментар";
$keva_create_comment="СЪЗДАВАНЕ НА КОМЕНТАРНО ПРОСТРАНСТВО";
$keva_sign="ПОДПИС";
$keva_signtalk="УПРАВЛЕНИЕ НА ПОДПИСКА";
$keva_tips="Награда / ПОДАРЪЦИ";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN информация за възел";
$console_rvn_blockchain="RVN информация за блокчейна";
$console_rvn_count="Брой RVN блокове";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Информация за keva възел";
$console_keva_blockchain="Информация за блокчейн keva";
$console_keva_count="Брой keva блокове";
$console_keva_mining="Тестване на нетно извличане";

$system_noblock="Няма намерено съдържание в тези блокове";

$subscribe_broadcast="Потвърждаване на излъчването";
$Subscribe_sub="абонамент";

$channel_title="Channel";
$channel_unsub="Unsubcribe";
$channel_suball="Абонирайте всички активи";

$message_title="Съобщение";
$message_address="Адрес на възел на съобщение";
$message_send="Адрес на подателя";
$message_my="Моят адрес";

$tag_address="Адрес на възел на етикет";

$check_asset="Търсене за групови активи";
$check_only="Показване само на разположение";
$check_ok="На разположение";
$check_not="Не е налично";

}

//dutch

if($lang=="nl" or $_REQUEST["lang"]=="nl")

{

$langs="tl";
$turn=1;

$index_local="Local";
$index_console="Console";
$index_word="WORD";
$index_subscription="Abonnement";
$index_channel="Channel";
$index_message="Bericht";
$index_asset="Asset";
$index_tag="Tag";
$index_assetexplorer="Asset Explorer";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Activa controleren";
$index_link="Link";
$index_system="Systeem";


$keva_myaddress="keva-ADRES";
$keva_newspace="Maak nieuwe ruimte";
$keva_free="Ontvang gratis tegoed";

$keva_submit="Verzenden";
$keva_kaw="KAW";
$keva_showall="Toon alle inhoud";
$keva_showlist="Show List";
$keva_addnew="Maak nieuw woord";
$keva_subscribe="Abonneren";
$keva_subscription="Abonnement";
$keva_linkipfs="IPFS koppelen";
$keva_edit="Bewerken";
$keva_delete="Verwijderen";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Message";
$keva_send="Verzenden";


$keva_comment="COMMENTAAR";
$keva_create_comment="MAAK COMMENT RUIMTE";
$keva_sign="HANDTEKENING";
$keva_signtalk="HANDTEKENING BEHEREN";
$keva_tips="Beloning / GESCHENKEN";


$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN Node-info";
$console_rvn_blockchain="RVN blockchain-info";
$console_rvn_count="RVN aantal blokken";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="keva-knooppuntinfo";
$console_keva_blockchain="keva blockchain-info";
$console_keva_count="keva aantal blokken";
$console_keva_mining="Test net mining";



$system_noblock="Geen inhoud gevonden in deze blokken";

$subscribe_broadcast="Bevestig uitzending";
$subscribe_sub="Abonnement";

$channel_title="Channel";
$channel_unsub="Afmelden";
$channel_suball="Abonneer u op alle items";

$message_title="Bericht";
$message_address="Adres van berichtknooppunt";
$message_send="Adres van afzender";
$message_my="Mijn adres";

$tag_address="Adres van knooppunt taggen";

$check_asset="Bulkgoederen zoeken";
$check_only="Toon alleen beschikbaar";
$check_ok="Beschikbaar";
$check_not="Niet beschikbaar";

}

//filipino

if($lang=="tl" or $_REQUEST["lang"]=="tl")

{


$index_local="Lokal";
$index_console="Console";
$index_word="WORD";
$index_subscription="Suskrisyon";
$index_channel="Channel";
$index_message="Mensahe";
$index_asset="Asset";
$index_tag="Tag";
$index_assetexplorer="Asset Explorer";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Suriin ang Asset";
$index_link="Link";
$index_system="System";


$keva_myaddress="ALAMAT sa keva";
$keva_newspace="Lumikha ng Bagong Space";
$keva_free="Kumuha ng libreng kredito";

$keva_submit="Isumite";
$keva_kaw="KAW";
$keva_showall="Ipakita ang Lahat ng Nilalaman";
$keva_showlist="Listahan ng Ipakita";
$keva_addnew="Lumikha ng Bagong Salita";
$keva_subscribe="Mag-subscribe";
$keva_subscription="Suskrisyon";
$keva_linkipfs="I-link ang IPFS";
$keva_edit="I-edit";
$keva_delete="Tanggalin";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Mensahe";
$keva_send="Ipadala";

$keva_comment="KOMENTO";
$keva_create_comment="CREATE COMMENT SPACE";
$keva_sign="SIGNATURA";
$keva_signtalk="MANAGE SIGNATURE";
$keva_tips="Gantimpala / GIFT";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Impormasyon sa NV RVN";
$console_rvn_blockchain="Impormasyon sa blockchain RVN";
$console_rvn_count="Bilang ng RVN block";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Impormasyon sa Node keva";
$console_keva_blockchain="keva blockchain info";
$console_keva_count="count ng block ng keva";
$console_keva_mining="Pagsubok sa pagmimina net";

$system_noblock="Walang mga nilalaman na natagpuan sa mga bloke na ito";

$subscribe_broadcast="Kumpirma ang Broadcast";
$subscribe_sub="Subskripsyon";

$channel_title="Channel";
$channel_unsub="Hindi isulat";
$channel_suball="Mag-subscribe sa lahat ng mga assets";

$message_title="Mensahe";
$message_address="Alamat ng node ng mensahe";
$message_send="Alamat ng nagpadala";
$message_my="Ang aking address";

$tag_address="address ng Tag Node";

$check_asset="Mga Bulk Asset Search";
$check_only="Ipakita lamang ang Magagamit";
$check_ok="Magagamit na";
$check_not="Hindi Magagamit";

$langs="fr";
$turn=1;


}





//french

if($lang=="fr" or $_REQUEST["lang"]=="fr")

{

$index_local="Local";
$index_console="Console";
$index_word="WORD";
$index_subscription="Abonnement";
$index_channel="Channel";
$index_message="Message";
$index_asset="Asset";
$index_tag="Tag";
$index_assetexplorer="Asset Explorer";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Vérifier l'actif";
$index_link="Link";
$index_system="System";


$keva_myaddress="ADRESSE keva";
$keva_newspace="Créer un nouvel espace";
$keva_free="Obtenez un crédit gratuit";

$keva_submit="Soumettre";
$keva_kaw="KAW";
$keva_showall="Afficher tout le contenu";
$keva_showlist="Afficher la liste";
$keva_addnew="Créer un nouveau mot";
$keva_subscribe="S'abonner";
$keva_subscription="Abonnement";
$keva_linkipfs="Link IPFS";
$keva_edit="Modifier";
$keva_delete="Supprimer";
$keva_broadcast="Diffusion";
$keva_galaxylink="GALAXY LINK";
$keva_message="Message";
$keva_send="Envoyer";

$keva_comment="COMMENTAIRE";
$keva_create_comment="CRÉER UN ESPACE COMMENTAIRE";
$keva_sign="SIGNATURE";
$keva_signtalk="GÉRER LA SIGNATURE";
$keva_tips="Récompense / CADEAUX";


$console_rvn_help="RAVENCOIN";
$console_rvn_node="Info RVN Node";
$console_rvn_blockchain="Infos sur la blockchain RVN";
$console_rvn_count="Nombre de blocs RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Informations sur le nœud keva";
$console_keva_blockchain="Infos sur la blockchain keva";
$console_keva_count="Nombre de blocs keva";
$console_keva_mining="Tester le net mining";

$system_noblock="Aucun contenu trouvé dans ces blocs";

$subscribe_broadcast="Confirmer la diffusion";
$subscribe_sub="Abonnement";

$channel_title="Channel";
$channel_unsub="Se désinscrire";
$channel_suball="Abonnez tous les actifs";

$message_title="Message";
$message_address="Adresse du nœud de message";
$message_send="Adresse de l'expéditeur";
$message_my="Mon adresse";

$tag_address="Adresse du noeud de tag";

$check_asset="Recherche d'actifs en masse";
$check_only="Afficher uniquement disponible";
$check_ok="Disponible";
$check_not="Non disponible";

$langs="de";
$turn=1;


}

//german

if($lang=="de" or $_REQUEST["lang"]=="de")

{

$index_local="Local";
$index_console="Konsole";
$index_word="WORD";
$index_subscription="Abonnement";
$index_channel="Channel";
$index_message="Nachricht";
$index_asset="Asset";
$index_tag="Tag";
$index_assetexplorer="Asset Explorer";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Asset prüfen";
$index_link="Link";
$index_system="System";


$keva_myaddress="keva-ADRESSE";
$keva_newspace="Neuen Raum erstellen";
$keva_free="Kostenloses Guthaben erhalten";

$keva_submit="Submit";
$keva_kaw="KAW";
$keva_showall="Alle Inhalte anzeigen";
$keva_showlist="Liste anzeigen";
$keva_addnew="Neues Wort erstellen";
$keva_subscribe="Abonnieren";
$keva_subscription="Abonnement";
$keva_linkipfs="IPFS verknüpfen";
$keva_edit="Bearbeiten";
$keva_delete="Löschen";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Nachricht";
$keva_send="Senden";

$keva_comment="KOMMENTAR";
$keva_create_comment="KOMMENTARRAUM ERSTELLEN";
$keva_sign="UNTERSCHRIFT";
$keva_signtalk="SIGNATUR VERWALTEN";
$keva_tips="Belohnung / GESCHENKE";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN-Knoteninfo";
$console_rvn_blockchain="RVN-Blockchain-Informationen";
$console_rvn_count="RVN-Blockanzahl";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="keva-Knoteninfo";
$console_keva_blockchain="keva-Blockchain-Informationen";
$console_keva_count="keva-Blockanzahl";
$console_keva_mining="Net Mining testen";

$system_noblock="In diesen Blöcken wurden keine Inhalte gefunden";

$subscribe_broadcast="Broadcast bestätigen";
$subscribe_sub="Abonnement";

$channel_title="Channel";
$channel_unsub="Abbestellen";
$channel_suball="Alle Assets abonnieren";

$message_title="Nachricht";
$message_address="Nachrichtenknotenadresse";
$message_send="Absenderadresse";
$message_my="Meine Adresse";

$tag_address="Tag-Knoten-Adresse";

$check_asset="Suche nach Massengütern";
$check_only="Nur verfügbar anzeigen";
$check_ok="Verfügbar";
$check_not="Nicht verfügbar";

$langs="id";
$turn=1;


}



//indonesian

if($lang=="id" or $_REQUEST["lang"]=="id")

{

$index_local="Local";
$index_console="Console";
$index_word="WORD";
$index_subscription="Berlangganan";
$index_channel="Channel";
$index_message="Pesan";
$index_asset="Aset";
$index_tag="Tag";
$index_assetexplorer="Penjelajah Aset";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Periksa Aset";
$index_link="Tautan";
$index_system="System";


$keva_myaddress="keva ADDRESS";
$keva_newspace="Buat Spasi Baru";
$keva_free="Dapatkan kredit gratis";

$keva_submit="Kirim";
$keva_kaw="KAW";
$keva_showall="Tampilkan Semua Konten";
$keva_showlist="Tampilkan Daftar";
$keva_addnew="Buat Kata Baru";
$keva_subscribe="Berlangganan";
$keva_subscription="Berlangganan";
$keva_linkipfs="Tautkan IPFS";
$keva_edit="Edit";
$keva_delete="Hapus";
$keva_broadcast="Siaran";
$keva_galaxylink="GALAXY LINK";
$keva_message="Pesan";
$keva_send="Kirim";

$keva_comment="KOMENTAR";
$keva_create_comment="BUAT RUANG KOMENTAR";
$keva_sign="TANDA TANGAN";
$keva_signtalk="ATUR TANDA TANGAN";
$keva_tips="Hadiah / HADIAH";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Info simpul RVN";
$console_rvn_blockchain="Info blockchain RVN";
$console_rvn_count="Jumlah blok RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="keva Node info";
$console_keva_blockchain="Info blockchain keva";
$console_keva_count="jumlah blok keva";
$console_keva_mining="Uji penambangan bersih";

$system_noblock="Tidak ada konten yang ditemukan di blok ini";

$subscribe_broadcast="Konfirmasi Siaran";
$subscribe_sub="Berlangganan";

$channel_title="Channel";
$channel_unsub="Berhenti berlangganan";
$channel_suball="Berlangganan semua aset";

$message_title="Pesan";
$message_address="Alamat simpul pesan";
$message_send="Alamat pengirim";
$message_my="Alamat saya";

$tag_address="Tag Node address";

$check_asset="Pencarian Aset Massal";
$check_only="Hanya Tampilkan Yang Tersedia";
$check_ok="Tersedia";
$check_not="Tidak Tersedia";

$langs="it";
$turn=1;


}

//italian

if($lang=="it" or $_REQUEST["lang"]=="it")

{

$index_local="locali";
$index_console="Console";
$index_word="WORD";
$index_subscription="Abbonamento";
$index_channel="Canale";
$index_message="messaggio";
$index_asset="Asset";
$index_tag="tag";
$index_assetexplorer="Esplora risorse";
$index_ipfsexplorer="Explorer IPFS";
$index_checkasset="Controlla risorsa";
$index_link="Link";
$index_system="Sistema";


$keva_myaddress="INDIRIZZO keva";
$keva_newspace="Crea nuovo spazio";
$keva_free="Ottieni credito gratuito";

$keva_submit="Invia";
$keva_kaw="KAW";
$keva_showall="Mostra tutti i contenuti";
$keva_showlist="Mostra elenco";
$keva_addnew="Crea nuova parola";
$keva_subscribe="Iscriviti";
$keva_subscription="Abbonamento";
$keva_linkipfs="Collega IPFS";
$keva_edit="Modifica";
$keva_delete="Elimina";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="messaggio";
$keva_send="Send";

$keva_comment="COMMENTO";
$keva_create_comment="CREA LO SPAZIO COMMENTO";
$keva_sign="FIRMA";
$keva_signtalk="GESTIONE DELLA FIRMA";
$keva_tips="Ricompensa / REGALI";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Informazioni sul nodo RVN";
$console_rvn_blockchain="Informazioni blockchain RVN";
$console_rvn_count="Conteggio blocchi RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Informazioni sul nodo keva";
$console_keva_blockchain="Informazioni blockchain keva";
$console_keva_count="Conteggio blocchi keva";
$console_keva_mining="Prova il mining netto";

$system_noblock="Nessun contenuto trovato in questi blocchi";

$subscribe_broadcast="Conferma trasmissione";
$subscribe_sub="Abbonamento";

$channel_title= "Canale";
$channel_unsub="cancellare la suttoscrizione";
$channel_suball="Sottoscrivi tutti gli asset";

$MESSAGE_TITLE="messaggio";
$message_address="Indirizzo nodo messaggio";
$message_send="Indirizzo mittente";
$message_my="Il mio indirizzo";

$tag_address="Indirizzo nodo tag";

$check_asset="Ricerca in blocco delle risorse";
$check_only="Mostra solo disponibile";
$Check_ok="Disponibile";
$check_not="Non disponibile";

$langs="po";
$turn=1;


}


//polish

if($lang=="po" or $_REQUEST["lang"]=="po")

{

$index_local="Lokalny";
$index_console="Konsola";
$index_word="WORD";
$index_subscription="Subskrypcja";
$index_channel="Channel";
$index_message="Wiadomość";
$index_asset="Zasób";
$index_tag="Tag";
$index_assetexplorer="Eksplorator zasobów";
$index_ipfsexplorer="Eksplorator IPFS";
$index_checkasset="Sprawdź zasób";
$index_link="Link";
$index_system="System";


$keva_myaddress="ADRES keva";
$keva_newspace="Utwórz nową przestrzeń";
$keva_free="Uzyskaj bezpłatny kredyt";

$keva_submit="Prześlij";
$keva_kaw="KAW";
$keva_showall="Pokaż całą zawartość";
$keva_showlist="Pokaż listę";
$keva_addnew="Utwórz nowe słowo";
$keva_subscribe="Subskrybuj";
$keva_subscription="Subskrypcja";
$keva_linkipfs="Link IPFS";
$keva_edit="Edytuj";
$keva_delete="Usuń";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Wiadomość";
$keva_send="Wyślij";

$keva_comment="KOMENTARZ";
$keva_create_comment="UTWÓRZ PRZESTRZEŃ KOMENTARZA";
$keva_sign="PODPIS";
$keva_signtalk="ZARZĄDZAJ PODPISEM";
$keva_tips="Nagroda / PREZENTY";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Informacje o węźle RVN";
$console_rvn_blockchain="Informacje o łańcuchu bloków RVN";
$console_rvn_count="Liczba bloków RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Informacje o węźle keva";
$console_keva_blockchain="Informacje o łańcuchu bloków keva";
$console_keva_count="Liczba bloków keva";
$console_keva_mining="Testuj wydobycie netto";

$system_noblock="Nie znaleziono treści w tych blokach";

$subscribe_broadcast="Potwierdź transmisję";
$subscribe_sub="Subskrypcja";

$channel_title="Channel";
$channel_unsub="Anuluj subskrypcję";
$channel_suball="Subskrybuj wszystkie zasoby";

$message_title="Wiadomość";
$message_address="Adres węzła wiadomości";
$message_send="Adres nadawcy";
$message_my="Mój adres";

$tag_address="Tag Node address";

$check_asset="Wyszukiwanie zbiorcze zasobów";
$check_only="Pokaż tylko dostępne";
$check_ok="Dostępne";
$check_not="Niedostępne";

$langs="pt";
$turn=1;


}



//portuguese

if($lang=="pt" or $_REQUEST["lang"]=="pt")

{

$index_local="Local";
$index_console="Console";
$index_word="WORD";
$index_subscription="Assinatura";
$index_channel="Canal";
$index_message="Mensagem";
$index_asset="Ativo";
$index_tag="Tag";
$index_assetexplorer="Explorador de ativos";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Verificar ativo";
$index_link="Link";
$index_system="Sistema";


$keva_myaddress="ENDEREÇO ​​keva";
$keva_newspace="Criar novo espaço";
$keva_free="Obtenha crédito grátis";

$keva_submit="Enviar";
$keva_kaw="KAW";
$keva_showall="Mostrar todo o conteúdo";
$keva_showlist="Mostrar lista";
$keva_addnew="Criar nova palavra";
$keva_subscribe="Inscrever-se";
$keva_subscription="Assinatura";
$keva_linkipfs="Link IPFS";
$keva_edit="Editar";
$keva_delete="Excluir";
$keva_broadcast="Transmissão";
$keva_galaxylink="GALAXY LINK";
$keva_message="Mensagem";
$keva_send="Enviar";

$keva_comment="COMENTE";
$keva_create_comment="CRIAR ESPAÇO DE COMENTÁRIO";
$keva_sign="ASSINATURA";
$keva_signtalk="GERENCIAR ASSINATURA";
$keva_tips="Recompensa / PRESENTES";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Informações do nó RVN";
$console_rvn_blockchain="Informações sobre blockchain RVN";
$console_rvn_count="Contagem de blocos RVN";
$console_rvn_mining="Rede de teste RVN";
$console_keva_help="kevaCOIN";
$console_keva_node="Informações do nó keva";
$console_keva_blockchain="Informações sobre blockchain keva";
$console_keva_count="Contagem de blocos keva";
$console_keva_mining="Testar mineração líquida";

$system_noblock="Nenhum conteúdo encontrado nesses blocos";

$subscribe_broadcast="Confirmar transmissão";
$subscribe_sub="Assinatura";

$channel_title="Canal";
$channel_unsub="Cancelar inscrição";
$channel_suball="Inscrever todos os ativos";

$message_title="Mensagem";
$message_address="Endereço do nó da mensagem";
$message_send="Endereço do remetente";
$message_my="Meu endereço";

$tag_address="Endereço do nó da tag";

$check_asset="Pesquisa de ativos em massa";
$check_only="Mostrar apenas disponíveis";
$check_ok="Disponível";
$check_not="Não disponível";

$langs="ro";
$turn=1;


}



//romanian

if($lang=="ro" or $_REQUEST["lang"]=="ro")

{

$index_local="local";
$index_console="Console";
$index_word="WORD";
$index_subscription="Abonament";
$index_channel="Channel";
$index_message="Mesaj";
$index_asset="Activ";
$index_tag="Tag";
$index_assetexplorer="Explorator de active";
$index_ipfsexplorer="Explorer IPFS";
$index_checkasset="Verificați activul";
$index_link="Link";
$index_system="sistem";


$keva_myaddress="ADRESA keva";
$keva_newspace="Creare spațiu nou";
$keva_free="Obțineți credit gratuit";

$keva_submit="Submit";
$keva_kaw="KAW";
$keva_showall="Arată tot conținutul";
$keva_showlist="Afișare listă";
$keva_addnew="Creează cuvânt nou";
$keva_subscribe="Abonați-vă";
$keva_subscription="Abonament";
$keva_linkipfs="Link IPFS";
$keva_edit="Edit";
$keva_delete="delete";
$keva_broadcast="Broadcast";
$keva_galaxylink="LINK GALAXY";
$keva_message="Mesaj";
$keva_send="Send";

$keva_comment="COMETARIU";
$keva_create_comment="CREAȚI SPATE DE COMENTARE";
$keva_sign="SEMNĂTURĂ";
$keva_signtalk="GESTIONEAZĂ SEMNATURA";
$keva_tips="Recompensă / Cadouri";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Informații despre nodul RVN";
$console_rvn_blockchain="Informații despre blockchain RVN";
$console_rvn_count="Număr bloc RVN";
$console_rvn_mining="Testnet RVN";
$Console_keva_help="kevaCOIN";
$console_keva_node="Informații despre nodul keva";
$console_keva_blockchain="Informații despre blockchain keva";
$console_keva_count="Numărul de blocuri keva";
$console_keva_mining="Testare miniere net";

$system_noblock="Nu s-a găsit conținut în aceste blocuri";

$subscribe_broadcast="Confirmă transmisia";
$subscribe_sub="Abonament";

$CHANNEL_TITLE="Channel";
$channel_unsub="dezabona";
$channel_suball="Abonează-te la toate activele";

$MESSAGE_TITLE="Mesaj";
$message_address="Adresa nodului mesajului";
$message_send="Adresa expeditorului";
$message_my="Adresa mea";

$tag_address="Adresa nodului etichetă";

$check_asset="Căutare de active în vrac";
$check_only="Afișați numai disponibil";
$check_ok="Disponibil";
$check_not="Nu este disponibil";

$langs="ru";
$turn=1;


}


//russian

if($lang=="ru" or $_REQUEST["lang"]=="ru")

{

$index_local="Местные";
$index_console="Консоль";
$index_word="WORD";
$index_subscription="Подписка";
$index_channel="Канал";
$index_message="Сообщение";
$index_asset="активы";
$index_tag="Tag";
$index_assetexplorer="Обозреватель активов";
$index_ipfsexplorer="Проводник IPFS";
$index_checkasset="Проверить актив";
$index_link="Link";
$index_system="Система";


$keva_myaddress="keva ADDRESS";
$keva_newspace="Создать новое пространство";
$keva_free="Получить бесплатный кредит";

$keva_submit="Отправить";
$keva_kaw="KAW";
$keva_showall="Показать все содержимое";
$keva_showlist="Показать список";
$keva_addnew="Создать новое слово";
$keva_subscribe="Подписаться";
$keva_subscription="Подписка";
$keva_linkipfs="Ссылка IPFS";
$keva_edit="Редактировать";
$keva_delete="Удалить";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Сообщение";
$keva_send="Отправить";

$keva_comment="КОММЕНТАРИЙ";
$keva_create_comment="СОЗДАТЬ КОММЕНТАРИЙ ПРОСТРАНСТВО";
$keva_sign="ПОДПИСЬ";
$keva_signtalk="УПРАВЛЕНИЕ ПОДПИСЬЮ";
$keva_tips="Награда / ПОДАРКИ";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Информация об узле RVN";
$console_rvn_blockchain="Информация о блокчейне RVN";
$console_rvn_count="Количество блоков RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Информация узла keva";
$console_keva_blockchain="Информация о блокчейне keva";
$console_keva_count="Количество блоков keva";
$console_keva_mining="Тестирование сетевого майнинга";

$system_noblock="В этих блоках не найдено содержимого";

$subscribe_broadcast="Подтвердить трансляцию";
$Subscribe_sub="Подписка";

$CHANNEL_TITLE="Канал";
$channel_unsub="отписка";
$channel_suball="Подписаться на все активы";

$MESSAGE_TITLE="Сообщение";
$message_address="Адрес узла сообщения";
$message_send="Адрес отправителя";
$message_my="Мой адрес";

$tag_address="Адрес узла тега";

$check_asset="Массовый поиск активов";
$check_only="Показать только доступные";
$Check_ok="Доступный";
$check_not="Недоступно";

$langs="es";
$turn=1;


}


//spanish

if($lang=="es" or $_REQUEST["lang"]=="es")

{

$index_local="Local";
$index_console="Consola";
$index_word="WORD";
$index_subscription="Suscripción";
$index_channel="Canal";
$index_message="Mensaje";
$index_asset="Activo";
$index_tag="Etiqueta";
$index_assetexplorer="Explorador de activos";
$index_ipfsexplorer="Explorador de IPFS";
$index_checkasset="Verificar activo";
$index_link="Enlace";
$index_system="Sistema";


$keva_myaddress="DIRECCIÓN keva";
$keva_newspace="Crear nuevo espacio";
$keva_free="Obtenga crédito gratis";

$keva_submit="Enviar";
$keva_kaw="KAW";
$keva_showall="Mostrar todo el contenido";
$keva_showlist="Mostrar lista";
$keva_addnew="Crear nueva palabra";
$keva_subscribe="Suscribirse";
$keva_subscription="Suscripción";
$keva_linkipfs="Enlace IPFS";
$keva_edit="Editar";
$keva_delete="Eliminar";
$keva_broadcast="Difusión";
$keva_galaxylink="ENLACE GALAXY";
$keva_message="Mensaje";
$keva_send="Enviar";

$keva_comment="COMENTARIO";
$keva_create_comment="CREAR ESPACIO DE COMENTARIOS";
$keva_sign="FIRMA";
$keva_signtalk="FIRMA";
$keva_tips="Recompensa / REGALOS";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="Información del nodo RVN";
$console_rvn_blockchain="Información de la cadena de bloques RVN";
$console_rvn_count="Recuento de bloque RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="Información del nodo keva";
$console_keva_blockchain="Información de la cadena de bloques keva";
$console_keva_count="Recuento de bloque keva";
$console_keva_mining="Prueba de minería neta";

$system_noblock="No se encontraron contenidos en estos bloques";

$subscribe_broadcast="Confirmar transmisión";
$subscribe_sub="Suscripción";

$channel_title="Canal";
$channel_unsub="Cancelar suscripción";
$channel_suball="Suscribir todos los activos";

$message_title="Mensaje";
$message_address="Dirección del nodo del mensaje";
$message_send="Dirección del remitente";
$message_my="Mi dirección";

$tag_address="Dirección del nodo de etiqueta";

$check_asset="Búsqueda de activos masivos";
$check_only="Mostrar solo disponible";
$check_ok="Disponible";
$check_not="No disponible";

$langs="th";
$turn=1;


}

//thai

if($lang=="th" or $_REQUEST["lang"]=="th")

{

$index_local="ท้องถิ่น";
$index_console="คอนโซล";
$index_word="WORD";
$index_subscription="การสมัครสมาชิก";
$index_channel="ช่อง";
$index_message="ข้อความ";
$index_asset="สินทรัพย์";
$index_tag="แท็ก";
$index_assetexplorer="ตัวสำรวจสินทรัพย์";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="ตรวจสอบสินทรัพย์";
$index_link="เชื่อมโยง";
$index_system="ระบบ";


$keva_myaddress="keva ADDRESS";
$keva_newspace="สร้างช่องว่างใหม่";
$keva_free="รับเครดิตฟรี";

$keva_submit="ส่ง";
$keva_kaw="KAW";
$keva_showall="แสดงเนื้อหาทั้งหมด";
$keva_showlist="แสดงรายการ";
$keva_addnew="สร้างคำใหม่";
$keva_subscribe="สมัครสมาชิก";
$keva_subscription="การสมัครสมาชิก";
$keva_linkipfs="เชื่อมโยง IPFS";
$keva_edit="แก้ไข";
$keva_delete="ลบ";
$keva_broadcast="ออกอากาศ";
$keva_galaxylink="GALAXY LINK";
$keva_message="ข้อความ";
$keva_send="ส่ง";

$keva_comment="ความคิดเห็น";
$keva_create_comment="สร้างพื้นที่แสดงความคิดเห็น";
$keva_sign="SIGNATURE";
$keva_signtalk="จัดการลายเซ็น";
$keva_tips="รางวัล / ของขวัญ";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="ข้อมูลโหนด RVN";
$console_rvn_blockchain="RVN blockchain info";
$console_rvn_count="นับจำนวนบล็อก RVN";
$console_rvn_mining="RVN Testnet";
$console_keva_help="kevaCOIN";
$console_keva_node="keva ข้อมูลโหนด";
$console_keva_blockchain="keva blockchain info";
$console_keva_count="keva จำนวนบล็อก";
$console_keva_mining="ทดสอบการทำเหมืองเน็ต";

$system_noblock="ไม่พบเนื้อหาในบล็อคเหล่านี้";

$Subscribe_broadcast="ยืนยันการออกอากาศ";
$subscribe_sub="การสมัครสมาชิก";

$CHANNEL_TITLE="ช่อง";
$channel_unsub="Unsubcribe";
$channel_suball="สมัครสมาชิกเนื้อหาทั้งหมด";

$message_title="ข้อความ";
$message_address="ที่อยู่โหนดข้อความ";
$message_send="ที่อยู่ผู้ส่ง";
$message_my="ที่อยู่ของฉัน";

$tag_address="ที่อยู่ของโหนดโหนด";

$check_asset="ค้นหาทรัพย์สินจำนวนมาก";
$check_only="แสดงรายการที่ให้บริการเท่านั้น";
$check_ok="ที่มีอยู่";
$check_not="ไม่พร้อมใช้งาน";

$langs="tr";
$turn=1;


}



//turkish

if($lang=="tr" or $_REQUEST["lang"]=="tr")

{

$index_local="Yerel";
$index_console="Konsol";
$index_word="WORD";
$index_subscription="Abonelik";
$index_channel="Kanal";
$index_message="Mesaj";
$index_asset="Varlık";
$index_tag="Etiket";
$index_assetexplorer="Varlık Gezgini";
$index_ipfsexplorer="IPFS Gezgini";
$index_checkasset="Varlığı Kontrol Et";
$index_link="Bağlantı";
$index_system="Sistem";


$keva_myaddress="keva ADRESİ";
$keva_newspace="Yeni Alan Yarat";
$keva_free="Ücretsiz kredi alın";

$keva_submit="Gönder";
$keva_kaw="KAW";
$keva_showall="Tüm İçeriği Göster";
$keva_showlist="Listeyi Göster";
$keva_addnew="Yeni Kelime Oluştur";
$keva_subscribe="Abone Ol";
$keva_subscription="Abonelik";
$keva_linkipfs="IPFS'yi Bağla";
$keva_edit="Düzen";
$keva_delete="Sil";
$keva_broadcast="Yayın";
$keva_galaxylink="GALAXY LINK";
$keva_message="Mesaj";
$keva_send="Gönder";

$keva_comment="YORUM YAP";
$keva_create_comment="YORUM YERİ OLUŞTUR";
$keva_sign="İMZA";
$keva_signtalk="İMZA YÖNETİN";
$keva_tips="Ödül / HEDİYELER";

$console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN Düğümü bilgisi";
$console_rvn_blockchain="RVN blok zinciri bilgisi";
$console_rvn_count="RVN blok sayısı";
$console_rvn_mining="RVN Testnet";
$Console_keva_help="kevaCOIN";
$console_keva_node="keva Düğüm bilgisi";
$console_keva_blockchain="keva blockchain bilgisi";
$console_keva_count="keva blok sayısı";
$console_keva_mining="Net madenciliği test et";

$system_noblock="Bu bloklarda içerik bulunamadı";

$subscribe_broadcast="Yayını Onayla";
$subscribe_sub="Abonelik";

$CHANNEL_TITLE="Kanal";
$channel_unsub="Unsubcribe";
$channel_suball="Tüm öğelere abone ol";

$MESSAGE_TITLE="Mesaj";
$message_address="Mesaj düğümü adresi";
$message_send="Gönderen adresi";
$message_my="Adresim";

$tag_address="Etiket Düğümü adresi";

$check_asset="Toplu Varlık Arama";
$check_only="Yalnızca Mevcut Olduğunu Göster";
$check_ok= "Kullanılabilir";
$check_not="Mevcut Değil";

$langs="af";
$turn=1;


}

/*

if($lang=="bs" or $_REQUEST["lang"]=="bs")

{

$langs="en";
$turn=1;


}

*/

//afrikaans

if($lang=="af" or $_REQUEST["lang"]=="af")

{

$langs="en";
$turn=1;

$index_local="Plaaslike";
$index_console="Console";
$index_word="WORD";
$index_subscription="Inskrywing";
$index_channel="Channel";
$index_message="Boodskap";
$index_asset="Bate";
$index_tag="Tag";
$index_assetexplorer="Asset Explorer";
$index_ipfsexplorer="IPFS Explorer";
$index_checkasset="Check Asset";
$index_link="Link";
$index_system="Stelsel";


$keva_myaddress="keva ADDRESS";
$keva_newspace="Nuwe ruimte skep";
$keva_free="Kry gratis krediet";

$keva_submit="Stuur";
$keva_kaw="KAW";
$keva_showall="Toon alle inhoud";
$keva_showlist="Toon lys";
$keva_addnew="Skep nuwe woord";
$keva_subscribe="Betaal";
$keva_subscription="Inskrywing";
$keva_linkipfs="Koppel IPFS";
$keva_edit="Redigeer";
$keva_delete="Delete";
$keva_broadcast="Broadcast";
$keva_galaxylink="GALAXY LINK";
$keva_message="Boodskap";
$keva_send="Stuur";

$keva_comment="Kommentaar";
$keva_create_comment="SKEP KOMMENTAARruimte";
$keva_sign="HANDTEKENING";
$keva_signtalk="HANDTEKENING HANTERING";
$keva_tips="Beloning / GESKENKE";

$Console_rvn_help="RAVENCOIN";
$console_rvn_node="RVN Node-inligting";
$console_rvn_blockchain="RVN blockchain-inligting";
$console_rvn_count="RVN-bloktelling";
$console_rvn_mining="RVN Testnet";
$console_keva_help="KEVACOIN";
$console_keva_node="keva knooppuntinligting";
$console_keva_blockchain="keva blockchain-inligting";
$console_keva_count="keva-bloktelling";
$console_keva_mining="Testnet-ontginning";

$system_noblock="Geen inhoud word in hierdie blokke gevind nie";

$subscribe_broadcast="Bevestig uitsending";
$subscribe_sub="Inskrywing";

$CHANNEL_TITLE="Channel";
$Channel_unsub="Unsubcribe";
$channel_suball="Teken alle bates in";

$message_title="Boodskap";
$message_address="Boodskapnodeadres";
$message_send="Afzenderadres";
$message_my="My adres";

$tag_address="Merk node-adres";

$check_asset="Grootmaat bates soek";
$check_only="Wys slegs beskikbaar";
$Check_ok="Beskikbaar";
$check_not="Nie beskikbaar nie";

}



?>