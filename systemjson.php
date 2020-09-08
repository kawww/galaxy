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

while(!$blocknow){sleep(1);$blocknow=$kpc->getblockcount();}

$blocknow=intval($blocknow);

if($webmode==1){

$blockread=$blocknow-$sysweb*$page;
$blockstart=$sysweb;}

else

{

$blockread=$blocknow-$syslocal*$page;
$blockstart=$syslocal;

}

$blockleft=$blockread-$blockstart;











//block

$arr=array();
$arrx=array();
$arry=array();
$totalass=array();
$blockn=0;


while($syslocal<>$blockn){


		$block=$blockread-$blockn;


		
		

		$blockhash= $kpc-> getblockhash(intval($block));

	

		$blockdata= $kpc->getblock($blockhash);

			
	

		$kcheck=0;
		$countb=0;

		foreach($blockdata['tx'] as $txa)

					{

						
		 
		$transaction= $kpc->getrawtransaction($txa,1);

		

	
		
						foreach($transaction['vout'] as $vout)
	   
						  {
			
							$op_return = $vout["scriptPubKey"]["asm"]; 
							$arr = explode(' ', $op_return); 


							
							
							if($arr[0] == 'OP_KEVA_NAMESPACE' or $arr[0] == "OP_KEVA_PUT")

								{

									

							     $kcheck=1;

								 $cona=$arr[1];
								 $cons=$arr[2];
								 $conk=$arr[3];
					
									

								$asset=Base58Check::encode( $cona, false , 0 , false);

								$arrx["block"]=$block;	

								
								
					
							
								$kadd=$vout["scriptPubKey"]["addresses"][0];

								
								$arrx["sadd"]=$kadd;
								$arrx["snewkey"]=hex2bin($cons);
								$arrx["sinfo"]=hex2bin($conk);
								$arrx["txa"]=$txa;
								$arrx["np"]=$asset;

								

								$arrx["size"]=$transaction['size'];

								$arrx["count"]=$countb;

					
										$arrx["npn"]="";
					
										

										$namespace= $kpc->keva_get($asset,"_KEVA_NS_");

										$title=$namespace['value'];

					
										$arrx["npn"]=$title;

										if($arr[0] == 'OP_KEVA_NAMESPACE'){
										
										$arrx["nptrue"]=1;

										}

										$arrx["npy"]=1;


												

								array_push($totalass,$arrx);

								
								  }

				

							
						  }

		
						 

		$countb=$countb+1;
		$txa="";

					}

								if($kcheck=="0")
						
								   {
							  
								$arry["block"]=$block;
								$arry["txa"]="";
								$arry["np"]="";
								$arry["npn"]="";
								$arry["npy"]=0;
								array_push($totalass,$arry);
	
								 }

		

	$blockn=$blockn+1;

	}
								
			








foreach ($totalass as $k=>$v) 

							{
							
								extract($v);


//$asset = $rpc->getassetdata($snewkey);

if(isset($asset) & $asset['has_ipfs']==1){$snewkey="<a href=subscription.php?lang=".$_REQUEST["lang"]."&txid=".$asset['txid'].">".$snewkey."</a>";}


$x_value=$snewkey;

	$sinfo=str_replace("<script>","< script >",$sinfo);

								$value=$sinfo;
								
								$asset=$sinfo;
								
								$sscontent=$value;

											
									
										$valuex=$value;


										


			//namespace channel
										

											$sstitle=$snewkey;


											$sscontent=$valuex;

												
											$sstx=$txa;		
											
										

									$npn=htmlspecialchars($npn);
									$sstitle=htmlspecialchars($sstitle);
									$sscontent=htmlspecialchars($sscontent);
									
											

							$arrj[] = array(
								
															'title'=>$sstitle,
															'content'=>$sscontent,
															'block'=>$block,
															'tx'=>$sstx,
															'add'=>$sadd,
															'np'=>$np,
															'npn'=>$npn,
															'npy'=>$npy,
															'nptrue'=>$nptrue,
															'ncount'=>$count,
											);
					
									
				
								} 


			

				


		

	





	
echo json_encode($arrj);


?>