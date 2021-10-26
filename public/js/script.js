$(document).ready(function () {
    $(".tab_3").owlCarousel({
        items: 4,
        responsive: {
            1024: {
                items: 2.7
            },
        },
        dots: false,
        stagePadding: true,
        center: true,
        loop: true,
        startPosition: 0,
        autoplay: true,
        autoplayTimeout: speed_small,
    });
    $("#carousel").owlCarousel({
        items: 1,
        responsive: {
            0: {
                items: 1
            },
        },
        navigation: false,
        slideSpeed: 500,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        singleItem: true,
        autoPlay: true,
        stopOnHover: true,
        center: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: speed_big,
    });
    $("#carousel_ipad").owlCarousel({
        items: 1,
        responsive: {
            0: {
                items: 1
            },
        },
        navigation: false,
        slideSpeed: 500,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        singleItem: true,
        autoPlay: true,
        stopOnHover: true,
        center: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: speed_big,
    });
});
// Start create page
let check_big = $("#big")
let check_small = $("#small")
let file_for_ipad = $("#block_image_for_ipad")
check_big.click(function () {
    if ($(this).is(':checked')) {
        // console.log('check')
        file_for_ipad.fadeIn();

    }
});
check_small.click(function (){
    if ($(this).is(':checked')) {
        file_for_ipad.fadeOut();
        // console.log('nocheck')

    }
})
//
// Start store new game

let elsImageCheck = $("input[name=image]");
elsImageCheck.on("change", function () {
    var fd = new FormData();
    var files = elsImageCheck[0].files;
    var big = $("#big");
    var small = $("#small");
    // console.log(slider.val())
    // Check file selected or not
    if (files.length > 0) {
        if (big.is(':checked')) {
            fd.append('slider',big.val())
        }
        if(small.is(':checked')){
            fd.append('slider',small.val())
        }

        fd.append('image', files[0]);


        $.ajax({
            url: routeImageCheck,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                // console.log(response)
                $('.validate').html(response)
            }
        })
    }
})
let elsImageIpadCheck = $("input[name=image_for_ipad]");
elsImageIpadCheck.on("change", function () {
    var fd = new FormData();
    var files = elsImageIpadCheck[0].files;
    var slider = $("input[name=slider]");
    // Check file selected or not
    if (files.length > 0) {
        fd.append('image_for_ipad', files[0]);

        $.ajax({
            url: routeImageCheck,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                // console.log(response)
                $('.validate_ipad').html(response)
            }
        })
    }
})
let linkCheck = $("input[name=link]");
linkCheck.on("change", function () {
    console.log(linkCheck)
    $.ajax({
        url: routeLinkCheck,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            link: linkCheck.val(),
        },
        success: function (response) {
            $('.validate_link').html(response)
            // console.log(response)
        }
    })
})

// End store new game
// End create page


//Start /admin main page
//  Start sorting
function removeCheck() {
    let els = $("input[data=sort]");
    els.prop('checked', false);
    let platform = [];
    let version = [];
    let slider = [];
    let published = [];
    let sort_date = [];
    $.ajax({
        url: route,
        type: "GET",
        data: {
            platform: platform,
            version: version,
            slider: slider,
            published: published,
            sort_date: sort_date,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            $('#games').html(data)
        }

    })

}

var els = $("input[data=sort]");
els.on("change keyup", function () {
    var platform = [];
    var version = [];
    var slider = [];
    var published = [];
    var sort_date = [];
    var search_text = [];
    els.each(function () {
        if (this.checked) {
            if (this.name == 'platform') {
                platform.push(this.value)
            }
            if (this.name == 'version') {
                version.push(this.value)
            }
            if (this.name == 'slider') {
                slider.push(this.value)
            }
            if (this.name == 'published') {
                published.push(this.value)
            }
            if (this.name == 'sort_date') {
                sort_date.push(this.value)
            }

        }
        if (this.name == "search_text"){
            search_text.push(this.value)
        }
    });
    console.log(search_text)
    $.ajax({
        url: route,
        type: "GET",
        data: {
            platform: platform,
            version: version,
            slider: slider,
            published: published,
            sort_date: sort_date,
            search_text:search_text,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            $('#games').html(data)
        }

    })
});
// End sorting
//End /admin main page




//Start separator page

//  Start update separator text
var elsSubmit = $("#submit");
elsSubmit.on("click", function (e) {
    e.preventDefault();
    let data = $('#summernote').summernote('code')
    $.ajax({
        url: routeSubmit,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            data: data,
        },
        success: function (response) {
            console.log(response)
        }
    })
    // console.log($('#summernote').summernote('code'))
    location.reload()
})
// end update separator text

//end separator page



//Start show page

// start check image
// let elsImage = $("input[name=image]");
// elsImage.on("change", function () {
//     console.log(2)
//     var fd = new FormData();
//     var files = elsImage[0].files;
//
//     // Check file selected or not
//     if (files.length > 0) {
//         fd.append('image', files[0]);
//
//         $.ajax({
//             url: routeCheckImage,
//             type: 'post',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: fd,
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 $('.validate').html(response)
//             }
//         })
//     }
// })
// // end check image
//
// //    start check link
// let link = $("input[name=link]");
// link.on("change", function () {
//     console.log(link)
//     $.ajax({
//         url: routeCheckLink,
//         type: 'post',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         data: {
//             link: link.val(),
//         },
//         success: function (response) {
//             $('.validate_link').html(response)
//             // console.log(response)
//         }
//     })
// })
//  end check link

let check_big_update = $("#big")
let check_small_update = $("#small")
let file_for_ipad_update = $("#block_image_for_ipad")
if (check_big_update.is(':checked')){
    file_for_ipad_update.fadeIn();
}


check_big_update.click(function () {
    if ($(this).is(':checked')) {
        // console.log('check')
        file_for_ipad_update.fadeIn();
    }
});
check_small_update.click(function (){
    if ($(this).is(':checked')) {
        file_for_ipad_update.fadeOut();
        // console.log('nocheck')
    }
})
// End show page


//Start full text search

$('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : routeSearch,
        data:{'search':$value},
        success:function(data){
            console.log()
            $('tbody').html(data);
        }
    });
})
//End full text search
