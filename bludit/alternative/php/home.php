<?php
error_reporting(0);

?>
<!-- Welcome message -->
<header class="welcome bg-light">
	<div class="container text-center">
		<!-- Site title -->
		<h1><?php echo $title; ?></h1>

		<!-- Site description -->
		<?php if ($site->description()): ?>
		<p class="lead"><?php echo $site->description(); ?></p>
		<?php endif ?>

		<!-- Custom search form if the plugin "search" is enabled -->
		<?php if (pluginActivated('pluginSearch')): ?>
		<div class="form-inline d-block">
			<input id="search-input" class="form-control mr-sm-2" type="search" placeholder="<?php $language->p('Search') ?>" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="button" onClick="searchNow()"><?php $language->p('Search') ?></button>
			<script>
				function searchNow() {
					var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
					window.open(searchURL + document.getElementById("search-input").value, "_self");
				}
				document.getElementById("search-input").onkeypress = function(e) {
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13') {
						searchNow();
						return false;
					}
				}
			</script>
		</div>
		<?php endif ?>
	</div>
</header>

<?php if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<!-- Print all the content -->



<?php 

if($pin<>""){


echo "<section class=\"home-page\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-8 mx-auto\">";

echo "<a class=\"text-dark\" href=\"\"><h2 class=\"title\">&#x1F4D1;</h2></a>";

echo "<p class=\"page-description\">";


echo str_replace("\n","<br>",$pin);

echo "</p></div></div></div></section>";



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

		//comment

								
			
								 if(stristr($value,"::") == true)
									{
									
										$commtool=explode('::', $value);

										$value=$commtool[0];

										if(strlen(trim(strip_tags($commtool[1]))) == 34)
												 {
											      $commentadd=trim(strip_tags($commtool[1]));

												 
													}


							

									    foreach ($commtool as $tool) 

											{

											 if(stristr($tool,"RAVENCOIN_COMMENT_ADDRESS") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("RAVENCOIN_COMMENT_ADDRESS:","",$tool)));
													}
											if(stristr($tool,"rvnkaw") == true)
												 {
											      $commentadd=trim(strip_tags(str_replace("rvnkaw:","",$tool)));
													}

													
											
											
											
											}

									}


//showall



			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);


?>

<section class="home-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">

				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<!-- Page title -->
				<a class="text-dark" href="">
					<h2 class="title"><?php echo $key; ?></h2>
				</a>

				<!-- Page description -->
				
				<p class="page-description"><?php echo $valuex; ?><br>
				
				<?php

				if($commentadd<>""){


				echo "<li style=\"display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
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
			
						echo "<li style=\"display:block;height:auto;width:900px;padding-top:20px;line-height:40px;font-size:18px;\"><p align=left>";
			
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
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#16f516;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if(strlen($assetinfo["ipfs_hash"])==46){$giftlink=$ipfscon."".$assetinfo["ipfs_hash"];
				
				echo "<a href=\"".$giftlink."\" style=\"background-color:#16f516;\" target=_blank>&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				if($assetinfo["has_ipfs"]==0){echo "<a href=\"".$giftlink."\" style=\"background-color:#16f516;color:#eee;\">&nbsp;&nbsp;".$gift_value."&nbsp;<font color=\"#ccc\">".$giftn."</font>&nbsp;&nbsp;</a>&nbsp;&nbsp;";}

				
			}
			
			echo "&nbsp;&nbsp;</p></li>";
				
				echo "<hr><font size=1>The content support blockchain signature/assets powered by ravencoin. The address is </font>".$commentadd."<br>";
				
				
				
				
				
				
				
				}
				
				?>
				</p>
			

				<!-- Page content until the pagebreak -->
				<div>
				
				</div>

				<!-- Shows "read more" button if necessary -->
				<?php if ($page->readMore()): ?>
				<div class="text-right pt-3">
				<a class="btn btn-primary btn-sm" href="<?php echo $page->permalink(); ?>" role="button"><?php echo $L->get('Read more'); ?></a>
				</div>
				<?php endif ?>

				<!-- Load Bludit Plugins: Page End -->
				<?php Theme::plugins('pageEnd'); ?>
			</div>
		</div>
	</div>
</section>

<?php 	} ?>

<!-- Pagination -->
<?php if (Paginator::numberOfPages()>1): ?>
<nav class="paginator">
	<ul class="pagination flex-wrap justify-content-center">

		<!-- Previous button -->
		<?php if (Paginator::showPrev()): ?>
		<li class="page-item mr-2">
			<a class="page-link" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <?php echo $L->get('Previous'); ?></a>
		</li>
		<?php endif; ?>

		<!-- Home button -->
		<li class="page-item <?php if (Paginator::currentPage()==1) echo 'disabled' ?>">
			<a class="page-link" href="<?php echo Theme::siteUrl() ?>"><?php echo $L->get('Home'); ?></a>
		</li>

		<!-- Next button -->
		<?php if (Paginator::showNext()): ?>
		<li class="page-item ml-2">
			<a class="page-link" href="<?php echo Paginator::nextPageUrl() ?>"><?php echo $L->get('Next'); ?> &#9658;</a>
		</li>
		<?php endif; ?>
	</ul>
</nav>
<?php endif ?>
