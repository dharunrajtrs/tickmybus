<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebPrivacy;
use DB;

class PrivacySeeder extends Seeder
{
     
    public function run()
    {
        $privacy = WebPrivacy::first();

        if($privacy){
            goto end;

        }
        
        \DB::table('web_privacys')->insert(array (
            0 => 
            array (
            'hero_bg' => 'privacy.jpg',
            'privacy' => '<h2>Privacy Policy</h2>

            <p>The Scope of This Policy</p>
            
            <p>This policy applies to all tyt users, including Riders and Drivers (including Driver applicants), and to all tyt platforms and services, including our apps, websites, features, and other services (collectively, the &ldquo;tyt Platform&rdquo;). Please remember that your use of the tyt Platform is also subject to our Terms of Service.</p>
            
            <p>The Information We Collect</p>
            
            <p>When you use the tyt Platform, we collect the information you provide, usage information, and information about your device. We also collect information about you from other sources like third-party services, and optional programs in which you participate, which we may combine with other information we have about you. Here are the types of information we collect about you:</p>
            
            <p>A. Information You Provide to Us</p>
            
            <p>Account Registration. When you create an account with tyt, we collect the information you provide us, such as your name, email address, phone number, and payment information. You may choose to share additional info with us for your Rider profile, like your photo or saved addresses (e.g., home or work), and set up other preferences (such as your preferred pronouns).<br />
            <br />
            <strong>Driver Information.</strong> If you apply to be a Driver, we will collect the information you provide in your application, including your name, email address, phone number, birth date, profile photo, physical address, government identification number (such as social security number), driver&rsquo;s license information, vehicle information, and car insurance information. We collect the payment information you provide us, including your bank routing numbers, and tax information. Depending on where you want to drive, we may also ask for additional business license or permit information or other information to manage driving and programs relevant to that location. We may need additional information from you at some point after you become a Driver, including information to confirm your identity (like a photo).<br />
            <br />
            <strong>SOS Contact Information</strong> We will collect the contact list permission to list the contacts while adding the sos contacts for user & driver app<br />
            <br />
            <strong>Ratings and Feedback.</strong> When you rate and provide feedback about Riders or Drivers, we collect all of the information you provide in your feedback.<br />
            <br />
            <strong>Communications.</strong> When you contact us or we contact you, we collect any information that you provide, including the contents of the messages or attachments you send us.</p>
            
            <p>B. Information We Collect When You Use the tyt Platform</p>
            
            <p><strong>Location Information.</strong> Great rides start with an easy and accurate pickup. The tyt Platform collects location information (including GPS and WiFi data) differently depending on your tyt app settings and device permissions as well as whether you are using the platform as a Rider or Driver:</p>
            
            <ul>
            <li>Riders: We collect your device&rsquo;s precise location when you open and use the tyt app, including while the app is running in the background from the time you request a ride until it ends. tyt also tracks the precise location of scooters and e-bikes at all times.</li>
            <li>Drivers: We collect your device&rsquo;s precise location when you open and use the app, including while the app is running in the background when it is in driver mode. We also collect precise location for a limited time after you exit driver mode in order to detect ride incidents, and continue collecting it until a reported or detected incident is no longer active.</li>
            </ul>
            
            <p><strong>Usage Information.</strong> We collect information about your use of the tyt Platform, including ride information like the date, time, destination, distance, route, payment, and whether you used a promotional or referral code. We also collect information about your interactions with the tyt Platform like our apps and websites, including the pages and content you view and the dates and times of your use.<br />
            <br />
            <strong>Device Information.</strong> We collect information about the devices you use to access the tyt Platform, including device model, IP address, type of browser, version of operating system, identity of carrier and manufacturer, radio type (such as 4G), preferences and settings (such as preferred language), application installations, device identifiers, advertising identifiers, and push notification tokens. If you are a Driver, we also collect mobile sensor data from your device (such as speed, direction, height, acceleration, deceleration, and other technical data).<br />
            <br />
            <strong>Communications Between Riders and Drivers.</strong> We work with a third party to facilitate phone calls and text messages between Riders and Drivers without sharing either party&rsquo;s actual phone number with the other. But while we use a third party to provide the communication service, we collect information about these communications, including the participants&rsquo; phone numbers, the date and time, and the contents of SMS messages. For security purposes, we may also monitor or record the contents of phone calls made through the tyt Platform, but we will always let you know we are about to do so before the call begins.<br />
            <br />
            <strong>Address Book Contacts.</strong> You may set your device permissions to grant tyt access to your contact lists and direct tyt to access your contact list, for example to help you refer friends to tyt. If you do this, we will access and store the names and contact information of the people in your address book.<br />
            <br />
            <strong>Cookies, Analytics, and Third-Party Technologies.</strong> We collect information through the use of &ldquo;cookies&rdquo;, tracking pixels, data analytics tools like Google Analytics, SDKs, and other third-party technologies to understand how you navigate through the tyt Platform and interact with tyt advertisements, to make your tyt experience safer, to learn what content is popular, to improve your site experience, to serve you better ads on other sites, and to save your preferences. Cookies are small text files that web servers place on your device; they are designed to store basic information and to help websites and apps recognize your browser. We may use both session cookies and persistent cookies. A session cookie disappears after you close your browser. A persistent cookie remains after you close your browser and may be accessed every time you use the tyt Platform. You should consult your web browser(s) to modify your cookie settings. Please note that if you delete or choose not to accept cookies from us, you may miss out on certain features of the tyt Platform.</p>
            
            <p>C. Information We Collect from Third Parties</p>
            
            <p><strong>Third-Party Services.</strong> Third-party services provide us with information needed for core aspects of the tyt Platform, as well as for additional services, programs, loyalty benefits, and promotions that can enhance your tyt experience. These third-party services include background check providers, insurance partners, financial service providers, marketing providers, and other businesses. We obtain the following information about you from these third-party services:</p>
            
            <ul>
            <li>Information to make the tyt Platform safer, like background check information for drivers;</li>
            <li>Information about your participation in third-party programs that provide things like insurance coverage and financial instruments, such as insurance, payment, transaction, and fraud detection information;</li>
            <li>Information to operationalize loyalty and promotional programs or applications, services, or features you choose to connect or link to your tyt account, such as information about your use of such programs, applications, services, or features; and</li>
            <li>Information about you provided by specific services, such as demographic and market segment information.</li>
            </ul>
            
            <p><strong>Enterprise Programs.</strong> If you use tyt through your employer or other organization that participates in one of our tyt Business enterprise programs, we will collect information about you from those parties, such as your name and contact information.<br />
            <br />
            <strong>Concierge Service.</strong> Sometimes another business or entity may order you a tyt ride. If an organization has ordered a ride for you using our Concierge service, they will provide us your contact information and the pickup and drop-off location of your ride.<br />
            <br />
            <strong>Referral Programs.</strong> Friends help friends use the tyt Platform. If someone refers you to tyt, we will collect information about you from that referral including your name and contact information.<br />
            <br />
            <strong>Other Users and Sources.</strong> Other users or public or third-party sources such as law enforcement, insurers, media, or pedestrians may provide us information about you, for example as part of an investigation into an incident or to provide you support.</p>
            
            <p>How We Use Your Information</p>
            
            <p>We use your personal information to:</p>
            
            <ul>
            <li>Provide the tyt Platform;</li>
            <li>Maintain the security and safety of the tyt Platform and its users;</li>
            <li>Build and maintain the tyt community;</li>
            <li>Provide customer support;</li>
            <li>Improve the tyt Platform; and</li>
            <li>Respond to legal proceedings and obligations.</li>
            </ul>
            
            <p><strong>Providing the tyt Platform.</strong> We use your personal information to provide an intuitive, useful, efficient, and worthwhile experience on our platform. To do this, we use your personal information to:</p>
            
            <ul>
            <li>Verify your identity and maintain your account, settings, and preferences;</li>
            <li>Connect you to your rides and track their progress;</li>
            <li>Calculate prices and process payments;</li>
            <li>Allow Riders and Drivers to connect regarding their ride and to choose to share their location with others;</li>
            <li>Communicate with you about your rides and experience;</li>
            <li>Collect feedback regarding your experience;</li>
            <li>Facilitate additional services and programs with third parties; and</li>
            <li>Operate contests, sweepstakes, and other promotions.</li>
            </ul>
            
            <p><strong>Maintaining the Security and Safety of the tyt Platform and its Users.</strong> Providing you a secure and safe experience drives our platform, both on the road and on our apps. To do this, we use your personal information to:</p>
            
            <ul>
            <li>Authenticate users;</li>
            <li>Verify that Drivers and their vehicles meet safety requirements;</li>
            <li>Investigate and resolve incidents, accidents, and insurance claims;</li>
            <li>Encourage safe driving behavior and avoid unsafe activities;</li>
            <li>Find and prevent fraud; and</li>
            <li>Block and remove unsafe or fraudulent users from the tyt Platform.</li>
            </ul>
            
            <p><strong>Building and Maintaining the tyt Community.</strong> tyt works to be a positive part of the community. We use your personal information to:</p>
            
            <ul>
            <li>Communicate with you about events, promotions, elections, and campaigns;</li>
            <li>Personalize and provide content, experiences, communications, and advertising to promote and grow the tyt Platform; and</li>
            <li>Help facilitate donations you choose to make through the tyt Platform.</li>
            </ul>
            
            <p><strong>Providing Customer Support.</strong> We work hard to provide the best experience possible, including supporting you when you need it. To do this, we use your personal information to:</p>
            
            <ul>
            <li>Investigate and assist you in resolving questions or issues you have regarding the tyt Platform; and</li>
            <li>Provide you support or respond to you.</li>
            </ul>
            
            <p><strong>Improving the tyt Platform</strong>. We are always working to improve your experience and provide you with new and helpful features. To do this, we use your personal information to:</p>
            
            <ul>
            <li>Perform research, testing, and analysis;</li>
            <li>Develop new products, features, partnerships, and services;</li>
            <li>Prevent, find, and resolve software or hardware bugs and issues; and</li>
            <li>Monitor and improve our operations and processes, including security practices, algorithms, and other modeling.</li>
            </ul>
            
            <p><strong>Responding to Legal Proceedings and Requirements.</strong> Sometimes the law, government entities, or other regulatory bodies impose demands and obligations on us with respect to the services we seek to provide. In such a circumstance, we may use your personal information to respond to those demands or obligations.</p>
            
            <p>How We Share Your Information</p>
            
            <p>We do not sell your personal information. To make the tyt Platform work, we may need to share your personal information with other users, third parties, and service providers. This section explains when and why we share your information.</p>
            
            <p>A. Sharing Between tyt Users</p>
            
            <p>Riders and Drivers.<br />
            <br />
            <strong>Rider information shared with Driver:</strong> Upon receiving a ride request, we share with the Driver the Rider&rsquo;s pickup location, name, profile photo, rating, Rider statistics (like approximate number of rides and years as a Rider), and information the Rider includes in their Rider profile (like preferred pronouns). Upon pickup and during the ride, we share with the Driver the Rider&rsquo;s destination and any additional stops the Rider inputs into the tyt app. Once the ride is finished, we also eventually share the Rider&rsquo;s rating and feedback with the Driver. (We remove the Rider&rsquo;s identity associated with ratings and feedback when we share it with Drivers, but a Driver may be able to identify the Rider that provided the rating or feedback.)<br />
            <br />
            <strong>Driver information shared with Rider:</strong> Upon a Driver accepting a requested ride, we will share with the Rider the Driver&rsquo;s name, profile photo, preferred pronouns, rating, real-time location, and the vehicle make, model, color, and license plate, as well as other information in the Driver&rsquo;s tyt profile, such as information Drivers choose to add (like country flag and why you drive) and Driver statistics (like approximate number of rides and years as a Driver).<br />
            <br />
            Although we help Riders and Drivers communicate with one another to arrange a pickup, we do not share your actual phone number or other contact information with other users. If you report a lost or found item to us, we will seek to connect you with the relevant Rider or Driver, including sharing actual contact information with your consent.<br />
            <br />
            <strong>Shared Ride Riders.</strong> When Riders use a tyt Shared ride, we share each Rider&rsquo;s name and profile picture to ensure safety. Riders may also see each other&rsquo;s pickup and drop-off locations as part of knowing the route while sharing the ride.<br />
            <br />
            <strong>Rides Requested or Paid For by Others.</strong> Some rides you take may be requested or paid for by others. If you take one of those rides using your tyt Business Profile account, a code or coupon, a subsidized program (e.g., transit or government), or a corporate credit card linked to another account, or another user otherwise requests or pays for a ride for you, we may share some or all of your ride details with that other party, including the date, time, charge, rating given, region of trip, and pick up and drop off location of your ride.<br />
            <br />
            <strong>Referral Programs.</strong> If you refer someone to the tyt Platform, we will let them know that you generated the referral. If another user referred you, we may share information about your use of the tyt Platform with that user. For example, a referral source may receive a bonus when you join the tyt Platform or complete a certain number of rides and would receive such information.</p>
            
            <p>B. Sharing With Third-Party Service Providers for Business Purposes</p>
            
            <p>Depending on whether you&rsquo;re a Rider or a Driver, tyt may share the following categories of your personal information for a business purpose to provide you with a variety of the tyt Platform&rsquo;s features and services:</p>
            
            <ul>
            <li>Personal identifiers, such as your name, address, email address, phone number, date of birth, government identification number (such as social security number), driver&rsquo;s license information, vehicle information, and car insurance information;</li>
            <li>Financial information, such as bank routing numbers, tax information, and any other payment information you provide us;</li>
            <li>Commercial information, such as ride information, Driver/Rider statistics and feedback, and Driver/Rider transaction history;</li>
            <li>Internet or other electronic network activity information, such as your IP address, type of browser, version of operating system, carrier and/or manufacturer, device identifiers, and mobile advertising identifiers; and</li>
            <li>Location data.</li>
            </ul>
            
            <p>We disclose those categories of personal information to service providers to fulfill the following business purposes:</p>
            
            <ul>
            <li>Maintaining and servicing your tyt account;</li>
            <li>Processing or fulfilling rides;</li>
            <li>Providing you customer service;</li>
            <li>Processing Rider transactions;</li>
            <li>Processing Driver applications and payments;</li>
            <li>Verifying the identity of users;</li>
            <li>Detecting and preventing fraud;</li>
            <li>Processing insurance claims;</li>
            <li>Providing Driver loyalty and promotional programs;</li>
            <li>Providing marketing and advertising services to tyt;</li>
            <li>Providing financing;</li>
            <li>Providing requested emergency services;</li>
            <li>Providing analytics services to tyt; and</li>
            <li>Undertaking internal research to develop the tyt Platform.</li>
            </ul>
            
            <p>C. For Legal Reasons and to Protect the tyt Platform</p>
            
            <ul>
            <li>Comply with any applicable federal, state, or local law or regulation, civil, criminal or regulatory inquiry, investigation or legal process, or enforceable governmental request;</li>
            <li>Respond to legal process (such as a search warrant, subpoena, summons, or court order);</li>
            <li>Enforce our Terms of Service;</li>
            <li>Cooperate with law enforcement agencies concerning conduct or activity that we reasonably and in good faith believe may violate federal, state, or local law; or</li>
            <li>Exercise or defend legal claims, protect against harm to our rights, property, interests, or safety or the rights, property, interests, or safety of you, third parties, or the public as required or permitted by law.</li>
            </ul>
            
            <p>D. In Connection with Sale or Merger</p>
            
            <p>We may share your personal information while negotiating or in relation to a change of corporate control such as a restructuring, merger, or sale of our assets.</p>
            
            <p>E. Upon Your Further Direction</p>
            
            <p>With your permission or upon your direction, we may disclose your personal information to interact with a third party or for other purposes.</p>
            
            <p>How We Store and Protect Your Information</p>
            
            <p>We retain your information for as long as necessary to provide you and our other users the tyt Platform. This means we keep your profile information for as long as you maintain an account. We retain transactional information such as rides and payments for at least seven years to ensure we can perform legitimate business functions, such as accounting for tax obligations. If you request account deletion, we will delete your information as set forth in the &ldquo;Deleting Your Account&rdquo; section below. We take reasonable and appropriate measures designed to protect your personal information. But no security measures can be 100% effective, and we cannot guarantee the security of your information, including against unauthorized intrusions or acts by third parties.</p>
            
            <p>Your Rights And Choices Regarding Your Data</p>
            
            <p>tyt provides ways for you to access and delete your personal information as well as exercise other data rights that give you certain control over your personal information.</p>
            
            <p>A. All Users</p>
            
            <p>Email Subscriptions. You can always unsubscribe from our commercial or promotional emails by clicking unsubscribe in those messages. We will still send you transactional and relational emails about your use of the tyt Platform.<br />
            <br />
            <strong>Text Messages.</strong> You can opt out of receiving commercial or promotional text. You may also opt out of receiving all texts from tyt (including transactional or relational messages. Note that opting out of receiving all texts may impact your use of the tyt Platform. Drivers can also opt out of driver-specific messages by texting STOP in response to a driver SMS. To re-enable texts you can text START in response to an unsubscribe confirmation SMS.<br />
            <br />
            <strong>Push Notifications.</strong> You can opt out of receiving push notifications through your device settings. Please note that opting out of receiving push notifications may impact your use of the tyt Platform (such as receiving a notification that your ride has arrived).<br />
            <br />
            <strong>Profile Information</strong>. You can review and edit certain account information you have chosen to add to your profile by logging in to your account settings and profile.<br />
            <br />
            <strong>Location Information.</strong> You can prevent your device from sharing location information through your device&rsquo;s system settings. But if you do, this may impact tyt&rsquo;s ability to provide you our full range of features and services.<br />
            <br />
            <strong>Cookie Tracking.</strong> You can modify your cookie settings on your browser, but if you delete or choose not to accept our cookies, you may be missing out on certain features of the tyt Platform.<br />
            <br />
            <strong>Do Not Track.</strong> Your browser may offer you a &ldquo;Do Not Track&rdquo; option, which allows you to signal to operators of websites and web applications and services that you do not want them to track your online activities. The tyt Platform does not currently support Do Not Track requests at this time.<br />
            <br />
            <strong>Deleting Your Account.</strong> If you would like to delete your tyt account, please visit our privacy homepage. In some cases, we will be unable to delete your account, such as if there is an issue with your account related to trust, safety, or fraud. When we delete your account, we may retain certain information for legitimate business purposes or to comply with legal or regulatory obligations. For example, we may retain your information to resolve open insurance claims, or we may be obligated to retain your information as part of an open legal claim. When we retain such data, we do so in ways designed to prevent its use for other purposes.<br />
            <br />
            <strong>Right to Know.</strong> You have the right to know and see what data we have collected about, including:</p>
            
            <ul>
            <li>The categories of personal information we have collected about you;</li>
            <li>The categories of sources from which the personal information is collected;</li>
            <li>The business or commercial purpose for collecting your personal information;</li>
            <li>The categories of third parties with whom we have shared your personal information; and</li>
            <li>The specific pieces of personal information we have collected about you.</li>
            </ul>
            
            <p><strong>Right to Delete.</strong> You have the right to request that we delete the personal information we have collected from you (and direct our service providers to do the same). There are a number of exceptions, however, that include, but are not limited to, when the information is necessary for us or a third party to do any of the following:</p>
            
            <ul>
            <li>Complete your transaction;</li>
            <li>Provide you a good or service;</li>
            <li>Perform a contract between us and you;</li>
            <li>Protect your security and prosecute those responsible for breaching it;</li>
            <li>Fix our system in the case of a bug;</li>
            <li>Protect the free speech rights of you or other users;</li>
            <li>Engage in public or peer-reviewed scientific, historical, or statistical research in the public interests that adheres to all other applicable ethics and privacy laws;</li>
            <li>Comply with a legal obligation; or</li>
            <li>Make other internal and lawful uses of the information that are compatible with the context in which you provided it.</li>
            </ul>
            
            <p><strong>Other Rights.</strong> You can request certain information about our disclosure of personal information to third parties for their own direct marketing purposes during the preceding calendar year. This request is free and may be made once a year. You also have the right not to be discriminated against for exercising any of the rights listed above.<br />
            <br />
            <strong>Website:</strong> You may visit our privacy homepage to authenticate and exercise rights via our website.<br />
            <br />
            <strong>Email webform:</strong> You may write to us to exercise rights. To respond to some rights we will need to verify your request either by asking you to log in and authenticate your account or otherwise verify your identity by providing information about yourself or your account. Authorized agents can make a request on your behalf if you have given them legal power of attorney or we are provided proof of signed permission, verification of your identity, and confirmation that you provided the agent permission to submit the request. Response Timing and Format. We aim to respond to a consumer request for access or deletion within 45 days of receiving that request. If we require more time, we will inform you of the reason and extension period in writing.</p>
            
            <p>Children&rsquo;s Data</p>
            
            <p>tyt is not directed to children, and we don&rsquo;t knowingly collect personal information from children under the age of 13. If we find out that a child under 13 has given us personal information, we will take steps to delete that information. If you believe that a child under the age of 13 has given us personal information, please contact us</p>
            
            <p>Links to Third-Party Websites</p>
            
            <p>The tyt Platform may contain links to third-party websites. Those websites may have privacy policies that differ from ours. We are not responsible for those websites, and we recommend that you review their policies. Please contact those websites directly if you have any questions about their privacy policies.</p>
            
            <p>Changes to This Privacy Policy</p>
            
            <p>We may update this policy from time to time as the tyt Platform changes and privacy law evolves. If we update it, we will do so online, and if we make material changes, we will let you know through the tyt Platform or by some other method of communication like email. When you use tyt, you are agreeing to the most recent terms of this policy.</p>
            
            <p>Contact Us</p>
            
            <p>If you have any questions or concerns about your privacy or anything in this policy, including if you need to access this policy in an alternative format, we encourage you to contact us.</p>',
            
            
        ),
    ));


end:
       
    }
}
