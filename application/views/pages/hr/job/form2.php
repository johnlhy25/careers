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
        .tesda-form2 .notice ul, .tesda-form2 .notice p{margin:0 0 8px;}
        .tesda-form2 .notice p:last-child{margin-bottom:0;}

        .tesda-form2 .section{margin-bottom:28px;}
        .tesda-form2 .section-label{
            display:flex;
            align-items:center;
            justify-content:space-between;
            font-size:14px;
            font-weight:600;
            color:var(--ink);
            margin-bottom:10px;
        }
        .tesda-form2 .section-label .btn-add{
            background:var(--brass);
            border:none;
            color:#fff;
            font-size:12.5px;
            font-weight:600;
            padding:6px 14px;
            border-radius:20px;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            gap:6px;
            transition:background .15s ease;
            text-decoration:none;
        }
        .tesda-form2 .section-label .btn-add:hover{background:var(--brass-dark);color:#fff;}

        .tesda-form2 input[type=text]{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:11px 13px;
            font-size:15px;
            font-family:inherit;
            color:var(--ink);
            margin-bottom:8px;
            transition:border-color .15s ease;
        }
        .tesda-form2 input[type=text]:focus{
            outline:none;
            border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form2 .note{
            display:block;
            font-size:12.5px;
            color:var(--slate);
            margin-bottom:4px;
        }

        .tesda-form2 .file-drop-area{
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            width:100%;
            height:90px;
            border:2px dashed var(--line);
            border-radius:4px;
            background:var(--paper);
            margin-bottom:8px;
            transition:.2s ease;
            text-align:center;
        }
        .tesda-form2 .file-drop-area:hover{border-color:var(--brass);background:#fff;}
        .tesda-form2 .file-drop-area.active{border-color:var(--success);background:#EAF3EE;}
        .tesda-form2 .fake-btn{
            font-size:14px;font-weight:600;color:var(--brass-dark);
        }
        .tesda-form2 .file-msg{font-size:13px;color:var(--slate);}
        .tesda-form2 .file-input{
            position:absolute;width:100%;height:100%;top:0;left:0;opacity:0;cursor:pointer;
        }

        .tesda-form2 .checkbox-group{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:14px;}
        .tesda-form2 .checkbox-group .chk-item{position:relative;}
        .tesda-form2 .checkbox-group input[type=checkbox]{position:absolute;opacity:0;pointer-events:none;}
        .tesda-form2 .checkbox-group .chk-label{
            border:1px solid var(--line);
            background:#fff;
            border-radius:20px;
            padding:8px 16px;
            font-size:13.5px;
            cursor:pointer;
            transition:.15s ease;
            display:inline-flex;
            align-items:center;
            gap:6px;
        }
        .tesda-form2 .checkbox-group .chk-label::before{
            content:"";width:13px;height:13px;
            border:1.5px solid var(--line);border-radius:3px;
            display:inline-block;flex-shrink:0;
        }
        .tesda-form2 .checkbox-group input:checked + .chk-label{background:var(--ink);border-color:var(--ink);color:#fff;}
        .tesda-form2 .checkbox-group input:checked + .chk-label::before{background:var(--brass);border-color:var(--brass);}
        .tesda-form2 .checkbox-group input:disabled + .chk-label{opacity:.55;cursor:not-allowed;}
        .tesda-form2 .others-input{
            width:180px !important;
            padding:8px 14px !important;
            border-radius:20px !important;
            font-size:13.5px !important;
            margin-bottom:0 !important;
        }

        .tesda-form2 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form2 button#btn_forme2{
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
        .tesda-form2 button#btn_forme2:hover{background:var(--brass-dark);}
        .tesda-form2 button#btn_forme2:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form2 button#btn_forme2 i{margin-right:8px;}

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

        .btn-view-file{
            display:inline-flex;
            align-items:center;
            gap:6px;
            margin-left:12px;
            background:var(--paper);
            border:1px solid var(--line);
            color:var(--brass-dark);
            font-size:12.5px;
            font-weight:600;
            padding:5px 12px;
            border-radius:20px;
            text-decoration:none;
            transition:.15s ease;
        }
        .btn-view-file:hover{
            background:var(--ink);
            border-color:var(--ink);
            color:#fff;
            text-decoration:none;
        }
        @media(max-width:560px){
            .btn-view-file{display:block;margin:8px 0 0;width:fit-content;}
        }

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

        .reeval-sent{align-items:flex-start;}
        .reeval-sub{
            font-size:13px;
            color:var(--slate);
            margin-top:4px !important;
            line-height:1.6;
        }

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
                                <strong>Educational Background and Eligibility Information</strong>
                            </div>

                            <div id="forme2_card" class="card-body"><!---card-body-->
                                
                                <!--- Your Saved Information--->
                                    <?php
                                        // Helper: clean a semicolon-separated string into a comma-separated one, or return empty if nothing valid
                                        function tesda_format_list($value) {
                                            if (empty($value)) return '';
                                            $parts = array_filter(array_map('trim', explode(';', $value)), function($v){ return $v !== ''; });
                                            return implode(', ', $parts);
                                        }

                                        // Helper: map eligibility codes to their full labels, passing through anything not in the map (e.g. free-text "Others" entries)
                                        function tesda_format_eligibility($value) {
                                            if (empty($value)) return '';

                                            $labels = [
                                                'cese'   => 'Career Executive Service Eligibility',
                                                'csp'    => 'Career Service Professional',
                                                'cssp'   => 'Career Service Sub Professional',
                                                'ra1080' => 'R.A. 1080',
                                                'pd907'  => 'PD 907',
                                                'mc11'   => 'MC 11 series of 1996',
                                            ];

                                            $parts = array_filter(array_map('trim', explode(';', $value)), function($v){ return $v !== ''; });

                                            $mapped = array_map(function($code) use ($labels){
                                                return $labels[strtolower($code)] ?? $code; // fall back to raw value for "Others" free-text entries
                                            }, $parts);

                                            return implode(', ', $mapped);
                                        }

                                        $fullname_parts = array_filter([
                                            $applicant['app_lastname']   ?? '',
                                            $applicant['app_firstname']  ?? '',
                                            $applicant['app_middlename'] ?? '',
                                            $applicant['app_suffix']     ?? '',
                                        ]);

                                        $eligibility_display = tesda_format_eligibility($applicant['app_eligibility'] ?? '');
                                        $nc_display          = tesda_format_list($applicant['app_nc'] ?? '');
                                        $nttc_display        = tesda_format_list($applicant['app_nttc'] ?? '');
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

                                        <?php if (!empty($eligibility_display)): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Eligibility</span>
                                                <span class="summary-value">
                                                    <?= $eligibility_display ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($nc_display)): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">National Certificate</span>
                                                <span class="summary-value">
                                                    <?= $nc_display ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($nttc_display)): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">National TVET Trainers Certificate</span>
                                                <span class="summary-value">
                                                    <?= $nttc_display ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        
                                    </div>
                                <!--- Your Saved Information--->
                                
                                <!--- Your Saved Documents--->
                                    <?php
                                        // Map document type => [DB column, display label]
                                        $documents = [
                                            'intent'      => ['app_intent_file',       'Intent Letter'],
                                            'educational' => ['app_educational_doc',   'Educational Documents'],
                                            'eligibility' => ['app_eligibility_doc',  'Eligibility'],
                                            'nc'          => ['app_nc_doc',           'National Certificate'],
                                            'nttc'        => ['app_nttc_doc',         'National TVET Trainers Certificate']
                                        ];

                                        // Only keep entries that actually have a file
                                        $attached_documents = array_filter($documents, function($doc) use ($applicant) {
                                            return !empty($applicant[$doc[0]]);
                                        });
                                    ?>

                                    <?php if (!empty($attached_documents)): ?>
                                        <div class="applicant-summary">
                                            <div class="summary-header">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                Your Saved Documents
                                            </div>

                                            <?php foreach ($attached_documents as $type => $doc): ?>
                                                <div class="summary-row">
                                                    <span class="summary-label"><?= $doc[1] ?></span>
                                                    <span class="summary-value">
                                                        <a href="<?= base_url() . 'view-document/' . $type . '/' . $hash ?>" target="_blank" class="btn-view-file">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View File
                                                        </a>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <!--- Your Saved Documents--->

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

                                            <?php if (!empty($evaluation['eval_chklist2'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Educational</span>
                                                <span class="summary-value">
                                                    <?= $evaluation['eval_chklist2'] ?>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                             <?php if (!empty($evaluation['eval_chklist3'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Eligibility</span>
                                                <span class="summary-value">
                                                    <?= $evaluation['eval_chklist3'] ?>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                            <?php if (!empty($evaluation['eval_chklist13'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">National Certificate (NC)</span>
                                                <span class="summary-value">
                                                    <?= $evaluation['eval_chklist13'] ?>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                            <?php if (!empty($evaluation['eval_chklist14'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">National TVET Trainers Certificate (NTTC)</span>
                                                <span class="summary-value">
                                                    <?= $evaluation['eval_chklist14'] ?>
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

                                                        <?php if ($this->session->flashdata('success')): ?>
                                                        <?php endif; ?>  

                                                        <!---Reminder--->
                                                            <?php
                                                                //--------------Eligibility
                                                                $applicant['app_eligibility'] = trim($applicant['app_eligibility'], ';');

                                                                // Replace eligibility codes with their full names
                                                                $applicant['app_eligibility'] = str_replace(
                                                                    ['cese', 'csp', 'cssp', 'ra1080', 'pd907', 'mc11'],
                                                                    ['Career Executive Service Eligibility', 'Career Service Professional', 'Career Service Sub Professional', 'R.A. 1080', 'PD 907', 'MC 11 series of 1996'],
                                                                    $applicant['app_eligibility']
                                                                );

                                                                // Replace remaining semicolons with commas
                                                                $applicant['app_eligibility'] = str_replace(';', ', ', $applicant['app_eligibility']);
                                                                //--------------Eligibility

                                                                //--------------National Certificate
                                                                $applicant['app_nc'] = trim($applicant['app_nc'], ';');
                                                                $applicant['app_nc'] = str_replace(';', ', ', $applicant['app_nc']);
                                                                //--------------National Certificate

                                                                //--------------NTTC
                                                                $applicant['app_nttc'] = trim($applicant['app_nttc'], ';');
                                                                $applicant['app_nttc'] = str_replace(';', ', ', $applicant['app_nttc']);
                                                                //--------------NTTC
                                                            ?>
                                                            <div class="notice notice-warning" role="alert">
                                                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                                <span>Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.</span>
                                                            </div>

                                                            <div class="notice notice-success" role="alert">
                                                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                                <div>
                                                                    <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                                                    <p>1. Eligibility: <?= $applicant['app_eligibility'] ?></p>
                                                                    <p>2. National Certificate: <?= $applicant['app_nc'] ?></p>
                                                                    <p>3. National TVET Trainers Certificate: <?= $applicant['app_nttc'] ?></p>
                                                                    <div class="emphasis-callout">
                                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                        <span>Please upload the required documents for this form. If there are no updates to the required fields or documents, you may leave them blank.</span>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        <!---Reminder---> 

                                                        <!---Form Here--->
                                                            <form action="" method="POST" id="forme2_form" role="form"><!--Form-->
                                                                <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                                                                <!--educational-->
                                                                <div class="section">
                                                                    <div class="section-label">Educational</div>
                                                                    <div class="file-drop-area" id="education-drop-area">
                                                                        <span class="fake-btn">Choose File</span>
                                                                        <span class="file-msg">or drag and drop an education file here</span>
                                                                        <input type="file" id="education_file" name="education_file" class="file-input" accept="application/pdf">
                                                                    </div>
                                                                    <span class="note">Please upload PDF file only. (Authenticated Photocopy of Transcript of Record, Diploma, Certificate of Grade etc.)</span>
                                                                </div>
                                                                <!--educational-->

                                                                <hr class="divider">

                                                                <!--Eligibility/ies-->
                                                                <div class="section">
                                                                    <div class="section-label">Eligibility</div>
                                                                    <div class="checkbox-group">
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="cese" name="eligibility[]" value="cese"><label class="chk-label" for="cese">Career Executive Service Eligibility</label>
                                                                        </div>
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="csp" name="eligibility[]" value="csp"><label class="chk-label" for="csp">Career Service Professional</label>
                                                                        </div>
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="cssp" name="eligibility[]" value="cssp"><label class="chk-label" for="cssp">Career Service Sub Professional</label>
                                                                        </div>
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="ra1080" name="eligibility[]" value="ra1080"><label class="chk-label" for="ra1080">R.A. 1080</label>
                                                                        </div>
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="pd907" name="eligibility[]" value="pd907"><label class="chk-label" for="pd907">PD 907</label>
                                                                        </div>
                                                                        <div class="chk-item">
                                                                            <input type="checkbox" id="mc11" name="eligibility[]" value="mc11"><label class="chk-label" for="mc11">MC 11 series of 1996</label>
                                                                        </div>
                                                                        <input type="text" id="others" name="eligibility[]" placeholder="Others" class="others-input">
                                                                    </div>

                                                                    <div class="file-drop-area" id="eligibility-drop-area">
                                                                        <span class="fake-btn">Choose File</span>
                                                                        <span class="file-msg">or drag and drop an eligibility file here</span>
                                                                        <input type="file" id="eligibility_file" name="eligibility_file" class="file-input" accept="application/pdf">
                                                                    </div>
                                                                    <span class="note">Please upload PDF file only. (Authenticated by CSC/PRC)</span>
                                                                </div>
                                                                <!--Eligibility/ies-->

                                                                <hr class="divider">

                                                                <!--National Certificate-->
                                                                <div class="section">
                                                                    <div class="section-label">
                                                                        National Certificate
                                                                        <a id="btn_add_buttonnc" class="btn-add add_buttonnc">
                                                                            <i class="fa fa-plus"></i> Add
                                                                        </a>
                                                                    </div>
                                                                    <div class="field_wrappernc">
                                                                        <input type="text" id="nc" name="nc[]" placeholder="Computer System Servicing NC II">
                                                                        <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                                                    </div>

                                                                    <div class="file-drop-area" id="national-certificate-drop-area">
                                                                        <span class="fake-btn">Choose File</span>
                                                                        <span class="file-msg">or drag and drop a national certificate here</span>
                                                                        <input type="file" id="national_certificate_file" name="national_certificate_file" class="file-input" accept="application/pdf">
                                                                    </div>
                                                                    <span class="note">Please upload PDF file only. (Computer System Servicing NC II, Web Development NC III etc.)</span>
                                                                </div>
                                                                <!--National Certificate-->

                                                                <hr class="divider">

                                                                <!--National TVET Trainers Certificate-->
                                                                <div class="section">
                                                                    <div class="section-label">
                                                                        National TVET Trainers Certificate
                                                                        <a id="btn_add_button" class="btn-add add_button">
                                                                            <i class="fa fa-plus"></i> Add
                                                                        </a>
                                                                    </div>
                                                                    <div class="field_wrapper">
                                                                        <input type="text" id="nttc" name="nttc[]" placeholder="Computer System Servicing NC II">
                                                                        <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                                                    </div>

                                                                    <div class="file-drop-area" id="nttc-drop-area">
                                                                        <span class="fake-btn">Choose File</span>
                                                                        <span class="file-msg">or drag and drop an NTTC file here</span>
                                                                        <input type="file" id="nttc_file" name="nttc_file" class="file-input" accept="application/pdf">
                                                                    </div>
                                                                    <span class="note">Please upload PDF file only. (Computer System Servicing NC II, Web Development NC III etc.)</span>
                                                                </div>
                                                                <!--National TVET Trainers Certificate-->

                                                                <hr class="divider">

                                                                <?php if($applicant['app_lock'] != 1){ ?>
                                                                    <!--Iam not a robot-->
                                                                    <div class="section">
                                                                        <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                                                                    </div>
                                                                    <!--Iam not a robot-->

                                                                    <!--Submit-->
                                                                    <button id="btn_forme2" name="forme2" type="submit">
                                                                        <i class="fa fa-save" id="btn_forme2_icon"></i><span id="btn_forme2_label">Submit</span>
                                                                    </button>
                                                                <?php } else{?>
                                                                    <div class="emphasis-callout">
                                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                        <span>Your application has been evaluated and is now locked.</span>
                                                                    </div>
                                                                <?php }?>
                                                                <div id="forme2_message" class="message"></div>
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

                            //-------FORM 2---------  
                            $('#forme2_form').submit(function(e){
                            e.preventDefault(); 

                                $('#btn_forme2').prop('disabled', true);
                                $('#btn_forme2_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                                $('#btn_forme2_label').text('Submitting...');

                                $.ajax({
                                    url: "<?php echo base_url().'save_forme2'?>",
                                    type: "post",
                                    data: new FormData(this),
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    async: false,
                                    success: function(data){
                                        var json = $.parseJSON(data);
                                        if(json.status == 'True'){
                                            //Show Reference No.
                                            html =  '<div class="alert alert-success mt-2 message"><p><i class="fa fa-check-circle" aria-hidden="true"></i> '+ json.message +'</p></div>';
                                            
                                            //HIDE button
                                            $("#btn_forme2").hide();

                                            //disabled inputs
                                            $("#cese").attr("disabled", true);
                                            $("#csp").attr("disabled", true);
                                            $("#cssp").attr("disabled", true);
                                            $("#ra1080").attr("disabled", true);
                                            $("#pd907").attr("disabled", true);
                                            $("#mc11").attr("disabled", true);
                                            $("#others").attr("disabled", true);
                                            $("#eligibility_file").attr("disabled", true);
                                            $("#nc").attr("disabled", true);
                                            $("#national_certificate_file").attr("disabled", true);
                                            $("#nttc").attr("disabled", true);
                                            $("#nttc_file").attr("disabled", true);
                                            $("#btn_add_buttonnc").attr("disabled", true);
                                            $("#btn_add_button").attr("disabled", true);

                                            // Refresh the page after a short delay so the success message is visible first
                                            setTimeout(function(){
                                                location.reload();
                                            }, 10000);
                                        }else{
                                            html = '<div class="alert alert-danger mt-2 message"><p><i class="fa fa-times" aria-hidden="true"></i> '+ json.message +'</p></div>';

                                            $('#btn_forme2').prop('disabled', false);
                                            $('#btn_forme2_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                            $('#btn_forme2_label').text('Submit'); 
                                               
                                        } 
                                        
                                        var $newMessage = $(html).prependTo('#forme2_message');

                                        // Apply the auto-hide to THIS specific element, not a blanket ".message" selector
                                        $newMessage.delay(5000).slideUp(200, function(){
                                            $(this).remove();
                                        }); 
                                    }
                                });
                            });
                        });
                        
                        //-------FORM 2---------  
                        document.querySelectorAll('.file-drop-area').forEach((dropArea) => {
                        const fileInput = dropArea.querySelector('.file-input');
                        const fileMsg = dropArea.querySelector('.file-msg');

                        // Highlight the drop area on drag events
                        dropArea.addEventListener('dragover', (e) => {
                            e.preventDefault();
                            dropArea.classList.add('active');
                        });

                        dropArea.addEventListener('dragleave', () => {
                            dropArea.classList.remove('active');
                        });

                        dropArea.addEventListener('drop', (e) => {
                            e.preventDefault();
                            dropArea.classList.remove('active');

                            // Get the dropped file
                            const files = e.dataTransfer.files;

                            if (files.length) {
                            fileInput.files = files; // Assign the dropped files to the input
                            const fileName = files[0].name;
                            fileMsg.textContent = `File selected: ${fileName}`;
                            }
                        });

                        // Update message when file is selected via input
                        fileInput.addEventListener('change', () => {
                            const fileName = fileInput.files[0]?.name || 'No file chosen';
                            fileMsg.textContent = `File selected: ${fileName}`;
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