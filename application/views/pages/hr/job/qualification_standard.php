<!-- modal static qualification standard -->
<div class="modal fade" id="qualifications" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">

<style>
.tesda-qual{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
}
.tesda-qual .modal-content{border:none;border-radius:6px;overflow:hidden;background:var(--paper);}
.tesda-qual .modal-header{background:var(--ink);border:none;padding:20px 28px;}
.tesda-qual .modal-header .modal-title{
  font-family:'Source Serif 4',Georgia,serif;color:#fff;font-size:19px;font-weight:600;
}
.tesda-qual .modal-header .close{color:#fff;opacity:.8;text-shadow:none;}
.tesda-qual .modal-header .close:hover{opacity:1;color:#fff;}

.tesda-qual .modal-body{padding:26px 28px;}

.tesda-qual .spec-row{
  background:#fff;
  border:1px solid var(--line);
  border-radius:4px;
  padding:16px 18px;
  margin-bottom:14px;
}
.tesda-qual .spec-row label{
  display:block;
  font-size:12.5px;
  font-weight:600;
  color:var(--brass-dark);
  text-transform:none;
  margin-bottom:8px;
}
.tesda-qual .spec-row input,
.tesda-qual .spec-row textarea{
  width:100%;
  border:none;
  background:transparent;
  padding:0;
  font-size:15px;
  color:var(--ink);
  font-family:inherit;
  resize:none;
}
.tesda-qual .spec-row input:disabled,
.tesda-qual .spec-row textarea:disabled{
  color:var(--ink);
  opacity:1;
  -webkit-text-fill-color:var(--ink);
}
.tesda-qual .spec-row input:focus,
.tesda-qual .spec-row textarea:focus{outline:none;}
.tesda-qual .spec-row textarea{line-height:1.6;}

.tesda-qual .modal-footer{
  border-top:1px solid var(--line);
  background:#fff;
  padding:16px 28px;
}
.tesda-qual .modal-footer .btn-close-qual{
  background:transparent;
  border:1px solid var(--line);
  color:var(--slate);
  padding:9px 18px;
  border-radius:3px;
  font-size:14px;
  font-weight:500;
  transition:.15s ease;
}
.tesda-qual .modal-footer .btn-close-qual:hover{
  background:var(--ink);
  border-color:var(--ink);
  color:#fff;
}
</style>

<div class="modal-dialog modal-lg tesda-qual" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticModalLabel">Qualification Standard</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <input id="pos_id" type="hidden" class="form-control">

            <!---Education-->
            <div class="spec-row">
                <label for="pos_education">Education</label>
                <input id="pos_education" type="text" disabled>
            </div>
            <!---Education-->

            <!---Training-->
            <div class="spec-row">
                <label for="pos_training">Training</label>
                <input id="pos_training" type="text" disabled>
            </div>
            <!---Training-->

            <!---Experience-->
            <div class="spec-row">
                <label for="experience">Experience</label>
                <input id="experience" type="text" disabled>
            </div>
            <!---Experience-->

            <!---Eligibility-->
            <div class="spec-row">
                <label for="eligibility">Eligibility</label>
                <input id="eligibility" type="text" disabled>
            </div>
            <!---Eligibility-->

            <!---Competency-->
            <div class="spec-row">
                <label for="competency">Competency</label>
                <textarea id="competency" rows="4" disabled></textarea>
            </div>
            <!---Competency-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-close-qual" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>
</div>
<!-- end modal static qualification standard -->