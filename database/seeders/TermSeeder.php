<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebTerm;
use DB;

class TermSeeder extends Seeder
{
     
    public function run()
    {
        $term = WebTerm::first();

        if($term){
            goto end;

        }
        
        \DB::table('web_terms')->insert(array (
            0 => 
            array (
            'hero_bg' => 'term.jpeg',
            'terms' => '<h2><strong>Terms and Conditions</strong></h2>

            <p>END USER LICENSE AGREEMENT</p>

            <p>Last updated May 16, 2021</p>

            <p>tyt,LLC is licensed to You (End-User) by tyt, LLC, located at 6255 Towncenter Drive Ste 819, Clemmons, North Carolina 27012, United States (hereinafter: Licensor), for use only under the terms of this License Agreement.<br />
            <br />
            By downloading the Application from the Apple AppStore and Google Play, and any update thereto (as permitted by this License Agreement), You indicate that You agree to be bound by all of the terms and conditions of this License Agreement, and that You accept this License Agreement.<br />
            <br />
            The parties of this License Agreement acknowledge that Apple and/or Google Play is not a Party to this License Agreement and is not bound by any provisions or obligations with regard to the Application, such as warranty, liability, maintenance and support thereof. tyt, LLC, not Apple or Google Play, is solely responsible for the licensed Application and the content thereof.<br />
            <br />
            This License Agreement may not provide for usage rules for the Application that are in conflict with the latest App Store Terms of Service. tyt, LLC acknowledges that it had the opportunity to review said terms and this License Agreement is not conflicting with them.<br />
            <br />
            All rights not expressly granted to You are reserved.</p>

            <p>1. THE APPLICATION</p>

            <p>tyt (hereinafter: Application) is a piece of software is a Rideshare platform - and customized for Apple and Android mobile devices. It is used to Connecting riders to drivers to get to point A to B by a push of a button.<br />
            <br />
            The Application is not tailored to comply with industry-specific regulations (Health Insurance Portability and Accountability Act (HIPAA), Federal Information Security Management Act (FISMA), etc.), so if your interactions would be subjected to such laws, you may not use this Application. You may not use the Application in a way that would violate the Gramm-Leach-Bliley Act (GLBA).</p>

            <p>2. SCOPE OF LICENSE</p>

            <p>2.1 You are given a non-transferable, non-exclusive, non-sublicensable license to install and use the Licensed Application on any Apple-branded or Google Products that You (End-User) own or control and as permitted by the Usage Rules set forth in this section and the App Store Terms of Service, with the exception that such licensed Application may be accessed and used by other accounts associated with You (End-User, The Purchaser) via Family Sharing or volume purchasing.<br />
            <br />
            2.2 This license will also govern any updates of the Application provided by Licensor that replace, repair, and/or supplement the first Application, unless a separate license is provided for such update in which case the terms of that new license will govern.<br />
            <br />
            2.3 You may not share or make the Application available to third parties (unless to the degree allowed by the Apple Terms and Conditions, and with tyt, LLC&#39;s prior written consent), sell, rent, lend, lease or otherwise redistribute the Application.<br />
            <br />
            2.4 You may not reverse engineer, translate, disassemble, integrate, decompile, integrate, remove, modify, combine, create derivative works or updates of, adapt, or attempt to derive the source code of the Application, or any part thereof (except with tyt, LLC&#39;s prior written consent).<br />
            <br />
            2.5 You may not copy (excluding when expressly authorized by this license and the Usage Rules) or alter the Application or portions thereof. You may create and store copies only on devices that You own or control for backup keeping under the terms of this license, the App Store Terms of Service, and any other terms and conditions that apply to the device or software used. You may not remove any intellectual property notices. You acknowledge that no unauthorized third parties may gain access to these copies at any time.<br />
            <br />
            2.6 Violations of the obligations mentioned above, as well as the attempt of such infringement, may be subject to prosecution and damages.<br />
            <br />
            2.7 Licensor reserves the right to modify the terms and conditions of licensing.<br />
            <br />
            2.8 Nothing in this license should be interpreted to restrict third-party terms. When using the Application, You must ensure that You comply with applicable third-party terms and conditions.</p>

            <p>3. TECHNICAL REQUIREMENTS</p>

            <p>3.1 Licensor attempts to keep the Application updated so that it complies with modified/new versions of the firmware and new hardware. You are not granted rights to claim such an update.<br />
            <br />
            3.2 You acknowledge that it is Your responsibility to confirm and determine that the app end-user device on which You intend to use the Application satisfies the technical specifications mentioned above.<br />
            <br />
            3.3 Licensor reserves the right to modify the technical specifications as it sees appropriate at any time.</p>

            <p>4. MAINTENANCE AND SUPPORT</p>

            <p>4.1 The Licensor is solely responsible for providing any maintenance and support services for this licensed Application. You can reach the Licensor at the email address listed in the App Store or Google Play Overview for this licensed Application.<br />
            <br />
            4.2 tyt, LLC and the End-User acknowledge that Apple and or Google Play has no obligation whatsoever to furnish any maintenance and support services with respect to the licensed Application.</p>

            <p>5. USE OF DATA</p>

            <p>You acknowledge that Licensor will be able to access and adjust Your downloaded licensed Application content and Your personal information, and that Licensor&#39;s use of such material and information is subject to Your legal agreements with Licensor and Licensor&#39;s privacy policy: http://www.tyt.us/privacy.</p>

            <p>6. USER GENERATED CONTRIBUTIONS</p>

            <p>The Application may invite you to chat, contribute to, or participate in blogs, message boards, online forums, and other functionality, and may provide you with the opportunity to create, submit, post, display, transmit, perform, publish, distribute, or broadcast content and materials to us or in the Application, including but not limited to text, writings, video, audio, photographs, graphics, comments, suggestions, or personal information or other material (collectively, &quot;Contributions&quot;). Contributions may be viewable by other users of the Application and through third-party websites or applications. As such, any Contributions you transmit may be treated as non-confidential and non-proprietary. When you create or make available any Contributions, you thereby represent and warrant that:<br />
            <br />
            1. The creation, distribution, transmission, public display, or performance, and the accessing, downloading, or copying of your Contributions do not and will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark, trade secret, or moral rights of any third party.<br />
            <br />
            2. You are the creator and owner of or have the necessary licenses, rights, consents, releases, and permissions to use and to authorize us, the Application, and other users of the Application to use your Contributions in any manner contemplated by the Application and these Terms of Use.<br />
            <br />
            3. You have the written consent, release, and/or permission of each and every identifiable individual person in your Contributions to use the name or likeness or each and every such identifiable individual person to enable inclusion and use of your Contributions in any manner contemplated by the Application and these Terms of Use.<br />
            <br />
            4. Your Contributions are not false, inaccurate, or misleading.<br />
            <br />
            5. Your Contributions are not unsolicited or unauthorized advertising, promotional materials, pyramid schemes, chain letters, spam, mass mailings, or other forms of solicitation.<br />
            <br />
            6. Your Contributions are not obscene, lewd, lascivious, filthy, violent, harassing, libelous, slanderous, or otherwise objectionable (as determined by us).<br />
            <br />
            7. Your Contributions do not ridicule, mock, disparage, intimidate, or abuse anyone.<br />
            <br />
            8. Your Contributions are not used to harass or threaten (in the legal sense of those terms) any other person and to promote violence against a specific person or class of people.<br />
            <br />
            9. Your Contributions do not violate any applicable law, regulation, or rule.<br />
            <br />
            10. Your Contributions do not violate the privacy or publicity rights of any third party.<br />
            <br />
            11. Your Contributions do not contain any material that solicits personal information from anyone under the age of 18 or exploits people under the age of 18 in a sexual or violent manner.<br />
            <br />
            12. Your Contributions do not violate any applicable law concerning child pornography, or otherwise intended to protect the health or well-being of minors.<br />
            <br />
            13. Your Contributions do not include any offensive comments that are connected to race, national origin, gender, sexual preference, or physical handicap.<br />
            <br />
            14. Your Contributions do not otherwise violate, or link to material that violates, any provision of these Terms of Use, or any applicable law or regulation.<br />
            <br />
            Any use of the Application in violation of the foregoing violates these Terms of Use and may result in, among other things, termination or suspension of your rights to use the Application.</p>

            <p>7. CONTRIBUTION LICENSE</p>

            <p>By posting your Contributions to any part of the Application or making Contributions accessible to the Application by linking your account from the Application to any of your social networking accounts, you automatically grant, and you represent and warrant that you have the right to grant, to us an unrestricted, unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid, worldwide right, and license to host, use copy, reproduce, disclose, sell, resell, publish, broad cast, retitle, archive, store, cache, publicly display, reformat, translate, transmit, excerpt (in whole or in part), and distribute such Contributions (including, without limitation, your image and voice) for any purpose, commercial advertising, or otherwise, and to prepare derivative works of, or incorporate in other works, such as Contributions, and grant and authorize sublicenses of the foregoing. The use and distribution may occur in any media formats and through any media channels.<br />
            <br />
            This license will apply to any form, media, or technology now known or hereafter developed, and includes our use of your name, company name, and franchise name, as applicable, and any of the trademarks, service marks, trade names, logos, and personal and commercial images you provide. You waive all moral rights in your Contributions, and you warrant that moral rights have not otherwise been asserted in your Contributions.<br />
            <br />
            We do not assert any ownership over your Contributions. You retain full ownership of all of your Contributions and any intellectual property rights or other proprietary rights associated with your Contributions. We are not liable for any statements or representations in your Contributions provided by you in any area in the Application. You are solely responsible for your Contributions to the Application and you expressly agree to exonerate us from any and all responsibility and to refrain from any legal action against us regarding your Contributions.<br />
            <br />
            We have the right, in our sole and absolute discretion, (1) to edit, redact, or otherwise change any Contributions; (2) to re-categorize any Contributions to place them in more appropriate locations in the Application; and (3) to pre-screen or delete any Contributions at any time and for any reason, without notice. We have no obligation to monitor your Contributions.</p>

            <p>8. LIABILITY</p>

            <p>8.1 Licensor&#39;s responsibility in the case of violation of obligations and tort shall be limited to intent and gross negligence. Only in case of a breach of essential contractual duties (cardinal obligations), Licensor shall also be liable in case of slight negligence. In any case, liability shall be limited to the foreseeable, contractually typical damages. The limitation mentioned above does not apply to injuries to life, limb, or health.<br />
            <br />
            8.2 Licensor takes no accountability or responsibility for any damages caused due to a breach of duties according to Section 2 of this Agreement. To avoid data loss, You are required to make use of backup functions of the Application to the extent allowed by applicable third-party terms and conditions of use. You are aware that in case of alterations or manipulations of the Application, You will not have access to licensed Application.</p>

            <p>9. WARRANTY</p>

            <p>9.1 Licensor warrants that the Application is free of spyware, trojan horses, viruses, or any other malware at the time of Your download. Licensor warrants that the Application works as described in the user documentation.<br />
            <br />
            9.2 No warranty is provided for the Application that is not executable on the device, that has been unauthorizedly modified, handled inappropriately or culpably, combined or installed with inappropriate hardware or software, used with inappropriate accessories, regardless if by Yourself or by third parties, or if there are any other reasons outside of tyt, LLC&#39;s sphere of influence that affect the executability of the Application.<br />
            <br />
            9.3 You are required to inspect the Application immediately after installing it and notify tyt, LLC about issues discovered without delay by e-mail provided in Product Claims. The defect report will be taken into consideration and further investigated if it has been mailed within a period of ninety (90) days after discovery.<br />
            <br />
            9.4 If we confirm that the Application is defective, tyt, LLC reserves a choice to remedy the situation either by means of solving the defect or substitute delivery.<br />
            <br />
            9.5 In the event of any failure of the Application to conform to any applicable warranty, You may notify the App-Store-Operator, and Your Application purchase price will be refunded to You. To the maximum extent permitted by applicable law, the App-Store-Operator will have no other warranty obligation whatsoever with respect to the App, and any other losses, claims, damages, liabilities, expenses and costs attributable to any negligence to adhere to any warranty.<br />
            <br />
            9.6 If the user is an entrepreneur, any claim based on faults expires after a statutory period of limitation amounting to twelve (12) months after the Application was made available to the user. The statutory periods of limitation given by law apply for users who are consumers.</p>

            <p>10. PRODUCT CLAIMS</p>

            <p>tyt, LLC and the End-User acknowledge that tyt, LLC, and not Apple, is responsible for addressing any claims of the End-User or any third party relating to the licensed Application or the End-User&rsquo;s possession and/or use of that licensed Application, including, but not limited to:<br />
            <br />
            (i) product liability claims;<br />
            <br />
            (ii) any claim that the licensed Application fails to conform to any applicable legal or regulatory requirement; and<br />
            <br />
            (iii) claims arising under consumer protection, privacy, or similar legislation, including in connection with Your Licensed Application&rsquo;s use.</p>

            <p>11. LEGAL COMPLIANCE</p>

            <p>You represent and warrant that You are not located in a country that is subject to a U.S. Government embargo, or that has been designated by the U.S. Government as a &quot;terrorist supporting&quot; country; and that You are not listed on any U.S. Government list of prohibited or restricted parties.</p>

            <p>12. CONTACT INFORMATION</p>

            <p>For general inquiries, complaints, questions or claims concerning the licensed Application, please contact:<br />
            <br />
            <strong>tyt, LLC<br />
            6255 Towncenter Drive Ste 819<br />
            Clemmons, NC 27012<br />
            United States<br />
            support@tyt.us </strong></p>

            <p>13. TERMINATION</p>

            <p>The license is valid until terminated by tyt, LLC or by You. Your rights under this license will terminate automatically and without notice from tyt, LLC if You fail to adhere to any term(s) of this license. Upon License termination, You shall stop all use of the Application, and destroy all copies, full or partial, of the Application.</p>

            <p>14. THIRD-PARTY TERMS OF AGREEMENTS AND BENEFICIARY</p>

            <p>tyt, LLC represents and warrants that tyt, LLC will comply with applicable third-party terms of agreement when using licensed Application.<br />
            <br />
            In Accordance with Section 9 of the &quot;Instructions for Minimum Terms of Developer&#39;s End-User License Agreement,&quot; Apple and Apple&#39;s subsidiaries shall be third-party beneficiaries of this End User License Agreement and - upon Your acceptance of the terms and conditions of this license agreement, Apple will have the right (and will be deemed to have accepted the right) to enforce this End User License Agreement against You as a third-party beneficiary thereof.</p>

            <p>15. INTELLECTUAL PROPERTY RIGHTS</p>

            <p>tyt, LLC and the End-User acknowledge that, in the event of any third-party claim that the licensed Application or the End-User&#39;s possession and use of that licensed Application infringes on the third party&#39;s intellectual property rights, tyt, LLC, and not Apple, will be solely responsible for the investigation, defense, settlement and discharge or any such intellectual property infringement claims.</p>

            <p>16. APPLICABLE LAW</p>

            <p>This license agreement is governed by the laws of the State of North Carolina excluding its conflicts of law rules.</p>

            <p>17. MISCELLANEOUS</p>

            <p>17.1 If any of the terms of this agreement should be or become invalid, the validity of the remaining provisions shall not be affected. Invalid terms will be replaced by valid ones formulated in a way that will achieve the primary purpose.<br />
            <br />
            17.2 Collateral agreements, changes and amendments are only valid if laid down in writing. The preceding clause can only be waived in writing.</p>',
        ),
    ));


end:
        
    }
}
