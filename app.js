const database = firebase.database();

	var tenis = 'wakanda'








var searchVal = '';


$(function(){

  firebase.database().ref('shoppings/').on('value', function(snapshot) {
    var userData = snapshot.val();
    
    
    console.log(userData)

loadData(userData);

  });
      $(".slinput input").keyup(function(){
        var val = $(this).val();   
        if(val.length > 0) {
           $(this).parent().find(".right-icon").css('color','#555');
        } else {
          $(this).parent().find(".right-icon").css('color','#ccc');
        }
      });
      
      // if user click on reset icon, clear text field
      $(".slinput .right-icon").click(function(){
        $(this).parent().find("input").val('');
        $(this).css('color','#ccc');
        firebase.database().ref('shoppings/').on('value', function(snapshot) {
            var userData = snapshot.val();
            
            
            console.log(userData)
        
        loadData(userData);
        
          });
      });
      
});




// Displaying Information to Users
function loadData(data) {
    var htmlData = '';
    $.each(data, function(index, val){
		
        htmlData += '<div class="media user" onclick="OpenModal(\'' + index + '\')" data-toggle="modal" data-target="#myModal">'+
        '  <div class="media-left">'+
        '    <a href="#">'+
        '      <img class="media-object" src="'+val.info.foto+'" alt="...">'+
        '    </a>'+
        '  </div>'+
        '  <div class="media-body">'+
        '    <h4 class="media-heading">'+val.info.nome+'</h4>'+
        '    '+val.info.local+
        '  </div>'+
        '</div>';
    });
    $("#users").html(htmlData);
}

// Search users data based input search keyword
function searchUsers() {

    firebase.database().ref('shoppings/').on('value', function(snapshot) {
        var userData = snapshot.val();
        
                console.log(userData)



                var val = $("#searchInput").val();
                if(val == searchVal) {
                    return; 
                } else {
                    searchVal = val;
                    var searchResults = {};
                    searchResults = [];
                    $.each(userData, function(i, v) {
                        if (v.info.nome.toLowerCase().indexOf(val) != -1) {
                            searchResults.push(v);  
                        }
                    });
                    loadData(searchResults);    
                }
       
      });

}

function OpenModal(est) {
	

  $('#dados').remove();
  return firebase.database().ref('shoppings/' + est +'/vagas').on('value', function(snapshot) {
    var username = snapshot.val();
    
    $('#data').text("");
    
    console.log(username)

    $('#modalnome').text(est)

    $.each(username, function(index, value) {

      if(value === true)
      {


        $('#data').append('<div class="vaga col-md-3"><img style="width=150px; height=400px;" src="assets/img/carrovaga.png"></div>')


      }
      else{

        
        $('#data').append('<div class="vaga col-md-3"><img style="width=150px; height=400px;" src="assets/img/vaga.png"></div>')

      }
    });
  });




}
