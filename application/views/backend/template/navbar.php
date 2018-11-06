<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <div class="btn-group pull-right">
                    <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="si si-drop"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="h5 text-white" href="index.html">
                    <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">ne</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-full">
                <ul class="nav-main">
                    <li class="open">
                        <a class="active" href="base_pages_dashboard.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>

                    <li class="nav-main-heading"><span class="sidebar-mini-hide">User Interface</span></li>
                    <li >
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Servicios</span></a>
                        <ul>
                            <li>
                                <a href="base_ui_widgets.html">Widgets</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Blocks</a>
                                <ul>
                                    <li>
                                        <a href="base_ui_blocks.html">Styles</a>
                                    </li>
                                    <li>
                                        <a href="base_ui_blocks_api.html">Blocks API</a>
                                    </li>
                                    <li>
                                        <a href="base_ui_blocks_draggable.html">Draggable</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="base_ui_grid.html">Grid</a>
                            </li>
                            <li>
                                <a href="base_ui_typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="base_ui_icons.html">Icons</a>
                            </li>
                            <li>
                                <a href="base_ui_buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="base_ui_activity.html">Activity</a>
                            </li>
                            <li>
                                <a href="base_ui_tabs.html">Tabs</a>
                            </li>
                            <li>
                                <a href="base_ui_tiles.html">Tiles</a>
                            </li>
                            <li>
                                <a href="base_ui_cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="base_ui_ribbons.html">Ribbons</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Chat</a>
                                <ul>
                                    <li>
                                        <a href="base_ui_chat_full.html">Full</a>
                                    </li>
                                    <li>
                                        <a href="base_ui_chat_fixed.html">Fixed</a>
                                    </li>
                                    <li>
                                        <a href="base_ui_chat_popup.html">Popup</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Timeline</a>
                                <ul>
                                    <li>
                                        <a href="base_ui_timeline.html">Various</a>
                                    </li>
                                    <li>
                                        <a href="base_ui_timeline_social.html">Social</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="base_ui_navigation.html">Navigation</a>
                            </li>
                            <li>
                                <a href="base_ui_modals_tooltips.html">Modals &amp; Tooltips</a>
                            </li>
                            <li>
                                <a href="base_ui_color_themes.html">Color Themes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-grid"></i><span class="sidebar-mini-hide">Inventario</span></a>
                        <ul>
                            <li>
                                <a href="base_tables_styles.html">Styles</a>
                            </li>
                            <li>
                                <a href="base_tables_responsive.html">Responsive</a>
                            </li>
                            <li>
                                <a href="base_tables_tools.html">Tools</a>
                            </li>
                            <li>
                                <a href="base_tables_pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="base_tables_datatables.html">DataTables</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Finanzas</span></a>
                        <ul>
                            <li>
                                <a href="base_forms_premade.html">Pre-made</a>
                            </li>
                            <li>
                                <a href="base_forms_elements.html">Elements</a>
                            </li>
                            <li>
                                <a href="base_forms_pickers_more.html">Pickers &amp; More</a>
                            </li>
                            <li>
                                <a href="base_forms_editors.html">Text Editors</a>
                            </li>
                            <li>
                                <a href="base_forms_validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="base_forms_wizard.html">Wizard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Develop</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Proveedores</span></a>
                        <ul>
                            <li>
                                <a href="base_comp_images.html">Images</a>
                            </li>
                            <li>
                                <a href="base_comp_image_cropper.html">Image Cropper</a>
                            </li>
                            <li>
                                <a href="base_comp_charts.html">Charts (Various)</a>
                            </li>
                            <li>
                                <a href="base_comp_chartjs_v2.html">Charts.js v2</a>
                            </li>
                            <li>
                                <a href="base_comp_calendar.html">Calendar</a>
                            </li>
                            <li>
                                <a href="base_comp_sliders.html">Sliders</a>
                            </li>
                            <li>
                                <a href="base_comp_animations.html">Animations</a>
                            </li>
                            <li>
                                <a href="base_comp_scrolling.html">Scrolling</a>
                            </li>
                            <li>
                                <a href="base_comp_syntax_highlighting.html">Syntax Highlighting</a>
                            </li>
                            <li>
                                <a href="base_comp_rating.html">Rating</a>
                            </li>
                            <li>
                                <a href="base_comp_treeview.html">Tree View</a>
                            </li>
                            <li>
                                <a href="base_comp_masonry.html">Masonry</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Maps</a>
                                <ul>
                                    <li>
                                        <a href="base_comp_maps.html">Google</a>
                                    </li>
                                    <li>
                                        <a href="base_comp_maps_full.html">Google Full</a>
                                    </li>
                                    <li>
                                        <a href="base_comp_maps_vector.html">Vector</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Gallery</a>
                                <ul>
                                    <li>
                                        <a href="base_comp_gallery_simple.html">Simple</a>
                                    </li>
                                    <li>
                                        <a href="base_comp_gallery_advanced.html">Advanced</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-magic-wand"></i><span class="sidebar-mini-hide">Garantia</span></a>
                        <ul>
                            <li>
                                <a href="base_layouts_api.html">Layout API</a>
                            </li>
                            <li>
                                <a href="base_layouts_default.html">Default</a>
                            </li>
                            <li>
                                <a href="base_layouts_default_flipped.html">Default Flipped</a>
                            </li>
                            <li>
                                <a href="base_layouts_header_static.html">Static Header</a>
                            </li>
                            <li>
                                <a href="base_layouts_sidebar_mini_hoverable.html">Mini Sidebar (Hoverable)</a>
                            </li>
                            <li>
                                <a href="base_layouts_side_overlay_hoverable.html">Side Overlay (Hoverable)</a>
                            </li>
                            <li>
                                <a href="base_layouts_side_overlay_open.html">Side Overlay (Open)</a>
                            </li>
                            <li>
                                <a href="base_layouts_side_native_scrolling.html">Side Native Scrolling</a>
                            </li>
                            <li>
                                <a href="base_layouts_sidebar_hidden.html">Hidden Sidebar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Clientes</span></a>
                        <ul>
                            <li>
                                <a href="#">Link 1-1</a>
                            </li>
                            <li>
                                <a href="#">Link 1-2</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>
                                <ul>
                                    <li>
                                        <a href="#">Link 2-1</a>
                                    </li>
                                    <li>
                                        <a href="#">Link 2-2</a>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>
                                        <ul>
                                            <li>
                                                <a href="#">Link 3-1</a>
                                            </li>
                                            <li>
                                                <a href="#">Link 3-2</a>
                                            </li>
                                            <li>
                                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 4</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Link 4-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Link 4-2</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 5</a>
                                                        <ul>
                                                            <li>
                                                                <a href="#">Link 5-1</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Link 5-2</a>
                                                            </li>
                                                            <li>
                                                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 6</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">Link 6-1</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Link 6-2</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Sucursales</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Personal</span></a>
                        <ul>
                            <li>
                                <a href="base_pages_blank.html">Blank</a>
                            </li>
                            <li>
                                <a href="base_pages_search.html">Search Results</a>
                            </li>
                            <li>
                                <a href="base_pages_invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="base_pages_faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="base_pages_inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="base_pages_files.html">Files</a>
                            </li>
                            <li>
                                <a href="base_pages_tickets.html">Tickets</a>
                            </li>
                            <li>
                                <a href="base_pages_contacts.html">Contacts</a>
                            </li>
                            <li>
                                <a href="base_pages_team.html">Team</a>
                            </li>
                            <li>
                                <a href="base_pages_about.html">About</a>
                            </li>
                            <li>
                                <a href="base_pages_upgrade_plan.html">Upgrade Plan</a>
                            </li>
                            <li>
                                <a href="base_pages_contact.html">Contact</a>
                            </li>
                            <li>
                                <a href="base_pages_support.html">Support</a>
                            </li>
                            <li>
                                <a href="base_pages_coming_soon.html">Coming Soon</a>
                            </li>
                            <li>
                                <a href="base_pages_coming_soon_v2.html">Coming Soon v2</a>
                            </li>
                            <li>
                                <a href="base_pages_maintenance.html">Maintenance</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->