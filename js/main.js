/**
 * Created by Milic_lenovo on 28.5.2017.
 */

// show modal form for creating City in list of cities
$(function () {
    //get click event of create button
    $('#modalCityButton').click(function () {
        $('#createCity').modal('show')
            .find('#modalFormContent')
            .load($(this).attr('value'));
    })
});

// show modal from (popup) for creating add

$(function () {
    //get click event of create button
    $('#modalCreateAdvertButton').click(function () {
        $('#createAdvert').modal('show')
            .find('#modalContentCreate')
            .load($(this).attr('value'));
    })
});

