
$(function(){
  
  var loc = ['bottom', 'right'];
  var style = 'flat';

  var $output = $('.controls output');
  var $lsel = $('.location-selector');
  var $tsel = $('.theme-selector');

  var update = function(){
    var classes = 'messenger-fixed';

    for (var i=0; i < loc.length; i++)
      classes += ' messenger-on-' + loc[i];

    $.globalMessenger({ extraClasses: classes, theme: style });
    Messenger.options = { extraClasses: classes, theme: style };

    $output.text("Messenger.options = {\n    extraClasses: '" + classes + "',\n    theme: '" + style + "'\n}");
  };

  update();
/*
  $lsel.locationSelector()
    .on('update', function(pos){
      loc = pos;

      update();
    })
  ;*/
/*
  $tsel.themeSelector({
    themes: ['flat', 'future', 'block', 'air', 'ice']
  }).on('update', function(theme){
    style = theme;

    update();
  });*/

});






function msgErro(msg){
	Messenger().post({
	 	message: msg,
	 	type: 'error',
		showCloseButton: true
	});
}


function msgSucesso(msg){
	Messenger().post({
	 	message: msg,
	 	type: 'success',
		showCloseButton: true
	});
}


function excluir(){
	if(confirm("Tem certeza que deseja excluir?")){
		return true;
	} else {
		return false;
	}
}






