<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 247px;">
        <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 247px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>

                    <li>
                        <a href="<?= $this->Url->build('/', ['fullBase' => true]) ?>"><i class="la la-users"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="submenu">
                        <a onclick="javascript:void(0)" href="<?= $this->Url->build('/user', ['fullBase' => true]) ?>"><i class="la la-files-o"></i> <span> User </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?= $this->Url->build('/user', ['fullBase' => true]) ?>">Index</a></li>
                            <li><a href="<?= $this->Url->build('/user/add', ['fullBase' => true]) ?>">Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a onclick="javascript:void(0)" href="<?= $this->Url->build('/task', ['fullBase' => true]) ?>"><i class="la la-files-o"></i> <span> Task </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?= $this->Url->build('/task', ['fullBase' => true]) ?>">Index</a></li>
                            <li><a href="<?= $this->Url->build('/task/add', ['fullBase' => true]) ?>">Add</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 247px;"></div>
        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
</div>