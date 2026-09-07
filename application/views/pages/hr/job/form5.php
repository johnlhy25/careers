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
            padding:26px 32px;
            font-family:'Source Serif 4',Georgia,serif;
            color:#fff;
            font-size:16px;
            line-height:1.6;
            font-weight:600;
        }
        .tesda-form2 .card-header strong{color:var(--brass);font-weight:700;}
        .tesda-form2 .card-body{padding:32px;}

        .tesda-form2 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form2 .act-question{
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            padding:20px 22px;
            margin-bottom:16px;
        }
        .tesda-form2 .act-question label{
            display:block;
            font-size:14.5px;
            font-weight:600;
            color:var(--ink);
            margin-bottom:14px;
            line-height:1.55;
        }
        .tesda-form2 .act-question label b{color:var(--brass-dark);font-weight:600;}

        .tesda-form2 .yesno-toggle{display:flex;gap:8px;margin-bottom:0;}
        .tesda-form2 .yesno-toggle input{position:absolute;opacity:0;pointer-events:none;}
        .tesda-form2 .yesno-toggle .yn-label{
            border:1px solid var(--line);
            background:var(--paper);
            border-radius:20px;
            padding:8px 20px;
            font-size:13.5px;
            font-weight:600;
            cursor:pointer;
            transition:.15s ease;
        }
        .tesda-form2 .yesno-toggle input:checked + .yn-label{background:var(--ink);border-color:var(--ink);color:#fff;}
        .tesda-form2 .yesno-toggle input[value="Yes"]:checked + .yn-label{background:var(--brass);border-color:var(--brass);}

        .tesda-form2 .others-reveal{
            margin-top:14px;
            max-height:0;
            overflow:hidden;
            opacity:0;
            transition:max-height .25s ease, opacity .2s ease, margin-top .25s ease;
        }
        .tesda-form2 .others-reveal.open{max-height:100px;opacity:1;}
        .tesda-form2 .others-reveal input[type=text]{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:10px 13px;
            font-size:14.5px;
            font-family:inherit;
            color:var(--ink);
            transition:border-color .15s ease;
        }
        .tesda-form2 .others-reveal input[type=text]:focus{
            outline:none;border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form2 .others-reveal input:disabled{background:var(--paper);color:var(--slate);}

        .tesda-form2 button#btn_forme5{
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
        .tesda-form2 button#btn_forme5:hover{background:var(--brass-dark);}
        .tesda-form2 button#btn_forme5:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form2 button#btn_forme5 i{margin-right:8px;}

        .tesda-form2 .message .alert{
            border-radius:3px;padding:12px 16px;font-size:14px;margin-top:16px;
        }
        .tesda-form2 .alert-success{background:#EAF3EE;color:var(--success);border:1px solid #C7E0D2;}
        .tesda-form2 .alert-danger{background:#FBEAEA;color:var(--error);border:1px solid #F0C6C6;}

        .fa-spin{animation:fa-spin 0.9s linear infinite;}
        @keyframes fa-spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}

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
        .tesda-form2 .notice ul, .tesda-form2 .notice p{margin:0 0 8px;}
        .tesda-form2 .notice p:last-child{margin-bottom:0;}

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
        .summary-value{
            flex:1;
            color:var(--ink);
        }
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

        <!-- PAGE CONTENT-->
                <div class="container">
                    <div class="tesda-form2">
                        <div class="card">
                            <div class="card-header">
                                <strong>Pursuant to:</strong> (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act 2000 (RA 8972), please answer the following items
                            </div>

                            <div id="forme5_card" class="card-body"><!---card-body-->

                                <!--- Your Saved Information--->
                                    <?php
                                        // Helper: clean a semicolon-separated string into a comma-separated one, or return empty if nothing valid
                                        function tesda_format_list($value) {
                                            if (empty($value)) return '';
                                            $parts = array_filter(array_map('trim', explode(';', $value)), function($v){ return $v !== ''; });
                                            return implode(', ', $parts);
                                        }

                                        $fullname_parts = array_filter([
                                            $applicant['app_lastname']   ?? '',
                                            $applicant['app_firstname']  ?? '',
                                            $applicant['app_middlename'] ?? '',
                                            $applicant['app_suffix']     ?? '',
                                        ]);

                                        $app_ra8371 = tesda_format_list($applicant['app_ra8371'] ?? '');
                                        $app_ra7277 = tesda_format_list($applicant['app_ra7277'] ?? '');
                                        $app_ra8972 = tesda_format_list($applicant['app_ra8972'] ?? '')
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

                                        <?php if (!empty($applicant['app_ra8371'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">A member of any indigenous?</span>
                                                <span class="summary-value"><?= $app_ra8371 ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($applicant['app_ra7277'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">A person with disability?</span>
                                                <span class="summary-value"><?= $app_ra7277 ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($applicant['app_ra8972'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">A solo parent?</span>
                                                <span class="summary-value"><?=  $app_ra8972 ?></span>
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
                                                <span class="summary-label">Result</span>
                                                <span class="summary-value">
                                                    <strong><?= $evaluation['app_result'] ?></strong>
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

                                

                                <?php if($applicant['vac_deadline'] <= date('Y-m-d')){ ?>

                                    <div class="tesda-accordion">
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                <span>Click to Continue Application</span>
                                                <i class="fa fa-chevron-down accordion-icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="accordion-body">
                                                <div class="accordion-body-inner">

                                                    <br>
                                                    
                                                    <!--Content Here-->
                                                        <!---Reminder--->
                                                            <div class="notice notice-success" role="alert">
                                                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                                <div>
                                                                    <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                                                    <p>1. A member of any indigenous?: <?= $app_ra8371 ?></p>
                                                                    <p>2. A person with disability?: <?= $app_ra7277 ?></p>
                                                                    <p>2. A solo parent?: <?= $app_ra8972 ?></p>
                                                                    <div class="emphasis-callout">
                                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                        <span>If there are no updates to the required fields, you may leave them blank.</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!---Reminder--->  
                                                    
                                                        <!---Form Here--->
                                                            <form action="" method="POST" id="forme5_form" role="form"><!--Form-->
                                                                <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                                                                <!---RA8371-->
                                                                <div class="act-question">
                                                                    <label>Are you a member of any indigenous group? <b>(if yes, please specify in the others)</b></label>
                                                                    <div class="yesno-toggle">
                                                                        <input type="radio" id="ra8371_yes" name="ra8371[]" value="Yes"><label class="yn-label" for="ra8371_yes">Yes</label>
                                                                        <input type="radio" id="ra8371_no" name="ra8371[]" value="No"><label class="yn-label" for="ra8371_no">No</label>
                                                                    </div>
                                                                    <div class="others-reveal" id="ra8371_reveal">
                                                                        <input type="text" id="ra8371_others" name="ra8371[]" placeholder="Please specify" disabled>
                                                                    </div>
                                                                </div>
                                                                <!---RA8371-->

                                                                <!---RA7277-->
                                                                <div class="act-question">
                                                                    <label>Are you a person with disability? <b>(if yes, please specify ID number in others)</b></label>
                                                                    <div class="yesno-toggle">
                                                                        <input type="radio" id="ra727_yes" name="ra727[]" value="Yes"><label class="yn-label" for="ra727_yes">Yes</label>
                                                                        <input type="radio" id="ra727_no" name="ra727[]" value="No"><label class="yn-label" for="ra727_no">No</label>
                                                                    </div>
                                                                    <div class="others-reveal" id="ra727_reveal">
                                                                        <input type="text" id="ra727_others" name="ra727[]" placeholder="Please specify ID number" disabled>
                                                                    </div>
                                                                </div>
                                                                <!---RA7277-->

                                                                <!---RA8972-->
                                                                <div class="act-question">
                                                                    <label>Are you a solo parent? <b>(if yes, please specify ID number in others)</b></label>
                                                                    <div class="yesno-toggle">
                                                                        <input type="radio" id="ra8972_yes" name="ra8972[]" value="Yes"><label class="yn-label" for="ra8972_yes">Yes</label>
                                                                        <input type="radio" id="ra8972_no" name="ra8972[]" value="No"><label class="yn-label" for="ra8972_no">No</label>
                                                                    </div>
                                                                    <div class="others-reveal" id="ra8972_reveal">
                                                                        <input type="text" id="ra8972_others" name="ra8972[]" placeholder="Please specify ID number" disabled>
                                                                    </div>
                                                                </div>
                                                                <!---RA8972-->

                                                                <hr class="divider">

                                                                <?php if($applicant['app_lock'] != 1){ ?>

                                                                    <!-- I am not a robot -->
                                                                    <div class="field" style="margin-bottom:22px;">
                                                                        <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                                                                    </div>
                                                                    <!-- I am not a robot -->

                                                                    <button id="btn_forme5" name="forme5" type="submit">
                                                                        <i class="fa fa-save" id="btn_forme5_icon"></i><span id="btn_forme5_label">Submit</span>
                                                                    </button>
                                                                <?php } else{?>

                                                                    <div class="emphasis-callout">
                                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                        <span>Your application has been evaluated and is now locked.</span>
                                                                    </div>
                                                                    
                                                                <?php }?>    
                                                                <div id="forme5_message" class="message"></div>    
                                                            
                                                                <!--Submit-->

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

                                //-------FORM 5---------  
                                $('#forme5_form').submit(function(e){
                                e.preventDefault(); 

                                    $('#btn_forme5').prop('disabled', true);
                                    $('#btn_forme5_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                                    $('#btn_forme5_label').text('Submitting...');

                                    $.ajax({
                                        url: "<?php echo base_url().'save_forme5'?>",
                                        type: "post",
                                        data: new FormData(this),
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        async: false,
                                        success: function(data){
                                            var json = $.parseJSON(data);
                                            if(json.status == 'True'){
                                                html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ json.message+'</div>';
                                            
                                                $("#btn_forme5").hide();

                                                $("#ra8371_yes").attr("disabled", true);
                                                $("#ra8371_no").attr("disabled", true);
                                                $("#ra8371_others").attr("disabled", true);

                                                $("#ra727_yes").attr("disabled", true);
                                                $("#ra727_no").attr("disabled", true);
                                                $("#ra727_others").attr("disabled", true);

                                                $("#ra8972_yes").attr("disabled", true);
                                                $("#ra8972_no").attr("disabled", true);
                                                $("#ra8972_others").attr("disabled", true);

                                                // Refresh the page after a short delay so the success message is visible first
                                                setTimeout(function(){
                                                    location.reload();
                                                }, 10000);

                                            }else{
                                                html = '<div class="alert alert-danger mt-2 message"> <i class="fa fa-times" aria-hidden="true"></i> '+ json.message +'</div>';
             
                                                $('#btn_forme5').prop('disabled', false);
                                                $('#btn_forme5_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                                $('#btn_forme5_label').text('Submit');

                                            } 
                                            
                                            var $newMessage = $(html).prependTo('#forme5_message');

                                            // Apply the auto-hide to THIS specific element, not a blanket ".message" selector
                                            $newMessage.delay(5000).slideUp(200, function(){
                                                $(this).remove();
                                            });
                                        }
                                    });
                                });

                                //-------RA8371-------
                                $("#ra8371_yes").click(function () {
                                    if ($("#ra8371_yes").is(":checked")) {
                                        $("#ra8371_others").removeAttr("disabled");
                                        $("#ra8371_others").attr("required", true);
                                        $("#ra8371_reveal").addClass("open");
                                    }
                                });

                                $("#ra8371_no").click(function () {
                                    if ($("#ra8371_no").is(":checked")) {
                                        $("#ra8371_others").attr("disabled", true);
                                        $("#ra8371_others").removeAttr("required");
                                        $("#ra8371_others").val("");
                                        $("#ra8371_reveal").removeClass("open");
                                    }
                                });
                                //-------RA8371-------

                                //-------RA727-------
                                $("#ra727_yes").click(function () {
                                    if ($("#ra727_yes").is(":checked")) {
                                        $("#ra727_others").removeAttr("disabled");
                                        $("#ra727_others").attr("required", true);
                                        $("#ra727_reveal").addClass("open");
                                    }
                                });

                                $("#ra727_no").click(function () {
                                    if ($("#ra727_no").is(":checked")) {
                                        $("#ra727_others").attr("disabled", true);
                                        $("#ra727_others").removeAttr("required");
                                        $("#ra727_others").val("");
                                        $("#ra727_reveal").removeClass("open");
                                    }
                                });
                                //-------RA727-------

                                //-------RA8972-------
                                $("#ra8972_yes").click(function () {
                                    if ($("#ra8972_yes").is(":checked")) {
                                        $("#ra8972_others").removeAttr("disabled");
                                        $("#ra8972_others").attr("required", true);
                                        $("#ra8972_reveal").addClass("open");
                                    }
                                });

                                $("#ra8972_no").click(function () {
                                    if ($("#ra8972_no").is(":checked")) {
                                        $("#ra8972_others").attr("disabled", true);
                                        $("#ra8972_others").removeAttr("required");
                                        $("#ra8972_others").val("");
                                        $("#ra8972_reveal").removeClass("open");
                                    }
                                });
                                //-------RA8972-------

                            });
                            //-------FORM 5--------- 
                            
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

                    </script>
                <!-- script here -->

        <!-- END PAGE CONTENT  -->

    </div> <!-- END PAGE WRAPPER  -->

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->