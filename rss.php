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


$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;





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

		 $info= $kpc->keva_filter($asset,"",96000,0,10);}

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



			$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

		
		

			$titlek=$namespace['value'];

$title=$titlek;
$description=$title.' Namespace Datas on Kevacoin Blockchain';
$link='http://galaxyos.io/stone.php?lang=&amp;asset='.$asset.'&amp;showall=11&stone=1&amp;group=no';

class Rss
{
	
	public $title;
	
	

	public $description;
	
	

	public $link;
	
	public $language = 'en';
	
	public $copyright = '';
	
	public $pubDate;
	
	public $generator = 'galaxyos.io';
	
	public $items = [];
	
	public function __construct($data = [])
	{
		$this->setData($data);
	}
	
	public function setData($data)
	{
//		$this->pubDate = date("D, d M Y H:i:s ", strtotime($date)) . "GMT";
		foreach ($data as $key => $value) {
			$this->$key =  $value;
		}
	}
	
	public function __set($name, $value)
	{
	
	}
	
	public function setItem(array $item)
	{
		$this->items[] = $item;
	}
	
	public function renderRss() : string
	{
		return $this->renderHeader() . $this->renderItems() . $this->renderFooter();
	}
	
	public function renderItems()
	{
		$xml = '';
		foreach ($this->items as $data) {
			$xml .= "\t<item>\n\t";
			foreach ($data as $key => $value) {
				$xml .= "\t";
				switch ($key) {
					case 'title' :
						$xml .= sprintf('<title><![CDATA[ %s ]]></title>', $value);
						break;
					case 'description' :
						$xml .= sprintf('<description><![CDATA[ %s ]]></description>', $value);
						break;
					case 'link' :
						$xml .= sprintf('<link>%s</link>', $value);
						break;
					case 'pubDate' :
						$xml .= sprintf('<pubDate>%s</pubDate>', $value);
						break;
					case 'guid' :
						$xml .= sprintf('<guid>%s</guid>', $value);
						break;
				}
				$xml .= "\n\t";
			}
			$xml .= "</item>\n";
		}
		
		return $xml;
	}
	
	public function renderHeader() : string
	{
		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<rss version=\"2.0\">
<channel>
	<title>{$this->title}</title>
	<description>{$this->description}</description>
	<link>{$this->link}</link>
	<generator>{$this->generator}</generator>
	<image>
		<url>http://galaxyos.io/galaxy.ico</url>
		<title>Galaxy</title>
		<link>http://galaxyos.io</link>
	</image>\n";
		
		return $xml;
	}
	
	public function renderFooter() : string
	{
		return "</channel>\n</rss>";
	}
}





$rss = new Rss();

// $dataList 


foreach ($listasset as $value) {


$current_encode = mb_detect_encoding($value['value'], array("ASCII","GB2312","GBK",'BIG5','UTF-8','ANSI')); 
    $encoded_str = mb_convert_encoding($value['value'], 'UTF-8', $current_encode);

    $item = [
        'title' => $value['key'],
        'description' => $encoded_str,
        'link' => 'http://galaxyos.io/bludit/?theme=alternative&amp;txid='.$value['txx'],
        'pubDate' => date("D, d M Y H:i:s ", $value['ctime']) . "GMT",
        'guid' => $value['heightx'],
    ];
    $rss->setItem($item);
}

$xmlString = $rss->renderRss();

header('Content-Type:application/xml; charset=UTF-8');

$xmlString=preg_replace('/[\x00-\x1F\x7F]/', '', $xmlString);


echo $xmlString;



?>