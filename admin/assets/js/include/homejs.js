addContactMessage = (form) => {
    var formData = new FormData(form);

    if (formData.get('name').trim() != '') {
        if (formData.get('email').trim() != '') {
            if (formData.get('subject').trim() != '') {
                if (formData.get('message').trim() != '') {
                    $.ajax({
                        method: "POST",
                        url: "server/api.php?function_code=addcontact",
                        data: formData,
                        success: function ($data) {
                            console.log($data);
                            successToast();
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                            console.log(`Error ${error}`);
                        }
                    });
                } else { errorMessage("Please Enter Message"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}

addtoCartProductwithQty = (pid, price) => {

    var qty = document.getElementById('qty').value;
    var data = {
        pid: pid,
        price: price,
        qty: qty,
    };

    $.ajax({
        method: "POST",
        url: "pages/add_items_tocart.php?pid=" + pid + "&product_price=" + price + "&qty=" + qty,
        data: data,
        success: function ($data) {
            console.log($data);
            if ($data === '"Fail"') {
                window.location.href = 'admin/login.php';
            } else {
                successToastCart();
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

addtoCartProduct = (pid, price) => {

    var data = {
        pid: pid,
        price: price,
    };

    $.ajax({
        method: "POST",
        url: "add_to_cart.php?pid=" + pid + "&product_price=" + price,
        data: data,
        success: function ($data) {
            console.log($data);
            if ($data === '"Fail"') {
                window.location.href = 'admin/login.php';
            } else {
                successToastCart();
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

qtryChange = (ele, cart_id, field) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        cart_id: cart_id,
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: "server/api.php?function_code=editQty",
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

checkOut = (form)  => {
    var formData = new FormData(form);

    if (formData.get('holder_name').trim() != '') {
        if (formData.get('card_num').trim() != '') {
            if (formData.get('expire').trim() != '') {
            if (formData.get('cvv').trim() != '') {

                    if (formData.get('shipping_address').trim() != '') {
                        if (formData.get('billing_address').trim() != '') {

                            if (formData.get('total') > 0) {

                                var data = {
                                    customer_id: formData.get('customer_id'),
                                    shipping_address: formData.get('shipping_address'),
                                    billing_address: formData.get('billing_address'),
                                    total: formData.get('total'),
                                }

                                $.ajax({
                                    method: "POST",
                                    url: "server/api.php?function_code=checkoutOrder",
                                    data: data,
                                    success: function ($data) {
                                        console.log($data);
                                        successToastRedirect("orders.php");
                                    },
                                    error: function (error) {
                                        console.log(`Error ${error}`);
                                    }
                                });

                            } else { errorMessage("Please Select adleast one Item to Buy!"); }

                        } else { errorMessage("Please Enter Billing Address"); }
                    } else { errorMessage("Please Enter Shipping Address"); }
  
            } else { errorMessage("Please Enter CVV Number"); }
            } else { errorMessage("Please Enter Expire Details"); }
        } else { errorMessage("Please Enter Card Number"); }
    } else { errorMessage("Please Enter Holder Name"); }

}


placeOrder = (customer_id, total) => {

    var data = {
        customer_id: customer_id,
        total: total,
    }

    if (total > 0) {


        $.ajax({
            method: "POST",
            url: "server/api.php?function_code=placeOrder",
            data: data,
            success: function ($data) {
                console.log($data);
                successToastRedirect("order.php");
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    }else { errorMessage("Please Add item to cart!"); }

}

cartDelete = (id, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure? this prodcut will be delete',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id: id,
                table: table,
                id_fild: id_fild,
            }

            console.log(data);

            $.ajax({
                method: "POST",
                url: "server/api.php?function_code=permanantDeleteData",
                data: data,
                success: function ($data) {
                    console.log($data);
                    successToastDelete();
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })

}
//profile changers

changeEmail = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_email').trim() != '') {
        if (formData.get('new_email').trim() != '') {
            if (checkEmail(formData.get('current_email'), formData.get('customer_id')) > 0) {

                var data = {
                    id: formData.get('customer_id'),
                    field: 'email',
                    value: formData.get('new_email'),
                    id_fild: 'customer_id',
                    table: 'customer',
                }

                $.ajax({
                    method: "POST",
                    url: "server/api.php?function_code=updateData",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastwithLogout();
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Current Emaiil is Wrong!"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}


changePassword = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPassword(formData.get('current_password'), formData.get('customer_id')) > 0) {

                        var data = {
                            id: formData.get('customer_id'),
                            field: 'password',
                            value: formData.get('new_password'),
                            id_fild: 'customer_id',
                            table: 'customer',
                        }

                        $.ajax({
                            method: "POST",
                            url: "server/api.php?function_code=updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogout();
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

checkPassword = (password, customer_id) => {
    const data = {
        password: password,
        customer_id: customer_id,
    }
    var values;
    $.ajax({
        method: "POST",
        url: "server/api.php?function_code=checkPassword",
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

function checkEmail(email, customer_id) {
    const data = {
        email: email,
        customer_id: customer_id,
    }
    var values;

    $.ajax({
        method: "POST",
        url: "server/api.php?function_code=checkEmail",
        data: data,
        async: false,
        success: function (data) {
            console.log(data);
            values = data;

        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

    return values;
}


updateDataFromHome = (ele, id, field, table, id_fild) => {

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
            callUpdateRequestFromHome(data);
        }

    } else if (field == 'phone') {
        if (phonenumber(val)) {
            callUpdateRequestFromHome(data);
        }
    } else {
        callUpdateRequestFromHome(data);
    }

}

updateStatusFromHome = (value, id, field, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id_fild: id_fild,
                id: id,
                field: field,
                value: value,
                table: table,
            }


            callUpdateRequestFromHome(data);

            Swal.fire(
                'Canceled!',
                'Your file has been Canceled.',
                'success'
            )
        }
    })
}

deleteDataFromHome = (id, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id: id,
                table: table,
                id_fild: id_fild,
            }

            console.log(data);

            $.ajax({
                method: "POST",
                url: "server/api.php?function_code=deleteData",
                data: data,
                success: function ($data) {
                    console.log($data);
                    successToastwithLogout();
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}

callUpdateRequestFromHome = (data) => {

    $.ajax({
        method: "POST",
        url: "server/api.php?function_code=updateData",
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


search = (form) => {
    var formData = new FormData(form);
    var keyword = formData.get('keyword');
    window.location.href = "search.php?keywords=" + keyword;
}