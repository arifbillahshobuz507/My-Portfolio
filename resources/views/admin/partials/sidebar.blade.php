  <aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo ">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <span class="text-primary">
            <svg width="64" height="44" viewBox="0 0 64 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- Letter A -->
              <path
                d="M 6 36 L 16 8 H 22 L 32 36 H 25.5 L 23.3 29.5 H 14.7 L 12.5 36 H 6 Z M 16.3 24.5 H 21.7 L 19 16.2 L 16.3 24.5 Z"
                fill="currentColor" />

              <!-- Letter R -->
              <path
                d="M 35 8 H 48 C 52.5 8 55.5 10.5 55.5 15 C 55.5 18.2 53.5 20.8 50 21.6 L 56.5 36 H 50 L 44 22.5 H 41 V 36 H 35 V 8 Z M 41 17.5 H 47.5 C 49.5 17.5 50.8 16.7 50.8 15 C 50.8 13.3 49.5 12.5 47.5 12.5 H 41 V 17.5 Z"
                fill="currentColor" />
            </svg>

          </span>
        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-3">{{ env("APP_NAME") ? env("APP_NAME") : "Arif Here"}}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
        <i class="icon-base ti tabler-x d-block d-xl-none"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item active open">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon icon-base ti tabler-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      <!-- Apps & Pages -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
      </li>
      <!-- e-commerce-app menu start -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
          <div data-i18n="Hero Management">Hero Management</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.hero.list') }}" class="menu-link">
              <div data-i18n="List">List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.hero.create') }}" class="menu-link">
              <div data-i18n="Create">Create</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- e-commerce-app menu end -->


      <!-- Components -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Components">Components</span>
      </li>
      <!-- Cards -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon icon-base ti tabler-id"></i>
          <div data-i18n="Cards">Cards</div>
          <div class="badge text-bg-primary rounded-pill ms-auto">5</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
              <div data-i18n="Basic">Basic</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-advance.html" class="menu-link">
              <div data-i18n="Advance">Advance</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-statistics.html" class="menu-link">
              <div data-i18n="Statistics">Statistics</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-analytics.html" class="menu-link">
              <div data-i18n="Analytics">Analytics</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-actions.html" class="menu-link">
              <div data-i18n="Actions">Actions</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Forms & Tables -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Forms & Tables">Forms &amp; Tables</span>
      </li>
      <!-- Tables -->
      <li class="menu-item">
        <a href="tables-basic.html" class="menu-link">
          <i class="menu-icon icon-base ti tabler-table"></i>
          <div data-i18n="Tables">Tables</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon icon-base ti tabler-layout-grid"></i>
          <div data-i18n="Datatables">Datatables</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="tables-datatables-basic.html" class="menu-link">
              <div data-i18n="Basic">Basic</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="tables-datatables-advanced.html" class="menu-link">
              <div data-i18n="Advanced">Advanced</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="tables-datatables-extensions.html" class="menu-link">
              <div data-i18n="Extensions">Extensions</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Charts & Maps -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Charts & Maps">Charts &amp; Maps</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon icon-base ti tabler-chart-pie"></i>
          <div data-i18n="Charts">Charts</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="charts-apex.html" class="menu-link">
              <div data-i18n="Apex Charts">Apex Charts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="charts-chartjs.html" class="menu-link">
              <div data-i18n="ChartJS">ChartJS</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="maps-leaflet.html" class="menu-link">
          <i class="menu-icon icon-base ti tabler-map"></i>
          <div data-i18n="Leaflet Maps">Leaflet Maps</div>
        </a>
      </li>

      <!-- Misc -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Misc">Misc</span>
      </li>
      <li class="menu-item">
        <a
          href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
          target="_blank"
          class="menu-link">
          <i class="menu-icon icon-base ti tabler-file-description"></i>
          <div data-i18n="Documentation">Documentation</div>
        </a>
      </li>
    </ul>
  </aside>