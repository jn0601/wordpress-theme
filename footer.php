    <!-- Bootstrap Javascript -->
    <?php
    wp_footer();
    ?>
    <footer class="footer text-center py-2 theme-bg-dark">

      <p class="copyright"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Theme Demo</a></p>

      <?php
      dynamic_sidebar('footer-1'); //id
      ?>
    </footer>

    </div>
    </body>

    </html>