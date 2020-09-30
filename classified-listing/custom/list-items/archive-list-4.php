<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Classima;

use Rtcl\Helpers\Link;
use Rtcl\Helpers\Functions;

$phone = get_post_meta( $listing_post->ID, 'phone', true );
?>
<div class="listing-list-each listing-list-each-4<?php echo esc_attr( $class ); ?>">
	<div class="rtin-item">
        <div class="rtin-thumb">
            <a class="rtin-thumb-inner rtcl-media" href="<?php the_permalink(); ?>"><?php $listing->the_thumbnail(); ?></a>
        </div>
		<div class="rtin-content-area">
			<div class="rtin-content">

				<?php if ( $display['cat'] ): ?>
					<a class="rtin-cat" href="<?php echo esc_url( Link::get_category_page_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endif; ?>

				<h3 class="rtin-title listing-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<?php
				if ( $display['label'] ) {
					$listing->the_labels();
				}
				?>

				<?php
				if ( $display['fields'] ) {
					$listing->the_listable_fields();
				}
				?>

				<ul class="rtin-meta">
					<?php if ( $display['date'] ): ?>
						<li><i class="fa fa-fw fa-clock-o" aria-hidden="true"></i><?php $listing->the_time();?></li>
					<?php endif; ?>
					<?php if ( $display['user'] ): ?>
						<li class="rtin-usermeta"><i class="fa fa-fw fa-user-o" aria-hidden="true"></i><?php $listing->the_author();?></li>
					<?php endif; ?>
					<?php if ( $display['location'] ): ?>
						<li><i class="fa fa-fw fa-map-marker" aria-hidden="true"></i><?php $listing->the_locations( true, false ); ?></li>
					<?php endif; ?>
					<?php if ( $display['views'] ): ?>
						<li><i class="fa fa-fw fa-eye" aria-hidden="true"></i><?php echo sprintf( esc_html__( 'Visit: %1$s', 'classima' ) , number_format_i18n( $listing->get_view_counts() ) ); ?></li>
					<?php endif; ?>
				</ul>

				<?php if ( $display['excerpt'] ): ?>
					<?php 
					$excerpt = Helper::get_current_post_content( $listing_post );
					$excerpt = wp_trim_words( $excerpt, $display['excerpt_limit'] );
					?>
					<p class="rtin-excerpt"><?php echo esc_html( $excerpt ); ?></p>
				<?php endif; ?>

				<?php do_action( 'classima_listing_list_view_after_content', $listing );?>

			</div>
			<div class="rtin-right">
				<?php if ( $display['type'] && $type ): ?>
					<div class="rtin-type"><i class="fa <?php echo esc_attr( $type['icon'] );?>" aria-hidden="true"></i><?php echo esc_html( $type['label'] ); ?></div>
				<?php endif; ?>
				<?php if ( $display['price'] ): ?>
					<div class="rtin-price"><?php $listing->the_price(); ?></div>
				<?php endif; ?>
				<?php if ( $phone ): ?>
					<div class="rtin-phn">
						<a class="classima-phone-reveal not-revealed" href="#" data-phone="<?php echo esc_attr( $phone );?>"><i class="fa fa-phone" aria-hidden="true"></i><span><?php esc_html_e( 'Show Phone No', 'classima' );?></span></a>
					</div>
				<?php endif; ?>
				<div class="rtin-fav"><?php echo Functions::get_favourites_link( $listing_post->ID );?></div>
			</div>			
		</div>

	</div>
	<?php if ( $map ) $listing->the_map_lat_long();?>
</div>