   <ul class="nav nav-tabs mb-6">
       <li class="nav-item">
           <a href="{{ route('user.dashboard') }}" class="nav-link active">Dashboard</a>
       </li>
       <li class="nav-item">
           <a href="{{ route('user.orders') }}" class="nav-link">Orders</a>
       </li>

       <li class="nav-item">
           <a href="{{ route('user.addresses.index') }}" class="nav-link">Addresses</a>
       </li>
       <li class="nav-item">
           <a href="{{ route('user.profile') }}" class="nav-link">Account details</a>
       </li>
       <li class="link-item">
           <a href="{{ route('user.wishlist') }}">Wishlist</a>
       </li>
       <li class="link-item">
           <a href="{{ route('logout') }}" class="text-primary"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Log out
           </a>
       </li>
   </ul>
