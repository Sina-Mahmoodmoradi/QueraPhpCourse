$(document).ready(function() {
  $('.btn-delete').click(function(e) {
    if (base_url == '/') {
      base_url = '';
    }
    $('#deleteConfirm').attr('href', base_url + '/books/delete/' + $(this).data('id'));
  });

  $('#dataTable').DataTable({
    'oLanguage': {
      'sInfo': 'در حال نمایش موارد _START_ تا _END_ از _TOTAL_ مورد',
      'sSearch': 'جست‌وجو: ',
      'sLengthMenu': 'نمایش _MENU_ مورد',
      'sInfoEmpty': 'داده‌ای یافت نشد.',
      'sEmptyTable': 'داده‌ای یافت نشد.',
      'sZeroRecords': 'داده‌ای یافت نشد.',
      'oPaginate': {
        'sFirst': 'اولین',
        'sPrevious': 'قبلی',
        'sNext': 'بعدی',
        'sLast': 'آخرین'
      }
    }
  });
});
