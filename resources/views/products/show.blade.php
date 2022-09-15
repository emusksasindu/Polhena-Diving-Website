@include('layouts.header')

<main class="container">

    <!-- Left Column / Products Image -->
    <div class="left-column">
       
      <img data-image="black" src="images/black-fins.png" alt="">
      <img data-image="blue" src="images/blue-fins.png" alt="">
      <img data-image="red" class="active" src="images/red-fins.png" alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column">

      <!-- Product Description -->
      <div class="product-description">
        <span>Scuba Fins</span>
        <h1>ScubaPro SeaWing Nova</h1>
        <p>The Seawing Nova combines classic SCUBAPRO fin technology with the latest innovations in hydrodynamic design. Delivering the power, acceleration, and maneuverability of a blade fin with the kicking comfort and efficiency of a split fin, the unique articulated hinge design enables the entire wing-shaped blade to pivot and generate thrust. This enables you to rocket through open water at top speed, or ease in and out of tight spots in the reef with total control and with little to no ankle or leg strain. You'll be hard-pressed to find a fin that's more comfortable to wear or fun to kick when cruising the underwater world. Offered in lots of colors to mix and match with the rest of your dive gear. Made of durable Monprene®.</p>
      </div>

      <!-- Product Configuration -->
      <div class="product-configuration">

        <!-- Product Color -->
        <div class="product-color">
          <span>Color</span>

          <div class="color-choose">
            <div>
              <input data-image="red" type="radio" id="red" name="color" value="red" checked>
              <label for="red"><span></span></label>
            </div>
            <div>
              <input data-image="blue" type="radio" id="blue" name="color" value="blue">
              <label for="blue"><span></span></label>
            </div>
            <div>
              <input data-image="black" type="radio" id="black" name="color" value="black">
              <label for="black"><span></span></label>
            </div>
          </div>

        </div>

        <!-- product size Configuration -->
        <div class="productsize-config">
          <span>Product Size</span>

          <div class="productsize-choose">
            <button>Small</button>
            <button>Medium</button>
            <button>Large</button>
          </div>

        
        </div>
      </div>

      <!-- Product Pricing -->
      <div class="product-price">
        <span>148$</span>
        <a href="#" class="cart-btn">Add to cart</a>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
  @include('layouts.footer')