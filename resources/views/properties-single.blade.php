@include('header')
	  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-4">
            <h1 class="mb-3 bread">Property Details</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="indextemplate.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-services-2">
      <div class="container">
        <div class="row">
        	<div class="col-md-12 property-wrap mb-5">
    				<div class="row">
    					<div class="col-md-6 d-flex ftco-animate">
    						<div class="img align-self-stretch" style="background-image: url(images/work-2.jpg);"></div>
    					</div>
    					<div class="col-md-6 ftco-animate py-5">
    						<div class="text py-5 pl-md-5">
    							<div class="d-flex">
			    					<div>
				    					@foreach ($details as $detail)
<section class="ftco-section ftco-services-2">
<div class="container">
<div class="row">
<div class="col-md-12 property-wrap mb-5">
<div class="row">
<div class="col-md-6 d-flex ftco-animate">
<div class="img align-self-stretch" style="background-image: url(images/work-2.jpg);"></div>
</div>
<div class="col-md-6 ftco-animate py-5">
<div class="text py-5 pl-md-5">
<div class="d-flex">
<div>
<h3><a href="properties-single.blade.php">{{ $detail->name }}</a></h3>
</div>
<div class="pl-md-4">
<h4 class="price">{{ $detail->price }}</h4>
</div>
</div>
<p>{{ $detail->others }}</p>
</div>
</div>
</div>
</div>
<div class="col-md-12 tour-wrap">
<table class="table">
<tbody>
<tr>
<th scope="row">Lot area</th>
<td>
<p>{{ $detail->lotarea }}</p>
</td>
<td></td>
</tr><!-- END TR-->

<tr>
<th scope="row">Floor Area</th>
<td>
<p>{{ $detail->floorarea }}</p>
</td>
<td></td>
</tr><!-- END TR-->

<tr>
<th scope="row">Bedroom</th>
<td>
<p>{{ $detail->bedroom }}</p>
</td>
<td></td>
</tr><!-- END TR-->

<tr>
<th scope="row">Bathroom</th>
<td>
<p>{{ $detail->bathroom }}</p>
</td>
<td></td>
</tr><!-- END TR-->

<tr>
<th scope="row">Garage</th>
<td>
<p>{{ $detail->garage }}</p>
</td>
<td></td>
</tr><!-- END TR-->

<tr>
<th scope="row">Maps</th>
<td>
<div id="map"></div>
</td>
</tr><!-- END TR-->

<tr>
<th scope="row">Take A Tour</th>
<td>
<!-- <div id="map"></div> -->
<div class="block-16">
<figure>
<div class="img" style="background-image: url(images/work-2.jpg);"></div>
<a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span class="icon-play"></span></a>
</figure>
</div>
</td>
</tr><!-- END TR-->
</tbody>
</table>
</div>

@endforeach
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
    			</div>
        </div>
      </div>
    </section> <!-- .section -->


    @include('footer')