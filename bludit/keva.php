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

		$arr=array();
		$totalass=array();
			$combine="";


if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}

if(!$_REQ["asset"]){$asset="NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS";}


$txid=$_REQ["txid"];

if(isset($txid) & strlen($txid)=="64"){

			$transaction= $kpc->getrawtransaction($txid,1);

			$blockhash=$kpc->getblock($transaction["blockhash"]);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arrx = explode(' ', $op_return); 

					if($arrx[0] == 'OP_KEVA_PUT') 
						{

					
					 $arr["key"]=hex2bin($arrx[2]);
		
					$arr["value"]=$arrx[3];

					$arr["gtime"]=$blockhash["time"];
					$arr["heightx"]=$$blockhash["height"];

					 //$kadd=$vout["scriptPubKey"]["addresses"][0];

					 array_push($totalass,$arr);
				
						} 

				 }

			}
	

	
if(!$txid)

{
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

		

		


		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			If($key=="_KEVA_NS_"){$title=$value;continue;}

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["adds"]=$address;
			$arr["value"]=bin2hex($value);
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

			



			

}

$listasset=$totalass;

//menu


			$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

		
		

			$title=$namespace['value'];

			$sname=$_REQ["sname"];
			
			if(!$_REQ["sname"]){$sname=strtoupper($title);}



function hsv2rgb($H, $S, $V)
{
    // hack to get rid of unreadable pale yellow on white
    if ($H > 0.1 && $H < 0.7) {
        $V -= 0.15;
    }
    if ($S == 0) {
        $R = $G = $B = $V * 255;
    } else {
        $var_H = $H * 6;
        $var_i = floor($var_H);
        $var_1 = $V * (1 - $S);
        $var_2 = $V * (1 - $S * ($var_H - $var_i));
        $var_3 = $V * (1 - $S * (1 - ($var_H - $var_i)));
        if ($var_i == 0) {
            $var_R = $V;
            $var_G = $var_3;
            $var_B = $var_1;
        } else {
            if ($var_i == 1) {
                $var_R = $var_2;
                $var_G = $V;
                $var_B = $var_1;
            } else {
                if ($var_i == 2) {
                    $var_R = $var_1;
                    $var_G = $V;
                    $var_B = $var_3;
                } else {
                    if ($var_i == 3) {
                        $var_R = $var_1;
                        $var_G = $var_2;
                        $var_B = $V;
                    } else {
                        if ($var_i == 4) {
                            $var_R = $var_3;
                            $var_G = $var_1;
                            $var_B = $V;
                        } else {
                            $var_R = $V;
                            $var_G = $var_1;
                            $var_B = $var_2;
                        }
                    }
                }
            }
        }
        $R = $var_R * 255;
        $G = $var_G * 255;
        $B = $var_B * 255;
    }
    return array($R, $G, $B);
}
function letter_avatar($text)
    {
        $total = unpack('L', hash('adler32', $text, true))[1];
        $hue = $total % 360;
        list($r, $g, $b) = hsv2rgb($hue / 360, 0.3, 0.9);

        $bg = "rgb({$r},{$g},{$b})";
        $color = "#ffffff";
        $first = mb_strtoupper(mb_substr($text, 0, 1));
        $src = base64_encode('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="100" width="100"><rect fill="' . $bg . '" x="0" y="0" width="100" height="100"></rect><text x="50" y="50" font-size="50" text-copy="fast" fill="' . $color . '" text-anchor="middle" text-rights="admin" alignment-baseline="central">' . $first . '</text></svg>');
        $value = 'data:image/svg+xml;base64,' . $src;
        return $value;
    }





?>
