var height = 165;
var avatar_size = 38;
var shoulders = 90;
var waist = 60;
var hips = 100;
var sil = 'hourglass';
var avatarHash = 'unknown';
var dressUrl = 'dresses/'
var dresses = [
    { 'image': 'rozowa.png', 'name': 'Rozowa', 'sizes': [38] },
    { 'image': 'kimono.png', 'name': 'Czarna', 'sizes': [34, 38, 42] },
    { 'image': 'czerwona.png', 'name': 'Czerwona', 'sizes': [38] },
];
var selectedItem = '';
var selectedSize = '';

var avatarList = {
    "34_155_rectangle": "5c295852a533c2e5ba10162382cdbaa1",
    "34_155_pear": "e3b8181b1c143cab5575bc03007eeb25",
    "34_155_hourglass": "20fdedfa820a1c0521412f3520795b22",
    "34_155_triangle": "106a4451c4151e2bd435189d1b765109",
    "34_155_apple": "c1ab6c6d9cd347caf46b202d5c44d719",
    "34_165_rectangle": "fafe2c1ecd16a9add6784e74b4404c65",
    "34_165_pear": "868c8660134cfb978724bc6c86a5905f",
    "34_165_hourglass": "e664f48c62c5e3f2485e803b52fcf39b",
    "34_165_triangle": "d94be13a7943db8d32641cb7e6f98857",
    "34_165_apple": "e7a1c01801920499a4666a7dee4844b8",
    "34_175_rectangle": "0ea82428d276054d49c5cd611f337aae",
    "34_175_pear": "e6c56ffec7d099655973a00ae92c352f",
    "34_175_hourglass": "ec228cff0d11b4600239b9914b0a088a",
    "34_175_triangle": "08830da333859ddfab87f12c687638ad",
    "34_175_apple": "33e1ce88521cd8adccbe97e6d4d05a11",
    "36_155_rectangle": "93262682edfb56bb4693314420ee507f",
    "36_155_pear": "8e6fc7af90e110227b2f0ede3d2f9830",
    "36_155_hourglass": "090cfc6cefb0a12d1577bb6b118151ed",
    "36_155_triangle": "b83d3e1f503cab4a6ecd64af69847938",
    "36_155_apple": "d7325cc33807a68b3ad6ec68006eaaa1",
    "36_165_rectangle": "bb92090e1666f45ec2dcc3c4ea293a45",
    "36_165_pear": "276653b40a059211dd93718ddd1fc302",
    "36_165_hourglass": "18e83d7b57a1b1bb80af2207f9097e3d",
    "36_165_triangle": "6042613a86d73362218f31f94ee98db2",
    "36_165_apple": "98c3804e829c4148ad4a6584556de3f2",
    "36_175_rectangle": "6956928e5607b3c91a996c361e54179d",
    "36_175_pear": "e0e8ea782f16377df8cec8844062fded",
    "36_175_hourglass": "0e3d94b09762159a63c83c8454949079",
    "36_175_triangle": "6f63cb94796e7717bd4383182bf93093",
    "36_175_apple": "a88ef8441e122309d550dba26e6accd0",
    "38_155_rectangle": "75a95c96ec0011b1b0ae7273908c2327",
    "38_155_pear": "3426363dd4c6151272330a387a7bbade",
    "38_155_hourglass": "fa488b15ddaddd79c8c3ce31dfee399e",
    "38_155_triangle": "c9a60ab06ae6e1d7fee27eb7fb452401",
    "38_155_apple": "abeea3401c4be411c79e65466eaa29ea",
    "38_165_rectangle": "fde842d49775c144bb8883e132329109",
    "38_165_pear": "6c776af42aba22c7e81abeb0001af377",
    //"38_165_hourglass" : "6e3d97b448acce8ffbb5a9a2d5d09a72", // REPLACED
    "38_165_hourglass": "95daa8699f956ce690a9c15c97206389", // REPLACED
    "38_165_triangle": "2b74dc3d8644145fa264ab1637300879",
    "38_165_apple": "3993bb25634001dc2541acf670a3509b",
    "38_175_rectangle": "a16bd502d0c462a3957e4fd4cf526c82",
    "38_175_pear": "0a4adace9cbb3a7fd45aaae21623a3c8",
    "38_175_hourglass": "844d1612feee34104b0a265ef3526472",
    "38_175_triangle": "a36d7bfa5c3f146401af6b384a2d212c",
    "38_175_apple": "9f462334db871316d859b6ea870aed4f",
    "40_155_rectangle": "85cdd92cff604525bba53110b8b1261e",
    "40_155_pear": "e8fcd6fc035deee6b9a08171ff0bdc37",
    "40_155_hourglass": "67db406ac72fb5de343afd0a20e642c7",
    "40_155_triangle": "5193eb92045d0d021e5769daac3873fb",
    "40_155_apple": "1eb2d5db41154e7baf836fbe3e3524ed",
    "40_165_rectangle": "15f360294b9b57e5ad09a1873f230e0f",
    "40_165_pear": "9c8e1ebb13abf7df851f8addba74f320",
    "40_165_hourglass": "66884ceb77107c13e5233defedb09503",
    "40_165_triangle": "d13aaa1f0d542d777a431b13c8deacdb",
    "40_165_apple": "ce90b186d067e6a11c9e774837bf60e0",
    "40_175_rectangle": "11d1835e28a5f9dfd5626777e73d8745",
    "40_175_pear": "a6143c7c6b082c6e32003a3fcb7d6be3",
    "40_175_hourglass": "3bd83eb215347c8be7cadf60bb70ca75",
    "40_175_triangle": "5659255785805030cacfdd10087bc02a",
    "40_175_apple": "4215a07b958eb16a0bd44f4943896110",
    "42_155_rectangle": "40712be5e1c5a0020b4f9f8df5588d11",
    "42_155_pear": "dc66859a533b1b51de5e0bb977992858",
    "42_155_hourglass": "270a86a63f85ecc81cf6bf7a579d379c",
    "42_155_triangle": "08c2229519988acb3b5fb5151a09f329",
    "42_155_apple": "05a637b184c5418ec68c4094fa572739",
    "42_165_rectangle": "3ecb641677ca73611001991ea4d257bd",
    "42_165_pear": "79523e3f75cb977226c4cfd32e5ae92b",
    "42_165_hourglass": "2a08b2a2982de386f9a7e71ccfa8654b",
    "42_165_triangle": "c6e9f526a5756ff7f9adff5b7a64ace0",
    "42_165_apple": "3b52f3fc1796ef989f37838937d73ec1",
    "42_175_rectangle": "6c5e1f9a28dbb29f54d27eca75462748",
    "42_175_pear": "caa7d57a42594b546c04791c91aabcf3",
    "42_175_hourglass": "7a40909d9e4a077cf6133d7244751c2e",
    "42_175_triangle": "06f536a197e52136e1882f2febc9d918",
    "42_175_apple": "721fe32d85d316817e8d01820bf5489c",
}

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
            $('.pag-3').removeClass('pag-active')
            break;
        case 2:
            $('.pag-prev').removeClass('disabled');
            $('.pag-next').removeClass('disabled');
            $('.pag-next').addClass('disabled');
            $('.pag-1').removeClass('pag-active').addClass('pag-visited');
            $('.pag-2').removeClass('pag-active').addClass('pag-visited');
            $('.pag-3').removeClass('pag-visited').addClass('pag-active');
            checkSil();
            $("#profileHeight").text(height + " cm");
            $("#profileSize").text(parseInt(document.getElementById("avatarSize").value));
            $("#profileShoulders").text(shoulders + " cm");
            $("#profileWaist").text(waist + " cm");
            $("#profileHips").text(hips + " cm");
            $("#profileSil").text(sil[0].toUpperCase() + sil.substring(1));

            wearfits.load(avatarHash, selectedItem.name + "_" + selectedSize)
            wearfits.canvasResize();
            //var url = 'https://demo.wearfits.com:3000/?nogui=1&avatarid=' + avatarHash + '&garmentid=' + selectedItem.name + "_" + selectedSize;
            //$("#content3d").html('<iframe src="' + url + '" style="width:100%;height:100%;" frameBorder="0"></iframe>')
    }
});
$('#carouselWF').carousel('pause');
var shouldersRange = document.getElementById("shouldersRange");
shouldersRange.oninput = function() {
    shoulders = this.value;
    $("#shoulders").text(this.value + " cm");
    var size = 2 * Math.round(((shoulders / 2) - 6) / 2);
    if (size > 42)
        size = 42;
    if (size < 34)
        size = 34;
    $("#avatarSize").val(size);
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

    var size = $("#avatarSize").val();
    height = parseInt($("#height").val());
    if (height < 160)
        height = 155;
    else if (height > 170)
        height = 175;
    else
        height = 165;

    //avatarHash = CryptoJS.MD5([height, weight, sil].join(""));
    console.log([size, height, sil].join("_"))
    avatarHash = avatarList[[size, height, sil].join("_")]

    selectedItem = dresses[mySwiper.realIndex];
    $("#item").attr("src", dressUrl + selectedItem.image);
}

function changeSize(size = 38) {
    selectedSize = size;
    selectedItem = dresses[mySwiper.realIndex];
    sizes = ''
    for (s in selectedItem.sizes) {
        style = ''
        if (selectedSize == selectedItem.sizes[s]) {
            style = 'sizeSelected'
        }
        sizes += '<a href="#" class="' + style + '" onClick="changeSize(' + selectedItem.sizes[s] + ')">' + selectedItem.sizes[s] + '</a>';
    }
    $("#sizes").html(sizes);
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
    breakpoints: {
        800: {
            slidesPerView: 1
        }
    }
});
mySwiper.on('slideChange', function() {
    changeSize();
});
for (d in dresses) {
    mySwiper.appendSlide('<div class="swiper-slide"><img class="item" src="' + dressUrl + dresses[d].image + '"></div>');
}
mySwiper.appendSlide('<div class="swiper-slide"><span></span></div>');
changeSize();