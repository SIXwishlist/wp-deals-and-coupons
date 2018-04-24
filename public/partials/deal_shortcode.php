
 <?php

if (!$coupon_query->post_count)
{
	_e('Sorry, no deal/coupon found.');
}
else
{
	while ($coupon_query->have_posts())
	{
		$coupon_query->the_post();
		$meta_values = get_post_meta($coupon_query->post->ID);

		?>
<div class="scb-deal-each">
	<div class="scb-deal-row">
		<div class="scb-left-col scb-col">
			<div class="caption-holder">
				<h3 class="scb-coupon-text"><?php echo ($meta_values['scb-coupon-text'][0]); ?></h3>
				<?php if ($meta_values['scb-coupon-text-second'][0]): ?>
					<h4 class="scb-coupon-text-second"><?php echo ($meta_values['scb-coupon-text-second'][0]); ?></h4>
				<?php endif;?>
				<h5 class="scb-coupon-type"><?php echo (wp_deals_and_coupons()->coupons_types[$meta_values['scb-coupon-type'][0]]); ?></h5>
			</div>
		</div>
		<!-- col -->
		<div class="scb-center-col scb-col">
			<h4 class="scb-coupon-title"><?php echo (get_the_title($coupon_query->post->ID)); ?></h4>
			<p class="scb-coupon-description">
				<?php echo (get_the_content($coupon_query->post->ID)); ?>
				<i class="dashicons dashicons-arrow-up-alt2"></i>
			</p>
			 <?php if ($meta_values['scb-coupon-terms'][0]): ?>
			<div class="scb-coupon-terms-holder">
				<div class="scb-coupon-terms-label">
					<i class="dashicons dashicons-info"></i> Terms &amp; Conditions
				</div>
				<div style="clear:both"></div>
				<div class="scb-coupon-terms" style="display: none">
					<?php if ($meta_values['scb-coupon-expire-date'][0]):

			$date = strtotime(@$meta_values['scb-coupon-expire-date'][0]." GMT");
			$date = date(get_option('date_format'), $date);

			?>
							<div><strong>Expiration date:</strong> <?php echo ($date); ?></div>
						<?php endif;?>
					<p>
					<?php echo ($meta_values['scb-coupon-terms'][0]); ?>
					</p>
				</div>
			</div>
			<?php endif;?>
		</div>
		<!-- col -->
		<div class="scb-right-col scb-col">
			<?php if ($meta_values['scb-coupon-type'][0] == 'deal')
		{
			?>
			<a target="_blank" data-type="<?php echo ($meta_values['scb-coupon-type'][0]); ?>"  class="scb-coupon-deal-link" href="<?php echo ($meta_values['scb-coupon-deal-link'][0]); ?>"><?php echo ($meta_values['scb-coupon-button-text'][0] ?: 'Deal'); ?></a>
			<?php }
		else if ($meta_values['scb-coupon-type'][0] == 'coupon')
		{
			?>
			<span class="scb-coupon-code" data-code="<?php echo ($meta_values['scb-coupon-code'][0]); ?>"><?php echo ($meta_values['scb-coupon-code'][0]); ?></span>
			<?php }
		else
		{
			?>
				<div>
							<span class="scb-coupon-code" data-code="<?php echo ($meta_values['scb-coupon-code'][0]); ?>"><?php echo ($meta_values['scb-coupon-code'][0]); ?></span>
							<br/>
						</div>
						<div>


								<a target="_blank"  data-type="<?php echo ($meta_values['scb-coupon-type'][0]); ?>" class="scb-coupon-deal-link" href="<?php echo ($meta_values['scb-coupon-deal-link'][0]); ?>"><?php echo ($meta_values['scb-coupon-button-text'][0] ?: 'Deal'); ?></a>
							</div>


				<?php
}
		?>
		</div>
		<!-- col -->
	</div>
	<!-- row -->
</div>
	<?php }
	wp_reset_postdata();
	?>
<!-- End of the main loop -->

<!-- Add the pagination functions here. -->
<?php if ($coupon_query->max_num_pages > 1)
	{
		?>

<div class="nav-previous alignleft"><?php next_posts_link('Older ', $coupon_query->max_num_pages);?></div>
<div class="nav-next alignright"><?php previous_posts_link('Newer ');?></div>
<?php }?>

<?php
}
?>