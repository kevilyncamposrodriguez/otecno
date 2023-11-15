(function (api) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['plugin-section'] = api.Section.extend({

        // No events for this type of section.
        attachEvents: function () { },

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    });

})(wp.customize);

function avantex_frontpage_sections_scroll(section_id) {
    var scroll_section_id = "slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch (section_id) {
        case 'accordion-section-avantex-slider-section':
            scroll_section_id = "slider-section";
            break;

        case 'accordion-section-avantex-services-section':
            scroll_section_id = "service-section";
            break;

        case 'accordion-section-avantex-portfolio-section':
            scroll_section_id = "portfolio-section";
            break;

        case 'accordion-section-avantex-callout-section':
            scroll_section_id = "callout-section";
            break;

        case 'accordion-section-avantex-team-section':
            scroll_section_id = "team-section";
            break;

        case 'accordion-section-avantex-testimonial-section':
            scroll_section_id = "testimonial-section";
            break;

        case 'accordion-section-avantex-funfact-section':
            scroll_section_id = "funfact-section";
            break;

        case 'accordion-section-avantex-news-section':
            scroll_section_id = "news-section";
            break;

        case 'accordion-section-avantex-sponsors-section':
            scroll_section_id = "sponsors-section";
            break;
    }

    if ($contents.find('#' + scroll_section_id).length > 0) {
        $contents.find("html, body").animate({
            scrollTop: $contents.find("#" + scroll_section_id).offset().top
        }, 1000);
    }
}

jQuery('body').on('click', '#sub-accordion-panel-avantex-fpsections-panel .control-subsection .accordion-section-title', function (event) {
    var section_id = jQuery(this).parent('.control-subsection').attr('id');
    avantex_frontpage_sections_scroll(section_id);
});