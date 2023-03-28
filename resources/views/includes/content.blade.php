 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="">
    @yield('page_header')

    <!-- Main content -->
 <section class="content container-fluid" >
    @yield('modals')
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->