jQuery(document).ready(function() {  
    var $ = jQuery;    
	$("#portfolio-load-more").click(function(e) {
        console.log('click');
		$.ajax({
			url: 'http://localhost/newoldredactor/portfolio/',
			type: 'POST',
			data: {
				server: $("#load_server").val(), // Метод .val() используется для получения значений элементов формы, таких как <input>, <select> и <textarea>. При вызове на пустой коллекции, он возвращает undefined.
				u_id: $("#gallery_id").val(),
				g_id: $("#load_id").val(),
				g_ch: $("#gallery_ch").val(),
				img_dir: $("#load_dir").val(),
				visible_pages: $(".gallery_th:visible").length,
				total_pages: $("#load_pages").val(),
				type: 1
			},
			success:function(response){  // response - переменная которая содержит все данные 
			//  alert(response);
                console.log('finish');
                console.dir(response);
				$("#append_thumbs").append(response);  // .append Вставляет содержимое, заданное параметром, в конец каждого элемента в наборе соответствующих элементов

            }

		});
	});                 
});