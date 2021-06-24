<div class="searchform">
    <form method="get" role="search" id="searchform" class="searchform"
          action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="name" id="s" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr( "Search..." ); ?>" required="">
        <input type="submit" class="submit" value="<?php echo esc_attr( "Search" ); ?>" id="searchsubmit">
    </form>
</div> 