                <div class="inner-content">
                    <div class="panel theme-panel">
                        <div class="panel-heading">
                            <span class="panel-title"><h2>Dashboard</h2></span>
                        </div>
                        <div class="panel-body">
                            <div class="row clearfix">
                               
                                <div class="col-md-3 column" ui-sref="questions_manager">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-edit"></i></span>
                                        <h5>Menus</h5>
                                        <label><b>{{question_row}}</b> All Menus</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 column" ui-sref="exam_master">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-bullseye"></i></span>
                                        <h5>Services</h5>
                                        <label><b>{{exam_row}}</b>All Services</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 column" ui-sref="department">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-flag"></i></span>
                                        <h5>Child Services</h5>
                                        <label><b>{{department_row}}</b> Child Services</label>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-3 column" ui-sref="user_manager">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-user"></i></span>
                                        <h5>Plans</h5>
                                        <label><b>{{user_row}}</b>Plans</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 column" ui-sref="news">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-bullhorn"></i></span>
                                        <h5>Page</h5>
                                        <label><b>{{news_row}}</b> All Pages</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 column" ui-sref="uploads">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-upload"></i></span>
                                        <h5>Contact</h5>
                                        <label><b>{{uploads_row}}</b> Contact Us</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 column" ui-sref="slider">
                                    <div class="feature-box box-shadow">
                                        <span class="feature-icon"><i class="fa fa-sliders"></i></span>
                                        <h5>Admin Profile</h5>
                                        <label><b>{{slider_row}}</b> Admin</label>
                                    </div>
                                </div>
                                
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    <pre>
                    <?php 
                    print_r($this->session->userdata());
                    ?>
                    </pre>
</div>
<style>
.column{
    cursor:pointer;
}
</style>