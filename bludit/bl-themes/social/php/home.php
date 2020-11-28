<?php
error_reporting(0);

?>
<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<?php if ($user): ?>
<div class="card my-2 p-2 bg-light-blue">
	<div>
		<div class="form-group mb-1">
			<textarea id="jspostText" class="form-control" rows="3" placeholder="What's up?"></textarea>
		</div>
		<div id="jspreviewImages" class="mb-1">

		</div>
		<div>
		<input type="file" id="jsimageInputFile">
		<script>
			var jsimageInputFile = document.getElementById('jsimageInputFile');
			jsimageInputFile.onchange = function(event) {
				uploadImage(jsimageInputFile.files[0]);
			}
		</script>
		</div>
		<div class="form-group text-right mb-0">
			<button id="jspostButton" type="button" class="btn btn-primary btn-sm">Post</button>
		</div>
	</div>
</div>
<script>

// Global variables
var _apiToken = "<?php echo $apiToken ?>";
var _userToken = "<?php echo $user->tokenAuth() ?>";
var _pageUUID = Date.now().toString(36) + Math.random().toString(36).substr(2, 15);
var _pageNumber = 1;
var _itemsPerPage = <?php echo $site->itemsPerPage() ?>;
var _users = {}

function getUsers() {
	console.log("Getting users.");
	fetch("http://localhost:8000/api/users?token="+_apiToken, {
		method: "GET"
	}).then(function(response) {
		return response.json();
	}).then(function(data) {
		console.log("Getting user. Response >");
		console.log(data);
		if (data.status=="0") {
			_users = data.data;
		}
	});
}

function getPosts() {
	console.log("Getting posts.");
	_pageNumber = _pageNumber + 1;
	fetch("http://localhost:8000/api/pages?token="+_apiToken+"&pageNumber="+_pageNumber+"&numberOfItems="+_itemsPerPage, {
		method: "GET"
	}).then(function(response) {
		return response.json();
	}).then(function(data) {
		console.log("Getting posts. Response >");
		console.log(data);
		if (data.status=="0") {
			var posts = data.data;
			if (posts.length > 0) {
				for (var i = 0; i < posts.length; i++) {
					insertPostInTimeline(posts[i], false);
				}
			}
		}
	}).then(function() {
		loadGallery();
	});
}

function insertPostInTimeline(args, beginning=true) {
	console.log("Insert post in timeline.");
	const postTemplate = `
	<div class="card my-2 p-2">
		<div class="card-body">
			<img class="float-left rounded-circle" style="width: 48px" src="${_users[args.username].profilePicture}" />
			<div style="padding-left: 56px">
				<p class="mb-2 text-muted">
					@${_users[args.username].nickname} - ${args.date}
				</p>
				${args.content}
			</div>
		</div>
	</div>
	`;
	var listOfPosts = document.getElementById("jslistOfPosts");
	if (beginning) {
		listOfPosts.innerHTML = postTemplate + listOfPosts.innerHTML;
	} else {
		listOfPosts.innerHTML = listOfPosts.innerHTML + postTemplate;
	}
}

function getPost(key) {
	console.log("Getting post.");
	fetch("http://localhost:8000/api/pages/"+key+"?token="+_apiToken, {
		method: "GET"
	}).then(function(response) {
		return response.json();
	}).then(function(data) {
		console.log("Getting post. Response >");
		console.log(data);
		if (data.status=="0") {
			insertPostInTimeline(data.data);
		}
	});
}

function createPost(content) {
	console.log("Creating new post.");
	fetch("http://localhost:8000/api/pages/", {
		method: "POST",
		body: JSON.stringify({
			token: _apiToken,
			authentication: _userToken,
			uuid: _pageUUID,
			content: content
		})
	}).then(function(response) {
		return response.json();
	}).then(function(data) {
		console.log("Creating new post. Response >");
		console.log(data);
		if (data.status=="0") {
			document.getElementById("jspostText").value = "";
			var newPostKey = data.data["key"];
			getPost(newPostKey);
		}
	});
}

