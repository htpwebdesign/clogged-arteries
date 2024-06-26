<?php
if(isset($_GET['restaurants'])) {
    $_SESSION['restaurants'] = $_GET['restaurants'];
}


/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clogged_Arteries
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Discover a delicious twist on modern junk food at Clogged Arteries restaurant – where every bite is an irresistible temptation you won't want to resist.">
	<meta name="theme-color" content="#fff">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'clogged-arteries' ); ?></a>
	<header id="masthead" class="site-header">
		<div class = "location-switcher">
			<!-- Location Switcher -->
			<?php
			if($_SESSION['restaurants']):
				$location = ucwords(str_replace('-', ' ', $_SESSION['restaurants']));
				?>
				<button id = "switch-location-btn" class="switch-location-btn">
					<h2>My Location: <?php echo $location ?></h2>
					<i class="arrow" id="location-arrow"></i>
				</button>
				<div class="splash-form header-location">
					<form id = 'location-switch-form' class = 'location-dropdown hidden' action="<?php echo get_permalink('86') ?>" method="get">
						<?php
						$args = array(
							'post_type'         => 'cla-restaurant',
							'posts_per_page'    => -1,
							'order'             => 'DESC',
							'orderby'           => 'title'
						);
				
						$query = new WP_Query($args);
						if ($query->have_posts()) :
							echo "<h2 class='location-heading'>Switch Location</h2>";
							while ($query->have_posts()) :
								$query->the_post();
								$post_slug = $post->post_name;
						?>
						<button type="submit" name="restaurants" value="<?php echo $post_slug ?>" id="<?php echo $post_slug ?>" class="city-label dropdown-city-label">
							<?php the_title(); ?>
						</button>
						<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</form>
				</div>
				<?php
			endif;
			?>
		</div>
		<nav id="site-navigation" class="main-navigation">
			<div class="nav-container-mobile">
				<div class="site-branding">
					<a href="<?php echo get_permalink(86)?>">
						<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' ); ?>
					</a>
				</div>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" aria-labelledby="title desc">
						<title id="title">Menu icon</title>
						<desc id="desc">An icon representing a menu with three horizontal lines.</desc>
						<path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
					</svg>
				</button>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
