! function(t) {
    var i = function(i, e) {
        this.dragLocked = !1, this.limit = 1e5, this.element = t(i).hide(), this.picker = t('<div class="slider"><div class="slider-track"><div class="slider-selection"></div><div class="slider-handle"></div><div class="slider-handle"></div></div><div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>').insertBefore(this.element).append(this.element), this.id = this.element.data("slider-id") || e.id, this.id && (this.picker[0].id = this.id), "undefined" != typeof Modernizr && Modernizr.touch && (this.touchCapable = !0);
        var s = this.element.data("slider-tooltip") || e.tooltip;
        switch (this.tooltip = this.picker.find(".tooltip"), this.tooltipInner = this.tooltip.find("div.tooltip-inner"), this.orientation = this.element.data("slider-orientation") || e.orientation, this.orientation) {
            case "vertical":
                this.picker.addClass("slider-vertical"), this.stylePos = "top", this.mousePos = "pageY", this.sizePos = "offsetHeight", this.tooltip.addClass("right")[0].style.left = "100%";
                break;
            default:
                this.picker.addClass("slider-horizontal").css("width", this.element.outerWidth()), this.orientation = "horizontal", this.stylePos = "left", this.mousePos = "pageX", this.sizePos = "offsetWidth", this.tooltip.addClass("top")[0].style.top = -this.tooltip.outerHeight() - 14 + "px"
        }
        this.min = this.element.data("slider-min") || e.min, this.max = this.element.data("slider-max") || e.max, this.step = this.element.data("slider-step") || e.step, this.value = this.element.data("slider-value") || e.value, this.value[1] && (this.range = !0), this.selection = this.element.data("slider-selection") || e.selection, this.selectionEl = this.picker.find(".slider-selection"), "none" === this.selection && this.selectionEl.addClass("hide"), this.selectionElStyle = this.selectionEl[0].style, this.handle1 = this.picker.find(".slider-handle:first"), this.handle1Stype = this.handle1[0].style, this.handle2 = this.picker.find(".slider-handle:last"), this.handle2Stype = this.handle2[0].style;
        var h = this.element.data("slider-handle") || e.handle;
        switch (h) {
            case "round":
                this.handle1.addClass("round"), this.handle2.addClass("round");
                break;
            case "triangle":
                this.handle1.addClass("triangle"), this.handle2.addClass("triangle")
        }
        this.range ? (this.value[0] = Math.max(this.min, Math.min(this.max, this.value[0])), this.value[1] = Math.max(this.min, Math.min(this.max, this.value[1]))) : (this.value = [Math.max(this.min, Math.min(this.max, this.value))], this.handle2.addClass("hide"), "after" == this.selection ? this.value[1] = this.max : this.value[1] = this.min), this.diff = this.max - this.min, this.percentage = [100 * (this.value[0] - this.min) / this.diff, 100 * (this.value[1] - this.min) / this.diff, 100 * this.step / this.diff], this.offset = this.picker.offset(), this.size = this.picker[0][this.sizePos], this.formater = e.formater, this.reversed = this.element.data("slider-reversed") || e.reversed, this.layout(), this.touchCapable ? this.picker.on({
            touchstart: t.proxy(this.mousedown, this)
        }) : this.picker.on({
            mousedown: t.proxy(this.mousedown, this)
        }), "show" === s ? this.picker.on({
            mouseenter: t.proxy(this.showTooltip, this),
            mouseleave: t.proxy(this.hideTooltip, this)
        }) : this.tooltip.addClass("hide")
    };
    i.prototype = {
        constructor: i,
        over: !1,
        inDrag: !1,
        showTooltip: function() {
            this.tooltip.addClass("in"), this.over = !0
        },
        hideTooltip: function() {
            this.inDrag === !1 && this.tooltip.removeClass("in"), this.over = !1
        },
        layout: function() {
            var t;
            t = this.reversed ? [this.percentage[1] - this.percentage[0], this.percentage[1]] : [this.percentage[0], this.percentage[1]], this.handle1Stype[this.stylePos] = t[0] + "%", this.handle2Stype[this.stylePos] = t[1] + "%", "vertical" == this.orientation ? (this.selectionElStyle.top = Math.min(t[0], t[1]) + "%", this.selectionElStyle.height = Math.abs(t[0] - t[1]) + "%") : (this.selectionElStyle.left = Math.min(t[0], t[1]) + "%", this.selectionElStyle.width = Math.abs(t[0] - t[1]) + "%"), this.range ? (this.tooltipInner.text(this.formater(this.value[0]) + " : " + this.formater(this.value[1])), this.tooltip[0].style[this.stylePos] = this.size * (t[0] + (t[1] - t[0]) / 2) / 100 - ("vertical" === this.orientation ? this.tooltip.outerHeight() / 2 : this.tooltip.outerWidth() / 2) + "px") : (this.tooltipInner.text(this.formater(this.value[0])), this.tooltip[0].style[this.stylePos] = this.size * t[0] / 100 - ("vertical" === this.orientation ? this.tooltip.outerHeight() / 2 : this.tooltip.outerWidth() / 2) + "px")
        },
        mousedown: function(i) {
            if (!this.dragLocked) {
                this.touchCapable && "touchstart" === i.type && (i = i.originalEvent), this.offset = this.picker.offset(), this.size = this.picker[0][this.sizePos];
                var e = this.getPercentage(i);
                if (this.range) {
                    var s = Math.abs(this.percentage[0] - e),
                        h = Math.abs(this.percentage[1] - e);
                    this.dragged = s < h ? 0 : 1
                } else this.dragged = 0;
                this.percentage[this.dragged] = this.reversed ? this.percentage[1] - e : e, this.layout(), this.touchCapable ? t(document).on({
                    touchmove: t.proxy(this.mousemove, this),
                    touchend: t.proxy(this.mouseup, this)
                }) : t(document).on({
                    mousemove: t.proxy(this.mousemove, this),
                    mouseup: t.proxy(this.mouseup, this)
                }), this.inDrag = !0;
                var a = this.calculateValue();
                return this.setValue(a), this.element.trigger({
                    type: "slideStart",
                    value: a
                }).trigger({
                    type: "slide",
                    value: a
                }), !1
            }
        },
        mousemove: function(t) {
            if (!this.dragLocked) {
                this.touchCapable && "touchmove" === t.type && (t = t.originalEvent);
                var i = this.getPercentage(t);
                if (this.range && (0 === this.dragged && this.percentage[1] < i ? (this.percentage[0] = this.percentage[1], this.dragged = 1) : 1 === this.dragged && this.percentage[0] > i && (this.percentage[1] = this.percentage[0], this.dragged = 0)), x = this.reversed ? this.percentage[1] - i : i, x > this.limit) return;
                this.percentage[this.dragged] = x, this.layout();
                var e = this.calculateValue();
                return this.setValue(e), this.element.trigger({
                    type: "slide",
                    value: e
                }).data("value", e).prop("value", e), !1
            }
        },
        mouseup: function(i) {
            this.touchCapable ? t(document).off({
                touchmove: this.mousemove,
                touchend: this.mouseup
            }) : t(document).off({
                mousemove: this.mousemove,
                mouseup: this.mouseup
            }), this.inDrag = !1, 0 == this.over && this.hideTooltip(), this.element;
            var e = this.calculateValue();
            return this.layout(), this.element.trigger({
                type: "slideStop",
                value: e
            }).data("value", e).prop("value", e), !1
        },
        calculateValue: function() {
            var t;
            return this.range ? (t = [this.min + Math.round(this.diff * this.percentage[0] / 100 / this.step) * this.step, this.min + Math.round(this.diff * this.percentage[1] / 100 / this.step) * this.step], this.value = t) : (t = this.min + Math.round(this.diff * this.percentage[0] / 100 / this.step) * this.step, this.value = [t, this.value[1]]), t
        },
        getPercentage: function(t) {
            this.touchCapable && (t = t.touches[0]);
            var i = 100 * (t[this.mousePos] - this.offset[this.stylePos]) / this.size;
            return i = Math.round(i / this.percentage[2]) * this.percentage[2], Math.max(0, Math.min(100, i))
        },
        getValue: function() {
            return this.range ? this.value : this.value[0]
        },
        setLimit: function(t) {
            this.limit = t
        },
        setDragLocked: function(t) {
            this.dragLocked = t
        },
        getDragLocked: function(t) {
            return this.dragLocked
        },
        setValue: function(t) {
            this.value = t, this.range ? (this.value[0] = Math.max(this.min, Math.min(this.max, this.value[0])), this.value[1] = Math.max(this.min, Math.min(this.max, this.value[1]))) : (this.value = [Math.max(this.min, Math.min(this.max, this.value))], this.handle2.addClass("hide"), "after" == this.selection ? this.value[1] = this.max : this.value[1] = this.min), this.diff = this.max - this.min, this.percentage = [100 * (this.value[0] - this.min) / this.diff, 100 * (this.value[1] - this.min) / this.diff, 100 * this.step / this.diff], this.layout()
        },
        destroy: function() {
            this.element.show().insertBefore(this.picker), this.picker.remove()
        }
    }, t.fn.slider = function(e, s) {
        return this.each(function() {
            var h = t(this),
                a = h.data("slider"),
                o = "object" == typeof e && e;
            a || h.data("slider", a = new i(this, t.extend({}, t.fn.slider.defaults, o))), "string" == typeof e && a[e](s)
        })
    }, t.fn.slider.defaults = {
        min: 0,
        max: 10,
        step: 1,
        orientation: "horizontal",
        value: 5,
        selection: "before",
        tooltip: "show",
        handle: "round",
        reversed: !1,
        limit: 1e5,
        dragLocked: !1,
        formater: function(t) {
            return t
        }
    }, t.fn.slider.Constructor = i
}(window.jQuery);