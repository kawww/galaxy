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





$page=intval($_REQ["page"]);

$blocknow=$kpc->getblockcount();

$blocknow=intval($blocknow);

if($webmode==1){

$blockread=$blocknow-$sysweb*$page;
$blockstart=$sysweb;}else{

$blockread=$blocknow-$syslocal*$page;
$blockstart=$syslocal;}

$blockleft=$blockread-$blockstart;











//block

$arr=array();
$arrx=array();
$totalass=array();



while($blockread>$blockleft){


		$block=$blockread;


		
		

		$blockhash= $kpc-> getblockhash(intval($block));

	

		$blockdata= $kpc->getblock($blockhash);

			
	

		foreach($blockdata['tx'] as $txa)

		{
			
		$transaction= $kpc->getrawtransaction($txa,1);



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

								$arrx["block"]=$block;
								$arrx["sadd"]=$kadd;
								$arrx["snewkey"]=hex2bin($cons);
								$arrx["sinfo"]=hex2bin($conk);
								$arrx["txa"]=$txa;

								$arrx["size"]=$transaction['size'];

								array_push($totalass,$arrx);
								
								}

								else

							  {

								 
							    
							
								$arrx["block"]=$block;
								$noblock="NO CONTENTS FOUND IN BLOCK [ ".$block." ]";
								$arrx["sinfo"]=$noblock;
								
								$arrx["sadd"]="";
								$arrx["snewkey"]="";
							
								$arrx["txa"]="1";

								array_push($totalass,$arrx);

							
							  
							  }
						  }

		}

	$blockread=$blockread-1;
	}
								
			








foreach ($totalass as $k=>$v) 

							{
							
								extract($v);


$asset = $rpc->getassetdata($snewkey);

if(isset($asset) & $asset['has_ipfs']==1){$snewkey="<a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$asset['txid'].">".$snewkey."</a>";}


$x_value=$snewkey;

	$sinfo=str_replace("<script>","< script >",$sinfo);

								$value=$sinfo;
								
								$asset=$sinfo;
								
								$sscontent=$value;

											
									
										$valuex=str_replace("\n","<br>",$value);


										


			//namespace channel
										

											$sstitle=$snewkey;


											$sscontent=turnUrlIntoHyperlink($valuex);

												
											$sstx=$txa;		
											
										

																	
											

							$arrj[] = array(
								
															'title'=>$sstitle,
															'content'=>$sscontent,
															'block'=>$block,
															'tx'=>$sstx,
															'add'=>$sadd,
											);
					
									
				
								} 


			

				


		

	





	
echo json_encode($arrj);


?>