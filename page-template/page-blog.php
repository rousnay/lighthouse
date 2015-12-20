<?php
/**
 * Template Name: Blog
 *
 * @package Lighthouse
 */
get_header(); ?>
    <div class="title-area">
    <h1 class="page-title">Blog</h1>
  </div>

<div id="filters" class="select-filter">
    <select class="filtering">
        <option value=".events">Events</option>    
        <option value=".workshops">Workshops</option>
        <option value=".products">Products</option>
        <option value=".talents">Talents</option>
        <option value=".tutorials">Tutorials</option>
        <option value=".all">All</option>
    </select>    
</div>

<ul id="filters" class="load-slideInDown" >
        <li class="events" data-filter=".events"><a href="javascript:void(0)">Events</a></li>
        <li class="workshops" data-filter=".workshops"><a href="javascript:void(0)">Workshops</a></li>
        <li class="products"data-filter=".products"><a href="javascript:void(0)">Products</a></li>
        <li class="talents" data-filter=".talents"><a href="javascript:void(0)">Talents</a></li>
        <li class="tutorials" data-filter=".tutorials"><a href="javascript:void(0)">Tutorials</a></li>
        <li class="active all" data-filter=".all"><a href="javascript:void(0)">All</a></li>

        <?php/**
             /**$terms = get_terms("category");
            $count = count($terms);
            if ( $count > 0 ){
 
                foreach ( $terms as $term ) {
 
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                }
            }
            echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">All</a></li>';
        **/ ?>
    </ul>


<div id="blogContent">
              <?php 
       $args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
       $loop = new WP_Query( $args );
         while ( $loop->have_posts() ) : $loop->the_post(); 
 
       $terms = get_the_terms( $post->ID, 'category' );           
            if ( $terms && ! is_wp_error( $terms ) ) : 
 
                $links = array();
 
                foreach ( $terms as $term ) {
                    $links[] = $term->name;
                }
 
                $tax_links = join( " ", str_replace(' ', '-', $links));          
                $tax = strtolower($tax_links);
            else :  
          $tax = '';          
            endif; ?>
 
        <div class="all blog-item <?php echo $tax; ?>">
        <a href="<?php the_permalink() ?>" title="<?php  the_title_attribute() ?>">
          <?php
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing');
          $url = $thumb[0];
          ?>
        <div class="thumbnail blog-item-img load-fadeInUp" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
          <img class="img-responsive" src="<?php echo $url; ?>">
        </div>
        <div class="blog-post-info load-fadeInUp">
        <h3><?php the_title() ?></h3>
        <h6><?php the_time(get_option('date_format')) ?></h6>
        </div>
        </a>
      </div>

      <?php endwhile; ?>
</div>
<?php get_footer(); ?>