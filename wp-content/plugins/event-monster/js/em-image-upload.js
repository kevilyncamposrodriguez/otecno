jQuery(document).ready( function( jQuery ) {
    jQuery('#upload_image_button').click(function() {
        formfield = jQuery('#em_upload_image').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });
    window.send_to_editor = function(html) {
		jQuery( "#upload_single_image_preview" ).show();
        imgurl = jQuery(html).attr('src');
		if(!(imgurl)) {
			imgurl = jQuery('img', html).attr('src');
		}
        jQuery('#em_upload_image').val(imgurl);
		jQuery("#upload_single_image_preview").attr("src", imgurl);
		jQuery("#remove-single-img").show();
        tb_remove();
    }
	//remove image
	jQuery( "#remove-single-img" ).click(function() {
		jQuery( "#em_upload_image" ).removeAttr('value');
		jQuery( "#upload_single_image_preview" ).hide();
		jQuery('#upload_single_image_preview').attr('src', '');
		jQuery("#upload_single_image_preview2").show();
		jQuery( "#remove-single-img" ).hide();
	});
});
