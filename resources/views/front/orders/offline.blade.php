 <!-- Start header -->
 <x-front-header title="menu" />
 <br>
 <div class="menu-box">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="heading-title text-center">
                     <h2>Make an Order</h2>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                 </div>
             </div>
         </div>
     </div>
     <x-success-message />
     <div class="table-responsive">
         <hr>
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th> Item Name </th>
                     <th> Price</th>
                     <th> quantity </th>
                 </tr>
             </thead>
             <tbody>
                 @forelse ($items as $item)
                     <tr>
                         <td>{{ $item->item_name }}</td>
                         <td>{{ $item->price }}</td>
                         <td>
                             <input type="number" value="{{ $item->quantity }}" readonly>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td style="color: balck" colspan="6">No items found</td>
                     </tr>
                 @endforelse
             </tbody>
             <tr>
                 <td style="color: black;" colspan="6"><strong>Total Cost :</strong> {{ $totalPrice }}</td>
             </tr>
         </table>
         
         <h2 style="text-align: center">Contact Info</h2>
         <form action="{{ route('placeOrder') }}" method="POST">
             @csrf
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <input type="text" class="time form-control picker__input" name="address"
                             placeholder="Address">
                         <x-error-message :name="'address'" />
                     </div>
                     <div class="form-group">
                         <input type="number" class="time form-control picker__input" name="phone"
                             placeholder="phone">
                         <x-error-message :name="'phone'" />
                     </div>
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="submit-button text-center">
                     <button class="btn btn-common" id="submit" type="submit">Place Order</button>
                     <div id="msgSubmit" class="h3 text-center hidden"></div>
                     <div class="clearfix"></div>
                 </div>
             </div>
         </form>
     </div>

     <br>
 </div>
 <!-- Start Footer -->
 <x-front-footer />
 <!-- End Footer -->


 </body>

 </html>
