$(document).ready(function() {
  //Updating
  $('.edit-row').on('click', function(){
    $('.modal').modal()
    $('#main-form')[0].reset() // reset the form
    const payload = $(this).data('payload')

    // $('input[name=fname]').removeAttr('required');
    // $('input[name=lname]').removeAttr('required');
    // $('input[name=email]').removeAttr('required');
    // $('select[name=role]').removeAttr('required');
    // $('input[name=password]').removeAttr('required');
    // $('input[id=confirm_password]').removeAttr('required');

    $('input[name=fname]').val(payload.fname);
    $('input[name=lname]').val(payload.lname);
    $('input[name=email]').val(payload.email);


    $('input[name=fname]').attr('required', 'required');
    $('input[name=lname]').attr('required', 'required');
    $('input[name=email]').attr("required", 'required');
    $('select[name=role]').attr("required", 'required');

    // $('select[name=role] option').each(function() {
    //   $(this).removeAttr('selected')
    // });
    $('select[name=role] option').filter(function () { return $(this).val() == payload.role_id; }).attr('selected', 'selected')

    $('#main-form').attr('action', base_url + 'cms/admin/update/' + payload.id)
    
  })

  // Adding
  $('.add-btn').on('click', function() {
    $('.modal').modal()
    $('#main-form')[0].reset() // reset the form

    $('input[name=fname]').attr('required', 'required');
    $('input[name=lname]').attr('required', 'required');
    $('input[name=email]').attr("required", 'required');
    $('select[name=role]').attr("required", 'required');
    $('input[name=password]').attr("required", 'required');
    $('input[id=confirm_password]').attr("required", 'required');

    $('#main-form').attr('action', base_url + 'cms/admin/add')

  })

  $('.modal').on('hidden.bs.modal', function () {
    $('select[name=role] option:selected').removeAttr('selected');
  })

  //Deleting
  $('.btn-deactivate').on('click', function(){

    let p = prompt("Are you sure you want to deactivate this access? Type YES to continue", "");
    if (p === 'YES') {
      const id = $(this).data('id')

      invokeForm(base_url + 'cms/admin/deactivate', {id: id});
    }

  })

  $('.btn-activate').on('click', function(){

    let p = prompt("Are you sure you want to activate this access? Type YES to continue", "");
    if (p === 'YES') {
      const id = $(this).data('id')

      invokeForm(base_url + 'cms/admin/activate', {id: id});
    }

  })


  $('#main-form').on('submit', function (){

    let p = $('input[name=password]').val()
    let cp = $('input[id=confirm_password]').val()

    if (!(p === cp)) {
      alert('Passwords don\'t match')
      return false
    }

  })

})
