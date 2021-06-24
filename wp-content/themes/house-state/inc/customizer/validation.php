<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage House State
* @since House State 1.0.0
*/

if ( ! function_exists( 'house_state_validate_long_excerpt' ) ) :
    function house_state_validate_long_excerpt( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'house-state' ) );
        } elseif ( $value < 5 ) {
            $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'house-state' ) );
        } elseif ( $value > 100 ) {
            $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'house-state' ) );
        }
        return $validity;
    }
endif;
