<!-- sidebar -->
<aside class="sidebar" role="complementary">
    <p class="sidebar__title">Filter Toetsen</p>
    <?php
        $tags = ['taxonomy' => 'post_tag', 'post_type' => 'post', 'category__in' => 7];
        $terms = get_terms( $tags );
        $count = count( $terms );
        // var_dump($terms);

        if ( $count > 0 ): ?>
            <ul class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                if (strpos($term->slug, 'group') === 0) {
                    continue;
                }
                $term_link = get_term_link( $term, $tags );
                echo '<li><a href="' . $term_link . '" class="tag-filter js-filter-digital" title="' . $term->slug . '"><input type="checkbox" name="" id="">' . $term->name . '<span>'.$term->count.'</span></a></li>';
            } ?>
            </ul>
            <ul class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                if (strpos($term->slug, 'group') !== 0) {
                    continue;
                }
                $term_link = get_term_link( $term, $tags );
                echo '<li><a href="' . $term_link . '" class="tag-filter" title="' . $term->slug . '"><input type="checkbox" name="" id="">' . $term->name . '<span>'.$term->count.'</span></a></li>';
            } ?>
            </ul>
        <?php endif; ?>
</aside>
<!-- /sidebar -->
