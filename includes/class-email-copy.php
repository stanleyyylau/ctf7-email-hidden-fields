<?php

class Email_Copy {
    private $web_hook_url = 'https://hooks.zapier.com/hooks/catch/10344437/bbzfnvl';

    public function send_cfdb7_to_web_hook($form_data) {
        $web_hook_url = $this->web_hook_url;
        $form_date    = current_time('Y-m-d H:i:s');
        $site_id = get_current_blog_id();
        $form_data['date'] = $form_date;
        $form_data['site-id'] = $site_id;
        // don't care about the result
        wp_remote_post( $web_hook_url, array(
                'method'      => 'POST',
                'blocking'    => false,
                'body'        => $form_data,
            )
        );
    }

    public function all_to_admin($form_tag) {
        $options = get_option( 'ctfbcc_option_name' );
        $clone_mail = $form_tag->prop( 'mail' );
        $clone_mail['recipient'] = $options['emails_0'];
        $fields = explode(",", $options["fields_1"]);
        foreach ($fields as $field) {
            $clone_mail['body'] = str_replace($field, '*Hidden Field*', $clone_mail['body']);
        }
        // We don't care about the result
        WPCF7_Mail::send( $clone_mail, 'mail' );
    }
}