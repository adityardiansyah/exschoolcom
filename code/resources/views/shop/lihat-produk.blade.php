@extends('master')
@section('title')
  {{$produk->nama_produk}} - EX -School
@endsection

@section('css')
<script src="{{ asset('/js/jquery.min.js')}}"></script>
<style>

.img-zoom-container {
  position: relative;
}
.img-zoom-lens {
  position: absolute;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 40px;
  height: 40px;
}
.img-zoom-result {
  border: 1px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 500px;
  height: 400px;
  position: absolute;
  z-index: 10;
  display: none;
}

</style>
<script>
function imageZoom(imgID, resultID) {
  
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
  	
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
  	
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}

</script>
@endsection
@section('content')

<div class="container top64 paddingbot32">
	<div class="row">
		<div class="top64">
			<ol class="breadcrumb">
			  <li><a href="#" class="link">Home</a></li>
			  <li><a href="#" class="link">Library</a></li>
			  <li class="active">Data</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">

			<div class="img-zoom-container">
			  <img id="myimage" src="/storage/{{ $produk->gambar }}">
			</div>
			
		</div>
		<div class="col-md-8">
			<div id="myresult" class="img-zoom-result"></div>
			<div class="shop-deskripsi">
				<h3><b>{{ $produk->nama_produk}}</b></h3>
				<h4 class="blue">Rp. {{ number_format($produk->harga,0,'.','.')}}</h4>
				<h4>Kategori : {{$category->nama}}</h4>

				<br/>
				<h3>Deskripsi Produk</h3>
				<p>{!! $produk->deskripsi !!}</p>
				<br/>
				<h3>Ukuran</h3>
				<p>{{ $produk->ukuran}}</p>
				<br/>
				<div class="row">
					<div class="col-md-5">
						<button class="btnTokopedia btn-block" onclick="window.location='{{ $produk->link_tokopedia}}'"><span class="fa fa-fw fa-shopping-cart" style="margin-right:10px;"></span>Beli via Tokopedia</button>
					</div>
					<div class="col-md-5">
						<button class="btnShopee btn-block" onclick="window.location='{{ $produk->link_shopee }}'"><span class="fa fa-fw fa-shopping-cart" style="margin-right:10px;"></span>Beli via Shopee</button>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="row top32">
    <div>
      
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
// Initiate zoom effect:
imageZoom("myimage", "myresult");


</script>
@endsection