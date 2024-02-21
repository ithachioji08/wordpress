<?php get_header(); ?> 
<div id="slide">
	<ul class="slide-inner">
		<li></li>
		<li></li>
		<li></li>
	</ul>
	<div class="s-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/nav_prev.png" alt="前へ"></div>
	<div class="s-next"><img src="<?php echo get_template_directory_uri(); ?>/images/nav_next.png" alt="次へ"></div>
	<div class="cont-nav"></div>
</div>
<div class="container">
	<div id="contents">
		<div class="top-nav">
			<div class="top-navColumn top-navColumn_left">
				<h2>SERVICE</h2>
				<div class="top-navPhoto"><a href="<?php echo home_url(); ?>/service.html"><img src="<?php echo get_template_directory_uri(); ?>/images/photo02.jpg" alt="" width="460" /></a></div>
				<p>弊社のサービスをご紹介します。</p>
				<p class="top-navDetail"><a href="<?php echo home_url(); ?>/service.html">MORE</a></p>
			</div>
			<div class="top-navColumn top-navColumn_right">
				<h2>COMPANY</h2>
				<div class="top-navPhoto"><a href="<?php echo home_url(); ?>/company.html"><img src="<?php echo get_template_directory_uri(); ?>/images/photo03.jpg" alt=""  width="460" /></a></div>
				<p>会社情報をご紹介します。</p>
				<p class="top-navDetail"><a href="<?php echo home_url(); ?>/company.html">MORE</a></p>
			</div>
		</div>
		<div id="cont_left">
			<div class="information">
				<h2>INFORMATION</h2>
				<dl>
					<?php 
						//$infoPosts = get_posts('numberposts=4&category=1'); 
						//foreach($infoPosts as $post): 
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$the_query = new WP_Query( array(
							'post_status' => 'publish',
							'post_type' => 'post', //ページの種類（例、page、post、カスタム投稿タイプ）
							'paged' => $paged,
							'posts_per_page' => 5, // 表示件数
							'orderby'     => 'date',
							'order' => 'DESC',
							'cat' => 1
						) );
						if ($the_query->have_posts()) :
							while ($the_query->have_posts()) : $the_query->the_post();
					?> 
								<dt><?php the_time('Y-m-d')?></dt>
								<dd>
									<span class="tab tag_<?php $cat = get_the_category(); $cat=$cat[0];{echo $cat->slug;}?>">
									<?php $cat=get_the_category();$cat=$cat[0];{echo $cat->cat_name;} ?></span>
									<a href="<?php the_permalink(); ?>"><?php the_title();?>を掲載しました</a>
								</dd>
					<?php //endfor
							endwhile; 
						else:
							echo '<div><p>ありません。</p></div>';
						endif;
						wp_pagenavi();
					?>	
				</dl>
				
			</div>
			<div class="information">
				<h2>BLOG</h2>
				<dl>
					<?php
						$infoPosts = get_posts('numberposts=4&category=3'); 
						foreach($infoPosts as $post):
					?>
						<dt><?php the_time('Y-m-d'); ?></dt>
						<dd>
							<div class="b_img"><?php the_post_thumbnail('thumbside'); ?></div>
							<div class="b_right">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						</dd>
					<?php endforeach;  ?>
					
				</dl>
			</div>
		</div>      
		<?php get_sidebar(); ?> 
	</div>
</div>
<?php get_footer();