{assign var="id_lang" value=Tools::getValue("id_lang")}

{assign var="content1" value=Configuration::get('CIN_FOOTER_C1_CONTENT'|cat:'_'|cat:$id_lang)}
{assign var="content2" value=Configuration::get('CIN_FOOTER_C2_CONTENT'|cat:'_'|cat:$id_lang)}
{assign var="content3" value=Configuration::get('CIN_FOOTER_C3_CONTENT'|cat:'_'|cat:$id_lang)}
{assign var="content4" value=Configuration::get('CIN_FOOTER_C4_CONTENT'|cat:'_'|cat:$id_lang)}

<section id="footer-klorel">
    <div class="footer-klorel-main-container">
        <div class="footer-klorel-div-social">
            <div id="footer-klorel-newsletter">
                {widget name="ps_emailsubscription" hook="footer"}
            </div>
            <div class="footer-klorel-social">
                <a href="https://www.youtube.com/channel/UCUlfUel-DkO6bKctz0EECxg" target="_blank">
                    <img src="/themes/cinabrev3/assets/css/img/youtube.png" alt="logo youtube" />
                </a>
                <a href="https://www.instagram.com/cinabreparis" target="_blank">
                    <img src="/themes/cinabrev3/assets/css/img/instagram.png" alt="logo instagram" />
                </a>
                <a href="https://open.spotify.com/user/3173o3fs2lhygdxfs2freepedwlq?si=4b7bbb352cd84d13" target="_blank">
                    <img src="/themes/cinabrev3/assets/css/img/spotify.png" alt="logo spotify" />
                </a>
                <a href="https://www.pinterest.fr/cinabreparis/" target="_blank">
                    <img src="/themes/cinabrev3/assets/css/img/pinterest.png" alt="logo pinterest" />
                </a>
            </div>
        </div>
        <div class="footer-klorel-div-info">
            <div class="klorel-footer-colum klorel-footer-colum1">
                <div class="toggle-footer-mobile">
                    <p>{Configuration::get('CIN_FOOTER_C1_TITLE'|cat:'_'|cat:$id_lang)}</p>
                    <img src="/themes/cinabrev3/assets/css/img/chevron-up.png" class="chevron-img" alt="toggle chevron">
                </div>
                <div class="toggle-footer-content">
                    {$content1 nofilter}
                </div>
            </div>
            <div class="klorel-footer-colum klorel-footer-colum2">
                <div class="toggle-footer-mobile">
                    <p>{Configuration::get('CIN_FOOTER_C2_TITLE'|cat:'_'|cat:$id_lang)}</p>
                    <img src="/themes/cinabrev3/assets/css/img/chevron-up.png" class="chevron-img" alt="toggle chevron">
                </div>
                <div class="toggle-footer-content">
                    {$content2 nofilter}
                </div>
            </div>
            <div class="klorel-footer-colum klorel-footer-colum3">
                <div class="toggle-footer-mobile">
                    <p>{Configuration::get('CIN_FOOTER_C3_TITLE'|cat:'_'|cat:$id_lang)}</p>
                    <img src="/themes/cinabrev3/assets/css/img/chevron-up.png" class="chevron-img" alt="toggle chevron">
                </div>
                <div class="toggle-footer-content">
                    {$content3 nofilter}
                </div>
            </div>
            <div class="klorel-footer-colum klorel-footer-colum4">
                <div class="toggle-footer-mobile">
                    <p>{Configuration::get('CIN_FOOTER_C4_TITLE'|cat:'_'|cat:$id_lang)}</p>
                    <img src="/themes/cinabrev3/assets/css/img/chevron-up.png" class="chevron-img" alt="toggle chevron">
                </div>
                <div class="toggle-footer-content">
                    {$content4 nofilter}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-klorel-bottom-container">
        <img src="/themes/cinabrev3/assets/css/img/logo_adresse.png" alt="logo cinabre">
        <span>© CINABRE - 2023</span>
    </div>
</section>