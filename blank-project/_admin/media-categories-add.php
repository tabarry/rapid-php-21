<?php
include('../sulata/includes/config.php');
include('../sulata/includes/functions.php');
include('../sulata/includes/connection.php');
include('../sulata/includes/get-settings.php');
include('../sulata/includes/db-structure.php');
$pageName = 'Add Media Categories';
$pageTitle = 'Add Media Categories';
checkLogin();
/* rapidSql */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('inc-head.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                //Keep session alive
                $(function() {
                    window.setInterval("suStayAlive('<?php echo PING_URL; ?>')", 300000);
                });
                //Disable submit button
                suToggleButton(1);
            });
        </script> 
    </head>

    <body>

        <div class="outer">

            <!-- Sidebar starts -->

            <?php include('inc-sidebar.php'); ?>
            <!-- Sidebar ends -->

            <!-- Mainbar starts -->
            <div class="mainbar">
                <?php include('inc-heading.php'); ?>
                <!-- Mainbar head starts -->
                <div class="main-head">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <!-- Bread crumbs -->
                                <?php include('inc-breadcrumbs.php'); ?>
                            </div>

                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <!-- Search block -->

                            </div>

                            <div class="col-md-3 col-sm-4 hidden-xs">
                                <!-- Notifications -->
                                <div class="head-noty text-center">

                                </div>
                                <div class="clearfix"></div>
                            </div>


                            <div class="col-md-3 hidden-sm hidden-xs">
                                <!-- Head user -->

                                <?php include('inc-header.php'); ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>	
                    </div>

                </div>

                <!-- Mainbar head ends -->

                <div class="main-content">
                    <div class="container">

                        <div class="page-content">

                            <!-- Heading -->
                            <div class="single-head">
                                <!-- Heading -->
                                <h3 class="pull-left"><i class="fa fa-desktop purple"></i> <?php echo $pageTitle; ?></h3>
                                <div class="pull-right">
                                    <a href="<?php echo ADMIN_URL; ?>media-categories-cards/"><i class="fa fa-th-large"></i></a>
                                    <a href="<?php echo ADMIN_URL; ?>media-categories/"><i class="fa fa-table"></i></a>
                                </div>

                                <div class="clearfix"></div>
                            </div>

                            <div id="content-area">

                                <div id="error-area">
                                    <ul></ul>
                                </div>    
                                <div id="message-area">
                                    <p></p>
                                </div>
                                <!--SU STARTS-->
                                <form class="form-horizontal" action="<?php echo ADMIN_SUBMIT_URL; ?>media-categories-remote/add/" accept-charset="utf-8" name="suForm" id="suForm" method="post" target="remote" enctype="multipart/form-data">			
                                    <div class="gallery clearfix">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label><?php echo $dbs_sulata_media_categories['mediacat__Name_req']; ?>Name:</label>
                                                <?php
                                                $arg = array('type' => $dbs_sulata_media_categories['mediacat__Name_html5_type'], 'name' => 'mediacat__Name', 'id' => 'mediacat__Name', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Name_max'], $dbs_sulata_media_categories['mediacat__Name_html5_req'] => $dbs_sulata_media_categories['mediacat__Name_html5_req'], 'class' => 'form-control');
                                                echo suInput('input', $arg);
                                                ?>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label><?php echo $dbs_sulata_media_categories['mediacat__Picture_req']; ?>Picture:</label>
                                                <?php
                                                $arg = array('type' => $dbs_sulata_media_categories['mediacat__Picture_html5_type'], 'name' => 'mediacat__Picture', 'id' => 'mediacat__Picture', $dbs_sulata_media_categories['mediacat__Picture_html5_req'] => $dbs_sulata_media_categories['mediacat__Picture_html5_req']);
                                                echo suInput('input', $arg);
                                                ?>

                                                <div><?php echo $getSettings['allowed_image_formats']; ?></div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                            
                                                <label><?php echo $dbs_sulata_media_categories['mediacat__Description_req']; ?>Description:</label>
                                                <?php
                                                $arg = array('type' => $dbs_sulata_media_categories['mediacat__Description_html5_type'], 'name' => 'mediacat__Description', 'id' => 'mediacat__Description');
                                                echo suInput('textarea', $arg, '', TRUE);
                                                suCKEditor('mediacat__Description');
                                                ?>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">                                            

                                                <label><?php echo $dbs_sulata_media_categories['mediacat__Type_req']; ?>Type:</label>
                                                <?php
                                                $extra = "onchange='doCatType(this)'";
                                                $options = $dbs_sulata_media_categories['mediacat__Type_array'];
                                                $extra .= " class=\"form-control\"";
                                                echo suDropdown('mediacat__Type', $options, '', $extra)
                                                ?>
                                            </div>

                                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">                                            
                                                <label><?php echo $dbs_sulata_media_categories['mediacat__Sequence_req']; ?>Sequence:</label>
                                                <?php
                                                $arg = array('type' => $dbs_sulata_media_categories['mediacat__Sequence_html5_type'], 'name' => 'mediacat__Sequence', 'id' => 'mediacat__Sequence', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Sequence_max'], $dbs_sulata_media_categories['mediacat__Sequence_html5_req'] => $dbs_sulata_media_categories['mediacat__Sequence_html5_req'], 'class' => 'form-control');
                                                echo suInput('input', $arg);
                                                ?>

                                            </div>
                                        </div>

                                        <span id="divDimensions" style="display:none">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <label><?php echo $dbs_sulata_media_categories['mediacat__Thumbnail_Width_req']; ?>Thumbnail Width:</label>
                                                    <?php
                                                    $arg = array('type' => $dbs_sulata_media_categories['mediacat__Thumbnail_Width_html5_type'], 'name' => 'mediacat__Thumbnail_Width', 'id' => 'mediacat__Thumbnail_Width', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Thumbnail_Width_max'], $dbs_sulata_media_categories['mediacat__Thumbnail_Width_html5_req'] => $dbs_sulata_media_categories['mediacat__Thumbnail_Width_html5_req'], 'class' => 'form-control');
                                                    echo suInput('input', $arg);
                                                    ?>


                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <label><?php echo $dbs_sulata_media_categories['mediacat__Thumbnail_Height_req']; ?>Thumbnail Height:</label>
                                                    <?php
                                                    $arg = array('type' => $dbs_sulata_media_categories['mediacat__Thumbnail_Height_html5_type'], 'name' => 'mediacat__Thumbnail_Height', 'id' => 'mediacat__Thumbnail_Height', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Thumbnail_Height_max'], $dbs_sulata_media_categories['mediacat__Thumbnail_Height_html5_req'] => $dbs_sulata_media_categories['mediacat__Thumbnail_Height_html5_req'], 'class' => 'form-control');
                                                    echo suInput('input', $arg);
                                                    ?>


                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <label><?php echo $dbs_sulata_media_categories['mediacat__Image_Width_req']; ?>Image Width:</label>
                                                    <?php
                                                    $arg = array('type' => $dbs_sulata_media_categories['mediacat__Image_Width_html5_type'], 'name' => 'mediacat__Image_Width', 'id' => 'mediacat__Image_Width', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Image_Width_max'], $dbs_sulata_media_categories['mediacat__Image_Width_html5_req'] => $dbs_sulata_media_categories['mediacat__Image_Width_html5_req'], 'class' => 'form-control');
                                                    echo suInput('input', $arg);
                                                    ?>


                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <label><?php echo $dbs_sulata_media_categories['mediacat__Image_Height_req']; ?>Image Height:</label>
                                                    <?php
                                                    $arg = array('type' => $dbs_sulata_media_categories['mediacat__Image_Height_html5_type'], 'name' => 'mediacat__Image_Height', 'id' => 'mediacat__Image_Height', 'autocomplete' => 'off', 'maxlength' => $dbs_sulata_media_categories['mediacat__Image_Height_max'], $dbs_sulata_media_categories['mediacat__Image_Height_html5_req'] => $dbs_sulata_media_categories['mediacat__Image_Height_html5_req'], 'class' => 'form-control');
                                                    echo suInput('input', $arg);
                                                    ?>

                                                </div>
                                            </div>
                                        </span>
                                        <div class="lineSpacer clear"></div>
                                        <p>
                                            <?php
                                            $arg = array('type' => 'submit', 'name' => 'Submit', 'id' => 'Submit', 'value' => 'Submit', 'class' => 'btn btn-primary pull-right');
                                            echo suInput('input', $arg);
                                            ?>                              
                                        </p>
                                    </div>
                                </form>

                                <!--SU ENDS-->
                            </div>
                        </div>
                        <?php include('inc-site-footer.php'); ?>
                    </div>
                </div>

            </div>

            <!-- Mainbar ends -->

            <div class="clearfix"></div>
        </div>
        <?php include('inc-footer.php'); ?>
        <?php suIframe(); ?>  
    </body>
    <!--PRETTY PHOTO-->
    <?php include('inc-pretty-photo.php'); ?>    
</html>