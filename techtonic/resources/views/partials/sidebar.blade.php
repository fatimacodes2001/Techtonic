<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{route('admin')}}">Admin Panel</a>
  <a href="{{route('admin.users.index')}}">Users</a>
  <a href="{{route('admin.categories.index')}}">Categories</a>
  <a href="{{route('admin.orders.index')}}">Orders</a>
  <form action="{{ route('sign-out') }}">
    <button type="submit" class="btn btn-dark">
      Sign Out
    </button>
  </form>
</div>