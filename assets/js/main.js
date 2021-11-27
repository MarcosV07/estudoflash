$(".glitched-head").append("<div class='glitch-window'></div>");
$("h1.glitched").clone().appendTo(".glitch-window");

$("#myBtn").click(function () {
    $("#myModal").addClass("modal-show");
});

$("#btnModalLogin").click(function () {
    $("#ModalLogin").addClass("modal-show");
});

$("#btnpassword").click(function () {
    $("#Modalpassword").addClass("modal-show");
});

$(".close").click(function () {
    $("#myModalAlter, #ModalLogin, #myModal, #Modalpassword").removeClass(
        "modal-show"
    );
});

$(window).click(function (event) {
    if ($(event.target) == $("#myModal")) {
        $("#myModal").removeClass("modal-show");
    }
});

let formCompleteDados = document.querySelectorAll(".label-float");
formCompleteDados.forEach((_e, key) => {
    if (_e.children[0].value != "") {
        if (formCompleteDados[key].children[1]) {
            formCompleteDados[key].children[1].className = "focus-label";
        }
    } else {
        formCompleteDados[key].children[1].className = "";
    }
});

function completeCadastro(event, idLabel) {
    let value = event.target;
    let id_label = document.getElementById(idLabel);

    if (value.value != "") {
        id_label.classList.add("focus-label");
    } else {
        id_label.classList.remove("focus-label");
    }
}

var $text = $(".textinput").keyup(function () {
    var $el = $(this).val();

    if (this.value == "") {
        $("#table-user > ").fadeIn(450);
    } else {
        $("#table-user > tr").each(function () {
            var txt = $(this).attr("data-filtro");
            var match = txt.indexOf($el);
            if (match >= 0) {
                $(this).fadeIn(450);
            } else {
                $(this).fadeOut(250);
            }
        });
    }
    $text.removeClass("active");
    $(this).addClass("active");
});

(function ($) {
    $(function () {
        $("nav ul li a:not(:only-child)").click(function (e) {
            $(this).siblings(".nav-dropdown").toggle();
            $(".nav-dropdown").not($(this).siblings()).hide();
            e.stopPropagation();
        });
        $("html").click(function () {
            $(".nav-dropdown").hide();
        });
        $("#nav-toggle").click(function () {
            $("nav ul").slideToggle();
        });
        $("#nav-toggle").on("click", function () {
            this.classList.toggle("active");
        });
    });
})(jQuery);
