<!-- HEADER DESKTOP-->
        <header class="header-desktop4" id="siteHeader">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="<?= base_url()?>jobportal/images/icon/logo-blue.png" alt="Logo" />
                        </a>
                    </div>
                    <div class="header__tool">
                        <a href="#" class="header-info-item" data-toggle="modal" data-target="#faqModal">
                            <i class="fa fa-question" aria-hidden="true"></i>
                            <span>Frequently Asked Questions</span>
                        </a>
                        <a href="tel:+6378846-1618" class="header-info-item">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>(078) 846-1618</span>
                        </a>
                        <span class="header-info-item header-info-hours">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>region2@tesda.gov.ph</span>
                        </span>
                    </div>
                </div>
            </div>
        </header>
<!-- END HEADER DESKTOP -->

<!--FAQs-->
    <?php include("faq.php");?>
    <style>
        .header-desktop4{
        background:#fff;
        border-bottom:1px solid var(--line);
        padding:14px 0;
        posistion:sticky;
        top:0;
        z-index:1000;
        transition:box-shadow .2s ease, padding .2s ease;
        }
        .header-desktop4.is-scrolled{
            box-shadow:0 4px 16px rgba(28,43,57,.08);
            padding:10px 0;
        }

        .header4-wrap{
            display:flex;
            align-items:center;
            justify-content:space-between;
            flex-wrap:wrap;
            gap:12px;
        }
        .header__logo{
            display:flex;
            align-items:center;
            gap:12px;
        }
        .header__logo img{height:44px;transition:height .2s ease;}
        .header-desktop4.is-scrolled .header__logo img{height:36px;}

        .header__logo-text{
            display:flex;
            flex-direction:column;
            line-height:1.2;
        }
        .header__logo-text .site-title{
            font-family:'Source Serif 4',Georgia,serif;
            font-size:16px;
            font-weight:700;
            color:var(--ink);
        }
        .header__logo-text .site-subtitle{
            font-size:12px;
            color:var(--brass-dark);
            font-weight:600;
        }

        .header__tool{
            display:flex;
            align-items:center;
            gap:22px;
            flex-wrap:wrap;
        }
        .header-info-item{
            display:flex;
            align-items:center;
            gap:7px;
            font-size:13px;
            color:var(--slate);
            text-decoration:none;
        }
        .header-info-item i{color:var(--brass-dark);font-size:13px;}
        a.header-info-item:hover{color:var(--ink);}
        .header-info-hours{border-left:1px solid var(--line);padding-left:20px;}

        @media(max-width:768px){
            .header__tool{display:none;}
        }
    </style>

    <script>
    $(document).ready(function(){
        $('#faqModal').on('click', '.faq-acc-header', function(){
            var $item = $(this).closest('.faq-acc-item');
            var isOpen = $item.hasClass('open');
            $item.closest('.faq-acc').find('.faq-acc-item').removeClass('open');
            if (!isOpen) $item.addClass('open');
        });

        $('#faqModal').on('keyup', '#faqSearchInput', function(){
            var term = $(this).val().toLowerCase().trim();
            var anyVisible = false;

            $('#faqModal .faq-acc-item').each(function(){
                var questionText = $(this).find('.faq-acc-header span').text().toLowerCase();
                var answerText = $(this).find('.faq-acc-body-inner').text().toLowerCase();
                var matches = term === '' || questionText.indexOf(term) > -1 || answerText.indexOf(term) > -1;

                $(this).toggleClass('no-match', !matches);
                if (matches) anyVisible = true;
            });

            $('#faqModal .faq-acc').each(function(){
                var hasVisible = $(this).find('.faq-acc-item:not(.no-match)').length > 0;
                $(this).toggle(hasVisible);
                $(this).prev('.faq-category').toggle(hasVisible);
            });

            $('#faqNoResults').toggle(!anyVisible && term !== '');
        });

        $('#faqModal').on('hidden.bs.modal', function(){
            $('#faqSearchInput').val('');
            $('#faqModal .faq-acc-item').removeClass('no-match open');
            $('#faqModal .faq-acc, #faqModal .faq-category').show();
            $('#faqNoResults').hide();
        });
    });
    </script>
<!--FAQs-->