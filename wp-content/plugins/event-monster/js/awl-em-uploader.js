jQuery(function(jQuery) {
    
    var file_frame,
    awlemslider_responsive = {
        ul: '',
        init: function() {
            this.ul = jQuery('.em_gallery_sbox');
            this.ul.sortable({
                placeholder: '',
				revert: true,
            });			
			
            /**
			 * Add Slide Callback Funtion
			 */
            jQuery('#add-new-slider').on('click', function(event) {
                event.preventDefault();
                if (file_frame) {
                    file_frame.open();
                    return;
                }
                file_frame = wp.media.frames.file_frame = wp.media({
                    multiple: true
                });

                file_frame.on('select', function() {
                    var images = file_frame.state().get('selection').toJSON(),
                            length = images.length;
                    for (var i = 0; i < length; i++) {
                        awlemslider_responsive.get_thumbnail(images[i]['id']);
                    }
                });
                file_frame.open();
            });
			
			/**
			 * Delete Slide Callback Function
			 */
            this.ul.on('click', '#remove-slide', function() {
                if (confirm('Do you want to delete this slide?')) {
                    jQuery(this).parent().fadeOut(700, function() {
                        jQuery(this).remove();
                    });
                }
                return false;
            });
			
			/**
			 * Delete All Slides Callback Function
			 */
			jQuery('#remove-all-slides').on('click', function() {
                if (confirm('Do you want to delete all slides?')) {
                    awlemslider_responsive.ul.empty();
					jQuery('#remove-all-slides').hide();
                }
                return false;
            });
           
        },
        get_thumbnail: function(id, cb) {
            cb = cb || function() {
            };
            var data = {
                action: 'em_gallery',
                EMslideId: id
            };
            jQuery.post(ajaxurl, data, function(response) {
                awlemslider_responsive.ul.append(response);
				jQuery('#remove-all-slides').show();
                cb();
            });
        }
    };
    awlemslider_responsive.init();
});

//Slider for sponser
jQuery(function(jQuery) {
    
    var file_frame,
    awlem_sponsorslider_responsive = {
        ul: '',
        init: function() {
            this.ul = jQuery('.em_sponsor_sbox');
            this.ul.sortable({
                placeholder: '',
				revert: true,
            });			
			
            /**
			 * Add Slide Callback Funtion
			 */
            jQuery('#add-new-spr-slider').on('click', function(event) {
                event.preventDefault();
                if (file_frame) {
                    file_frame.open();
                    return;
                }
                file_frame = wp.media.frames.file_frame = wp.media({
                    multiple: true
                });

                file_frame.on('select', function() {
                    var images = file_frame.state().get('selection').toJSON(),
                            length = images.length;
                    for (var i = 0; i < length; i++) {
                        awlem_sponsorslider_responsive.get_thumbnail(images[i]['id']);
                    }
                });
                file_frame.open();
            });
			
			/**
			 * Delete Slide Callback Function
			 */
            this.ul.on('click', '#remove-spr-slide', function() {
                if (confirm('Do you want to delete this slide?')) {
                    jQuery(this).parent().fadeOut(700, function() {
                        jQuery(this).remove();
                    });
                }
                return false;
            });
			
			/**
			 * Delete All Slides Callback Function
			 */
			jQuery('#remove-all-spr-slides').on('click', function() {
                if (confirm('Do you want to delete all slides?')) {
                    awlem_sponsorslider_responsive.ul.empty();
					jQuery('#remove-all-spr-slides').hide();
                }
                return false;
            });
           
        },
        get_thumbnail: function(id, cb) {
            cb = cb || function() {
            };
            var data = {
                action: 'em_spr_gallery',
                EMSPRslideId: id
            };
            jQuery.post(ajaxurl, data, function(response) {
                awlem_sponsorslider_responsive.ul.append(response);
				jQuery('#remove-all-spr-slides').show();
                cb();
            });
        }
    };
    awlem_sponsorslider_responsive.init();
});