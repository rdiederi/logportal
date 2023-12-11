
{{-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl my-3 fixed-end" id="sidenav-main"> --}}
<aside class="sidenav z-index-1 navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end ms-3" id="sidenav-main">
  <div class="sidenav-header d-flex justify-content-center ">
    {{-- @include('components.fixed-plugin') --}}
    <a class="align-items-center d-flex " href="{{ route('dashboard') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-circle align-items-center " style="padding-right: 5%" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
      <div class="mt-3 align-items-center justify-content-center row">
            <h5>{{ $user->name}}</h5>
            <p>Industry Focued</p>
      </div>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item d-flex text-center">
        <a class="nav-link  flex-fill active" href="{{ url('google-ads-dashboard') }}">
          <span class="align-items-center nav-link-text ms-1"></i>Google Ads Management</span>
        </a>
      </li>
      <li class="nav-item d-flex text-center">
        <a class="nav-link  flex-fill active" href="{{ url('google-analytics-dashboard') }}">
          <span class="align-items-center nav-link-text ms-1"></i>Google Analytics Management</span>
        </a>
      </li>
      {{-- <li class="nav-item d-flex text-center">
        <a class="nav-link  flex-fill" href="{{ url('social-media-dashboard') }}">
          <span class="align-items-center nav-link-text ms-1"></i>Social Media Management</span>
        </a>
      </li> --}}
    </ul>
    {{-- Calender --}}
  </div>
</aside>
