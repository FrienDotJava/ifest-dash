$(document).ready(function () {

if ($('#users-datatable').length) {
    var datatable = new DataTable(document.querySelector('#users-datatable'), {
      pageSize: 10,
      counterDivSelector: '.datatable-info span',
      pagingDivSelector: "#paging-first-datatable",
      firstPage: false,
      lastPage: false,
      nextPage: '<i class="fas fa-angle-right"></i>',
      prevPage: '<i class="fas fa-angle-left"></i>',
    });
    setTimeout(function () {
      customizeDatatable();
    }, 1000);
  }

});