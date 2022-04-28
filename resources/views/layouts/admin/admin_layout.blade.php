<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('admin_layout.name', 'Welcome To | Dashboard') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  @yield('css-content')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('layouts.admin.partial.navbar')
    <!-- Sidebar Content -->
    @include('layouts.admin.partial.sidebar')
    @yield('body-content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 </strong>
    All rights reserved.
    
</footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script> -->
<!-- Bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
@yield('js-content')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('assets/dist/js/pages/dashboard2.js')}}"></script> -->
<script>
    $("#single").select2({
        placeholder: "Select",
        allowClear: true
    });
    $("#multiple").select2({
        placeholder: "Select",
        allowClear: true
    });
</script> 
<script>
  $(document).ready(function() {
    $(".status_change").change(function() {
    var id = $(this).data('id');
    var sts = $(this).val();

      $.ajax({
                url:'{{route("change.project.status")}}',
                type:'get',
                data:{id:id,sts:sts,_token: '{{csrf_token()}}'},

                success: function(data){
                 location.reload();
                },
                error: function(xmlerr){

                }
    });
    });
    $("#addicon").click(function() {
        var total_element = $(".iconelement2").length;

    // last <div> with element class id
    var lastid = $(".iconelement2:last").attr("id");
    var split_id = lastid.split("_");
    var nextindex = Number(split_id[1]) + 1;

    $(".iconelement2:last").after("<div class=' row iconelement2' id='div_"+ nextindex +"'></div>");

    $("#div_" + nextindex).append('<div class="col-md-4 pt-2"><div class="form-group"><div class="form-line"><input type="text" class="form-control" name="name[]" placeholder="Enter Name"></div></div></div><div class="col-md-7 pt-2"><div class="form-group"><div class="form-line"><input type="text" class="form-control" name="value[]" placeholder="Enter Link" required></div></div></div><div class="col-md-1 pt-2"><i class="fa fa-times remove3" id="remove_'+ nextindex +'"></i></div>');
});
    $('.element2').on('click','.remove3',function(){

        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];

            // Remove <div> with id
            $("#div_" + deleteindex).remove();


        });
    $(".social_edit").on('click', function(){
            // alert("hi");
            var id = $(this).data('id');
            // alert(id);    
            $.ajax({
                url:'{{route("get.social")}}',
                type:'post',
                data:{id:id,_token: '{{csrf_token()}}'},

                success: function(data){
            // alert(data);
            $('#social_id').val(id);                       
            $('#content').html(data);  
        },
        error: function(xmlerr){

        }
    });

        }) ;
    ///////////////////
    $(".deleteBtn").on('click',function(){
       var url=$(this).data('url');
       $('#deleteModal').modal('show');
       $('#deleteForm').attr('data-url',url);
   });
    /////////////
    $("#deleteForm").on('click',function(){
       var url=$(this).data('url');
       var canD=$('#canDel').val();
       $.ajax({
        url:url,
        type:'get',
        data:{candel:canD},

        success: function(res){
            
            if(res=='1')
            {
                location.reload();
            }else{
                
                $('#txt').text('There are another data releated with this content are you sure want to delete all details!!').css('color','red');
                $('#canDel').attr('value','Y');
            }

        },
        error: function(xmlerr){

        }
    });
   });
});
</script> 
</body>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
    </div>
    <div class="modal-body">
     <p id="txt">Are You Sure ?</p>
 </div>
 <div class="modal-footer">
    <input type="hidden" id="canDel" value="N">
    <button type="button" class="btn btn-primary" data-url="" id="deleteForm">Yes</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
</div>
</div>

</div>
</div>
</html>
