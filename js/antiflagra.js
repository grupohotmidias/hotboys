jQuery.noConflict(), stickynote.prototype = {
 
    showhidenote: function(t, e) {
        var i = jQuery,
            s = this;
        "show" == t ? (this.$note.css("zIndex", stickynote.startingzindex++), this.positionnote(i, this.s.pos[0], this.s.pos[1]), this.s.fixed && i(window).bind(this.reposevtstring, function() {
            s.positionnote(jQuery, s.s.pos[0], s.s.pos[1])
        }), this.$note.fadeIn(this.s.fade ? 500 : 0, function() {
            s.positionnote(i, s.s.pos[0], s.s.pos[1]), "function" == typeof e && e(), document.all && this.style && this.style.removeAttribute && this.style.removeAttribute("filter")
        })) : "hide" == t && (this.$note.hide(), this.s.fixed && i(window).unbind(this.reposevtstring))
    },

    init: function(t, e) {
        var i = this;
        this.$note = t("#" + e.content.divid), this.s.fixed && this.cssfixedsupport && this.$note.css({
            position: "fixed"
        }), this.$note.css({
            visibility: "visible",
            display: "none"
        });
        var s = this.s.showfrequency,
            o = Math.floor(Math.random() * s);
        ("session" == s && !stickynote.routines.getCookie(this.s.divid + "_persist") || "always" == s || !isNaN(o) && 0 == o) && ("session" == s && stickynote.routines.setCookie(this.s.divid + "_persist", 1), this.showhidenote("show", this.s.hidebox > 0 ? function() {
            setTimeout(function() {
                i.showhidenote("hide")
            }, 1e3 * i.s.hidebox)
        } : null))
    }
}, stickynote.startingzindex = 100, stickynote.routines = {
    getCookie: function(t) {
        var e = new RegExp(t + "=[^;]*", "i");
        return document.cookie.match(e) ? document.cookie.match(e)[0].split("=")[1] : null
    },
    setCookie: function(t, e, i) {
        var s = "";
        void 0 !== i && (s = "; expires=" + expireDate.setDate((new Date).getDate() + i).toGMTString()), document.cookie = t + "=" + e + "; path=/" + s
    }
};