$('#frmLogin').submit(function(e){
  e.preventDefault();
  var usuario = $.trim($("#Usuario").val());
  var password =$.trim($("#Password").val());

  var dataString = 'Usuario='+usuario+'&Password='+password;
  alert(dataString);

  if($.trim(usuario).length>0 && $.trim(password).length>0)
  {
    $.ajax({
      type: "POST",
      url: "php/valida.php",
      data: dataString,
      cache: false,
      beforeSend: function(){ $("#Usuario").val('Connecting...');},
      success: function(data){
        if(data)
        {
          window.location.href = "php/alta.html";
        }
        else
        {
          //Shake animation effect.
          $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
        }
      }
    });

  }
  return false;
});
