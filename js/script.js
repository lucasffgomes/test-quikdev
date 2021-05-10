$("input:checkbox").click(function() {
    var showAll = true;

    $('.card-movie').hide();
    $('div.filter-option').find('input:checked').each(function() {
        showAll = false;
        $('td.' + $(this).attr('rel')).parents().show();
    });

    if(showAll) {
        $('.card-movie').show();
    }
});

// ------------------------------------------------------------

$('#orderASC').on('click', function() {
    $('.card-movie').sort(function(a, b) {
        if(a.textContent < b.textContent) {
            return -1;
        } else {
            return 1;
        }
    }).appendTo('.container')
})

$('#orderDESC').on('click', function() {
    $('.card-movie').sort(function(a, b) {
        if(a.textContent > b.textContent) {
            return -1;
        } else {
            return 1;
        }
    }).appendTo('.container')
})
