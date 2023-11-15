jQuery(document).ready(function() {
    "use strict";
    jQuery("input#ex1").slider(), jQuery("input#ex2").slider({
        tooltip: "always"
    }), jQuery("input#ex3").slider(), jQuery("input#ex4").slider({
        ticks: [0, 100, 200, 300, 400],
        ticks_labels: ["$0", "$100", "$200", "$300", "$400"],
        ticks_snap_bounds: 30
    }), jQuery("input.slider-vertical").slider({})
});