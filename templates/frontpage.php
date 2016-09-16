
  <div class="wrap container" role="document">

    <div class="content row">

      <main class="main" role="main">

        <?php include roots_template_path(); ?>

      </main><!-- /.main -->

      <?php if (roots_display_sidebar()) : ?>

        <aside class="sidebar" role="complementary">

          <?php include roots_sidebar_path(); ?>
          
        </aside><!-- /.sidebar -->

      <?php endif; ?>

    </div><!-- /.content -->

  </div><!-- /.wrap -->
