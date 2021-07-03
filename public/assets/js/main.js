
jQuery(document).ready(function(){
     //$('#news_categoty').val("option :first-child").val()= '0';
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


//password matching of register form
    function Validate() {
        var password = document.getElementById("logPassword").value;
        var confirmPassword = document.getElementById("logConfirmPassword").value;
        if (password != confirmPassword) {
            const element =document.getElementById('confirmChackVal');
            element.innerHTML ='Passwords do not match.';
            element.classList.add('text-danger');
        }else{
            const elementconf =document.getElementById('confirmChackVal');
            elementconf.innerHTML ='Passwords has been matched.';
            elementconf.classList.remove('text-danger');
            elementconf.classList.add('text-success');
        }
        
    }
// input type password to text of login form
function Passshow(){
    document.querySelector('#logInPassword').type = 'text';
}


