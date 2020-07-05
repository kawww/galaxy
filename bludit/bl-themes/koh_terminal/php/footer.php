<footer class="footer">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-md-4 text-left">
				col 1 - Hier kommt noch was anderes hin. :)
			</div>
		
		
			<div class="col-md-4 text-center">
				<p class="text-white"><?php echo $site->footer(); ?></p>
				<p><span class="text-warning">Powered by<img class="mini-logo" src="<?php echo DOMAIN_THEME_IMG.'bludit.png'; ?>"/><a target="_blank" class="text-white" href="https://www.bludit.com">Bludit</a></span></p>
			</div>

			<div class="col-md-4 text-right" id="social">
				<!-- Social Networks -->
					<?php foreach (Theme::socialNetworks() as $key=>$label): ?>
					<ui>
						<a class="list-group-horizontal" href="<?php echo $site->{$key}(); ?>" target="_blank">
							<img class="nav-svg-icon" src="<?php echo DOMAIN_THEME.'img/'.$key.'.svg' ?>" alt="<?php echo $label ?>" />
							<span class="d-inline d-sm-none"><?php echo $label; ?></span>
						</a>
					</ui>
					<?php endforeach; ?>
			</div>

		</div>	
		
	</div>
</footer>
