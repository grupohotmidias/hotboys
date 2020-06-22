<?php 
if( isset( $_POST['no'])){
$_SESSION['age_verification'] = 0;
	echo "<script>location.href='".URL."noticias';</script>";
}  

 if($_SESSION['age_verification'] != 1) { ?>
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
	<?php } ?>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          
         
        </div>
        <div class="">
        <?php
          if( isset( $_POST['yes'] ) )
    {
        $_SESSION['age_verification'] = 1;

        
    }
    elseif( isset( $_POST['no'] ) )
    {
        $_SESSION['age_verification'] = 0;
		
		echo "<script>location.href='target-page.php';</script>";
    }

   
 
    ?>

   <!-- Aviso ao Entrar no Site -->
<div id="agreementPopupContainer" data-backdrop="static" style="display: none; overflow: auto; position: fixed; z-index: 9999; top: 0px; right: 0px; bottom: 0px; left: 0px; background: rgba(0,0,0,0.9);">
  <div class="welcomePopupContainer clear">
    <div class="welcomeLogo"> </div>
    <div class="welcomeLogo-mobile"> <img src="<?php echo URL ?>imagens/modal-aviso-entrar/logo/logo-popup.png" style="width:100%;"/> </div>
    <div class="relative zindex1">
      <div class="welcomePopupModelContainer"> <img class="welcomePopupModel" alt="" src="<?php echo URL ?>imagens/modal-aviso-entrar/modelos/aviso-entrar.png" /> </div>
      <div class="floatRight mrgRight5 termo-acordo-usuario">
        <div class="man-mobile-popup"> <img src="<?php echo URL ?>imagens/modal-aviso-entrar/background/man-mobile.png" style="width:100%"/> </div>
        <div class="welcomeUserAgreementContainer">
          <p class="txtBold txtWhite mrgTop">Termo de Acordo do Usuário:</p>
          <div class="welcomeUserAgreement txt14">
            <div class="txtBold txtBlack mrgBot2"> I agree that I am at least 18 years old and I agree to the Terms &amp; Conditions below. </div>
            <p class="txtBold txtBlack mrgTop0">RentMen.eu User Disclaimer</p>
            <p> Notice: As of today, users in your country will be permitted to access RentMen content exclusively on the new RentMen.Eu domain.							In order to access your account on the new domain, please click the "I agree" button below. Your agreement below further accepts the RentMen User Terms and Conditions below. </p>
            <p class="txtBold txtBlack">RentMen.eu Advertiser Disclaimer</p>
            <p> Notice: As of today, advertisers in your country will be permitted to advertise exclusively on the new RentMen.eu domain.							In order to access your advertiser account on the new domain, please click the "I agree" button below.							Your agreement authorizes the publication of all information and content previously provided							to Rentmen, on RentMen.eu. Your agreement below further accepts the RentMen.eu Advertiser Agreement below. </p>
            <p class="txtBold txtBlack">Third Party Link Disclaimer</p>
            <p> All third party websites linked to this site are independently owned and operated.							RentMen.eu is not responsible for the content or operations of linked sites.							No affiliation between RentMen.eu and any third party website is expressed or implied. </p>
            <div class="txtCenter txtBold txtBlack txt16">Terms &amp; Conditions</div>
            <p> You must read and consent to these Advertiser Terms of Service (hereinafter "Terms;" "Agreement;" "Advertiser Agreement") before You are permitted to access or use RentMen.eu as an Advertiser.							We ask that You read this Agreement carefully, as it impacts Your legal rights. Upon accessing the Site, You have agreed to Our User Agreement, and by accessing the Site and Services as,							or with the intent of acting as an Advertiser, You further agree to the following Terms: </p>
            <p>This site contains sexually explicit text, photographs, videos and links to websites of interest to Adults. Access is only made available to those individuals who agree to the following terms:</p>
            <ol>
              <li>I am at least 18 years old and I will not allow any minor to access this website.</li>
              <li>Materials of a sexually explicit nature are not illegal to view in my community or locale.</li>
              <li>I wish to receive and I am not offended by sexually explicit adult content.</li>
              <li>The author of this web site cannot be held responsible for my actions and I release them from any and all liability.</li>
              <li> You give us license to use all media and information uploaded by you, see <a href="javascript:void(0);" onclick="animateScrollTo('#membercontent'); $('#membercontentExpand').slideDown();"><strong>8. MEMBER CONTENT</strong></a> for details. </li>
            </ol>
            <p> By my electronic signature when clicking 'I Agree' when entering the website I Accept the Terms of Use and declare that I am at least 18 years old,							I accept and agree to the above Terms and have read and accept the "Terms of Service", "Terms of Use" and the "Privacy Policy and Terms of Use" for this website. </p>
            <br />
            <p>THE FOLLOWING TERMS OF SERVICE APPLY TO YOUR USE AND ACCESS OF THE <a href="/">RentMen.eu</a> WEB SITE.&nbsp;</p>
            <p> PLEASE READ THESE TERMS OF SERVICE AND THE RentMen.eu <a href="/about/privacy/">PRIVACY POLICY </a> CAREFULLY BEFORE USING OR ACCESSING THIS SITE.&nbsp; YOUR USE OF THE						SITE SIGNIFIES YOUR ACCEPTANCE TO BE BOUND BY THIS AGREEMENT </p>
            <p> We do not condone, promote or endorse prostitution or any illegal activities.							The professional Escorts or masseurs who advertise on our site are paid for their time only.							Any information that is posted on this website is solely for entertainment or research purposes. All descriptions of activities are the responsibility of the writers and contributors.							Any rates quoted by the advertisers are for his time only. RentMen.eu only charges its advertisers for the ability to post ads on the site.							No payment, or portion of payment, is taken by RentMen.eu for companionship by advertisers. </p>
            <div class="txtCenter txtBold txtBlack txt18">Terms of Service</div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">1. INTRODUCTION RentMen.eu</a></p>
            <div class="txtGray invisibleFix">
              <p> (the "Site") is a service for adult gay								men to meet each other online and is owned and operated by <span class="gfirm"></span> - Germany.								These Terms of Service apply to and govern your								use of this Site, whether or not you register as a member								("Member"). </p>
              <p>Your use of this Site signifies your								agreement to be bound by these Terms of Service, as they may be amended								by the Company from time to time, in its sole discretion. Your								agreement includes these Terms of Service and the RentMen.eu Privacy								Policy ("Agreement"). As used in this Agreement, "we" and "us"								means <span class="gfirm"></span> - Germany. The Company will post a notice on the Site any time								these Terms of Service have been changed or otherwise updated.								Changes to these Terms of Service will be effective when posted.								You agree to review these Terms of Service periodically to be aware of								any changes. It is your responsibility to review these Terms of								Service periodically, and if you do not agree to be bound by these Terms								of Service, you may not access or otherwise use this Site. Your								continued use of the Site after any changes to these Terms of Service								are posted will be considered acceptance of those changes. Before								accessing or using this site, please also review the RentMen.eu Privacy								Policy. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">2. ELIGIBILITY &amp; AGREEMENT</a></p>
            <div class="txtGray invisibleFix">
              <p> You must be eighteen or over to register								as a member of RentMen.eu or otherwise use the Site. Membership								in the Site is void where prohibited. By using the Site, you								represent and warrant that you have the right, authority, and capacity								to enter into this Agreement and to abide by all of the Terms of Service								and Privacy Policy. YOU AGREE THAT BY USING THE SITE YOU REPRESENT THAT								YOU ARE AT LEAST 18 YEARS OLD AND THAT YOU ARE LEGALLY ABLE TO ENTER								INTO THIS AGREEMENT. </p>
              <p> Electronic Signatures / Assent Required – Nobody is authorized to become an Advertiser of this Site, or access the Services provided to Advertisers, unless they have signed this Agreement.								Such signature does not need to be a physical signature, since electronic acceptance of this Agreement is permitted by the Electronic Signatures.								You manifest Your agreement to this contractual agreement by taking any act demonstrating Your assent thereto. Most likely,								You have clicked or will click a button containing the words “I agree” or some similar syntax. You should understand that this has the same legal effect as You placing								Your physical signature on any other legal contract. If You click any link, button, or other device provided to You in any part of Our Site’s interface, then you have								legally agreed to all of these Terms of Service. Additionally, by using any part of Our Site or Services for promotional purposes and/or as an Advertiser, You understand and agree								that We will consider such use as Your affirmation of Your complete and unconditional acceptance to all of the terms in this Agreement. If We discover that You have not validly								signed this Agreement, You will be considered an unauthorized User of the Site and its Services, which constitutes a material breach of these Terms, as well as Our Site’s User Agreement. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">3. MEMBERSHIP SERVICE AND FEES</a></p>
            <div class="txtGray invisibleFix">
              <p> Standard Membership is free but does not								include many of the Site's features. In order to the full functionality of the website, you								must subscribe to our Premium, Basic or Gold Membership, which enables you to use all								of the Site's features. Premium, Basic or Gold Membership is offered in 30-day								increments and payable in advance. If you terminate								your Premium, Basic or Gold Membership at any time you will not be entitled to any								refund of unused membership fees. You agree to pay all fees and charges								incurred in connection with your membership in the Service (including								any applicable taxes) at the rates in effect when the charges were								incurred. All fees and charges are non refundable. We may								change the fees and charges in effect for using the Service, or add new								fees or charges, by posting new fees and charges on the site at any								time. All fees and charges (including recurring payments) are charged in the currency according to your location at the time of the payment. You are responsible for any fees or charges incurred to								access the Service through an Internet Service Provider or other third								party service, including but not limited to telephone charges.								YOU, AND NOT US, SHALL BE RESPONSIBLE FOR THE PAYMENT OF ANY AMOUNTS								BILLED TO YOUR CREDIT CARD BY A THIRD PARTY, WHICH WERE NOT AUTHORIZED								BY YOU. You understand and agree that the Service may include								communications such as service announcements and administrative messages								from us or from our partners and that these communications are								considered part of the Service. You will not be able to opt out of								receiving these messages. You also understand that the Service								may include advertisements. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">4. ACCOUNT SECURITY</a></p>
            <div class="txtGray invisibleFix">
              <p>Your account is private and should not be								used by anyone else. As part of the registration process, you are								required to provide true, accurate, current and complete								information. It is your responsibility to maintain your account								with true, accurate, current, and complete information at all								times. You will also be required to select a password in order to								access your account and may not reveal that password to anyone								else. You may not use another Member's password. You are								responsible for maintaining the confidentiality of your account and								passwords. You agree to immediately notify us of any unauthorized								use of your account or passwords or any other breach of security.								You also agree to exit and log out of your account at the end of each								session. We will not be responsible for any loss or damage that								may result if you fail to comply with these requirements. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">5. TERM</a></p>
            <div class="txtGray invisibleFix">
              <p>This Agreement will remain in full force								and effect while you use the Site and/or are a Member. You may								terminate your membership at any time, for any reason, by clicking on								"Delete Account" in Account Settings, or upon receipt by the Company of								your written or email notice of termination. The Company may								terminate your membership for any reason, effective upon sending notice								to you at the email address you provide as indicated in your Account								Settings. If the Company terminates your membership in the Service								because you have breached this Agreement, you will not be entitled to								any refund of unused membership fees. Certain terms of this								Agreement shall remain in effect even after the Agreement is terminated. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">6. PROPRIETARY RIGHTS</a></p>
            <div class="txtGray invisibleFix">
              <p>The Company owns and retains all								proprietary rights in the Site and the Service. The Site contains								the copyrighted material, trademarks, and other proprietary information								of the Company, and its licensors. Except for that information								which is in the public domain or for which you have been given written								permission, you may not copy, modify, publish, transmit, distribute,								perform, display, or sell any such proprietary information. The								technology and the software underlying the Site and the Services is the								property of the Company. You agree not to copy, modify, rent,								lease, loan, sell, assign, distribute, reverse engineer, grant a								security interest in, or otherwise transfer any right to the technology								or software underlying the Site or the Services. You agree not to								modify the software underlying the Site in any manner or form or to use								modified versions of such software, including, without limitation, for								the purpose of obtaining unauthorized access to the Site. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">7. NON-COMMERCIAL USE BY MEMBERS</a></p>
            <div class="txtGray invisibleFix">
              <p> The Site is intended only for personal								use by individual Members only and may not be used in connection with								any commercial purpose. Organizations, companies, and/or								businesses may not become Members and should not use the Service or the								Site for any purpose. You understand and agree that you may not								reproduce, copy, resell, manipulate, or exploit any part of the Site for								any commercial purpose. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold" id="membercontent"><a href="javascript:void(0);" class="block">8. MEMBER CONTENT</a></p>
            <div class="txtGray invisibleFix" id="membercontentExpand">
              <p> Restrictions on Advertiser Content – Under no circumstances may Your Advertiser Content include any of the following: </p>
              <ul>
                <li>Actual or simulated sexual activity;</li>
                <li>Defamatory, obscene, child pornography, harassing, illegal, or otherwise objectionable material (determination of which is in Our sole discretion);</li>
                <li>Code, slang, and/or acronyms referencing sexual acts, prostitution and escorting, drug use, violence, or other illegal activity;</li>
                <li>Disparaging text regarding the Site, Services, Users, or the respective activity of the same;</li>
                <li>Express or implied promotion of a competitor website (determination of which, is within Our sole discretion);</li>
                <li>Disclosure of personal contact information pertaining to other Advertisers;</li>
                <li>Your own personal contact information, excepting information disclosed via the Site’s permitted format;</li>
                <li>Images depicting subjects under eighteen (18) years of age at the time of creation;</li>
                <li>Text implying that any depicted person is under eighteen (18) years of age;</li>
                <li>Fake or inaccurate depictions of You as the Advertiser;</li>
                <li>Images, videos, or text published, or otherwise used without the authorization of its legal owner; and</li>
                <li>Communications suggesting, soliciting, or implying the unlawful exchange of funds for sexual activity (including, but not limited to prostitution-related services).</li>
              </ul>
              <p> We reserve the right, within Our sole and absolute discretion, to reject and/or remove any Advertiser Content, although We undertake no obligation to monitor Advertiser Content, or take any such actions. </p>
              <p> We encourage Our Users to report any violations of these restrictions by other Users. Violating any of the Site’s content restrictions may result in suspension or cancellation of Your Advertiser Account. </p>
              <p> Advertiser Records-Keeping Obligations – Advertiser represents and warrants that all Advertiser Content is exempt from the obligations set forth in 18 U.S.C. §2257 et. seq. and 28 CFR Part 75 et. seq.,								as amended (“Section 2257”). The Site simply acts as a hosting forum for Advertiser Content, therefore, if any Advertiser Content is deemed not to be exempt from Section 2257 compliance obligations,								Advertiser understands and agrees that he is solely responsible for maintaining all necessary records required for legal compliance under Section 2257.								Should Advertiser reside in a jurisdiction that does not require Section 2257 compliance, Advertiser agrees to maintain any records required under such jurisdiction’s applicable laws,								in addition to complying with the obligations set forth under Section 2257, as such Advertiser Content may be accessible from the United States. </p>
              <p> You grant the Company a license to use								the materials you post to the Site. By posting, downloading,								displaying, performing, transmitting, or otherwise distributing								information or other content ("Member Content") to the Site, except personal data (see Privacy Policy), you are								granting the Company a license to use any such Member Content in								connection with the Site, including without limitation, a right to copy,								distribute, transmit, publicly display, publicly perform, reproduce,								edit, translate, sell, and reformat Member Content. You will not								be compensated for any Member Content. By posting Member Content to the								Site, you warrant and represent that you are the sole owner of all								rights to the Member Content posted by you or that you have the absolute								right to license their use in accordance with this provision.								While you will retain ownership of the copyright in the Member Content								posted by you, you agree that all materials posted by you shall become								part of a database, and that we will own the compilation copyright in								that database. In addition, you hereby grant the Company a								perpetual, worldwide, irrevocable license to use, reproduce, modify,								publish, sell, publicly perform, publicly display and distribute such								materials, any portions of such materials and any derivative works								created from such materials, in print, electronic and other media, by								any means now known or developed in the future. You understand and agree								that while the Company does not review each and every Member Content								posted on the Site, we may periodically monitor any and all Member								Content submitted to the Site to ensure compliance with these Terms of								Service and with applicable laws. The Company may delete any								Member Content that we, in our sole discretion, deem to violate these								Terms of Service or other applicable laws. </p>
              <p> Advertiser Content – Advertiser Content includes any text, images, video, communication, or other content or media associated with Your Advertiser Account, published or transmitted								via the Site or Services, or otherwise provided by You during Your use of the Site or Services. You agree that any and all Advertiser Content associated with Your Advertiser Account								will comply with all provisions set forth in this Agreement. </p>
              <p>License to Use Advertiser Content:</p>
              <ul>
                <li> License Grant – You hereby grant Us a royalty-free, perpetual, nonexclusive right and license to use, reproduce, modify, adapt, publish, translate, transmit,									create derivative works from, distribute, perform, communicate to the public, and display such materials (in whole or in part) worldwide and/or to incorporate									such materials into any form, medium, or technology now known or later developed. Further, You hereby grant to Our Users, as defined in the User Agreement,									a nonexclusive license to access the Advertiser Content via the Site and Services. </li>
                <li> Advertiser understands and agrees that all license rights granted to Us shall be fully sub-licensable, assignable, and transferable, within Our sole discretion, and without notice.									Accordingly, We reserve the right to sub-license any and all Advertiser Content for use by any third party entity, or that which is under Our legal control. </li>
                <li> You represent and warrant that You have all rights, including intellectual property and publicity rights, to grant the license set out above.									Uploading any Advertiser Content found to infringe upon the proprietary rights of another party may result in the deactivation or deletion of Your Advertiser Account. </li>
                <li> You understand and agree that by uploading Advertiser Content, You are consenting to the above license in its entirety, which provides Us the right to:
                  <ul>
                    <li> Reproduce, transmit, communicate, display, or distribute Advertiser Content, on or as part of Our Site(s), on other Internet sites, or elsewhere,											for promotional or commercial purposes, by means of any technology, whether now known or hereafter to become known; </li>
                    <li> Reproduce Advertiser Content in digital form of display on the Internet (alone or in combination with other works, including, but not limited to, text, data,											images, photographs, illustrations, animation, graphics, video, or audio segments, and hypertext links); and/or </li>
                    <li> Adapt, modify, or alter Advertiser Content or otherwise create derivative works based upon it; and for all other reasonable promotional or commercial uses either											as part of the operation of Our Site(s), or as a promotion or operation of any derivative or related businesses. </li>
                  </ul>
                </li>
              </ul>
              <p> Given the perpetual nature of the licensed rights in the Advertiser Content granted by You to Us, removal of any such Advertiser Content is within Our sole discretion.								Therefore, You understand and agree that upon termination or cancelation of Your Advertiser Account, any associated Advertiser Content may continue being utilized by the Site. </p>
              <p> You further agree that in the event of a sale, assignment, transfer of substantially all of Our assets, bankruptcy, reorganization, or receivership involving Our Site(s),								that any Advertiser Content, information associated with Your Advertiser Account, Your identification documents, Section 2257 records, and any other data								You transmit or upload to Us, may be transferred to a third party without notice. </p>
              <p> You accept sole responsibility for any activity or material associated with Your Advertiser Account. Should any Advertiser Content associated with								Your Advertiser Account violate any laws or other applicable legal restrictions, Your actions shall constitute a material breach of this Agreement. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">9. LICENSE</a></p>
            <div class="txtGray invisibleFix">
              <p>The Company hereby grants you a								non-exclusive, non-transferable, limited right to access, use and								display the Site and the materials contained thereon for your personal								use only, provided that you comply fully with these Terms of								Service. You shall not interfere or attempt to interfere with the								operation of the Site in any way through any means or device, including								but not limited to, spamming, hacking, uploading computer viruses or								time bombs, or any other means expressly prohibited by any provision of								these Terms of Service. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">10. ASSUMPTION OF RISK</a></p>
            <div class="txtGray invisibleFix">
              <p> You understand and acknowledge that your								use of the Site is at your own risk and that we are not responsible for								any incidental, consequential, special, punitive, exemplary, direct or								indirect damages of any kind whatsoever that may arise out of or relate								to your use of the Site, including any personal meetings or encounters								you may engage in that may arise out of or relate to your use of the								Site. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">11. PROHIBITED CONTENT</a></p>
            <div class="txtGray invisibleFix">
              <p> You shall not make the following types of								User Content available and agree not to upload, download, display,								perform, transmit, or otherwise distribute any User Content that: (1) is								libelous, defamatory, obscene, pornographic, abusive, or threatening;								(2) advocates or encourages conduct that could constitute a criminal								offense, give rise to civil liability, or otherwise violate any								applicable local, state, national, or foreign law or regulation; or (3)								advertises or otherwise solicits funds or is a solicitation for goods or								services. We reserve the right to terminate your receipt, transmission,								or other distribution of any such material using the Site, and, if								applicable, to delete any such material from our servers. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">12. ACCEPTABLE USE POLICY</a></p>
            <div class="txtGray invisibleFix">
              <p>Your use of the Site must also comply with the following Acceptable Use Policy. You agree that you will not: </p>
              <ol>
                <li>upload any copyrighted materials without exclusive permission from the copyright holder</li>
                <li> transmit any material that is offensive, harasses, degrades, or intimidates any individual on the basis of religion,									gender, sexual orientation, race, ethnicity, age, or disability; </li>
                <li>cause any harm to minors or perform any activity which is likely to cause such harm;</li>
                <li>take any action which encourages or consists of any threat of harm to any to any person or property;</li>
                <li>transmit any unauthorized or									unsolicited advertising, junk or bulk e-mail (also known as "spamming"),									chain letters, or any other form of unauthorized solicitation; </li>
                <li> transmit any material that									contains software viruses or any other computer code, files, or programs									that are designed or intended to disrupt, damage, or limit the									functioning of any software, hardware, or telecommunications equipment									or to damage or obtain unauthorized to any data or other information of									any third party; </li>
                <li>impersonate any person or falsely state or otherwise misrepresent your affiliation with any person;</li>
                <li>restrict or inhibit any other Member from using and enjoying any public area within the Site;</li>
                <li>forge headers or manipulate									identifiers or other data in order to disguise the origin of any content									transmitted through the Site or to manipulate your presence on the									Site; </li>
                <li>infringe on any patent, trademark, trade secret, copyright, right of publicity, or other proprietary right of any party; </li>
                <li>copy, modify, create a									derivative work of, reverse engineer, reverse assemble or otherwise									attempt to discover any source code of the Site; </li>
                <li>advertise or otherwise solicit funds or engage in commercial activities and/or sales without our prior written consent;</li>
                <li>access the Site by any means other than through the interface that is provided by us for use in accessing the Site;</li>
                <li>make or attempt any unauthorized access to another Member's account;</li>
                <li>take any action that imposes an unreasonably or disproportionately large load on our server or network infrastructure;</li>
                <li>take any action which is harmful or potentially harmful to the Site, its server or network.</li>
              </ol>
              <p> We reserve the right to terminate your								receipt, transmission, or other distribution of any such material using								the Site, and, if applicable, to delete any such material from our								servers. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">13. RESERVATION OF RIGHTS</a></p>
            <div class="txtGray invisibleFix">
              <p> The Company reserves the right, without								assuming any obligation and in our sole discretion, to take any of the								following actions at any time and for any reason without notice to you: </p>
              <ul>
                <li>Restrict, suspend, otr terminate your access to all or any part of our Service;</li>
                <li>Change, suspend, or discontinue all or any part of our Service;</li>
                <li>Refuse, move, or remove any material that you submit to the Site for any reason;</li>
                <li>Deactivate or delete your accounts and all related information and files in your account;</li>
                <li>Establish general practices and limits concerning use of the Site. </li>
              </ul>
              <p>You agree that we will not be liable to you or any third party for taking any of these actions.</p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">14. TRADEMARKS AND COPYRIGHTS</a></p>
            <div class="txtGray invisibleFix">
              <p> All trademarks, service marks, and trade								names are proprietary to the Company and its affiliates. Except								as otherwise provided herein, you may not reproduce, perform, create								derivative works from, republish, upload, edit, post, transmit, or								distribute in any way whatsoever, any materials from the Site or any								other web site owned or operated by the Company without prior written								permission. Any modification of the materials contained on the								Site, or any portion thereof, or use of the web site for any other								purpose constitutes an infringement of the Company's copyrights and								other proprietary rights. Use of any materials contained on the								Site on any other web site or other networked computer environment is								prohibited without the Company's prior written permission. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">15. LINKED WEBSITES</a></p>
            <div class="txtGray invisibleFix">
              <p> The Company is not necessarily								affiliated with the web sites which may be linked to or from the Site								and is not responsible for their content. Links from the Site to								other linked web sites are for your convenience only and are not								intended to be referrals or endorsements of the linked web sites.								The Company does not assume any responsibility or liability for any								communications or materials available at other linked web sites and you								access them at your own risk. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">16. TERMINATION OF SERVICE</a></p>
            <div class="txtGray invisibleFix">
              <p> You understand and agree that the Company								may, in its sole discretion and at any time, terminate your use of the								Site. The Company may also, in its sole discretion and at any								time, discontinue or limit or restrict any user's access to the Site,								for any reason. The Company may, in its sole discretion and at any								time, alter, suspend, or discontinue, all or a portion of the Site,								including the availability of any feature and content. You understand								that the Company may take any one or more of these actions without prior								notice to you. Should the Company take any of these actions, it								may, in its sole discretion, immediately deactivate and/or delete any or								all information contained on the Site. You understand and agree								that the Company shall not have any liability to you or any other person								for any termination of your access to the Site, or removal of								information contained therein. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">17. DISCLAIMER</a></p>
            <div class="txtGray invisibleFix">
              <p> THE COMPANY DISCLAIMS ANY RESPONSIBILITY								FOR THE DELETION, THE FAILURE TO STORE, THE MISDELIVERY, OR THE UNTIMELY								DELIVERY OF ANY INFORMATION OR MATERIAL. THE COMPANY DISCLAIMS ANY								RESPONSIBILITY FOR, AND IF YOU SUBSCRIBE TO ONE OF OUR FEE-BASED								SERVICES YOU WILL NOT BE ENTITLED TO A REFUND AS A RESULT OF, ANY								SERVICE OUTAGES THAT ARE CAUSED BY OUR MAINTENANCE ON THE SERVERS OR THE								TECHNOLOGY THAT UNDERLIES OUR SITES, FAILURES OF OUR SERVICE PROVIDERS								(INCLUDING TELECOMMUNICATIONS, HOSTING, AND POWER PROVIDERS), COMPUTER								VIRUSES, NATURAL DISASTERS OR OTHER DESTRUCTION OR DAMAGE OF OUR								FACILITIE, ACTS OF NATURE, WAR, CIVIL DISTURBANCE, OR ANY OTHER CAUSE								BEYOND OUR REASONABLE CONTROL. THE COMPANY DISCLAIMS ANY WARRANTY AS TO								THE CONTENT OF THE SITE. THE SITE AND ANY MATERIALS CONTAINED								THEREIN ARE PROVIDED "AS IS" "WITH ALL FAULTS" AND "AS AVAILABLE" AND								WITHOUT WARRANTIES OF ANY KIND EITHER EXPRESS OR IMPLIED. TO THE								FULLEST EXTENT PERMISSIBLE PURSUANT TO APPLICABLE LAW, THE COMPANY								DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED								TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR								PURPOSE. THE COMPANY DOES NOT WARRANT THAT THE AVAILABILITY OF OR THE								FUNCTIONS CONTAINED ON THE SITE AND ANY MATERIALS CONTAINED THEREIN,								WILL BE UNINTERRUPTED OR ERROR-FREE, THAT DEFECTS WILL BE CORRECTED, OR								THAT THE SITE OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES								OR OTHER HARMFUL COMPONENTS OR THAT THE SITE AND ANY MATERIALS CONTAINED								THEREIN OR SERVER DO NOT VIOLATE ANY PATENT OR OTHER INTELLECTUAL								PROPERTY RIGHTS OF ANY PERSON. THE COMPANY DOES NOT WARRANT OR								MAKE ANY REPRESENTATIONS REGARDING THE USE OR THE RESULTS OF THE USE OF								THE SITE AND/OR ANY MATERIALS CONTAINED THEREIN, IN TERMS OF THEIR								CORRECTNESS, ACCURACY, RELIABILITY, OR OTHERWISE. YOU (AND NOT THE								COMPANY) ASSUME THE ENTIRE COST OF ALL NECESSARY SERVICING, REPAIR, OR								CORRECTION. ANY MATERIAL THAT YOU DOWNLOAD OR OTHERWISE OBTAIN								THROUGH THE SITE IS DONE AT YOUR OWN DISCRETION AND RISK, AND YOU WILL								BE SOLELY RESPONSIBLE FOR ANY POTENTIAL DAMAGES TO YOUR COMPUTER SYSTEM								OR LOSS OF DATA THAT RESULTS FROM YOUR DOWNLOAD OF ANY SUCH								MATERIAL. YOU AGREE THAT YOU WILL ASSUME THE ENTIRE RISK AS TO THE								QUALITY AND THE PERFORMANCE OF THE SITE AND THE ACCURACY OR								COMPLETENESS OF ITS CONTENT. APPLICABLE LAW MAY NOT ALLOW THE								EXCLUSION OF IMPLIED WARRANTIES, SO THE ABOVE EXCLUSION MAY NOT APPLY TO								YOU. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">18. LIMITATION OF LIABILITY</a></p>
            <div class="txtGray invisibleFix">
              <p> UNDER NO CIRCUMSTANCES, INCLUDING BUT NOT								LIMITED TO, NEGLIGENCE, SHALL THE COMPANY NOR OUR PARTNERS BE LIABLE								FOR ANY INDIRECT, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES THAT								RESULT FROM THE USE OF, OR THE INABILITY TO USE, THE SITE AND/OR ANY								MATERIALS CONTAINED THEREIN, EVEN IF THE COMPANY HAS BEEN ADVISED OF THE								POSSIBILITY OF SUCH DAMAGES. APPLICABLE LAW MAY NOT ALLOW THE								LIMITATION OR EXCLUSION OF LIABILITY OR EXEMPLARY, INCIDENTAL OR								CONSEQUENTIAL DAMAGES, SO THE ABOVE LIMITATION OR EXCLUSION MAY NOT								APPLY TO YOU. IN NO EVENT SHALL THE COMPANY'S TOTAL LIABILITY TO								YOU FOR ALL DAMAGES, LOSSES, AND CAUSES OF ACTION (WHETHER IN CONTRACT,								TORT (INCLUDING BUT NOT LIMITED TO, NEGLIGENCE OR OTHERWISE) EXCEED THE								AMOUNT PAID BY YOU, IF ANY, FOR ACCESSING THE SITE. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">19. INDEMNITY</a></p>
            <div class="txtGray invisibleFix">
              <p>You agree to indemnify, defend, and hold								harmless, the Company, its affiliates, officers, directors, employees,								consultants, agents, and representatives from any and all third party								claims, losses, liability, damages, and/or costs (including reasonable								attorney fees and costs) arising from your access to or use of the Site,								your violation of these Terms of Service, or your infringement, or								infringement by any other user of your account, of any intellectual								property or other right of any person or entity. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">20. SEVERABILITY</a></p>
            <div class="txtGray invisibleFix">
              <p> If, for any reason, a court of competent								jurisdiction finds any term or condition in these Terms of Service to								be unenforceable, all other terms and conditions will remain unaffected								and in full force and effect. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">21. COPYRIGHT INFRINGEMENT NOTICE</a></p>
            <div class="txtGray invisibleFix">
              <p>If you believe that any content appearing								on the Site has been copied in a way that constitutes copyright							infringement, please notify us and provide the following information: </p>
              <ul>
                <li>Your name, address, telephone number, and email address; </li>
                <li>A description of the copyrighted work that you claim has been infringed; </li>
                <li>The exact URL or a description of where the alleged infringing material is located; </li>
                <li>A statement by you that you									have a good faith belief that the disputed use is not authorized by the									copyright owner, its agent, or the law; </li>
                <li>An electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest; and </li>
                <li>A statement by									you, made under penalty of perjury, that the above information in your									notice is accurate and that you are the copyright owner or authorized to								act on the copyright owner's behalf. </li>
              </ul>
              <p>By this filing, the Company seeks to								preserve any and all exemptions from liability that may be available								under the copyright law, but not necessarily stipulate that it is a								service provider as defined in 17 U.S.C. section 512(c) or elsewhere in								the law. </p>
              <p> All copyright infringement communication should be addressed to: <br />
                <br />
                <span class="gAddress block"></span> </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">22. APPLICABLE LAW</a></p>
            <div class="txtGray invisibleFix">
              <p> These Terms of Service shall be governed								by and construed in accordance with the laws of Germany, without giving effect to any								principles of conflicts of law. You agree that any action at law or in								equity arising out of or relating to these terms shall be filed only in								the state courts located in Hamburg, Germany, and you hereby consent and submit to the personal								jurisdiction of such courts for the purposes of litigating any such								action. In no event shall you be entitled to injunctive or other								equitable relief. If any provision of these terms shall be								unlawful, void, or for any reason unenforceable, then that provision								shall be deemed severable from these terms and shall not affect the								validity and enforceability of any remaining provisions. YOU AGREE THAT								REGARDLESS OF ANY STATUTE OR LAW TO THE CONTRARY, ANY CLAIM OR CAUSE OF								ACTION ARISING OUT OF OR RELATED TO THE USE OF THE SITE OR THESE TERMS								OF SERVICE MUST BE FILED WITHIN ONE (1) YEAR AFTER SUCH CLAIM OR CAUSE								OF ACTION AROSE OR BE FOREVER BARRED. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">23. FORCE MAJEURE</a></p>
            <div class="txtGray invisibleFix">
              <p> You acknowledge and agree that we shall								not be responsible for any failures or delays in performing our								respective obligations hereunder arising from any cause beyond our								reasonable control, including but not limited to, acts of God, acts of								civil or military authority, fires, wars, riots, earthquakes, storms,								typhoons and floods. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">24. NOTICE</a></p>
            <div class="txtGray invisibleFix">
              <p> The Company may be required by state law to notify you of certain events. You hereby								acknowledge and consent that such notices will be effective upon our								posting them on the Site or delivering them to you through e-mail.								You may update your e-mail address by visiting Account Settings where								you have provided your contact information. If you do not provide								us with accurate information, we cannot be held liable if we fail to								notify you. You have the right to request that we provide such								notices to you in paper format, and may do so by e-mailing us at our <a href="/contacts">Contact</a> page. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">25. ENTIRE AGREEMENT</a></p>
            <div class="txtGray invisibleFix">
              <p> This Agreement, which includes these								Terms of Service along with the Privacy Policy, sets forth the entire								Agreement regarding to your use of the Site, and supersedes all prior								written agreements and all prior or contemporaneous oral agreement and								understandings, expressed or implied. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">26. NO MODIFICATION AND WAIVER</a></p>
            <div class="txtGray invisibleFix">
              <p> No modification to this Agreement, nor								any waiver of any rights, shall be effective unless posted on the Site,								and the waiver of any breach or default shall not constitute a waiver of								any other right or any subsequent breach or default. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">27. ACCEPTANCE OF AGREEMENT</a></p>
            <div class="txtGray invisibleFix">
              <p> BY USING OR ACCESSING THE SITE, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND <a href="/contact" rel="nofollow">PRIVACY POLICY </a> AND AGREE TO ALL THEIR TERMS AND CONDITIONS.</p>
              <p> QUESTIONS: Please <a href="/contact" rel="nofollow">contact us</a> if you have any questions concerning these Terms of Service. </p>
            </div>
            <div class="separator"></div>
            <p onclick="$(this).next().slideToggle();" class="txtBold"><a href="javascript:void(0);" class="block">28. US SECTION 230 UPDATE</a></p>
            <div class="txtGray invisibleFix">
              <p> This Site operates as an interactive computer service provider under federal law, and								permits individuals to communicate with each other in various ways. As with any human								interaction, some individuals may seek to abuse the Site, and its networking services, to								annoy, harass, or otherwise harm other users. </p>
              <p> We do not tolerate such abuse, and any user engaging in such								conduct risks termination and potential civil or criminal liability.								This notification shall serve as a warning to our users of the potential for misuse of our								services. </p>
              <p> We urge you to use common sense when interacting with individuals through the								Site, and to report any instances of misconduct to <a href="/contact/" rel="nofollow" class="txtBlack txtBold">customer support</a>. </p>
            </div>
            <div class="separator"></div>
            <p>Last revised on 1 August 2017.</p>
            <p class="txtCenter txt14">If you have any questions, please <a class="txtBlack txtBold" href="/about/contact/">Contact us</a>!</p>
          </div>
          <p class="txtCenter txtWhite ">Eu tenho pelo menos 18 anos e leio e concordo <BR>
            para a Política de Termos e Condições e Cookies.</p>
          <div class="clear">
            <div class="floatLeft split0"> <a class="welcomeEnterButton txt16 mrgLeft block" href="#"data-dismiss="modal">Eu Concordo</a> </div>
          </div>
          <div class="clear txtCenter mrgTop2 txtGray"> <a href="//google.com/" onclick="ga('send', 'event', 'agree', 'click', 'disagree');">EU NÃO CONCORDO</a> </div>
        </div>
      </div>
    </div>
    <div class="welcomeMask"></div>
  </div>
</div>

        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>	