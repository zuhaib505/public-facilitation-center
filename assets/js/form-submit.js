// function alignAfterLabel() {
//     $("input.form-control").each(function(index, el) {
//         let labelWidth = $(el).siblings("label").width()
//         $(this).css("padding-left", labelWidth + 35 || "6rem")
//     })
//     $(".bootstrap-select .filter-option-inner-inner").each(function(index, el) {
//         let select = $(el).parent().parent().parent().siblings("select")
//         let labelWidth = $(el).parent().parent().parent().parent().siblings("span.label").width()
//         $(this).css("padding-left", labelWidth + 16 || "6rem")
//     })
// }

$(document).ready(function() {
    async function showAlertMsg(type, message) {
        let options = {
            title: 'Success!',
            text: message,
            imageUrl: BASE_URL + "assets/images/illustrations/message-sent.png",
            imageHeight: 150,
            imageAlt: 'Message sent successfully'
        }
        switch (type) {
            case 'error':
                options = {
                    title: 'Error!',
                    text: message,
                    imageUrl: BASE_URL + "assets/images/illustrations/error.png",
                    imageHeight: 150,
                    imageAlt: 'Error'
                }
                break;
            default:
                break;
        }
        return await Swal.fire(options);
    }

    function submitForm(form_element) {
        const type = $(form_element).data("type");
        $.ajax({
            url: $(form_element).data("url"),
            method: "POST",
            dataType: "JSON",
            data: $(form_element).serializeArray(),
            beforeSend: () => {
                $("." + type + " .submit").attr("disabled", true);
                $("." + type + " .submit i").addClass("fa-spin fa-sync");
                $("." + type + " .submit i").removeClass("fa-paper-plane");
            },
            success: (resp) => {
                if (grecaptcha) {
                    grecaptcha.reset()
                }
                $("." + type + " .submit").attr("disabled", false);
                $("." + type + " .submit i").removeClass("fa-spin fa-sync");
                $("." + type + " .submit i").addClass("fa-paper-plane");

                showAlertMsg("success", "Message sent successfully");
                $('#menu-popup').modal('hide');
                (async() => {
                    let {
                        isConfirmed
                    } = await showAlertMsg(resp['status'] ? "success" : "error", resp['message']).then((resp) => resp);
                    if (!resp['status'] && isConfirmed && type == 'feedback') {
                        $('#menu-popup').modal('show');
                    }
                    if (resp['status']) {
                        $(form_element).trigger("reset");
                    }
                })();
            },
            error: (error) => {
                if (grecaptcha) {
                    grecaptcha.reset()
                }
                $("." + type + " .submit .submit-text").show();
                $("." + type + " .submit #btn-loader").hide();
                showAlertMsg("error", "Something went wrong");
                $('#menu-popup').modal('hide');
            }
        });
    }
    $(document).on("submit", ".contact-form", function(e) {
        e.preventDefault();
        submitForm(e.target);
    });



    // Site forms submittion


    // $(document.body).on("focusin", "input.field", function() {
    //     $(this).css("padding-left", "0.5rem")
    // })
    // $(document.body).on("click", "label", function() {
    //     $(this).siblings("input.field").focus()
    // })
    // $(document.body).on("focusout", "input.focus", function() {

    //     let labelWidth = $(this).siblings("label").width()
    //     $(this).css("padding-left", labelWidth + 35 || "6rem")
    //     setTimeout(() => {
    //         let labelWidth = $(this).siblings("label").width()
    //         $(this).css("padding-left", labelWidth + 35 || "6rem")
    //     }, 400);

    // })
    // $(document.body).on("focusout", "input.un-focus", function() {
    //     if ($(this).val()) {
    //         $(this).siblings("label").addClass("focused-label")
    //         $(this).css("padding-left", "0.5rem")
    //     } else {
    //         $(this).siblings("label").removeClass("focused-label")
    //     }
    // })

});