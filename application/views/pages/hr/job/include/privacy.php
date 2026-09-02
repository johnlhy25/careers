<!-- Site-wide Data Privacy Notice -->
<div class="modal fade" id="sitePrivacyModal" tabindex="-1" role="dialog" aria-labelledby="sitePrivacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg tesda-privacy-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sitePrivacyModalLabel">Data Privacy Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>TESDA Region II (Cagayan Valley) is committed to protecting the privacy of every visitor and applicant who uses this Job Portal, in accordance with the Data Privacy Act of 2012 (RA 10173) and its Implementing Rules and Regulations.</p>

                <h5>Information We Collect</h5>
                <ul>
                    <li>Personal details you submit when applying for a position (name, contact information, birth date, address, and similar fields on the application form).</li>
                    <li>Documents you upload as part of your application (intent letter, transcripts, certificates, and related attachments).</li>
                </ul>

                <h5>How We Use It</h5>
                <ul>
                    <li>To evaluate and process applications for posted vacancies.</li>
                    <li>To communicate with applicants regarding the status of their application.</li>
                    <li>To allow applicants to look up their own application status using their reference number.</li>
                </ul>

                <h5>Who Can Access It</h5>
                <p>Access is limited to the Human Resource Merit and Promotion Selection Board (HRMPSB), the Human Resource Management Unit, the Financial and Administrative Services Division, and the Appointing Authority, as needed for recruitment and selection.</p>

                <h5>Data Retention</h5>
                <p>Application data is retained only for as long as necessary to complete the recruitment and selection process, and in accordance with applicable government records retention requirements.</p>

                <h5>Your Rights</h5>
                <p>You may contact the TESDA DOS ICT Unit to inquire about, correct, or request the deletion of your personal data, subject to applicable retention requirements. You are also responsible for obtaining consent from any references before submitting their personal information through this portal.</p>

                <h5>Contact</h5>
                <p>For privacy-related concerns, reach us at <a href="mailto:region2.ictu@tesda.gov.ph">region2.ictu@tesda.gov.ph</a> or (078) 846-1618.</p>

                <p class="updated-note">Last updated: <?= date('F Y') ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close-privacy" data-dismiss="modal">I Understand</button>
            </div>
        </div>
    </div>
</div>
<!-- End Site-wide Data Privacy Notice -->

<style>
    .copyright{padding:20px 0;border-top:1px solid var(--line);margin-top:30px;text-align:center;}
    .copyright p{color:var(--slate);font-size:13px;margin:0;}
    .copyright a{color:var(--brass-dark);}
    .footer-links{margin-top:6px !important;}
    .footer-links a{
        font-weight:600;
        text-decoration:none;
    }
    .footer-links a:hover{text-decoration:underline;}

    .tesda-privacy-modal .modal-content{border:none;border-radius:6px;overflow:hidden;background:var(--paper);}
    .tesda-privacy-modal .modal-header{background:var(--ink);border:none;padding:22px 28px;}
    .tesda-privacy-modal .modal-header .modal-title{
        font-family:'Source Serif 4',Georgia,serif;
        color:#fff;font-size:20px;font-weight:600;
    }
    .tesda-privacy-modal .modal-header .close{color:#fff;opacity:.8;text-shadow:none;}
    .tesda-privacy-modal .modal-header .close:hover{opacity:1;color:#fff;}
    .tesda-privacy-modal .modal-body{padding:30px 32px;max-height:60vh;overflow-y:auto;}
    .tesda-privacy-modal h5{
        font-family:'Source Serif 4',Georgia,serif;
        font-size:15.5px;font-weight:600;
        color:var(--ink);
        margin:22px 0 10px;
    }
    .tesda-privacy-modal h5:first-child{margin-top:0;}
    .tesda-privacy-modal p, .tesda-privacy-modal li{
        font-size:14px;line-height:1.7;color:var(--ink);
    }
    .tesda-privacy-modal ul{padding-left:20px;margin-bottom:0;}
    .tesda-privacy-modal .updated-note{
        font-size:12.5px;color:var(--slate);
        border-top:1px solid var(--line);
        padding-top:14px;margin-top:22px;
    }
    .tesda-privacy-modal .modal-footer{
        border-top:1px solid var(--line);background:#fff;padding:16px 28px;
    }
    .tesda-privacy-modal .btn-close-privacy{
        background:var(--brass);border:none;color:#fff;
        padding:10px 20px;border-radius:3px;font-size:14px;font-weight:600;
        transition:background .15s ease;
    }
    .tesda-privacy-modal .btn-close-privacy:hover{background:var(--brass-dark);}
</style>