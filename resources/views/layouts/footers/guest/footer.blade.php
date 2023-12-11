  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="https://networds.co.za/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
          </a>
          <a href="https://networds.co.za/our-team/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
          </a>
          <a href="https://networds.co.za/what-we-do/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Services
          </a>
          <a href="https://networds.co.za/networds-blog/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
          </a>
          <a href="https://networds.co.za/contacts/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Contact Us
          </a>
       </div>
      </div>
      @if (!auth()->user() || \Request::is('static-sign-up')) 
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              © <script>
                  document.write(new Date().getFullYear())
              </script>, made by
              <a href="https://networds.co.za/" class="font-weight-bold" target="_blank">Netwrods</a><a style="color: #252f40;" href="https://networds.co.za/" class="font-weight-bold ml-1" target="_blank"></a>
            </p>
          </div>
        </div>
      @endif
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
