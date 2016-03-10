require([ 'jquery', 'jquery/ui'], function($){ 
   $(document).on('click','.faq-question',function(){
   	 var id_div_question = "#"+this.id;
   	 var arr_div_content = id_div_question.split("-");
     var str_div_content = "#faq-content-" + arr_div_content[2];
     $(str_div_content).toggle(200);
   })
   $(".faq-link").click(function(event){
        var id_cate = ($(this).attr('id')).split("-");
        $(".faq-fade").show();
        $.ajax({
        	url : './faq/index/ajaxview',
        	data : {cate_id:id_cate[1]},
        	type : "POST",
        	success: function(data){
        		var obj = $.parseJSON(data);
        		var str = "";
        		if(obj.result){
        			var result = obj.result;
        			for(i=0; i < obj.result.length; i++){
        				str += '<div class="row">';
        				str +=   '<div class="faq">';
        				str +=      '<a class="faq-question" id="faq-question-'+result[i][0]+'" title="'+result[i][1]+'">';
                		str +=      	'<span class="arrow_box"></span>';
                		str +=      	result[i][1];
                		str +=      '</a>';
                		str +=      '<div class="faq-content" id="faq-content-'+result[i][0]+'">';
                		str +=      	result[i][2];
                		str +=      '</div>';
        				str +=   '</div>';
        				str += '</div>';
        			}
        		}
                else {
                    str = "<p>No Faq found.</p>";
                }
        		$(".faq-listing").val(str);
        		$(".faq-fade").hide();
        		return;
        	}
        });
       
   });
});