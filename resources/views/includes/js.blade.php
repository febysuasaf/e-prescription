  <!-- BEGIN: Vendor JS-->
  <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
  <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
  {{-- <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater1.min.js')}}"></script> --}}
  {{-- <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script> --}}
  <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
  <script src="{{asset('app-assets/js/core/app.js')}}"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
  <!-- END: Page JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
 <script src="{{asset('app-assets/js/scripts/forms/form-repeater.js')}}"></script>
 <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
<script src="{{ asset('assets/js/modalDetails.js')}}"></script>
<!-- END: Page JS-->

  <script>
      $(window).on('load', function() {
          if (feather) {
              feather.replace({
                  width: 14,
                  height: 14
              });
          }
      })
  </script>

  <script type="text/javascript">
$('select').select2({
            width: '100%'
            //theme: "bootstrap"
        });


if($('.report-repeater').length)
        {
            var  reportRepeater = $('.report-repeater').repeater({
                defaultValues: {
                    'textarea-input': 'foo',
                    'text-input': 'bar',
                },
                show: function () {
                    $(this).slideDown();
                  $('.select2-container').remove();
                    $('select').select2({
                       width: '100%',
                        allowClear: true
                    });
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this?')) {
                        $(this).slideUp(deleteElement);
                    }
                }

            });
        }

</script>

<script type="text/javascript">
     $(function () {
        $('.example2').DataTable({
            responsive: true,
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true
        });
        $('.example1').DataTable({
            responsive: true,
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true
        });
    });

    $('#myTable').DataTable({
        responsive: true
    });
</script>


{{-- Sweet Alert --}}
@if (!empty(Session::get('success')))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').ready(function() {
      var message = document.getElementById('swalDefaultSuccess').value;
      Toast.fire({
        icon: 'success',
        title: message
      })
    });
  });
  </script>
  @endif

  @if (!empty(Session::get('error')))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultError').ready(function() {
      var message = document.getElementById('swalDefaultError').value;
      Toast.fire({
        icon: 'error',
        title: message
      })
    });
  });
  </script>
  @endif

  @if (!empty(Session::get('info')))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultInfo').ready(function() {
      var message = document.getElementById('swalDefaultInfo').value;
      Toast.fire({
        icon: 'info',
        title: message
      })
    });
  });
  </script>
  @endif


  <script>
$('.swalDeletedInfo').on('click', function (e) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
      title: 'Apakah kamu yakin?',
    text: "Apabila sudah di hapus data akan hilang !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Tidak'
    }).then(function(e) {
      if (e.value === true) {
            window.location.href = url;
        } else {
                e.dismiss;
            }
    },function (dismiss) {
            return false;
        });
});

  </script>


