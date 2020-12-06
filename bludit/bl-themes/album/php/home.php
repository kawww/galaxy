<?php
error_reporting(0);
?>

<script type="text/javascript" src="/bludit/bl-themes/album/js/jquery-1.8.2.min.js"></script>

<div style="display:none;" id="div_fx_describe">KEVA.APP</div><div id="loading" class="loading">
  <div class="loadbox">
    <div class="loadlogo"></div>
    <div class="loadbg"></div>
  </div> 
</div>
  <div class="p-index main" id="con"> 






<!-- Print all the content -->



<?php 

echo $mp3;

$coun=0;

$long=count($listasset);

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

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

			
			

//showall



			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);
preg_match('/<img[^>]*?src="([^"]*?)"[^>]*?>/i',$valuex,$match);if(!$match[0]){continue;}


if($coun==0){

echo "<section class=\"m-page\"><div class=\"m-img\" ><a href=\"javascript:;\">".$match[0]."</a></div></section>";

}else{

echo "<section class=\"m-page hide\" ><div class=\"m-img\" ><a href=\"javascript:;\">".$match[0]."</a></div>";
echo "</section>";

}

$coun=$coun+1;

 	} 


if($rand!=""){echo "<section class=\"m-page hide\" ><div class=\"m-img\" ><a href=\"javascript:location.reload();\"><img src=/bludit/refresh.png></a></div>";
echo "</section>";}

?>



    
<section class='u-arrow'><img src="/bludit/bl-themes/album/img/btn01_arrow.png" /></section>

</div>




<script>
window.onload=function(){
	var id = document.getElementById("loading");
   setTimeout(function(){document.body.removeChild(id)},1000);
}
</script>
 

<script type="text/javascript" src="/bludit/bl-themes/album/js/jquery.easing.1.3.js"></script> 
<script type="text/javascript" src="/bludit/bl-themes/album/js/page_scroll_bx.js?v=1.3"></script> 





