! function(e) {
    "use strict";

    function a() {}
    a.prototype.createBarChart = function(e, a, r, t, i, o) { Morris.Bar({ element: e, data: a, xkey: r, ykeys: t, labels: i, gridLineColor: "rgba(108, 120, 151, 0.1)", gridTextColor: "#98a6ad", barSizeRatio: .2, resize: !0, hideHover: "auto", barColors: o }) }, a.prototype.createAreaChart = function(e, a, r, t, i, o, b, n) { Morris.Area({ element: e, pointSize: 0, lineWidth: 0, data: t, xkey: i, ykeys: o, labels: b, resize: !0, gridLineColor: "rgba(108, 120, 151, 0.1)", hideHover: "auto", lineColors: n, fillOpacity: .6, behaveLikeLine: !0 }) }, a.prototype.createDonutChart = function(e, a, r) { Morris.Donut({ element: e, data: a, resize: !0, colors: r }) }, a.prototype.init = function() {
        this.createBarChart("morris-bar-example", [{ y: "2002", a: 100, b: 90 }, { y: "2007", a: 75, b: 65 }, { y: "2008", a: 50, b: 40 }, { y: "2009", a: 75, b: 65 }, { y: "2010", a: 50, b: 40 }, { y: "2011", a: 75, b: 65 }, { y: "2012", a: 100, b: 90 }, { y: "2013", a: 90, b: 75 }, { y: "2014", a: 75, b: 65 }, { y: "2015", a: 50, b: 40 }, { y: "2016", a: 75, b: 65 }, { y: "2017", a: 100, b: 90 }, { y: "2018", a: 90, b: 75 }], "y", ["a", "b"], ["Series A", "Series B"], ["#2f8ee0", "#4bbbce"]);
        this.createAreaChart("morris-area-example", 0, 0, [{ y: "2007", a: 0, b: 0, c: 0 }, { y: "2008", a: 150, b: 45, c: 15 }, { y: "2009", a: 60, b: 150, c: 195 }, { y: "2010", a: 180, b: 36, c: 21 }, { y: "2011", a: 90, b: 60, c: 360 }, { y: "2012", a: 75, b: 240, c: 120 }, { y: "2013", a: 30, b: 30, c: 30 }], "y", ["a", "b", "c"], ["Series A", "Series B", "Series C"], ["#ccc", "#2f8ee0", "#4bbbce"]);
        this.createDonutChart("morris-donut-example", [{ label: "Marketing", value: 12 }, { label: "Online", value: 42 }, { label: "Offline", value: 20 }], ["#f0f1f4", "#2f8ee0", "#4bbbce"])
    }, e.Dashboard = new a, e.Dashboard.Constructor = a
}(window.jQuery),
function() {
    "use strict";
    window.jQuery.Dashboard.init()
}();