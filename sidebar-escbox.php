<!-- sidebar -->
<aside class="sidebar" role="complementary">
    <p class="sidebar__title">Filter Escape Games met Box</p>
    <?php
    $terms = array();

    $tags = get_terms( array(
        'taxonomy' => 'game_box_tag',
        'hide_empty' => true,
    ) );

    foreach( $tags as $tag ) {
        if( empty( $terms ) || ! array_key_exists( $tag->term_id, $terms ) ) {
            $terms[] = ['id'=>$tag->term_id, 'name'=>$tag->name, 'slug'=>$tag->slug,'count'=>$tag->count];
        }
    }

    if( ! empty( $terms ) ) : ?>
        <ul class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term['id'] );
                echo '<li><a href="' . $term_link . '" class="tag-filter js-filter-box" title="' . $term['slug'] . '" data-id="'.$term['id'].'"><input type="checkbox" name="" id="">' . $term['name'] . '<span>'.$term['count'].'</span></a></li>';
            } ?>
        </ul>
    <?php endif; ?>
</aside>
<!-- /sidebar -->
