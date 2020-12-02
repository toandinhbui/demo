$('#btnNavToggle').click(function() {
    if ( $('#content-wrap').hasClass('navOpen') ){
        $('#content-wrap').animate({'left': 0}).removeClass('navOpen');
    } else {
        $('#content-wrap').animate({'left': 250}).addClass('navOpen');
    }

});

/*--END Toggle--*/

$('#myButton').click(function() {
    
    $('#myModal').modal();
    
});