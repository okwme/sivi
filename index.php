<?
session_start();
//////////////MODEL////////////////
///////////////////////////////////
//include('PhpConsole.php');
//PhpConsole::start();

/*
$url = "x.png";
$imagedata = file_get_contents($url);
$base64 = base64_encode($imagedata);
*/
$dl = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTM5jWRgMAAAAVdEVYdENyZWF0aW9uIFRpbWUAMi8xNy8wOCCcqlgAAAQRdEVYdFhNTDpjb20uYWRvYmUueG1wADw/eHBhY2tldCBiZWdpbj0iICAgIiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+Cjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDQuMS1jMDM0IDQ2LjI3Mjk3NiwgU2F0IEphbiAyNyAyMDA3IDIyOjExOjQxICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4YXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iPgogICAgICAgICA8eGFwOkNyZWF0b3JUb29sPkFkb2JlIEZpcmV3b3JrcyBDUzM8L3hhcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhhcDpDcmVhdGVEYXRlPjIwMDgtMDItMTdUMDI6MzY6NDVaPC94YXA6Q3JlYXRlRGF0ZT4KICAgICAgICAgPHhhcDpNb2RpZnlEYXRlPjIwMDgtMDMtMjRUMTk6MDA6NDJaPC94YXA6TW9kaWZ5RGF0ZT4KICAgICAgPC9yZGY6RGVzY3JpcHRpb24+CiAgICAgIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyI+CiAgICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2UvcG5nPC9kYzpmb3JtYXQ+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDUdUmQAAAE7SURBVDiNpZM7TsNAEIb/8WPNwwJKh5qGBiNxAiqa+AjQ5iCufQBaOILTUHEBIyEaGmoIVAkyEHshQ7HedSzbUiSvtNqZ0fzfzmhniZkxZFmD1AAcbRCRCQYpdZY1i9gk6cqdrkQAuD1n5H/K9m3g8p4683oBH7/AolT2vujLWgMEKaUAxtp/l8C8AizJ5OjWpgAiACDdy2hq8dVZs/XFd1XBTvPWmwfC23hFDQARIUiJL05qSP6lTn+3Ft89EWYR17p1gC7z9FjFlp8qtrWn/MdnMi/RC9CQwyPGaq5i1gHj9YU6n7EToCHbvrJ/8uYMbATQEKAtbgAqP2qpN1jMnOo5GGVZdu26LjzPgxACQgh4ngdmhpSytcMwnJgKkiRhKSWKokBZluYsSzVJjuPAtm2ztR/HMdHQ7/wPj7WgYLMWxPQAAAAASUVORK5CYII=";
$drag = "iVBORw0KGgoAAAANSUhEUgAAAAYAAAAKCAQAAAA9B+e4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADGGlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjaY2BgnuDo4uTKJMDAUFBUUuQe5BgZERmlwH6egY2BmYGBgYGBITG5uMAxIMCHgYGBIS8/L5UBFTAyMHy7xsDIwMDAcFnX0cXJlYE0wJpcUFTCwMBwgIGBwSgltTiZgYHhCwMDQ3p5SUEJAwNjDAMDg0hSdkEJAwNjAQMDg0h2SJAzAwNjCwMDE09JakUJAwMDg3N+QWVRZnpGiYKhpaWlgmNKflKqQnBlcUlqbrGCZ15yflFBflFiSWoKAwMD1A4GBgYGXpf8EgX3xMw8BSMDVQYqg4jIKAUICxE+CDEESC4tKoMHJQODAIMCgwGDA0MAQyJDPcMChqMMbxjFGV0YSxlXMN5jEmMKYprAdIFZmDmSeSHzGxZLlg6WW6x6rK2s99gs2aaxfWMPZ9/NocTRxfGFM5HzApcj1xZuTe4FPFI8U3mFeCfxCfNN45fhXyygI7BD0FXwilCq0A/hXhEVkb2i4aJfxCaJG4lfkaiQlJM8JpUvLS19QqZMVl32llyfvIv8H4WtioVKekpvldeqFKiaqP5UO6jepRGqqaT5QeuA9iSdVF0rPUG9V/pHDBYY1hrFGNuayJsym740u2C+02KJ5QSrOutcmzjbQDtXe2sHY0cdJzVnJRcFV3k3BXdlD3VPXS8Tbxsfd99gvwT//ID6wIlBS4N3hVwMfRnOFCEXaRUVEV0RMzN2T9yDBLZE3aSw5IaUNak30zkyLDIzs+ZmX8xlz7PPryjYVPiuWLskq3RV2ZsK/cqSql01jLVedVPrHzbqNdU0n22VaytsP9op3VXUfbpXta+x/+5Em0mzJ/+dGj/t8AyNmf2zvs9JmHt6vvmCpYtEFrcu+bYsc/m9lSGrTq9xWbtvveWGbZtMNm/ZarJt+w6rnft3u+45uy9s/4ODOYd+Hmk/Jn58xUnrU+fOJJ/9dX7SRe1LR68kXv13fc5Nm1t379TfU75/4mHeY7En+59lvhB5efB1/lv5dxc+NH0y/fzq64Lv4T8Ffp360/rP8f9/AA0ADzT6lvFdAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAtSURBVHjanMuxDQAgDMTAC0Oxf52lnjaIDneW5Qo67GIZVIZcZUGn85Sf5wwAW6wMMxeHNEAAAAAASUVORK5CYII=";
$gears = "iVBORw0KGgoAAAANSUhEUgAAABEAAAAoCAYAAAFvHyEJAAABc0lEQVRIx+2Vu0pDQRCGz0NYiCAasNAiKHiBECIkYhERG8EnU/gUbDyWXt7DwjSKErCwsdEUGrwnWZt/k3XPhughiJAUw87O/PvP7JyZPZExJrISJTaACW8SZzoKYADTUYIBeht1Phz4d5xpDMAi8CYp2HwmgXF7wSzwKcn1I+yP75gepJrO29pqnQMSoBZwB4wCNxbsg4ycI8BFN1DRC5f/BvrjEgwAQGWe0BoDx9KngDagLjGSR/V7G5CTYxNYk75iATUZngWOHLaaNSzLsAoUpJfdEPeKaXN4BZ5cwLTWA+BIehYYlK/Zt+4fkqQkcfrblz117WE3jE8yBlTU4nlgFjgXySWwoF/PA3ANZEIkEVACPpy5aWkSm46tqbFNZLIN7ANnDnjLS73s+CrC77gkMXDqPPsG2PBISo7vCjgB4tB1loAXL/U60HBsDREGC5sBqsA7sK6Hx2ZW1bNVVOFvgZluhfVlVyRxz088nJ1/SvIFJGxMewwj+XUAAAAASUVORK5CYII=";
$x = "iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAYAAADEUlfTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzdFQ0RFMzZEMTdEMTFFMEIwNzJBMzg5RjQxMTQyNjEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzdFQ0RFMzdEMTdEMTFFMEIwNzJBMzg5RjQxMTQyNjEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFM0VDNzE2OUQxN0MxMUUwQjA3MkEzODlGNDExNDI2MSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFM0VDNzE2QUQxN0MxMUUwQjA3MkEzODlGNDExNDI2MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pk6j2R0AAAB/SURBVHjaYkxLS9vPwMCwcNasWQuANAOQLwCk5gPxRhYgAeYABUFyG4AYpNgApIEJSDgC8QWo6vNQiUSgSRsYoUYpAKn7DBCwACiRCGIwQ+3YDsQSQPwAiB2MjY0fnj179gITkh0g1YYwK4CaAkCSH6B2gIz7AHUDyGECAAEGACoZKiO+Ukh+AAAAAElFTkSuQmCC";
$pw = "";
$Font = "Arial";
//F5FCCB
$Background = "#F5FCCB";
$Name = "";
$Address = "";
$City = "";
$State = "";
$Zip = "";
$Country = "";
$Phone = "";
$Email = "";
$Homepage = "";
$degrees=array();
$grants=array();
$soloShows=array();
$groupShows=array();
$publications=array();
$collections=array();
$bibliographys=array();
$employments=array();
$galleries=array();
$notes=array();


