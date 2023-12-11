@extends('layouts.user_type.auth')

@section('content')

<script>
  window.get_env = @json(session('MIX_GET_ENV'));
</script>

<div style="text-align: center; justify-content: middle; padding-top: 20%" class="overlay align-middle">
    <div class="spinner-border align-middle" role="status">
    </div>
</div>
  <main class="main-content position-relative mt-1 border-radius-lg ">
    <div class="container-fluid">
      <div class="row">
          <div class="col">
            <div class="card-body">
                <div>
                    <h3>Filters</h3>
                </div>
                <form class="input-group mb-3">
                    <div class="input-group mb-3">
                        <div>
                            <input value="{{ old('searchField') }}" id="searchField" type="text" class="form-control" style="height: 70%" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <div>
                            <select class="custom-select" id="inputGroupSelect03" style="height: 70%">
                                <option selected>Field</option>
                                @foreach ( $headers as $header )
                                    <option value="{{$header}}">{{$header}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-prepend">
                            <button id="searchButton" style="height: 70%" class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <div class="col">
            <div class="card-body">
                <div>
                    <h3>Export</h3>
                </div>
                {{-- <div class="btn-group">
                    <button id="mainFilter" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach ( $headers as $header )
                            <li><button class="dropdown-item" type="button">{{$header}}</button></li>
                        @endforeach
                    </ul>
                </div> --}}
                <div class="btn-group">
                    <span id="export" class="btn btn-success btn">Export to CSV</span>
                </div>
            </div>
          </div>
        </div>
    </div>


    <div class="container-fluid" style="height: 100%">
        <div class="row" style="height: 100%">
            <div class="col-12" style="height: 100%">
                <div class="card" style="height: 100%">
                    <div class="card-body px-0 mt-2 " style="height: 100%">
                        <table id='table' class="table-responsive p-2 m-3" data-members-data="{{json_encode($members)}}" data-header-data="{{json_encode($headers)}}">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom fade" id="detailModal" data-sensor-id="" data-device-type="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div style="padding: 0%" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Member Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="btn-group">
            <span id="exportID" class="btn btn-success btn">Export to CSV</span>
          </div>
          <div class="modal-body">
            <table id='detailsTable' class="table-responsive p-2 m-3">
            </table>
            {{-- <table id="detailsTable" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary opacity-7 px-2">Field</th>
                    <th class="text-secondary opacity-7 px-2">Information</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
          </div> --}}
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  @endsection
