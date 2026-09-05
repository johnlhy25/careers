<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header Tab-->
    <?php include("include/header.php");?>

    <style>
        :root{
            --ink:#1C2B39;
            --paper:#FAF8F4;
            --brass:#A8762E;
            --brass-dark:#8C6224;
            --slate:#5B6B7A;
            --line:#D9D3C7;
            --success:#3F7A5C;
            --error:#B23A3A;
        }
        body{font-family:'Inter',-apple-system,sans-serif;color:var(--ink);background:var(--paper);}

        .header-desktop4{background:#fff;border-bottom:1px solid var(--line);padding:16px 0;}
        .header4-wrap{display:flex;align-items:center;}
        .header__logo img{height:44px;}

        .tesda-form2{
            max-width:720px;
            margin:40px auto;
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            overflow:hidden;
        }
        .tesda-form2 .card{border:none;border-radius:0;background:transparent;}
        .tesda-form2 .card-header{
            background:var(--ink);
            border:none;
            padding:28px 32px 22px;
        }
        .tesda-form2 .card-header strong{
            font-family:'Source Serif 4',Georgia,serif;
            color:#fff;
            font-size:24px;
            font-weight:600;
        }
        .tesda-form2 .card-body{padding:32px;}

        .tesda-form2 .notice{
            border-radius:4px;
            padding:14px 18px;
            font-size:14px;
            line-height:1.6;
            margin-bottom:24px;
            display:flex;
            align-items:flex-start;
            gap:10px;
        }
        .tesda-form2 .notice-warning{background:#FBF3E7;border:1px solid #EAD8B8;color:#5A4425;}
        .tesda-form2 .notice-danger{background:#FBEAEA;border:1px solid #F0C6C6;color:var(--error);}
        .tesda-form2 .notice-success{background:#EAF3EE;border:1px solid #C7E0D2;color:var(--success);}
        .tesda-form2 .notice i{margin-top:2px;flex-shrink:0;}
        .tesda-form2 .notice p{margin:0 0 8px;}
        .tesda-form2 .notice p:last-child{margin-bottom:0;}

        .tesda-form2 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form2 .referee-card{
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            padding:20px 22px;
            margin-bottom:16px;
        }
        .tesda-form2 .referee-card label{
            display:block;
            font-size:14px;
            font-weight:600;
            margin-bottom:14px;
            color:var(--ink);
        }
        .tesda-form2 .referee-card label .req{color:var(--error);margin-left:3px;}
        .tesda-form2 .referee-card input{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:10px 13px;
            font-size:14.5px;
            font-family:inherit;
            color:var(--ink);
            margin-bottom:8px;
            transition:border-color .15s ease;
        }
        .tesda-form2 .referee-card input:last-of-type{margin-bottom:0;}
        .tesda-form2 .referee-card input:focus{
            outline:none;border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form2 .referee-card input:disabled{background:var(--paper);color:var(--slate);}
        .tesda-form2 .note{
            display:block;
            font-size:12.5px;
            color:var(--slate);
            margin-top:8px;
        }

        .tesda-form2 button#btn_forme7{
            width:100%;
            background:var(--brass);
            border:none;
            color:#fff;
            font-weight:600;
            font-size:15px;
            padding:13px;
            border-radius:3px;
            cursor:pointer;
            transition:background .15s ease;
        }
        .tesda-form2 button#btn_forme7:hover{background:var(--brass-dark);}
        .tesda-form2 button#btn_forme7:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form2 button#btn_forme7 i{margin-right:8px;}

        .tesda-form2 .message .alert{
            border-radius:3px;padding:12px 16px;font-size:14px;margin-top:16px;
        }
        .tesda-form2 .alert-success{background:#EAF3EE;color:var(--success);border:1px solid #C7E0D2;}
        .tesda-form2 .alert-danger{background:#FBEAEA;color:var(--error);border:1px solid #F0C6C6;}

        .fa-spin{animation:fa-spin 0.9s linear infinite;}
        @keyframes fa-spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}

        .applicant-summary{
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            padding:6px 0;
            margin-bottom:24px;
        }
        .summary-row{
            display:flex;
            padding:12px 20px;
            border-bottom:1px solid var(--line);
            font-size:14px;
        }
        .summary-row:last-child{border-bottom:none;}
        .summary-label{
            flex:0 0 220px;
            font-weight:600;
            color:var(--slate);
        }
        .summary-value{flex:1;color:var(--ink);}
        @media(max-width:560px){
            .summary-row{flex-direction:column;gap:4px;}
            .summary-label{flex:none;}
        }

        .summary-header{
            display:flex;
            align-items:center;
            gap:10px;
            font-family:'Source Serif 4',Georgia,serif;
            font-size:15.5px;
            font-weight:600;
            color:var(--ink);
            background:var(--paper);
            padding:14px 20px;
            border-bottom:1px solid var(--line);
        }
        .summary-header i{color:var(--brass-dark);}

        .emphasis-callout{
            display:flex;
            align-items:flex-start;
            gap:10px;
            background:#fff;
            border:1px solid var(--brass);
            border-left:4px solid var(--brass);
            border-radius:4px;
            padding:12px 16px;
            margin-top:14px;
            font-size:13.5px;
            font-weight:600;
            color:var(--brass-dark);
            line-height:1.55;
        }
        .emphasis-callout i{margin-top:2px;flex-shrink:0;color:var(--brass);}
    </style>
</head>

<body class="animsition">

    <div class="page-wrapper">

        <!-- Header Tab-->
            <?php include("include/sticky.php");?>
        <!-- Header Tab-->

        <!-- PAGE CONTENT-->
                <div class="container">
                    <div class="tesda-form2">
                        <div class="card">
                            <div class="card-header">
                                <strong>References</strong>
                            </div>

                            <div id="forme7_card" class="card-body"><!---card-body-->

                            <!--- Your Saved Information--->
                                <?php
                                    // Format each referee's name/email/contact triplet for display, if present
                                    // Parses a single semicolon-separated "name;email;contact" string into a readable line
                                    function tesda_format_referee($raw) {
                                        if (empty($raw)) return '';

                                        $raw = trim($raw, ';');
                                        $parts = array_map('trim', explode(';', $raw));
                                        $parts = array_filter($parts, function($v){ return $v !== ''; });

                                        return implode(' · ', $parts);
                                    }

                                    $ref_supervisor = tesda_format_referee($applicant['app_supervisor'] ?? '');
                                    $ref_peer       = tesda_format_referee($applicant['app_peer'] ?? '');
                                    $ref_client     = tesda_format_referee($applicant['app_client'] ?? '');
                                    
                                    $fullname_parts = array_filter([
                                        $applicant['app_lastname']   ?? '',
                                        $applicant['app_firstname']  ?? '',
                                        $applicant['app_middlename'] ?? '',
                                        $applicant['app_suffix']     ?? '',
                                    ]);
                                ?>

                                <div class="applicant-summary">
                                    <div class="summary-header">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        Your Saved Information
                                    </div>
                                    
                                    <?php if (!empty($fullname_parts)): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Full Name</span>
                                            <span class="summary-value"><?= implode(' ', $fullname_parts) ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ref_supervisor): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Immediate Supervisor</span>
                                            <span class="summary-value"><?= $ref_supervisor ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ref_peer): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Peer</span>
                                            <span class="summary-value"><?= $ref_peer ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ref_client): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Client</span>
                                            <span class="summary-value"><?= $ref_client ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <!--- Your Saved Information--->

                                <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>
                                    <!---Reminder--->    
                                        <div class="notice notice-success" role="alert">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                            <div>
                                               <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                                <p>1. Immediate Supervisor: <?= $ref_supervisor ?></p>
                                                <p>2. Peer: <?= $ref_peer ?></p>
                                                <p>3. Client: <?= $ref_client ?></p>
                                                <div class="emphasis-callout">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <span>You are responsible for informing and obtaining consent from your references before providing their personal information here.<br><br> If there are no updates to the required fields, you may leave them blank.</span>
                                                </div>
                                            </div>
                                        </div>
                                    <!---Reminder--->
                                    
                                    <!---Form Here--->
                                        <form action="" method="POST" id="forme7_form" role="form"><!--Form-->
                                            <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                                            <!--Immediate Supervisor-->
                                            <div class="referee-card">
                                                <label>Immediate Supervisor<span class="req">*</span></label>
                                                <input type="text" id="immediate_supervisor" name="immediate_supervisor[]" placeholder="Juan B. Dela Cruz">
                                                <input type="email" id="immediate_supervisor_email" name="immediate_supervisor[]" placeholder="juanbdelacruz@gmail.com">
                                                <input type="text" id="immediate_supervisor_contact" name="immediate_supervisor[]" placeholder="09353456789" pattern="(09[0-9]{9}|\+639[0-9]{9})">
                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                            </div>
                                            <!--Immediate Supervisor-->

                                            <!--peer-->
                                            <div class="referee-card">
                                                <label>Peer<span class="req">*</span></label>
                                                <input type="text" id="peer" name="peer[]" placeholder="Juan B. Dela Cruz">
                                                <input type="email" id="peer_email" name="peer[]" placeholder="juanbdelacruz@gmail.com">
                                                <input type="text" id="peer_contact" name="peer[]" placeholder="09353456789" pattern="(09[0-9]{9}|\+639[0-9]{9})">
                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                            </div>
                                            <!--peer-->

                                            <!--Client-->
                                            <div class="referee-card">
                                                <label>Client<span class="req">*</span></label>
                                                <input type="text" id="client" name="client[]" placeholder="Juan B. Dela Cruz">
                                                <input type="email" id="client_email" name="client[]" placeholder="juanbdelacruz@gmail.com">
                                                <input type="text" id="client_contact" name="client[]" placeholder="09353456789" pattern="(09[0-9]{9}|\+639[0-9]{9})">
                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                            </div>
                                            <!--Client-->

                                            <hr class="divider">

                                            <?php if($applicant['app_lock'] != 1){ ?>
                                                <!--Iam not a robot-->
                                                <div class="section" style="margin-bottom:22px;">
                                                    <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                                                </div>
                                                <!--Iam not a robot-->

                                                <!--Submit-->
                                                    <button id="btn_forme7" name="forme7" type="submit">
                                                        <i class="fa fa-save" id="btn_forme7_icon"></i><span id="btn_forme7_label">Submit</span>
                                                    </button>
                                                    <div id="forme7_message" class="message"></div>
                                                <!--Submit-->
                                            <?php } else{?>
                                                <div class="emphasis-callout">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <span>Your application has been evaluated and is now locked.</span>
                                                </div>
                                            <?php }?>

                                        </form><!---End of Form-->
                                    <!---Form Here--->            
                                <?php }else { ?>
                                    <div class="notice notice-danger" role="alert">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        <span>The vacant position has been closed for applications.</span>
                                    </div>
                                <?php } ?>

                            </div><!---card-body-->
                        </div>
                    </div>
                </div>

                <!-- Footer Tab-->
                <?php include("include/footer.php");?>

                <!-- Privacy Notice Tab-->
                <?php include("include/privacy.php");?>

                <!-- script here -->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var applicant_id;

                            //-------FORM 7---------  
                            $('#forme7_form').submit(function(e){
                            e.preventDefault(); 

                                $('#btn_forme7').prop('disabled', true);
                                $('#btn_forme7_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                                $('#btn_forme7_label').text('Submitting...');

                                $.ajax({
                                    url: "<?php echo base_url().'save_forme7'?>",
                                    type: "post",
                                    data: new FormData(this),
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    async: false,
                                    success: function(data){
                                        var json = $.parseJSON(data);
                                        if(json.status == 'True'){
                                            html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Awards related to performance).</div>';
                                            html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Awards related to performance).</div>';

                                            $('#forme7_message').prepend(html2);
                                            $('#application_body_card').prepend(html);

                                            $("#performance_tab").removeClass("disabled");

                                            $(".message").delay(4000).slideUp(200, function() {
                                                $(this).alert('close');
                                            });

                                            $("#btn_forme7").hide();

                                            $("#immediate_supervisor").attr("disabled", true);
                                            $("#immediate_supervisor_email").attr("disabled", true);
                                            $("#immediate_supervisor_contact").attr("disabled", true);

                                            $("#peer").attr("disabled", true);
                                            $("#peer_email").attr("disabled", true);
                                            $("#peer_contact").attr("disabled", true);

                                            $("#client").attr("disabled", true);
                                            $("#client_email").attr("disabled", true);
                                            $("#client_contact").attr("disabled", true);

                                        }else{
                                            html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.message +'</b></div>';
                                            $('#forme7_card').prepend(html);
                                            $('#forme7_message').prepend(html);

                                            $('#btn_forme7').prop('disabled', false);
                                            $('#btn_forme7_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                            $('#btn_forme7_label').text('Submit');

                                            $(".message").delay(4000).slideUp(200, function() {
                                                $(this).alert('close');
                                            });
                                        }       
                                    }
                                });
                            });
                        });

                        $(window).on('load', function() {
                            $('#sitePrivacyModal').modal('show');
                        });
                        //-------FORM 7---------  
                    </script>
                <!-- script here -->

    </div> <!-- END PAGE WRAPPER  -->

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->