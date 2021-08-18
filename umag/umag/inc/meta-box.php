<?php
if(!defined("ABSPATH")){
    die();
}
function umag_video_format_meta_boxes(){
    acf_add_local_field_group(
        array(
            "key"    => "acf_add_local_field_group",
            "title"  => esc_html__("Video Settings","umag"),
            "fields" => array(
                array(
                    "key"   => "video_duration",
                    "label" => esc_html__( "video time","umag"),
                    "placeholder" => esc_html__( "example: 09:27","umag"),
                    "name"  => "video_duration",
                    "type"  => "text",
                ),
                array(
                    "key"   => "video_link",
                    "label" => esc_html__( "video İframe Link","umag"),
                    "name"  => "video_link",
                    "type"  => "textarea",
                )
            ),
            "location" => array(
                array(
                    array(
                        "param"     => "post_type",
                        "operator"  => "==",
                        "value"     => "post",
                    ),
                    array(
                        "param"     => "post_format",
                        "operator"  => "==",
                        "value"     => "video",
                    ),
                ),
            ),
        ));
}
add_action("acf/init","umag_video_format_meta_boxes");

function umag_category_image(){
    acf_add_local_field_group(
        array(
            "key" => "umag_category_image",
            "title" => esc_html__("Catgory İmage","umag"),
            "fields"=> array(
                array(
                    "key" => "category_image",
                    "label" => esc_html__("Upload category image","umag"),
                    "name" => "category_image",
                    "type" => "image"
                )
                ),
                "location" =>array(
                    array(
                       array(
                        "param" => "taxonomy",
                        "operator" => "==",
                        "value" => "category"
                       )
                    )
                )
        ));
}
add_action( "acf/init","umag_category_image");


function umag_team(){
    acf_add_local_field_group(
        array(
            "key" => "umag_teams",
            "title" => esc_html__("Our Team","umag"),
            "fields"=> array(
                array(
                    "key" => "team-jop",
                    "label" => esc_html__("jop","umag"),
                    "name" => "team-jop",
                    "type" => "text"
                ),
                array(
                    "key" => "team-facebook",
                    "label" => esc_html__("Facebook Url","umag"),
                    "name" => "team-facebook",
                    "type" => "text"
                ),
                array(
                    "key" => "team-twitter",
                    "label" => esc_html__("Twitter Url","umag"),
                    "name" => "team-twitter",
                    "type" => "text"
                ),
                array(
                    "key" => "team-linkedin",
                    "label" => esc_html__("Linkedin Url","umag"),
                    "name" => "team-linkedin",
                    "type" => "text"
                ),
                ),
                "location" =>array(
                    array(
                       array(
                        "param" => "post_type",
                        "operator" => "==",
                        "value" => "team"
                       )
                    )
                )
        ));
}
add_action( "acf/init","umag_team");