<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-airplay"></i>
                        </div>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.post.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-map-pin-alt"></i>
                        </div>
                        <span>Posts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.post.list') }}">All Posts</a></li>
                        <li><a href="{{ route('admin.post.create') }}">Create</a></li>
                        <li><a href="{{ route('admin.category.list') }}">Categories</a></li>
                        <li><a href="{{ route('admin.tag.list') }}">Tags</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.media.list') }}" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-image"></i></div>
                        <span>Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.media.list') }}">Library</a></li>
                        <li><a href="{{ route('admin.media.create') }}">Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-grids"></i></div>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">All Pages</a></li>
                        <li><a href="javascript:void(0);">Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-comment-alt"></i>
                        </div>
                        <span>Comments</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-plug"></i>
                        </div>
                        <span>Appearance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.theme.list') }}">Themes</a></li>
                        <li><a href="{{ route('admin.theme.component.list') }}">Customize</a></li>
                        <li><a href="javascript:void(0);">Widgets</a></li>
                        <li><a href="javascript:void(0);">Menus</a></li>
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
                        <li><a href="javascript:void(0);">Installed Plugins</a></li>
                        <li><a href="javascript:void(0);">Add New</a></li>
                        <li><a href="javascript:void(0);">Plugin Editor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.user.list') }}">All Users</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Add New</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Profile</a></li>
                        <li><a href="{{ route('admin.user.role.list') }}">Roles</a></li>
                        <li><a href="{{ route('admin.user.permission.list') }}">Permissions</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <span>Tools</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">Available Tools</a></li>
                        <li><a href="javascript:void(0);">Import</a></li>
                        <li><a href="javascript:void(0);">Export</a></li>
                        <li><a href="javascript:void(0);">Site Health</a></li>
                        <li><a href="javascript:void(0);">Export Personal Data</a></li>
                        <li><a href="javascript:void(0);">Erase Personal Data</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0);">General</a></li>
                        <li><a href="javascript:void(0);">Writing</a></li>
                        <li><a href="javascript:void(0);">Reading</a></li>
                        <li><a href="javascript:void(0);">Discussion</a></li>
                        <li><a href="javascript:void(0);">Media</a></li>
                        <li><a href="javascript:void(0);">Permalinks</a></li>
                    </ul>
                </li>

                <hr>
            </ul>
        </div>
    </div>
</div>
