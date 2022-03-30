<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<style>
    .visiter_counter {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #f0f0f0;
        background-color: #ffffff;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        font-family: Arial;
        font-size: 14px;
    }

    .home_stats {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #f0f0f0;
        background-color: #ffffff;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        font-family: Arial;
        font-size: 14px;
        text-align: center;
    }

    .home_stats_up {
        padding: 35px 0px 0px 0px;
        height: 80px;
    }

    .home_stats_down {
        border-radius: 0px 0px 5px 5px;
        background-color: #3e4694;
        padding: 8px;
    }

    .home_stats_link {
        color: #ffffff;
        display: block;
        text-decoration: none;
    }

    .home_stats_down a:hover {
        color: #ffffff;
        display: block;
        text-decoration: none;
    }

    #home_p {
        padding: 0px 31px 31px 31px;
    }

    .home_stats_side_heading {
        color: #ffffff;
        writing-mode: tb-rl;
        transform: rotate(-180deg);
        font-size: 18px;
        text-align: center;
        background-color: #3e4694;
        line-height: 3;
        letter-spacing: 5px;
        text-transform: uppercase;
    }

    .bg_setings {
        background-color: #3e4694;
    }

    .settings_cog {
        padding: 37px 27px 20px 27px;
        height: 125px;
    }

    .settings_cog i {
        color: #ffffff;
        font-size: 70px;
    }

    .bussiness_settings {
        text-align: center;
        color: #ffffff;
        height: 135px;
        padding: 15px 0px 15px 0px;
        font-size: 19px;
        line-height: 1.8;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .bg-white {
        border-radius: 5px;
        border: 1px solid #f0f0f0;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .visiter_counter .col-md-12 {
        font-size: 11px;
        line-height: 1.27;
        padding: 10px;
    }

    .visiter_counter .col-md-12 {
        font-size: 11px;
        line-height: 1.27;
        padding: 10px;
    }

    .visiter_counter .col-md-12 .sub_col {
        padding-left: 60px;
        padding-right: 60px;
    }

    .progress {
        height: 5px;
    }

    .history_heading {
        padding: 17px;
        color: rgba(55, 77, 103, 0.54);
    }

    .table {
        line-height: 20px;
    }
</style>
<link href="<?php echo $apath ?>assets/css/css-circular-prog-bar.css" media="all" rel="stylesheet" />
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__container mt-5">
                <div class="row card-group-row">

                    <div id="home_p" class="container-fluid">
                        <div class="row">
                            <div class="home_stats_side_heading col-md-1">
                                HOME &nbsp; PAGE
                            </div>
                            <div class="p-4 col-md-11 home_stats">
                                <div class="row pb-4">
                                    <div class="col-md-3">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Header</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="text_header">Click Here</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Newsletter</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="text_newsletter">Click Here</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Footer</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="text_footer">Click Here</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-3">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- First Row Of Settings -->
                                <div class="row pb-4">
                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>General Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_settings">Click Here</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Social Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_social">Click Here</a></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Row Of Settings -->
                                <div class="row pb-4">

                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Contact Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_contact">Click Here</a></div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Database Backup</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_backup">Click Here</a></div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Business Colomn -->
                            </div>
                            <div class="col-md-2">
                                <div class="container bg_setings">
                                    <div class="settings_cog row"><i class="fa fa-cogs"></i></div>
                                    <div class="row bussiness_settings">WEBSITE SETTINGS</div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <!-- First Row Of Settings -->
                                <div class="row pb-4">
                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>SMTP Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_smtp">Click Here</a></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>ReCaptcha Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_captcha">Click Here</a></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Row Of Settings -->
                                <div class="row pb-4">
                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Scripts Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_scripts">Click Here</a></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="home_stats">
                                            <div class="home_stats_up col-md-12">
                                                <b>Meta Settings</b>
                                            </div>
                                            <div class="home_stats_down col-md-12"><a class="home_stats_link" href="site_meta">Click Here</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>