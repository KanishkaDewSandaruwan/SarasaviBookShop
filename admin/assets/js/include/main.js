/*.............................................................. Grid View ..............................................................*/

window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});



/*.............................................................. Settings Data..............................................................*/

//settings


upImage = (cat_id) => {
    $('#formFile' + cat_id)[0].click();
}

settingsUpdate = (ele, field) => {

    var val = document.getElementById(ele.id).value;

    var data = {
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: "../server/api.php?function_code=changesettings",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

/*.............................................................. Login..............................................................*/

login = (myForm) => {
    var formData = new FormData(myForm);

    $.ajax({
        method: "POST",
        url: "../server/api.php?function_code=login",
        data: formData,
        success: function ($data) {
            console.log($data);
            if ($data == 'admin') {
                window.location.href = 'index.php';
            } else if($data == 'customer') {
                window.location.href = '../index.php';
            }else{
                iziToast.error({
                    timeout: 2000,
                    title: 'Error',
                    message: "Username or Password is Wrong",
                });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

/*.............................................................. Update Data..............................................................*/


updateData = (ele, id, field, table, id_fild) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: val,
        table: table,
    }

    if (field == 'email') {
        if (emailvalidation(val)) {
            callUpdateRequest(data);
        }

    } else if (field == 'phone') {
        if (phonenumber(val)) {
            callUpdateRequest(data);
        }
    } else {
        callUpdateRequest(data);
    }
}

callUpdateRequest = (data) => {

    $.ajax({
        method: "POST",
        url: "../server/api.php?function_code=updateData",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

//change password

changePasswordAdmin = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPasswordAdmin(formData.get('current_password'), formData.get('email')) > 0) {

                        var data = {
                            id: formData.get('email'),
                            field: 'password',
                            value: formData.get('new_password'),
                            id_fild: 'email',
                            table: 'customer',
                        }

                        $.ajax({
                            method: "POST",
                            url: "../server/api.php?function_code=updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogoutInAdmin();
                            },
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}

checkPasswordAdmin = (password, email) => {
    const data = {
        password: password,
        email: email,
    }
    var values;
    $.ajax({
        method: "POST",
        url: "../server/api.php?function_code=checkPasswordByEmail",
        data: data,
        async: false,
        success: function (data) {
            values = data;
            console.log(data);
        },

        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
}


