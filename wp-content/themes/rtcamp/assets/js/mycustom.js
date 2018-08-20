$(document).ready(function() {
	$('.banner-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		vertical: true,
		fade: false,
		dots: true,
		autoplay: true,
		arrows: true,
		prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><i class="jcon-left-open-mini"></i></button>',
		nextArrow: '<button class="slick-next" aria-label="Next" type="button"><i class="jcon-right-open-mini"></i></button>',
	});
 });
 
 $(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();