$infoArray=array(
"degrees"=>$degrees
,"grants"=>$grants
,"soloShows"=>$soloShows
,"groupShows"=>$groupShows
,"publications"=>$publications
,"collections"=>$collections
,"bibliographys"=>$bibliographys
,"employments"=>$employments
,"galleries"=>$galleries	
,"notes"=>$notes	
);
$infoCopy=array(
"degrees"=>array("Education", "Degree", "Dates", "Major", "Institution")
,"grants"=>array("Grants & Awards","Year","Title")
,"soloShows"=>array("Solo & Partner Exhibitions","Year", "Title","Location","City","Country")
,"groupShows"=>array("Group Exhibitions","Year","Title","Location","City","Country")
,"publications"=>array("Publications","Year","Title","Publisher","City","Country")
,"collections"=>array("Collections", "Name", "Location")
,"bibliographys"=>array("Bibliography", "Author", "Title","Publication","Date")
,"employments"=>array("Employment","Title","Company","Location")
,"galleries"=>array("Gallery Representation","Name","Location")
,"notes"=>array("Notes","Notes")
);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////CONTROLLER///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pass = false;
if((checkSlash($_REQUEST['pw'])==$pw) || checkSlash($_SESSION['pw']) == $pw){
    $_SESSION['pw'] = $pw;
    $pass = true;
	$view = checkSlash($_REQUEST['view']);
	$_REQUESTarray = $_REQUEST['array'];
}
$view = $view == "" ? "view" : $view;

if($view == "edit" && $pw == ""){
	$pass = true;
	
	$filename = "index.php";
	$current = file_get_contents($filename);
	$_SESSION['pw'] = $_REQUEST['pw'];
	//replace old info with new info and save file
	$current = str_replace("\$pw = \"\";", "\$pw = \"".$_REQUEST['pw']."\";", $current); 
	file_put_contents($filename, $current);
}

if($pass && $_REQUEST['download']):
		$file = str_replace('/', '', $_GET['download']);
		$file = str_replace('..', '', $file);
		$file = "index.php";
		if (file_exists($file)) {
			header("Content-type: application/x-download");
			header("Content-Length: ".filesize($file)); 
			header('Content-Disposition: attachment; filename="'.$file.'"');
			readfile($file);
			die();
		}
endif;


function checkSlash($string){
	return addslashes(stripslashes($string));
}

