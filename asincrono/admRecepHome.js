

function informe1() {

    $.get("admRecepHome/1").done(function(data){
    console.log(typeof(data));
    console.log(data);

    
    
    
    }).fail(function () {
        
    });
  }