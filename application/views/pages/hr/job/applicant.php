<!-- modal static -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">

<style>
.tesda-modal-wrap{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
}
.tesda-modal-wrap .modal-content{
  border:none;
  border-radius:4px;
  overflow:hidden;
  background:var(--paper);
}
.tesda-modal-wrap .modal-header{
  background:var(--ink);
  border:none;
  padding:22px 28px;
}
.tesda-modal-wrap .modal-header .modal-title{
  font-family:'Source Serif 4',Georgia,serif;
  color:#fff;
  font-size:21px;
  font-weight:600;
}
.tesda-modal-wrap .modal-header .close{
  color:#fff;
  opacity:.8;
  text-shadow:none;
}
.tesda-modal-wrap .modal-header .close:hover{opacity:1;color:#fff;}
.tesda-modal-wrap .modal-body{padding:28px;}

.tesda-modal-wrap .privacy-notice{
  background:#fff;
  border:1px solid var(--line);
  border-left:4px solid var(--brass);
  border-radius:3px;
  padding:24px 26px;
  margin-bottom:28px;
  position:relative;
}
.tesda-modal-wrap .privacy-notice .notice-title{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:19px;
  font-weight:600;
  margin-bottom:16px;
  padding-right:20px;
}
.tesda-modal-wrap .privacy-notice .close{
  position:absolute;
  top:20px;
  right:22px;
  color:var(--slate);
}
.tesda-modal-wrap .privacy-notice p{
  font-size:14.5px;
  line-height:1.65;
  color:var(--ink);
  margin-bottom:14px;
}
.tesda-modal-wrap .privacy-notice .salutation{
  font-size:14.5px;
  color:var(--slate);
  margin-bottom:10px;
}
.tesda-modal-wrap .privacy-notice .access-list{
  list-style:none;
  margin:14px 0 18px;
  padding:14px 16px;
  background:var(--paper);
  border-radius:3px;
  border:1px solid var(--line);
}
.tesda-modal-wrap .privacy-notice .access-list li{
  font-size:14px;
  padding:5px 0;
  display:flex;
  gap:10px;
}
.tesda-modal-wrap .privacy-notice .access-list li span.num{
  color:var(--brass-dark);
  font-weight:600;
  min-width:16px;
}
.tesda-modal-wrap .privacy-notice .sign-off{
  font-size:14px;
  color:var(--slate);
  margin-top:18px;
  margin-bottom:0;
}

.tesda-modal-wrap .file-note{
  background:#fff;
  border:1px solid var(--line);
  border-radius:3px;
  padding:12px 16px;
  font-size:13px;
  color:var(--slate);
  margin-top:20px;
}
.tesda-modal-wrap .file-note strong{color:var(--ink);}
</style>

<div class="modal-dialog modal-lg tesda-modal-wrap" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="staticModalLabel">Application Form</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><!-- end modal-header -->
        <div id="application_form" class="modal-body">

            <!-- Welcome -->
            <div class="privacy-notice">
                <div class="notice-title">Data Privacy Notice</div>
                <p class="salutation">Dear Applicant,</p>
                <p>In line with our compliance with the Data Privacy Act, TESDA assures you that your personal information obtained in this process is protected.</p>
                <p>Please be informed that your submitted data and documents shall be used in the assessment and validation, which will be done by the Human Resource Merit and Promotion Selection Board (HRMPSB) – Regional Office and the Secretariat. The following personnel and offices will have access to your job application data:</p>

                <ul class="access-list">
                    <li><span class="num">1.</span> HRMPSB – RO</li>
                    <li><span class="num">2.</span> Human Resource Management Unit</li>
                    <li><span class="num">3.</span> Financial and Administrative Services Division</li>
                    <li><span class="num">4.</span> The Appointing Authority</li>
                </ul>

                <p>Furthermore, you are responsible for informing and obtaining consent and permission from references before providing their personal information to us.</p>
                <p class="sign-off">We appreciate your interest in applying with us! Regards, and keep safe.</p>
            </div>
            <!-- Welcome -->

            <div id="application_body_card"></div>
            <div class="tab-content m-b-0" id="myTabContent"><!-- myTabContent -->

                <!--First Tab-->
                <?php include("form1.php")?>
                <!--End of First Tab-->

                <div class="file-note"><strong>Note:</strong> Merge into one (1) PDF file if multiple files. Maximum of 2MB per file.</div>
            </div><!-- end myTabContent -->
        </div><!-- end modal-body -->
    </div><!-- end modal-content -->
</div> <!-- end modal-dialog modal-lg -->
</div> <!-- end modal static -->