<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Primary Meta Tags -->
    <title>TESDA Region 2 Job Portal</title>
    <meta name="title" content="TESDA Region 2 Job Portal">
    <meta name="description" content="Simplifying your path to public service.">
    <meta name="keywords" content="Simplifying your path to public service.">
    <meta name="author" content="TESDA Region 2 - Regional Information & Communications Technology Unit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url()?>assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>assets/img/favicon-32x32.png">
    <link rel="icon" type="image/x-icon" href="<?= base_url()?>favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url()?>assets/img/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Open Graph / Facebook / Messenger / Viber -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url()?>">
    <meta property="og:site_name" content="TESDA Region 2 Job Portal">
    <meta property="og:title" content="Simplifying your path to public service.">
    <meta property="og:description" content="Simplifying your path to public service.">
    <meta property="og:image" content="<?= base_url()?>assets/img/OG-Main.png">
    <meta property="og:image:secure_url" content="<?= base_url()?>assets/img/OG-Main.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Simplifying your path to public service.">
    <meta property="og:locale" content="en_PH">

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= base_url()?>">
    <meta name="twitter:title" content="Simplifying your path to public service.">
    <meta name="twitter:description" content="Simplifying your path to public service.">
    <meta name="twitter:image" content="<?= base_url()?>assets/img/OG-Main.png">

    <!-- Theme Color for Mobile Browsers -->
    <meta name="theme-color" content="#003399">

    <!-- Fontfaces CSS-->
    <link href="<?= base_url()?>jobportal/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url()?>jobportal/css/theme.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="<?= base_url()?>jobportal/vendor/jquery-3.2.1.min.js"></script>

   <!-- DataTables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Typography for the redesign -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Source+Serif+4:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root{
            --ink:#1C2B39;
            --ink-soft:#2E4157;
            --paper:#FAF8F4;
            --brass:#A8762E;
            --brass-dark:#8C6224;
            --slate:#5B6B7A;
            --line:#D9D3C7;
            --success:#3F7A5C;
            --closed:#8A5A2E;
        }
        body{font-family:'Inter',-apple-system,sans-serif;color:var(--ink);background:var(--paper);}

        /* Header */
        .header-desktop4{background:#fff;border-bottom:1px solid var(--line);padding:16px 0;}
        .header4-wrap{display:flex;align-items:center;}
        .header__logo img{height:44px;}

        /* Hero */
        .tesda-hero{background:var(--ink);padding:56px 0 64px;position:relative;overflow:hidden;}
        .tesda-hero::after{
            content:"";position:absolute;right:-80px;top:-80px;width:320px;height:320px;
            border-radius:50%;background:radial-gradient(circle,rgba(168,118,46,.18),transparent 70%);
        }
        .tesda-hero .eyebrow{
            color:var(--brass);font-size:14px;font-weight:600;margin-bottom:10px;display:block;
        }
        .tesda-hero h1{
            font-family:'Source Serif 4',Georgia,serif;
            color:#fff;font-size:38px;font-weight:700;line-height:1.15;margin-bottom:22px;
        }
        .tesda-hero h1 span{display:block;color:#C9BFA8;font-size:20px;font-weight:400;margin-top:6px;font-family:'Inter',sans-serif;}
        .tesda-hero .eo-statement{
            background:rgba(255,255,255,.05);
            border-left:3px solid var(--brass);
            padding:16px 20px;
            border-radius:0 3px 3px 0;
            color:#D8D2C4;
            font-size:14.5px;
            line-height:1.7;
            margin-bottom:14px;
        }
        .tesda-hero .confidentiality-note{
            color:#9DA9B6;font-size:13.5px;line-height:1.6;margin-bottom:30px;max-width:640px;
        }

        .search-card{
            background:#fff;border-radius:4px;padding:8px;display:flex;gap:8px;
            max-width:560px;box-shadow:0 8px 24px rgba(0,0,0,.15);
        }
        .search-card input{
            flex:1;border:none;padding:12px 16px;font-size:14.5px;color:var(--ink);
            background:transparent;
        }
        .search-card input:focus{outline:none;}
        .search-card button{
            background:var(--brass);border:none;color:#fff;padding:0 20px;border-radius:3px;
            display:flex;align-items:center;justify-content:center;transition:background .15s ease;
        }
        .search-card button:hover{background:var(--brass-dark);}

        /* Listings section */
        .listings-section{padding:48px 0 20px;}
        .listings-heading{
            font-family:'Source Serif 4',Georgia,serif;
            font-size:24px;font-weight:600;color:var(--ink);margin-bottom:4px;
        }
        .listings-sub{color:var(--slate);font-size:14px;margin-bottom:24px;}

        .tesda-table-wrap{
            background:#fff;border:1px solid var(--line);border-radius:4px;overflow:hidden;
        }
        table.table-data3{margin-bottom:0;}
        table.table-data3 thead tr{background:var(--ink) !important;}
        table.table-data3 thead th{
            color:#fff !important;font-weight:600;font-size:13px;
            padding:14px 16px;border:none;
        }
        table.table-data3 tbody td{
            padding:14px 16px;font-size:14px;color:var(--ink);
            border-top:1px solid var(--line);vertical-align:middle;
        }
        table.table-data3 tbody tr:hover{background:#FCFBF8;}

        .role.member{
            background:#EAF3EE;color:var(--success);border-radius:20px;
            padding:4px 12px;font-size:12.5px;font-weight:600;
        }
        .role.admin{
            background:#F5EDE2;color:var(--closed);border-radius:20px;
            padding:4px 12px;font-size:12.5px;font-weight:600;
        }

        .table-data-feature{display:flex;gap:6px;}
        .table-data-feature .item{
            background:var(--paper);border:1px solid var(--line);border-radius:3px;
            width:34px;height:34px;display:flex;align-items:center;justify-content:center;
            padding:0;transition:.15s ease;
        }
        .table-data-feature .item:hover{background:var(--ink);}
        .table-data-feature .item:hover a{color:#fff;}
        .table-data-feature .item a{color:var(--ink);}
        .table-data-feature .item span#getnoofapplicants{font-size:13px;}

        /* Footer */
        .copyright{padding:20px 0;border-top:1px solid var(--line);margin-top:30px;}
        .copyright p{color:var(--slate);font-size:13px;text-align:center;margin:0;}
        .copyright a{color:var(--brass-dark);}

        .status-box{
        position:relative;
        max-width:560px;
        margin-top:14px;
        background:var(--paper);
        border:1px solid var(--line);
        border-left:4px solid var(--brass);
        border-radius:6px;
        padding:20px 24px;
        }
        .status-close{
        position:absolute;
        top:14px;
        right:16px;
        background:none;
        border:none;
        color:var(--slate);
        font-size:20px;
        line-height:1;
        cursor:pointer;
        padding:0;
        }
        .status-close:hover{color:var(--ink);}

        /* "No record found" box */
        .status-box-inner{
        display:flex;
        align-items:flex-start;
        gap:12px;
        padding-right:20px;
        }
        .status-icon-inline{
        color:var(--brass-dark);
        font-size:16px;
        margin-top:2px;
        }
        .status-alert-text{
        flex:1;
        font-size:14px;
        line-height:1.55;
        color:var(--ink);
        }

        /* "Application status" letter box */
        .status-box-letter{padding:24px 26px 22px;}
        
        .status-box-letter .letter{
        background:#fff;
        border:1px solid var(--line);
        border-radius:4px;
        padding:22px 24px;
        }
        .status-box-letter .letter .salutation{font-size:14.5px;margin-bottom:14px;display:block;}
        .status-box-letter .letter #lastname123,
        .status-box-letter .letter #position,
        .status-box-letter .letter #result{color:var(--brass-dark);}
        .status-box-letter .letter p{font-size:14px;line-height:1.65;margin-bottom:12px;color:var(--ink);}
        .status-box-letter .letter p:last-child{margin-bottom:0;}

        .fa-spin{
        animation:fa-spin 0.9s linear infinite;
        }
        @keyframes fa-spin{
        from{transform:rotate(0deg);}
        to{transform:rotate(360deg);}
        }
        .search-card button:disabled{
        opacity:.7;
        cursor:not-allowed;
        }
    </style>

</head>
<body class="animsition">
<!--FB-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0">
</script>
<!--FB-->
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <!-- Header Tab-->
        <?php include("include/sticky.php");?> 
        <!-- END HEADER DESKTOP -->

        <!-- WELCOME-->
        <section class="tesda-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="eyebrow">TESDA DOS Integrated System (TDIS) </span>
                        <h1>Job Portal<span>Find and apply to open positions across TESDA Region II (Cagayan Valley)</span></h1>

                        <div class="eo-statement">
                            “TESDA, as an Equal Opportunity agency, encourages a more diverse and inclusive workforce. Hence, applicants will not be discriminated on account of gender, sexual orientation, civil status, disability, religion, ethnicity, or political affiliation, provided, however that they meet the minimum requirements of the position to be filled.”
                        </div>
                        <p class="confidentiality-note">The accomplished form shall be treated with utmost confidentiality and shall be used exclusively for the recruitment and selection process.</p>

                        <form class="search-card" method="post" id="search_form_applicant">
                            <input type="text" name="search_form_applicant" placeholder="Search the status of your application" required>
                            <button type="submit" id="search_btn">
                                <i class="fa fa-search" id="search_icon"></i>
                            </button>
                        </form>

                        <div id="app_status_false" class="status-box" style="display:none;">
                            <button type="button" class="status-close" aria-label="Close" onclick="document.getElementById('app_status_false').style.display='none';">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="status-box-inner">
                                <i class="fa fa-search status-icon-inline" aria-hidden="true"></i>
                                <div class="status-alert-text">
                                    <strong>No record found.</strong> We couldn't find an application matching what you searched for. Please check the details and try again.
                                </div>
                            </div>
                        </div>

                        <div id="app_status" class="status-box status-box-letter" style="display:none;">
                            <button type="button" class="status-close" aria-label="Close" onclick="document.getElementById('app_status').style.display='none';">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="status-box-inner">
                                <i class="fa fa-search status-icon-inline" aria-hidden="true"></i>
                                <div class="status-alert-text">
                                   <span id="paragraph4"><p><strong>Your application is still being processed.</strong> Your application will be evaluated within three (3) working days from the date of submission.</p>
                                    <br><p>Please be informed that <strong>TESDA is currently implementing a compressed workweek arrangement, with regular working days from Monday to Thursday. </strong> 
                                    Friday, Saturday, and Sunday are non-working days, along with declared holidays. As such, these days are not included in the counting of working days for application processing.</p>
                                    <br><p>Thank you for your patience and understanding.</p></span>
                                </div>
                            </div>
                            
                            <div class="status-box-inner">
                                <div id="paragraphdiv" class="letter">
                                    <span id="paragraph3" class="salutation">Dear Mr./Ms. <b><span id="lastname123"></span></b></span>
                                    <p id="paragraph1">This is regarding your application to the vacant <b><span id="position"></span></b> position in the Technical Education and Skills Development Authority (TESDA).</p>
                                    <p id="paragraph2">Please be informed that you <b><span id="result"></span></b> the required qualifications for the position you applied for. Kindly wait for further notice.</p>
                                    <p id="paragraph5">Thank you.</p>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="listings-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT-->
                            <div class="page-content">
                                <div class="listings-heading">Open Positions</div>
                                <p class="listings-sub">Review the qualifications for a position, then submit your application before its closing date.</p>
                                <div class="row">

                                    <!-- DATA TABLE-->
                                    <div class="tesda-table-wrap m-b-10" style="width:100%;">
                                        <div class="table-responsive">
                                            <table id="vacant_positions_open_landing_table" class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Location</th>
                                                        <th>Position Title</th>
                                                        <th>Plantilla Item No.</th>
                                                        <th>Salary Grade</th>
                                                        <th>Posting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="vacant_positions_open_landing">


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END DATA TABLE -->

                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>

                 <!-- COPYRIGHT-->
                <section class="p-t-10 p-b-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>&copy 2022 <b>TESDA DOS</b>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>TESDA DOS ICTU</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END COPYRIGHT-->

                <!-- modal static applicant -->
                <?php include("applicant.php");?>
                <!-- end modal static applicant -->

                <!-- modal static qualification standard -->
                     <?php include("qualification_standard.php");?>
                <!-- end modal static qualification standard -->

            </section>
        </div>
        <!-- END PAGE CONTENT  -->

        <script>
            $(document).ready(function () {

            //-----------------AJAX-------------------------------         
            show_vacant_position(); //call function show all work show_vacant_position
                    
            //function show all work show_vacant_position
            function show_vacant_position(){
                $.ajax({
                    type  : 'GET',
                    url   :   '<?= base_url()?>get_vacant_position_open',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        var x=1;
                        for(i=0; i<data.length; i++){
                            //----------------------------------------
                            if (data[i].pos_status == 'Open'){
                                if(Date.parse(data[i].vac_deadline) < Date.parse(data[i].server_time)){
                                    var pos_status = '<span class="role admin">Closed</span>';
                                    var button = '<a data-toggle="modal" data-target=""><i class="fa fa-upload" aria-hidden="true"></i></a>';
                                }else{
                                    var pos_status = '<span class="role member">Open</span>';
                                    var button = '<a class="apply" data-toggle="modal" data-target="#staticModal" data-pos_id="'+data[i].pos_id+'"><i class="fa fa-upload" aria-hidden="true"></i></i></a>';
                                }
                            }
                            //----------------------------------------
                            //----------------------------------------
                            if (data[i].pos_ptc_position == '1'){
                                var pos_ptc_position = '<br><span style="font-color:red"><small>(Note: This position is under the <b>Provincial Training Center</b>)<small></span>';
                            }else{
                                var pos_ptc_position = ' ';
                            }
                            //----------------------------------------
                            html += '<tr>'+
                                        '<td>'+ x +'</td>'+
                                        '<td>'+ data[i].ous_desc.toUpperCase() + pos_ptc_position +'</td>'+
                                        '<td>'+ data[i].pos_desc.toUpperCase() +'</td>'+
                                        '<td>'+ data[i].pos_plantilla_no +'</td>'+
                                        '<td>'+ data[i].pos_sg +'</td>'+
                                        '<td>'+ data[i].vac_date_posted +'</td>'+
                                        '<td>'+ data[i].vac_deadline +'</td>'+
                                        '<td>'+ pos_status +'</td>'+
                                        '<td>'+
                                            '<div class="table-data-feature">'+
                                               ' <button class="item" data-toggle="tooltip" data-placement="top" title="View Standard Qualifications">'+
                                                   ' <a class="qualification" data-toggle="modal" data-target="#qualifications" data-pos_id="'+data[i].pos_id+'" data-pos_competency="'+data[i].pos_competency+'" data-pos_education="'+data[i].pos_education+'" data-pos_eligibility="'+data[i].pos_eligibility+'" data-pos_experience="'+data[i].pos_experience+'" data-pos_training="'+data[i].pos_training+'"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="Send Application">'+
                                                    button+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="No. of Applicants">'+
                                                    '<b><span id="getnoofapplicants" style="color:#01579b">'+ data[i].number_of_applicants +'</span></b>'+
                                                '</button>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';
                                    x=x+1;
                        }
                        $('#vacant_positions_open_landing').html(html);
                        $('#vacant_positions_open_landing_table').DataTable();
                    }
                    
                });
            }

            //get data for vacant position
            $('#vacant_positions_open_landing').on('click','.qualification',function(){
                var pos_id = $(this).data('pos_id');
                var training = $(this).data('pos_training');
                var education = $(this).data('pos_education');
                var experience = $(this).data('pos_experience');
                var eligibility = $(this).data('pos_eligibility');
                var competency = $(this).data('pos_competency');
                $('#pos_id').val(pos_id);
                $('#pos_training').val(training);
                $('#pos_education').val(education);
                $('#experience').val(experience);
                $('#eligibility').val(eligibility);
                $('#competency').val(competency);
            });

            //--------------Applicant Status-------
            $('#search_form_applicant').submit(function(e){
                e.preventDefault(); 

                    // show loading state
                    $('#search_btn').prop('disabled', true);
                    $('#search_icon').removeClass('fa-search').addClass('fa-spinner fa-spin');

                    $.ajax({
                        url: "<?php echo base_url().'search_form_applicant'?>",
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(data){
                            var json = $.parseJSON(data);
                            if(json.status == "False"){
                                $('#app_status').hide();
                                $('#app_status_false').fadeIn();
                            }else{
                                $('#lastname123').text(json.app_lastname);
                                $('#position').text(json.pos_desc);
                                if(json.eval_result == "Disqualified"){
                                    $('#result').text('failed');
                                    $('#paragraph4').hide();
                                }else if(json.eval_result == "Qualified"){
                                    $('#result').text('have met');
                                    $('#paragraph4').hide();
                                }else if(json.eval_result == null){
                                    $('#paragraph1').hide();
                                    $('#paragraph2').hide();
                                    $('#paragraph3').hide();
                                    $('#paragraph5').hide();
                                    $('#paragraphdiv').hide();
                                }
                                $('#app_status').fadeIn();
                            }
                        },
                        complete: function(){
                            // restore button regardless of success or failure
                            $('#search_btn').prop('disabled', false);
                            $('#search_icon').removeClass('fa-spinner fa-spin').addClass('fa-search');
                        }
                    });
                });
            //--------------Applicant Status-------

            //-----------------AJAX-------------------------------


        }); //-----------Last
        </script>

        <?php include("video.php");?>

        <script type="text/javascript">
            $(window).on('load', function() {
                $('#video').modal('show');
            });
        </script>

    </div>

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->