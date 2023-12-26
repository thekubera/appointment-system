APPOINTMENT.visitor.insertVisitorDetail = function() {

    $('#add_visitor_form').on('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(this);

        $("#add_visitor_form > div > small").text("");
        $("#add_visitor_form > div > small").addClass('hidden');
        $("#add_visitor_form > div > div > small").text("");
        $("#add_visitor_form > div > div > small").addClass('hidden');
    
        $.ajax({
            type: 'POST',
            url: '/visitor',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function(data) {
                if(data.status === 'error') {
                    $.each(data.errors, function(key, value) {
                        $("#add_visitor_form > div > small[name="+key+"]").text(value);
                        console.log(key+": "+value);
                        $("#add_visitor_form > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');
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

    APPOINTMENT.visitor.toggleVisitorStatus = function() {
        $('.toggler').on('click', function(event) {
            const id = $(this).data('id');
            const status = $(this).data('status');
            const token = $(".toggle_status > input[type='hidden'").val();

            $.ajax({
                type: 'POST',
                url: '/toggleVisitorStatus',
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

}

APPOINTMENT.visitor.editVisitor = function() {
    $('.update_visitor_btn').on('click', function(event){
        let id = $(this).data('id');
        let token = $(this).data('token');
        // fill model with detail of current officer
        getVisitorDetailByID(id, token);
    });

    $('#update_visitor_form').on('submit', function(event) {

        const formData = new FormData(this);

        $("#update_visitor_form > div > small").text("");
        $("#update_visitor_form > div > small").addClass('hidden');
        $("#update_visitor_form > div > div > small").text("");
        $("#update_visitor_form > div > div > small").addClass('hidden');

        $.ajax({
            type: 'POST',
            url: '/editVisitor',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function(data) {
                if(data.status === 'error') {
                    $.each(data.errors, function(key, value) {
                        $("#update_visitor_form > div > small[name="+key+"]").text(value);
                        $("#update_visitor_form > div > small[name="+key+"]").addClass('text-red-500').removeClass('hidden');
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


function getVisitorDetailByID(id, token) {
    $.ajax({
        type: 'POST',
        url: '/getVisitorDetailByID',
        data: { 
            _token: token,
            id: id 
        },

        success: function(data, status, xhr) {
            $.each(data, function(key, value) {
                $("#update_visitor_form > div > input[name="+key+"]").val(value);
            });

            $("#update_visitor_form").append("<input type='hidden' name='id' value='"+id+"'>");
        },

        error: function(request, error) {
            alert("Somting went wrong! Try again!");
        }
    });
}