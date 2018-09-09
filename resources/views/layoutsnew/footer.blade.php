<div class="footer" style="bottom:0;position:relative;padding:10px;background:#ddd;width:100%;border-top:0.7px solid #f00">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span12">Copyright &copy;2018 All rights reserved | <a href="https://www.telkomsel.com/">Telkomsel</a>. </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /footer-inner -->
</div>
<!-- /footer -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
@if(Request::is('*/admin*'))
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/admin/bootstrap-4-navbar.js') }}"></script>
    <script src="{{ asset('js/admin/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/admin/chart.min.js') }}"></script>
    <script src="{{ asset('js/admin/full-calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/admin/base.js') }}"></script>
    <!-- <script src="{{ asset('js/admin/bootstrap.js') }}"></script> -->
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- App scripts -->
    <script type="text/javascript">
        $(document).on("submit", ".delete-me", function(e){
            // console.log('hai');
            // return false;
            return confirm("Do you want to delete this item?");
        });
        $(document).ready(function() {
            $( ".datetimepicker-input" ).each(function( index ) {
                console.log( index + ": " + $( this ).val() );
                var date = moment($( this ).val(), 'YYYY-MM-DD').toDate();
                console.log(date);
                $(this).datetimepicker({
                    date:date,
                    format: 'YYYY-MM-DD'
                });
            });
            $('select').not('.phpdebugbar-datasets-switcher').select2({
                theme: "bootstrap"
            });
        });
    </script>
    @stack('scripts')
@else
    <!-- <script src="{{ asset('js/frontend/js/jquerynew.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/frontend/js/bootstrap.js') }}"></script> -->
    <!-- <script src="{{ asset('js/frontend/js/owl.carousel.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/frontend/js/main.js') }}"></script> -->


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- <script src="//code.jquery.com/jquery.js"></script> -->
    @yield('js')
    <script>
        function login(obj){
            window.location = obj;
        }
    </script>
@endif
</body>

</html>
