var height = 0;
var weight = 0;
var shoulders = 90;
var waist = 60;
var hips = 100;
var sil = 'pear';
var avatarHash = 'unknown';
var dressUrl = 'dresses/'
var dresses = ['1.jpg', '2.png', '3.jpg', '4.png'];
var selectedItem = '';
$('#wfDemo').modal({
    keyboard: false,
    backdrop: "static",
    show: true
});
$('#carouselWF').on('slid.bs.carousel', function(e) {
    // e.direction     // The direction in which the carousel is sliding (either "left" or "right").
    // e.relatedTarget // The DOM element that is being slid into place as the active item.
    // e.from          // The index of the current item.     
    // e.to            // The index of the next item.
    switch (e.to) {
        case 0:
            $('.pag-prev').removeClass('disabled');
            $('.pag-prev').addClass('disabled');
            $('.pag-next').removeClass('disabled');
            $('.pag-1').removeClass('pag-visited').addClass('pag-active');
            $('.pag-2').removeClass('pag-active').removeClass('pag-visited');
            $('.pag-3').removeClass('pag-active');
            break;
        case 1:
            $('.pag-prev').removeClass('disabled');
            $('.pag-next').removeClass('disabled');
            $('.pag-1').removeClass('pag-active').addClass('pag-visited');
            $('.pag-2').removeClass('pag-visited').addClass('pag-active');
            $('.pag-3').removeClass('pag-active');
            break;
        case 2:
            $('.pag-prev').removeClass('disabled');
            $('.pag-next').removeClass('disabled');
            $('.pag-next').addClass('disabled');
            $('.pag-1').removeClass('pag-active').addClass('pag-visited');
            $('.pag-2').removeClass('pag-active').addClass('pag-visited');
            $('.pag-3').removeClass('pag-visited').addClass('pag-active');
            height = parseInt(document.getElementById("height").value);
            weight = parseInt(document.getElementById("weight").value);
            checkSil();
            $("#profileHeight").text(height + " cm");
            $("#profileWeight").text(weight + " kg");
            $("#profileShoulders").text(shoulders + " cm");
            $("#profileWaist").text(waist + " cm");
            $("#profileHips").text(hips + " cm");
            $("#profileSil").text(sil[0].toUpperCase() + sil.substring(1));
            // $("#content3d").text("dress name: " + selectedItem + " / avatar hash: " + avatarHash);
    }
});
$('#carouselWF').carousel('pause');
var shouldersRange = document.getElementById("shouldersRange");
shouldersRange.oninput = function() {
    shoulders = this.value;
    $("#shoulders").text(this.value + " cm");
    checkSil();
}
var waistRange = document.getElementById("waistRange");
waistRange.oninput = function() {
    waist = this.value;
    $("#waist").text(this.value + " cm");
    checkSil();
}
var hipsRange = document.getElementById("hipsRange");
hipsRange.oninput = function() {
    hips = this.value;
    $("#hips").text(this.value + " cm");
    checkSil();
}

function checkSil() {
    // silhouettes = [apple, hourglass, pear, rectangle, triangle]
    if (waist > shoulders * 1.1 && waist > hips * 1.1) sil = 'apple'
    else if (shoulders > waist * 1.1 && waist > hips * 1.1) sil = 'triangle'
    else if (hips > shoulders * 1.2) sil = 'pear'
    else if (hips > waist * 1.1 && shoulders > waist * 1.1) sil = 'hourglass'
    else sil = 'rectangle';
    $("#silImg").attr("src", "sil/" + sil + ".png");
    $("#titleSil").text(sil[0].toUpperCase() + sil.substring(1));

    if (!height || height < 100 || height > 200) height = 160;
    if (!weight || weight < 40 || weight > 150) weight = 65;

    avatarHash = CryptoJS.MD5([height, weight, sil].join(""));

    selectedItem = dresses[mySwiper.realIndex];
    $("#item").attr("src", dressUrl + selectedItem);
}
var mySwiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 50,
    grabCursor: true,
    observer: true,
    observeParents: true,
    initialSlide: 1,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})
for (d in dresses) {
    mySwiper.appendSlide('<div class="swiper-slide"><img class="item" src="' + dressUrl + dresses[d] + '"></div>');
}
mySwiper.appendSlide('<div class="swiper-slide"><span></span></div>');