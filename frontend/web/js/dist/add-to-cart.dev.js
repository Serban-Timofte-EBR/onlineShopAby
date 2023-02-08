'use strict';

$('.add-to-cart').click(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/abysand/ajax-actions/add-to-cart',
    data: {
      id: $(this).attr('data-id')
    }
  }).done(function (a) {
    var response = JSON.parse(a);

    if (response.message != 'OK') {
      console.error('Process failed. Stack trace: ' + a);
    }
  });
});