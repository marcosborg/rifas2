<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/content-categories*") ? "menu-open" : "" }} {{ request()->is("admin/content-tags*") ? "menu-open" : "" }} {{ request()->is("admin/content-pages*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/content-categories*") ? "active" : "" }} {{ request()->is("admin/content-tags*") ? "active" : "" }} {{ request()->is("admin/content-pages*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('star_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/stars*") ? "menu-open" : "" }} {{ request()->is("admin/star-plays*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/stars*") ? "active" : "" }} {{ request()->is("admin/star-plays*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-star">

                            </i>
                            <p>
                                {{ trans('cruds.starMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('star_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stars.index") }}" class="nav-link {{ request()->is("admin/stars") || request()->is("admin/stars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.star.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('star_play_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.star-plays.index") }}" class="nav-link {{ request()->is("admin/star-plays") || request()->is("admin/star-plays/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.starPlay.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('menu_number_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/numbers*") ? "menu-open" : "" }} {{ request()->is("admin/number-plays*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/numbers*") ? "active" : "" }} {{ request()->is("admin/number-plays*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-sort-numeric-down">

                            </i>
                            <p>
                                {{ trans('cruds.menuNumber.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('number_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.numbers.index") }}" class="nav-link {{ request()->is("admin/numbers") || request()->is("admin/numbers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sort-numeric-down">

                                        </i>
                                        <p>
                                            {{ trans('cruds.number.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('number_play_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.number-plays.index") }}" class="nav-link {{ request()->is("admin/number-plays") || request()->is("admin/number-plays/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sort-numeric-down">

                                        </i>
                                        <p>
                                            {{ trans('cruds.numberPlay.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('menu_entity_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/entities*") ? "menu-open" : "" }} {{ request()->is("admin/sub-categories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/categories*") ? "active" : "" }} {{ request()->is("admin/entities*") ? "active" : "" }} {{ request()->is("admin/sub-categories*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-building">

                            </i>
                            <p>
                                {{ trans('cruds.menuEntity.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.category.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('entity_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.entities.index") }}" class="nav-link {{ request()->is("admin/entities") || request()->is("admin/entities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.entity.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('play_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.plays.index") }}" class="nav-link {{ request()->is("admin/plays") || request()->is("admin/plays/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-play">

                            </i>
                            <p>
                                {{ trans('cruds.play.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('award_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.awards.index") }}" class="nav-link {{ request()->is("admin/awards") || request()->is("admin/awards/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-award">

                            </i>
                            <p>
                                {{ trans('cruds.award.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('benefactor_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.benefactors.index") }}" class="nav-link {{ request()->is("admin/benefactors") || request()->is("admin/benefactors/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-gift">

                            </i>
                            <p>
                                {{ trans('cruds.benefactor.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('payment_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-euro-sign">

                            </i>
                            <p>
                                {{ trans('cruds.payment.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('win_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.wins.index") }}" class="nav-link {{ request()->is("admin/wins") || request()->is("admin/wins/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-trophy">

                            </i>
                            <p>
                                {{ trans('cruds.win.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('wallet_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.wallets.index") }}" class="nav-link {{ request()->is("admin/wallets") || request()->is("admin/wallets/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-wallet">

                            </i>
                            <p>
                                {{ trans('cruds.wallet.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('website_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/slides*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/slides*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-sitemap">

                            </i>
                            <p>
                                {{ trans('cruds.website.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('slide_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.slides.index") }}" class="nav-link {{ request()->is("admin/slides") || request()->is("admin/slides/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.slide.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pages.index") }}" class="nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sitemap">

                                        </i>
                                        <p>
                                            {{ trans('cruds.page.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('feature_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.features.index") }}" class="nav-link {{ request()->is("admin/features") || request()->is("admin/features/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.feature.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('menu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.menus.index") }}" class="nav-link {{ request()->is("admin/menus") || request()->is("admin/menus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bars">

                                        </i>
                                        <p>
                                            {{ trans('cruds.menu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/product-categories*") ? "menu-open" : "" }} {{ request()->is("admin/product-tags*") ? "menu-open" : "" }} {{ request()->is("admin/products*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/product-categories*") ? "active" : "" }} {{ request()->is("admin/product-tags*") ? "active" : "" }} {{ request()->is("admin/products*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-categories.index") }}" class="nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-tags.index") }}" class="nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('company_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is("admin/companies") || request()->is("admin/companies/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-building">

                            </i>
                            <p>
                                {{ trans('cruds.company.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>