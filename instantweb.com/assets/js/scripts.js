jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
     // /*Phone Field width Change*/
 
        $(window).resize(function(){
    // Get same width
    $('input.form-last-name').width(5+$('input.form-first-name').width());
});
    
    $('#sendForm').on('submit', function(e) {
        
        $(this).find('input[type="tel"], input[type="text"], textarea').each(function(){
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
    });

    $('#sendForm')
        .find('[name="phone"]')
            .intlTelInput({
                utilsScript: 'assets/js/utils.js',
                autoPlaceholder: true,
                initialCountry: "us",
                preferredCountries: [ "us", "gb" ]
            });

});

 