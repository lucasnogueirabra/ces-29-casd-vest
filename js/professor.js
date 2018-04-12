$(".trigger").click(function(){
	$(this).parent().find("ul").slideToggle(500, function()
		{
			var drop = $(this).parent().find("ul");

			if(drop.hasClass('shown'))
			{
				drop.removeClass('shown');
				$(".materia-header").css('border-bottom-left-radius', 5);
				$(".materia-header").css('border-bottom-right-radius', 5);
			}
			else
			{
				drop.addClass('shown');
				$(".materia-header").css('border-bottom-left-radius', 0);
				$(".materia-header").css('border-bottom-right-radius', 0);
			}
			
		});
});