function uploadImage(file) {
	console.log("Uploading image.");
	var data = new FormData();
	data.append("image", file);
	data.append("uuid", _pageUUID);
	data.append("token", _apiToken);
	data.append("authentication", _userToken);

	fetch("http://localhost:8000/api/images", {
		method: "POST",
		body: data
	}).then(function(response) {
		return response.json();
	}).then(function(data) {
		console.log("Uploading image. Response >");
		console.log(data);
		var img = document.createElement("img");
		img.src = data.thumbnail;
		img.className = "img-thumbnail";
		img.dataset.original = data.image;
		var previewImages = document.getElementById("jspreviewImages");
		previewImages.appendChild(img);
	});
}

// Event for click on button jspostButton
document.getElementById("jspostButton").onclick = function(event) {
	// Get the post content from the textarea
	var postContent = document.getElementById("jspostText").value;

	// Insert all uploaded images to the post content
	var images = document.getElementById("jspreviewImages").querySelectorAll("img");
	if (images.length > 0) {
		postContent += "<div class=image-gallery>";
		for (var i = 0; i < images.length; i++) {
			postContent += "<a href="+images[i].dataset.original+"><img src="+images[i].src+"/></a>";
		}
		postContent += "</div>";
	}
	createPost(postContent);

	// Clean up
	postContent.value = "";
	document.getElementById("jspreviewImages").innerHTML = "";
}

</script>
<?php endif; ?>

<div id="jslistOfPosts">
<br>

	<!-- Post -->
	<div class="card my-2 p-2">


<?php 

	//if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}

	//if($gnamespace==$asset){$gnamer=$title;}

if($pin<>""){



echo "<div class=\"card-body\">";
	
echo "<img class=\"float-left rounded-circle\" style=\"width: 48px\" src=".letter_avatar($gnamer).">";

echo "<div style=\"padding-left: 56px\">&#x1F4D1;<div id=\"post-content\">";



echo str_replace("\n","<br>",$pin);

echo "</div></div></div></div>";



}






foreach ($listasset as $k=>$v) 

			{
			
			extract($v);


$value=hex2bin($value);
		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true){continue;}

		//check re

		if(strlen($key2) == "64"){
		
		
		
									$txcount=1;
									$txloop=$key2;

									
								

									while($txcount<50) {
									
									$txcount++;

									

									$transaction= $kpc->getrawtransaction($txloop,1);
								

									
									

									foreach($transaction['vout'] as $vout)
	   
									  {

										$op_return = $vout["scriptPubKey"]["asm"]; 

				
										$arr = explode(' ', $op_return); 

										

										if($arr[0] == 'OP_KEVA_PUT') 
										{
											 $cona=$arr[1];
											 $cons=$arr[2];
											 $conk=$arr[3];

						

											$txloop=hex2bin($cons);

										
						
		
											if(strlen($txloop)<>64){$key="RE:".$txloop;break;}
													
								
													}
												
												}
											}

										
		
		
		}

			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

		


//showall

			//if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);




?>




		<!-- Load Bludit Plugins: Page Begin -->
		<?php Theme::plugins('pageBegin') ?>

		<div class="card-body">
			<!-- Profile picture -->
			<img class="float-left rounded-circle" style="width: 48px" src="<?php echo letter_avatar($gnamex); ?>" />

			<div style="padding-left: 56px">
				<!-- Post's author and date -->
				<p class="mb-2 text-muted">
					<?php echo "<a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&scode=".$mysp."&gname=".bin2hex($gnamex).">".$gnamex."</a>"; ?> -
					<?php echo date('Y-m-d H:i',$gtime); ?>
				</p>

				<!-- Post's content -->
				<div id="post-content" style="font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif; ">
				<?php echo $valuex; ?>
				</div>

			
			</div>
		</div>

		<!-- Load Bludit Plugins: Page End -->
		<?php Theme::plugins('pageEnd') ?>

	</div>
	<?php } ?>
</div>
