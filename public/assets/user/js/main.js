"use strict";

function Slider(t, e) {
    return this.init(t, e)
}

function Sidebar(t) {
    return this.init(t)
}

function QuantityInput(t) {
    return this.init(t)
}

function Popup(t, e) {
    return this.init(t, e)
}

function ProductSingle(t) {
    return this.init(t)
}

function Calendar(t, e) {
    return this.init(t, e)
}
var cartUrl = window.routes.cart;
var checkoutUrl = window.routes.checkout;
var wishlistUrl = window.routes.wishlist;
var compareUrl = window.routes.compare;

var $ = jQuery.noConflict();
$.extend($.easing, {
    def: "easeOutQuad",
    swing: function (t, e, a, i, o) {
        return $.easing[$.easing.def](t, e, a, i, o)
    },
    easeOutQuad: function (t, e, a, i, o) {
        return -i * (e /= o) * (e - 2) + a
    },
    easeOutQuint: function (t, e, a, i, o) {
        return i * ((e = e / o - 1) * e * e * e * e + 1) + a
    }
}), window.Wolmart = {},
    function (t) {
        Wolmart.$window = t(window), Wolmart.$body = t(document.body), Wolmart.status = "", Wolmart.isIE = navigator.userAgent.indexOf("Trident") >= 0, Wolmart.isEdge = navigator.userAgent.indexOf("Edge") >= 0, Wolmart.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), Wolmart.call = function (t, e) {
            setTimeout(t, e)
        }, Wolmart.parseOptions = function (t) {
            return "string" == typeof t ? JSON.parse(t.replace(/'/g, '"').replace(";", "")) : {}
        }, Wolmart.parseTemplate = function (t, e) {
            return t.replace(/\{\{(\w+)\}\}/g, function () {
                return e[arguments[1]]
            })
        }, Wolmart.byId = function (t) {
            return document.getElementById(t)
        }, Wolmart.byTag = function (t, e) {
            return e ? e.getElementsByTagName(t) : document.getElementsByTagName(t)
        }, Wolmart.byClass = function (t, e) {
            return e ? e.getElementsByClassName(t) : document.getElementsByClassName(t)
        }, Wolmart.setCookie = function (t, e, a) {
            var i = new Date;
            i.setTime(i.getTime() + 24 * a * 60 * 60 * 1e3), document.cookie = t + "=" + e + ";expires=" + i.toUTCString() + ";path=/"
        }, Wolmart.getCookie = function (t) {
            for (var e = t + "=", a = document.cookie.split(";"), i = 0; i < a.length; ++i) {
                for (var o = a[i];
                    " " == o.charAt(0);) o = o.substring(1);
                if (0 == o.indexOf(e)) return o.substring(e.length, o.length)
            }
            return ""
        }, Wolmart.$ = function (e) {
            return e instanceof jQuery ? e : t(e)
        }, Wolmart.isOnScreen = function (t) {
            var e = window.pageXOffset,
                a = window.pageYOffset,
                i = t.getBoundingClientRect(),
                o = i.left + e,
                n = i.top + a;
            return n + i.height >= a && n <= a + window.innerHeight && o + i.width >= e && o <= e + window.innerWidth
        }, Wolmart.appear = function (e, a, i) {
            i && Object.keys(i).length && t.extend(intersectionObserverOptions, i);
            return new IntersectionObserver(function (e) {
                for (var i = 0; i < e.length; i++) {
                    var o = e[i];
                    if (o.intersectionRatio > 0)
                        if ("string" == typeof a) Function("return " + functionName)();
                        else {
                            a.call(t(o.target))
                        }
                }
            }, {
                rootMargin: "0px 0px 200px 0px",
                threshold: 0,
                alwaysObserve: !0
            }).observe(e), this
        }, Wolmart.requestTimeout = function (t, e) {
            function a(s) {
                o || (o = s);
                s - o >= e ? t() : n.val = i(a)
            }
            var i = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame;
            if (!i) return setTimeout(t, e);
            var o, n = new Object;
            return n.val = i(a), n
        }, Wolmart.requestInterval = function (t, e, a) {
            function i(l) {
                n || (n = s = l);
                !a || l - n < a ? l - s > e ? (t(), r.val = o(i), s = l) : r.val = o(i) : t()
            }
            var o = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame;
            if (!o) return a ? setInterval(t, e) : setTimeout(t, a);
            var n, s, r = new Object;
            return r.val = o(i), r
        }, Wolmart.deleteTimeout = function (t) {
            if (t) {
                var e = window.cancelAnimationFrame || window.webkitCancelAnimationFrame || window.mozCancelAnimationFrame;
                return e ? t.val ? e(t.val) : void 0 : clearTimeout(t)
            }
        }, Wolmart.setTab = function (e) {
            Wolmart.$body.on("click", ".tab .nav-link", function (e) {
                var a = t(this);
                if (e.preventDefault(), !a.hasClass("active")) {
                    var i = t(a.attr("href"));
                    i.siblings(".active").removeClass("in active"), i.addClass("active in"), a.parent().parent().find(".active").removeClass("active"), a.addClass("active")
                }
            }).on("click", ".link-to-tab", function (e) {
                var a = t(e.currentTarget).attr("href"),
                    i = t(a),
                    o = i.parent().siblings(".nav");
                e.preventDefault(), i.siblings().removeClass("active in"), i.addClass("active in"), o.find(".nav-link").removeClass("active"), o.find('[href="' + a + '"]').addClass("active"), t("html").animate({
                    scrollTop: i.offset().top - 150
                })
            })
        }, Wolmart.initCartAction = function (e) {
            Wolmart.$body.on("click", e, function (e) {
                t(".cart-dropdown").addClass("opened"), e.preventDefault()
            }).on("click", ".cart-offcanvas .cart-overlay", function (e) {
                t(".cart-dropdown").removeClass("opened"), e.preventDefault()
            }).on("click", ".cart-offcanvas .cart-header, .cart-close", function (e) {
                t(".cart-dropdown").removeClass("opened"), e.preventDefault()
            })
        }, Wolmart.initScrollTopButton = function () {
            var e = Wolmart.byId("scroll-top");
            e.addEventListener("click", function (e) {
                t("html, body").animate({
                    scrollTop: 0
                }, 600), e.preventDefault()
            });
            var a = function () {
                window.pageYOffset > 400 ? e.classList.add("show") : e.classList.remove("show")
            };
            Wolmart.call(a, 500), window.addEventListener("scroll", a, {
                passive: !0
            })
        }, Wolmart.stickyDefaultOptions = {
            minWidth: 992,
            maxWidth: 2e4,
            top: !1,
            hide: !1,
            scrollMode: !0
        }, Wolmart.stickyToolboxOptions = {
            minWidth: 0,
            maxWidth: 767,
            top: !1,
            scrollMode: !0
        }, Wolmart.stickyProductOptions = {
            minWidth: 0,
            maxWidth: 2e4,
            scrollMode: !0,
            top: !1,
            hide: !1
        }, Wolmart.windowResized = function (t) {
            return t == Wolmart.resizeTimeStamp ? Wolmart.resizeChanged : (Wolmart.resizeChanged = Wolmart.canvasWidth != window.innerWidth, Wolmart.canvasWidth = window.innerWidth, Wolmart.resizeTimeStamp = t, Wolmart.resizeChanged)
        }, Wolmart.stickyContent = function () {
            function e(t, e) {
                return this.init(t, e)
            }

            function a() {
                Wolmart.$window.trigger("sticky_refresh.wolmart", {
                    index: 0,
                    offsetTop: 0
                })
            }

            function i(t) {
                t && !Wolmart.windowResized(t.timeStamp) || (Wolmart.$window.trigger("sticky_refresh_size.wolmart"), a())
            }
            return e.prototype.init = function (e, a) {
                this.$el = e, this.options = t.extend(!0, {}, Wolmart.stickyDefaultOptions, a, Wolmart.parseOptions(e.attr("data-sticky-options"))), Wolmart.$window.on("sticky_refresh.wolmart", this.refresh.bind(this)).on("sticky_refresh_size.wolmart", this.refreshSize.bind(this))
            }, e.prototype.refreshSize = function (t) {
                var e = window.innerWidth >= this.options.minWidth && window.innerWidth <= this.options.maxWidth;
                this.scrollPos = window.pageYOffset, void 0 === this.top && (this.top = this.options.top), window.innerWidth >= 768 && this.getTop ? this.top = this.getTop() : this.options.top || (this.top = this.isWrap ? this.$el.parent().offset().top : this.$el.offset().top + this.$el[0].offsetHeight, this.$el.hasClass("has-dropdown") && (this.top += this.$el.find(".category-dropdown .dropdown-box")[0].offsetHeight)), this.isWrap ? e || this.unwrap() : e && this.wrap(), Wolmart.sticky_top_height = 0, t && setTimeout(this.refreshSize.bind(this), 50)
            }, e.prototype.wrap = function () {
                this.$el.wrap('<div class="sticky-content-wrapper"></div>'), this.isWrap = !0
            }, e.prototype.unwrap = function () {
                this.$el.unwrap(".sticky-content-wrapper"), this.isWrap = !1
            }, e.prototype.refresh = function (t, e) {
                var a = window.pageYOffset + e.offsetTop,
                    i = this.$el;
                this.refreshSize(), a > this.top && this.isWrap ? (this.height = i[0].offsetHeight, i.hasClass("fixed") || i.parent().css("height", this.height + "px"), i.hasClass("fix-top") ? (i.css("margin-top", e.offsetTop + "px"), this.zIndex = this.options.max_index - e.index) : i.hasClass("fix-bottom") ? (i.css("margin-bottom", e.offsetBottom + "px"), this.zIndex = this.options.max_index - e.index) : i.css({
                    transition: "opacity .5s",
                    "z-index": this.zIndex
                }), this.options.scrollMode ? (this.scrollPos >= a && i.hasClass("fix-top") || this.scrollPos <= a && i.hasClass("fix-bottom") ? (i.addClass("fixed"), this.onFixed && this.onFixed(), i.hasClass("product-sticky-content") && Wolmart.$body.addClass("addtocart-fixed")) : (i.removeClass("fixed").css("margin-top", "").css("margin-bottom", ""), this.onUnfixed && this.onUnfixed(), i.hasClass("product-sticky-content") && Wolmart.$body.removeClass("addtocart-fixed")), this.scrollPos = a) : (i.addClass("fixed"), this.onFixed && this.onFixed()), i.is(".fixed.fix-top") ? (e.offsetTop += i[0].offsetHeight, Wolmart.sticky_top_height = e.offsetTop) : i.is(".fixed.fix-bottom") && (e.offsetBottom += i[0].offsetHeight)) : (i.parent().css("height", ""), i.removeClass("fixed").css({
                    "margin-top": "",
                    "margin-bottom": "",
                    "z-index": ""
                }), this.onUnfixed && this.onUnfixed(), i.hasClass("product-sticky-content") && Wolmart.$body.removeClass("addtocart-fixed"))
            }, Wolmart.$window.on("wolmart_complete", function () {
                window.addEventListener("scroll", a, {
                    passive: !0
                }), Wolmart.$window.on("resize", i), setTimeout(function () {
                    i()
                }, 300)
            }),
                function (a, i) {
                    Wolmart.$(a).each(function () {
                        var a = t(this);
                        a.data("sticky-content") || a.data("sticky-content", new e(a, i))
                    })
                }
        }(), Wolmart.parallax = function (e, a) {
            t.fn.themePluginParallax && Wolmart.$(e).each(function () {
                var e = t(this);
                e.themePluginParallax(t.extend(!0, Wolmart.parseOptions(e.attr("data-parallax-options")), a))
            })
        }, Wolmart.skrollrParallax = function () {
            Wolmart.isMobile || "undefined" != typeof skrollr && Wolmart.$(".skrollable").length && skrollr.init({
                forceHeight: !1
            })
        }, Wolmart.initFloatingParallax = function () {
            t.fn.parallax && Wolmart.$(".floating-item").each(function (e) {
                var a = t(this);
                a.data("parallax") && (a.parallax("disable"), a.removeData("parallax"), a.removeData("options")), a.children().addClass("layer").attr("data-depth", a.attr("data-child-depth")), a.parallax(a.data("options"))
            })
        }, Wolmart.isotopeOptions = {
            itemsSelector: ".grid-item",
            layoutMode: "masonry",
            percentPosition: !0,
            masonry: {
                columnWidth: ".grid-space"
            }
        }, Wolmart.isotopes = function (e, a) {
            if ("function" == typeof imagesLoaded && t.fn.isotope) {
                var i = this;
                Wolmart.$(e).each(function () {
                    var e = t(this),
                        o = t.extend(!0, {}, i.isotopeOptions, Wolmart.parseOptions(e.attr("data-grid-options")), a || {});
                    Wolmart.lazyLoad(e), e.imagesLoaded(function () {
                        o.customInitHeight && e.height(e.height()), o.customDelay && Wolmart.call(function () {
                            e.isotope(o)
                        }, parseInt(o.customDelay)), e.isotope(o)
                    })
                })
            }
        }, Wolmart.initNavFilter = function (e) {
            t.fn.isotope && Wolmart.$(e).on("click", function (e) {
                var a = t(this),
                    i = a.attr("data-filter"),
                    o = a.parent().parent().attr("data-target");
                t(o ? o : ".grid").isotope({
                    filter: i
                }).isotope("on", "arrangeComplete", function () {
                    Wolmart.$window.trigger("appear.check")
                }), a.parent().siblings().children().removeClass("active"), a.addClass("active"), e.preventDefault()
            })
        }, Wolmart.ratingTooltip = function (t) {
            for (var e = Wolmart.byClass("ratings-full", t || document.body), a = e.length, i = function () {
                var t = parseInt(this.firstElementChild.style.width.slice(0, -1)) / 20;
                this.lastElementChild.innerText = t ? t.toFixed(2) : t
            }, o = 0; o < a; ++o) e[o].addEventListener("mouseover", i), e[o].addEventListener("touchstart", i, {
                passive: !0
            })
        }, Wolmart.setProgressBar = function (e) {
            Wolmart.$(e).each(function () {
                var e = t(this),
                    a = e.parent().find("mark")[0].innerHTML,
                    i = ""; - 1 != a.indexOf("%") ? i = a : -1 != a.indexOf("/") && (i = (i = parseInt(a.split("/")[0]) / parseInt(a.split("/")[1]) * 100).toFixed(2).toString() + "%"), e.find("span").css("width", i)
            })
        }, Wolmart.alert = function (e) {
            Wolmart.$body.on("click", e + " .btn-close", function (a) {
                a.preventDefault(), t(this).closest(e).fadeOut(function () {
                    t(this).remove()
                })
            })
        }, Wolmart.accordion = function (e) {
            Wolmart.$body.on("click", e, function (e) {
                var i = t(this),
                    o = i.closest(".card").find(i.attr("href")),
                    n = i.closest(".accordion");
                e.preventDefault(), 0 === n.find(".collapsing").length && 0 === n.find(".expanding").length && (o.hasClass("expanded") ? n.hasClass("radio-type") || a(o) : o.hasClass("collapsed") && (n.find(".expanded").length > 0 ? Wolmart.isIE ? a(n.find(".expanded"), function () {
                    a(o)
                }) : (a(n.find(".expanded")), a(o)) : a(o)))
            });
            var a = function (t, a) {
                var i = t.closest(".card").find(e);
                t.hasClass("expanded") ? (i.removeClass("collapse").addClass("expand"), t.addClass("collapsing").slideUp(300, function () {
                    t.removeClass("expanded collapsing").addClass("collapsed"), a && a()
                })) : t.hasClass("collapsed") && (i.removeClass("expand").addClass("collapse"), t.addClass("expanding").slideDown(300, function () {
                    t.removeClass("collapsed expanding").addClass("expanded"), a && a()
                }))
            }
        }, Wolmart.animationOptions = {
            name: "fadeIn",
            duration: "1.2s",
            delay: ".2s"
        }, Wolmart.appearAnimate = function (e) {
            Wolmart.$(e).each(function () {
                var e = this;
                Wolmart.appear(e, function () {
                    if (e.classList.contains("appear-animate")) {
                        var a = t.extend({}, Wolmart.animationOptions, Wolmart.parseOptions(e.getAttribute("data-animation-options")));
                        setTimeout(function () {
                            e.style["animation-duration"] = a.duration, e.classList.add(a.name), e.classList.add("appear-animation-visible")
                        }, a.delay ? 1e3 * Number(a.delay.slice(0, -1)) : 0)
                    }
                })
            })
        }, Wolmart.countDown = function (e) {
            t.fn.countdown && Wolmart.$(e).each(function () {
                var e = t(this),
                    a = e.data("until"),
                    i = e.data("compact"),
                    o = e.data("format") ? e.data("format") : "DHMS",
                    n = e.data("labels-short") ? ["Years", "Months", "Weeks", "Days", "Hours", "Mins", "Secs"] : ["Years", "Months", "Weeks", "Days", "Hours", "Minutes", "Seconds"],
                    s = e.data("labels-short") ? ["Year", "Month", "Week", "Day", "Hour", "Min", "Sec"] : ["Year", "Month", "Week", "Day", "Hour", "Minute", "Second"];
                if (e.data("relative")) l = a;
                else var r = a.split(", "),
                    l = new Date(r[0], r[1] - 1, r[2]);
                e.countdown({
                    until: l,
                    format: o,
                    padZeroes: !0,
                    compact: i,
                    compactLabels: [" y", " m", " w", " days, "],
                    timeSeparator: " : ",
                    labels: n,
                    labels1: s
                })
            })
        }, Wolmart.priceSlider = function (e, a) {
            "object" == typeof noUiSlider && Wolmart.$(e).each(function () {
                var e = this;
                noUiSlider.create(e, t.extend(!0, {
                    start: [0, 400],
                    connect: !0,
                    step: 1,
                    range: {
                        min: 0,
                        max: 635
                    }
                }, a)), e.noUiSlider.on("update", function (a, i) {
                    a = a.map(function (t) {
                        return "$" + parseInt(t)
                    });
                    t(e).parent().find(".filter-price-range").text(a.join(" - "))
                })
            })
        }, Wolmart.stickySidebarOptions = {
            autoInit: !0,
            minWidth: 991,
            containerSelector: ".sticky-sidebar-wrapper",
            autoFit: !0,
            activeClass: "sticky-sidebar-fixed",
            top: 0,
            bottom: 0
        }, Wolmart.stickySidebar = function (e) {
            if (t.fn.themeSticky) {
                var a = 0;
                !t(".sticky-sidebar > .filter-actions").length && t(window).width() >= 992 && t(".sticky-content.fix-top").each(function (e) {
                    if (!t(this).hasClass("sticky-toolbox")) {
                        var i = t(this).hasClass("fixed");
                        a += t(this).addClass("fixed").outerHeight(), i || t(this).removeClass("fixed")
                    }
                }), Wolmart.$(e).each(function () {
                    var e = t(this);
                    e.themeSticky(t.extend({}, Wolmart.stickySidebarOptions, {
                        padding: {
                            top: a
                        }
                    }, Wolmart.parseOptions(e.attr("data-sticky-options"))))
                });

                function i() {
                    Wolmart.$(e).trigger("recalc.pin"), t(window).trigger("appear.check")
                }
                setTimeout(i, 300), Wolmart.$window.on("click", ".tab .nav-link", function () {
                    setTimeout(i)
                })
            }
        }, Wolmart.zoomImageOptions = {
            responsive: !0,
            borderSize: 0,
            zoomType: "inner",
            onZoomIn: !0,
            magnify: 1.1
        }, Wolmart.zoomImageObjects = [], Wolmart.zoomImage = function (e) {
            t.fn.zoom && e && ("string" == typeof e ? t(e) : e).find("img").each(function () {
                var e = t(this);
                Wolmart.zoomImageOptions.target = e.parent(), Wolmart.zoomImageOptions.url = e.attr("data-zoom-image"), e.zoom(Wolmart.zoomImageOptions), Wolmart.zoomImageObjects.push(e)
            })
        }, Wolmart.zoomImageOnResize = function () {
            Wolmart.zoomImageObjects.forEach(function (e) {
                e.each(function () {
                    var e = t(this).data("zoom");
                    e && e.refresh()
                })
            })
        }, Wolmart.lazyLoad = function (t, e) {
            function a() {
                this.setAttribute("src", this.getAttribute("data-src")), this.addEventListener("load", function () {
                    this.style["padding-top"] = "", this.classList.remove("lazy-img")
                })
            }
            Wolmart.$(t).find(".lazy-img").each(function () {
                void 0 !== e && e ? a.call(this) : Wolmart.appear(this, a)
            })
        }, Wolmart.initPopup = function (e, a) {
            Wolmart.$body.hasClass("home=ass") && "true" !== Wolmart.getCookie("hideNewsletterPopup") && setTimeout(function () {
                Wolmart.popup({
                    items: {
                        src: "./assets/ajax/newsletter.php"
                    },
                    type: "ajax",
                    tLoading: "",
                    mainClass: "mfp-newsletter mfp-fadein-popup",
                    callbacks: {
                        beforeClose: function () {
                            t("#hide-newsletter-popup")[0].checked && Wolmart.setCookie("hideNewsletterPopup", !0, 7)
                        }
                    }
                })
            }, 7500), Wolmart.$body.on("click", ".btn-iframe", function (e) {
                e.preventDefault(), Wolmart.popup({
                    items: {
                        src: '<video src="' + t(e.currentTarget).attr("href") + '" autoplay loop controls>',
                        type: "inline"
                    },
                    mainClass: "mfp-video-popup"
                }, "video")
            }), Wolmart.$body.on("click", ".sign-in", function (e) {
                e.preventDefault(), Wolmart.popup({
                    items: {
                        src: t(e.currentTarget).attr("href")
                    }
                }, "login")
            }).on("click", ".register", function (e) {
                e.preventDefault(), Wolmart.popup({
                    items: {
                        src: t(e.currentTarget).attr("href")
                    },
                    callbacks: {
                        ajaxContentAdded: function () {
                            this.wrap.find('[href="#sign-up"]').click()
                        }
                    }
                }, "login")
            })
        }, Wolmart.initNotificationAlert = function () {
            Wolmart.$body.hasClass("has-notification") && setTimeout(function () {
                Wolmart.$body.addClass("show-notification")
            }, 5e3)
        }, Wolmart.countTo = function (e) {
            t.fn.countTo && Wolmart.$(e).each(function () {
                Wolmart.appear(this, function () {
                    var e = t(this);
                    setTimeout(function () {
                        e.countTo({
                            onComplete: function () {
                                e.addClass("complete")
                            }
                        })
                    }, 300)
                })
            })
        }, Wolmart.minipopupOption = {
            productClass: "",
            imageSrc: "",
            imageLink: "#",
            name: "",
            nameLink: "#",
            message: "",
            actionTemplate: "",
            isPurchased: !1,
            delay: 4e3,
            space: 20,
            template: '<div class="minipopup-box"><div class="product product-list-sm {{productClass}}"><figure class="product-media"><a href="{{imageLink}}"><img src="{{imageSrc}}" alt="Product" width="80" height="90" /></a></figure><div class="product-details"><h4 class="product-name"><a href="{{nameLink}}">{{name}}</a></h4>{{message}}</div></div><div class="product-action">{{actionTemplate}}</div></div>'
        }, Wolmart.Minipopup = function () {
            var e, a = 0,
                i = [],
                o = !1,
                n = [],
                s = !1,
                r = function () {
                    if (!o)
                        for (var t = 0; t < n.length; ++t)(n[t] -= 200) <= 0 && this.close(t--)
                };
            return {
                init: function () {
                    var a = document.createElement("div");
                    a.className = "minipopup-area", Wolmart.byClass("page-wrapper")[0].appendChild(a), e = t(a), this.close = this.close.bind(this), r = r.bind(this)
                },
                open: function (o, l) {
                    var c, d = this,
                        u = t.extend(!0, {}, Wolmart.minipopupOption, o);
                    c = t(Wolmart.parseTemplate(u.template, u)), d.space = u.space;
                    var p = c.appendTo(e).css("top", -a).find("img");
                    p.length && p.on("load", function () {
                        a += c[0].offsetHeight + d.space, c.addClass("show"), c.offset().top - window.pageYOffset < 0 && (d.close(), c.css("top", -a + c[0].offsetHeight + d.space)), c.on("mouseenter", function () {
                            d.pause()
                        }).on("mouseleave", function () {
                            d.resume()
                        }).on("touchstart", function (t) {
                            d.pause(), t.stopPropagation()
                        }).on("mousedown", function () {
                            t(this).addClass("focus")
                        }).on("mouseup", function () {
                            d.close(t(this).index())
                        }), Wolmart.$body.on("touchstart", function () {
                            d.resume()
                        }), i.push(c), n.length || (s = setInterval(r, 200)), n.push(u.delay), l && l(c)
                    })
                },
                close: function (t) {
                    var e = void 0 === t ? 0 : t,
                        o = i.splice(e, 1)[0];
                    n.splice(e, 1)[0];
                    var r = o[0].offsetHeight;
                    a -= r + this.space, o.removeClass("show"), setTimeout(function () {
                        o.remove()
                    }, 300), i.forEach(function (t, a) {
                        a >= e && t.hasClass("show") && t.stop(!0, !0).animate({
                            top: parseInt(t.css("top")) + r + 20
                        }, 600, "easeOutQuint")
                    }), i.length || clearTimeout(s)
                },
                pause: function () {
                    o = !0
                },
                resume: function () {
                    o = !1
                }
            }
        }(), Wolmart.headerToggleSearch = function (e) {
            var a = Wolmart.$(e);
            a.find(".form-control").on("focusin", function (t) {
                a.addClass("show")
            }).on("focusout", function (t) {
                a.removeClass("show")
            }), Wolmart.$body.on("click", ".sticky-footer .search-toggle", function (e) {
                t(this).parent().toggleClass("show"), e.preventDefault()
            })
        }, Wolmart.scrollTo = function (e, a) {
            var i = void 0 === a ? 0 : a;
            if ("number" == typeof e) n = e;
            else {
                var o = Wolmart.$(e);
                if (!o.length || "none" == o.css("display")) return;
                var n = o.offset().top,
                    s = t("#wp-toolbar");
                window.innerWidth > 600 && s.length && (n -= s.parent().outerHeight()), t(".sticky-content.fix-top.fixed").each(function () {
                    n -= this.offsetHeight
                })
            }
            t("html,body").stop().animate({
                scrollTop: n
            }, i)
        }
    }(jQuery),
    function (t) {
        var e = function (t) {
            t.preventDefault(), Wolmart.$body.addClass("mmenu-active")
        },
            a = function (t) {
                t.preventDefault(), Wolmart.$body.removeClass("mmenu-active")
            },
            i = {
                init: function () {
                    this.initMenu(), this.initCategoryMenu(), this.initMobileMenu(), this.initFilterMenu(), this.initCollapsibleWidget()
                },
                initMenu: function () {
                    t(".menu li").each(function () {
                        !this.lastElementChild || "UL" !== this.lastElementChild.tagName && !this.lastElementChild.classList.contains("megamenu") || t(this).parent().hasClass("megamenu") || (this.classList.add("has-submenu"), !this.lastElementChild.classList.contains("megamenu") && this.lastElementChild.classList.add("submenu"))
                    }), Wolmart.$window.on("resize", function () {
                        t(".main-nav megamenu").each(function () {
                            var e = t(this),
                                a = e.offset().left,
                                i = a + e.outerWidth() - (window.innerWidth - 20);
                            i > 0 && a > 20 && e.css("margin-left", -i)
                        })
                    })
                },
                initCategoryMenu: function () {
                    var e = t(".category-dropdown");
                    if (e.length) {
                        var a = e.find(".dropdown-box");
                        if (a.length) {
                            var i = t(".main").offset().top + a[0].offsetHeight;
                            (window.pageYOffset <= i || window.innerWidth < 992) && e.removeClass("show"), window.addEventListener("scroll", function () {
                                window.pageYOffset <= i && window.innerWidth >= 992 && e.removeClass("show")
                            }, {
                                passive: !0
                            }), t(".category-toggle").on("click", function (t) {
                                t.preventDefault()
                            }), e.on("mouseover", function (t) {
                                e.hasClass("menu-fixed") && window.pageYOffset > i && window.innerWidth >= 992 ? e.addClass("show") : !e.hasClass("menu-fixed") && window.innerWidth >= 992 && e.addClass("show")
                            }), e.on("mouseleave", function (t) {
                                e.hasClass("menu-fixed") && window.pageYOffset > i && window.innerWidth >= 992 ? e.removeClass("show") : !e.hasClass("menu-fixed") && window.innerWidth >= 992 && e.removeClass("show")
                            })
                        }
                        if (e.hasClass("with-sidebar")) {
                            var o = Wolmart.byClass("sidebar");
                            o.length && (e.find(".dropdown-box").css("width", o[0].offsetWidth - 20), Wolmart.$window.on("resize", function () {
                                e.find(".dropdown-box").css("width", o[0].offsetWidth - 20)
                            }))
                        }
                    }
                },
                initMobileMenu: function () {
                    t(".mobile-menu li, .toggle-menu li").each(function () {
                        if (this.lastElementChild && ("UL" === this.lastElementChild.tagName || this.lastElementChild.classList.contains("megamenu"))) {
                            var t = document.createElement("span");
                            t.className = "toggle-btn", this.firstElementChild.appendChild(t)
                        }
                    }), t(".mobile-menu-toggle").on("click", e), t(".mobile-menu-overlay").on("click", a), t(".mobile-menu-close").on("click", a), Wolmart.$window.on("resize", a)
                },
                initFilterMenu: function () {
                    t(".search-ul li").each(function () {
                        if (this.lastElementChild && "UL" === this.lastElementChild.tagName) {
                            var t = document.createElement("i");
                            t.className = "la la-angle-down", this.classList.add("with-ul"), this.firstElementChild.appendChild(t)
                        }
                    }), t(".with-ul > a i, .toggle-btn").on("click", function (e) {
                        t(this).parent().next().slideToggle(300).parent().toggleClass("show"), e.preventDefault()
                    })
                },
                initCollapsibleWidget: function () {
                    t(".widget-collapsible .widget-title").each(function () {
                        var t = document.createElement("span");
                        t.className = "toggle-btn", this.appendChild(t)
                    }), t(".widget-collapsible .widget-title").on("click", function (e) {
                        var a = t(this),
                            i = a.siblings(".widget-body");
                        a.hasClass("collapsed") || i.css("display", "block"), i.stop().slideToggle(300), a.toggleClass("collapsed"), setTimeout(function () {
                            t(".sticky-sidebar").trigger("recalc.pin")
                        }, 300)
                    })
                }
            };
        Wolmart.menu = i
    }(jQuery),
    function (t) {
        var e = function (t) {
            var e = this.getAttribute("class");
            if (e.match(/row|gutter\-\w\w|cols\-\d|cols\-\w\w-\d/g) && this.setAttribute("class", e.replace(/row|gutter\-\w\w|cols\-\d|cols\-\w\w-\d/g, "").replace(/\s+/, " ")), this.classList.contains("animation-slider"))
                for (var a = this.children, i = a.length, o = 0; o < i; ++o) a[o].setAttribute("data-index", o + 1)
        },
            a = function (t) {
                var e, a = this.firstElementChild.firstElementChild.children,
                    i = a.length;
                for (e = 0; e < i; ++e)
                    if (!a[e].classList.contains("active")) {
                        var o, n = Wolmart.byClass("appear-animate", a[e]);
                        for (o = n.length - 1; o >= 0; --o) n[o].classList.remove("appear-animate")
                    }
            },
            i = function (e) {
                t(window).trigger("appear.check");
                var a = t(e.currentTarget),
                    i = a.find(".owl-item.active video");
                a.find(".owl-item:not(.active) video").each(function () {
                    this.paused || a.trigger("play.owl.autoplay"), this.pause(), this.currentTime = 0
                }), i.length && (!0 === a.data("owl.carousel").options.autoplay && a.trigger("stop.owl.autoplay"), i.each(function () {
                    this.paused && this.play()
                }))
            },
            o = function (e) {
                var a = this;
                t(e.currentTarget).find(".owl-item.active .slide-animate").each(function () {
                    var e = t(this),
                        i = t.extend(!0, {}, Wolmart.animationOptions, Wolmart.parseOptions(e.data("animation-options"))),
                        o = i.duration,
                        n = i.delay,
                        s = i.name;
                    setTimeout(function () {
                        if (e.css("animation-duration", o), e.css("animation-delay", n), e.addClass(s), e.hasClass("maskLeft")) {
                            e.css("width", "fit-content");
                            var t = e.width();
                            e.css("width", 0).css("transition", "width " + (o || "0.75s") + " linear " + (n || "0s")), e.css("width", t)
                        }
                        o = o || "0.75s";
                        var i = Wolmart.requestTimeout(function () {
                            e.addClass("show-content")
                        }, n ? 1e3 * Number(n.slice(0, -1)) + 200 : 200);
                        a.timers.push(i)
                    }, 300)
                })
            },
            n = function (e) {
                t(e.currentTarget).find(".owl-item.active .slide-animate").each(function () {
                    var e = t(this);
                    e.addClass("show-content"), e.attr("style", "")
                })
            },
            s = function (e) {
                var a = t(e.currentTarget);
                this.translateFlag = 1, this.prev = this.next, a.find(".owl-item .slide-animate").each(function () {
                    var e = t(this),
                        a = t.extend(!0, {}, Wolmart.animationOptions, Wolmart.parseOptions(e.data("animation-options")));
                    e.removeClass(a.name)
                })
            },
            r = function (e) {
                var a = this,
                    i = t(e.currentTarget);
                if (1 == a.translateFlag) {
                    if (a.next = i.find(".owl-item").eq(e.item.index).children().attr("data-index"), i.find(".show-content").removeClass("show-content"), a.prev != a.next) {
                        if (i.find(".show-content").removeClass("show-content"), i.hasClass("animation-slider")) {
                            for (var o = 0; o < a.timers.length; o++) Wolmart.deleteTimeout(a.timers[o]);
                            a.timers = []
                        }
                        i.find(".owl-item.active .slide-animate").each(function () {
                            var e = t(this),
                                i = t.extend(!0, {}, Wolmart.animationOptions, Wolmart.parseOptions(e.data("animation-options"))),
                                o = i.duration,
                                n = i.delay,
                                s = i.name;
                            e.css("animation-duration", o), e.css("animation-delay", n), e.css("transition-property", "visibility, opacity"), e.css("transition-delay", n), e.css("transition-duration", o), e.addClass(s), o = o || "0.75s", e.addClass("show-content");
                            var r = Wolmart.requestTimeout(function () {
                                e.css("transition-property", ""), e.css("transition-delay", ""), e.css("transition-duration", ""), a.timers.splice(a.timers.indexOf(r), 1)
                            }, n ? 1e3 * Number(n.slice(0, -1)) + 500 * Number(o.slice(0, -1)) : 500 * Number(o.slice(0, -1)));
                            a.timers.push(r)
                        })
                    } else i.find(".owl-item").eq(e.item.index).find(".slide-animate").addClass("show-content");
                    a.translateFlag = 0
                }
            };
        Slider.defaults = {
            responsiveClass: !0,
            navText: ['<i class="w-icon-angle-left">', '<i class="w-icon-angle-right">'],
            checkVisible: !1,
            items: 1,
            smartSpeed: navigator.userAgent.indexOf("Edge") > -1 ? 200 : 700,
            autoplaySpeed: navigator.userAgent.indexOf("Edge") > -1 ? 200 : 1e3,
            autoplayTimeout: 1e4
        }, Slider.zoomImage = function () {
            Wolmart.zoomImage(this.$element)
        }, Slider.zoomImageRefresh = function () {
            this.$element.find("img").each(function () {
                var e = t(this);
                if (t.fn.zoom) {
                    var a = e.data("zoom");
                    void 0 !== a ? a.refresh() : (Wolmart.zoomImageOptions.zoomContainer = e.parent(), e.zoom(Wolmart.zoomImageOptions))
                }
            })
        }, Slider.presets = {
            "intro-slider": {
                animateIn: "fadeIn",
                animateOut: "fadeOut"
            },
            "product-single-carousel": {
                dots: !1,
                nav: !0,
                onInitialize: Slider.zoomImage,
                onRefreshed: Slider.zoomImageRefresh
            },
            "product-gallery-carousel": {
                dots: !1,
                nav: !0,
                margin: 30,
                items: 1,
                responsive: {
                    576: {
                        items: 2
                    }
                },
                onInitialized: Slider.zoomImage,
                onRefreshed: Slider.zoomImageRefresh
            }
        }, Slider.prototype.init = function (l, c) {
            this.timers = [], this.translateFlag = 0, this.prev = 1, this.next = 1, Wolmart.lazyLoad(l, !0);
            var d = l.attr("class").split(" "),
                u = t.extend(!0, {}, Slider.presets, Slider.defaults);
            d.forEach(function (e) {
                var a = Slider.presets[e];
                a && t.extend(!0, u, a)
            });
            if (l.find("video").each(function () {
                this.loop = !1
            }), t.extend(!0, u, Wolmart.parseOptions(l.attr("data-owl-options")), c), o = o.bind(this), s = s.bind(this), r = r.bind(this), l.on("initialize.owl.carousel", e).on("initialized.owl.carousel", a).on("translated.owl.carousel", i), l.hasClass("animation-slider") && l.on("initialized.owl.carousel", o).on("resized.owl.carousel", n).on("translate.owl.carousel", s).on("translated.owl.carousel", r), l.owlCarousel(u), u.dotsContainer) {
                var p = t(u.dotsContainer);
                p.find("a").on("click", function (e) {
                    e.preventDefault();
                    var a = t(this);
                    if (!a.hasClass("active")) {
                        var i = a.index();
                        p.parent().find(".owl-carousel").trigger("to.owl.carousel", [i]), a.addClass("active").siblings().removeClass("active")
                    }
                })
            }
        }, Wolmart.slider = function (e, a) {
            Wolmart.$(e).each(function () {
                var e = t(this);
                Wolmart.call(function () {
                    new Slider(e, a)
                })
            })
        }
    }(jQuery),
    function (t) {
        var e = function () {
            window.innerWidth < 992 && (this.$sidebar.find(".sidebar-content").removeAttr("style"), this.$sidebar.find(".sidebar-content").attr("style", ""), this.$sidebar.find(".toolbox").children(":not(:first-child)").removeAttr("style"))
        };
        Sidebar.prototype.init = function (a) {
            var i = this;
            return i.name = a, i.$sidebar = t("." + a), i.isNavigation = !1, i.$sidebar.length && (i.isNavigation = i.$sidebar.hasClass("sidebar-fixed") && i.$sidebar.parent().hasClass("toolbox-wrap"), i.isNavigation && (e = e.bind(this), Wolmart.$window.on("resize", e)), Wolmart.$window.on("resize", function () {
                Wolmart.$body.removeClass(a + "-active")
            }), i.$sidebar.find(".sidebar-toggle, .sidebar-toggle-btn").add("sidebar" === a ? ".left-sidebar-toggle" : "." + a + "-toggle").on("click", function (e) {
                i.toggle(), t(this).blur(), e.preventDefault()
            }), i.$sidebar.find(".sidebar-overlay, .sidebar-close").on("click", function (t) {
                Wolmart.$body.removeClass(a + "-active"), t.preventDefault()
            })), !1
        }, Sidebar.prototype.toggle = function () {
            var e = this;
            if (window.innerWidth >= 992 && e.$sidebar.hasClass("sidebar-fixed")) {
                var a = e.$sidebar.hasClass("closed");
                if (e.isNavigation && (a || e.$sidebar.find(".filter-clean").hide(), e.$sidebar.siblings(".toolbox").children(":not(:first-child)").fadeToggle("fast"), e.$sidebar.find(".sidebar-content").stop().animate({
                    height: "toggle",
                    "margin-bottom": a ? "toggle" : -6
                }, function () {
                    t(this).css("margin-bottom", ""), a && e.$sidebar.find(".filter-clean").fadeIn("fast")
                })), e.$sidebar.hasClass("shop-sidebar")) {
                    var i = t(".main-content .product-wrapper");
                    i.length && i.hasClass("product-lists") && i.toggleClass("row cols-xl-2", !a)
                }
            } else e.$sidebar.find(".sidebar-overlay .sidebar-close").css("margin-left", -(window.innerWidth - document.body.clientWidth)), Wolmart.$body.toggleClass(e.name + "-active").removeClass("closed");
            setTimeout(function () {
                t(window).trigger("appear.check")
            }, 400)
        }, Wolmart.sidebar = function (t) {
            return (new Sidebar).init(t)
        }
    }(jQuery),
    function (t) {
        var e = {
            init: function () {
                Wolmart.call(Wolmart.ratingTooltip, 500), Wolmart.call(Wolmart.setProgressBar(".progress-bar"), 500), this.initProductType("slideup"), this.initVariation(), this.initProductsScrollLoad(".scroll-load"), Wolmart.$body.on("mousedown", ".select-menu", function (e) {
                    var a = t(e.currentTarget),
                        i = t(e.target),
                        o = a.hasClass("opened");
                    t(".select-menu").removeClass("opened"), a.is(i.parent()) ? (!o && a.addClass("opened"), e.stopPropagation()) : (i.parent().toggleClass("active"), i.parent().hasClass("active") ? (t(".selected-items").children().length < 2 && t(".selected-items").show(), t('<a href="#" class="selected-item">' + i.text().split("(")[0] + '<i class="la la-close"></i></a>').insertBefore(".selected-items .filter-clean").hide().fadeIn().data("link", i.parent())) : t(".selected-items > .selected-item").filter(function (t, e) {
                        return e.innerText == i.text().split("(")[0]
                    }).fadeOut(function () {
                        t(this).remove(), t(".selected-items").children().length < 2 && t(".selected-items").hide()
                    }))
                }), t(".selected-items .filter-clean").on("click", function (e) {
                    var a = t(this);
                    a.siblings().each(function () {
                        var e = t(this).data("link");
                        e && e.removeClass("active")
                    }), a.parent().fadeOut(function () {
                        a.siblings().remove()
                    }), e.preventDefault()
                }), t(".filter-clean").on("click", function (e) {
                    t(".shop-sidebar .filter-items .active").removeClass("active"), e.preventDefault()
                }), Wolmart.$body.on("click", ".select-menu a", function (t) {
                    t.preventDefault()
                }), Wolmart.$body.on("click", ".selected-item i", function (e) {
                    t(e.currentTarget).parent().fadeOut(function () {
                        var e = t(this),
                            a = e.data("link");
                        a && a.toggleClass("active"), e.remove(), t(".select-items").children().length < 2 && t(".select-items").hide()
                    }), e.preventDefault()
                }), Wolmart.$body.on("mousedown", function (e) {
                    t(".select-menu").removeClass("opened")
                }), Wolmart.$body.on("click", ".filter-items a", function (e) {
                    var a = t(this).closest(".filter-items");
                    a.hasClass("search-ul") || a.parent().hasClass("select-menu") || (t(this).parent().toggleClass("active"), e.preventDefault())
                }), Wolmart.$body.on("click", ".product:not(.product-select) .btn-cart, .product-popup .btn-cart, .home .product-single .btn-cart", function (e) {
                    e.preventDefault();
                    var a = t(this),
                        i = a.closest(".product, .product-popup");
                    a.hasClass("disabled") ? alert("Please select some product options before adding this product to your cart.") : (a.toggleClass("added").addClass("load-more-overlay loading"), setTimeout(function () {
                        a.removeClass("load-more-overlay loading"), Wolmart.Minipopup.open({
                            productClass: " product-cart",
                            name: i.find(".product-name, .product-title").text(),
                            nameLink: i.find(".product-name > a, .product-title > a").attr("href"),
                            imageSrc: i.find(".product-media img, .product-image:first-child img").attr("src"),
                            imageLink: i.find(".product-name > a").attr("href"),
                            message: "<p>has been added to cart:</p>",
                            actionTemplate: '<a href="' + cartUrl + '" class="btn btn-rounded btn-sm">View Cart</a><a href="' + checkoutUrl + '" class="btn btn-dark btn-rounded btn-sm">Checkout</a>'
                        })
                    }, 500))
                }), Wolmart.$body.on("click", ".product:not(.product-single) .btn-wishlist", function (e) {
                    e.preventDefault();
                    var a = t(this);
                    a.toggleClass("added").addClass("load-more-overlay loading"), setTimeout(function () {
                        a.removeClass("load-more-overlay loading"), a.toggleClass("w-icon-heart").toggleClass("w-icon-heart-full")
                    }, 500)
                }),
                    function () {
                        var e = t(".product-popup");
                        e.length && Wolmart.$body.on("click", ".btn-quickview", function (a) {
                            a.preventDefault(), Wolmart.popup({
                                items: {
                                    src: e[0].outerHTML
                                },
                                callbacks: {
                                    open: function () {
                                        Wolmart.productSingle(t(".mfp-product .product-single")), Popup.defaults.callbacks.open()
                                    }
                                }
                            }, "quickview")
                        })
                    }(),
                    function () {
                        function e() {
                            s.find(".title").after('<p class="compare-count text-center text-light mb-0">(' + a + " Products)</p>"), s.find(".compare-count").length > 1 && s.find("p:last-child").remove()
                        }
                        var a, i, o, n = [],
                            s = t(".page-wrapper > .compare-popup");
                        s.length || document.body.classList.contains("docs") || (t(".page-wrapper").append('<div class="compare-popup">                    <div class="container">                        <div class="compare-title">                            <h4 class="title title-center">Compare Products</h4>                        </div>                        <ul class="compare-product-list list-style-none">                            <li></li><li></li><li></li><li></li>                        </ul>                        <a href="#" class="btn btn-clean">Clean All</a>                        <a href="' + compareUrl + '" class="btn btn-dark btn-rounded">Start Compare !</a>                    </div>                </div>                <div class="compare-popup-overlay">                </div>'), s = t(".page-wrapper > .compare-popup")), Wolmart.$body.on("click", ".product .btn-compare", function (o) {
                            var r = t(this);
                            i = !1, r.hasClass("added") && returne(), o.preventDefault(), r.toggleClass("added").addClass("load-more-overlay loading"), setTimeout(function () {
                                r.removeClass("load-more-overlay loading"), r.toggleClass("w-icon-compare").toggleClass("w-icon-check-solid"), r.attr("href", "' + compareUrl + '"), s.addClass("show")
                            }, 500);
                            var l = r.closest(".product").find("img").eq(0).attr("src");
                            n.length >= 4 && n.shift(), n.push(l), t(".compare-popup li").each(function (t) {
                                n[t] && (this.innerHTML = '<a href="#"><figure><img src="' + n[t] + '"/></figure></a>                                        <a href="#" class="btn btn-remove"><i class="w-icon-times-solid"></i></a>')
                            }), a = n.length, e()
                        }).on("click", ".compare-popup .btn-remove", function (i) {
                            i.preventDefault();
                            var o = t(i.currentTarget).closest("li"),
                                s = o.index(),
                                r = o.find("img").attr("src");
                            r && t(".page-wrapper .product img").each(function () {
                                if (this.getAttribute("src") == r) {
                                    var e = t(this).closest(".product").find(".btn-compare");
                                    e.length && (e.removeClass("added").attr("href", "#"), e.toggleClass("w-icon-check-solid").toggleClass("w-icon-compare"))
                                }
                            }), n.splice(s, 1), 3 == s && o.empty(), o.nextAll().each(function () {
                                t(this).prev().html(t(this).html())
                            }).last().empty(), a = n.length, e()
                        }).on("click", ".compare-popup .btn-clean", function (i) {
                            i.preventDefault(), o = !1, t(".page-wrapper .product img").each(function () {
                                var e = t(this),
                                    a = this.getAttribute("src");
                                n.forEach(function (t) {
                                    if (a == t) {
                                        var i = e.closest(".product").find(".btn-compare");
                                        i.length && (i.removeClass("added").attr("href", "#"), i.toggleClass("w-icon-check-solid").toggleClass("w-icon-compare"))
                                    }
                                })
                            }), n.splice(0, 4), a = n.length, t(this).parent().find(".compare-product-list li").empty(), e()
                        }), Wolmart.$body.on("click", ".compare-popup-overlay", function () {
                            s.removeClass("show")
                        })
                    }(), Wolmart.priceSlider(".filter-price-slider")
            },
            initProductType: function (t) { },
            initVariation: function (e) {
                t(".product:not(.product-single) .product-variations > a").on("click", function (e) {
                    var a = t(this),
                        i = a.closest(".product").find(".product-media img");
                    i.data("image-src") || i.data("image-src", i.attr("src")), a.toggleClass("active").siblings().removeClass("active"), a.hasClass("active") ? i.attr("src", a.data("src")) : (i.attr("src", i.data("image-src")), a.blur()), e.preventDefault()
                })
            },
            initProductsScrollLoad: function (e) {
                var a, i = Wolmart.$(e),
                    o = t(e).data("url");
                o || (o = "assets/ajax/products.html");
                var n = function (e) {
                    window.pageYOffset > a + i.outerHeight() - window.innerHeight - 150 && "loading" != i.data("load-state") && t.ajax({
                        url: o,
                        success: function (e) {
                            var a = t(e);
                            i.data("load-state", "loading"), i.next().hasClass("load-more-overlay") ? i.next().addClass("loading") : t('<div class="mt-4 mb-4 load-more-overlay loading"></div>').insertAfter(i), setTimeout(function () {
                                i.next().removeClass("loading"), i.append(a), setTimeout(function () {
                                    i.find(".product-wrap.fade:not(.in)").addClass("in")
                                }, 200), i.data("load-state", "loaded"), Wolmart.countDown(a.find(".product-countdown"))
                            }, 500);
                            var o = parseInt(i.data("load-count") ? i.data("load-count") : 0);
                            i.data("load-count", ++o), o > 2 && window.removeEventListener("scroll", n, {
                                passive: !0
                            })
                        },
                        failure: function () {
                            $this.text("Sorry something went wrong.")
                        }
                    })
                };
                i.length > 0 && (a = i.offset().top, window.addEventListener("scroll", n, {
                    passive: !0
                }))
            }
        };
        Wolmart.shop = e
    }(jQuery),
    function (t) {
        QuantityInput.min = 1, QuantityInput.max = 1e6, QuantityInput.value = 1, QuantityInput.prototype.init = function (t) {
            var e = this;
            e.$minus = !1, e.$plus = !1, e.$value = !1, e.value = !1, e.startIncrease = e.startIncrease.bind(e), e.startDecrease = e.startDecrease.bind(e), e.stop = e.stop.bind(e), e.min = parseInt(t.attr("min")), e.max = parseInt(t.attr("max")), e.min || t.attr("min", e.min = QuantityInput.min), e.max || t.attr("max", e.max = QuantityInput.max), e.$value = t.val(e.value = QuantityInput.value), e.$minus = t.parent().find(".quantity-minus").on("mousedown", function (t) {
                t.preventDefault(), e.startDecrease()
            }).on("touchstart", function (t) {
                t.cancelable && t.preventDefault(), e.startDecrease()
            }).on("mouseup", e.stop), e.$plus = t.parent().find(".quantity-plus").on("mousedown", function (t) {
                t.preventDefault(), e.startIncrease()
            }).on("touchstart", function (t) {
                t.cancelable && t.preventDefault(), e.startIncrease()
            }).on("mouseup", e.stop), Wolmart.$body.on("mouseup", e.stop).on("touchend", e.stop).on("touchcancel", e.stop)
        }, QuantityInput.prototype.startIncrease = function (t) {
            t && t.preventDefault();
            var e = this;
            e.value = e.$value.val(), e.value < e.max && e.$value.val(++e.value), e.increaseTimer = Wolmart.requestTimeout(function () {
                e.speed = 1, e.increaseTimer = Wolmart.requestInterval(function () {
                    e.$value.val(e.value = Math.min(e.value + Math.floor(e.speed *= 1.05), e.max))
                }, 50)
            }, 400)
        }, QuantityInput.prototype.startDecrease = function (t) {
            t && t.preventDefault();
            var e = this;
            e.value = e.$value.val(), e.value > e.min && e.$value.val(--e.value), e.decreaseTimer = Wolmart.requestTimeout(function () {
                e.speed = 1, e.decreaseTimer = Wolmart.requestInterval(function () {
                    e.$value.val(e.value = Math.max(e.value - Math.floor(e.speed *= 1.05), e.min))
                }, 50)
            }, 400)
        }, QuantityInput.prototype.stop = function (t) {
            Wolmart.deleteTimeout(this.increaseTimer), Wolmart.deleteTimeout(this.decreaseTimer)
        }, Wolmart.initQtyInput = function (e) {
            Wolmart.$(e).each(function () {
                var e = t(this);
                e.data("quantityInput") || e.data("quantityInput", new QuantityInput(e))
            })
        }
    }(jQuery),
    function (t) {
        Popup.defaults = {
            removalDelay: 300,
            callbacks: {
                open: function () {
                    t("html").css("overflow-y", "hidden"), t("body").css("overflow-x", "visible"), t(".mfp-wrap").css("overflow", "hidden auto"), t(".sticky-header.fixed").css("padding-right", window.innerWidth - document.body.clientWidth)
                },
                close: function () {
                    t("html").css("overflow-y", ""), t("body").css("overflow-x", "hidden"), t(".mfp-wrap").css("overflow", ""), t(".sticky-header.fixed").css("padding-right", "")
                }
            }
        }, Popup.presets = {
            quickview: {
                type: "inline",
                mainClass: "mfp-product mfp-fade",
                tLoading: "Loading..."
            },
            video: {
                type: "iframe",
                mainClass: "mfp-fade",
                preloader: !1,
                closeBtnInside: !1
            },
            login: {
                type: "ajax",
                mainClass: "mfp-login-popup mfp-fade ",
                tLoading: "",
                preloader: !1
            }
        }, Popup.prototype.init = function (e, a) {
            var i = t.magnificPopup.instance;
            i.isOpen && i.content && !i.content.hasClass("login-popup") ? (i.close(), setTimeout(function () {
                t.magnificPopup.open(t.extend(!0, {}, Popup.defaults, a ? Popup.presets[a] : {}, e))
            }, 500)) : t.magnificPopup.open(t.extend(!0, {}, Popup.defaults, a ? Popup.presets[a] : {}, e))
        }, Wolmart.popup = function (t, e) {
            return new Popup(t, e)
        }
    }(jQuery),
    function (t) {
        var e = {
            margin: 0,
            items: 4,
            dots: !1,
            nav: !0,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
        },
            a = function (t) {
                var e = t.$thumbsWrap.offset().top + t.$thumbsWrap[0].offsetHeight,
                    a = t.$thumbs.offset().top + t.thumbsHeight;
                a >= e + t.$productThumb[0].offsetHeight ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - t.$productThumb[0].offsetHeight), t.$thumbUp.removeClass("disabled")) : a > e ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - Math.ceil(a - e)), t.$thumbUp.removeClass("disabled"), t.$thumbDown.addClass("disabled")) : t.$thumbDown.addClass("disabled")
            },
            i = function (t) {
                var e = t.$thumbsWrap.offset().top,
                    a = t.$thumbs.offset().top;
                a <= e - t.$productThumb[0].offsetHeight ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) + t.$productThumb[0].offsetHeight), t.$thumbDown.removeClass("disabled")) : a < e ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - Math.ceil(a - e)), t.$thumbDown.removeClass("disabled"), t.$thumbUp.addClass("disabled")) : t.$thumbUp.addClass("disabled")
            },
            o = function (a) {
                a.thumbsIsVertical ? (a.$thumbs.hasClass("owl-carousel") && (a.$thumbs.data("owl.carousel").destroy(), a.$thumbs.removeClass("owl-carousel")), a.thumbsHeight = a.$productThumb[0].offsetHeight * a.thumbsCount + parseInt(a.$productThumb.css("margin-bottom")) * (a.thumbsCount - 1), a.$thumbUp.addClass("disabled"), a.$thumbDown.toggleClass("disabled", a.thumbsHeight <= a.$thumbsWrap[0].offsetHeight)) : (a.$thumbs.removeAttr("style"), a.$thumbs.hasClass("owl-carousel") || a.$thumbs.addClass("owl-carousel").attr("class", a.$thumbs.attr("class").replace(/row|gutter\-\w\w|cols\-\d|cols\-\w\w-\d/g, "").replace(/\s+/, " ")).owlCarousel(t.extend(!0, a.isQuickView ? {
                    onInitialized: n,
                    onResized: n
                } : {}, e)))
            },
            n = function () {
                this.$wrapper.find(".product-details").css("height", window.innerWidth > 767 ? this.$wrapper.find(".product-gallery")[0].clientHeight : "")
            },
            s = function (e) {
                var a = t(this);
                a.hasClass("added") || (e.preventDefault(), a.addClass("load-more-overlay loading"), setTimeout(function () {
                    a.removeClass("load-more-overlay loading").toggleClass("w-icon-heart").toggleClass("w-icon-heart-full").addClass("added").attr("href", "' + wishlistUrl + '")
                }, 500))
            };
        ProductSingle.prototype.init = function (e) {
            var r = this,
                l = e.find(".product-single-carousel");
            r.$wrapper = e, r.isQuickView = !!e.closest(".mfp-content").length, r._isPgVertical = !1, r.isQuickView && (n = n.bind(this), Wolmart.ratingTooltip()), l.on("initialized.owl.carousel", function (e) {
                document.body.classList.contains("home") || (r.isQuickView || l.append('<a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>'), l.parent().hasClass("product-gallery-video") && (r.isQuickView || l.append('<a href="#" class="product-gallery-btn product-degree-viewer" title="Product 360 Degree Gallery"><i class="w-icon-rotate-3d"></i></a>'), r.isQuickView || l.append('<a href="#" class="product-gallery-btn product-video-viewer" title="Product Video Thumbnail"><i class="w-icon-movie"></i></a>'))),
                    function (e) {
                        e.$thumbs = e.$wrapper.find(".product-thumbs"), e.$thumbsWrap = e.$thumbs.parent(), e.$thumbUp = e.$thumbsWrap.find(".thumb-up"), e.$thumbDown = e.$thumbsWrap.find(".thumb-down"), e.$thumbsDots = e.$thumbs.children(), e.thumbsCount = e.$thumbsDots.length, e.$productThumb = e.$thumbsDots.eq(0), e._isPgVertical = e.$thumbsWrap.parent().hasClass("product-gallery-vertical"), e.thumbsIsVertical = e._isPgVertical && window.innerWidth >= 992, e.$thumbDown.on("click", function (t) {
                            e.thumbsIsVertical && a(e)
                        }), e.$thumbUp.on("click", function (t) {
                            e.thumbsIsVertical && i(e)
                        }), e.$thumbsDots.on("click", function (a) {
                            var i = t(this),
                                o = (i.parent().filter(e.$thumbs).length ? i : i.parent()).index(),
                                n = e.$wrapper.find(".product-single-carousel").data("owl.carousel");
                            n && n.to(o)
                        }), o(e), Wolmart.$window.on("resize", function () {
                            e.thumbsIsVertical = e._isPgVertical && window.innerWidth >= 992, o(e)
                        })
                    }(r)
            }).on("translate.owl.carousel", function (e) {
                var a = (e.item.index - t(e.currentTarget).find(".cloned").length / 2 + e.item.count) % e.item.count;
                r.setThumbsActive(a)
            }), r.$wrapper.on("click", ".btn-wishlist", s), "complete" === Wolmart.status && (Wolmart.slider(l), Wolmart.initQtyInput(e.find(".quantity"))), r.$wrapper.find(".product-thumbs-sticky").length && (r.isStickyScrolling = !1, r.$wrapper.on("click", ".product-thumb:not(.active)", r.clickStickyThumbnail.bind(this)), window.addEventListener("scroll", r.scrollStickyThumbnail.bind(this), {
                passive: !0
            })),
                function (e) {
                    e.$selects = e.$wrapper.find(".product-variations select"), e.$items = e.$wrapper.find(".product-variations"), e.$priceWrap = e.$wrapper.find(".product-variation-price"), e.$clean = e.$wrapper.find(".product-variation-clean"), e.$btnCart = e.$wrapper.find(".btn-cart"), e.variationCheck(), e.$selects.on("change", function (t) {
                        e.variationCheck()
                    }), e.$items.children("a").on("click", function (a) {
                        t(this).toggleClass("active").siblings().removeClass("active"), a.preventDefault(), e.variationCheck(), e.$items.parent(".product-image-swatch") && e.swatchImage()
                    }), e.$clean.on("click", function (t) {
                        t.preventDefault(), e.variationClean(!0)
                    })
                }(this)
        }, ProductSingle.prototype.setThumbsActive = function (t) {
            var e = this,
                a = e.$thumbsDots.eq(t);
            if (e.$thumbsDots.filter(".active").removeClass("active"), a.addClass("active"), e.thumbsIsVertical) {
                var i = parseInt(e.$thumbs.css("top")) + t * e.thumbsHeight;
                i < 0 ? e.$thumbs.css("top", parseInt(e.$thumbs.css("top")) - i) : (i = e.$thumbs.offset().top + e.$thumbs[0].offsetHeight - a.offset().top - a[0].offsetHeight) < 0 && e.$thumbs.css("top", parseInt(e.$thumbs.css("top")) + i)
            } else Wolmart.requestTimeout(function () {
                e.$thumbs.data("owl.carousel") && e.$thumbs.data("owl.carousel").to(t)
            }, 100)
        }, ProductSingle.prototype.variationCheck = function () {
            var e = !0;
            this.$selects.each(function () {
                return this.value || (e = !1)
            }), this.$items.each(function () {
                var a = t(this);
                if (a.children("a:not(.size-guide)").length) return a.children(".active").length || (e = !1)
            }), e ? this.variationMatch() : this.variationClean()
        }, ProductSingle.prototype.variationMatch = function () {
            this.$priceWrap.find("span").text("$" + (Math.round(50 * Math.random()) + 200) + ".00"), this.$priceWrap.slideDown(), this.$clean.slideDown(), this.$btnCart.removeClass("disabled")
        }, ProductSingle.prototype.variationClean = function (t) {
            t && this.$selects.val(""), t && this.$items.children(".active").removeClass("active"), this.$priceWrap.slideUp(), this.$clean.css("display", "none"), this.$btnCart.addClass("disabled")
        }, ProductSingle.prototype.clickStickyThumbnail = function (e) {
            var a = this,
                i = t(e.currentTarget),
                o = (i.parent().children(".active").index(), i.index() + 1);
            i.addClass("active").siblings(".active").removeClass("active"), this.isStickyScrolling = !0;
            var n = i.closest(".product-thumbs-sticky").find(".product-image-wrapper > :nth-child(" + o + ")");
            n.length && (n = n.offset().top + 10, Wolmart.scrollTo(n, 500)), setTimeout(function () {
                a.isStickyScrolling = !1
            }, 300)
        }, ProductSingle.prototype.scrollStickyThumbnail = function () {
            var e = this;
            this.isStickyScrolling || e.$wrapper.find(".product-image-wrapper .product-image").each(function () {
                if (Wolmart.isOnScreen(this)) return e.$wrapper.find(".product-thumbs > :nth-child(" + (t(this).index() + 1) + ")").addClass("active").siblings().removeClass("active"), !1
            })
        }, ProductSingle.prototype.swatchImage = function () {
            var t = this.$items.find(".active img").attr("src"),
                e = this.$wrapper.find(".owl-item:first-child .product-image img"),
                a = this.$wrapper.find(".owl-item:first-child .product-thumb img");
            e.attr("src", t), a.attr("src", t)
        }, Wolmart.productSingle = function (e) {
            return Wolmart.$(e).each(function () {
                var e = t(this);
                e.is("body > *") || e.data("product-single", new ProductSingle(e))
            }), null
        }
    }(jQuery),
    function (t) {
        function e(e) {
            e.preventDefault();
            var a, i, o = t(e.currentTarget),
                n = o.closest(".product-single");
            if ((a = o.closest(".review-image").length ? o.closest(".review-image").find("img") : n.find(".product-single-carousel").length ? n.find(".product-single-carousel .owl-item:not(.cloned) img:first-child") : n.find(".product-gallery-carousel").length ? n.find(".product-gallery-carousel .owl-item:not(.cloned) img") : n.find(".product-image img:first-child")).length) {
                i = a.map(function () {
                    var e = t(this);
                    return {
                        src: e.attr("data-zoom-image"),
                        w: 800,
                        h: 900,
                        title: e.attr("alt")
                    }
                }).get();
                var s = n.find(".product-single-carousel, .product-gallery-carousel").data("owl.carousel"),
                    r = s ? (s.current() - s.clones().length / 2 + i.length) % i.length : n.find(".product-gallery > *").index();
                if ("undefined" != typeof PhotoSwipe) {
                    var l = t(".pswp")[0],
                        c = new PhotoSwipe(l, PhotoSwipeUI_Default, i, {
                            index: r,
                            closeOnScroll: !1
                        });
                    c.init(), Wolmart.photoSwipe = c
                }
            }
        }

        function a(t) {
            t.preventDefault(), Wolmart.popup({
                items: {
                    src: '<video src="assets/video/memory-of-a-woman.mp4" autoplay loop controls>',
                    type: "inline"
                },
                mainClass: "mfp-video-popup"
            }, "video")
        }

        function i(e) {
            var a = t(this);
            a.addClass("active").siblings().removeClass("active"), a.parent().addClass("selected"), a.closest(".rating-form").find("select").val(a.text()), e.preventDefault()
        }

        function o(e) {
            var a, i = t(this),
                o = t(".main-content > .alert, .container > .alert");
            if (i.hasClass("disabled")) alert("Please select some product options before adding this product to your cart.");
            else {
                if (o.length) o.fadeOut(function () {
                    o.fadeIn()
                });
                else {
                    var n = '<div class="alert alert-success alert-cart-product mb-2">                            <a href="' + cartUrl + '" class="btn btn-success btn-rounded">View Cart</a>                            <p class="mb-0 ls-normal">“' + (a = i.closest(".product-single").find(".product-title").text()) + '” has been added to your cart.</p>                            <a href="#" class="btn btn-link btn-close"><i class="close-icon"></i></a>                            </div>';
                    i.closest(".product-single").before(n)
                }
                t(".product-sticky-content").trigger("recalc.pin")
            }
        }
        Wolmart.initProductSinglePage = function () {
            Wolmart.zoomImage(".product-gallery .product-image"),
                function (e) {
                    function a() {
                        i.hasClass("fix-top") && window.innerWidth > 767 && i.removeClass("fix-top").addClass("fix-bottom"), i.hasClass("fix-bottom") && window.innerWidth > 767 || (i.hasClass("fix-bottom") && window.innerWidth < 768 && i.removeClass("fix-bottom").addClass("fix-top"), i.hasClass("fix-top") && window.innerWidth)
                    }
                    var i = t(e),
                        o = i.closest(".product-single"),
                        n = '<div class="product product-list-sm mr-auto">                                        <figure class="product-media">                                        <img src="' + o.find(".product-image img").eq(0).attr("src") + '" alt="Product" width="85" height="85" />                                        </figure>                                        <div class="product-details pt-0 pl-2 pr-2">                                        <h4 class="product-name font-weight-normal mb-1">' + o.find(".product-details .product-title").text() + '</h4>                                        <div class="product-price mb-0">                                        <ins class="new-price">' + o.find(".new-price").text() + '</ins><del class="old-price">' + o.find(".old-price").text() + "</del></div>                                        </div></div>";
                    i.find(".product-qty-form").before(n), window.addEventListener("resize", a, {
                        passive: !0
                    }), a()
                }(".product-sticky-content"), document.body.classList.contains("home") || Wolmart.$body.on("click", ".product-image-full", e).on("click", ".review-image img", e).on("click", ".product-video-viewer", a).on("click", ".product-degree-viewer", function (e) {
                    e.preventDefault(e), t.fn.ThreeSixty && function (t) {
                        t.preventDefault(), Wolmart.popup({
                            type: "inline",
                            mainClass: "product-popupbox wm-fade product-360-popup",
                            preloader: !1,
                            items: {
                                src: '<div class="product-gallery-degree">\t\t\t\t\t\t<div class="w-loading"><i></i></div>\t\t\t\t\t\t<ul class="product-degree-images"></ul>\t\t\t\t\t</div>'
                            },
                            callbacks: {
                                open: function () {
                                    this.container.find(".product-gallery-degree").ThreeSixty({
                                        imagePath: "assets/images/products/video/",
                                        filePrefix: "360-",
                                        ext: ".jpg",
                                        totalFrames: 18,
                                        endFrame: 18,
                                        currentFrame: 1,
                                        imgList: this.container.find(".product-degree-images"),
                                        progress: ".w-loading",
                                        height: 500,
                                        width: 830,
                                        navigation: !0
                                    })
                                },
                                beforeClose: function () {
                                    this.container.empty()
                                }
                            }
                        })
                    }(e)
                }).on("click", ".rating-form .rating-stars > a", i).on("click", ".product-single:not(.product-popup) .btn-cart", o)
        }
    }(jQuery),
    function (t) {
        var e = function (t) {
            var e = this.settings.months[t.getMonth()];
            e += this.settings.displayYear ? " " + t.getFullYear() : "", this.element.find(".calendar-title").html(e)
        };
        Calendar.defaultOptions = {
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            days: ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"],
            displayYear: !0,
            fixedStartDay: !0,
            dayNumber: 0,
            dayExcerpt: 3
        }, Calendar.prototype.init = function (a, i) {
            this.element = a, this.settings = t.extend({}, !0, Calendar.defaultOptions, Wolmart.parseOptions(a.attr("data-calendar-options")), i), this.today = new Date, e = e.bind(this);
            var o = t('<div class="calendar"></div>'),
                n = t('<div class="calendar-header"><a href="#" class="btn-calendar btn-calendar-prev"><i class="la la-angle-left"></i></a><span class="calendar-title"></span><a href="#" class="btn-calendar btn-calendar-next"><i class="la la-angle-right"></i></a></div>');
            o.append(n), a.append(o), e(this.today), this.render(this.today, o), this.bindEvents()
        }, Calendar.prototype.render = function (e, a) {
            a.find("table") && a.find("table").remove();
            var i = t("<table></table>"),
                o = t("<thead></thead>"),
                n = t("<tbody></tbody"),
                s = e.getFullYear(),
                r = e.getMonth(),
                l = new Date(s, r, 1),
                c = new Date(s, r + 1, 0),
                d = l.getDay();
            if (this.settings.fixedStartDay) {
                for (d = this.settings.dayNumber; l.getDay() != d;) l.setDate(l.getDate() - 1);
                for (; c.getDay() != (d + 7) % 7;) c.setDate(c.getDate() + 1)
            }
            for (h = d; h < d + 7; h++) {
                var u = t("<th>" + this.settings.days[h % 7].substring(0, this.settings.dayExcerpt) + "</th>");
                h % 7 == 0 && u.addClass("holiday"), o.append(u)
            }
            for (var p = l; p < c; p.setDate(p.getDate())) {
                for (var m = t("<tr></tr>"), h = 0; h < 7; h++) {
                    var f = t('<td><span class="day" data-date="' + p.toISOString() + '">' + p.getDate() + "</span></td>");
                    p.toDateString() == (new Date).toDateString() && f.find(".day").addClass("today"), p.getMonth() != e.getMonth() && f.find(".day").addClass("disabled"), m.append(f), p.setDate(p.getDate() + 1)
                }
                n.append(m)
            }
            i.append(o), i.append(n), a.append(i)
        }, Calendar.prototype.changeMonth = function (a) {
            this.today.setMonth(this.today.getMonth() + a, 1), this.render(this.today, t(this.element).find(".calendar")), e(this.today)
        }, Calendar.prototype.bindEvents = function () {
            var e = this;
            t(e.element).find(".btn-calendar-prev").on("click", function (t) {
                e.changeMonth(-1), t.preventDefault()
            }), t(e.element).find(".btn-calendar-next").on("click", function (t) {
                e.changeMonth(1), t.preventDefault()
            })
        }, Wolmart.calendar = function (e, a) {
            Wolmart.$(e).each(function () {
                var e = t(this);
                Wolmart.call(function () {
                    new Calendar(e, a)
                })
            })
        }, Wolmart.initVendor = function (e) {
            var a = t(e),
                i = a.closest(".page-content").find(".toolbox .vendor-search-toggle"),
                o = a.find(".store-phone");
            i.on("click", function (t) {
                var e = i.closest(".vendor-toolbox").next(".vendor-search-wrapper");
                e.hasClass("open") ? e.removeClass("open").slideUp() : e.addClass("open").slideDown(), t.preventDefault()
            }), o.on("click", function () {
                alert("Always open these types of links in the associated app")
            })
        }, Wolmart.slideContent = function (e) {
            var a = t(e),
                i = a.next();
            a.on("click", function (t) {
                t.preventDefault(), i.hasClass("open") ? (i.removeClass("open").slideUp(), a.find(".custom-checkbox").removeClass("checked")) : (i.addClass("open").slideDown(), a.find(".custom-checkbox").addClass("checked"))
            })
        }, Wolmart.initLoginVendor = function (e) {
            var a = t(e),
                i = a.parent().find(".login-vendor"),
                o = a.find(".check-customer");
            a.find(".check-seller").on("click", function () {
                a.find("#check-seller").addClass("active"), a.find("#check-customer").removeClass("active"), i.slideDown()
            }), o.on("click", function () {
                a.find("#check-customer").addClass("active"), a.find("#check-seller").removeClass("active"), i.slideUp()
            })
        }
    }(jQuery), jQuery, Wolmart.prepare = function () {
        Wolmart.$body.hasClass("with-flex-container") && window.innerWidth >= 1200 && Wolmart.$body.addClass("sidebar-active")
    }, Wolmart.initLayout = function () {
        Wolmart.isotopes(".grid:not(.grid-float)"), Wolmart.stickySidebar(".sticky-sidebar")
    }, Wolmart.init = function () {
        Wolmart.appearAnimate(".appear-animate"), Wolmart.slider(".owl-carousel"), Wolmart.setTab(".nav-tabs"), Wolmart.stickyContent(".sticky-header"), Wolmart.stickyContent(".sticky-footer", {
            minWidth: 0,
            maxWidth: 767,
            top: 150,
            hide: !0,
            max_index: 2100
        }), Wolmart.stickyContent(".sticky-toolbox", Wolmart.stickyToolboxOptions), Wolmart.stickyContent(".product-sticky-content", Wolmart.stickyProductOptions), Wolmart.parallax(".parallax"), Wolmart.skrollrParallax(), Wolmart.initFloatingParallax(), Wolmart.menu.init(), Wolmart.initScrollTopButton(), Wolmart.shop.init(), Wolmart.alert(".alert"), Wolmart.accordion(".card-header > a"), Wolmart.sidebar("sidebar"), Wolmart.sidebar("right-sidebar"), Wolmart.productSingle(".product-single"), Wolmart.initProductSinglePage(), Wolmart.initQtyInput(".quantity"), Wolmart.initNavFilter(".nav-filters .nav-filter"), Wolmart.calendar(".calendar-container"), Wolmart.countDown(".product-countdown, .countdown"), Wolmart.initPopup(), Wolmart.initNotificationAlert(), Wolmart.countTo(".count-to"), Wolmart.initCartAction(".cart-offcanvas .cart-toggle"), Wolmart.Minipopup.init(), Wolmart.headerToggleSearch(".hs-toggle"), Wolmart.initVendor(".store"), Wolmart.slideContent(".login-toggle"), Wolmart.slideContent(".coupon-toggle"), Wolmart.slideContent(".checkbox-toggle"), Wolmart.initLoginVendor(".user-checkbox")
    }, jQuery, Wolmart.prepare(), document.onreadystatechange = function () {
        document.readyState
    }, window.onload = function () {
        Wolmart.status = "loaded", document.body.classList.add("loaded"), Wolmart.call(Wolmart.initLayout), Wolmart.call(Wolmart.init), Wolmart.status = "complete", Wolmart.$window.trigger("wolmart_complete")
    };