<?php
get_header();
?>


  <article class="content px-3 py-5 p-md-5">
    <!-- loop -->
     <?php
      if( have_posts() ) {
          while( have_posts() ) {
            the_post();
            // the_content();

            get_template_part('template-parts/content', 'page'); // path, type
          }
      }
     ?>
  </article>



<?php
get_footer();
?>