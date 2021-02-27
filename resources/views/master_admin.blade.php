<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản trị - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png"/>
    <base href="{{asset('')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets_admin/vendor/bootstrap/css/bootstrap.min.css">
   {{--  <link href="assets_admin/vendor/fonts/circular-std/style.css" rel="stylesheet"> --}}<link rel="stylesheet" type="text/css" href="cntt/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets_admin/libs/css/style.css">
    {{-- <link rel="stylesheet" href="assets_admin/vendor/fonts/fontawesome/css/fontawesome-all.css"> --}}
    <link rel="stylesheet" type="text/css" href="cntt/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets_admin/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets_admin/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets_admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets_admin/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets_admin/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <script src="assets_admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    {{-- <script type="text/javascript" src="public/editor/ckeditor/ckeditor.js"></script> --}}




    <link rel="stylesheet" type="text/css" href="assets_admin/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets_admin/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets_admin/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets_admin/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <script src="editor/ckeditor/ckeditor.js"></script>
    <script src="editor/ckfinder/ckfinder.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
<div class="dashboard-main-wrapper">
  
	@include('header_admin')
  <!-- #header -->
  <div class="rev-slider">
   @yield('content_admin')
</div> <!-- .container -->

@include('footer_admin')
@include('message')
</div>
<!-- jquery 3.3.1 -->
<script src="assets_admin/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets_admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets_admin/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets_admin/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="assets_admin/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets_admin/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets_admin/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets_admin/vendor/charts/morris-bundle/morris.js"></script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="assets_admin/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="assets_admin/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="assets_admin/vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

</body>
</html>
