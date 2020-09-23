<div id="content">
    <div class="row">
        <div class="col-md-8">
            <div class="tabbable">
                <ul id="profile-tab" class="nav nav-tabs" data-provide="tabdrop">
                    <li class="dropdown pull-right tabdrop hide"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-align-right"></i> <span class="badge"></span></a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                    <li><a href="#" id="prevtab" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#" id="nexttab" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
                    <li class="active"><a href="#tab1" data-toggle="tab">Items</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab" class="timeline-show">Descargo Quirofano</a></li>
                    <li class=""><a href="#tab3" data-toggle="tab" class="portfolio-show">Descargo Endoscopia</a></li>
                    <li><a href="#tab4" data-toggle="tab">Account</a></li>
                </ul>
                <div class="tab-content row">

                    <div class="tab-pane fade col-lg-12 active in" id="tab1">
                        <div class="panel-body">
                            <div>
                                <button class="btn btn-theme-inverse col-lg-4" id="btn-md_agregar_item"><i class="fa fa-plus"></i> Agregar item</button>
                                <div class="input-group col-lg-6" data-picker-position="bottom-left">
                                    <input type="text" class="form-control" placeholder="Buscar item">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-search" title="Buscar item"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>COD</th>
                                            <th width="40%">Nombre</th>
                                            <th>Estado</th>
                                            <th width="20%">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center" id="list-items1">
                                        @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td valign="middle">{{$item->dmi_nombre}}</td>
                                            <td><span class="label label-success">{{$item->dmi_tipo}}</span></td>
                                            <td>
                                                <span class="tooltip-area">
                                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /#tab1-->
                    <div class="tab-pane fade col-lg-12" id="tab2">
                        <div class="widget-timeline">
                            <ul>
                                <li class="history">
                                    <span>
                                        October 2013
                                    </span>
                                </li>
                                <li class="right">
                                    <section>
                                        <div class="mark bgimg" style="background-image: url(&quot;assets/photos_preview/300/city/1.jpg&quot;); line-height: 166px;"></div>
                                        <div class="timeline-content">
                                            <time><i class="fa fa-clock-o"></i>Today ,10:36am</time>
                                            <h3>Image Mark</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                    </section>
                                </li>
                                <li class="left">

                                    <section>
                                        <div class="mark bg-primary" style="line-height: 186px;"><i class=" fa fa-trophy"></i></div>
                                        <div class="timeline-content">
                                            <time><i class="fa fa-clock-o"></i>Today ,09:18pm</time>
                                            <h3>Color Mark</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </section>
                                </li>
                                <li class="right">
                                    <section>
                                        <div class="mark bg-inverse" style="line-height: 186px;"><i class="fa fa-paste"></i></div>
                                        <div class="timeline-content">
                                            <time><i class="fa fa-clock-o"></i>Yesterday ,01:18pm</time>
                                            <h3>Icon Mark Right</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </section>
                                </li>
                                <li class="left">
                                    <section>
                                        <time><i class="fa fa-clock-o"></i>2 Day ago ,08:49pm</time>
                                        <h3>Image Normal Position</h3>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <img alt="" src="assets/photos_preview/700/nature/1.jpg">
                                    </section>
                                </li>
                                <li class="right corner-flip flip-bg-white bd-darkorange">
                                    <section class="bg-darkorange">
                                        <h3>Customize Color</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </section>
                                    <div class="flip">
                                    </div>
                                    <div class="flip"></div>
                                </li>
                                <li class="highlight">
                                    <section>
                                        <time><i class="fa fa-clock-o"></i>19 Saturday ,10:18pm</time>
                                        <h3>Time Line Class Highlight</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </section>
                                </li>
                                <li class="history">
                                    <span>
                                        Load More
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /#tab2-->
                    <div class="tab-pane fade col-lg-12" id="tab3">
                        <br>
                        <!-- box Filter -->
                        <div class="box-filter">
                            <a href="#" class="btn btn-inverse active" data-filter="*"><i class="fa fa-th"></i></a>
                            <a href="#" class="btn btn-theme " data-filter=".artwork">Artwork</a>
                            <a href="#" class="btn btn-theme " data-filter=".photography">Photography</a>
                            <a href="#" class="btn btn-theme " data-filter=".webdesign">Web Design</a>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- box Feed -->
                            <div class="box-feed  clearfix">
                                <div class="col-sm-4 photography webdesign">
                                    <img alt="" src="assets/photos_preview/thumbs/1.jpg" class="img-preview">
                                </div>
                                <div class="col-sm-4 photography">
                                    <img alt="" src="assets/photos_preview/thumbs/3.jpg" class="img-preview">
                                </div>
                                <div class="col-sm-4  webdesign">
                                    <img alt="" src="assets/photos_preview/thumbs/5.jpg" class="img-preview">
                                </div>
                                <div class="col-sm-4 artwork">
                                    <img alt="" src="assets/photos_preview/thumbs/7.jpg" class="img-preview">
                                </div>
                                <div class="col-sm-4 artwork webdesign">
                                    <img alt="" src="assets/photos_preview/thumbs/9.jpg" class="img-preview">
                                </div>
                            </div>
                            <!-- /box Feed -->
                        </div>
                        <!-- /row-->
                    </div>
                    <!-- /#tab3-->
                    <div class="tab-pane fade col-lg-12" id="tab4">
                        <div class="row">
                            <div class="col-md-4 align-lg-center">
                                <img alt="" src="assets/img/avatar.png" class="circle" style="max-width:120px; border:5px #edece5 solid; margin:25px 0;">
                                <div class="progress progress-shine progress-sm tooltip-in">
                                    <div class="progress-bar bg-warning" aria-valuetransitiongoal="69" aria-valuenow="69" style="width: 69%;"></div>
                                </div>
                                <label class="progress-label">Account Complete</label>
                            </div>
                            <div class="col-md-8">
                                <br>
                                <h3><strong>Account</strong> Setting</h3>
                                <hr>
                                <form>
                                    <div class="form-group">
                                        <label class="control-label">User name</label>
                                        <input type="text" class="form-control" parsley-trigger="keyup" parsley-rangelength="[8,15]" parsley-required="true" placeholder="8-15 Characters">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullname" parsley-required="true" placeholder="Your full name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Your last name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control" id="pword" parsley-trigger="keyup" parsley-rangelength="[4,8]" parsley-required="true" placeholder="4-8 Characters">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control" parsley-trigger="keyup" parsley-equalto="#pword" placeholder="Confirm Password" parsley-error-message="Password don't match">
                                    </div>

                                    <br>
                                    <h3><strong>Address</strong> Info</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label">Address Line</label>
                                        <textarea class="form-control" parsley-trigger="keyup" rows="3" placeholder="Enter  your address"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="control-label">City</label>
                                            <input class="form-control" parsley-required="true" placeholder="Current city">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">State</label>
                                            <select class="selectpicker form-control" multiple="" style="display: none;">
                                                <option value="Australia">Australia</option>
                                                <option value="China">China</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                            </select>
                                            <div class="btn-group bootstrap-select show-tick form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
                                                    <div class="filter-option pull-left">Nothing selected</div>&nbsp;<div class="caret"></div>
                                                </button>
                                                <div class="dropdown-menu open">
                                                    <ul class="dropdown-menu inner selectpicker" role="menu">
                                                        <li rel="0"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                        <li rel="1"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                        <li rel="2"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                        <li rel="3"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                        <li rel="4"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                        <li rel="5"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" class="form-control" parsley-required="true">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-theme"> Update Account</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /row-->
                        </div>
                        <!-- /#tab4-->

                    </div>
                </div>
                <!-- //tab-content -->
            </div>
        </div>
        <div class="col-md-4">

            <div class="well bg-theme-inverse">
                <div class="widget-tile">
                    <section>
                        <h5><strong>Descargos</strong> Quirofano </h5>
                        <h2>97,584</h2>
                        <div class="progress progress-xs progress-white progress-over-tile">
                            <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="97584" aria-valuemax="300000" aria-valuenow="97584" style="width: 33%;"></div>
                        </div>
                        <label class="progress-label label-white">32.53% </label>
                    </section>
                    <div class="hold-icon"><i class="fa fa-laptop"></i></div>
                </div>
            </div>

            <div class="well bg-theme">
                <div class="widget-tile">
                    <section>
                        <h5><strong>Descargos </strong> Endoscopia </h5>
                        <h2>8,590</h2>
                        <div class="progress progress-xs progress-white progress-over-tile">
                            <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000" aria-valuenow="8590" style="width: 86%;"></div>
                        </div>
                        <label class="progress-label label-white">32.53% </label>

                    </section>
                    <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- //content > row-->

