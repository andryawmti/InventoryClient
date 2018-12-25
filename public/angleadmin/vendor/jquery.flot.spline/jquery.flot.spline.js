! function(i) {
    "use strict";

    function e(i, e, s, t, n, l, o) {
        var a, r, c, p = Math.pow,
            h = Math.sqrt;
        return [s + (r = o * (a = h(p(s - i, 2) + p(t - e, 2))) / (a + h(p(n - s, 2) + p(l - t, 2)))) * (i - n), t + r * (e - l), s - (c = o - r) * (i - n), t - c * (e - l)]
    }
    var s = [];

    function t(i, e, t, n) {
        (void 0 === e || "bezier" !== e && "quadratic" !== e) && (e = "quadratic"), e += "CurveTo", 0 == s.length ? s.push([t[0], t[1], n.concat(t.slice(2)), e]) : "quadraticCurveTo" == e && 2 == t.length ? (n = n.slice(0, 2).concat(t), s.push([t[0], t[1], n, e])) : s.push([t[2], t[3], n.concat(t.slice(2)), e])
    }

    function n(n, l, o) {
        if (!0 === o.splines.show) {
            var a, r, c, p = [],
                h = o.splines.tension || .5,
                u = o.datapoints.points,
                f = o.datapoints.pointsize,
                d = n.getPlotOffset(),
                x = u.length,
                v = [];
            if (s = [], x / f < 4) i.extend(o.lines, o.splines);
            else {
                for (a = 0; a < x; a += f) r = u[a], c = u[a + 1], null == r || r < o.xaxis.min || r > o.xaxis.max || c < o.yaxis.min || c > o.yaxis.max || v.push(o.xaxis.p2c(r) + d.left, o.yaxis.p2c(c) + d.top);
                for (x = v.length, a = 0; a < x - 2; a += 2) p = p.concat(e.apply(this, v.slice(a, a + 6).concat([h])));
                for (l.save(), l.strokeStyle = o.color, l.lineWidth = o.splines.lineWidth, t(0, "quadratic", v.slice(0, 4), p.slice(0, 2)), a = 2; a < x - 3; a += 2) t(0, "bezier", v.slice(a, a + 4), p.slice(2 * a - 2, 2 * a + 2));
                t(0, "quadratic", v.slice(x - 2, x), [p[2 * x - 10], p[2 * x - 9], v[x - 4], v[x - 3]]),
                    function(e, s, t, n, l) {
                        var o = i.color.parse(l);
                        o.a = "number" == typeof n ? n : .3, o.normalize(), o = o.toString(), s.beginPath(), s.moveTo(e[0][0], e[0][1]);
                        for (var a = e.length, r = 0; r < a; r++) s[e[r][3]].apply(s, e[r][2]);
                        s.stroke(), s.lineWidth = 0, s.lineTo(e[a - 1][0], t), s.lineTo(e[0][0], t), s.closePath(), !1 !== n && (s.fillStyle = o, s.fill())
                    }(s, l, n.height() + 10, o.splines.fill, o.color), l.restore()
            }
        }
    }
    i.plot.plugins.push({
        init: function(i) {
            i.hooks.drawSeries.push(n)
        },
        options: {
            series: {
                splines: {
                    show: !1,
                    lineWidth: 2,
                    tension: .5,
                    fill: !1
                }
            }
        },
        name: "spline",
        version: "0.8.2"
    })
}(jQuery);