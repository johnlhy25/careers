<!-- modal application status -->
<div class="modal fade" id="app_status" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">

<style>
.tesda-status{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
}
.tesda-status .modal-content{border:none;border-radius:6px;overflow:hidden;background:var(--paper);}
.tesda-status .modal-header{
  background:var(--ink);border:none;padding:20px 28px;
  display:flex;align-items:center;
}
.tesda-status .modal-header h3{
  font-family:'Source Serif 4',Georgia,serif;
  color:#fff;font-size:19px;font-weight:600;margin:0;
  display:flex;align-items:center;gap:10px;
}
.tesda-status .modal-header h3 i{color:var(--brass);}
.tesda-status .modal-header .close{color:#fff;opacity:.8;text-shadow:none;margin-left:auto;}
.tesda-status .modal-header .close:hover{opacity:1;color:#fff;}

.tesda-status .modal-body{padding:30px 32px;}

#paragraph4{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:18px;font-weight:600;
  text-align:center;
  color:var(--brass-dark);
  background:#FBF3E7;
  border:1px solid #EAD8B8;
  border-radius:4px;
  padding:14px;
  margin-bottom:24px;
}

.tesda-status .letter{
  background:#fff;
  border:1px solid var(--line);
  border-radius:4px;
  padding:28px 30px;
}
.tesda-status .letter .salutation{
  font-size:15px;
  margin-bottom:16px;
  display:block;
}
.tesda-status .letter #lastname123{color:var(--brass-dark);}
.tesda-status .letter #position{color:var(--brass-dark);}
.tesda-status .letter #result{color:var(--brass-dark);}
.tesda-status .letter p{
  font-size:14.5px;
  line-height:1.7;
  margin-bottom:14px;
  color:var(--ink);
}
.tesda-status .letter .sign-off{
  margin-top:22px;
  padding-top:18px;
  border-top:1px solid var(--line);
  font-size:14px;
  color:var(--slate);
}
.tesda-status .letter .sign-off b{color:var(--ink);}
</style>

<div class="modal-dialog modal-lg tesda-status" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Application Status</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <h3 id="paragraph4">Still in process, please wait.</h3>

            <div class="letter">
                <span id="paragraph3" class="salutation">Dear Mr./Ms. <b><span id="lastname123"></span></b></span>

                <p id="paragraph1">This is regarding your application to the vacant <b><span id="position"></span></b> position in the Technical Education and Skills Development Authority (TESDA).</p>
                <p id="paragraph2">Please be informed that you <b><span id="result"></span></b> the required qualifications for the position you applied for. Kindly wait for further notice.</p>
                <p id="paragraph5">Thank you.</p>

                <div class="sign-off"><b>- TESDA DOS ICTU Team</b></div>
            </div>
        </div>

    </div>
</div>
<!-- end modal application status -->