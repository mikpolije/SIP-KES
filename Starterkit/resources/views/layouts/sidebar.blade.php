
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="/main/index" class="text-nowrap logo-img">
        <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
        <img src="{{ URL::asset('build/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
      </a>
      <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- Home -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- Dashboard -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="/" aria-expanded="false">
            <span>
              <i class="ti ti-aperture"></i>
            </span>
            <span class="hide-menu">Modern</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/index2') ? 'active' : '' }}" href="/main/index2" aria-expanded="false">
            <span>
              <i class="ti ti-shopping-cart"></i>
            </span>
            <span class="hide-menu">eCommerce</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/index3') ? 'active' : '' }}" href="/main/index3" aria-expanded="false">
            <span>
              <i class="ti ti-currency-dollar"></i>
            </span>
            <span class="hide-menu">NFT</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/index4') ? 'active' : '' }}" href="/main/index4" aria-expanded="false">
            <span>
              <i class="ti ti-cpu"></i>
            </span>
            <span class="hide-menu">Crypto</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/index5') ? 'active' : '' }}" href="/main/index5" aria-expanded="false">
            <span>
              <i class="ti ti-activity-heartbeat"></i>
            </span>
            <span class="hide-menu">General</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/index6') ? 'active' : '' }}" href="/main/index6" aria-expanded="false">
            <span>
              <i class="ti ti-playlist"></i>
            </span>
            <span class="hide-menu">Music</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- Apps -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Apps</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-calendar') ? 'active' : '' }}" href="/main/app-calendar" aria-expanded="false">
            <span>
              <i class="ti ti-calendar"></i>
            </span>
            <span class="hide-menu">Calendar</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-kanban') ? 'active' : '' }}" href="/main/app-kanban" aria-expanded="false">
            <span>
              <i class="ti ti-layout-kanban"></i>
            </span>
            <span class="hide-menu">Kanban</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-chat') ? 'active' : '' }}" href="/main/app-chat" aria-expanded="false">
            <span>
              <i class="ti ti-message-dots"></i>
            </span>
            <span class="hide-menu">Chat</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-email') ? 'active' : '' }}" href="/main/app-email" aria-expanded="false">
            <span>
              <i class="ti ti-mail"></i>
            </span>
            <span class="hide-menu">Email</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-notes') ? 'active' : '' }}" href="/main/app-notes" aria-expanded="false">
            <span>
              <i class="ti ti-notes"></i>
            </span>
            <span class="hide-menu">Notes</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-contact') ? 'active' : '' }}" href="/main/app-contact" aria-expanded="false">
            <span>
              <i class="ti ti-phone"></i>
            </span>
            <span class="hide-menu">Contact Table</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-contact2') ? 'active' : '' }}" href="/main/app-contact2" aria-expanded="false">
            <span>
              <i class="ti ti-list-details"></i>
            </span>
            <span class="hide-menu">Contact List</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/app-invoice') ? 'active' : '' }}" href="/main/app-invoice" aria-expanded="false">
            <span>
              <i class="ti ti-file-text"></i>
            </span>
            <span class="hide-menu">Invoice</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/page-user-profile') ? 'active' : '' }}" href="/main/page-user-profile" aria-expanded="false">
            <span>
              <i class="ti ti-user-circle"></i>
            </span>
            <span class="hide-menu">User Profile</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/blog-posts', 'main/blog-detail') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-chart-donut-3"></i>
            </span>
            <span class="hide-menu">Blog</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/blog-posts', 'main/blog-detail') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/blog-posts') ? 'active' : '' }}" href="/main/blog-posts" aria-expanded="false">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Posts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="/main/blog-detail" class="sidebar-link {{ request()->is('main/blog-detail') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Details</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/eco-shop', '/main/eco-shop-detail', 'main/eco-product-list', '/main/eco-product-list', '/main/eco-checkout', '/main/eco-edit-product') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-basket"></i>
            </span>
            <span class="hide-menu">Ecommerce</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/eco-shop', '/main/eco-shop-detail', 'main/eco-product-list', '/main/eco-product-list', '/main/eco-checkout', '/main/eco-edit-product') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-shop') ? 'active' : '' }}" href="/main/eco-shop">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Shop</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-shop-detail') ? 'active' : '' }}" href="/main/eco-shop-detail">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Details</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-product-list') ? 'active' : '' }}" href="/main/eco-product-list">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-checkout') ? 'active' : '' }}" href="/main/eco-checkout">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Checkout</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-add-product') ? 'active' : '' }}" href="/main/eco-add-product">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Add Product</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/eco-edit-product') ? 'active' : '' }}" href="/main/eco-edit-product">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Edit Product</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ---------------------------------- -->
        <!-- PAGES -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">PAGES</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/page-pricing') ? 'active' : '' }}" href="/main/page-pricing" aria-expanded="false">
            <span>
              <i class="ti ti-currency-dollar"></i>
            </span>
            <span class="hide-menu">Pricing</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/page-faq') ? 'active' : '' }}" href="/main/page-faq" aria-expanded="false">
            <span>
              <i class="ti ti-help"></i>
            </span>
            <span class="hide-menu">FAQ</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/page-account-settings') ? 'active' : '' }}" href="/main/page-account-settings" aria-expanded="false">
            <span>
              <i class="ti ti-user-circle"></i>
            </span>
            <span class="hide-menu">Account Setting</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('landingpage/index') ? 'active' : '' }}" href="/landingpage/index" aria-expanded="false">
            <span>
              <i class="ti ti-app-window"></i>
            </span>
            <span class="hide-menu">Landing Page</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/widgets-cards', 'main/widgets-banners', 'main/widgets-charts', 'main/widgets-feeds', 'main/widgets-apps', 'main/widgets-data') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-layout"></i>
            </span>
            <span class="hide-menu">Widgets</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/widgets-cards', 'main/widgets-banners', 'main/widgets-charts', 'main/widgets-feeds', 'main/widgets-apps', 'main/widgets-data') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-cards') ? 'active' : '' }}" href="/main/widgets-cards">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Cards</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-banners') ? 'active' : '' }}" href="/main/widgets-banners">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Banner</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-charts') ? 'active' : '' }}" href="/main/widgets-charts">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Charts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-feeds') ? 'active' : '' }}" href="/main/widgets-feeds">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Feed Widgets</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-apps') ? 'active' : '' }}" href="/main/widgets-apps">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Apps Widgets</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/widgets-data') ? 'active' : '' }}" href="/main/widgets-data">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Data Widgets</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ---------------------------------- -->
        <!-- UI -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">UI</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- UI Elements -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/ui-accordian', 'main/ui-badge', 'main/ui-buttons', 'main/ui-dropdowns', 'main/ui-modals', 'main/ui-tab', 'main/ui-tooltip-popover', 'main/ui-notification', 'main/ui-progressbar', 'main/ui-pagination', 'main/ui-typography', 'main/ui-bootstrap-ui', 'main/ui-breadcrumb', 'main/ui-offcanvas', 'main/ui-lists', 'main/ui-grid', 'main/ui-carousel', 'main/ui-scrollspy', 'main/ui-spinner', 'main/ui-link') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-layout-grid"></i>
            </span>
            <span class="hide-menu">UI Elements</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/ui-accordian', 'main/ui-badge', 'main/ui-buttons', 'main/ui-dropdowns', 'main/ui-modals', 'main/ui-tab', 'main/ui-tooltip-popover', 'main/ui-notification', 'main/ui-progressbar', 'main/ui-pagination', 'main/ui-typography', 'main/ui-bootstrap-ui', 'main/ui-breadcrumb', 'main/ui-offcanvas', 'main/ui-lists', 'main/ui-grid', 'main/ui-carousel', 'main/ui-scrollspy', 'main/ui-spinner', 'main/ui-link') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-accordian') ? 'active' : '' }}" href="/main/ui-accordian">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Accordian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-badge') ? 'active' : '' }}" href="/main/ui-badge">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Badge</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-buttons') ? 'active' : '' }}" href="/main/ui-buttons">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-dropdowns') ? 'active' : '' }}" href="/main/ui-dropdowns">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Dropdowns</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-modals') ? 'active' : '' }}" href="/main/ui-modals">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Modals</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-tab') ? 'active' : '' }}" href="/main/ui-tab">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Tab</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-tooltip-popover') ? 'active' : '' }}" href="/main/ui-tooltip-popover">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Tooltip & Popover</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-notification') ? 'active' : '' }}" href="/main/ui-notification">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-progressbar') ? 'active' : '' }}" href="/main/ui-progressbar">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Progressbar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-pagination') ? 'active' : '' }}" href="/main/ui-pagination">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Pagination</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-typography') ? 'active' : '' }}" href="/main/ui-typography">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-bootstrap-ui') ? 'active' : '' }}" href="/main/ui-bootstrap-ui">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bootstrap UI</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-breadcrumb') ? 'active' : '' }}" href="/main/ui-breadcrumb">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Breadcrumb</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-offcanvas') ? 'active' : '' }}" href="/main/ui-offcanvas">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Offcanvas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-lists') ? 'active' : '' }}" href="/main/ui-lists">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Lists</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-grid') ? 'active' : '' }}" href="/main/ui-grid">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Grid</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-carousel') ? 'active' : '' }}" href="/main/ui-carousel">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Carousel</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-scrollspy') ? 'active' : '' }}" href="/main/ui-scrollspy">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Scrollspy</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-spinner') ? 'active' : '' }}" href="/main/ui-spinner">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Spinner</span>
              </a>
            </li>
            <li class="sidebar-item mb-3">
              <a class="sidebar-link {{ request()->is('main/ui-link') ? 'active' : '' }}" href="/main/ui-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Link</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Cards -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/ui-cards', 'main/ui-card-customs', 'main/ui-card-weather', 'main/ui-card-draggable') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">Cards</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/ui-cards', 'main/ui-card-customs', 'main/ui-card-weather', 'main/ui-card-draggable') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-cards') ? 'active' : '' }}" href="/main/ui-cards">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Basic Cards</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-card-customs') ? 'active' : '' }}" href="/main/ui-card-customs">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Custom Cards</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-card-weather') ? 'active' : '' }}" href="/main/ui-card-weather">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Weather Cards</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/ui-card-draggable') ? 'active' : '' }}" href="/main/ui-card-draggable">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Draggable Cards</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Component -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/component-sweetalert', 'main/component-nestable', 'main/component-noui-slider', 'main/component-rating', 'main/component-toastr') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-components"></i>
            </span>
            <span class="hide-menu">Component</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/component-sweetalert', 'main/component-nestable', 'main/component-noui-slider', 'main/component-rating', 'main/component-toastr') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/component-sweetalert') ? 'active' : '' }}" href="/main/component-sweetalert">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Sweet Alert</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/component-nestable') ? 'active' : '' }}" href="/main/component-nestable">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Nestable</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/component-noui-slider') ? 'active' : '' }}" href="/main/component-noui-slider">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Noui slider</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/component-rating') ? 'active' : '' }}" href="/main/component-rating">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Rating</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/component-toastr') ? 'active' : '' }}" href="/main/component-toastr">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Toastr</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Forms -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Forms</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- Form Elements -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/form-inputs', 'main/form-input-groups', 'main/form-input-grid', 'main/form-checkbox-radio', 'main/form-bootstrap-switch', 'main/form-select2') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-text"></i>
            </span>
            <span class="hide-menu">Form Elements</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/form-inputs', 'main/form-input-groups', 'main/form-input-grid', 'main/form-checkbox-radio', 'main/form-bootstrap-switch', 'main/form-select2') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-inputs') ? 'active' : '' }}" href="/main/form-inputs">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Forms Input</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-input-groups') ? 'active' : '' }}" href="/main/form-input-groups">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Input Groups</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-input-grid') ? 'active' : '' }}" href="/main/form-input-grid">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Input Grid</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-checkbox-radio') ? 'active' : '' }}" href="/main/form-checkbox-radio">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Checkbox & Radios</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-bootstrap-switch') ? 'active' : '' }}" href="/main/form-bootstrap-switch">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bootstrap Switch</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-select2') ? 'active' : '' }}" href="/main/form-select2">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Select2</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Form Addons -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/form-dropzone', 'main/form-mask', 'main/form-typeahead') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-qrcode"></i>
            </span>
            <span class="hide-menu">Form Addons</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/form-dropzone', 'main/form-mask', 'main/form-typeahead') ? 'ind' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-dropzone') ? 'active' : '' }}" href="/main/form-dropzone">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Dropzone</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-mask') ? 'active' : '' }}" href="/main/form-mask">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Form Mask</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-typeahead') ? 'active' : '' }}" href="/main/form-typeahead">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Form Typehead</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Form Validation -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/form-bootstrap-validation', 'main/form-custom-validation') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-alert-circle"></i>
            </span>
            <span class="hide-menu">Form Validation</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/form-bootstrap-validation', 'main/form-custom-validation') ? 'ind' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-bootstrap-validation') ? 'active' : '' }}" href="/main/form-bootstrap-validation">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bootstrap Validation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-custom-validation') ? 'active' : '' }}" href="/main/form-custom-validation">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Custom Validation</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Form Pickers -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/form-picker-colorpicker', 'main/form-picker-bootstrap-rangepicker', 'main/form-picker-bootstrap-datepicker', 'main/form-picker-material-datepicker') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-pencil"></i>
            </span>
            <span class="hide-menu">Form Pickers</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/form-picker-colorpicker', 'main/form-picker-bootstrap-rangepicker', 'main/form-picker-bootstrap-datepicker', 'main/form-picker-material-datepicker') ? 'ind' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-picker-colorpicker') ? 'active' : '' }}" href="/main/form-picker-colorpicker">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Colorpicker</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-picker-bootstrap-rangepicker') ? 'active' : '' }}" href="/main/form-picker-bootstrap-rangepicker">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bootstrap Rangepicker</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-picker-bootstrap-datepicker') ? 'active' : '' }}" href="/main/form-picker-bootstrap-datepicker">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bootstrap Datepicker</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-picker-material-datepicker') ? 'active' : '' }}" href="/main/form-picker-material-datepicker">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Material Datepicker</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Form Editor -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/form-editor-quill', 'main/form-editor-tinymce') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-dna"></i>
            </span>
            <span class="hide-menu">Form Editor</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/form-editor-quill', 'main/form-editor-tinymce') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-editor-quill') ? 'active' : '' }}" href="/main/form-editor-quill">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Quill Editor</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/form-editor-tinymce') ? 'active' : '' }}" href="/main/form-editor-tinymce">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Tinymce Editor</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Form Input -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-basic') ? 'active' : '' }}" href="/main/form-basic" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">Basic Form</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-vertical') ? 'active' : '' }}" href="/main/form-vertical" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-box-align-left"></i>
            </span>
            <span class="hide-menu">Form Vertical</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-horizontal') ? 'active' : '' }}" href="/main/form-horizontal" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-box-align-bottom"></i>
            </span>
            <span class="hide-menu">Form Horizontal</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-actions') ? 'active' : '' }}" href="/main/form-actions" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-export"></i>
            </span>
            <span class="hide-menu">Form Actions</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-row-separator') ? 'active' : '' }}" href="/main/form-row-separator" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-separator-horizontal"></i>
            </span>
            <span class="hide-menu">Row Separator</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-bordered') ? 'active' : '' }}" href="/main/form-bordered" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-border-outer"></i>
            </span>
            <span class="hide-menu">Form Bordered</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-detail') ? 'active' : '' }}" href="/main/form-detail" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Form Detail</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-striped-row') ? 'active' : '' }}" href="/main/form-striped-row" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-analytics"></i>
            </span>
            <span class="hide-menu">Striped Rows</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-floating-input') ? 'active' : '' }}" href="/main/form-floating-input" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file-dots"></i>
            </span>
            <span class="hide-menu">Form Floating Input</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- Form Wizard -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-wizard') ? 'active' : '' }}" href="/main/form-wizard" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-files"></i>
            </span>
            <span class="hide-menu">Form Wizard</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- Form Repeater -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('main/form-repeater') ? 'active' : '' }}" href="/main/form-repeater" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-topology-star-3"></i>
            </span>
            <span class="hide-menu">Form Repeater</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- Tables -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Tables</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- Bootstrap Table -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/table-basic', 'main/table-dark-basic', 'main/table-sizing', 'main/table-layout-coloured') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-layout-sidebar"></i>
            </span>
            <span class="hide-menu">Bootstrap Table</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/table-basic', 'main/table-dark-basic', 'main/table-sizing', 'main/table-layout-coloured') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-basic') ? 'active' : '' }}" href="/main/table-basic">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Basic Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-dark-basic') ? 'active' : '' }}" href="/main/table-dark-basic">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Dark Basic Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-sizing') ? 'active' : '' }}" href="/main/table-sizing">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Sizing Table</span>
              </a>
            </li>
            <li class="sidebar-item mb-3">
              <a class="sidebar-link {{ request()->is('main/table-layout-coloured') ? 'active' : '' }}" href="/main/table-layout-coloured">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Coloured Table</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ---------------------------------- -->
        <!-- Datatable -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/table-datatable-basic', 'main/table-datatable-api', 'main/table-datatable-advanced') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-air-conditioning-disabled"></i>
            </span>
            <span class="hide-menu">Datatables</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/table-datatable-basic', 'main/table-datatable-api', 'main/table-datatable-advanced') ? 'ind' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-datatable-basic') ? 'active' : '' }}" href="/main/table-datatable-basic">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Basic Initialisation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-datatable-api') ? 'active' : '' }}" href="/main/table-datatable-api">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">API</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/table-datatable-advanced') ? 'active' : '' }}" href="/main/table-datatable-advanced">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Advanced Initialisation</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- ---------------------------------- -->
        <!-- Table Jsgrid -->
        <!-- ---------------------------------- -->

        <!-- ---------------------------------- -->
        <!-- Charts -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Charts</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- Apex Chart -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/chart-apex-line', 'main/chart-apex-area', 'main/chart-apex-bar', 'main/chart-apex-pie', 'main/chart-apex-radial', 'main/chart-apex-radar') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-chart-pie"></i>
            </span>
            <span class="hide-menu">Apex Charts</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/chart-apex-line', 'main/chart-apex-area', 'main/chart-apex-bar', 'main/chart-apex-pie', 'main/chart-apex-radial', 'main/chart-apex-radar') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/chart-apex-line') ? 'active' : '' }}" href="/main/chart-apex-line">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Line Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/chart-apex-area') ? 'active' : '' }}" href="/main/chart-apex-area">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Area Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/chart-apex-bar') ? 'active' : '' }}" href="/main/chart-apex-bar">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Bar Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/chart-apex-pie') ? 'active' : '' }}" href="/main/chart-apex-pie">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Pie Chart</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/chart-apex-radial') ? 'active' : '' }}" href="/main/chart-apex-radial">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Radial Chart</span>
              </a>
            </li>
            <li class="sidebar-item mb-3">
              <a class="sidebar-link {{ request()->is('main/chart-apex-radar') ? 'active' : '' }}" href="/main/chart-apex-radar">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Radar Chart</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Sample Pages -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Sample Pages</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/pages-animation', 'main/pages-search-result', 'main/pages-gallery', 'main/pages-treeview', 'main/pages-block-ui', 'main/pages-session-timeout') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-file"></i>
            </span>
            <span class="hide-menu">Sample Pages</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/pages-animation', 'main/pages-search-result', 'main/pages-gallery', 'main/pages-treeview', 'main/pages-block-ui', 'main/pages-session-timeout') ? 'ind' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/pages-animation') ? 'active' : '' }}" href="/main/pages-animation">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Animation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/pages-search-result') ? 'active' : '' }}" href="/main/pages-search-result">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Search Result</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/pages-gallery') ? 'active' : '' }}" href="/main/pages-gallery">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Gallery</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/pages-treeview') ? 'active' : '' }}" href="/main/pages-treeview">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Treeview</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/pages-block-ui') ? 'active' : '' }}" href="/main/pages-block-ui">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Block-Ui</span>
              </a>
            </li>
            <li class="sidebar-item mb-3">
              <a class="sidebar-link {{ request()->is('main/pages-session-timeout') ? 'active' : '' }}" href="/main/pages-session-timeout">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Session Timeout</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Icons -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Icons</span>
        </li>
        <!-- ---------------------------------- -->
        <!-- Tabler Icon -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/main/icon-tabler" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">Tabler Icon</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- Solar Icon -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/main/icon-solar" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-mood-smile"></i>
            </span>
            <span class="hide-menu">Solar Icon</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- AUTH -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">AUTH</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/main/authentication-error" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-alert-circle"></i>
            </span>
            <span class="hide-menu">Error</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/authentication-login', '/main/authentication-login2') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Login</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/authentication-login', '/main/authentication-login2') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-login') ? 'active' : '' }}" href="/main/authentication-login">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Side Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-login2') ? 'active' : '' }}" href="/main/authentication-login2">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Boxed Login</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/authentication-register', '/main/authentication-register2') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-user-plus"></i>
            </span>
            <span class="hide-menu">Register</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/authentication-register', '/main/authentication-register2') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-register') ? 'active' : '' }}" href="/main/authentication-register">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Side Register</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-register2') ? 'active' : '' }}" href="/main/authentication-register2">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Boxed Register</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/authentication-forgot-password', '/main/authentication-forgot-password2') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-rotate"></i>
            </span>
            <span class="hide-menu">Forgot Password</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/authentication-forgot-password', '/main/authentication-forgot-password2') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-forgot-password') ? 'active' : '' }}" href="/main/authentication-forgot-password">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Side Forgot Password</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-forgot-password2') ? 'active' : '' }}" href="/main/authentication-forgot-password2">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Boxed Forgot Password</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('main/authentication-two-steps', '/main/authentication-two-steps2') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-zoom-code"></i>
            </span>
            <span class="hide-menu">Two Steps</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/authentication-two-steps', '/main/authentication-two-steps2') ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-two-steps') ? 'active' : '' }}" href="/main/authentication-two-steps">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Side Two Steps</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('main/authentication-two-steps2') ? 'active' : '' }}" href="/main/authentication-two-steps2">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Boxed Two Steps</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/main/authentication-maintenance" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-settings"></i>
            </span>
            <span class="hide-menu">Maintenance</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- DOCUMENTATION -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">DOCUMENTATION</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="/docs/index" aria-expanded="false">
            <span class="rounded-3">
              <i class="ti ti-file-text"></i>
            </span>
            <span class="hide-menu">Getting Started</span>
          </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- OTHER -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">OTHER</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-box-multiple"></i>
            </span>
            <span class="hide-menu">Menu Level</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="javascript:void(0)" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Level 1</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Level 1.1</span>
              </a>
              <ul aria-expanded="false" class="collapse two-level">
                <li class="sidebar-item">
                  <a href="javascript:void(0)" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Level 2</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Level 2.1</span>
                  </a>
                  <ul aria-expanded="false" class="collapse three-level">
                    <li class="sidebar-item">
                      <a href="javascript:void(0)" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Level 3</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a href="javascript:void(0)" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Level 3.1</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link link-disabled" href="#disabled" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-ban"></i>
            </span>
            <span class="hide-menu">Disabled</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="#sub" aria-expanded="false">
            <i class="ti ti-star"></i>
            <div class="hide-menu lh-base">
              <span class="hide-menu d-block">SubCaption</span>
              <span class="hide-menu d-block fs-2">This is the subtitle</span>
            </div>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link justify-content-between" href="#chip" aria-expanded="false">
            <div class="d-flex align-items-center gap-3">
              <span class="d-flex">
                <i class="ti ti-award"></i>
              </span>
              <span class="hide-menu">Chip</span>
            </div>
            <div class="hide-menu">
              <span class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">9</span>
            </div>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link justify-content-between" href="#outlined" aria-expanded="false">
            <div class="d-flex align-items-center gap-3">
              <span class="d-flex">
                <i class="ti ti-mood-smile"></i>
              </span>
              <span class="hide-menu">Outlined</span>
            </div>
            <span class="hide-menu badge rounded-pill border border-primary text-primary fs-2 py-1 px-2">Outline</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="https://google.com" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-star"></i>
            </span>
            <span class="hide-menu">External Link</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
      <div class="hstack gap-3">
        <div class="john-img">
          <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="modernize-img" />
        </div>
        <div class="john-title">
          <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
          <span class="fs-2">Designer</span>
        </div>
        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
          <i class="ti ti-power fs-6"></i>
        </button>
      </div>
    </div>

    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
