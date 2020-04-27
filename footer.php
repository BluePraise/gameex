
        <!-- footer -->
        <footer class="footer" role="contentinfo">
            <div class="wrapper">
                <div class="d-flex jcsb align-items-center">
                    <div class="logo"> <a href="<?php echo site_url(); ?>"><?php echo get_bloginfo('name'); ?></a> </div>
                    <ul class="social-links">
                        <li>
                            <a href="">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30px" height="30px"><path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M37,19h-2c-2.14,0-3,0.5-3,2 v3h5l-1,5h-4v15h-5V29h-4v-5h4v-3c0-4,2-7,6-7c2.9,0,4,1,4,1V19z"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30px" height="30px"><path d="M 24 4.300781 C 23.101563 4.699219 22.199219 5 21.199219 5.101563 C 22.199219 4.5 23 3.5 23.398438 2.398438 C 22.398438 3 21.398438 3.398438 20.300781 3.601563 C 19.300781 2.601563 18 2 16.601563 2 C 13.898438 2 11.699219 4.199219 11.699219 6.898438 C 11.699219 7.300781 11.699219 7.699219 11.800781 8 C 7.699219 7.800781 4.101563 5.898438 1.699219 2.898438 C 1.199219 3.601563 1 4.5 1 5.398438 C 1 7.101563 1.898438 8.601563 3.199219 9.5 C 2.398438 9.398438 1.601563 9.199219 1 8.898438 C 1 8.898438 1 8.898438 1 9 C 1 11.398438 2.699219 13.398438 4.898438 13.800781 C 4.5 13.898438 4.101563 14 3.601563 14 C 3.300781 14 3 14 2.699219 13.898438 C 3.300781 15.898438 5.101563 17.300781 7.300781 17.300781 C 5.601563 18.601563 3.5 19.398438 1.199219 19.398438 C 0.800781 19.398438 0.398438 19.398438 0 19.300781 C 2.199219 20.699219 4.800781 21.5 7.5 21.5 C 16.601563 21.5 21.5 14 21.5 7.5 C 21.5 7.300781 21.5 7.101563 21.5 6.898438 C 22.5 6.199219 23.300781 5.300781 24 4.300781"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="40px" height="40px"><path d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30px" height="30px">    <path d="M 12 3 C 7.04 3 3 7.04 3 12 L 3 38 C 3 42.96 7.04 47 12 47 L 38 47 C 42.96 47 47 42.96 47 38 L 47 12 C 47 7.04 42.96 3 38 3 L 12 3 z M 38 8 L 41 8 C 41.55 8 42 8.45 42 9 L 42 12 C 42 12.55 41.55 13 41 13 L 38 13 C 37.45 13 37 12.55 37 12 L 37 9 C 37 8.45 37.45 8 38 8 z M 25 10 C 30.33 10 35.019688 12.8 37.679688 17 L 42 17 L 42 37 C 42 39.76 39.76 42 37 42 L 13 42 C 10.24 42 8 39.76 8 37 L 8 17 L 12.320312 17 C 14.980313 12.8 19.67 10 25 10 z M 25 12 C 17.83 12 12 17.83 12 25 C 12 32.17 17.83 38 25 38 C 32.17 38 38 32.17 38 25 C 38 17.83 32.17 12 25 12 z M 25 16 C 29.96 16 34 20.04 34 25 C 34 29.96 29.96 34 25 34 C 20.04 34 16 29.96 16 25 C 16 20.04 20.04 16 25 16 z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex footer__widgets">
                    <?php dynamic_sidebar( 'widget-area-1' ); ?>
                    <?php dynamic_sidebar( 'widget-area-2' ); ?>
                    <?php dynamic_sidebar( 'widget-area-3' ); ?>
                    <?php dynamic_sidebar( 'widget-area-4' ); ?>
                </div>

        </div> <!-- /.wrapper -->
    </footer>
    <!-- /footer -->

    <?php wp_footer();?>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>
