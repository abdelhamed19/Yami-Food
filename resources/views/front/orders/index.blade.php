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
                     <th>Delete</th>
                 </tr>
             </thead>
             <tbody>
                 @forelse ($items as $item)
                     <tr>
                         <td>{{ $item->item_name }}</td>
                         <td>{{ $item->price }}</td>
                         <td>
                             <form action="{{ route('editQuantity', $item->uuid) }}" method="POST">
                                 @csrf
                                 @method('PUT')
                                 <input type="number" value="{{ $item->quantity }}" name="quantity">
                                 <button type="submit" class="btn btn-outline-primary btn-fw">Edit Quantity</button>
                             </form>
                         </td>
                         <td>
                             <form action="{{ route('deleteItem', $item->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                             </form>
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
         <div class="col-md-12">
             <div class="submit-button text-center">
                 <a href="checkout" class="btn btn-common" id="submit" type="submit">Go to Order CheckOut</a>
                 <div id="msgSubmit" class="h3 text-center hidden"></div>
                 <div class="clearfix"></div>
             </div>
         </div>
         <br>
     </div>
     <!-- Start Footer -->
     <x-front-footer />
     <!-- End Footer -->


     </body>

     </html>
