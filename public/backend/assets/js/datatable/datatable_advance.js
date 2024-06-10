(function ($) {
  !(function (t, i, e) {
    var s;
    (s = function (s) {
      "use strict";
      var n,
        r,
        a,
        h,
        o,
        l,
        g,
        p,
        u,
        c,
        d,
        f,
        v,
        m,
        $,
        x,
        y,
        C,
        _,
        w,
        R,
        b,
        S,
        k,
        M,
        H,
        W,
        T,
        q,
        I,
        P,
        j,
        L = {},
        A = 0;
      (n = function () {
        return {
          common: {
            type: "line",
            lineColor: "#00f",
            fillColor: "#cdf",
            defaultPixelsPerValue: 3,
            width: "auto",
            height: "auto",
            composite: !1,
            tagValuesAttribute: "values",
            tagOptionsPrefix: "spark",
            enableTagOptions: !1,
            enableHighlight: !0,
            highlightLighten: 1.4,
            tooltipSkipNull: !0,
            tooltipPrefix: "",
            tooltipSuffix: "",
            disableHiddenCheck: !1,
            numberFormatter: !1,
            numberDigitGroupCount: 3,
            numberDigitGroupSep: ",",
            numberDecimalMark: ".",
            disableTooltips: !1,
            disableInteraction: !1,
          },
          line: {
            spotColor: "#f80",
            highlightSpotColor: "#5f5",
            highlightLineColor: "#f22",
            spotRadius: 1.5,
            minSpotColor: "#f80",
            maxSpotColor: "#f80",
            lineWidth: 1,
            normalRangeMin: e,
            normalRangeMax: e,
            normalRangeColor: "#ccc",
            drawNormalOnTop: !1,
            chartRangeMin: e,
            chartRangeMax: e,
            chartRangeMinX: e,
            chartRangeMaxX: e,
            tooltipFormat: new a(
              '<span style="color: {{color}}">&#9679;</span> {{prefix}}{{y}}{{suffix}}'
            ),
          },
          bar: {
            barColor: "#3366cc",
            negBarColor: "#f44",
            stackedBarColor: [
              "#3366cc",
              "#dc3912",
              "#ff9900",
              "#109618",
              "#66aa00",
              "#dd4477",
              "#0099c6",
              "#990099",
            ],
            zeroColor: e,
            nullColor: e,
            zeroAxis: !0,
            barWidth: 4,
            barSpacing: 1,
            chartRangeMax: e,
            chartRangeMin: e,
            chartRangeClip: !1,
            colorMap: e,
            tooltipFormat: new a(
              '<span style="color: {{color}}">&#9679;</span> {{prefix}}{{value}}{{suffix}}'
            ),
          },
          tristate: {
            barWidth: 4,
            barSpacing: 1,
            posBarColor: "#6f6",
            negBarColor: "#f44",
            zeroBarColor: "#999",
            colorMap: {},
            tooltipFormat: new a(
              '<span style="color: {{color}}">&#9679;</span> {{value:map}}'
            ),
            tooltipValueLookups: { map: { "-1": "Loss", 0: "Draw", 1: "Win" } },
          },
          discrete: {
            lineHeight: "auto",
            thresholdColor: e,
            thresholdValue: 0,
            chartRangeMax: e,
            chartRangeMin: e,
            chartRangeClip: !1,
            tooltipFormat: new a("{{prefix}}{{value}}{{suffix}}"),
          },
          bullet: {
            targetColor: "#f33",
            targetWidth: 3,
            performanceColor: "#33f",
            rangeColors: ["#d3dafe", "#a8b6ff", "#7f94ff"],
            base: e,
            tooltipFormat: new a("{{fieldkey:fields}} - {{value}}"),
            tooltipValueLookups: {
              fields: { r: "Range", p: "Performance", t: "Target" },
            },
          },
          pie: {
            offset: 0,
            sliceColors: [
              "#3366cc",
              "#dc3912",
              "#ff9900",
              "#109618",
              "#66aa00",
              "#dd4477",
              "#0099c6",
              "#990099",
            ],
            borderWidth: 0,
            borderColor: "#000",
            tooltipFormat: new a(
              '<span style="color: {{color}}">&#9679;</span> {{value}} ({{percent.1}}%)'
            ),
          },
          box: {
            raw: !1,
            boxLineColor: "#000",
            boxFillColor: "#cdf",
            whiskerColor: "#000",
            outlierLineColor: "#333",
            outlierFillColor: "#fff",
            medianColor: "#f00",
            showOutliers: !0,
            outlierIQR: 1.5,
            spotRadius: 1.5,
            target: e,
            targetColor: "#4a2",
            chartRangeMax: e,
            chartRangeMin: e,
            tooltipFormat: new a("{{field:fields}}: {{value}}"),
            tooltipFormatFieldlistKey: "field",
            tooltipValueLookups: {
              fields: {
                lq: "Lower Quartile",
                med: "Median",
                uq: "Upper Quartile",
                lo: "Left Outlier",
                ro: "Right Outlier",
                lw: "Left Whisker",
                rw: "Right Whisker",
              },
            },
          },
        };
      }),
        (H =
          '.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}'),
        (r = function () {
          var t, i;
          return (
            (t = function () {
              this.init.apply(this, arguments);
            }),
            arguments.length > 1
              ? (arguments[0]
                  ? ((t.prototype = s.extend(
                      new arguments[0](),
                      arguments[arguments.length - 1]
                    )),
                    (t._super = arguments[0].prototype))
                  : (t.prototype = arguments[arguments.length - 1]),
                arguments.length > 2 &&
                  ((i = Array.prototype.slice.call(arguments, 1, -1)),
                  i.unshift(t.prototype),
                  s.extend.apply(s, i)))
              : (t.prototype = arguments[0]),
            (t.prototype.cls = t),
            t
          );
        }),
        (s.SPFormatClass = a =
          r({
            fre: /\{\{([\w.]+?)(:(.+?))?\}\}/g,
            precre: /(\w+)\.(\d+)/,
            init: function (t, i) {
              (this.format = t), (this.fclass = i);
            },
            render: function (t, i, s) {
              var n,
                r,
                a,
                h,
                o,
                l = this,
                g = t;
              return this.format.replace(this.fre, function () {
                var t;
                return (
                  (r = arguments[1]),
                  (a = arguments[3]),
                  (n = l.precre.exec(r)) ? ((o = n[2]), (r = n[1])) : (o = !1),
                  (h = g[r]) === e
                    ? ""
                    : a && i && i[a]
                    ? (t = i[a]).get
                      ? i[a].get(h) || h
                      : i[a][h] || h
                    : (u(h) &&
                        (h = s.get("numberFormatter")
                          ? s.get("numberFormatter")(h)
                          : m(
                              h,
                              o,
                              s.get("numberDigitGroupCount"),
                              s.get("numberDigitGroupSep"),
                              s.get("numberDecimalMark")
                            )),
                      h)
                );
              });
            },
          })),
        (s.spformat = function (t, i) {
          return new a(t, i);
        }),
        (h = function (t, i, e) {
          return t < i ? i : t > e ? e : t;
        }),
        (o = function (t, e) {
          var s;
          return 2 === e
            ? ((s = i.floor(t.length / 2)),
              t.length % 2 ? t[s] : (t[s - 1] + t[s]) / 2)
            : t.length % 2
            ? (s = (t.length * e + e) / 4) % 1
              ? (t[i.floor(s)] + t[i.floor(s) - 1]) / 2
              : t[s - 1]
            : (s = (t.length * e + 2) / 4) % 1
            ? (t[i.floor(s)] + t[i.floor(s) - 1]) / 2
            : t[s - 1];
        }),
        (l = function (t) {
          var i;
          switch (t) {
            case "undefined":
              t = e;
              break;
            case "null":
              t = null;
              break;
            case "true":
              t = !0;
              break;
            case "false":
              t = !1;
              break;
            default:
              (i = parseFloat(t)), t == i && (t = i);
          }
          return t;
        }),
        (g = function (t) {
          var i,
            e = [];
          for (i = t.length; i--; ) e[i] = l(t[i]);
          return e;
        }),
        (p = function (t, i) {
          var e,
            s,
            n = [];
          for (e = 0, s = t.length; e < s; e++) t[e] !== i && n.push(t[e]);
          return n;
        }),
        (u = function (t) {
          return !isNaN(parseFloat(t)) && isFinite(t);
        }),
        (m = function (t, i, e, n, r) {
          var a, h;
          for (
            t = (!1 === i ? parseFloat(t).toString() : t.toFixed(i)).split(""),
              (a = (a = s.inArray(".", t)) < 0 ? t.length : a) < t.length &&
                (t[a] = r),
              h = a - e;
            h > 0;
            h -= e
          )
            t.splice(h, 0, n);
          return t.join("");
        }),
        (c = function (t, i, e) {
          var s;
          for (s = i.length; s--; )
            if ((!e || null !== i[s]) && i[s] !== t) return !1;
          return !0;
        }),
        (d = function (t) {
          var i,
            e = 0;
          for (i = t.length; i--; ) e += "number" == typeof t[i] ? t[i] : 0;
          return e;
        }),
        (v = function (t) {
          return s.isArray(t) ? t : [t];
        }),
        (f = function (i) {
          var e;
          t.createStyleSheet
            ? (t.createStyleSheet().cssText = i)
            : (((e = t.createElement("style")).type = "text/css"),
              t.getElementsByTagName("head")[0].appendChild(e),
              (e[
                "string" == typeof t.body.style.WebkitAppearance
                  ? "innerText"
                  : "innerHTML"
              ] = i));
        }),
        (s.fn.simpledraw = function (i, n, r, a) {
          var h, o;
          if (r && (h = this.data("_jqs_vcanvas"))) return h;
          if (!1 === s.fn.sparkline.canvas) return !1;
          if (s.fn.sparkline.canvas === e) {
            var l = t.createElement("canvas");
            if (l.getContext && l.getContext("2d"))
              s.fn.sparkline.canvas = function (t, i, e, s) {
                return new I(t, i, e, s);
              };
            else {
              if (!t.namespaces || t.namespaces.v)
                return (s.fn.sparkline.canvas = !1), !1;
              t.namespaces.add(
                "v",
                "urn:schemas-microsoft-com:vml",
                "#default#VML"
              ),
                (s.fn.sparkline.canvas = function (t, i, e, s) {
                  return new P(t, i, e);
                });
            }
          }
          return (
            i === e && (i = s(this).innerWidth()),
            n === e && (n = s(this).innerHeight()),
            (h = s.fn.sparkline.canvas(i, n, this, a)),
            (o = s(this).data("_jqs_mhandler")) && o.registerCanvas(h),
            h
          );
        }),
        (s.fn.cleardraw = function () {
          var t = this.data("_jqs_vcanvas");
          t && t.reset();
        }),
        (s.RangeMapClass = $ =
          r({
            init: function (t) {
              var i,
                e,
                s = [];
              for (i in t)
                t.hasOwnProperty(i) &&
                  "string" == typeof i &&
                  i.indexOf(":") > -1 &&
                  (((e = i.split(":"))[0] =
                    0 === e[0].length ? -1 / 0 : parseFloat(e[0])),
                  (e[1] = 0 === e[1].length ? 1 / 0 : parseFloat(e[1])),
                  (e[2] = t[i]),
                  s.push(e));
              (this.map = t), (this.rangelist = s || !1);
            },
            get: function (t) {
              var i,
                s,
                n,
                r = this.rangelist;
              if ((n = this.map[t]) !== e) return n;
              if (r) {
                for (i = r.length; i--; )
                  if ((s = r[i])[0] <= t && s[1] >= t) return s[2];
              }
              return e;
            },
          })),
        (s.range_map = function (t) {
          return new $(t);
        }),
        (x = r({
          init: function (t, i) {
            var e = s(t);
            (this.$el = e),
              (this.options = i),
              (this.currentPageX = 0),
              (this.currentPageY = 0),
              (this.el = t),
              (this.splist = []),
              (this.tooltip = null),
              (this.over = !1),
              (this.displayTooltips = !i.get("disableTooltips")),
              (this.highlightEnabled = !i.get("disableHighlight"));
          },
          registerSparkline: function (t) {
            this.splist.push(t), this.over && this.updateDisplay();
          },
          registerCanvas: function (t) {
            var i = s(t.canvas);
            (this.canvas = t),
              (this.$canvas = i),
              i.mouseenter(s.proxy(this.mouseenter, this)),
              i.mouseleave(s.proxy(this.mouseleave, this)),
              i.click(s.proxy(this.mouseclick, this));
          },
          reset: function (t) {
            (this.splist = []),
              this.tooltip && t && (this.tooltip.remove(), (this.tooltip = e));
          },
          mouseclick: function (t) {
            var i = s.Event("sparklineClick");
            (i.originalEvent = t),
              (i.sparklines = this.splist),
              this.$el.trigger(i);
          },
          mouseenter: function (i) {
            s(t.body).unbind("mousemove.jqs"),
              s(t.body).bind("mousemove.jqs", s.proxy(this.mousemove, this)),
              (this.over = !0),
              (this.currentPageX = i.pageX),
              (this.currentPageY = i.pageY),
              (this.currentEl = i.target),
              !this.tooltip &&
                this.displayTooltips &&
                ((this.tooltip = new y(this.options)),
                this.tooltip.updatePosition(i.pageX, i.pageY)),
              this.updateDisplay();
          },
          mouseleave: function () {
            s(t.body).unbind("mousemove.jqs");
            var i,
              e,
              n = this.splist,
              r = n.length,
              a = !1;
            for (
              this.over = !1,
                this.currentEl = null,
                this.tooltip && (this.tooltip.remove(), (this.tooltip = null)),
                e = 0;
              e < r;
              e++
            )
              (i = n[e]).clearRegionHighlight() && (a = !0);
            a && this.canvas.render();
          },
          mousemove: function (t) {
            (this.currentPageX = t.pageX),
              (this.currentPageY = t.pageY),
              (this.currentEl = t.target),
              this.tooltip && this.tooltip.updatePosition(t.pageX, t.pageY),
              this.updateDisplay();
          },
          updateDisplay: function () {
            var t,
              i,
              e,
              n,
              r,
              a = this.splist,
              h = a.length,
              o = !1,
              l = this.$canvas.offset(),
              g = this.currentPageX - l.left,
              p = this.currentPageY - l.top;
            if (this.over) {
              for (e = 0; e < h; e++)
                (n = (i = a[e]).setRegionHighlight(this.currentEl, g, p)) &&
                  (o = !0);
              if (o) {
                if (
                  (((r = s.Event("sparklineRegionChange")).sparklines =
                    this.splist),
                  this.$el.trigger(r),
                  this.tooltip)
                ) {
                  for (e = 0, t = ""; e < h; e++)
                    t += (i = a[e]).getCurrentRegionTooltip();
                  this.tooltip.setContent(t);
                }
                this.disableHighlight || this.canvas.render();
              }
              null === n && this.mouseleave();
            }
          },
        })),
        (y = r({
          sizeStyle:
            "position: static !important;display: block !important;visibility: hidden !important;float: left !important;",
          init: function (i) {
            var e,
              n = i.get("tooltipClassname", "jqstooltip"),
              r = this.sizeStyle;
            (this.container = i.get("tooltipContainer") || t.body),
              (this.tooltipOffsetX = i.get("tooltipOffsetX", 10)),
              (this.tooltipOffsetY = i.get("tooltipOffsetY", 12)),
              s("#jqssizetip").remove(),
              s("#jqstooltip").remove(),
              (this.sizetip = s("<div/>", {
                id: "jqssizetip",
                style: r,
                class: n,
              })),
              (this.tooltip = s("<div/>", {
                id: "jqstooltip",
                class: n,
              }).appendTo(this.container)),
              (e = this.tooltip.offset()),
              (this.offsetLeft = e.left),
              (this.offsetTop = e.top),
              (this.hidden = !0),
              s(window).unbind("resize.jqs scroll.jqs"),
              s(window).bind(
                "resize.jqs scroll.jqs",
                s.proxy(this.updateWindowDims, this)
              ),
              this.updateWindowDims();
          },
          updateWindowDims: function () {
            (this.scrollTop = s(window).scrollTop()),
              (this.scrollLeft = s(window).scrollLeft()),
              (this.scrollRight = this.scrollLeft + s(window).width()),
              this.updatePosition();
          },
          getSize: function (t) {
            this.sizetip.html(t).appendTo(this.container),
              (this.width = this.sizetip.width() + 1),
              (this.height = this.sizetip.height()),
              this.sizetip.remove();
          },
          setContent: function (t) {
            if (!t) {
              this.tooltip.css("visibility", "hidden"), (this.hidden = !0);
              return;
            }
            this.getSize(t),
              this.tooltip.html(t).css({
                width: this.width,
                height: this.height,
                visibility: "visible",
              }),
              this.hidden && ((this.hidden = !1), this.updatePosition());
          },
          updatePosition: function (t, i) {
            if (t === e) {
              if (this.mousex === e) return;
              (t = this.mousex - this.offsetLeft),
                (i = this.mousey - this.offsetTop);
            } else
              (this.mousex = t -= this.offsetLeft),
                (this.mousey = i -= this.offsetTop);
            this.height &&
              this.width &&
              !this.hidden &&
              ((i -= this.height + this.tooltipOffsetY),
              (t += this.tooltipOffsetX),
              i < this.scrollTop && (i = this.scrollTop),
              t < this.scrollLeft
                ? (t = this.scrollLeft)
                : t + this.width > this.scrollRight &&
                  (t = this.scrollRight - this.width),
              this.tooltip.css({ left: t, top: i }));
          },
          remove: function () {
            this.tooltip.remove(),
              this.sizetip.remove(),
              (this.sizetip = this.tooltip = e),
              s(window).unbind("resize.jqs scroll.jqs");
          },
        })),
        s(
          (W = function () {
            f(H);
          })
        ),
        (j = []),
        (s.fn.sparkline = function (i, n) {
          return this.each(function () {
            var r,
              a,
              h = new s.fn.sparkline.options(this, n),
              o = s(this);
            if (
              ((r = function () {
                var n, r, a, l, g, p, u;
                if (
                  ("html" === i || i === e
                    ? (((u = this.getAttribute(h.get("tagValuesAttribute"))) ===
                        e ||
                        null === u) &&
                        (u = o.html()),
                      (n = u
                        .replace(/(^\s*<!--)|(-->\s*$)|\s+/g, "")
                        .split(",")))
                    : (n = i),
                  (r =
                    "auto" === h.get("width")
                      ? n.length * h.get("defaultPixelsPerValue")
                      : h.get("width")),
                  "auto" === h.get("height")
                    ? (h.get("composite") && s.data(this, "_jqs_vcanvas")) ||
                      (((l = t.createElement("span")).innerHTML = "a"),
                      o.html(l),
                      (a = s(l).innerHeight() || s(l).height()),
                      s(l).remove(),
                      (l = null))
                    : (a = h.get("height")),
                  h.get("disableInteraction")
                    ? (g = !1)
                    : (g = s.data(this, "_jqs_mhandler"))
                    ? h.get("composite") || g.reset()
                    : ((g = new x(this, h)), s.data(this, "_jqs_mhandler", g)),
                  h.get("composite") && !s.data(this, "_jqs_vcanvas"))
                ) {
                  s.data(this, "_jqs_errnotify") ||
                    (alert(
                      "Attempted to attach a composite sparkline to an element with no existing sparkline"
                    ),
                    s.data(this, "_jqs_errnotify", !0));
                  return;
                }
                (p = new s.fn.sparkline[h.get("type")](
                  this,
                  n,
                  h,
                  r,
                  a
                )).render(),
                  g && g.registerSparkline(p);
              }),
              (s(this).html() &&
                !h.get("disableHiddenCheck") &&
                s(this).is(":hidden")) ||
                !s(this).parents("body").length)
            ) {
              if (!h.get("composite") && s.data(this, "_jqs_pending"))
                for (a = j.length; a; a--)
                  j[a - 1][0] == this && j.splice(a - 1, 1);
              j.push([this, r]), s.data(this, "_jqs_pending", !0);
            } else r.call(this);
          });
        }),
        (s.fn.sparkline.defaults = n()),
        (s.sparkline_display_visible = function () {
          var t,
            i,
            e,
            n = [];
          for (i = 0, e = j.length; i < e; i++)
            s((t = j[i][0])).is(":visible") && !s(t).parents().is(":hidden")
              ? (j[i][1].call(t),
                s.data(j[i][0], "_jqs_pending", !1),
                n.push(i))
              : s(t).closest("html").length ||
                s.data(t, "_jqs_pending") ||
                (s.data(j[i][0], "_jqs_pending", !1), n.push(i));
          for (i = n.length; i; i--) j.splice(n[i - 1], 1);
        }),
        (s.fn.sparkline.options = r({
          init: function (t, i) {
            var e, n, r, a;
            (this.userOptions = i = i || {}),
              (this.tag = t),
              (this.tagValCache = {}),
              (r = (n = s.fn.sparkline.defaults).common),
              (this.tagOptionsPrefix =
                i.enableTagOptions &&
                (i.tagOptionsPrefix || r.tagOptionsPrefix)),
              (e =
                (a = this.getTagSetting("type")) === L
                  ? n[i.type || r.type]
                  : n[a]),
              (this.mergedOptions = s.extend({}, r, e, i));
          },
          getTagSetting: function (t) {
            var i,
              s,
              n,
              r,
              a = this.tagOptionsPrefix;
            if (!1 === a || a === e) return L;
            if (this.tagValCache.hasOwnProperty(t)) i = this.tagValCache.key;
            else {
              if ((i = this.tag.getAttribute(a + t)) === e || null === i) i = L;
              else if ("[" === i.substr(0, 1))
                for (
                  s = (i = i.substr(1, i.length - 2).split(",")).length;
                  s--;

                )
                  i[s] = l(i[s].replace(/(^\s*)|(\s*$)/g, ""));
              else if ("{" === i.substr(0, 1))
                for (
                  n = i.substr(1, i.length - 2).split(","),
                    i = {},
                    s = n.length;
                  s--;

                )
                  i[(r = n[s].split(":", 2))[0].replace(/(^\s*)|(\s*$)/g, "")] =
                    l(r[1].replace(/(^\s*)|(\s*$)/g, ""));
              else i = l(i);
              this.tagValCache.key = i;
            }
            return i;
          },
          get: function (t, i) {
            var s,
              n = this.getTagSetting(t);
            return n !== L ? n : (s = this.mergedOptions[t]) === e ? i : s;
          },
        })),
        (s.fn.sparkline._base = r({
          disabled: !1,
          init: function (t, i, n, r, a) {
            (this.el = t),
              (this.$el = s(t)),
              (this.values = i),
              (this.options = n),
              (this.width = r),
              (this.height = a),
              (this.currentRegion = e);
          },
          initTarget: function () {
            var t = !this.options.get("disableInteraction");
            (this.target = this.$el.simpledraw(
              this.width,
              this.height,
              this.options.get("composite"),
              t
            ))
              ? ((this.canvasWidth = this.target.pixelWidth),
                (this.canvasHeight = this.target.pixelHeight))
              : (this.disabled = !0);
          },
          render: function () {
            return !this.disabled || ((this.el.innerHTML = ""), !1);
          },
          getRegion: function (t, i) {},
          setRegionHighlight: function (t, i, s) {
            var n,
              r = this.currentRegion,
              a = !this.options.get("disableHighlight");
            return i > this.canvasWidth ||
              s > this.canvasHeight ||
              i < 0 ||
              s < 0
              ? null
              : r !== (n = this.getRegion(t, i, s)) &&
                  (r !== e && a && this.removeHighlight(),
                  (this.currentRegion = n),
                  n !== e && a && this.renderHighlight(),
                  !0);
          },
          clearRegionHighlight: function () {
            return (
              this.currentRegion !== e &&
              (this.removeHighlight(), (this.currentRegion = e), !0)
            );
          },
          renderHighlight: function () {
            this.changeHighlight(!0);
          },
          removeHighlight: function () {
            this.changeHighlight(!1);
          },
          changeHighlight: function (t) {},
          getCurrentRegionTooltip: function () {
            var t,
              i,
              n,
              r,
              h,
              o,
              l,
              g,
              p,
              u,
              c,
              d,
              f,
              v,
              m = this.options,
              $ = "",
              x = [];
            if (this.currentRegion === e) return "";
            if (
              ((t = this.getCurrentRegionFields()),
              (c = m.get("tooltipFormatter")))
            )
              return c(this, m, t);
            if (
              (m.get("tooltipChartTitle") &&
                ($ +=
                  '<div class="jqs jqstitle">' +
                  m.get("tooltipChartTitle") +
                  "</div>\n"),
              !(i = this.options.get("tooltipFormat")))
            )
              return "";
            if (
              (s.isArray(i) || (i = [i]),
              s.isArray(t) || (t = [t]),
              (l = this.options.get("tooltipFormatFieldlist")),
              (g = this.options.get("tooltipFormatFieldlistKey")),
              l && g)
            ) {
              for (p = [], o = t.length; o--; )
                (u = t[o][g]), -1 != (v = s.inArray(u, l)) && (p[v] = t[o]);
              t = p;
            }
            for (n = i.length, f = t.length, o = 0; o < n; o++)
              for (
                "string" == typeof (d = i[o]) && (d = new a(d)),
                  r = d.fclass || "jqsfield",
                  v = 0;
                v < f;
                v++
              )
                (t[v].isNull && m.get("tooltipSkipNull")) ||
                  (s.extend(t[v], {
                    prefix: m.get("tooltipPrefix"),
                    suffix: m.get("tooltipSuffix"),
                  }),
                  x.push(
                    '<div class="' +
                      r +
                      '">' +
                      (h = d.render(t[v], m.get("tooltipValueLookups"), m)) +
                      "</div>"
                  ));
            return x.length ? $ + x.join("\n") : "";
          },
          getCurrentRegionFields: function () {},
          calcHighlightColor: function (t, e) {
            var s,
              n,
              r,
              a,
              o = e.get("highlightColor"),
              l = e.get("highlightLighten");
            if (o) return o;
            if (
              l &&
              (s =
                /^#([0-9a-f])([0-9a-f])([0-9a-f])$/i.exec(t) ||
                /^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i.exec(t))
            ) {
              for (r = [], n = 4 === t.length ? 16 : 1, a = 0; a < 3; a++)
                r[a] = h(i.round(parseInt(s[a + 1], 16) * n * l), 0, 255);
              return "rgb(" + r.join(",") + ")";
            }
            return t;
          },
        })),
        (C = {
          changeHighlight: function (t) {
            var i,
              e = this.currentRegion,
              n = this.target,
              r = this.regionShapes[e];
            r &&
              ((i = this.renderRegion(e, t)),
              s.isArray(i) || s.isArray(r)
                ? (n.replaceWithShapes(r, i),
                  (this.regionShapes[e] = s.map(i, function (t) {
                    return t.id;
                  })))
                : (n.replaceWithShape(r, i), (this.regionShapes[e] = i.id)));
          },
          render: function () {
            var t,
              i,
              e,
              n,
              r = this.values,
              a = this.target,
              h = this.regionShapes;
            if (this.cls._super.render.call(this)) {
              for (e = r.length; e--; )
                if ((t = this.renderRegion(e))) {
                  if (s.isArray(t)) {
                    for (i = [], n = t.length; n--; )
                      t[n].append(), i.push(t[n].id);
                    h[e] = i;
                  } else t.append(), (h[e] = t.id);
                } else h[e] = null;
              a.render();
            }
          },
        }),
        (s.fn.sparkline.line = _ =
          r(s.fn.sparkline._base, {
            type: "line",
            init: function (t, i, e, s, n) {
              _._super.init.call(this, t, i, e, s, n),
                (this.vertices = []),
                (this.regionMap = []),
                (this.xvalues = []),
                (this.yvalues = []),
                (this.yminmax = []),
                (this.hightlightSpotId = null),
                (this.lastShapeId = null),
                this.initTarget();
            },
            getRegion: function (t, i, s) {
              var n,
                r = this.regionMap;
              for (n = r.length; n--; )
                if (null !== r[n] && i >= r[n][0] && i <= r[n][1])
                  return r[n][2];
              return e;
            },
            getCurrentRegionFields: function () {
              var t = this.currentRegion;
              return {
                isNull: null === this.yvalues[t],
                x: this.xvalues[t],
                y: this.yvalues[t],
                color: this.options.get("lineColor"),
                fillColor: this.options.get("fillColor"),
                offset: t,
              };
            },
            renderHighlight: function () {
              var t,
                i,
                s = this.currentRegion,
                n = this.target,
                r = this.vertices[s],
                a = this.options,
                h = a.get("spotRadius"),
                o = a.get("highlightSpotColor"),
                l = a.get("highlightLineColor");
              r &&
                (h &&
                  o &&
                  ((t = n.drawCircle(r[0], r[1], h, e, o)),
                  (this.highlightSpotId = t.id),
                  n.insertAfterShape(this.lastShapeId, t)),
                l &&
                  ((i = n.drawLine(
                    r[0],
                    this.canvasTop,
                    r[0],
                    this.canvasTop + this.canvasHeight,
                    l
                  )),
                  (this.highlightLineId = i.id),
                  n.insertAfterShape(this.lastShapeId, i)));
            },
            removeHighlight: function () {
              var t = this.target;
              this.highlightSpotId &&
                (t.removeShapeId(this.highlightSpotId),
                (this.highlightSpotId = null)),
                this.highlightLineId &&
                  (t.removeShapeId(this.highlightLineId),
                  (this.highlightLineId = null));
            },
            scanValues: function () {
              var t,
                e,
                s,
                n,
                r,
                a = this.values,
                h = a.length,
                o = this.xvalues,
                l = this.yvalues,
                g = this.yminmax;
              for (t = 0; t < h; t++)
                (e = a[t]),
                  (s = "string" == typeof a[t]),
                  (n = "object" == typeof a[t] && a[t] instanceof Array),
                  (r = s && a[t].split(":")),
                  s && 2 === r.length
                    ? (o.push(Number(r[0])),
                      l.push(Number(r[1])),
                      g.push(Number(r[1])))
                    : n
                    ? (o.push(e[0]), l.push(e[1]), g.push(e[1]))
                    : (o.push(t),
                      null === a[t] || "null" === a[t]
                        ? l.push(null)
                        : (l.push(Number(e)), g.push(Number(e))));
              this.options.get("xvalues") && (o = this.options.get("xvalues")),
                (this.maxy = this.maxyorg = i.max.apply(i, g)),
                (this.miny = this.minyorg = i.min.apply(i, g)),
                (this.maxx = i.max.apply(i, o)),
                (this.minx = i.min.apply(i, o)),
                (this.xvalues = o),
                (this.yvalues = l),
                (this.yminmax = g);
            },
            processRangeOptions: function () {
              var t = this.options,
                i = t.get("normalRangeMin"),
                s = t.get("normalRangeMax");
              i !== e &&
                (i < this.miny && (this.miny = i),
                s > this.maxy && (this.maxy = s)),
                t.get("chartRangeMin") !== e &&
                  (t.get("chartRangeClip") ||
                    t.get("chartRangeMin") < this.miny) &&
                  (this.miny = t.get("chartRangeMin")),
                t.get("chartRangeMax") !== e &&
                  (t.get("chartRangeClip") ||
                    t.get("chartRangeMax") > this.maxy) &&
                  (this.maxy = t.get("chartRangeMax")),
                t.get("chartRangeMinX") !== e &&
                  (t.get("chartRangeClipX") ||
                    t.get("chartRangeMinX") < this.minx) &&
                  (this.minx = t.get("chartRangeMinX")),
                t.get("chartRangeMaxX") !== e &&
                  (t.get("chartRangeClipX") ||
                    t.get("chartRangeMaxX") > this.maxx) &&
                  (this.maxx = t.get("chartRangeMaxX"));
            },
            drawNormalRange: function (t, s, n, r, a) {
              var h = this.options.get("normalRangeMin"),
                o = this.options.get("normalRangeMax"),
                l = s + i.round(n - n * ((o - this.miny) / a)),
                g = i.round((n * (o - h)) / a);
              this.target
                .drawRect(t, l, r, g, e, this.options.get("normalRangeColor"))
                .append();
            },
            render: function () {
              var t,
                n,
                r,
                a,
                h,
                o,
                l,
                g,
                p,
                u,
                c,
                d,
                f,
                v,
                m,
                x,
                y,
                C,
                w,
                R,
                b,
                S,
                k,
                M,
                H,
                W = this.options,
                T = this.target,
                q = this.canvasWidth,
                I = this.canvasHeight,
                P = this.vertices,
                j = W.get("spotRadius"),
                L = this.regionMap;
              if (
                _._super.render.call(this) &&
                (this.scanValues(),
                this.processRangeOptions(),
                (k = this.xvalues),
                (M = this.yvalues),
                this.yminmax.length && !(this.yvalues.length < 2))
              ) {
                for (
                  a = h = 0,
                    t = this.maxx - this.minx == 0 ? 1 : this.maxx - this.minx,
                    n = this.maxy - this.miny == 0 ? 1 : this.maxy - this.miny,
                    r = this.yvalues.length - 1,
                    j && (q < 4 * j || I < 4 * j) && (j = 0),
                    j &&
                      (((b =
                        W.get("highlightSpotColor") &&
                        !W.get("disableInteraction")) ||
                        W.get("minSpotColor") ||
                        (W.get("spotColor") && M[r] === this.miny)) &&
                        (I -= i.ceil(j)),
                      (b ||
                        W.get("maxSpotColor") ||
                        (W.get("spotColor") && M[r] === this.maxy)) &&
                        ((I -= i.ceil(j)), (a += i.ceil(j))),
                      (b ||
                        ((W.get("minSpotColor") || W.get("maxSpotColor")) &&
                          (M[0] === this.miny || M[0] === this.maxy))) &&
                        ((h += i.ceil(j)), (q -= i.ceil(j))),
                      (b ||
                        W.get("spotColor") ||
                        W.get("minSpotColor") ||
                        (W.get("maxSpotColor") &&
                          (M[r] === this.miny || M[r] === this.maxy))) &&
                        (q -= i.ceil(j))),
                    I--,
                    W.get("normalRangeMin") === e ||
                      W.get("drawNormalOnTop") ||
                      this.drawNormalRange(h, a, I, q, n),
                    g = [(l = [])],
                    v = m = null,
                    x = M.length,
                    H = 0;
                  H < x;
                  H++
                )
                  (p = k[H]),
                    (c = k[H + 1]),
                    (u = M[H]),
                    (m =
                      (d = h + i.round((p - this.minx) * (q / t))) +
                      ((f =
                        H < x - 1
                          ? h + i.round((c - this.minx) * (q / t))
                          : q) -
                        d) /
                        2),
                    (L[H] = [v || 0, m, H]),
                    (v = m),
                    null === u
                      ? H &&
                        (null !== M[H - 1] && ((l = []), g.push(l)),
                        P.push(null))
                      : (u < this.miny && (u = this.miny),
                        u > this.maxy && (u = this.maxy),
                        l.length || l.push([d, a + I]),
                        (o = [d, a + i.round(I - I * ((u - this.miny) / n))]),
                        l.push(o),
                        P.push(o));
                for (y = [], C = [], w = g.length, H = 0; H < w; H++)
                  (l = g[H]).length &&
                    (W.get("fillColor") &&
                      (l.push([l[l.length - 1][0], a + I]),
                      C.push(l.slice(0)),
                      l.pop()),
                    l.length > 2 && (l[0] = [l[0][0], l[1][1]]),
                    y.push(l));
                for (H = 0, w = C.length; H < w; H++)
                  T.drawShape(
                    C[H],
                    W.get("fillColor"),
                    W.get("fillColor")
                  ).append();
                for (
                  W.get("normalRangeMin") !== e &&
                    W.get("drawNormalOnTop") &&
                    this.drawNormalRange(h, a, I, q, n),
                    w = y.length,
                    H = 0;
                  H < w;
                  H++
                )
                  T.drawShape(
                    y[H],
                    W.get("lineColor"),
                    e,
                    W.get("lineWidth")
                  ).append();
                if (j && W.get("valueSpots"))
                  for (
                    (R = W.get("valueSpots")).get === e && (R = new $(R)),
                      H = 0;
                    H < x;
                    H++
                  )
                    (S = R.get(M[H])) &&
                      T.drawCircle(
                        h + i.round((k[H] - this.minx) * (q / t)),
                        a + i.round(I - I * ((M[H] - this.miny) / n)),
                        j,
                        e,
                        S
                      ).append();
                j &&
                  W.get("spotColor") &&
                  null !== M[r] &&
                  T.drawCircle(
                    h + i.round((k[k.length - 1] - this.minx) * (q / t)),
                    a + i.round(I - I * ((M[r] - this.miny) / n)),
                    j,
                    e,
                    W.get("spotColor")
                  ).append(),
                  this.maxy !== this.minyorg &&
                    (j &&
                      W.get("minSpotColor") &&
                      ((p = k[s.inArray(this.minyorg, M)]),
                      T.drawCircle(
                        h + i.round((p - this.minx) * (q / t)),
                        a + i.round(I - I * ((this.minyorg - this.miny) / n)),
                        j,
                        e,
                        W.get("minSpotColor")
                      ).append()),
                    j &&
                      W.get("maxSpotColor") &&
                      ((p = k[s.inArray(this.maxyorg, M)]),
                      T.drawCircle(
                        h + i.round((p - this.minx) * (q / t)),
                        a + i.round(I - I * ((this.maxyorg - this.miny) / n)),
                        j,
                        e,
                        W.get("maxSpotColor")
                      ).append())),
                  (this.lastShapeId = T.getLastShapeId()),
                  (this.canvasTop = a),
                  T.render();
              }
            },
          })),
        (s.fn.sparkline.bar = w =
          r(s.fn.sparkline._base, C, {
            type: "bar",
            init: function (t, n, r, a, o) {
              var u,
                c,
                d,
                f,
                v,
                m,
                x,
                y,
                C,
                _,
                R,
                b,
                S,
                k,
                M,
                H,
                W,
                T,
                q,
                I,
                P,
                j,
                L = parseInt(r.get("barWidth"), 10),
                A = parseInt(r.get("barSpacing"), 10),
                B = r.get("chartRangeMin"),
                F = r.get("chartRangeMax"),
                O = r.get("chartRangeClip"),
                V = 1 / 0,
                X = -1 / 0;
              for (
                w._super.init.call(this, t, n, r, a, o), m = 0, x = n.length;
                m < x;
                m++
              )
                ((u = "string" == typeof (I = n[m]) && I.indexOf(":") > -1) ||
                  s.isArray(I)) &&
                  ((M = !0),
                  u && (I = n[m] = g(I.split(":"))),
                  (I = p(I, null)),
                  (c = i.min.apply(i, I)),
                  (d = i.max.apply(i, I)),
                  c < V && (V = c),
                  d > X && (X = d));
              (this.stacked = M),
                (this.regionShapes = {}),
                (this.barWidth = L),
                (this.barSpacing = A),
                (this.totalBarWidth = L + A),
                (this.width = a = n.length * L + (n.length - 1) * A),
                this.initTarget(),
                O && ((S = B === e ? -1 / 0 : B), (k = F === e ? 1 / 0 : F)),
                (v = []),
                (f = M ? [] : v);
              var z = [],
                E = [];
              for (m = 0, x = n.length; m < x; m++)
                if (M)
                  for (
                    H = n[m],
                      n[m] = q = [],
                      z[m] = 0,
                      f[m] = E[m] = 0,
                      W = 0,
                      T = H.length;
                    W < T;
                    W++
                  )
                    null !== (I = q[W] = O ? h(H[W], S, k) : H[W]) &&
                      (I > 0 && (z[m] += I),
                      V < 0 && X > 0
                        ? I < 0
                          ? (E[m] += i.abs(I))
                          : (f[m] += I)
                        : (f[m] += i.abs(I - (I < 0 ? X : V))),
                      v.push(I));
                else
                  (I = O ? h(n[m], S, k) : n[m]),
                    null !== (I = n[m] = l(I)) && v.push(I);
              (this.max = b = i.max.apply(i, v)),
                (this.min = R = i.min.apply(i, v)),
                (this.stackMax = X = M ? i.max.apply(i, z) : b),
                (this.stackMin = V = M ? i.min.apply(i, v) : R),
                r.get("chartRangeMin") !== e &&
                  (r.get("chartRangeClip") || r.get("chartRangeMin") < R) &&
                  (R = r.get("chartRangeMin")),
                r.get("chartRangeMax") !== e &&
                  (r.get("chartRangeClip") || r.get("chartRangeMax") > b) &&
                  (b = r.get("chartRangeMax")),
                (this.zeroAxis = C = r.get("zeroAxis", !0)),
                (_ = R <= 0 && b >= 0 && C ? 0 : 0 == C ? R : R > 0 ? R : b),
                (this.xaxisOffset = _),
                (y = M ? i.max.apply(i, f) + i.max.apply(i, E) : b - R),
                (this.canvasHeightEf =
                  C && R < 0 ? this.canvasHeight - 2 : this.canvasHeight - 1),
                R < _
                  ? (P =
                      (((j = M && b >= 0 ? X : b) - _) / y) *
                      this.canvasHeight) !== i.ceil(P) &&
                    ((this.canvasHeightEf -= 2), (P = i.ceil(P)))
                  : (P = this.canvasHeight),
                (this.yoffset = P),
                s.isArray(r.get("colorMap"))
                  ? ((this.colorMapByIndex = r.get("colorMap")),
                    (this.colorMapByValue = null))
                  : ((this.colorMapByIndex = null),
                    (this.colorMapByValue = r.get("colorMap")),
                    this.colorMapByValue &&
                      this.colorMapByValue.get === e &&
                      (this.colorMapByValue = new $(this.colorMapByValue))),
                (this.range = y);
            },
            getRegion: function (t, s, n) {
              var r = i.floor(s / this.totalBarWidth);
              return r < 0 || r >= this.values.length ? e : r;
            },
            getCurrentRegionFields: function () {
              var t,
                i,
                e = this.currentRegion,
                s = v(this.values[e]),
                n = [];
              for (i = s.length; i--; )
                n.push({
                  isNull: null === (t = s[i]),
                  value: t,
                  color: this.calcColor(i, t, e),
                  offset: e,
                });
              return n;
            },
            calcColor: function (t, i, n) {
              var r,
                a,
                h = this.colorMapByIndex,
                o = this.colorMapByValue,
                l = this.options;
              return (
                (r = this.stacked
                  ? l.get("stackedBarColor")
                  : i < 0
                  ? l.get("negBarColor")
                  : l.get("barColor")),
                0 === i && l.get("zeroColor") !== e && (r = l.get("zeroColor")),
                o && (a = o.get(i)) ? (r = a) : h && h.length > n && (r = h[n]),
                s.isArray(r) ? r[t % r.length] : r
              );
            },
            renderRegion: function (t, n) {
              var r,
                a,
                h,
                o,
                l,
                g,
                p,
                u,
                d,
                f,
                v = this.values[t],
                m = this.options,
                $ = this.xaxisOffset,
                x = [],
                y = this.range,
                C = this.stacked,
                _ = this.target,
                w = t * this.totalBarWidth,
                R = this.canvasHeightEf,
                b = this.yoffset;
              if (
                ((p = (v = s.isArray(v) ? v : [v]).length),
                (u = v[0]),
                (o = c(null, v)),
                (f = c($, v, !0)),
                o)
              )
                return m.get("nullColor")
                  ? ((h = n
                      ? m.get("nullColor")
                      : this.calcHighlightColor(m.get("nullColor"), m)),
                    (r = b > 0 ? b - 1 : b),
                    _.drawRect(w, r, this.barWidth - 1, 0, h, h))
                  : e;
              for (g = 0, l = b; g < p; g++) {
                if (((u = v[g]), C && u === $)) {
                  if (!f || d) continue;
                  d = !0;
                }
                (a = y > 0 ? i.floor(R * (i.abs(u - $) / y)) + 1 : 1),
                  u < $ || (u === $ && 0 === b)
                    ? ((r = l), (l += a))
                    : ((r = b - a), (b -= a)),
                  (h = this.calcColor(g, u, t)),
                  n && (h = this.calcHighlightColor(h, m)),
                  x.push(_.drawRect(w, r, this.barWidth - 1, a - 1, h, h));
              }
              return 1 === x.length ? x[0] : x;
            },
          })),
        (s.fn.sparkline.tristate = R =
          r(s.fn.sparkline._base, C, {
            type: "tristate",
            init: function (t, i, n, r, a) {
              var h = parseInt(n.get("barWidth"), 10),
                o = parseInt(n.get("barSpacing"), 10);
              R._super.init.call(this, t, i, n, r, a),
                (this.regionShapes = {}),
                (this.barWidth = h),
                (this.barSpacing = o),
                (this.totalBarWidth = h + o),
                (this.values = s.map(i, Number)),
                (this.width = r = i.length * h + (i.length - 1) * o),
                s.isArray(n.get("colorMap"))
                  ? ((this.colorMapByIndex = n.get("colorMap")),
                    (this.colorMapByValue = null))
                  : ((this.colorMapByIndex = null),
                    (this.colorMapByValue = n.get("colorMap")),
                    this.colorMapByValue &&
                      this.colorMapByValue.get === e &&
                      (this.colorMapByValue = new $(this.colorMapByValue))),
                this.initTarget();
            },
            getRegion: function (t, e, s) {
              return i.floor(e / this.totalBarWidth);
            },
            getCurrentRegionFields: function () {
              var t = this.currentRegion;
              return {
                isNull: this.values[t] === e,
                value: this.values[t],
                color: this.calcColor(this.values[t], t),
                offset: t,
              };
            },
            calcColor: function (t, i) {
              var e,
                s = this.values,
                n = this.options,
                r = this.colorMapByIndex,
                a = this.colorMapByValue;
              return a && (e = a.get(t))
                ? e
                : r && r.length > i
                ? r[i]
                : s[i] < 0
                ? n.get("negBarColor")
                : s[i] > 0
                ? n.get("posBarColor")
                : n.get("zeroBarColor");
            },
            renderRegion: function (t, e) {
              var s,
                n,
                r,
                a,
                h,
                o,
                l = this.values,
                g = this.options,
                p = this.target;
              if (
                ((s = p.pixelHeight),
                (r = i.round(s / 2)),
                (a = t * this.totalBarWidth),
                l[t] < 0
                  ? ((h = r), (n = r - 1))
                  : l[t] > 0
                  ? ((h = 0), (n = r - 1))
                  : ((h = r - 1), (n = 2)),
                null !== (o = this.calcColor(l[t], t)))
              )
                return (
                  e && (o = this.calcHighlightColor(o, g)),
                  p.drawRect(a, h, this.barWidth - 1, n - 1, o, o)
                );
            },
          })),
        (s.fn.sparkline.discrete = b =
          r(s.fn.sparkline._base, C, {
            type: "discrete",
            init: function (t, n, r, a, h) {
              b._super.init.call(this, t, n, r, a, h),
                (this.regionShapes = {}),
                (this.values = n = s.map(n, Number)),
                (this.min = i.min.apply(i, n)),
                (this.max = i.max.apply(i, n)),
                (this.range = this.max - this.min),
                (this.width = a =
                  "auto" === r.get("width") ? 2 * n.length : this.width),
                (this.interval = i.floor(a / n.length)),
                (this.itemWidth = a / n.length),
                r.get("chartRangeMin") !== e &&
                  (r.get("chartRangeClip") ||
                    r.get("chartRangeMin") < this.min) &&
                  (this.min = r.get("chartRangeMin")),
                r.get("chartRangeMax") !== e &&
                  (r.get("chartRangeClip") ||
                    r.get("chartRangeMax") > this.max) &&
                  (this.max = r.get("chartRangeMax")),
                this.initTarget(),
                this.target &&
                  (this.lineHeight =
                    "auto" === r.get("lineHeight")
                      ? i.round(0.3 * this.canvasHeight)
                      : r.get("lineHeight"));
            },
            getRegion: function (t, e, s) {
              return i.floor(e / this.itemWidth);
            },
            getCurrentRegionFields: function () {
              var t = this.currentRegion;
              return {
                isNull: this.values[t] === e,
                value: this.values[t],
                offset: t,
              };
            },
            renderRegion: function (t, e) {
              var s,
                n,
                r,
                a,
                o = this.values,
                l = this.options,
                g = this.min,
                p = this.max,
                u = this.range,
                c = this.interval,
                d = this.target,
                f = this.canvasHeight,
                v = this.lineHeight,
                m = f - v;
              return (
                (n = h(o[t], g, p)),
                (a = t * c),
                (s = i.round(m - m * ((n - g) / u))),
                (r =
                  l.get("thresholdColor") && n < l.get("thresholdValue")
                    ? l.get("thresholdColor")
                    : l.get("lineColor")),
                e && (r = this.calcHighlightColor(r, l)),
                d.drawLine(a, s, a, s + v, r)
              );
            },
          })),
        (s.fn.sparkline.bullet = S =
          r(s.fn.sparkline._base, {
            type: "bullet",
            init: function (t, s, n, r, a) {
              var h, o, l;
              S._super.init.call(this, t, s, n, r, a),
                (this.values = s = g(s)),
                ((l = s.slice())[0] = null === l[0] ? l[2] : l[0]),
                (l[1] = null === s[1] ? l[2] : l[1]),
                (h = i.min.apply(i, s)),
                (o = i.max.apply(i, s)),
                (h = n.get("base") === e ? (h < 0 ? h : 0) : n.get("base")),
                (this.min = h),
                (this.max = o),
                (this.range = o - h),
                (this.shapes = {}),
                (this.valueShapes = {}),
                (this.regiondata = {}),
                (this.width = r = "auto" === n.get("width") ? "4.0em" : r),
                (this.target = this.$el.simpledraw(r, a, n.get("composite"))),
                s.length || (this.disabled = !0),
                this.initTarget();
            },
            getRegion: function (t, i, s) {
              var n = this.target.getShapeAt(t, i, s);
              return n !== e && this.shapes[n] !== e ? this.shapes[n] : e;
            },
            getCurrentRegionFields: function () {
              var t = this.currentRegion;
              return {
                fieldkey: t.substr(0, 1),
                value: this.values[t.substr(1)],
                region: t,
              };
            },
            changeHighlight: function (t) {
              var i,
                e = this.currentRegion,
                s = this.valueShapes[e];
              switch ((delete this.shapes[s], e.substr(0, 1))) {
                case "r":
                  i = this.renderRange(e.substr(1), t);
                  break;
                case "p":
                  i = this.renderPerformance(t);
                  break;
                case "t":
                  i = this.renderTarget(t);
              }
              (this.valueShapes[e] = i.id),
                (this.shapes[i.id] = e),
                this.target.replaceWithShape(s, i);
            },
            renderRange: function (t, e) {
              var s = this.values[t],
                n = i.round(this.canvasWidth * ((s - this.min) / this.range)),
                r = this.options.get("rangeColors")[t - 2];
              return (
                e && (r = this.calcHighlightColor(r, this.options)),
                this.target.drawRect(0, 0, n - 1, this.canvasHeight - 1, r, r)
              );
            },
            renderPerformance: function (t) {
              var e = this.values[1],
                s = i.round(this.canvasWidth * ((e - this.min) / this.range)),
                n = this.options.get("performanceColor");
              return (
                t && (n = this.calcHighlightColor(n, this.options)),
                this.target.drawRect(
                  0,
                  i.round(0.3 * this.canvasHeight),
                  s - 1,
                  i.round(0.4 * this.canvasHeight) - 1,
                  n,
                  n
                )
              );
            },
            renderTarget: function (t) {
              var e = this.values[0],
                s = i.round(
                  this.canvasWidth * ((e - this.min) / this.range) -
                    this.options.get("targetWidth") / 2
                ),
                n = i.round(0.1 * this.canvasHeight),
                r = this.canvasHeight - 2 * n,
                a = this.options.get("targetColor");
              return (
                t && (a = this.calcHighlightColor(a, this.options)),
                this.target.drawRect(
                  s,
                  n,
                  this.options.get("targetWidth") - 1,
                  r - 1,
                  a,
                  a
                )
              );
            },
            render: function () {
              var t,
                i,
                e = this.values.length,
                s = this.target;
              if (S._super.render.call(this)) {
                for (t = 2; t < e; t++)
                  (i = this.renderRange(t).append()),
                    (this.shapes[i.id] = "r" + t),
                    (this.valueShapes["r" + t] = i.id);
                null !== this.values[1] &&
                  ((i = this.renderPerformance().append()),
                  (this.shapes[i.id] = "p1"),
                  (this.valueShapes.p1 = i.id)),
                  null !== this.values[0] &&
                    ((i = this.renderTarget().append()),
                    (this.shapes[i.id] = "t0"),
                    (this.valueShapes.t0 = i.id)),
                  s.render();
              }
            },
          })),
        (s.fn.sparkline.pie = k =
          r(s.fn.sparkline._base, {
            type: "pie",
            init: function (t, e, n, r, a) {
              var h,
                o = 0;
              if (
                (k._super.init.call(this, t, e, n, r, a),
                (this.shapes = {}),
                (this.valueShapes = {}),
                (this.values = e = s.map(e, Number)),
                "auto" === n.get("width") && (this.width = this.height),
                e.length > 0)
              )
                for (h = e.length; h--; ) o += e[h];
              (this.total = o),
                this.initTarget(),
                (this.radius = i.floor(
                  i.min(this.canvasWidth, this.canvasHeight) / 2
                ));
            },
            getRegion: function (t, i, s) {
              var n = this.target.getShapeAt(t, i, s);
              return n !== e && this.shapes[n] !== e ? this.shapes[n] : e;
            },
            getCurrentRegionFields: function () {
              var t = this.currentRegion;
              return {
                isNull: this.values[t] === e,
                value: this.values[t],
                percent: (this.values[t] / this.total) * 100,
                color:
                  this.options.get("sliceColors")[
                    t % this.options.get("sliceColors").length
                  ],
                offset: t,
              };
            },
            changeHighlight: function (t) {
              var i = this.currentRegion,
                e = this.renderSlice(i, t),
                s = this.valueShapes[i];
              delete this.shapes[s],
                this.target.replaceWithShape(s, e),
                (this.valueShapes[i] = e.id),
                (this.shapes[e.id] = i);
            },
            renderSlice: function (t, s) {
              var n,
                r,
                a,
                h,
                o,
                l = this.target,
                g = this.options,
                p = this.radius,
                u = g.get("borderWidth"),
                c = g.get("offset"),
                d = 2 * i.PI,
                f = this.values,
                v = this.total,
                m = c ? 2 * i.PI * (c / 360) : 0;
              for (a = 0, h = f.length; a < h; a++) {
                if (
                  ((n = m), (r = m), v > 0 && (r = m + d * (f[a] / v)), t === a)
                )
                  return (
                    (o = g.get("sliceColors")[a % g.get("sliceColors").length]),
                    s && (o = this.calcHighlightColor(o, g)),
                    l.drawPieSlice(p, p, p - u, n, r, e, o)
                  );
                m = r;
              }
            },
            render: function () {
              var t,
                s,
                n = this.target,
                r = this.values,
                a = this.options,
                h = this.radius,
                o = a.get("borderWidth");
              if (k._super.render.call(this)) {
                for (
                  o &&
                    n
                      .drawCircle(
                        h,
                        h,
                        i.floor(h - o / 2),
                        a.get("borderColor"),
                        e,
                        o
                      )
                      .append(),
                    s = r.length;
                  s--;

                )
                  r[s] &&
                    ((t = this.renderSlice(s).append()),
                    (this.valueShapes[s] = t.id),
                    (this.shapes[t.id] = s));
                n.render();
              }
            },
          })),
        (s.fn.sparkline.box = M =
          r(s.fn.sparkline._base, {
            type: "box",
            init: function (t, i, e, n, r) {
              M._super.init.call(this, t, i, e, n, r),
                (this.values = s.map(i, Number)),
                (this.width = "auto" === e.get("width") ? "4.0em" : n),
                this.initTarget(),
                this.values.length || (this.disabled = 1);
            },
            getRegion: function () {
              return 1;
            },
            getCurrentRegionFields: function () {
              var t = [
                { field: "lq", value: this.quartiles[0] },
                { field: "med", value: this.quartiles[1] },
                { field: "uq", value: this.quartiles[2] },
              ];
              return (
                this.loutlier !== e &&
                  t.push({ field: "lo", value: this.loutlier }),
                this.routlier !== e &&
                  t.push({ field: "ro", value: this.routlier }),
                this.lwhisker !== e &&
                  t.push({ field: "lw", value: this.lwhisker }),
                this.rwhisker !== e &&
                  t.push({ field: "rw", value: this.rwhisker }),
                t
              );
            },
            render: function () {
              var t,
                s,
                n,
                r,
                a,
                h,
                l,
                g,
                p,
                u,
                c,
                d = this.target,
                f = this.values,
                v = f.length,
                m = this.options,
                $ = this.canvasWidth,
                x = this.canvasHeight,
                y =
                  m.get("chartRangeMin") === e
                    ? i.min.apply(i, f)
                    : m.get("chartRangeMin"),
                C =
                  m.get("chartRangeMax") === e
                    ? i.max.apply(i, f)
                    : m.get("chartRangeMax"),
                _ = 0;
              if (M._super.render.call(this)) {
                if (m.get("raw"))
                  m.get("showOutliers") && f.length > 5
                    ? ((s = f[0]),
                      (t = f[1]),
                      (r = f[2]),
                      (a = f[3]),
                      (h = f[4]),
                      (l = f[5]),
                      (g = f[6]))
                    : ((t = f[0]),
                      (r = f[1]),
                      (a = f[2]),
                      (h = f[3]),
                      (l = f[4]));
                else if (
                  (f.sort(function (t, i) {
                    return t - i;
                  }),
                  (r = o(f, 1)),
                  (a = o(f, 2)),
                  (n = (h = o(f, 3)) - r),
                  m.get("showOutliers"))
                ) {
                  for (p = 0, t = l = e; p < v; p++)
                    t === e && f[p] > r - n * m.get("outlierIQR") && (t = f[p]),
                      f[p] < h + n * m.get("outlierIQR") && (l = f[p]);
                  (s = f[0]), (g = f[v - 1]);
                } else (t = f[0]), (l = f[v - 1]);
                (this.quartiles = [r, a, h]),
                  (this.lwhisker = t),
                  (this.rwhisker = l),
                  (this.loutlier = s),
                  (this.routlier = g),
                  (c = $ / (C - y + 1)),
                  m.get("showOutliers") &&
                    ((_ = i.ceil(m.get("spotRadius"))),
                    ($ -= 2 * i.ceil(m.get("spotRadius"))),
                    (c = $ / (C - y + 1)),
                    s < t &&
                      d
                        .drawCircle(
                          (s - y) * c + _,
                          x / 2,
                          m.get("spotRadius"),
                          m.get("outlierLineColor"),
                          m.get("outlierFillColor")
                        )
                        .append(),
                    g > l &&
                      d
                        .drawCircle(
                          (g - y) * c + _,
                          x / 2,
                          m.get("spotRadius"),
                          m.get("outlierLineColor"),
                          m.get("outlierFillColor")
                        )
                        .append()),
                  d
                    .drawRect(
                      i.round((r - y) * c + _),
                      i.round(0.1 * x),
                      i.round((h - r) * c),
                      i.round(0.8 * x),
                      m.get("boxLineColor"),
                      m.get("boxFillColor")
                    )
                    .append(),
                  d
                    .drawLine(
                      i.round((t - y) * c + _),
                      i.round(x / 2),
                      i.round((r - y) * c + _),
                      i.round(x / 2),
                      m.get("lineColor")
                    )
                    .append(),
                  d
                    .drawLine(
                      i.round((t - y) * c + _),
                      i.round(x / 4),
                      i.round((t - y) * c + _),
                      i.round(x - x / 4),
                      m.get("whiskerColor")
                    )
                    .append(),
                  d
                    .drawLine(
                      i.round((l - y) * c + _),
                      i.round(x / 2),
                      i.round((h - y) * c + _),
                      i.round(x / 2),
                      m.get("lineColor")
                    )
                    .append(),
                  d
                    .drawLine(
                      i.round((l - y) * c + _),
                      i.round(x / 4),
                      i.round((l - y) * c + _),
                      i.round(x - x / 4),
                      m.get("whiskerColor")
                    )
                    .append(),
                  d
                    .drawLine(
                      i.round((a - y) * c + _),
                      i.round(0.1 * x),
                      i.round((a - y) * c + _),
                      i.round(0.9 * x),
                      m.get("medianColor")
                    )
                    .append(),
                  m.get("target") &&
                    ((u = i.ceil(m.get("spotRadius"))),
                    d
                      .drawLine(
                        i.round((m.get("target") - y) * c + _),
                        i.round(x / 2 - u),
                        i.round((m.get("target") - y) * c + _),
                        i.round(x / 2 + u),
                        m.get("targetColor")
                      )
                      .append(),
                    d
                      .drawLine(
                        i.round((m.get("target") - y) * c + _ - u),
                        i.round(x / 2),
                        i.round((m.get("target") - y) * c + _ + u),
                        i.round(x / 2),
                        m.get("targetColor")
                      )
                      .append()),
                  d.render();
              }
            },
          })),
        (T = r({
          init: function (t, i, e, s) {
            (this.target = t), (this.id = i), (this.type = e), (this.args = s);
          },
          append: function () {
            return this.target.appendShape(this), this;
          },
        })),
        (q = r({
          _pxregex: /(\d+)(px)?\s*$/i,
          init: function (t, i, e) {
            t &&
              ((this.width = t),
              (this.height = i),
              (this.target = e),
              (this.lastShapeId = null),
              e[0] && (e = e[0]),
              s.data(e, "_jqs_vcanvas", this));
          },
          drawLine: function (t, i, e, s, n, r) {
            return this.drawShape(
              [
                [t, i],
                [e, s],
              ],
              n,
              r
            );
          },
          drawShape: function (t, i, e, s) {
            return this._genShape("Shape", [t, i, e, s]);
          },
          drawCircle: function (t, i, e, s, n, r) {
            return this._genShape("Circle", [t, i, e, s, n, r]);
          },
          drawPieSlice: function (t, i, e, s, n, r, a) {
            return this._genShape("PieSlice", [t, i, e, s, n, r, a]);
          },
          drawRect: function (t, i, e, s, n, r) {
            return this._genShape("Rect", [t, i, e, s, n, r]);
          },
          getElement: function () {
            return this.canvas;
          },
          getLastShapeId: function () {
            return this.lastShapeId;
          },
          reset: function () {
            alert("reset not implemented");
          },
          _insert: function (t, i) {
            s(i).html(t);
          },
          _calculatePixelDims: function (t, i, e) {
            var n;
            (n = this._pxregex.exec(i))
              ? (this.pixelHeight = n[1])
              : (this.pixelHeight = s(e).height()),
              (n = this._pxregex.exec(t))
                ? (this.pixelWidth = n[1])
                : (this.pixelWidth = s(e).width());
          },
          _genShape: function (t, i) {
            var e = A++;
            return i.unshift(e), new T(this, e, t, i);
          },
          appendShape: function (t) {
            alert("appendShape not implemented");
          },
          replaceWithShape: function (t, i) {
            alert("replaceWithShape not implemented");
          },
          insertAfterShape: function (t, i) {
            alert("insertAfterShape not implemented");
          },
          removeShapeId: function (t) {
            alert("removeShapeId not implemented");
          },
          getShapeAt: function (t, i, e) {
            alert("getShapeAt not implemented");
          },
          render: function () {
            alert("render not implemented");
          },
        })),
        (I = r(q, {
          init: function (i, n, r, a) {
            I._super.init.call(this, i, n, r),
              (this.canvas = t.createElement("canvas")),
              r[0] && (r = r[0]),
              s.data(r, "_jqs_vcanvas", this),
              s(this.canvas).css({
                display: "inline-block",
                width: i,
                height: n,
                verticalAlign: "top",
              }),
              this._insert(this.canvas, r),
              this._calculatePixelDims(i, n, this.canvas),
              (this.canvas.width = this.pixelWidth),
              (this.canvas.height = this.pixelHeight),
              (this.interact = a),
              (this.shapes = {}),
              (this.shapeseq = []),
              (this.currentTargetShapeId = e),
              s(this.canvas).css({
                width: this.pixelWidth,
                height: this.pixelHeight,
              });
          },
          _getContext: function (t, i, s) {
            var n = this.canvas.getContext("2d");
            return (
              t !== e && (n.strokeStyle = t),
              (n.lineWidth = s === e ? 1 : s),
              i !== e && (n.fillStyle = i),
              n
            );
          },
          reset: function () {
            this._getContext().clearRect(
              0,
              0,
              this.pixelWidth,
              this.pixelHeight
            ),
              (this.shapes = {}),
              (this.shapeseq = []),
              (this.currentTargetShapeId = e);
          },
          _drawShape: function (t, i, s, n, r) {
            var a,
              h,
              o = this._getContext(s, n, r);
            for (
              o.beginPath(),
                o.moveTo(i[0][0] + 0.5, i[0][1] + 0.5),
                a = 1,
                h = i.length;
              a < h;
              a++
            )
              o.lineTo(i[a][0] + 0.5, i[a][1] + 0.5);
            s !== e && o.stroke(),
              n !== e && o.fill(),
              this.targetX !== e &&
                this.targetY !== e &&
                o.isPointInPath(this.targetX, this.targetY) &&
                (this.currentTargetShapeId = t);
          },
          _drawCircle: function (t, s, n, r, a, h, o) {
            var l = this._getContext(a, h, o);
            l.beginPath(),
              l.arc(s, n, r, 0, 2 * i.PI, !1),
              this.targetX !== e &&
                this.targetY !== e &&
                l.isPointInPath(this.targetX, this.targetY) &&
                (this.currentTargetShapeId = t),
              a !== e && l.stroke(),
              h !== e && l.fill();
          },
          _drawPieSlice: function (t, i, s, n, r, a, h, o) {
            var l = this._getContext(h, o);
            l.beginPath(),
              l.moveTo(i, s),
              l.arc(i, s, n, r, a, !1),
              l.lineTo(i, s),
              l.closePath(),
              h !== e && l.stroke(),
              o && l.fill(),
              this.targetX !== e &&
                this.targetY !== e &&
                l.isPointInPath(this.targetX, this.targetY) &&
                (this.currentTargetShapeId = t);
          },
          _drawRect: function (t, i, e, s, n, r, a) {
            return this._drawShape(
              t,
              [
                [i, e],
                [i + s, e],
                [i + s, e + n],
                [i, e + n],
                [i, e],
              ],
              r,
              a
            );
          },
          appendShape: function (t) {
            return (
              (this.shapes[t.id] = t),
              this.shapeseq.push(t.id),
              (this.lastShapeId = t.id),
              t.id
            );
          },
          replaceWithShape: function (t, i) {
            var e,
              s = this.shapeseq;
            for (this.shapes[i.id] = i, e = s.length; e--; )
              s[e] == t && (s[e] = i.id);
            delete this.shapes[t];
          },
          replaceWithShapes: function (t, i) {
            var e,
              s,
              n,
              r = this.shapeseq,
              a = {};
            for (s = t.length; s--; ) a[t[s]] = !0;
            for (s = r.length; s--; )
              a[(e = r[s])] && (r.splice(s, 1), delete this.shapes[e], (n = s));
            for (s = i.length; s--; )
              r.splice(n, 0, i[s].id), (this.shapes[i[s].id] = i[s]);
          },
          insertAfterShape: function (t, i) {
            var e,
              s = this.shapeseq;
            for (e = s.length; e--; )
              if (s[e] === t) {
                s.splice(e + 1, 0, i.id), (this.shapes[i.id] = i);
                return;
              }
          },
          removeShapeId: function (t) {
            var i,
              e = this.shapeseq;
            for (i = e.length; i--; )
              if (e[i] === t) {
                e.splice(i, 1);
                break;
              }
            delete this.shapes[t];
          },
          getShapeAt: function (t, i, e) {
            return (
              (this.targetX = i),
              (this.targetY = e),
              this.render(),
              this.currentTargetShapeId
            );
          },
          render: function () {
            var t,
              i,
              e,
              s = this.shapeseq,
              n = this.shapes,
              r = s.length;
            for (
              this._getContext().clearRect(
                0,
                0,
                this.pixelWidth,
                this.pixelHeight
              ),
                e = 0;
              e < r;
              e++
            )
              this["_draw" + (i = n[(t = s[e])]).type].apply(this, i.args);
            this.interact || ((this.shapes = {}), (this.shapeseq = []));
          },
        })),
        (P = r(q, {
          init: function (i, e, n) {
            var r;
            P._super.init.call(this, i, e, n),
              n[0] && (n = n[0]),
              s.data(n, "_jqs_vcanvas", this),
              (this.canvas = t.createElement("span")),
              s(this.canvas).css({
                display: "inline-block",
                position: "relative",
                overflow: "hidden",
                width: i,
                height: e,
                margin: "0px",
                padding: "0px",
                verticalAlign: "top",
              }),
              this._insert(this.canvas, n),
              this._calculatePixelDims(i, e, this.canvas),
              (this.canvas.width = this.pixelWidth),
              (this.canvas.height = this.pixelHeight),
              (r =
                '<v:group coordorigin="0 0" coordsize="' +
                this.pixelWidth +
                " " +
                this.pixelHeight +
                '" style="position:absolute;top:0;left:0;width:' +
                this.pixelWidth +
                "px;height=" +
                this.pixelHeight +
                'px;"></v:group>'),
              this.canvas.insertAdjacentHTML("beforeEnd", r),
              (this.group = s(this.canvas).children()[0]),
              (this.rendered = !1),
              (this.prerender = "");
          },
          _drawShape: function (t, i, s, n, r) {
            var a,
              h,
              o,
              l,
              g,
              p,
              u,
              c = [];
            for (u = 0, p = i.length; u < p; u++)
              c[u] = "" + i[u][0] + "," + i[u][1];
            return (
              (a = c.splice(0, 1)),
              (r = r === e ? 1 : r),
              (h =
                s === e
                  ? ' stroked="false" '
                  : ' strokeWeight="' + r + 'px" strokeColor="' + s + '" '),
              (o =
                n === e
                  ? ' filled="false"'
                  : ' fillColor="' + n + '" filled="true" '),
              (l = c[0] === c[c.length - 1] ? "x " : ""),
              (g =
                '<v:shape coordorigin="0 0" coordsize="' +
                this.pixelWidth +
                " " +
                this.pixelHeight +
                '"  id="jqsshape' +
                t +
                '" ' +
                h +
                o +
                ' style="position:absolute;left:0px;top:0px;height:' +
                this.pixelHeight +
                "px;width:" +
                this.pixelWidth +
                'px;padding:0px;margin:0px;"  path="m ' +
                a +
                " l " +
                c.join(", ") +
                " " +
                l +
                'e"> </v:shape>')
            );
          },
          _drawCircle: function (t, i, s, n, r, a, h) {
            var o, l, g;
            return (
              (i -= n),
              (s -= n),
              (g =
                '<v:oval  id="jqsshape' +
                t +
                '" ' +
                (o =
                  r === e
                    ? ' stroked="false" '
                    : ' strokeWeight="' + h + 'px" strokeColor="' + r + '" ') +
                (l =
                  a === e
                    ? ' filled="false"'
                    : ' fillColor="' + a + '" filled="true" ') +
                ' style="position:absolute;top:' +
                s +
                "px; left:" +
                i +
                "px; width:" +
                2 * n +
                "px; height:" +
                2 * n +
                'px"></v:oval>')
            );
          },
          _drawPieSlice: function (t, s, n, r, a, h, o, l) {
            var g, p, u, c, d, f, v, m;
            if (a === h) return "";
            if (
              (h - a == 2 * i.PI && ((a = 0), (h = 2 * i.PI)),
              (p = s + i.round(i.cos(a) * r)),
              (u = n + i.round(i.sin(a) * r)),
              (c = s + i.round(i.cos(h) * r)),
              (d = n + i.round(i.sin(h) * r)),
              p === c && u === d)
            ) {
              if (h - a < i.PI) return "";
              (p = c = s + r), (u = d = n);
            }
            return p === c && u === d && h - a < i.PI
              ? ""
              : ((g = [s - r, n - r, s + r, n + r, p, u, c, d]),
                (f =
                  o === e
                    ? ' stroked="false" '
                    : ' strokeWeight="1px" strokeColor="' + o + '" '),
                (v =
                  l === e
                    ? ' filled="false"'
                    : ' fillColor="' + l + '" filled="true" '),
                (m =
                  '<v:shape coordorigin="0 0" coordsize="' +
                  this.pixelWidth +
                  " " +
                  this.pixelHeight +
                  '"  id="jqsshape' +
                  t +
                  '" ' +
                  f +
                  v +
                  ' style="position:absolute;left:0px;top:0px;height:' +
                  this.pixelHeight +
                  "px;width:" +
                  this.pixelWidth +
                  'px;padding:0px;margin:0px;"  path="m ' +
                  s +
                  "," +
                  n +
                  " wa " +
                  g.join(", ") +
                  ' x e"> </v:shape>'));
          },
          _drawRect: function (t, i, e, s, n, r, a) {
            return this._drawShape(
              t,
              [
                [i, e],
                [i, e + n],
                [i + s, e + n],
                [i + s, e],
                [i, e],
              ],
              r,
              a
            );
          },
          reset: function () {
            this.group.innerHTML = "";
          },
          appendShape: function (t) {
            var i = this["_draw" + t.type].apply(this, t.args);
            return (
              this.rendered
                ? this.group.insertAdjacentHTML("beforeEnd", i)
                : (this.prerender += i),
              (this.lastShapeId = t.id),
              t.id
            );
          },
          replaceWithShape: function (t, i) {
            var e = s("#jqsshape" + t),
              n = this["_draw" + i.type].apply(this, i.args);
            e[0].outerHTML = n;
          },
          replaceWithShapes: function (t, i) {
            var e,
              n = s("#jqsshape" + t[0]),
              r = "",
              a = i.length;
            for (e = 0; e < a; e++)
              r += this["_draw" + i[e].type].apply(this, i[e].args);
            for (e = 1, n[0].outerHTML = r; e < t.length; e++)
              s("#jqsshape" + t[e]).remove();
          },
          insertAfterShape: function (t, i) {
            var e = s("#jqsshape" + t),
              n = this["_draw" + i.type].apply(this, i.args);
            e[0].insertAdjacentHTML("afterEnd", n);
          },
          removeShapeId: function (t) {
            var i = s("#jqsshape" + t);
            this.group.removeChild(i[0]);
          },
          getShapeAt: function (t, i, e) {
            return t.id.substr(8);
          },
          render: function () {
            this.rendered ||
              ((this.group.innerHTML = this.prerender), (this.rendered = !0));
          },
        }));
    }),
      "function" == typeof define && define.amd
        ? define(["jquery"], s)
        : jQuery && !jQuery.fn.sparkline && s(jQuery);
  })(document, Math);
})(jQuery);
