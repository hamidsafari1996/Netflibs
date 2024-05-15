<?php
function tax_years(){
      $categories = get_the_terms(get_the_ID(),"yaers");
      if ( ! empty( $categories ) ) { 
            echo esc_html( $categories[0]->name ); 
      }
}
function taxonomy_sedape(){
      $sedapishe = get_the_terms(get_the_ID(), 'sedapishegan');
        if(is_array($sedapishe)){
            echo "<div class='row single-colors'>";
            foreach($sedapishe as $soundh){
                $soundh_id = $soundh->term_id;
                $soundh_name = $soundh->name;
                $soundh_url = get_term_link($soundh_id, 'sedapishegan');
                $soundh_code = get_term_meta( $soundh_id, 'pic-honarmand', true );
                $soundh_code = ($soundh_code != '')? $soundh_code : 'inherant';
                
                echo "<div class='single-color'><a href='$soundh_url'><img src='$soundh_code'><h6>$soundh_name</h6></a></div>";
            }
            echo "</div>";
      }
    }

