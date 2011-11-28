<?
/*
          o8o               o8o                                  
          `"'               `"'                                  
 .oooo.o oooo  oooo    ooo oooo      ooo. .oo.  .oo.    .ooooo.  
d88(  "8 `888   `88.  .8'  `888      `888P"Y88bP"Y88b  d88' `88b 
`"Y88b.   888    `88..8'    888       888   888   888  888ooo888 
o.  )88b  888     `888'     888  .o.  888   888   888  888    .o 
8""888P' o888o     `8'     o888o Y8P o888o o888o o888o `Y8bod8P' 
  

Sivi is a single php file used for creating and maintaining an artist resume / CV.
When you first open the page in a browser you need to enter a password where the gears are.
(This step is taken care of if built from sivi.me)
You can edit in place with jeditable and drag blocks of information with sortable.
All data is stored as a json object. 
With every change the file reads itself, searches for & updates the json object then replaces itself with the new version like Oroborus.
There is basic validation happening on the front and backend, but there has not been extensive testing for security.

The project was released as an art piece for Klaus von Nichtssagend Gallery at their online exhibition space http://klausgallery.net.
Sivi.me remains an art domain as well as a location for users to create their own sivis.
Once created, the sivi file can be kept at sivi.me or downloaded for individual use.

::)

Billy Rennekamp, 2011
http://billyrennekamp.com


Copyright (C) 2011 by Billy Rennekamp

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/
session_start();
$dl = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTM5jWRgMAAAAVdEVYdENyZWF0aW9uIFRpbWUAMi8xNy8wOCCcqlgAAAQRdEVYdFhNTDpjb20uYWRvYmUueG1wADw/eHBhY2tldCBiZWdpbj0iICAgIiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+Cjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDQuMS1jMDM0IDQ2LjI3Mjk3NiwgU2F0IEphbiAyNyAyMDA3IDIyOjExOjQxICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4YXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iPgogICAgICAgICA8eGFwOkNyZWF0b3JUb29sPkFkb2JlIEZpcmV3b3JrcyBDUzM8L3hhcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhhcDpDcmVhdGVEYXRlPjIwMDgtMDItMTdUMDI6MzY6NDVaPC94YXA6Q3JlYXRlRGF0ZT4KICAgICAgICAgPHhhcDpNb2RpZnlEYXRlPjIwMDgtMDMtMjRUMTk6MDA6NDJaPC94YXA6TW9kaWZ5RGF0ZT4KICAgICAgPC9yZGY6RGVzY3JpcHRpb24+CiAgICAgIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyI+CiAgICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2UvcG5nPC9kYzpmb3JtYXQ+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDUdUmQAAAE7SURBVDiNpZM7TsNAEIb/8WPNwwJKh5qGBiNxAiqa+AjQ5iCufQBaOILTUHEBIyEaGmoIVAkyEHshQ7HedSzbUiSvtNqZ0fzfzmhniZkxZFmD1AAcbRCRCQYpdZY1i9gk6cqdrkQAuD1n5H/K9m3g8p4683oBH7/AolT2vujLWgMEKaUAxtp/l8C8AizJ5OjWpgAiACDdy2hq8dVZs/XFd1XBTvPWmwfC23hFDQARIUiJL05qSP6lTn+3Ft89EWYR17p1gC7z9FjFlp8qtrWn/MdnMi/RC9CQwyPGaq5i1gHj9YU6n7EToCHbvrJ/8uYMbATQEKAtbgAqP2qpN1jMnOo5GGVZdu26LjzPgxACQgh4ngdmhpSytcMwnJgKkiRhKSWKokBZluYsSzVJjuPAtm2ztR/HMdHQ7/wPj7WgYLMWxPQAAAAASUVORK5CYII=";
$drag = "iVBORw0KGgoAAAANSUhEUgAAAAYAAAAKCAQAAAA9B+e4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADGGlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjaY2BgnuDo4uTKJMDAUFBUUuQe5BgZERmlwH6egY2BmYGBgYGBITG5uMAxIMCHgYGBIS8/L5UBFTAyMHy7xsDIwMDAcFnX0cXJlYE0wJpcUFTCwMBwgIGBwSgltTiZgYHhCwMDQ3p5SUEJAwNjDAMDg0hSdkEJAwNjAQMDg0h2SJAzAwNjCwMDE09JakUJAwMDg3N+QWVRZnpGiYKhpaWlgmNKflKqQnBlcUlqbrGCZ15yflFBflFiSWoKAwMD1A4GBgYGXpf8EgX3xMw8BSMDVQYqg4jIKAUICxE+CDEESC4tKoMHJQODAIMCgwGDA0MAQyJDPcMChqMMbxjFGV0YSxlXMN5jEmMKYprAdIFZmDmSeSHzGxZLlg6WW6x6rK2s99gs2aaxfWMPZ9/NocTRxfGFM5HzApcj1xZuTe4FPFI8U3mFeCfxCfNN45fhXyygI7BD0FXwilCq0A/hXhEVkb2i4aJfxCaJG4lfkaiQlJM8JpUvLS19QqZMVl32llyfvIv8H4WtioVKekpvldeqFKiaqP5UO6jepRGqqaT5QeuA9iSdVF0rPUG9V/pHDBYY1hrFGNuayJsym740u2C+02KJ5QSrOutcmzjbQDtXe2sHY0cdJzVnJRcFV3k3BXdlD3VPXS8Tbxsfd99gvwT//ID6wIlBS4N3hVwMfRnOFCEXaRUVEV0RMzN2T9yDBLZE3aSw5IaUNak30zkyLDIzs+ZmX8xlz7PPryjYVPiuWLskq3RV2ZsK/cqSql01jLVedVPrHzbqNdU0n22VaytsP9op3VXUfbpXta+x/+5Em0mzJ/+dGj/t8AyNmf2zvs9JmHt6vvmCpYtEFrcu+bYsc/m9lSGrTq9xWbtvveWGbZtMNm/ZarJt+w6rnft3u+45uy9s/4ODOYd+Hmk/Jn58xUnrU+fOJJ/9dX7SRe1LR68kXv13fc5Nm1t379TfU75/4mHeY7En+59lvhB5efB1/lv5dxc+NH0y/fzq64Lv4T8Ffp360/rP8f9/AA0ADzT6lvFdAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAtSURBVHjanMuxDQAgDMTAC0Oxf52lnjaIDneW5Qo67GIZVIZcZUGn85Sf5wwAW6wMMxeHNEAAAAAASUVORK5CYII=";
$gears = "iVBORw0KGgoAAAANSUhEUgAAABEAAAAoCAYAAAFvHyEJAAABc0lEQVRIx+2Vu0pDQRCGz0NYiCAasNAiKHiBECIkYhERG8EnU/gUbDyWXt7DwjSKErCwsdEUGrwnWZt/k3XPhughiJAUw87O/PvP7JyZPZExJrISJTaACW8SZzoKYADTUYIBeht1Phz4d5xpDMAi8CYp2HwmgXF7wSzwKcn1I+yP75gepJrO29pqnQMSoBZwB4wCNxbsg4ycI8BFN1DRC5f/BvrjEgwAQGWe0BoDx9KngDagLjGSR/V7G5CTYxNYk75iATUZngWOHLaaNSzLsAoUpJfdEPeKaXN4BZ5cwLTWA+BIehYYlK/Zt+4fkqQkcfrblz117WE3jE8yBlTU4nlgFjgXySWwoF/PA3ANZEIkEVACPpy5aWkSm46tqbFNZLIN7ANnDnjLS73s+CrC77gkMXDqPPsG2PBISo7vCjgB4tB1loAXL/U60HBsDREGC5sBqsA7sK6Hx2ZW1bNVVOFvgZluhfVlVyRxz088nJ1/SvIFJGxMewwj+XUAAAAASUVORK5CYII=";
$x = "iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAYAAADEUlfTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzdFQ0RFMzZEMTdEMTFFMEIwNzJBMzg5RjQxMTQyNjEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzdFQ0RFMzdEMTdEMTFFMEIwNzJBMzg5RjQxMTQyNjEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFM0VDNzE2OUQxN0MxMUUwQjA3MkEzODlGNDExNDI2MSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFM0VDNzE2QUQxN0MxMUUwQjA3MkEzODlGNDExNDI2MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pk6j2R0AAAB/SURBVHjaYkxLS9vPwMCwcNasWQuANAOQLwCk5gPxRhYgAeYABUFyG4AYpNgApIEJSDgC8QWo6vNQiUSgSRsYoUYpAKn7DBCwACiRCGIwQ+3YDsQSQPwAiB2MjY0fnj179gITkh0g1YYwK4CaAkCSH6B2gIz7AHUDyGECAAEGACoZKiO+Ukh+AAAAAElFTkSuQmCC";
$link = "R0lGODlhEAAQAIABACBRZv///yH5BAEAAAEALAAAAAAQABAAAAIgjI+py+0GIngwKjkDvkhqXmWLaDXicXbgijLYRsVyXAAAOw==";
$ico = "AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASnwAAMqkAAEKuAwDNaRUAvnVAAKWSdgBPqpkAV4mcAFWJnQBojp0Aao6dAG2ToQB4mKQAZZKlAEOLqABLjqgAUI6oAFeQqACOoKgAjKGoAGKUqQCNoakAkaKpAFSyqwCTpawAWpewAGqcsABxzrEANo2zAJOqswClsLQAMI23AImpuABno7oAKo67AIKsvACbsrwAj7W8AKC1vACBrr0AgK+9AIS0vQCMtr0Apre9AFyhvgCxu74AXLO/AKa7vwCyu78An7+/AKu5wACvvMEArL7BADmZwwCDvMMARaHFADibxgA6m8YAPKHGALbFxgA5nccAsMLHADmcyADBxsgARaXJAD2hygDCyMoAO6DLAMLJywBxzMsAN5/MAD2hzAA+pMwAPqPNAMXKzQAnns4AO6LPAE6q0ABsstAAfbbQAEeo0QAXd9IAQqrSAM7R0gBCqtMArMXTAEOr1QDQ09UA0tTVAHHJ1gAspdcA1tjZADKN2gBsutoAQq/bAEy12wBdt9sASbLcANvc3ABHs90AYrfeAFu53gDb3t4ATaLfAGC63wBrwd8AZLzhAGy94QBmvuEAdczjAJnN4wDh4+MAw9nkAACx5QBrw+UAVMTlAGnF5QDj5OUAUbznAKzX5wDo6OgAbMPpAG/S6QDo6ekAHZPqAOrq6gAAfusAes7sAD/J7QBizO8A7+/vADya8gAAuvQA9PT0AADD9QB4zvUA9fX1APb29gD39/cAS9j4APn5+QD7+/sA/v7+AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABYFgoHCBKOAAAAAAAAAGIJHDk+PkwUjgAAAAAAAFMOSUE4PD41SgAAAAAAAIgRWktGSEdDOgsYFRMefQA/X4aEcVBSIh9UGR03VhB4MGhzgHZkYE1VTg8MQF5hLVtday4GF2psbnBlLA0aY0KOIG0CAAFpcnR3PQQDBSGKAIIjRRtZeVxRZ3o2MShmAAAAjTJPf4eDfnyBiyd7AAAAAAAAjFczJiQrRC8pAAAAAAAAAAAAAAAAAAAAJTQAAAAAAAAAAAAAAAAAAIUqdQAAAAAAAAAAAAAAAAAAbzuOAAAAAAAAAAAAAAAAAACJjv//AADwHwAAwB8AAIA/AAAAAQAAAAAAAAAAAAAAAAAAAAAAAIABAADAAwAA8AcAAP/zAAD/8QAA//gAAP/8AAA=";

$pw = "";
$IP = "";
$Background = "#F5FCCB";
$Font = "Arial";
$pass = false;
if(($_REQUEST['pw']==$pw) || $_SESSION['pw']==$pw){
	$_SESSION['pw'] = $pw;
	$pass = true;
	$view = $_REQUEST['view'];
}
$view = $view == "" ? "view" : $view;

if($_REQUEST['view'] == "edit" && $pw == "" && $_REQUEST['pw'] != ""){
	$pass = true;	
	$filename = "index.php";
	$current = file_get_contents($filename);
	$_SESSION['pw'] = $_REQUEST['pw'];
	//replace old info with new info and save file
	$current2 = str_replace("\$pw = \"\";", "\$pw = \"".addslashes(stripslashes($_REQUEST['pw']))."\";", $current); 
	$current2 = str_replace("\$IP = \"\";", "\$IP = \"".$_SERVER['REMOTE_ADDR']."\";", $current2); 
	file_put_contents($filename, $current2);
}
if(($_REQUEST['id']!="") && $pass):
$filename = "index.php";
$current = file_get_contents($filename);
$view = "none";
$id = ($_REQUEST['id']);
$value = str_replace(">", "",  str_replace("<", "", $_REQUEST['value']));  
$value = htmlspecialchars(str_replace("\\", "", $_REQUEST['value']));
$current = str_replace("\$$id = \"".${$id}."\";", "\$$id = \"".$value."\";", $current);
file_put_contents($filename, $current);

die;
endif; 
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
if(!empty($_REQUEST["newJSON"]) && $pass){

	$filename = "index.php";
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
<link href="data:image/x-icon;base64,<?echo$ico;?>" type="image/x-icon" rel="icon" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://sivi.me/iphone-style-checkboxes.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://sivi.me/iphoneSwitches.css" />

<script>
var jayson = [{"header":"Instructions","data":[["Click the gear icon in the top right corner."],["Enter your password and hit return."],["Once in edit mode, click on a word to edit it."],["Click \"x\" or \"-\" to delete a field or a row or a whole block."],["Click \"+\" to add a field or row (++ to add a block)"],["Drag rows or blocks with the three vertical dots."],["Click the font or hexadecimal color code to change either."],["(Optional)"],["Click the download icon in the top right corner to download your sivi."],["Upload your index.php file to your server with permissions set to 777."]]},{"header":"Name","data":[["Address"],["City, State ZIP"],["Email"],["<a href=\"\" target=\"_blank\">website<\/a>"]]},{"header":"Education","data":[["Degree","Year","Major","Institution"]]},{"header":"Grants & Awards","data":[["Year","Title"]]},{"header":"Solo & Partner Shows","data":[["Year","Title","Location","City","Country"]]},{"header":"Group Shows","data":[["Year","Title","Location","City","Country"]]},{"header":"Books & Publications","data":[["Year","Title","Publisher","City","Country"]]},{"header":"Bibliography","data":[["Author","Title","Publication","Year"]]},{"header":"Employment","data":[["Title","Employer","City","Country"]]},{"header":"Notes","data":[["Notes"]]}];

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
					$(this).bind('keyup keydown blur select update', check);
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

								<?if( $view == "edit"):?>
								$.editable.addInputType('noMal', {
									element:function(settings,original){
										var input = $('<input type="text">').autoGrowInput().addClass("inputTxt");
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
								}
							);
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
										}
									);
								}
							);
						}
					);
					$.post("index.php", {newJSON:newJayson}, function(data){
					}
				);
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
				}
			);
			$(jayson).each(function(kkkk,vvvv){
				//ul of items to be sortable
				var hDiv = $("<ul>").attr("id", vvvv.header).sortable({
					handle:".handle",
					items:"li:not(a)",
					update:function(){update();}
				}
			);
			//ul header
			hHead = addHead(vvvv.header);
			hDiv.prepend($("<img>").css("cursor","move").attr("src","data:image/png;base64,<?echo$drag;?>").addClass("bigHandle"));
			hDiv.append(hHead);
			$(vvvv.data).each(function(k,v){
				var iDiv = $("<li>").attr("id", k);
				iDiv.append($("<img>").addClass("handle").css("cursor","move").attr("src","data:image/png;base64,<?echo$drag;?>"));
				$(v).each(function(kk,vv){
					fSpan = addFspan(kk).html(vv);
					var xImg = deleteField();
					fDiv = $("<span>").append(fSpan).append(xImg);
					iDiv.append(fDiv);
				});
				//new field button
				addB = addButton();
				//delete whole line
				delB = $("<button>").addClass("but").html("-").click(function(){
					$(this).parent().hide("slow", function(){
						$(this).remove();
						update();
					});
				});
				iDiv.append(addB);
				iDiv.append(delB);
				hDiv.append(iDiv);	
			}
		);
		var addRow = addRowFnk();
		delDiv = $("<button>").addClass("but").html("-").click(function(){
			if(confirm("Delete the whole block?")){
				$(this).parent().fadeOut("slow", function(){
					$(this).remove();
					update();
				}
			);
		}
	}
);
hDiv.append(addRow);
hDiv.append(delDiv);
$(sivi).append(hDiv);
}
);
addNewBlock = $("<button>").addClass("but").html("++").click(function(){
	var hDiv = $("<ul>").attr("id", "NEW").sortable({
		handle:".handle",
		items:"li:not(a)",
		update:function(){update();}
	});
	//ul header
	hHead = addHead("NEW");
	hDiv.prepend($("<img>").css("cursor","move").attr("src","data:image/png;base64,<?echo$drag;?>").addClass("bigHandle"));
	hDiv.append(hHead);
	var addRow = addRowFnk();
	delDiv = $("<button>").addClass("but").html("-").click(function(){
		if(confirm("Delete the whole block?")){
			$(this).parent().fadeOut("slow", function(){
				$(this).remove();
				update();
				});}
			});
			hDiv.append(addRow);
			hDiv.append(delDiv);
			$(sivi).prepend(hDiv);
		}
	);
	$(".content").html(sivi).prepend(addNewBlock);
}
addHead = function(html){
	return	$("<h1>").html(html)
	.css("display","inline-block")
	.css("margin-bottom","10px")
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
	return $("<button>").addClass("but").html("+").click(function(){
		var num = $(this).parent().children("li").length;
		var iDiv = $("<li>").attr("id", num);
		iDiv.append($("<img>").addClass("handle").css("cursor","move").attr("src","data:image/png;base64,<?echo$drag;?>"));
		var fSpan = addFspan(0);
		//delete field button
		var xImg = deleteField();
		var nuDiv = $("<span>").append(fSpan).append(xImg);
		addB = addButton();
		//delete whole line
		delB = $("<button>").addClass("but").html("-").click(function(){
			$(this).parent().hide("slow", function(){
				$(this).remove();
				update();
			});
		});
		iDiv.append(nuDiv);
		iDiv.append(addB);
		iDiv.append(delB);
		$(this).before(iDiv);
		update();
	});
}
addButton = function(){
	return $("<button>").addClass("but").html("+").click(function(){	
		var num;
		num = $(this).siblings().length - 1;
		var fSpan = addFspan(num);
		//delete field button
		var xImg = deleteField();
		var nuDiv = $("<span>").append(fSpan).append(xImg);
		$(this).before(nuDiv);
		update();
	});
}
deleteField = function(){
	return $("<img>").css("cursor","pointer").css("position", "relative").css("top", "-10px").attr("src","data:image/png;base64,<?echo$x;?>").click(function(){
		$(this).parent().fadeOut("slow", function(){
			$(this).remove();
			update();
		});

	});
}
<?endif;?>
function plainPrint(){
	var all = $("<div>").addClass("content");
	$(jayson).each(function(k,v){
		var block = $("<ul>").css("display","inline-block");
		//	if(v.header == "css"){return;}
		var h1 = $("<h1>").html(v.header);
		block.append(h1);
		$(v.data).each(function(kk, vv){
			var line = $("<li>").addClass("view");
			$(vv).each(function(kkk, vvv){

				line.append(vvv);
				if(kkk < vv.length-1){
					line.append(" - ");
				}
			});
			block.append(line);
		});
		all.append($("<br>"));
		all.append(block);
	});
	$(".content").replaceWith(all);
}

$(document).ready(function(){

	<?if($view == "view"):?>
	plainPrint();
	$(".header").hover(function(){
		$(".header").animate({top:'0'},100);
	},
	function(){
		$(".header").animate({top:'-45'},100);
	}
	).delay(500).animate({top:"-45"},200);

	gearClick = function(){
		$("#gear").html("<form id='pwForm' action='' method='post'><input type='hidden' value='edit' name='view'><input class='pw' name='pw' type='password' value='' id='pw'></form>");
		$("#pw").focus();
		$("#pw").blur(function(){
			$("#gear").html("<span id='gear'><a class='noImg' id='gearLink' href='javascript:gearClick();'><img id='gearImg' src='data:image/png;base64,<?echo$gears;?>'></a></span>");
		})
		//return false;	
	}
	<?else:?>
	var gearSide;


	$("<span>")
	.addClass("viewEdit")
	.addClass("onChange")
	.append($("<input>").attr("type", "checkbox").attr("checked","checked").addClass("onChange"))
	.appendTo(".header");
	$(".onChange :checkbox").iphoneStyle(
		{
			resizeHandle:      true,
			checkedLabel: 'Edit', 
			uncheckedLabel: 'View',
			onChange: function(elem, value) { 
				if(!value){
					plainPrint();
					$(".header").hover(function(){
						$(".header").animate({top:'0'},100);
					},
					function(){
						$(".header").animate({top:'-45'},100);
						}).delay(500).animate({top:"-45"},200);
						gearSide = $(".right").html();
						$(".right").html("");
					}
					else{
						refresh();
						$(".header").unbind('mouseenter').unbind('mouseleave');
						$(".right").html(gearSide);
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


					}
				}
			}
		);
		refresh();

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

		$("#gearLink").attr("href", "?download=true");
		$("#gearImg").attr("src","data:image/png;base64,<?echo$dl;?>").css("padding-top","14px");


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
		}
	);
	<?endif;?>

}
);
</script>
<style>
body{
	width:100%;
	overflow-x:hidden;
}
*{margin:0px;
	padding:0px;
}
.viewEdit{

	position:absolute;
	left:50%;
	margin-left:-60px;
	top:10px;

}
input[":text"]{
	width:auto;
}
.inputTxt{
	width:50%;
}
h1{
	font-size:16pt;
}
#pwForm{
	position:absolute;
	top:10px;
	right:20px;
}
.divLine{
	margin-left:50px;
}
.divBlock{
	margin-left:50px;
}
.bigHandle{
	height:25px;
}
li{
	list-style-type: none;
	margin-left:25px;
	width:auto;
}
li.view{
	list-style-type: square;
}
ul{
	margin-left:25px;
	margin-bottom:25px;
	width:auto;
}
body{
	font-family:<?echo$Font;?>;
}
.but {
	border: none;
	background:none;
	padding: 3px;
	margin:0px 2px 0px 2px;
	color: #000000;
	font-size: 13px;
	font-family: Helvetica, Arial, Sans-Serif;
	text-decoration: none;
	vertical-align: middle;
	min-width:20px;
	cursor:pointer;
}

.but:active {
	position:relative;
	top:1px;
	border: none;
	background: none;

}
.holder{
	text-align:center;
	width:100%;
}
.content{
	min-width:100px;
	margin:0px auto;
	min-height:800px;
	background:<?echo$Background;?>;
	padding:0%;
	padding-top:75px;
	padding-bottom:50px;
	max-width:750px;
	height:100%;
	text-align:left;
	display:inline-block;
	padding-right:10px;
}
.field{
	margin:0 5px 0 5px;
}

.right{
	float:right;
	display:inline-block;
}
.left{
	float:left;
	display:inline-block;
	height:100%;
	line-height:50px;
}
a{
	text-decoration:none;
	color:black;
	padding-right: 18px;
	background: transparent url(data:image/gif;base64,<?echo$link;?>) no-repeat center right;
}
a.noImg{				
	padding-right: 0px;
	background: none;
}
a:hover{

	color:black;
}
a:active{
	color:black;
}
a:visited{
	color:black;
}
.css{
	position:relative;
}
.push{
	font-family: "Times New Roman";
	font-weight:bold;
	font-style:italic;
	font-size:24pt;
	cursor:pointer;
	margin:0 5px;
}
#gear{
	margin:0px;
	padding:0px;
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
	margin:auto;
	display:inline-block;
	height:45px;
}		
.headerC{
	//	line-height:100%;
	position:relative;
	background:#EAEAEA;
	width:100%;
	margin:auto;
	display:inline-block;
	height:45px;
}
#gear{
	margin-right:25px;
}
</style>
</head>
<body>
<div class="header">
<div class="headerB">
<div class="headerC">
<span style="padding-left:10px;position:absolute; top:13px; left:100px;" class="fb-like"  data-send="false" data-layout="button_count" data-width="auto" data-show-faces="false"></span>

<span class="left">
<a id="infoButton" class="noImg" style="font-size:14pt; font-weight:bold; cursor:pointer;text-shadow: 0 1px 0 #ffffff;margin-left:20px;" href="http://sivi.me">SIVI.ME</a>
</span>
<span class="right">
<?if($view=="edit"):?>
<span class="background" name="Background" id="Background" style="color:<?echo$Background;?>"><?echo$Background;?></span>
<span class="font" name="Font" id="Font"><?echo$Font;?></span>
<?else:
$_SESSION['pw'] = "";
endif;?>
<span id="gear"><a class="noImg" id="gearLink" href="javascript:gearClick();"><img id="gearImg" src='data:image/png;base64,<?echo$gears;?>'></a></span>

</span>
</div>
</div>
</div>
<div class="holder">
<div class="content">
</div>
</div>

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