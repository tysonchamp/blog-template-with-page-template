

<?php
/*Template name: happening*/

get_header();
// global $post;
// $page=get_page($post->ID);

?>

<!-- inner page content -->
<div class="inner_page_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<!-- background -->
            	<div class="content_inner">
                	<div class="row">
                        <!-- right panel content -->
                        <div class="col-sm-12 mar_top1">
<?php
 $pp = get_query_var( 'paged', 1 ); 
//echo $p;
if($pp>=2)
{
$pp--;
}

$limit=($pp)*5;
?>
<?php 
$d=0;
$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'category'         => 1,
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array1 = get_posts( $args ); 
foreach($posts_array1 as $p)
{
$d++;
}

?>
                        	<h1 class="inner_heading">Notice Board</h1>
                            <div class="inner_text_content">

<?php 

$args = array(
	'posts_per_page'   => 6,
	'offset'           => $limit,
	'category'         => 1,
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts( $args ); ?>

					
					 <?php foreach ($posts_array as $post){ 

?>
				 
<div class="well">
                              <div class="media">
                              
                                <div class="media-body">
                                    <h4 class="media-heading">
<?php echo esc_attr( sprintf( __( '%s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>

</h4>
                                  <p>By <?php if($post->post_author==1){ echo 'Admin';} ?></p>
                                  <p>
<?php echo $post->post_excerpt; ?>....<a href="<?php echo get_page_uri($post->ID) ?>">Continue</a></p>
                                  <ul class="list-inline list-unstyled">
                                    <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $post->post_date_gmt; ?></span></li>
                                    
                                    
                                    </ul>
                               </div>
                            </div>
                          </div>
				<?php } ?>
<?php
global $wpdb;
$res=$wpdb->get_results("select * from ");
 $total_pages=ceil($d/5);
if ($total_pages > 1){
 
  $current_page = max(1, get_query_var('paged'));
   echo '<div class="page_nav">';
  echo paginate_links(array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => '/page/%#%',
      'current' => $current_page,
      'total' => $total_pages,
    ));
 echo '</div>';
}
?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
?>
