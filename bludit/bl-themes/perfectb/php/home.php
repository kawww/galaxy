<?php
error_reporting(0);
?>
<pre><code><?php if ($site->slogan()): ?><h1><?php echo ucfirst($url->slug()); ?></h1><?php
$description = $site->description();
if ($WHERE_AM_I == 'category') {
    try {
        $categoryKey = $url->slug();
        $category = new Category($categoryKey);
        $description = $category->description();
    } catch (Exception $e) {
        print_r($e);
        // description from the site
    }
}
echo $description; ?><?php endif; ?>


<?php


if($pin<>""){



echo "<h2><a>&#x1F4D1;</a></h2><small><a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&gname=".bin2hex($gnamex).">".$gnamex."</a>";  

echo "<br></small>";

echo "<font color=dddddd style=\"font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif;\">";

echo str_replace("\n","<br>",$pin);

echo "</font><br><br>";



}



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



	if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}

	if($gnamespace==$asset){$gnamer=$title;}
?><article><?php Theme::plugins('pageBegin'); // Load Bludit Plugins: Page Begin ?>
<h2><a href="<?php echo "?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&gname=".bin2hex($gnamex); ?>"><?php echo $key; ?></a></h2><small><?php echo "<a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&gname=".bin2hex($gnamex).">".$gnamex."</a>";  
					 echo "<font color=dddddd> - ".date('Y-m-d H:i',$gtime)."</font><br>"; ?></small> | <?php if ($page->category()):?><a href="<?php echo DOMAIN_CATEGORIES.$page->categoryKey() ?>" rel="tag"><?php echo $page->category() ?></a>
<?php endif?>
<?php
if(strlen($page->description())>0 ){
    echo  $page->description();
} else {
    $max = 333;
    $all = explode(' ', substr($page->content(false), 0, $max));
    array_pop($all);
    echo implode(' ', $all);
    if (strlen($page->content(false)) > $max) {
        echo "... ";
    }
}
?><font color=dddddd style="font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif; "><br><?php echo $valuex; ?></font><?php Theme::plugins('pageEnd'); ?></article><hr /><?php } ?></code></pre>
