<?php
	// Create events array
	$fp=fopen("data/events.txt","r");
	$managedEventArray = array();
	$managedEventArrayIdx = 0;
	while(!feof($fp)){
		$data = explode("\t", fgets($fp,1024));
		for($i=0;$i<$data[1];$i++){
			$managedEventArray[$managedEventArrayIdx++] = $data[0];
		}
	}
	shuffle($managedEventArray);
	fclose($fp);

	// Create common items array
	$fp=fopen("data/commonItems.txt","r");
	$managedCItemsArray = array();
	$managedCItemsArrayIdx = 0;
	while(!feof($fp)){
		$data = explode("\t", fgets($fp,1024));
		for($i=0;$i<$data[1];$i++){
			$managedCItemsArray[$managedCItemsArrayIdx++] = $data[0];
		}
	}
	shuffle($managedCItemsArray);
	fclose($fp);

	// Create special items array
	$fp=fopen("data/specialItems.txt","r");
	$managedSItemsArray = array();
	$managedSItemsArrayIdx = 0;
	while(!feof($fp)){
		$data = explode("\t", fgets($fp,1024));
		for($i=0;$i<$data[1];$i++){
			$managedSItemsArray[$managedSItemsArrayIdx++] = $data[0];
		}
	}
	shuffle($managedSItemsArray);
	fclose($fp);
?>

<html>
<head>
	<meta charset="utf8" />
	<script>
		function getEvent(){
			id = document.getElementById("eventId").value=='' ? 0 : document.getElementById("eventId").value;

			var events = <?php echo '["' . implode('", "', $managedEventArray) . '"]'?>;
			document.getElementById("eventContent").innerHTML = shuffle(events)[id];
		}

		function getCommonItem(){
			var items = <?php echo '["' . implode('", "', $managedCItemsArray) . '"]'?>;
			document.getElementById("cItemContent").innerHTML = shuffle(items)[0];
		}

		function getSpecialItem(){
			var items = <?php echo '["' . implode('", "', $managedSItemsArray) . '"]'?>;
			document.getElementById("sItemContent").innerHTML = shuffle(items)[0];
		}

		/* Shuffle the array */
		function shuffle(o){
		    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		    return o;
		}
	</script>
</head>
<body bgcolor='#60B9CE'>
	<div style='padding:20px;'>
		<input id="eventId" placeholder='輸入號碼, 不輸入則隨機抽' / >
		<input type='button' value="抽事件" onClick="getEvent()" />
		<span id="eventContent"></span>
		
		<div>
			<input type='button' value="抽一般道具" onClick="getCommonItem()" />
			<span id="cItemContent"></span>
		</div>
		<div>
			<input type='button' value="抽特殊道具" onClick="getSpecialItem()" />
			<span id="sItemContent"></span>
		</div>
	</div>
</body>
</html>


