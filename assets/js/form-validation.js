$(document).ready(function() {
    $(".alpha").keypress(function(e) {
        var regex = new RegExp("^[a-zA-Zs ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    $(".alphanumeric").keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9@.s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    $(".numeric").keypress(function(e) {
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    $(".numeric-nonzero").keypress(function(e) {
        var regex = new RegExp("^[1-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });

    $(document).on("paste", ".alpha", function(e) {
        var el = $(this);
        setTimeout(function() {
            var newValue = $(el).val();
            var dataFull = newValue.replace(/[^\w\s]/gi, "");
            var dataFull2 = dataFull.replace(/[0-9]/g, "");
            var dataFull3 = dataFull2.trim();
            $(el).val(dataFull3);
        });
    });
    $(document).on("paste", ".alphanumeric", function(e) {
        $this = $(this);
        setTimeout(function() {
            var newValue = $this.val();
            var dataFull = newValue.replace(/[^\w\s]/gi, "");
            // var dataFull2 = dataFull.replace(/[0-9]/g, '');
            var dataFull3 = dataFull.trim();
            $this.val(dataFull3);
        });
    });
    $(document).on("paste", ".numeric-nonzero", function(e) {
        var el = $(this);
        setTimeout(function() {
            // var newValue = $this.val();
            // var dataFull = newValue.replace(/[^\w]/gi, '');
            // var dataFull2 = dataFull.split(" ").join("");
            $(el).val("");
            $(el).focus();
        });
    });
    $(document).on("paste change", ".numeric", function(e) {
        var el = $(this);
        setTimeout(function() {
            var newValue = $(el).val();
            // var dataFull = newValue.replace(/[^\w\s]/gi, '')
            var dataFull2 = newValue.replace(/[^0-9]+/g, "");
            var dataFull3 = dataFull2.trim();
            $(el).val(dataFull3);
        });
    });
    $(document).on("paste", ".nopaste", function(e) {
        var el = $(this);
        setTimeout(function() {
            $(el).val("");
            $(el).focus();
        });
    });
});