</div>
<div id="md-create_item_descargoMed" class="modal fade md-stickTop" tabindex="-1" data-width="500">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Registrar Nuevo Item</h3>
    </div>
    <form class="form-horizontal" id="form-createItemDesMed" data-collabel="3" data-alignlabel="left" data-label="color">
        <input type="text" name="_token" value="{{ csrf_token() }}" hidden>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <div>
                    <input type="text" name="nombreItem" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <div>
                    <select class="form-control" name="tipoItem" >
                        <option value="medicamento">Medicamento</option>
                        <option value="insumo">Insumo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-inverse">Cancelar</button>
            <button type="submit" class="btn btn-theme-inverse" >Agregar</button>
        </div>
    </form>
</div>
<!-- Jquery Library -->
<!-- <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/js/jquery.ui.min.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script> -->
<!-- Modernizr Library For HTML5 And CSS3 -->
<!-- <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/mmenu/jquery.mmenu.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/js/styleswitch.js') }}"></script> -->
<!-- Library 10+ Form plugins-->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/form/form.js') }}"></script> -->
<!-- Datetime plugins -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/datetime/datetime.js') }}"></script> -->
<!-- Library Chart-->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/chart/chart.js') }}"></script> -->
<!-- Library  5+ plugins for bootstrap -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/pluginsForBS/pluginsForBS.js') }}"></script> -->
<!-- Library 10+ miscellaneous plugins -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/miscellaneous/miscellaneous.js') }}"></script> -->
<!-- Library Themes Customize-->
<script type="text/javascript" src="{{ asset('assets/js/caplet.custom.js') }}"></script>
<!-- Library Morris Chart-->
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/morris/morris.js') }}"></script> -->
<!-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}" /> -->

<!-- Library  5+ plugins for bootstrap -->
<!-- <script type="text/javascript" src="{{asset('assets/plugins/pluginsForBS/pluginsForBS.js')}}"></script> -->

<script type="text/javascript" src="{{ asset('/asincrono/descargoMedico.js') }}"></script>