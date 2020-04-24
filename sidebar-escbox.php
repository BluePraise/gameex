<!-- sidebar -->
<aside class="sidebar" role="complementary">
    <p class="sidebar__title">Filter Escape Games met Box</p>
    <?php
    $terms = array();

                $related = new WP_Query( array(
                    'post_type'     => 'game',
                    'posts_per_page'=> -1,
                    'category_name'  => 'escape-games-met-box'
                ) );

                if( $related->have_posts() ) {

                    foreach( $related->posts as $post ) {
                        $tags = wp_get_post_tags( $post->ID );
                        if( ! empty( $tags ) ) {
                            foreach( $tags as $tag ) {
                                if( empty( $terms ) || ! array_key_exists( $tag->term_id, $terms ) ) {
                                    $terms[] = ['id'=>$tag->term_id, 'name'=>$tag->name, 'slug'=>$tag->slug,'count'=>$tag->count];
                                }
                            }
                        }
                    }

                    wp_reset_postdata();
                }

                if( ! empty( $terms ) ) : ?>
            <ul class="post-tags">
                        <?php
                        foreach ( $terms as $term ) {
                            $term_link = get_term_link( $term['id'] );
                            echo '<li><a href="' . $term_link . '" class="tag-filter js-filter-box" title="' . $term['slug'] . '"><input type="checkbox" name="" id="">' . $term['name'] . '<span>'.$term['count'].'</span></a></li>';
                        } ?>
                        </ul>
            <ul class="post-tags">
            <?php
            /*foreach ( $terms as $term ) {
                if (strpos($term->slug, 'group') !== 0) {
                    continue;
                }
                $term_link = get_term_link( $term, $tags );
                echo '<li><a href="' . $term_link . '" class="tag-filter" title="' . $term->slug . '"><input type="checkbox" name="" id="">' . $term->name . '<span>'.$term->count.'</span></a></li>';
            }*/ ?>
            </ul>
        <?php endif; ?>
</aside>
<!-- /sidebar -->
