<?
function unstrip_array($array){
	foreach($array as &$val){
		if(is_array($val)){
			$val = unstrip_array($val);
		}else{
			$val = stripslashes($val);
		}
	}
	return $array;
}
if(!empty($_REQUEST["newJSON"])){
	
	$filename = "indexx.php";
	$current = file_get_contents($filename);
	
	$start = strrpos($current, "var jayson");
	$end = strrpos($current, "}];");
	$source = substr($current, $start, ($end-$start+3));
	//echo "starts at ".$start." ends at ".$end."\n";
	//echo "RESULT IS :".$source;

	
	$json =  unstrip_array($_REQUEST["newJSON"]);
	$json = json_encode($json);
	$newJSON = "var jayson = ".$json.";";
		//replace old info with new info and save file
	$current = $json != null ? str_replace($source, $newJSON, $current): $current; 
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
var jayson = [{"header":"degrees","data":[["BAg\u00fc","2010","Film &amp; Electronic Arts","Bard College"]]},{"header":"grants","data":[["2010","Vimeo Awards Winner - Experimental"],["2009","Bard College Junior Fellowship"]]},{"header":"soloShows","data":[["2011","Immediate Release","Booklyn Artist Alliance","Brooklyn, NY","USA"],["2011","SIVI.ME","KlausGallery.net","http:\/\/","www"],["2010","A vs B (w\/ Anne De Vries)","The Future Gallery","Berlin","DE"],["2010","Clover","XPACE Cultural Center","http:\/\/","www"],["2010","WIN WIN","CLEOPATRA'S","Brooklyn, NY","USA"],["2010","BIG HEAD MODE","Bard College","Annandale-On-Hudson, NY","USA"],["2009","Speed Dating \/ Conference Call \u2020 ","Envoy Enterprise\"","New York, NY","USA"],["2009","\u03c4R\u03be\u0394SVR\u039e R\u03b8\u03b8M \u2020","Light Industry","Brooklyn, NY","USA"],["2008","LIXXARD GEAR \u2020","MTAA (Over The Opening)","Brooklyn, NY","USA"]]},{"header":"groupShows","data":[["2011","Kik In Der Kok","K\u00fcbersensuaalsuse festival","Tallink","EE"],["2011","Youth Culture","The Future Gallery","Berlin","DE"],["2011","LIKE","Vogt Gallery","New York, NY","USA"],["2011","BYOB","Padiglione Internet, La Biennale di Venezia","Venice","IT"],["2011","BYOB","Mu","Eindhoven","NL"],["2011","VPAP","Philidelphia International Festival of the Arts","Philidelphia, PA","USA"],["2010","BYOB","Spencer Brownstone","New York, NY","USA"],["2010","BYOB","Kunsthalle Athena","Athens","GR"],["2010","DES CHAPITRES DU CONFLIT","Former Iraqi Embassy","Berlin","DE"],["2010","Chrystal Gallery","Gentili Apri","Berlin","DE"],["2010","Going Away","Forgotten Bar","Berlin","DE"],["2010","Activities in Space and Time \u2020","Warmgrey","Paris","FR"],["2010","BYOB","Bureau Friederich Project Studio","Berlin","DE"],["2010","Surfing Clubs \u2020","[Plug.In]","Basel","CH"],["2010","Multiplex","PeerToSpace","Munich","DE"],["2010","Sculpture Storage","LA MAMA","New York, NY","USA"],["2010","High Cascades","HighCascades.info","http:\/\/","www"],["2010","Remember 2010","The GallerySpace.info","http:\/\/","www"],["2009","AFK Sculpture Park","Atelierhof Kreuzberg ","Berlin","DE"],["2009","Sobject","mQ gallery","Berlin","DE"],["2009","Forms of Melancholy","Sego Art Center","Provo, UT","USA"],["2009","Let's Meet in Real Life \u2020","Capricious Gallery","Brooklyn, NY","USA"],["2008","Activities in Space and Time \u2020","CareOf Gallery","Milan","IT"],["2007","The Great Internet Sleepover \u2020","Eyebeam","New York, NY","USA"]]},{"header":"publications","data":[["2011","Dim Tricks","Donnachie, Simianato &amp; Son","Milan","IT"],["2011","TL;DR","Pooool.info","http:\/\/","www"],["2011","Twitter Faves","Travis Hallenbeck","http:\/\/","www"],["2011","Ralphs #2","FYD","New York, NY","USA"],["2010","Startegy Guide","Bard College","Annandale-on-Hudson","USA"],["2009","Ralphs #1","FYD","New York, NY","USA"],["2009","Pink Laser Beam Compendium","Donnachie, Simianato &amp; Son","Milan","IT"],["2009","Bard Papers","Bard College","Annandale-on-Hudson","USA"],["2009","That Is Not Dead","FYD","Berlin","USA"],["2009","Art Camp: Land Art Reader","SB95","New York, NY","USA"],["2009","Art Camp: Sculpture Reader","SB95","New York, NY","USA"],["2009","Art Camp: Painting Reader","SB95","New York, NY","USA"],["2009","Garry's Poster","Garry's","Berlin","DE"],["2009","Clemens Jahn Portraits","SB95","Berlin","DE"]]},{"header":"collections"},{"header":"bibliographys","data":[["Brad Troemel","New Productive Systems","fourninetyone.com","2011"],["Landon Zakheim ","Re-Defining Short Docs","Sundance Film Festival","2011"],["Joachim Lepastier","Un an de vid\u00e9os sur Internet","Cahiers du Cinema \/ N\u00b0662","2011"],["VVORK","A vs B","vvork.com","2010"],["Ceci Moss","1 Question Interview with Billy Rennekamp","rhizome.org","2010"],["Catherine Cochard","Loshadka jusqu\u2019au ","Ars brevis vita longa","2010"],["VVORK","multiplex","vvork.com","2010"],["Annette Hoffmann","Das Netzwerk als Kunstwerk","Artline Kunstmagazin ","2010"],["Karen Archey","Best Link Ever! Centaurs with Tri-Titted Babes and Slim Thug","Art Fag City","2009"],["VVORK","AFK Sculpture Park","vvork.com","2009"],["Ceci Moss","HUGE (2008)","rhizome.org","2009"],["Matthew Rodriguez","Billy Rennekamp, \u201cClover\"","SundanceChannel.com","2009"],["VVORK","Clover","vvork.com","2009"],["John Michael Boling","Shine II (2009)","Rhizome.org","2009"],["Brian Droitcour &amp; Ceci Moss","\u201dIn Real Life\u201d at Capricious Space : A Conversation","rhizome.org","2009"],["Raphael Bastide","Surfin Clubs: Liste non exhaustive des blogs d\u2019art collaboratif"," Ca mange pas de pain","2009"],["Brian Droitcour","Members Only: Loshadka Surfs the Web","Art In America","2009"],["Will","Art Revue: Loshadka at Light Industry","Brooklyn Revue","2009"],["John Michael Boling","There it is (2008)","rhizome.org","2009"],["Marcin Ramocki","Surfing Clubs: organized notes and comments","www","2008"],["Paddy Johnson","Worth Checking Out: Loshadka","Art Fag City","2008"],["John Michael Boling","THIS IS NEVER GOING TO STOP (2007)","rhizome.org","2008"],["Marisa Olson","Lost Not Found: The Circulation of Images in Digital Visual Culture","Words Without Pictures","2007"]]},{"header":"employments","data":[["Artist Assitant","Raymond Pettibon LLC","New York, NY"],["Intern","Dis Magazine","New York, NY"],["Artist Assistant","JODI","Dortrecht, NL"],["Intern","Art Since the Dummer of '69","New York, NY"],["Intern","JODI","Dordrecht, NL"],["Artist Assistant","AIDS-3D","Berlin, DE"],["Intern","Oliver Laric","Berlin, DE"],["Intern","Cory Arcangel","New York, NY"],["Intern","Rhizome.org","New York, NY"]]},{"header":"galleries"},{"header":"notes","data":[["\u2020 denotes work shown as collective Loshadka"]]}];
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