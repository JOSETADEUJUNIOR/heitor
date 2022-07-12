$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Que pena, você não preencheu corretamente o seu código! Vamos tentar novamente?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#key").val();
    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name,
        success: function (text) {
            if (text == 1) {
                formSuccess();
            } else if (text == 1) {
                formValidado();

            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Presença Confirmada!")
}

function formValidado() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Cupom já validado!")
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}