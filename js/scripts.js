function ajax_call()
{
	var team_name = document.getElementById("prop_upload_name_id").value;
	var pass = document.getElementById("prop_upload_pass_id").value;
	var xmlhttp;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var response = xmlhttp.responseText;
			if(response.trim() == "1")// 1 is for Waiting for an upload
			{
				document.getElementById("propUploadForm").className = "form-horizontal";
				document.getElementById("status_id").className = "row";
				document.getElementById("status_value_id").innerHTML = "Waiting for an upload";
			}
			else if(response.trim() == "2")// 2 is Abstract uploaded
			{
					document.getElementById("status_id").className = "row";
				document.getElementById("status_value_id").value = "Abstract uploaded";
			}
			else
			{
				alert("Wrong Username or Password!");
			}
		}	
	}
	xmlhttp.open("POST","php/upload_status.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("team_name="+team_name+"&"+"password="+pass);
}

function prop_js()
{
	var pass = document.getElementById("prop_pass_id").value;
	var repass = document.getElementById("prop_repass_id").value; 
	var valid = 1;
	if( pass == repass)
	{
		valid = 1;
	}
	else
	{
		valid = 0;
		alert("Passwords don't match!");
	}
	var number = document.getElementById("phoneProp").value;
	if (number.length < 10) {
		alert("Please enter a valid phone number");
		valid  = 0;
	} else {
		valid  = 1;
	}

	if(valid == 1) {
		document.getElementById("prop_reg").submit();
	}
}

function prath_js()
{
	var pass = document.getElementById("prath_pass_id").value;
	var repass = document.getElementById("prath_repass_id").value; 
	if( pass == repass)
	{
		document.getElementById("prath_reg").submit();
	}
	else
	{
		alert("Passwords don't match!");
	}
}


var numberRowProp = 1;
function dispTableProp(team_Size) {
	var teamSize = team_Size.value;
	var table = document.getElementById("teamMembersProp");
	// remove all rows from the table
	var i = numberRowProp;
	while(i > 0) {
		table.deleteRow(-1);
		i -= 1;
	}
	// add the required number of rows
	i = teamSize;
	while(i > 0) {
		var row = table.insertRow(1);
		var cell1 = row.insertCell(0);
		cell1.innerHTML = "<input type=\"text\" name = \"prop_mem_name[]\" required/>";
		var cell3 = row.insertCell(0);
		cell3.innerHTML = "<select name = \"prop_mem_gen[]\"><option>M</option><option>F</option></select>";
		var cell2 = row.insertCell(0);
		cell2.innerHTML = "<input type=\"number\" min=\"1\" name = \"prop_mem_sem[]\" required/>";
		var cell4 = row.insertCell(0);
		cell4.innerHTML = "<input type=\"text\" name = \"prop_mem_col[]\" required/>";
		i -= 1;
	}
	numberRowProp = teamSize;
}



var numberRowPrath = 1;
function dispTablePrath(team_Size) {
	var teamSize = team_Size.value;
	var table = document.getElementById("teamMembersPrath");
	// remove all rows from the table
	var i = numberRowPrath;
	while(i > 0) {
		table.deleteRow(-1);
		i -= 1;
	}
	// add the required number of rows
	i = teamSize;
	while(i > 0) {
		var row = table.insertRow(1);
		var cell1 = row.insertCell(0);
		cell1.innerHTML = "<input type=\"text\" name = \"prath_mem_name[]\" />";
		var cell3 = row.insertCell(0);
		cell3.innerHTML = "<select name = \"prath_mem_gen[]\"><option>M</option><option>F</option></select>";
		var cell2 = row.insertCell(0);
		cell2.innerHTML = "<input type=\"text\" name = \"prath_mem_sem[]\" />";
		var cell4 = row.insertCell(0);
		cell4.innerHTML = "<input type=\"text\" name = \"prath_mem_col[]\" />";
		i -= 1;
	}
	numberRowPrath = teamSize;
}

jQuery(function($){

'use strict';



    // ----------------------------------------------
    // Preloader
    // ----------------------------------------------
	(function () {
	    $(window).load(function() {
	        $('#pre-status').fadeOut();
	        $('#st-preloader').delay(350).fadeOut('slow');
	    });
	}());



    // ---------------------------------------------- 
    //  magnific-popup
    // ----------------------------------------------
	(function () {

		$('.portfolio-items').magnificPopup({ 
			delegate: 'a',
			type: 'image',
			// other options
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',

			gallery: {
				enabled: false
			},
			zoom: {
				enabled: true,
				duration: 300, // don't foget to change the duration also in CSS
				opener: function(element) {
					return element.find('i');
				}
			}

		});

	}()); 



    // ---------------------------------------------- 
    // Fun facts
    // ---------------------------------------------- 
	(function () {
		$('.st-counter').counterUp({
		    delay: 10,
		    time: 1500
		});
	}()); 



    // ---------------------------------------------- 
    //  Isotope Filter 
    // ---------------------------------------------- 
	(function () {
		var winDow = $(window);
		var $container=$('.portfolio-items');
		var $filter=$('.filter');

		try{
			$container.imagesLoaded( function(){
				$container.show();
				$container.isotope({
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});
		} catch(err) {
		}

		winDow.bind('resize', function(){
			var selector = $filter.find('a.active').attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
					}
				});
			} catch(err) {
			}
			return false;
		});

		$filter.find('a').click(function(){
			var selector = $(this).attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
					}
				});
			} catch(err) {

			}
			return false;
		});


		var filterItemA	= $('.filter a');

		filterItemA.on('click', function(){
			var $this = $(this);
			if ( !$this.hasClass('active')) {
				filterItemA.removeClass('active');
				$this.addClass('active');
			}
		});
	}()); 


	// -------------------------------------------------------------
    // masonry
    // -------------------------------------------------------------

    (function () {
		var $container = $('.portfolio-items');
		// initialize
		$container.masonry({
		  itemSelector: '.work-grid'
		});
    }());


  	// -------------------------------------------------------------
    // Animated scrolling / Scroll Up
    // -------------------------------------------------------------

    (function () {
        $('a[href*=#]').bind("click", function(e){
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top -79
            }, 1000);
            e.preventDefault();
        });
    }());


    // ----------------------------------------------
    // Owl Carousel
    // ----------------------------------------------
	(function () {

		$(".st-testimonials").owlCarousel({
		singleItem:true,
		lazyLoad : true,
		pagination:false,
		navigation : false,
		autoPlay: true,
		});

	}());


    // -------------------------------------------------------------
    // Back To Top
    // -------------------------------------------------------------

    (function () {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });
    }());
	

    // ----------------------------------------------
    // Parallax Scrolling
    // ----------------------------------------------
	(function () {
		$(window).bind('load', function () {
			parallaxInit();						  
		});
		function parallaxInit() {		
			$("#testimonial").parallax("50%", 0.3);
		}	
		parallaxInit();
	}());

	

    // ----------------------------------------------
    // fitvids js
    // ----------------------------------------------
    (function () {

        $(".post-video").fitVids();

    }()); 


	

});