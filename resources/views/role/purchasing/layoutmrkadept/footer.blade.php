<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
            arjayasite.site
        </span>
        @if(auth()->user()->departement == "Prodev")
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
            <a style="text-decoration:none; cursor:auto" class="text-muted d-block text-center text-sm-start d-sm-inline-block" href="/kadeptprodevnonppn/kadeptlistjobnonppn">
                @    
            </a>    
            <a style="text-decoration:none; cursor:auto" class="text-muted d-block text-center text-sm-start d-sm-inline-block" href="/kadeptprodevnonppn/kadeptjobnonppn">
                2024    
            </a>    
        </span>
        @elseif(auth()->user()->departement != "Prodev")
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
            <a style="text-decoration:none; cursor:auto" class="text-muted d-block text-center text-sm-start d-sm-inline-block" href="/jobapprovenonppn">
                @    
            </a>    
            <a style="text-decoration:none; cursor:auto" class="text-muted d-block text-center text-sm-start d-sm-inline-block" href="#" >
                2024    
            </a>    
        </span>
        @endif

    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ URL::asset('frontend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ URL::asset('frontend/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('frontend/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ URL::asset('frontend/assets/js/off-canvas.js') }}"></script>
<script src="{{ URL::asset('frontend/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ URL::asset('frontend/assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ URL::asset('frontend/assets/js/dashboard.js') }}"></script>
<script src="{{ URL::asset('frontend/assets/js/todolist.js') }}"></script>
<!-- End custom js for this page -->

</body>

</html>