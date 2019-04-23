<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>{{  config('APP_NAME', 'Mosaad & Ashraf') }}</title>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.min.css')}}" media=print rel="stylesheet">
    <!-- Datatable CSS -->
    <link href="{{ asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Form CSS -->
    <link href="{{ asset('dist/css/pages/file-upload.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Sweet Alert Notification -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ config('APP_NAME', 'Mosaad & Ashraf') }}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar ">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <img src="{{ asset('images/logo.png') }}" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{ asset('images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->
                         <img src="{{ asset('images/logo-text.png') }}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        @if(isset(Auth::user()->image))
                        <div><img src="{{ asset( 'storage/'. Auth::user()->image ) }} " alt="user-img" class="img-circle"></div>
                        @else
                        <div><img src="{{ asset('assets/images/users/def-user.png') }} " alt="user-img" class="img-circle"></div>
                        @endif
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="{{route('logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">موديلات </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('models/show')}}">عرض</a></li>
                                <li><a href="{{url('models/add')}}">اضافه </a></li>
                                <li><a href="{{url('models/types')}}">انواع موديلات </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">اسطمبات</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('stamps/show')}}">عرض</a></li>
                            <li><a href="{{url('stamps/add')}}">اضافه </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-list"></i><span class="hide-menu">طلبات</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('home')}}">عرض</a></li>
                                <li><a href="{{url('orders/add')}}">اضافه </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-users"></i><span class="hide-menu">مستخدمين </span></a>
                        <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('users/show')}}">عرض</a></li>
                                <li><a href="{{route('users/add')}}">اضافه </a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">برنامج حساب الطلبات</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <a  href="{{url('orders/add')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> اضافه طلب جديد</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">

                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 {{config('APP_NAME', 'Mosaad & Ashraf')}} by Mina Nabil
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- This is data table -->
    <script src="{{ asset('assets/node_modules/datatables/datatables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <!-- End export script -->
    <!-- Form JS -->
    <script src="{{ asset('dist/js/pages/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{ asset('assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script  type="text/javascript">

    var init = 0;

    @if(isset($ModelStamps))

    init = {{count($ModelStamps)}} - 1

    @endif

    @if(isset($Stamps))
    var room = init + 1;

    function education_fields() {

        room++;
        var objTo = document.getElementById('dynamicContainer')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        var concatString = "";
        concatString += '<div class="row">  <div class="col-sm-2 nopadding"><div id="selectHolder" class="form-group">\
         <select class="select2 form-control  custom-select" style="height:50px;" id="stamp' + room +'" name="stamp[]">';
        @foreach($Stamps as $stamp)
        concatString += ' <option value="{{ $stamp->id }}">{{$stamp->STMP_SRNO}}</option> ';
        @endforeach
        concatString +=' </select> </div> </div> <div class="col-sm-2 nopadding"> <div class="form-group">  <input type="number" step="0.01" class="form-control" id="red" name="red[]" value="" placeholder="اللون الاحمر"> </div> </div> <div class="col-sm-1 nopadding"> <div class="form-group">  <input type="number" step="0.01" class="form-control" id="red" name="rdmm[]" value="" placeholder="مللي "> </div> </div>'
        concatString += ' <div class="col-sm-2 nopadding"> <div class="form-group"> <input type="number" class="form-control" id="yellow" step="0.01" name="yellow[]" value="" placeholder="اللون الاصفر">  </div></div>  <div class="col-sm-1 nopadding"> <div class="form-group">  <input type="number" step="0.01" class="form-control" id="yellow" name="ylmm[]" value="" placeholder="مللي "> </div> </div>  <div class="col-sm-2 nopadding"> <div class="form-group">  <input type="number" step="0.01" class="form-control" id="white" name="white[]" value="" placeholder="اللون الابيض">  </div> </div> ';
        concatString += '<div class="col-sm-2 nopadding">  <div class="form-group">   <div class="input-group">  <input type="number" step="0.01" class="form-control" id="white" name="whmm[]" value="" placeholder="مللي ">  <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div></div></div><div class="clear"></div></row>';

        divtest.innerHTML = concatString;

        objTo.appendChild(divtest);

        var target = document.getElementById('stamp' + room);
        console.log(target)
        $('#stamp'+room).select2();

    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    @endif





    @if(isset($orderItems))

    init = {{count($orderItems)}} - 1

    @endif

    @if(isset($isDynamicForm))
    var room = init + 1;

    function education_fields() {

        room++;
        var objTo = document.getElementById('dynamicContainer')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        var concatString = "";
        concatString += '<div class="row">  <div class="col-sm-8 nopadding"><div id="selectHolder" class="form-group">\
         <select class="select2 form-control  custom-select" style="height:50px;" id="model' + room +'" name="MODL_ID[]">';
        @foreach($models as $model)
        concatString += ' <option value="{{ $model->id }}">{{$model->MODL_SRNO}}</option> ';
        @endforeach
        concatString +=' </select> </div> </div> <div class="col-sm-4 nopadding">  <div class="form-group">   <div class="input-group">     <input type="number" step="1" class="form-control" id="red" name="ORIT_CONT[]"  placeholder="Item Count " required><div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div></div></div><div class="clear"></div></row>';

        divtest.innerHTML = concatString;

        objTo.appendChild(divtest);

        var target = document.getElementById('model' + room);
        console.log(target)
        $('#model'+room).select2();

    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    @endif

    </script>
    <!-- Start Table Search Script -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(function() {
            var table = $('#example').DataTable({

                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [

                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });

    $(function() {
        $('#myTable2').DataTable();
        $(function() {
            var table = $('#example').DataTable({

                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [

                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });


    $('#example23').DataTable({
      "ordering": false,
        dom: 'Bfrtip',
        buttons: [
          {
              extend: 'print',
              text: 'اطبع الطلب',
              title: 'مسعد و اشرف',
              customize: function ( win ) {

                $(win.document.body)
                .prepend('<center><img src="{{asset('images/dahab-logo.png')}}" style="position:absolute; margin-left: auto; margin-right: auto; left: 0; right: 0;" /></center>')
                .css( 'font-size', '24px' )

                .find( 'thead' ).prepend('<tr>' + $('#dt-header').val() + '</tr>')

                //$('#stampHeader' ).addClass( 'stampHeader' );
                $(win.document.body).find( 'table' )
                       .css( 'border', 'solid')
                       .css( 'margin-top', '20px')
                       .css( 'font-size', 'inherit' );


               $(win.document.body).find('th')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px')
               .css('font-size','inherit')

               $(win.document.body).find('td')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px');

               $(win.document.body).find('tr')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px')


                }
            }
        ]
    } );

    $('#example233').DataTable({
      "ordering": false,
        dom: 'Bfrtip',
        buttons: [
          {
              extend: 'print',
              text: 'اطبع الطلب',
              title: 'مسعد و اشرف',
              customize: function ( win ) {

                $(win.document.body)
                  .prepend('<img src="{{asset('images/dahab-logo.png')}}" style="position:absolute; margin-left: auto; margin-right: auto; left: 0; right: 0; opacity:0.4; " />')
                .css( 'font-size', '24px' )
                .find( 'thead' ).prepend('<tr>' + $('#dt-header').val() + '</tr>')

                //$('#stampHeader' ).addClass( 'stampHeader' );

                $(win.document.body).find( 'table' )
                       .css( 'margin-top', '20px')
                       .css( 'border', 'solid')
                       .css( 'font-size', 'inherit' );

               $(win.document.body).find('th')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px')

               $(win.document.body).find('td')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px');

               $(win.document.body).find('tr')
               .css('border','solid')
               .css('border','!important')
               .css('border-width','1px')


          }

        },
        ]
    });
    $(' .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');


    // File Upload JS
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    $(function () {
     // For select 2
    $(".select2").select2();
    $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });



    </script>
    <!-- End Table Search Script -->
</body>

</html>
