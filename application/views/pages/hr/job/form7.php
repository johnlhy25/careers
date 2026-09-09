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

        .tesda-accordion{
            background:#fff;
            border-radius:4px;
            overflow:hidden;
            margin-left:20px;
            margin-right:20px;
        }

        .accordion-item{border-bottom:1px solid var(--line);}
        .accordion-item:last-child{border-bottom:none;}

        .accordion-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:16px 20px;
            font-size:14.5px;
            font-weight:600;
            color:var(--ink);
            cursor:pointer;
            background:var(--paper);
            transition:background .15s ease;
        }
        .accordion-header:hover{background:var(--paper);}

        .accordion-icon{
            color:var(--brass-dark);
            font-size:13px;
            transition:transform .2s ease;
        }
        .accordion-item.open .accordion-icon{transform:rotate(180deg);}

        .accordion-body{
            display:grid;
            grid-template-rows:0fr;
            transition:grid-template-rows .25s ease;
        }
        .accordion-body-inner{
            overflow:hidden;
            min-height:0;
        }
        .accordion-item.open .accordion-body{
            grid-template-rows:1fr;
        }
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

                                    // Helper: clean a semicolon-separated string into a comma-separated one, or return empty if nothing valid
                                    function tesda_format_list($value) {
                                        if (empty($value)) return '';
                                        $parts = array_filter(array_map('trim', explode(';', $value)), function($v){ return $v !== ''; });
                                        return implode(', ', $parts);
                                    }
                                    
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

                            <!--- Evaluation Result--->
                                    <?php if (!empty($evaluation['app_result'])): ?>
                                        <div class="applicant-summary">
                                            <div class="summary-header">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Evaluation Result
                                            </div>

                                            <?php if (!empty($evaluation['app_result'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Initial Result</span>
                                                <span class="summary-value">
                                                    <strong><?= $evaluation['app_result'] ?></strong>
                                                    <small>Subject to final review and deliberation by the HRMPSB.</small>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                            <!--Evaluation Summary-->
                                            <?php if (!empty($evaluation['eval_remarks'])): ?>
                                            <div class="summary-row" style="background:var(--paper)">
                                                <span class="summary-label"><b>REMARKS ON CSC QUALIFICATION STANDARDS</b></span>
                                                <span class="summary-value">
                                                    <b><?=  tesda_format_list(strtoupper($evaluation['eval_remarks'])) ?></b>
                                                </span>
                                            </div>
                                            <?php endif; ?>
  
                                            <?php if (!empty($evaluation['eval_remarks1'])): ?>
                                            <div class="summary-row" style="background:var(--paper)">
                                                <span class="summary-label"><b>REMARKS ON UPLOADED DOCUMENTS</b></span>
                                                <span class="summary-value">
                                                    <b><?= tesda_format_list(strtoupper($evaluation['eval_remarks1'])) ?></b>
                                                </span>
                                            </div>
                                            <?php endif; ?>
                                            <!--Evaluation Summary-->

                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($applicant['app_reevaluation']) && $applicant['app_reevaluation'] == 1): ?>
                                        <div class="notice notice-success reeval-sent" role="alert">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            <div>
                                                <p><strong>Request Sent.</strong> Your request for re-evaluation has been submitted successfully.</p>
                                                <p class="reeval-sub">The HRMPSB will review your request and notify you once a decision has been made.</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                <!--- Evaluation Result--->

                                <?php if($applicant['vac_deadline'] >= date('Y-m-d')){ ?>
                                    
                                    <div class="tesda-accordion">
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                <span>Click to Continue Application</span>
                                                <i class="fa fa-chevron-down accordion-icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="accordion-body">
                                                <div class="accordion-body-inner">
                                                    <!--Content Here-->
                                                    
                                                        <br>

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

                                                    <!--Content Here-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
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
                                            html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ json.message +'</div>';
                                            
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

                                            // Refresh the page after a short delay so the success message is visible first
                                            setTimeout(function(){
                                                location.reload();
                                            }, 10000);

                                        }else{
                                            html = '<div class="alert alert-danger mt-2 message"><i class="fa fa-times" aria-hidden="true"></i> '+ json.message +'</div>';
                                            
                                            $('#btn_forme7').prop('disabled', false);
                                            $('#btn_forme7_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                            $('#btn_forme7_label').text('Submit');

                                           
                                        }

                                        var $newMessage = $(html).prependTo('#forme7_message');

                                        // Apply the auto-hide to THIS specific element, not a blanket ".message" selector
                                        $newMessage.delay(5000).slideUp(200, function(){
                                            $(this).remove();
                                        });

                                    }
                                });
                            });
                        });

                        $(window).on('load', function() {
                            $('#sitePrivacyModal').modal('show');
                        });

                        $('.accordion-header').click(function(){
                            var $item = $(this).closest('.accordion-item');
                            var isOpen = $item.hasClass('open');

                            // Close all other items (remove this block if you want multiple open at once)
                            $('.accordion-item').removeClass('open');

                            if (!isOpen) {
                                $item.addClass('open');
                            }
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