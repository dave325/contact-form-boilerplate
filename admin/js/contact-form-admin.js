jQuery(document).ready(function(){
	var j = jQuery;
	j('#toplevel_page_contact-form-boilerplate-admin-partials-contact-form-admin-display .wp-submenu li').click(function(){
		$(this).addClass('current');
		$(this).children('li').addClass('current');
	});
});