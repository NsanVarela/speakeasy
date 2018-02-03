
//activating download button
$("#endcall").on("click",function(){
  $("#download").removeClass("disabled");
  $("#SaveTags").removeClass("disabled");
})

//Adding tags
$("input[type='text']").keypress(function(e){
	if(e.which === 13||e.which===32){
		//grabbing tag text from input
		var val = $(this).val();
    var regex = /</;
    // if(regex.test(val)==false){
      $(this).val("");
  		//create a new li and add to ul
      var list = $("#detect_tags > ul");
  		var item = $('<li name="tag" class="btn btn-outline-success tagval"></li>').append('<span><i class="fas fa-times close"></i></span>')
      var tag = $('<span></span>');
      tag.text(val);
      tag.appendTo(item);
      item.appendTo(list);
      $("#tags").val('');


	}
});
//Click on X to delete Tag
$("#detect_tags > ul").on("click","span", function(e){
  $(this).parent().remove();
  e.stopPropagation();
});

//showing contact
$("#contact").on("click",function(){
  $("#card_contacts").toggleClass('hidden');
});
