jQuery(document).ready(function() {
    "use strict";
    jQuery("#datepicker1").datepicker({
		format: "yyyy/mm/dd",
        todayBtn: "linked",
        calendarWeeks: !0,
        autoclose: !0,
        todayHighlight: !0
    }), jQuery("#datepicker2").datepicker({
		format: "yyyy/mm/dd",
        minViewMode: 1,
        todayBtn: "linked",
        autoclose: !0,
        keyboardNavigation: !1
    }), jQuery("#datepicker3").datepicker({
		format: "yyyy/mm/dd",
        startView: 1,
        todayBtn: "linked",
        autoclose: !0,
    }), jQuery("#datepicker4").datepicker({
		format: "yyyy/mm/dd",
		todayBtn: "linked",
    }), jQuery("#datepicker5").datepicker({
		format: "yyyy/mm/dd",
		todayBtn: "linked",
    }) //jQuery("#datepicker6").datepicker()
});