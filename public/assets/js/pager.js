window.onload = function () {
    var pager = document.getElementById("pager");
    var color = document.getElementById("color-filter");

    color.onchange = function (e) {
        pager.value = 1;
        var targ;
        if (e.target) { // W3C
            targ = e.target;
        } else if (e.srcElement) { // IE6-8
            targ = e.srcElement;
        }
        if (targ.nodeType == 3) { // Safari
            targ = targ.parentNode;
        }
        targ.form.submit();
    }

    pager.onchange = function (e) {
        var targ;
        if (e.target) { // W3C
            targ = e.target;
        } else if (e.srcElement) { // IE6-8
            targ = e.srcElement;
        }
        if (targ.nodeType == 3) { // Safari
            targ = targ.parentNode;
        }
        targ.form.submit();
    }
}
