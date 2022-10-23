@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    


                    <section>
                          
                          <div class="card-body">
                          {{ __('Product Lists') }}
                         </div>  
                    @if($products)
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>{{ __('Name') }} </th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Offer</th>
                            <th>Added/Updated</th>
                           
                            <th>{{ __('Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)  

                          <tr>
                            <td>{{$product->name}}</td>
                           
                            <td>{{$product->code}}</td>
                             <td>{{ __('$') }}{{$product->price}}</td>
                            <td>{{($product->offered == 1) ? 'Yes' : 'No'}}</td>
                            <td>{{date('Y-m-d',strtotime($product->created_at))}}</td>
                            
                            <td><input type="button" id="addToCart" onclick="return addToCart('{{$product->code}}')" class="btn btn-success btn-md" name="addToCart" value="Add"></td>
                          </tr>
                         
                      
                          @endforeach
                        </tbody>
                      </table>

                      @else
                      {{ __('Products are Sold!') }}
                      @endif
                       <div class="group">
                           <ul>
                               <li>Order < $50 - Delivery $4.95</li>
                               <li>Order > $50 < $90 - Delivery $2.95</li>
                               <li>Order > $90 - Delivery FREE</li>
                           </ul>
                       </div>
                    </section>

                    <section class="basket">
                        <div class="card-body">
                          <h3>Cart:</h3>
                          <h5 align="right">Order Total: <b>{{$sumOfPrices}}</b>    </h5>
                          <h5 align="right">Delivery Cost: 
                            <b>
                                @if($sumOfPrices > 0 && $sumOfPrices < 50)
                                 4.95
                                @endif
                                @if($sumOfPrices > 50 && $sumOfPrices < 90)
                                 2.95
                                @endif
                                @if($sumOfPrices > 90)
                                 FREE
                                @endif


                            </b>    
                          </h5>
                         </div>  
                        @if($cartData != null)
                        <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>Code</th>
                            <th>Price</th>
                            
                            <th>Date</th>
                           
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cartData as $cart)  
                          <tr>
                            
                            <td>{{$cart->code}}</td>
                            <td>{{$cart->price}}</td>
                           
                            <td>{{date('Y-m-d',strtotime($cart->created_at))}}</td>
                            
                            
                           
                          </tr>
                      
                          @endforeach
                        </tbody>
                      </table>

                      @else
                      {{ __('Basket Empty!') }}
                      @endif
                    
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
<script type="text/javascript">
    
//     $(document).ready(function() {
//     $("#addToCart").click(function(){
    
//     var code  = $('#code').val();    
//     alert(code);


//     }); 
// });


    function addToCart(code) {
    

    $.ajax({
        type:"GET",
        cache:false,
        url:"{{url('cart/add')}}/"+code,
        //data:code,    // multiple data sent using ajax
        success: function (html) {

            window.location.href = '{{url('home')}}';
        }
      });
    





    }





</script>
