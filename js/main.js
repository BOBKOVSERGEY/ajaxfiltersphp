$(function () {
  $('select').on('change', function () {
    let key = $(this).attr('name');
    let value = $(this).val();
    //console.log(key, value);
    $.ajax({
      type: 'GET',
      url: 'actions/query.php',
      data: key + '=' + value,
      //dataType: 'JSON',
      success: function (res) {
        $('.card-wrapper').html(res);
      },
      error: function () {
        $('.card-wrapper').html('something wrong');
      }
    })
    /*$.ajax({
      type: 'get',
      data: key + '-' + value,
      url: 'actions/query.php',
      success: function (res) {
        $('.card-wrapper').innerHTML(res);
      },
      error: function () {
        $('.card-wrapper').innerHTML('something wrong');
      }
    });*/
  });
})