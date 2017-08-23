<div id='images'>
  <?php if( have_rows('images') ): ?>
  <ul class="slides">
    <?php $id_counter = 0; while( have_rows('images') ): the_row(); $image = get_sub_field('image'); $id_counter++; ?>
      <li class="slide">
        <img id="app-screenshot-<?php echo $id_counter; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
      </li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
</div>

<!-- The Screenshot Modal -->
<div id="app-images-modal" class="app-modal">
<!-- The Close Button -->
  <span class="app-modal-close">&times;</span>
  <!-- Modal Content -->
    <img class="app-modal-content" id="app-modal-image">
</div>