if($_REQUESTarray != ""):
//THIS IS TO REORDER AN ARRAY
	$newOrder = is_array($_REQUEST['order']) ? $_REQUEST['order'] : array();
	$arrayName = checkSlash($_REQUEST['array']);
	$target = $infoArray[$arrayName];
	
	//build text of array to replace
	$targetArrays = $target;
	$targetText = "";
	$targetText.="\$$arrayName=array(\n";
	foreach($targetArrays as $targetArray):
		$targetText.="array(\n";
		foreach($targetArray as $k=>$v):
			$targetText.="\"$k\"=>\"$v\"\n,";
		endforeach;
		$targetText=substr($targetText, 0, -1).")\n,";    
	endforeach;
	$targetText=substr($targetText, 0, -1);
	$targetText .=");";
	
	//create model for new array
	foreach($newOrder as $k=>$v):
		$newO = explode("_", $v);
		$newO = $newO[1];
		$newOrder[$k] = $newO;	
	endforeach;
	//echo"BEFORE:\n";
	//print_r($target);
	//echo"GOAL:\n";
	//print_r($newOrder);


	$freshStart = array();

	for($i=0;$i<count($newOrder);$i++):
			$freshStart[] = $target[$newOrder[$i]];
	endfor;
	$replaceArrays = $freshStart;
	
	
	//echo"AFTER:\n";
	//print_r($replaceArrays);

	//build text of new array
	$replaceText = "";
	$replaceText.="\$$arrayName=array(\n";
	foreach($replaceArrays as $replaceArray):
		$replaceText.="array(\n";
		foreach($replaceArray as $k=>$v):
			$replaceText.="\"$k\"=>\"$v\"\n,";
		endforeach;
		$replaceText=substr($replaceText, 0, -1).")\n,";    
	endforeach;
	$replaceText=substr($replaceText, 0, -1);
	$replaceText .=");";
	
	$filename = "index.php";
	$current = file_get_contents($filename);
	$view = "none";

	//replace old info with new info and save file
	$current = str_replace($targetText, $replaceText, $current); 
	file_put_contents($filename, $current);
	die("finished");
endif;






if(($_REQUEST['id']!="") && $pass):

	$filename = "index.php";
	$current = file_get_contents($filename);
	$view = "none";
	$id = ($_REQUEST['id']);
	$value = str_replace(">", "",  str_replace("<", "", $_REQUEST['value']));  
	$value = htmlspecialchars(str_replace("\\", "", $_REQUEST['value']));
	
	if (strpos($id, "_") === false):
		$current = str_replace("\$$id = \"".${$id}."\";", "\$$id = \"".$value."\";", $current); 
	else:
	    $id = explode("_", $id);
	    $arrayName = $id[0];
	    $arrayId = $id[1];
	    $arrayKey = $id[2];

	    $targetArrays = $infoArray[$arrayName];

	    $targetText = "";
	    $targetText.="\$$arrayName=array(\n";
	    foreach($targetArrays as $targetArray):
	        $targetText.="array(\n";
	        foreach($targetArray as $k=>$v):
	            $targetText.="\"$k\"=>\"$v\"\n,";
	        endforeach;
	        $targetText=substr($targetText, 0, -1).")\n,";     
	    endforeach;
	    $targetText=substr($targetText, 0, -1);
	    $targetText .=");\n";

	    $newText = "";
	    $newText.="\$$arrayName=array(\n";
	    $deleted = "no";
	    foreach($targetArrays as $key=>$targetArray):
			if($arrayId == "delete" && $key==$arrayKey&& $deleted = "no"):
				//echo "deleted = $deleted\narrayID = $arrayId\nkey = $key\narrayKey = $arrayKey\n\n";
			    $deleted = "yes";
			    continue;
			endif;
	        $newText.="array(\n";
	        foreach($targetArray as $k=>$v):
	          //  echo "key = $key<br>arrayKey = $arrayKey<br>k = $k<br>arrayID = $arrayId<hr>";
	            $newText.= $key==$arrayKey && $k==$arrayId && $arrayKey !="new"? "\"$k\"=>\"$value\"\n," : "\"$k\"=>\"$v\"\n,";
	        endforeach;
	        $newText=substr($newText, 0, -1).")\n,";
	    endforeach;
		if($arrayKey == "new"):
		 	$newText.="array(\n";
	        foreach($infoCopy[$arrayName] as $k=>$v):
				if($k == 0):continue;endif;
	          //  echo "key = $key<br>arrayKey = $arrayKey<br>k = $k<br>arrayID = $arrayId<hr>";
	            $newText.= $v==$arrayId ? "\"$v\"=>\"$value\"\n," : "\"$v\"=>\"\"\n,";
	        endforeach;
	        $newText=substr($newText, 0, -1).")\n,";
		endif;
	    $newText=substr($newText, 0, -1);
	    $newText .=");\n";
		$current = str_replace($targetText, $newText, $current); 
    
	endif;
	echo stripslashes($value);
	//$current = $base64.$current;
	file_put_contents($filename, $current);
	
	
	
	
	
	
	
	
///////////////////////////////////
//////////////VIEW/////////////////
///////////////////////////////////
else:
header('Content-type: text/html; charset=utf-8');

