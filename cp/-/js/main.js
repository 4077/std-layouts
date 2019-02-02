// head {
var __nodeId__ = "std_layouts_cp__main";
var __nodeNs__ = "std_layouts_cp";
// }

(function (__nodeNs__, __nodeId__) {
    $.widget(__nodeNs__ + "." + __nodeId__, {
        options: {},

        _create: function () {
            this.bind();
        },

        _setOption: function (key, value) {
            $.Widget.prototype._setOption.apply(this, arguments);
        },

        bind: function () {
            var widget = this;

            $(window).rebind("keyup", function (e) {
                if (e.keyCode == 120) {
                    request(widget.options.paths.toggleHeaderHidden);
                }
            });

            ewma.delay(function () {
                $(".header", widget.element).css({overflow: 'visible'});
            });

            var vt = 0;

            $(window).resize(function () {
                $(".header", widget.element).css({overflow: 'hidden'});

                clearTimeout(vt);

                vt = ewma.delay(function () {
                    $(".header", widget.element).css({overflow: 'visible'});
                }, 400);
            });
        }
    });
})(__nodeNs__, __nodeId__);
