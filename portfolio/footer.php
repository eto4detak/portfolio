
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <ul id="sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
    <?php endif; ?>

   <!-- ***** Footer Area Start ***** -->
   <footer class="footer-area section-padding-80-0">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <ul id="sidebar">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </ul>
        <?php endif; ?>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <?php wp_footer(); ?>
</body>

</html>
