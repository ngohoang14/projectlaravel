<nav class="sidebar">
  <div class="sidebar-header">
  <a href="{{ route("admin.index") }}" class="sidebar-brand">
    NHOM16
  </a>
  <div class="sidebar-toggler not-active">
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>
<div class="sidebar-body">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a href="{{ route("admin.index") }}" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">web apps</li>
    <li class="nav-item">
      <a href="{{ route("admin.information.index") }}" class="nav-link">
        <i class="link-icon" data-feather="message-square"></i>
        <span class="link-title">Thông tin website</span>
      </a>
    </li>
    <!-- manage -->
    <li class="nav-item nav-category">Bán hàng</li>
    <li class="nav-item">
      <a href="{{ route("admin.payment.index") }}" class="nav-link">
        <i class="link-icon" data-feather="message-square"></i>
        <span class="link-title">Quản lý đơn hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#errorPages2" role="button" aria-expanded="false" aria-controls="errorPages22">
        <i class="link-icon" data-feather="grid"></i>
        <span class="link-title">Quản lí</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse" id="errorPages2">
        <ul class="nav sub-menu">
          <li class="nav-item">
            <a href="{{ route("admin.hotel.index") }}" class="nav-link">Quản lý khách sạn</a>
          </li>
          <li class="nav-item">
            <a href="{{ route("admin.zoom.index") }}" class="nav-link">Quản lý room</a>
          </li>
          
        </ul>
      </div>
    </li>
    <!-- /manage -->
    <!-- News -->
    <li class="nav-item nav-category">Quản lý review</li>
    <li class="nav-item">
      <a href="{{ route("admin.review.index") }}" class="nav-link">
        <i class="link-icon" data-feather="tv"></i>
        <span class="link-title">Danh sách review</span>
      </a>
    </li>
    <!-- /News -->
    <li class="nav-item nav-category">Pages</li>
    <li class="nav-item">
      <a href="{{ route("admin.users.index") }}" class="nav-link no-active" >
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title">Quản lí users</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="{{ route("admin.contact.index") }}" class="nav-link no-active" >
        <i class="link-icon" data-feather="tv"></i>
        <span class="link-title">Contact infor</span>
      </a>
    </li> --}}
  </ul>
</div>
</nav>