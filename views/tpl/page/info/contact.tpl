[{capture append="oxidBlock_content"}]
    [{if $oView->getContactSendStatus()}]
        [{assign var="_statusMessage" value="DD_CONTACT_THANKYOU1"|oxmultilangassign|cat:" "|cat:$oxcmp_shop->oxshops__oxname->value}]
        [{assign var="_statusMessageSuffix" value="DD_CONTACT_THANKYOU2"|oxmultilangassign}]
        [{include file="message/notice.tpl" statusMessage=$_statusMessage|cat:$_statusMessageSuffix}]
    [{/if}]
    <h1 class="page-header">[{oxmultilang ident="DD_CONTACT_PAGE_HEADING"}]</h1>

    [{if isset($oView->gmaps) && $oView->gmaps === 'map' }]
      [{assign var="sGoogleMapsAddr" value=$oViewConf->getViewThemeParam('sGoogleMapsAddr')}]
      [{if $sGoogleMapsAddr}]
          <div class="row">
              <div class="col-xs-12">
                  <div class="google-maps">
                      <figure>
                          <iframe width="100%" height="400" style="width:100%;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.de/maps?t=m&amp;q=[{$sGoogleMapsAddr|urlencode}]&amp;ie=UTF8&amp;hq=[{$sGoogleMapsAddr|urlencode}]&amp;output=embed"></iframe>
                      </figure>
                  </div>
              </div>
          </div>
      [{/if}]
    [{/if}]

    <div class="row">
        <div class="col-xs-12 col-lg-3 pull-right">
            <h2 class="page-header">[{oxmultilang ident="DD_CONTACT_ADDRESS_HEADING"}]</h2>
            <div itemscope itemtype="http://schema.org/Organization">
                <address>
                    <strong itemprop="name">[{$oxcmp_shop->oxshops__oxcompany->value}]</strong><br>
                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress">[{$oxcmp_shop->oxshops__oxstreet->value}]</span><br>
                        <span itemprop="postalCode">[{$oxcmp_shop->oxshops__oxzip->value}]</span> [{$oxcmp_shop->oxshops__oxcity->value}]<br>
                        [{$oxcmp_shop->oxshops__oxcountry->value}]<br>
                        <span class="hidden" itemprop="addressLocality">[{$oxcmp_shop->oxshops__oxcity->value}], [{$oxcmp_shop->oxshops__oxcountry->value}]</span>
                    </span>
                    [{if $oxcmp_shop->oxshops__oxtelefon->value}]
                        <strong>[{oxmultilang ident="PHONE" suffix="COLON"}]</strong> <span itemprop="telephone">[{$oxcmp_shop->oxshops__oxtelefon->value}]</span><br>
                    [{/if}]
                    [{if $oxcmp_shop->oxshops__oxtelefax->value}]
                        <strong>[{oxmultilang ident="FAX" suffix="COLON"}]</strong> <span itemprop="faxNumber">[{$oxcmp_shop->oxshops__oxtelefax->value}]</span><br>
                    [{/if}]
                    [{if $oxcmp_shop->oxshops__oxinfoemail->value}]
                        <strong>[{oxmultilang ident="EMAIL" suffix="COLON"}]</strong> <span itemprop="email">[{oxmailto address=$oxcmp_shop->oxshops__oxinfoemail->value}]</span><br>
                    [{/if}]
                    <span class="hidden" itemprop="url">[{$oViewConf->getHomeLink()}]</span>
                </address>
            </div>

            [{if isset($oView->gmaps) && $oView->gmaps === 'link' }]
              [{assign var="sGoogleMapsAddr" value=$oViewConf->getViewThemeParam('sGoogleMapsAddr')}]
              [{if $sGoogleMapsAddr}]
                <h3>Anfahrt berechnen</h3>
                <a href="https://maps.google.com/maps?daddr=[{$sGoogleMapsAddr|urlencode}]" class="btn btn-default btn-sm" rel="nofollow noopener noreferrer" target="_blank">
                  <i class="fa fa-car fa-fw" aria-hidden></i> Google Maps <i class="fa fa-external-link fa-fw" aria-hidden></i>
                </a><br>
                <br>
                <br>
              [{/if}]
            [{/if}]
        </div>
        <div class="col-xs-12 col-lg-9">
            <h2 class="page-header">[{oxmultilang ident="DD_CONTACT_FORM_HEADING"}]</h2>
            [{include file="contact-form.tpl"}]
        </div>
    </div>

    [{insert name="oxid_tracker" title=$template_title}]
[{/capture}]

[{include file="layout/page.tpl"}]