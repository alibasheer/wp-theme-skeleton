<?php
function toreplace_widgets_init() {

//    register_sidebar(array(
//        'name' => 'Header Scripts Ad',
//        'id'   => 'header-scripts-ad',
//        'description'   => '',
//        'before_widget' => '',
//        'after_widget'  => '',
//        'before_title'  => '',
//        'after_title'   => ''
//    ));

}
add_action( 'widgets_init', 'toreplace_widgets_init' );