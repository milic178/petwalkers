/**
 * Created by Milic_lenovo on 28.5.2017.
 */
$(function () {
    //get click event of create button
   $('#modalCityButton').click(function () {
       $('#createCity').modal('show')
           .find('#modalFormContent')
           .load($(this).attr('value'));
   })
});