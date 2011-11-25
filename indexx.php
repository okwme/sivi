<?
if(!empty($_REQUEST["newJSON"])){
	
	$filename = "indexx.php";
	$current = file_get_contents($filename);
	
	$start = strrpos($current, "var jayson");
	$end = strrpos($current, "}];");
	$source = substr($current, $start, ($end-$start+3));
	echo "starts at ".$start." ends at ".$end."\n";
	echo "RESULT IS :".$source;

	$json =  stripslashes(json_encode($_REQUEST["newJSON"]));
	$newJSON = "var jayson = ".$json.";";
		//replace old info with new info and save file
	$current = str_replace($source, $newJSON, $current); 
	file_put_contents($filename, $current);
	die;
}

header('Content-type: text/html; charset=utf-8');?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<title class="name"></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<script src="jeditable.js" type="text/javascript"></script>
<script>
var jayson = [{"header":"Billy Rennekamp","data":[["10 Elizabeth St."],["New York, NY 10013"],["Billy.Rennekamp at gmail"],["http://billyrennekamp.com"]]},{"header":"Education","data":[["show","2008jhasdlkfhsldfalf"],["field","field2"]]},{"header":"TATA"}];
	<?if( $_SESSION['pw'] == $pw):?>
$.editable.addInputType('noMal', {
	element:function(settings,original){
		var input = $('<input type="text">').autoGrowInput();
		//var input = $('<input type="text">');
		$(this).append(input);
		return(input);
	},
	content : function(string, settings, original) { 
		string = rhtmlspecialchars(string);
		$(this).children().val(string);
	},
	submit:function(settings, original){
		$("input", this).val($("input", this).val());

	}
});
function rhtmlspecialchars(str) {
	if (typeof(str) == "string") {
		str = str.replace(/&gt;/ig, ">");
		str = str.replace(/&lt;/ig, "<");
		str = str.replace(/&#039;/g, "'");
		str = str.replace(/&quot;/ig, '"');
		str = str.replace(/&amp;/ig, '&'); /* must do &amp; last */
	}
	return str;
}
function update(callbackFnk){
	var newJayson = [];
	$("#sivi").children().each(function(k, v){
		newJayson[k] = {"header":$(this).attr("id"), "data":[]};
		$(v).children("li").each(function(kk, vv){
			newJayson[k].data[kk] = [];
			$(vv).children().children(".field").each(function(kkk,vvv){
				newJayson[k].data[kk].push($(vvv).html());			
			});
		});
	});
	$.post("indexx.php", {newJSON:newJayson}, function(data){
		console.log(data);
	});
	jayson = newJayson;	
	if(typeof callbackFnk == 'function'){
		callbackFnk.call(this, newJayson);
	}
}
function refresh() {
//sivi div to hold all
var sivi = $("<ul>").attr("id", "sivi").sortable({
handle:".bigHandle",
items:"ul",
update:function(){update();}
});
$(jayson).each(function(kkkk,vvvv){
//ul of items to be sortable
var hDiv = $("<ul>").attr("id", vvvv.header).sortable({
	handle:".handle",
	items:"li:not(a)",
	update:function(){update();}
});
//ul header
hHead = addHead(vvvv.header);
hDiv.prepend($("<img>").attr("src","kjh").addClass("bigHandle"));
hDiv.append(hHead);
$(vvvv.data).each(function(k,v){
	var iDiv = $("<li>").attr("id", k);
	iDiv.append($("<img>").addClass("handle").attr("src","kjhkjhkj"));
	$(v).each(function(kk,vv){
			fSpan = addFspan(kk).html(vv);
			var xImg = deleteField();
			fDiv = $("<span>").append(fSpan).append(xImg);
			iDiv.append(fDiv);
		});
		//new field button
		addB = addButton();
		//delete whole line
		delB = $("<button>").html("DELETE WHOLE ROW").click(function(){
			if(confirm("Delete the whole row?")){
			$(this).parent().hide("slow", function(){
				$(this).remove();
				update();
			});}
		});
		iDiv.append(addB);
		iDiv.append(delB);
		hDiv.append(iDiv);	
	});
	var addRow = addRowFnk();
	delDiv = $("<button>").html("DELETE WHOLE BLOCK").click(function(){
		if(confirm("Delete the whole block?")){
		$(this).parent().fadeOut("slow", function(){
			$(this).remove();
			update();
		})}
	});
	hDiv.append(addRow);
	hDiv.append(delDiv);
	$(sivi).append(hDiv);
});
addNewBlock = $("<button>").html("ADD NEW BLOCK").click(function(){
var hDiv = $("<ul>").attr("id", "NEW").sortable({
	handle:".handle",
	items:"li:not(a)",
	update:function(){update();}
});
//ul header
hHead = addHead("NEW");
hDiv.prepend($("<img>").attr("src","kjh").addClass("bigHandle"));
hDiv.append(hHead);
var addRow = addRowFnk();
delDiv = $("<button>").html("DELETE WHOLE BLOCK").click(function(){
	if(confirm("Delete the whole block?")){
	$(this).parent().fadeOut("slow", function(){
		$(this).remove();
		update();
	});}
});
hDiv.append(addRow);
hDiv.append(delDiv);
$(sivi).append(hDiv);
});
$(".content").html(sivi).append(addNewBlock);
}
	addHead = function(html){
	return	$("<h1>").html(html)
	.css("display","inline-block")
	.addClass("editbox")
	.editable(function(value,setting){
		$(this).parent().attr("id",value);
		return value;
	},
	{
		onblur:"submit",
		type:"noMal",
		placeholder:"Header",
		indicator:"saving",
		style:"inherit",
		callback:function(){update();}
	});
}
addFspan = function(id){
	return $("<span>").attr("id", id).addClass("field")
	.addClass("editbox")
	.editable(function(value,settings){
		return value;
	},
	{
		onblur:"submit",
		type:"noMal",
		placeholder:"Empty",
		indicator:"saving",
		style:"inherit",
		callback:function(){update();}
	});
}
addRowFnk = function(){
	return $("<button>").html("ADD ROW").click(function(){
		var num = $(this).parent().children("li").length;
		var iDiv = $("<li>").attr("id", num);
		iDiv.append($("<img>").addClass("handle").attr("src","kjhkjhkj"));
		var fSpan = addFspan(0);
		//delete field button
		var xImg = deleteField();
		var nuDiv = $("<span>").append(fSpan).append(xImg);
		addB = addButton();
		//delete whole line
		delB = $("<button>").html("DELETE ROW").click(function(){
			if(confirm("Delete the whole row?")){
			$(this).parent().hide("slow", function(){
				$(this).remove();
				update();
			});}
		});
		iDiv.append(nuDiv);
		iDiv.append(addB);
		iDiv.append(delB);
		$(this).before(iDiv);
		update();
	});
}
addButton = function(){
	return $("<button>").html("ADD NEW FIELD").click(function(){	
		var num;
		num = $(this).siblings().length - 1;
		var fSpan = addFspan(num);
		//delete field button
		var xImg = deleteField();
		var nuDiv = $("<span>").css("border","1px solid black").append(fSpan).append(xImg);
		$(this).before(nuDiv);
		update();
	});
}
deleteField = function(){
	return $("<img>").attr("src","khjh").click(function(){
		if(confirm("Delete this field?")){
			$(this).parent().fadeOut("slow", function(){
				$(this).remove();
				update();
			});
		}
	});
}
<?endif;?>
function plainPrint(){
	$(jayson).each(function(k,v){
		console.log(v);
	});
}
$(document).ready(function(){
	<?if( $_SESSION['pw'] == $pw):?>
		refresh();
		$('span.editbox').bind('keydown', function(evt) {
		    if(evt.keyCode==9) {
		        $(this).find("input").blur();
		        var nextBox='';
		         if ($("span.editbox").index(this) == ($("span.editbox").length-1)) {
		                nextBox=$("span.editbox:first");         //last box, go to first
		            } else {
		                nextBox=$(this).next("span.editbox");    //Next box in line
		            }
		        $(nextBox).dblclick();  //Go to assigned next box
		        return false;           //Suppress normal tab
		    };
		});
	<?else:?>
		plainPrint();
	<?endif;?>
	$("#print").click(function(){
		console.log(jayson);
	})

});
</script>
		<style>
		.field{
			margin:0 5px 0 5px;
		}
		</style>
		</head>
		<body>
		<div class="header">
		<button id="print">PRINT JAYSON</button>
		</div>
		<div class="content">
		</div>
		<script>
		(function($){

			// Custom version of jQuery autoGrowInput by billy rennekamp
			// Based on jQuery autoGrowInput plugin by James Padolsey
			// See related thread: http://stackoverflow.com/questions/931207/is-there-a-jquery-autogrow-plugin-for-text-fields

			$.fn.autoGrowInput = function(o) {
				o = $.extend({
					maxWidth: 1000,
					minWidth: 0,
					comfortZone: 20
					}, o);    
					this.filter('input:text').each(function(){
						var minWidth = o.minWidth || $(this).width(),
						val = '',
						input = $(this),
						testSubject = $('<tester/>').css({
							position: 'absolute',
							top: -9999,
							left: -9999,
							width: 'auto',
							fontSize: "9pt",
							fontFamily: "arial",
							whiteSpace: 'nowrap'
							}),
							check = function() {
								if (val === (val = input.val())) {return;}
								var escaped = val.replace(/&/g, '&amp;').replace(/\s/g,'&nbsp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
								testSubject.html(escaped);   
								// Calculate new width + whether to change
								var testerWidth = testSubject.width(),
								newWidth = (testerWidth + o.comfortZone) >= minWidth ? testerWidth + o.comfortZone : minWidth,
								currentWidth = input.width(),
								isValidWidthChange = (newWidth < currentWidth && newWidth >= minWidth)
								|| (newWidth > minWidth && newWidth < o.maxWidth);
								// Animate width
								if (isValidWidthChange) {
									input.width(newWidth);
								}                        
							};
							$("body").append(testSubject);                 
							$(this).bind('keyup keydown blur update', check);
						});  
						return this;
					};
					})(jQuery);
					</script>
					</body>
					</html>