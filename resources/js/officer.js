
/**
 * Method for inserting officer details 
 */
APPOINTMENT.officer.insertOfficerDetail = function() {

    $('#add_officer_form').on('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(this);

        $("#add_officer_form > div > small").text("");
        $("#add_officer_form > div > small").addClass('hidden');
        $("#add_officer_form > div > div > small").text("");
        $("#add_officer_form > div > div > small").addClass('hidden');
    
        $.ajax({
            type: 'POST',
            url: '/officer',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function(data) {
                if(data.status === 'error') {
                    $.each(data.errors, function(key, value) {
                        $("#add_officer_form > div > small[name="+key+"]").text(value);
                        console.log(key+": "+value);
                        $("#add_officer_form > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');

                        if(key === 'start_time' || key === 'end_time') {
                            $("#add_officer_form > div > div > small[name="+key+"]").text(value);
                            $("#add_officer_form > div > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');
                        }
                    });
                } else {
                    alert(data.success);
                    location.reload();
                }
            },

            error: function(request, error) {
                //let errors = jQuery.parseJSON(request.responseText);
            }

        });
    });

}





APPOINTMENT.officer.toggleOfficerStatus = function() {
    $('.toggler').on('click', function(event) {
        const id = $(this).data('id');
        const status = $(this).data('status');
        const token = $(".toggle_status > input[type='hidden'").val();

        $.ajax({
            type: 'POST',
            url: '/toggleOfficerStatus',
            data: {
                _token: token,
                id: id,
                status: status
            },

            success: function(data, status, xhr) {
                 if(data.success) 
                     location.reload();

            },

            error: function(request, error) {
                alert("Somting went wrong. Try again!");
            }

        });


        event.preventDefault();
    });
}

APPOINTMENT.officer.editOfficer = function() {
    $('.update_officer_btn').on('click', function(event){
        let id = $(this).data('id');
        let token = $(this).data('token');
        // fill model with detail of current officer
        getOfficerDetailByID(id, token);
    });

    $('#update_officer_form').on('submit', function(event) {

        const formData = new FormData(this);

        $("#update_officer_form > div > small").text("");
        $("#update_officer_form > div > small").addClass('hidden');
        $("#update_officer_form > div > div > small").text("");
        $("#update_officer_form > div > div > small").addClass('hidden');

        $.ajax({
            type: 'POST',
            url: '/editOfficer',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function(data) {
                if(data.status === 'error') {
                    $.each(data.errors, function(key, value) {
                        $("#update_officer_form > div > small[name="+key+"]").text(value);
                        $("#update_officer_form > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');

                        if(key === 'workStartTime' || key === 'workEndTime') {
                            $("#update_officer_form > div > div > small[name="+key+"]").text(value);
                            $("#update_officer_form > div > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');
                        }
                    });
                } else {
                    alert(data.success);
                    location.reload();
                }
            },

            error: function(request, error) {
                //let errors = jQuery.parseJSON(request.responseText);
            }

        });

        event.preventDefault();
    });
}

function getOfficerDetailByID(id, token) {
    $.ajax({
        type: 'POST',
        url: '/getOfficerDetailByID',
        data: { 
            _token: token,
            id: id 
        },

        success: function(data, status, xhr) {
            $.each(data.officer, function(key, value) {
                $("#update_officer_form > div > input[name="+key+"]").val(value);

                if(key === 'workStartTime' || key === 'workEndTime') {
                    $("#update_officer_form > div > div > input[name="+key+"]").val(value.slice(0, -3));
                }
            });

            $.each(data.workDays, function(key, value) {
                $("#update_officer_form > div > input[value='"+value.DAYOFWEEK+"'").attr('checked', true);
            });
            $("#update_officer_form").append("<input type='hidden' name='id' value='"+id+"'>");
        },

        error: function(request, error) {
            alert("Somting went wrong! Try again!");
        }
    });
}