?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
	<html>
		<head>
			<title class="name"><?echo$name;?></title>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
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
                       // fontWeight: input.css('fontWeight'),
                       // letterSpacing: input.css('letterSpacing'),
                        whiteSpace: 'nowrap'
                    }),
                    check = function() {
                        //console.log(val===(val = input.val()));
                        if (val === (val = input.val())) {return;}
                        //console.log(val);
                        // Enter new content into testSubject
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
              //  testSubject.append(body);
                
                $(this).bind('keyup keydown blur update', check);
                
            });
            
            return this;
        
        };
        
    })(jQuery);
			/*
			 * Jeditable - jQuery in place edit plugin
			 * Copyright (c) 2006-2009 Mika Tuupola, Dylan Verheul
			 * Licensed under the MIT license:
			 *   http://www.opensource.org/licenses/mit-license.php
			 * Project home:
			 *   http://www.appelsiini.net/projects/jeditable
			 * Based on editable by Dylan Verheul <dylan_at_dyve.net>:
			 *    http://www.dyve.net/jquery/?editable
			 */
			(function($){$.fn.editable=function(target,options){if('disable'==target){$(this).data('disabled.editable',true);return;}
			if('enable'==target){$(this).data('disabled.editable',false);return;}
			if('destroy'==target){$(this).unbind($(this).data('event.editable')).removeData('disabled.editable').removeData('event.editable');return;}
			var settings=$.extend({},$.fn.editable.defaults,{target:target},options);
			var plugin=$.editable.types[settings.type].plugin||function(){};var submit=$.editable.types[settings.type].submit||function(){};
			var buttons=$.editable.types[settings.type].buttons||$.editable.types['defaults'].buttons;
			var content=$.editable.types[settings.type].content||$.editable.types['defaults'].content;
			var element=$.editable.types[settings.type].element||$.editable.types['defaults'].element;
			var reset=$.editable.types[settings.type].reset||$.editable.types['defaults'].reset;var callback=settings.callback||function(){};
			var onedit=settings.onedit||function(){};var onsubmit=settings.onsubmit||function(){};var onreset=settings.onreset||function(){};
			var onerror=settings.onerror||reset;if(settings.tooltip){$(this).attr('title',settings.tooltip);}
			settings.autowidth='auto'==settings.width;settings.autoheight='auto'==settings.height;return this.each(function(){var self=this;
			    var savedwidth=$(self).width();var savedheight=$(self).height();$(this).data('event.editable',settings.event);
			    if(!$.trim($(this).html())){$(this).html(settings.placeholder);}
			$(this).bind(settings.event,function(e){if(true===$(this).data('disabled.editable')){return;}
			if(self.editing){return;}
			if(false===onedit.apply(this,[settings,self])){return;}
			e.preventDefault();e.stopPropagation();if(settings.tooltip){$(self).removeAttr('title');}
			if(0==$(self).width()){settings.width=savedwidth;settings.height=savedheight;}else{if(settings.width!='none')
			{settings.width=settings.autowidth?$(self).width():settings.width;}
			if(settings.height!='none'){settings.height=settings.autoheight?$(self).height():settings.height;}}
			if($(this).html().toLowerCase().replace(/(;|")/g,'')==settings.placeholder.toLowerCase().replace(/(;|")/g,'')){$(this).html('');}
			self.editing=true;self.revert=$(self).html();$(self).html('');var form=$('<form />');if(settings.cssclass){
			    if('inherit'==settings.cssclass){form.attr('class',$(self).attr('class'));}else{form.attr('class',settings.cssclass);}}
			if(settings.style){if('inherit'==settings.style){form.attr('style',$(self).attr('style'));form.css('display',$(self).css('display'));}
			else{form.attr('style',settings.style);}}
			var input=element.apply(form,[settings,self]);var input_content;if(settings.loadurl){var t=setTimeout(function(){input.disabled=true;
			    content.apply(form,[settings.loadtext,settings,self]);},100);var loaddata={};loaddata[settings.id]=self.id;
			    if($.isFunction(settings.loaddata)){$.extend(loaddata,settings.loaddata.apply(self,[self.revert,settings]));}
			    else{$.extend(loaddata,settings.loaddata);}
			$.ajax({type:settings.loadtype,url:settings.loadurl,data:loaddata,async:false,success:function(result){window.clearTimeout(t);
			    input_content=result;input.disabled=false;}});}else if(settings.data){input_content=settings.data;
			        if($.isFunction(settings.data)){input_content=settings.data.apply(self,[self.revert,settings]);}}else{input_content=self.revert;}
			content.apply(form,[input_content,settings,self]);input.attr('name',settings.name);buttons.apply(form,[settings,self]);
			$(self).append(form);plugin.apply(form,[settings,self]);$(':input:visible:enabled:first',form).focus();if(settings.select){input.select();}
			input.keydown(function(e){if(e.keyCode==27){e.preventDefault();reset.apply(form,[settings,self]);}});var t;
			if('cancel'==settings.onblur){input.blur(function(e){t=setTimeout(function(){reset.apply(form,[settings,self]);},500);});}else if('submit'==settings.onblur){input.blur(function(e){t=setTimeout(function(){form.submit();},200);});}else if($.isFunction(settings.onblur)){input.blur(function(e){settings.onblur.apply(self,[input.val(),settings]);});}else{input.blur(function(e){});}
			form.submit(function(e){if(t){clearTimeout(t);}
			e.preventDefault();if(false!==onsubmit.apply(form,[settings,self])){if(false!==submit.apply(form,[settings,self])){if($.isFunction(settings.target)){var str=settings.target.apply(self,[input.val(),settings]);$(self).html(str);self.editing=false;callback.apply(self,[self.innerHTML,settings]);if(!$.trim($(self).html())){$(self).html(settings.placeholder);}}else{var submitdata={};submitdata[settings.name]=input.val();submitdata[settings.id]=self.id;if($.isFunction(settings.submitdata)){$.extend(submitdata,settings.submitdata.apply(self,[self.revert,settings]));}else{$.extend(submitdata,settings.submitdata);}
			if('PUT'==settings.method){submitdata['_method']='put';}
			$(self).html(settings.indicator);var ajaxoptions={type:'POST',data:submitdata,dataType:'html',url:settings.target,success:function(result,status){if(ajaxoptions.dataType=='html'){$(self).html(result);}
			self.editing=false;callback.apply(self,[result,settings]);if(!$.trim($(self).html())){$(self).html(settings.placeholder);}},error:function(xhr,status,error){onerror.apply(form,[settings,self,xhr]);}};$.extend(ajaxoptions,settings.ajaxoptions);$.ajax(ajaxoptions);}}}
			$(self).attr('title',settings.tooltip);return false;});});this.reset=function(form){if(this.editing){if(false!==onreset.apply(form,[settings,self])){$(self).html(self.revert);self.editing=false;if(!$.trim($(self).html())){$(self).html(settings.placeholder);}
			if(settings.tooltip){$(self).attr('title',settings.tooltip);}}}};});};$.editable={types:{defaults:{element:function(settings,original){var input=$('<input type="hidden"></input>');$(this).append(input);return(input);},content:function(string,settings,original){$(':input:first',this).val(string);},reset:function(settings,original){original.reset(this);},buttons:function(settings,original){var form=this;if(settings.submit){if(settings.submit.match(/>$/)){var submit=$(settings.submit).click(function(){if(submit.attr("type")!="submit"){form.submit();}});}else{var submit=$('<button type="submit" />');submit.html(settings.submit);}
			$(this).append(submit);}
			if(settings.cancel){if(settings.cancel.match(/>$/)){var cancel=$(settings.cancel);}else{var cancel=$('<button type="cancel" />');cancel.html(settings.cancel);}
			$(this).append(cancel);$(cancel).click(function(event){if($.isFunction($.editable.types[settings.type].reset)){var reset=$.editable.types[settings.type].reset;}else{var reset=$.editable.types['defaults'].reset;}
			reset.apply(form,[settings,original]);return false;});}}},text:{element:function(settings,original){var input=$('<input />');if(settings.width!='none'){input.width(settings.width);}
			if(settings.height!='none'){input.height(settings.height);}
			input.attr('autocomplete','off');$(this).append(input);return(input);}},textarea:{element:function(settings,original){var textarea=$('<textarea />');if(settings.rows){textarea.attr('rows',settings.rows);}else if(settings.height!="none"){textarea.height(settings.height);}
			if(settings.cols){textarea.attr('cols',settings.cols);}else if(settings.width!="none"){textarea.width(settings.width);}
			$(this).append(textarea);return(textarea);}},select:{element:function(settings,original){var select=$('<select />');$(this).append(select);return(select);},content:function(data,settings,original){if(String==data.constructor){eval('var json = '+data);}else{var json=data;}
			for(var key in json){if(!json.hasOwnProperty(key)){continue;}
			if('selected'==key){continue;}
			var option=$('<option />').val(key).append(json[key]);$('select',this).append(option);}
			$('select',this).children().each(function(){if($(this).val()==json['selected']||$(this).text()==$.trim(original.revert)){$(this).attr('selected','selected');}});}}},addInputType:function(name,input){$.editable.types[name]=input;}};$.fn.editable.defaults={name:'value',id:'id',type:'text',width:'auto',height:'auto',event:'click.editable',onblur:'cancel',loadtype:'GET',loadtext:'Loading...',placeholder:'Click to edit',loaddata:{},submitdata:{},ajaxoptions:{}};})(jQuery);
			
			$.editable.addInputType('noMal', {
			    element:function(settings,original){
			       //console.log("settings:");console.log(settings);console.log("original:");console.log(original);
			        var input = $('<input type="text">').autoGrowInput();
			        $(this).append(input);
                    return(input);
			    },
			    content : function(string, settings, original) { 
			      //  console.log(string);
					string = rhtmlspecialchars(string);
			     //   string =  string.replace( /\&amp;/g, '&' );
				//	string = string.replace(/\, "");
			        $(this).children().val(string);
			      //  console.log("string");console.log(string);console.log("settings:");console.log(settings);console.log("original:");console.log(original);
                },
			    submit:function(settings, original){
			      // console.log("settings:");console.log(settings);console.log("original:");console.log(original); 
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
			</script>
				<style type="text/css">

					#download{
						position:absolute;
						top:10px;
						left:50%;
					}
					*{
						padding:0px;
						margin:0px;
					}
					li{
						list-style-type: none;
					}
					body{
					    overflow-x: hidden;
					    width:100%;
					    padding:0px;
					    margin:0px;
						font-family:<?echo$Font;?>, arial;
						font-size:12pt;
						text-align:center;
					}
					.header{
						width:100%;
						position:absolute;
						left:0px;
						height:45px;
						display:inline-block;
						padding-bottom:45px;
					}	
					.headerB{
						position:relative;
						background:#EAEAEA;
						width:100%;
					//	max-width:1000px;
						margin:auto;
						display:inline-block;
						height:45px;
						}		
					.headerC{
						position:relative;
						background:#EAEAEA;
						width:100%;
						//max-width:600px;
						margin:auto;
						padding-right:1%;
						display:inline-block;
						height:45px;
						}
						.contentB{
						    padding-right:25px;
						}
					.content{
						min-height:800px;
						//width:100%;
						padding:0%;
						padding-top:75px;
						padding-bottom:50px;
						max-width:750px;
					//	min-width:600px;
						margin:auto;
						background:<?echo$Background;?>;
						height:100%;
						text-align:left;
						display:inline-block;
					}
					#gear{
						position:absolute; 
						top:0px;
						right:25px;
					}
			        .font{
						text-shadow: 0 1px 0 #ffffff;
			            padding-left:20px;
						padding-bottom:10px;
						position:absolute; 
						top:13px;
						right:130px;
                    }
					.background
					{
						text-shadow: 0 1px 0 #ffffff;
			            padding-left:20px;
						padding-bottom:10px;
						position:absolute; 
						top:13px;
						right:50px;
					}
					.pw{
						position:absolute; 
						top:13px;
						right:5px;	
					}
					a{
						text-decoration:none;
						color:black;
					}
					.edit{
					}
					.pad50{
					    margin-left:50px;
						margin-right:0px;
					}
					.h1{
						font-weight:bold;
						font-size:16pt;
						position:relative;
						margin-left:25px;
						margin-top:20px;
						//right:25px;
					}
					.link{
						cursor:pointer;
					}
					.dots{
						 cursor:move;
					}
					.fork{
						position:relative;
						top:-5px;
						float:right;
						cursor:pointer;
					}
					.start{
						position:absolute;
						top:50px;
						left:25px;
						cursor:pointer;
					}					
					.list{
						position:absolute;
						top:50px;
						left:100px;
						cursor:pointer;
					}
			</style>
			<script type="text/javascript">

	$(document).ready(function(){

<?if($view == "view"):?>

		$(".header").hover(function(){
			$(".header").animate({top:'0'},100);
		},
		function(){
			$(".header").animate({top:'-45'},100);
		}).delay(500).animate({top:"-45"},200);

		gearClick = function(){
			$("#gear").html("<form action='' method='post'><br><input type='hidden' value='edit' name='view'><input class='pw' name='pw' type='password' value='' id='pw'><form>");
			$("#pw").focus();
			$("#pw").blur(function(){
				$("#gear").html("<a href='javascript:gearClick();'><img src='data:image/png;base64,<?echo$gears;?>'></a>");
			})
		//return false;	
		}
<?else:?>

		$("#gearLink").attr("href", "?download=true");
		$("#gearImg").attr("src","data:image/png;base64,<?echo$dl;?>").css("padding-top","14px");
		
		function sortHelper(thing, i){
			$(thing).children().each(function(index2){
				if(index2>0){
					var foo = $(this).attr("id");
					if(foo == undefined || index2 == length){
						foo = $(this).attr("name").split("_");
						foo[1] = i;
						foo = foo.join("_");
						$(this).attr("name", foo);
						makeDelete(this);
					}
					if(foo != undefined){
						foo = foo.split("_");
						foo[2] = i;
						foo = foo.join("_");
						$(this).attr("id", foo);
					}		
				}	
			});	
		}
		$("#soloShows__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"soloShows", order:$('#soloShows__0').sortable('toArray')}, function(data){
					$("#soloShows__0").children().each(function(index){
						if(index+2 < ($("#soloShows__0").children().length)){
							$(this).attr("id", "soloShows_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});  
		$("#degrees__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"degrees", order:$('#degrees__0').sortable('toArray')}, function(data){
					$("#degrees__0").children().each(function(index){
						if(index+2 < ($("#degrees__0").children().length)){
							$(this).attr("id", "degrees_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		}); 		
		$("#grants__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"grants", order:$('#grants__0').sortable('toArray')}, function(data){
					$("#grants__0").children().each(function(index){
						if(index+2 < ($("#grants__0").children().length)){
							$(this).attr("id", "grants_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		}); 			
		$("#publications__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"publications", order:$('#publications__0').sortable('toArray')}, function(data){
					$("#publications__0").children().each(function(index){
						if(index+2 < ($("#publications__0").children().length)){
							$(this).attr("id", "publications_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		}); 			
		$("#groupShows__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"groupShows", order:$('#groupShows__0').sortable('toArray')}, function(data){
					$("#groupShows__0").children().each(function(index){
						if(index+2 < ($("#groupShows__0").children().length)){
							$(this).attr("id", "groupShows_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});  			
		$("#collections__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"collections", order:$('#collections__0').sortable('toArray')}, function(data){
					$("#collections__0").children().each(function(index){
						if(index+2 < ($("#collections__0").children().length)){
							$(this).attr("id", "collections_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});   			
		$("#bibliographys__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"bibliographys", order:$('#bibliographys__0').sortable('toArray')}, function(data){
					$("#bibliographys__0").children().each(function(index){
						if(index+2 < ($("#bibliographys__0").children().length)){
							$(this).attr("id", "bibliographys_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});    			
		$("#employments__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"employments", order:$('#employments__0').sortable('toArray')}, function(data){
					$("#employments__0").children().each(function(index){
						if(index+2 < ($("#employments__0").children().length)){
							$(this).attr("id", "employments_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});     			
		$("#galleries__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"galleries", order:$('#galleries__0').sortable('toArray')}, function(data){
					$("#galleries__0").children().each(function(index){
						if(index+2 < ($("#galleries__0").children().length)){
							$(this).attr("id", "galleries_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		});      			
		$("#notes__0").sortable({ 
		    handle : '.handle', 
			items: "li:not(a)",
		    update : function () { 
				$.post("index.php",{view:"edit",array:"notes", order:$('#notes__0').sortable('toArray')}, function(data){
					$("#notes__0").children().each(function(index){
						if(index+2 < ($("#notes__0").children().length)){
							$(this).attr("id", "notes_"+index);
							var length = $(this).children().length-1;
							sortHelper(this, index);
						}
					});
				});
			} 
		}); 
		

		setDelete();
		makeEdit();
		$('#Font').editable(function(value, settings) { 
			$.post("index.php", { id: "Font", value:value, view:"ajax" }, function(v){});
			$("body").css("font-family",value);
			return value;
		},
		{	
			type:"noMal",
			placeholder:"Enter Font",
			indicator:"saving...",
			style:"inherit",

		});
		$('#Background').editable(function(value, settings) { 
			$.post("index.php", { id: "Background", value:value, view:"edit" , pw: "<?echo$pw;?>"}, function(v){
				console.log(v);
			});
			$(".content").css("background",value);
			$("#Background").css("color",value);
			return value;
		},
		{
			placeholder:"Enter Background",
			indicator:"saving...",
			style:"inherit"
		});

<?endif;?>
	});
<?
$keyArrayString = "var keyArray = new Array(";
foreach($infoCopy as $k=>$v):
$keyArrayString.="\"$k\",";
endforeach;
$keyArrayString = substr($keyArrayString, 0, -1).");\n";
echo$keyArrayString;
?>

    var makeDelete = function(button){

        if(typeof(button)!="object"){
            button = $(button);
        }
        //$(button).css("background","red");
        $(button).unbind("click");
        $(button).click(function(){
                //console.log("ACTUALLY DELETEING");
                //console.log($(this).attr("name"));
                //console.log($(this).length)
				foo = $(this).attr("name")
				goo = foo.split("_");
				var poo = goo[0]+"_delete_"+goo[1];
				//console.log(poo);
				$.post("index.php", { id: poo, value:"", view:"ajax" }, function(v){});
				$("#"+foo).hide('fast', function(){ 
					$("#"+foo).remove();						
                    var spot = $("#span_"+keyArray.indexOf(goo[0]));
					var chillins = spot.children(':nth-child(3)').children();
					$(chillins).each(function(index){
					  //  console.log("index="+index);
					  //  console.log("current index = "+goo[1]);
						if(index>=goo[1] && index<((chillins.length)-2)){
							//console.log(this);
							var oldID = $(this).attr("id");
						//	console.log("trying to split id of ");
						//	console.log(this);
							curID = oldID.split("_");
							//console.log("changing"+curID[curID.length-1]+" to "+(parseInt(curID[curID.length-1])-1));
							curID[curID.length-1] = (parseInt(curID[curID.length-1])-1);
							newID = curID.join("_");
							$(this).attr("id", newID);
							var chilength = $(this).children().length;
							//console.log("children");
						    //console.log($(this).children());
							$(this).children().each(function(index){
							    //console.log("'this' is:");
							   // console.log($(this));
								if(index == 0) return;
								if(index<(chilength-1)){
									var oldID2 = $(this).attr("id");
								}
								else{
									var oldID2 = $(this).attr("name");
									if($(this).attr("id")){
									    	var oldID22 = $(this).attr("id");
                                            var curID22 = oldID22.split("_");
								            curID22[curID22.length-1] = parseInt(curID22[curID22.length-1])-1;
								            var newID22 = curID22.join("_");
									}
								}
								//console.log("old id2:");
							    //console.log(oldID2);
								//console.log("old id2 was<<");
								var curID2 = oldID2.split("_");
								curID2[curID2.length-1] = parseInt(curID2[curID2.length-1])-1;
								var newID2 = curID2.join("_");
								
								if(index< (chilength-1)){
									$(this).attr("id", newID2);
								}
								else{
								    //console.log(this);
									$(this).attr("name", newID2);
									if($(this).attr("id")){
									    $(this).attr("id", newID22);
									}								
								}
								makeDelete(this);

							});
					    }
					    if(index==(chillins.length-2)){
						   // console.log(this);
						    var newName = $(this).attr("name")-1;
						    $(this).attr("name", newName);

					    }
				    });
		        });
		    });
    }
	var setDelete = function(){
		$(".delete").each(function(index){
			makeDelete(this);
		});
	}

                var addTo = function(key,amount){
                    //console.log("ADD");
                    //console.log(key, amount);
                    var foo = parseInt(amount)+1;
                    $("#"+key).attr("name",(foo));
                    switch (key){
                    <?
                    $i=0;
                    foreach ($infoArray as $title=>$infos):
                        echo "
                        case $i:\n";
                        $dump = "<div id=\"$title"."_'+amount+'\">";
                        ?>
                        var spot = $("#span_"+keyArray.indexOf("<?echo$title;?>"));
                        //console.log($(spot).children(":nth-child(3)").children().length);

                        <?
                        $dump = "<li class=\"draggable\" id=\"$title"."_'+(($(spot).children(\":nth-child(3)\").children().length)-2)+'\">"."<img class=\"handle dots\"  src=\"data:image/png;base64,$drag\">";
                        foreach($infoCopy[$title] as $k=>$value):
                            if($k==0):continue;endif;
                            $classes = $dump == "" ? "newEdit" : "newEdit";
                            //$dump .= '<span name="'.$value.'" class="'.$classes.'" id="'.$title.'_'.$value.'_'.($count($$title)).'"></span>&nbsp;-&nbsp;';      
                            $dump .= '<span name="'.$value.'" class="'.$classes.'" id="'.$title.'_'.$value.'_\'+amount+\'"></span>&nbsp;-&nbsp;';      
                        endforeach;
                        $dump = substr($dump, 0, -13);
                        $dump .= $view == "edit" ? " <img id=\"deleteLink_".$title."_'+amount+'\" class=\"delete link\" name=\"".$title."_'+amount+'\" src=\"data:image/png;base64,$x\">":"";
                        $dump.="</li>";
                        //$dump = substr($dump, 0, -13)."</div>";
                        echo "
                        var fill = '$dump';\n";
                    ?>
                            $.post("index.php", { id: "<?echo$title;?>_<?echo$value;?>_new", value:"", view:"ajax" }, function(v){});
                            var spot = $("#span_<?echo$i;?>").children();
                            //console.log(spot.children());
                            var index = spot.children().length-2;
                            //console.log(index);
                            if(index>0){
                                //console.log("after");
                                spot.children(':nth-child('+index+')').after(fill);
                            }
                            else{
                                //console.log("before");
                                spot.children(':nth-child('+index+1+')').before(fill);
                            }
                            $('.newEdit').each(function(index){
                                    $(this).editable('index.php',
                                    {	              				   
                                        type:"noMal",
                                        placeholder:"Enter "+$(this).attr("name"),
                                        indicator:"saving...",
                                        style:"inherit",
										data:function(a,b){
											console.log("data");
											console.log(a);
											return a;
										},
                                        submitdata : {view: "ajax", newArray:"<?echo$title;?>"}
                                    });
                            });
                            //console.log("wants to make into delete number "+amount);
                            
                            makeDelete("#<?echo'deleteLink_'.$title.'_"+amount+"';?>");
                            break;
                        <?
                            $i++;
                        endforeach;
                        ?>
                    }	
                }
                var makeEdit = function(){
                    $('.edit').each(function(index){
                        $(this).editable('index.php',
                        {	
                            type:"noMal",
                            placeholder:"Enter "+$(this).attr("name"),
	                        indicator:"saving...",
	                        style:"inherit",
	                        submitdata : {view: "ajax"}
                        });
                    });
                };
			</script>
			<script type="text/javascript">
						//GOOGLE ANALYTICS FOR SIVI.ME

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-27235350-1']);
			  _gaq.push(['_trackPageview']);
			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();
			</script>
			
		</head>
		<body>
		<div class="header">
		<div class="headerB">
		<div class="headerC">
		<span id="gear"><a id="gearLink" href="javascript:gearClick();"><img id="gearImg" src='data:image/png;base64,<?echo$gears;?>'></a></span>
		<?if($view=="edit"):?>
		<span class="background" name="Background" id="Background" style="color:<?echo$Background;?>"><?echo$Background;?></span>
		<span class="font" name="Font" id="Font"><?echo$Font;?></span>
		<?else:
		$_SESSION['pw'] = "";
		endif;?>
				<span id="infoButton" style="font-size:14pt; font-weight:bold; cursor:pointer;text-shadow: 0 1px 0 #ffffff; float:left;padding:12px;">SIVI.ME</span>
<div style="float:left;padding-left:10px;padding-top:11px;" class="fb-like"  data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>

		</div>
		</div>
		</div>
		<div class="content">
		<div class="contentB">
						<div id="test-log"></div>

		<span class="edit h1" id="Name" name="Name"><?echo$Name;?></span><br>
		<ul id="contact_list" class="pad50">
		<?
		echo $Address != "" || $view == "edit"? '<li style="list-style-type: none;" id="1_1"><span class="edit  handle" id="Address" name="Address">'.$Address.'</span></li>':'';
		echo ($City != "" || $State != "" || $Zip != "") || $view == "edit" ? '<li style="list-style-type: none;" id="1_2">':'';
		echo $City != "" || $view == "edit"? '<span class="edit  handle" id="City" name="City">'.$City.'</span>, ':'';
		echo $State != "" || $view == "edit"? '<span class="edit" id="State" name="State">'.$State.'</span> ':'';
		echo $Zip != "" || $view == "edit"? '<span class="edit" id="Zip" name="Zip">'.$Zip.'</span>':'';
		echo ($City != "" || $State != "" || $Zip != "") || $view == "edit" ? '</li>':'';
		echo $Country != "" ? '<li style="list-style-type: none;" id="1_3"><span class="edit  handle" id="Country" name="Country">'.$Country.'</span></li>' : '';	
		echo $Phone != "" || $view == "edit"? '<li style="list-style-type: none;" id="1_4"><span class="edit  handle" id="Phone" name="Phone">'.$Phone.'</span></li>':'';
		echo $Email != "" || $view == "edit"? '<li style="list-style-type: none;" id="1_5"><span class="edit  handle" id="Email" name="Email">'.$Email.'</span></li>':'';
		echo $Homepage != "" || $view == "edit"? '<li style="list-style-type: none;" id="1_6"><span class="edit  handle" id="Homepage" name="Homepage">'.$Homepage.'</span></li>':'';
		?>
		</ul>
		<br>
		<?
		$i=0;
		foreach($infoArray as $title=>$infos):
			if(count($infos)>0 || $view == "edit"):
			echo"<div id=\"span_$i\">";
			  $j = 0;

     		echo'<br><span class="h1">'.$infoCopy[$title][0].'</span><br><ul id="'.$title.'__'.$j.'" class="pad50">';

            foreach($infos as $info):
				//$dump = $view == "edit" ? "<li class='draggable' id=\"$title"."_"."$j\">"."<img style='padding:2px; cursor:move;' src='data:image/png;base64,$drag'>":"<li id=\"$title"."_"."$j\">";
				$dump = $view == "edit" ? "<li  class='draggable' id=\"$title"."_"."$j\">"."<img class='handle dots'  src='data:image/png;base64,$drag'>":"<li style='list-style-type: square;' id=\"$title"."_"."$j\">";
 				foreach($info as $field=>$value):
                    $classes = $dump == "" ? "edit" : "edit";
					$dump .= '<span name="'.$field.'" class="'.$classes.'" id="'.$title.'_'.$field.'_'.$j.'">'.stripslashes($value).'</span>&nbsp;-&nbsp;';  
				endforeach;
				$dump = substr($dump, 0, -13);
				$dump .= $view == "edit" ? " <img class=\"delete link\" name=\"".$title."_".$j."\" src='data:image/png;base64,$x'>":"";
				$dump.="\n</li>";
				echo $dump;
				$j++;    

			endforeach;
			if($view == "edit"):
				echo "<a id='$i' name='$j' href='javascript:addTo($i,$(\"#$i\").attr(\"name\"));'><span style='padding:3px;margin-top:5px;font-weight:bold;'>+</span></a><br>";
			endif;
			echo"</ul></div>";
			endif;
			$i++;
		endforeach;
		?>
		</div>
		</div>
<?if($view == "view"):?>

<?else:?>
<script>
$(document).ready(function(){

	$("#infoButton").click(function(){
		window.location="";
	});
});
</script>
<?endif;?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=250299398360870";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	</body>
	</html>
<?endif;?>