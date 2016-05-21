// JavaScript Document
$(document).ready(function(){
  'use strict';
  // Delete user logic
  $(document)
    .on('click', '.deleteuser', function(e){
      e.preventDefault();
      var owner = $(this);
      if(confirm('Do you want to delete and block this user?'))
      {
        owner.prop('disabled', true);
        $.ajax({
          url: 'delete.php',
          cache: false,
          type: 'POST',
          dataType: 'json',
          contentType:"application/json; encoding=utf8",
          data: JSON.stringify({
            id: $(this).data('id'),
            securitytoken: $('#securitytoken').val()
          }),
          success: function(r) {
            if(parseInt(r.status) > 0)
            {
              owner.parents('tr').data('deleted', true).find('td:last').empty().append(' <i>Deleted</i>');
              if($('#hideDeleted').is(':checked'))
              {
                owner.parents('tr').fadeOut();
              }
            } else {
              alert(r.error);
            }
          },
          error: function(a,b,c) {
            console.error(a,b,c);
            owner.prop('disabled', false);
          }
        });
      }
    })
    // Toggle visibility of deleted users when the checkbox changes
    .on('change', '#hideDeleted', function(){
      $('#users tbody>tr')
        .each(function(){
          if($(this).data('deleted') === true || $(this).data('deleted') === 'true')
          {
            if(!$(this).is(':visible'))
            {
              $(this).fadeIn('slow');
            } else {
              $(this).fadeOut('slow');
            }
          }
        });
    });
});