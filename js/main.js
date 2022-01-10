$(document).ready(function(){

/**
	 * Tab handler
	 */
	$('.tab-article').click(function(){
		var target_content = $(this).attr("href");

		$(this).parents("ul").find("li").removeClass("active");
		$(this).parent().addClass("active");
		$('.article-tab-content').removeClass("active");
		$(target_content).addClass("active");

		return false;
	});
});







