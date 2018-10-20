firebase.database().ref('shoppings/').once('value', function(snapshot) {
    var userData = snapshot.val();



    var htmlData = '';
    $.each(userData, function(index, val){
		
        htmlData += '<option value="'+index+'">'+val.info.nome+'</option>';

    });
    $("#shoppingselect").html(htmlData)

    var shop = $("#shoppingselect").val();

    $( "#shoppingselect" ).change(function() {

        var shop = $("#shoppingselect").val();


        firebase.database().ref('shoppings/' + shop + '/relatorio/usovagas').once('value', function(snapshot) {
            var userData = snapshot.val();
        
        
            genFunction(userData);
        
        });

      });







firebase.database().ref('shoppings/' + shop + '/relatorio/usovagas').on('value', function(snapshot) {
    var userData = snapshot.val();


    genFunction(userData);

});

function genFunction(data) {
    var cdata = [];
  //  var len = data.length;

    $.each(data, function(index, val){



       cdata.push({
      label: data[index]['label'],
       value: data[index]['value']


    });


    });






FusionCharts.ready(function() {
    var myChart = new FusionCharts({
      type: "pie2d",
      renderAt: "chart-container",
      width: "100%",
      height: "100%",
      dataFormat: "json",
      dataSource: {
        chart: {
          caption: "Seila",
          plottooltext:
            "<b>$percentValue</b> of web servers run on $label servers",
          showlegend: "1",
          showpercentvalues: "1",
          legendposition: "bottom",
          usedataplotcolorforlabels: "1",
          theme: "fusion"
        },


        data: cdata
      }
    }).render();
  });

}


});