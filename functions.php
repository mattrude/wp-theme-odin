<?php

function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
}
add_action('wp_head', 'favicon_link');

define( 'HEADER_IMAGE', apply_filters( 'odin_header_image', '/wp-content/themes/odin/images/lighthouse.jpg' ) );

/*********************************************************************************
  Using WordPress functions to retrieve the extracted EXIF 
  information from database
*/
function mdr_exif() { ?>
  <div id="exif">
    <h3 class='comment-title exif-title'><?php _e('Image Meta Data'); ?></h3>
    <div id="exif-data">
      <?php
      $imgmeta = wp_get_attachment_metadata( $id );
      // Convert the shutter speed retrieve from database to fraction
      $image_shutter_speed = $imgmeta['image_meta']['shutter_speed'];
      if ($image_shutter_speed > 0) {
        if ((1 / $image_shutter_speed) > 1) {
          if ((number_format((1 / $image_shutter_speed), 1)) == 1.3
            or number_format((1 / $image_shutter_speed), 1) == 1.5
            or number_format((1 / $image_shutter_speed), 1) == 1.6
            or number_format((1 / $image_shutter_speed), 1) == 2.5){
            $pshutter = "1/" . number_format((1 / $image_shutter_speed), 1, '.', '') ." ".__('second');
          } else {
            $pshutter = "1/" . number_format((1 / $image_shutter_speed), 0, '.', '') ." ".__('second');
          }
        } else {
          $pshutter = $image_shutter_speed ." ".__('seconds');
        }
      }

      // Start to display EXIF and IPTC data of digital photograph
      echo "<p>" . date("d-M-Y H:i:s", $imgmeta['image_meta']['created_timestamp'])."</p>";
      echo "<p>" . $imgmeta['image_meta']['camera']."</p>";
      echo "<p>" . $imgmeta['image_meta']['focal_length']."mm</p>";
      echo "<p>f/" . $imgmeta['image_meta']['aperture']."</p>";
      echo "<p>" . $imgmeta['image_meta']['iso']."</p>";
      echo "<p>" . $pshutter . "</p>"
      ?>
    </div>
    <div id="exif-lable">
      <?php // EXIF Titles
      echo "<p><span>".__('Date Taken:')."</span>";
      echo "<p><span>".__('Camera:')."</span>";
      echo "<p><span>".__('Focal Length:')."</span>";
      echo "<p><span>".__('Aperture:')."</span>";
      echo "<p><span>".__('ISO:')."</span>";
      echo "<p><span>".__('Shutter Speed:')."</span>"; ?>
    </div>
  </div>
<?php }

function odin_image_nav() {
  if ( wp_get_attachment_image( $post->ID+1 ) != null ) { ?>
    <p class="nav-images">
      <?php _e('Next Image', 'odin-milly-theme') ?><br />
      <a href="<?php echo $next_url; ?>"><?php echo wp_get_attachment_image( $post->ID+1, 'thumbnail' ); ?></a>
    </p>
  <?php } ?>

  <?php if ( wp_get_attachment_image( $post->ID-1 ) != null ) { ?>
    <p class="nav-images">
       <?php _e('Previous Image', 'odin-milly-theme') ?><br />
        <a href="<?php echo $previous_url; ?>"><?php echo wp_get_attachment_image( $post->ID-1, 'thumbnail' ); ?></a>
     </p>
  <?php }
}

?>
