     $(document).ready(function() {
        $('.editValue').click(function() {
            var id = $(this).val();
            var name = $(this).parent().prev("td").prev("td").prev("td").text();
            var email = $(this).parent().prev("td").prev("td").text();
            var role = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#role').val(role);
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var email = $('#email').val();
            var name = $('#name').val();
            var role = $('#role').val();
            if (email != '' && name != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',
                    url : '/admin/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        name : name,
                        email : email,
                        role : role
                    }
                }).done(function(data) {
                     $('#myModal').modal('hide');
                    $(".user"+id).replaceWith(
                                    ("<tr class='user" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.role + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Edit</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Delete</button></td></tr>")
                                );
                })
            }
        })
        $(document).on('click', '.deleteValue', function(e) {
                        e.preventDefault();
                        var id = $(this).val();
                        $.ajax({
                                type : 'DELETE',
                                url : '/admin/'+id,
                                data : {
                                _token: $('input[name=_token]').val(),
                                id : id
                            }
                        }).done(function(data) {
                            $("tr.user"+id).remove();
                        })
                    });
        $('input[name=key]').keyup(function() {
                        var key = $(this).val();
                        setTimeout(function() {
                            $.ajax({
                            url: '/search',
                            type : 'GET',
                            data : {
                                key : key
                            },
                            success: function(response) {
                                $('tbody').html(response);
                            }   
                        })  
                        },1000);
                    });
     })