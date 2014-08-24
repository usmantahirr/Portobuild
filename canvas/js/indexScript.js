// Accordion
$("#accordion").accordion({ header: "h3", heightStyle: "content" });
$( "#accordion" ).accordion({ heightStyle: "full" });
$( "#accordion" ).accordion( "option", "heightStyle", "full" );
$( "#slider" ).slider();

var frameDocument
$('#editor').load(function() {
    console.log( "ready!" );
    frameDocument = $("#editor").contents();
});

/* Border Style Slider */
$("#slider").slider({
  slide: function( event, ui ) {
	$("#bw-val").text(ui.value + ' px');
	console.log(ui.value);
	console.log($("#editor").contents().find("#header"));
  }
});

/* Padding Style Sliders */
/* Top */
$("#pdt-slider").slider({
  slide: function( event, ui ) {
	$("#pdt-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* right */
$("#pdr-slider").slider({
  slide: function( event, ui ) {
	$("#pdr-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* bottom */
$("#pdb-slider").slider({
  slide: function( event, ui ) {
	$("#pdb-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* left */
$("#pdl-slider").slider({
  slide: function( event, ui ) {
	$("#pdl-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* Margins Style Sliders */
/* Top */
$("#mrt-slider").slider({
  slide: function( event, ui ) {
	$("#mrt-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* right */
$("#mrr-slider").slider({
  slide: function( event, ui ) {
	$("#mrr-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* bottom */
$("#mrb-slider").slider({
  slide: function( event, ui ) {
	$("#mrb-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* left */
$("#mrl-slider").slider({
  slide: function( event, ui ) {
	$("#mrl-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});

/* CSS3 Attrs */
/* Box Shadow */
/* h-shadow */
$("#h-sh-slider").slider({
  slide: function( event, ui ) {
	$("#h-sh-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});
/* v-shadow */
$("#v-sh-slider").slider({
  slide: function( event, ui ) {
	$("#v-sh-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});
/* blr */
$("#blr-sh-slider").slider({
  slide: function( event, ui ) {
	$("#blr-sh-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});
/* spread */
$("#spread-sh-slider").slider({
  slide: function( event, ui ) {
	$("#spread-sh-val").text(ui.value + ' px');
	console.log(ui.value);
  }
});
/* color */