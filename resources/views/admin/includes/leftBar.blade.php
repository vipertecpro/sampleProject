<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-airplay"></i>
                        </div>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-list-ul"></i>
                        </div>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.category.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.tag.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-tag"></i>
                        </div>
                        <span>Tags</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.tag.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.tag.create') }}">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-plug"></i>
                        </div>
                        <span>Plugins</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Listing</a></li>
                        <li><a href="javascript:void(0);">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.media.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-image"></i></div>
                        <span>Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.media.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.media.create') }}">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-grids"></i></div>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Listing</a></li>
                        <li><a href="javascript:void(0);">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-cart"></i></div>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Listing</a></li>
                        <li><a href="javascript:void(0);">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-shopping-basket"></i></div>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Listing</a></li>
                        <li><a href="javascript:void(0);">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.blog.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-postcard"></i></div>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.blog.create') }}">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.news.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-newspaper"></i>
                        </div>
                        <span>News</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.news.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.news.create') }}">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-comment-alt"></i>
                        </div>
                        <span>Comments</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Listing</a></li>
                        <li><a href="javascript:void(0);">Create New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.user.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.user.list') }}">Listing</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Create New</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-cog"></i>
                        </div>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">General</a></li>
                        <li><a href="javascript:void(0);">Locations</a></li>
                        <li><a href="javascript:void(0);">Header</a></li>
                        <li><a href="javascript:void(0);">Footer</a></li>
                        <li><a href="javascript:void(0);">Application</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
