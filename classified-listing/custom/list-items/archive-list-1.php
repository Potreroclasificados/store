<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Classima;

use Rtcl\Helpers\Functions;
use Rtcl\Helpers\Link;
?>
<div class="listing-list-each listing-item listing-list-each-1<?php echo esc_attr( $class ); ?>">
	<div class="rtin-item">
        <div class="rtin-thumb">
            <a class="rtin-thumb-inner rtcl-media" href="<?php the_permalink(); ?>"><?php $listing->the_thumbnail(); ?></a>
        </div>
		<div class="rtin-content-area">
			<div class="rtin-content">
				
				<?php if ( $display['cat'] ): ?>
					<div class="rtin-cat-wrap">
						<a class="rtin-cat" href="<?php echo esc_url( Link::get_category_page_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
					</div>
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

				<?php if ( $display['excerpt'] ): ?>
					<?php 
					$excerpt = Helper::get_current_post_content( $listing_post );
					$excerpt = wp_trim_words( $excerpt, $display['excerpt_limit'] );
					?>
					<p class="rtin-excerpt"><?php echo esc_html( $excerpt ); ?></p>
				<?php endif; ?>

				<ul class="rtin-meta">
					<?php if ( $display['date'] ): ?>
						<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php $listing->the_time();?></li>
					<?php endif; ?>
					<?php if ( $display['user'] ): ?>
						<li class="rtin-usermeta"><i class="fa fa-user-o" aria-hidden="true"></i><?php $listing->the_author();?></li>
					<?php endif; ?>
					<?php if ( $display['location'] ): ?>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php $listing->the_locations( true, false ); ?></li>
					<?php endif; ?>
					<?php if ( $display['views'] ): ?>
						<li><i class="fa fa-eye" aria-hidden="true"></i><?php echo sprintf( esc_html__( '%1$s Views', 'classima' ) , number_format_i18n( $listing->get_view_counts() ) ); ?></li>
					<?php endif; ?>
				</ul>
				<?php do_action( 'classima_listing_list_view_after_content', $listing );?>

                <?php
                    if (Functions::is_account_page('listings')) {
                        do_action('rtcl_listing_loop_extra_meta', $listing);
                    }
                ?>

			</div>
			<div class="rtin-right">
				<?php if ( $display['price'] ): ?>
					<div class="rtin-price"><?php $listing->the_price(); ?></div>
				<?php endif; ?>	
				<div class="rtin-details"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Details', 'classima' ); ?></a></div>
			</div>			
		</div>
	</div>
	<?php if ( $map ) $listing->the_map_lat_long();?>
</div>