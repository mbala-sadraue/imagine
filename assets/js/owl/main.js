//
//Isotopo carousel
//
$('.owl-carousel').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:5,
    autoplay: true ,
    autoplayTimeout: 2000,
    responsive:{
        600:{
            items:2
        }
    }
});
//
//Magnific-Popup-master
//
$('#sectionSliderFotos .popup-link').magnificPopup({
    type: "image",
    gallery: {
        enabled: true,
        tPrev: "Anterior",
        tNext: "Proximo",
        tCounter: "%curr% de %total%",
    },
});
//
//Isotope
//
let btns = $("#servicos .button-group button");
btns.click(function(e){
           $("#servicos .button-group button").removeClass("active");
            e.target.classList.add("active");
    
            let selector = $(e.target).attr("data-filter");
            $("#servicos .grid").isotope({
                filter: selector,
            });
});
// Isotope: Para carregar as imagagens de servicos de uma so vez 
$(window).on("load", function(){
     $("#servicos .grid").isotope({
                filter: "*",
    });
});
//
//Magnific-Popup-master dos servicos
//
$('.grid .popup').magnificPopup({
    type: "image",
    gallery: {
        enabled: true,
        tPrev: "Anterior",
        tNext: "Proximo",
        tCounter: "%curr% de %total%",
    },
});

//
//Magnific-Popup-master casamento
//
$('#casamento .casamento').magnificPopup({
    type: "image",
    gallery: {
        enabled: true,
        tPrev: "Anterior",
        tNext: "Proximo",
        tCounter: "%curr% de %total%",
    },
});
// Isotope: Para carregar as imagagens de casamento de uma so vez 
$(window).on("load", function(){
     $("#casamento .grid").isotope({
                filter: "*",
    });
});

//
//Magnific-Popup-master servicos (casamento)
//
$('#block .servicoCasamento').magnificPopup({
    type: "image",
    gallery: {
        enabled: true,
        tPrev: "Anterior",
        tNext: "Proximo",
        tCounter: "%curr% de %total%",
    },
});
// Isotope: Para carregar as imagagens de casamento de uma so vez 
$(window).on("load", function(){
     $("#block .servicoCasamento").isotope({
                filter: "*",
    });
});

