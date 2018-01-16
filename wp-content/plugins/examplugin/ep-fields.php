<?php
//här ska mina metaboxar skapas

function dwwp_add_custom_metabox() {


    //add metabox function call - argument till metaboxen, alltså vad som kommer synas i själva admin
    add_meta_box(
        //uniqe id
        'dwwp_meta',
        'Boxes',
        //callback ansvarig för hur metaboxen kommer synas. I ep-render admin finns funktionen som vi hämtar
        'dwwp_meta_callback',
        //what post type do we want it to show up on
        'box',
        //position t.ex. side - syns på sidan (där featured image är)
        'normal',
        //positioner men det verkar inte behövas???
        'high'
    );
}

add_action('add_meta_boxes', 'dwwp_add_custom_metabox');


//create some fields med html
function dwwp_meta_callback($post) {
    //$post is gonna give us access to post-id

    //nonce: number used once. Kollar så att datan från ditt formulär kommer från just dig
    wp_nonce_field( basename(__FILE__), 'dwwp_boxs_nonce');
    //säger till variabeln att gå till databasen och query all posts meta associerat till denna posten
    $dwwp_stored_meta = get_post_meta( $post->ID );
    ?>

    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="box-id" class="dwwp-row-title">Box ID</label>
            </div>
            <div class="meta-td">
                <input type="text" class="dwwp-row-content" name="box_id" id="box-id"
                       value="<?php if ( ! empty ( $dwwp_stored_meta['box_id'] ) ) {
                           echo esc_attr( $dwwp_stored_meta['box_id'][0] );
                       } ?>"/>
            </div>
        </div>
    </div>
    <div class="meta">
        <div class="meta-th">
            <h1>Lägg till beskrivning</h1>
        </div>
    </div>
    <div class="meta-editor">

    <?php

        $content = get_post_meta( $post->ID, 'principle-duties', true);
        $editor = 'principle_duties';
        $settings = [
            'textarea_rows' => 8,
            //där man lägger upp bilder
            'media_buttons' => false
        ];

        wp_editor($content, $editor, $settings)

    ?>

    </div>

    <?php

}

function dwwp_meta_save( $post_id) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'dwwp_boxs_nonce' ] ) && wp_verify_nonce( $_POST[ 'dwwp_boxs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    //if there is data inside the box_id field, we want to update
    if ( isset( $_POST[ 'box_id' ] ) ) {
        update_post_meta( $post_id, 'box_id', sanitize_text_field( $_POST[ 'box_id' ] ) );
    }
}

//hooken som används för att spara är save_post
add_action('save_post', 'dwwp_meta_save');






























