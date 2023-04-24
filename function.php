<?php
function wpdocs_codex_book_init() {

    wp_enqueue_script('jquery');
    wp_localize_script( 'jquery', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    
    wp_enqueue_script('signature-js', '//cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js' );
}

add_action( 'init', 'wpdocs_codex_book_init' );


add_action( 'wp_ajax_nopriv_save_signature', 'save_signature' );
add_action( 'wp_ajax_save_signature', 'save_signature' );

function save_signature() {
    $output_file = $_POST['signature_data'];
    
	$image_array_1 = explode(";", $output_file);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);

    $wordpress_upload_dir = wp_upload_dir();
        
    $new_file_path = $wordpress_upload_dir['path'] . '/'. time() . '.png';

    
    $return_val = file_put_contents($new_file_path, $data);
    echo '<pre>'; print_r($return_val); echo '</pre>';
    die;
}