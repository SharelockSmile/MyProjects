$(function(){
	//alert();
	var aid=$("#user").val();
	//alert(aid);
	$.ajax({
		type:"post",
		url:"process.php",
		data:{"aid":aid},
		dataType:"text",
		success:function(msg)
		{
			alert(msg);
			var ck = $(".ck");
			/*var js = msg.trim().split("|");
          
          ck.prop("checked",false);*/
          for(var i=0;i<ck.length;i++)
          {
            var v = ck.item(i).val();
            if(msg.indexOf(v)>=0)
            {
              ck.item(i).checked="true";
            }
          }
		}
	});
})
