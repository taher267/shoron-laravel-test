window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("main_logo").style.display = "none";
    document.getElementById("stiky_logo").style.display = "block";
    // var element = ;
    document.getElementById("header").classList.add("stiky_header");
  } else {
    document.getElementById("main_logo").style.display = "block";
    document.getElementById("stiky_logo").style.display = "none";
    document.getElementById("header").classList.remove("stiky_header");
  }
}

jQuery(document).ready(function(){
  jQuery('.freature_slide').owlCarousel({
    items:3,
    margin:33,
    loop:true,
    nav:true,
    dots:false,
     responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
        }
    }
    
  });

  //expart trainer

  jQuery('.trainer_slide').owlCarousel({
    items:4,
    margin:25,
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
        },1200:{
            items:4,
        }
    }
    
  });
//gallery isotope

    $('.my_isotope ul.tabs li:first').addClass('active');
    $(".my_isotope ul.tabs li span").on('click',function(){
        $('.my_isotope ul.tabs li').removeClass('active');
        $(this).parent().addClass('active');
    });
    var $grid = $('.grid_list').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows',
    getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
        var weight = $( itemElem ).find('.weight').text();
        return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
    }
    });
     
    // filter functions
    var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
    }
    };
    // bind filter button click
    $('.my_isotope .tabs').on( 'click', 'span', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({ filter: filterValue });
    });
    
     setInterval(function(){ $grid.isotope(); }, 300);


    /***********************
     *  Flicker Box  *
     ***********************/
    var gallery = $('.flicker_box a').simpleLightbox();
    /***********************
     *  Our Gallery Box  *
     ***********************/
    //var gallery = $('.gallery-list a').simpleLightbox();


    /***********************
     *  breadcrumbs *
     ***********************/
$('#breadcrumbs').breadcrumbsGenerator();

});// jquery end



// function OnFunc(){
// document.querySelector(".schedule_tabs").querySelector(".list").classList.add("active");
// }

document.querySelector("#pills-tab").querySelector(".nav-item").querySelector("button").classList.add("active");

