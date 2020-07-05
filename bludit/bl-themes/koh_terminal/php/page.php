<!-- Post -->
<div class="card my-5">

	<!-- Load Bludit Plugins: Page Begin -->
	<?php Theme::plugins('pageBegin'); ?>

	<!-- Cover image -->
	<?php if ($page->coverImage()): ?>
	<img class="card-img-top mb-3 rounded-0" alt="Cover Image" src="<?php echo $page->coverImage(); ?>"/>
	<?php endif ?>

	<div class="card-body">
		<!-- Title -->
		<h1 class="text-primary"><?php echo $page->title(); ?></h1>

		<?php if (!$page->isStatic() && !$url->notFound()): ?>
		<!-- Creation date -->
		<p class="text-info"><?php echo $page->date(); ?> - <?php echo $L->get('Reading time') . ': ' . $page->readingTime() ?></p>
		<?php endif ?>

		<!-- Full content -->
		<?php echo $page->content(); ?>

	</div>

	<div class="card-body">
		<!-- Load Bludit Plugins: Page End -->
		<?php Theme::plugins('pageEnd'); ?>
    </div>
</div>
