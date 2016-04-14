function deleteItem(id) {
    alert(id);
}
function get_new_hire_array(){
  $.ajax({
    type: 'POST',
    url: 'http://newhire.local/server.php',
    dataType: 'json',
    data: {method:'get_new_hire_json'},
    success: function(data){
      $('#table-new-hire > tbody > tr').remove();
      $.each(data, function(index,row){
        $('#table-new-hire > tbody').append('<tr></tr>');
        $.each(row, function(i, word){
          $('#table-new-hire > tbody > tr:eq(' + index + ')').append('<td>'+word+'</td>');
        });
        $('#table-new-hire > tbody > tr:eq(' + index + ')').append('<td><a onClick="deleteItem('+row['_id']+')">delete</td>');

      });
    },
    error: function(){
      alert('error');
    }
  });
}
$(function() {
    $('#add-admin').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });
    $('#add-new-hire').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });
    $('#add-new-hire-btn').click(function(){
      $('#add-new-hire').modal('toggle')
      $('#table-new-hire').hide();
      $('#load').css('display','block')
    });
    get_new_hire_array();
});
