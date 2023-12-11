$( window ).on("load", function() {
    if (window.location.pathname == '/checkout_dashboard' || window.location.pathname == '/') {
        var memberData = $("#table").data('members-data');
        var headerData = $("#table").data('header-data');

        headerObject = headerData.map(element => {
            return { title: element, data: element }
        });
        headerObject.push({ title: "Details", data: "Details" });

        $('#table').DataTable( {
            data:           memberData,
            deferRender:    true,
            scrollX:        true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
            searching:      false,
            processing:     true,
            paging:         true,
            info:           true,
            bDestroy:       true,
            columns:
                headerObject,
                columnDefs: [
                    {
                        targets: -1, // Index of the last column
                        render: function(data, type, row, meta) {
                            // console.log(row);
                            // if (row.includes('log_id')) {
                            //     console.log("YES");
                            // } else {
                            //     console.log("NO");
                            // }
                            return "<button id='detailsModelButton_"+row['id']+"' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detailModal' data-sensor-id='"+row['id']+"' data-sensor-created-at='"+row['created_at']+"' data-sensor-serial-number='"+row['S/N']+"' data-sensor-date='"+row['Date_Time_of_log_created']+"' data-device-type='"+row['Device_Type']+"'> Details </button>";
                        }
                    }
                 ]
        } );
        let exportID = {"memberId": '', "deviceType": '', 'sensor_date': '', 'serial_number': ''}

        // $('[id*="detailsModelButton_"]').on('click', function(event) {
        $('#table').on('click', 'button', function() {
            exportID.memberId = $(event.target).data('sensor-id');
            exportID.serial_number = $(event.target).data('sensor-serial-number');
            exportID.deviceType = $(event.target).data('device-type');
            exportID.sensor_date = $(event.target).data('sensor-date');
            // 
            var token = window.get_env;

            

            $("#detailsTable > tr").remove();

            var created_at = $(event.target).data('sensor-created-at');
            var serialNumber = $(event.target).data('sensor-serial-number');
            var sensor_date = $(event.target).data('sensor-date');
            var memberData;

            // if (serialNumber.includes("X3") && serialNumber.includes("-")) {
            //     serialNumber = serialNumber.slice(0, -5);
            // }

            console.log(serialNumber);
            console.log(created_at);
            
            $.ajax({
                url: "/api/sensor/"+serialNumber+'/'+created_at,
                type: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('token', token);
                },
                data: {},
                success: function (data) {
                    memberData = data;
                    var table = $('#detailsTable');
                    $("#detailsTable").find("tr:gt(0)").remove();
        
                    $.each( memberData, function( key, value ) {
                        if (typeof value == 'object') {
                            $.each( value, function( k, v ) {
                                    if (['id', 'created_at', 'updated_at', 'sensor_id'].includes(k)) {
                                        return true;
                                    }
                                    var row = $('<tr style="width:100%"></tr>');
                                    var rowF = $('<td></td>').text(k);
                                    var rowInfo = $('<td></td>').text(v);
                    
                                    row.append(rowF);
                                    row.append(rowInfo);
                                    table.append(row);
                            });
                        } else {
                            var row = $('<tr></tr>');
                            var rowField = $('<td></td>').text(key);
                            var rowInformation = $('<td></td>').text(value);
            
                            row.append(rowField);
                            row.append(rowInformation);
                            table.append(row);
                        }
                    });
                },
                error: function () {
                    alert("Log Not Found");
                },
            });
        });

        $('#searchButton').on('click', function(event) {
            // Dropdown inputGroupSelect03
            let selectedField = $('#inputGroupSelect03').find(":selected").text();
            if (selectedField == 'Field') {
                selectedField = '';
            }
            // Search Field searchField
            let searchTerm = $('#searchField').val();

            if (selectedField && searchTerm) {
                $.get('/checkout_dashboard/search', {selectedField, searchTerm}, function (data, textStatus, jqXHR) {
                    $("#table").DataTable().clear().draw();

                    data.members.map((member) => {
                        $('#table').dataTable().fnAddData(member);
                    })
                }).fail(function(error) {
                    console.log(error.responseJSON.message);
                    // if ('message' in error) {
                    alert(error.responseJSON.message); // or whatever
                    // } else {
                    //     location.reload();
                    // }
                });
            } else if (selectedField && !searchTerm){
                alert("Please enter a search term")
            } else if (!selectedField && searchTerm){
                alert("Please select a field to search through")
            } else {
                alert("Please select a field to search through & a search term");
            }


        });

        $(".dropdown-item").on('click', function() {
            var filterBy = $(this).text();
            if (filterBy.includes('Sort By')) {
                filterBy = '';
            }
            // $("body").addClass("loading");
            // window.location.href = '/dashboard/filter?filterBy='+filterBy;

            $.get('/checkout_dashboard/filter', {filterBy}, function (data, textStatus, jqXHR) {
                $("#table").DataTable().clear().draw();

                data.members.map((member) => {
                    $('#table').dataTable().fnAddData( member );
                })

                $("#mainFilter").text(filterBy);
            });
        })

        $("#export").on('click', function() {
            // Dropdown inputGroupSelect03
            let selectedField = $('#inputGroupSelect03').find(":selected").text();
            if (selectedField == 'Field') {
                selectedField = '';
            }

            // Search Field searchField
            let searchTerm = $('#searchField').val();

            // Sort by
            // let sortBy = $("#mainFilter").text();
            // if (sortBy.includes('Sort By')) {
            //     sortBy = '';
            // }

            if (selectedField && searchTerm) {
                window.location.href = '/checkout_export-csv?searchTerm='+searchTerm+'&selectedField='+selectedField+'';
            } else if (selectedField && !searchTerm){
                alert("Please enter a search term")
            } else if (!selectedField && searchTerm){
                alert("Please select a field to search through")
            } else {
                alert("Please select a field to search through & a search term");
            }

            // window.location.href = '/export-csv?sortBy='+sortBy+'&searchTerm='+searchTerm+'&selectedField='+selectedField+'';
            // $.get('/export-csv', {sortBy,searchTerm,selectedField}, function (data, textStatus, jqXHR) {
            // });

        })

        $("#exportID").on('click', function(event) {
            // Dropdown inputGroupSelect03
            let sensorId = exportID.memberId;
            let deviceType = exportID.deviceType;

            delete exportID.memberId;
            delete exportID.deviceType;

            if (!sensorId) {
                alert("No ID Provided")
            }

            window.location.href = '/checkout_export-csv-id?id='+sensorId+'&device_type='+deviceType;
        })

    } else if (window.location.pathname == '/calibration_dashboard' || window.location.pathname == '/') {
        var memberData = $("#table").data('members-data');
        var headerData = $("#table").data('header-data');

        headerObject = headerData.map(element => {
            return { title: element, data: element }
        });
        headerObject.push({ title: "Details", data: "Details" });

        $('#table').DataTable( {
            data:           memberData,
            deferRender:    true,
            scrollX:        true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
            searching:      false,
            processing:     true,
            paging:         true,
            info:           true,
            bDestroy:       true,
            columns:
                headerObject,
                columnDefs: [
                    {
                        targets: -1, // Index of the last column
                        render: function(data, type, row, meta) {
                            return "<button id='detailsModelButton_"+row['id']+"' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detailModal' data-sensor-id='"+row['id']+"' data-sensor-created-at='"+row['created_at']+"' data-sensor-serial-number='"+row['System']+"' data-sensor-date='"+row['Date']+"' > Details </button>";
                        }
                    }
                 ]
        } );
        let exportID = {"memberId": '',  'sensor_date': '', 'serial_number': ''}

        // $('[id*="detailsModelButton_"]').on('click', function(event) {
        $('#table').on('click', 'button', function() {
            exportID.memberId = $(event.target).data('sensor-id');
            exportID.serial_number = $(event.target).data('sensor-serial-number');
            exportID.sensor_date = $(event.target).data('sensor-date');
            // 
            var token = window.get_env;

            $("#detailsTable > tr").remove();

            var created_at = $(event.target).data('sensor-created-at');
            var serialNumber = $(event.target).data('sensor-serial-number');
            var sensor_date = $(event.target).data('sensor-date');
            var memberData;
            
            $.ajax({
                url: "/api/calibration/"+serialNumber+'/'+created_at,
                type: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('token', token);
                },
                data: {},
                success: function (data) {
                    memberData = data;
                    var table = $('#detailsTable');
                    $("#detailsTable").find("tr:gt(0)").remove();
        
                    $.each( memberData, function( key, value ) {
                        if (typeof value == 'object') {
                            $.each( value, function( k, v ) {
                                    if (['id', 'created_at', 'updated_at', 'sensor_id'].includes(k)) {
                                        return true;
                                    }
                                    var row = $('<tr style="width:100%"></tr>');
                                    var rowF = $('<td></td>').text(k);
                                    var rowInfo = $('<td></td>').text(v);
                    
                                    row.append(rowF);
                                    row.append(rowInfo);
                                    table.append(row);
                            });
                        } else {
                            var row = $('<tr></tr>');
                            var rowField = $('<td></td>').text(key);
                            var rowInformation = $('<td></td>').text(value);
            
                            row.append(rowField);
                            row.append(rowInformation);
                            table.append(row);
                        }
                    });
                },
                error: function (error) {
                    console.log(error.responseJSON.message)
                    alert("Log Not Found");
                },
            });
        });

        $('#searchButton').on('click', function(event) {
            // Dropdown inputGroupSelect03
            let selectedField = $('#inputGroupSelect03').find(":selected").text();
            if (selectedField == 'Field') {
                selectedField = '';
            }
            // Search Field searchField
            let searchTerm = $('#searchField').val();

            if (selectedField && searchTerm) {
                $.get('/calibration_dashboard/search', {selectedField, searchTerm}, function (data, textStatus, jqXHR) {
                    $("#table").DataTable().clear().draw();

                    data.members.map((member) => {
                        $('#table').dataTable().fnAddData(member);
                    })
                }).fail(function(error) {
                    console.log(error.responseJSON.message);
                    // if ('message' in error) {
                    alert(error.responseJSON.message); // or whatever
                    // } else {
                    //     location.reload();
                    // }
                });
            } else if (selectedField && !searchTerm){
                alert("Please enter a search term")
            } else if (!selectedField && searchTerm){
                alert("Please select a field to search through")
            } else {
                alert("Please select a field to search through & a search term");
            }


        });

        $(".dropdown-item").on('click', function() {
            var filterBy = $(this).text();
            if (filterBy.includes('Sort By')) {
                filterBy = '';
            }
            // $("body").addClass("loading");
            // window.location.href = '/dashboard/filter?filterBy='+filterBy;

            $.get('/calibration_dashboard/filter', {filterBy}, function (data, textStatus, jqXHR) {
                $("#table").DataTable().clear().draw();

                data.members.map((member) => {
                    $('#table').dataTable().fnAddData( member );
                })

                $("#mainFilter").text(filterBy);
            });
        })

        $("#export").on('click', function() {
            // Dropdown inputGroupSelect03
            let selectedField = $('#inputGroupSelect03').find(":selected").text();
            if (selectedField == 'Field') {
                selectedField = '';
            }

            // Search Field searchField
            let searchTerm = $('#searchField').val();

            // Sort by
            // let sortBy = $("#mainFilter").text();
            // if (sortBy.includes('Sort By')) {
            //     sortBy = '';
            // }

            if (selectedField && searchTerm) {
                window.location.href = '/calibration_export-csv?searchTerm='+searchTerm+'&selectedField='+selectedField+'';
            } else if (selectedField && !searchTerm){
                alert("Please enter a search term")
            } else if (!selectedField && searchTerm){
                alert("Please select a field to search through")
            } else {
                alert("Please select a field to search through & a search term");
            }

            // window.location.href = '/export-csv?sortBy='+sortBy+'&searchTerm='+searchTerm+'&selectedField='+selectedField+'';
            // $.get('/export-csv', {sortBy,searchTerm,selectedField}, function (data, textStatus, jqXHR) {
            // });

        })

        $("#exportID").on('click', function(event) {
            // Dropdown inputGroupSelect03
            let sensorId = exportID.memberId;
            let deviceType = exportID.deviceType;

            delete exportID.memberId;
            delete exportID.deviceType;

            if (!sensorId) {
                alert("No ID Provided")
            }

            window.location.href = '/calibration_export-csv-id?id='+sensorId+'&device_type='+deviceType;
        })

    } else if (window.location.pathname == '/register') {
        $("#message").css("display", "none");
        $("#registerForm").submit(function (event) {
            event.preventDefault();
            var formData = {
              name: $("#name").val(),
              username: $("#username").val(),
              password: $("#password").val(),
              station: $("#station").val(),
              station_id: $("#station_id").val(),
              type: $('#typeListItems').find(":selected").text(),
            };

            console.log(formData);

            $.ajax({
              type: "POST",
              url: "/register",
              data: formData,
              dataType: "json",
              encode: true,
              success: function (data) {
                $("#message").css("display", "block").text("Account Created");
              },
              error: function (data) {
                  var errors = $.parseJSON(data.responseText);
                //   $.each(errors.message, function (key, value) {
                //       console.log(JSON.stringify(key +";"+ value));
                //     });
                  $("#message").css("display", "block").text(errors.message);

                  $("#message").removeClass("alert-success");
                  $("#message").addClass("alert-danger");
              }
            }).done(function (data) {
              console.log(JSON.stringify(data));
            });


        });
    } else if (window.location.pathname == '/users') {
        var memberData = $("#user_table").data('users-data');
        console.log(memberData);
        var headerData = ['name','username','station','station_id','api_token','created_at','updated_at','type'];

        headerObject = headerData.map(element => {
            return { title: element, data: element }
        });

        $('#user_table').DataTable( {
            data:           memberData,
            deferRender:    true,
            scrollX:        true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
            searching:      false,
            processing:     true,
            paging:         true,
            info:           true,
            bDestroy:       true,
            columns:
                headerObject,
                columnDefs: []
        } );
    }

    // $("#roleListItems").on('click', function() {
    //     let selectedRole = $('#roleListItems').find(":selected").text();
    //     console.log("selectedRole");
    //     console.log(selectedRole);
    //     $("#mainFilter").text(filterBy);
    // })


    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }
    });
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


