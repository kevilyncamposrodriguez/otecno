wp.customize.bind('ready', function () {
    var panel = wp.customize.panel('avantex-fpsections-panel');
    if (panel) {
        var message = '<div class="avantex-fp-msg"><div class="avantex-upgrade-pro-message simple-notice-custom-control"><h4> Section Reorder Drag/Drop - Pro Feature <p> To enable section reoder feature and other additional features of avantex please <a href="https://wpfrank.com/wordpress-themes/avantex/"> Upgrade to Pro </a></p></h4></div></div>';
        panel.expanded.bind(function (isExpanded) {
            if (isExpanded) {
                panel.contentContainer.find('.panel-meta').after(message);
            } else {
                panel.contentContainer.find('.avantex-fp-msg').remove();
            }
        });
    }
});