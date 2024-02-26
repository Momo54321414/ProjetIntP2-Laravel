
<style>
   @import url('https://fonts.googleapis.com/css?family=Lato');
   html { font-family: 'Lato', sans-serif; }
</style>

<div class="bg-grey-lightest ">
<nav id="header" class="z-10 pin-t bg-white border-b border-grey-light">
   <div class=" container mx-auto  items-center justify-between mt-0 py-4">
      <div class="pl-4 flex items-center">
         <svg class="h-5 pr-3 fill-current text-purple" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2zM5 9l2-2 2 2 4-4 2 2-6 6-4-4z"/>
         </svg>
         <a class="text-black text-base no-underline font-extrabold text-xl"  href="#"> 
         Help Article
         </a>
      </div>
      <div class="block lg:hidden pr-4">
         <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-black hover:border-purple appearance-none focus:outline-none">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <title>Menu</title>
               <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
         </button>
      </div>
      <div class="w-full flex-grow lg:flex  lg:content-center lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 z-20" id="nav-content">
         <div class="flex-1 w-full mx-auto max-w-sm content-center py-4 lg:py-0">
            <div class="relative pull-right pl-4 pr-4 md:pr-0">
               <input type="search" placeholder="Search" class="w-full bg-grey-lightest text-sm text-grey-darkest transition border focus:outline-none focus:border-purple rounded py-1 px-2 pl-10 appearance-none leading-normal">
               <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                  <svg class="fill-current pointer-events-none text-grey-darkest w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                  </svg>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>
<!--Container-->
<div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16 mt-16">
   <div class="w-full lg:w-1/5 lg:px-6 text-xl text-grey-darkest leading-normal">
      <p class="text-base font-bold py-2 lg:pb-6 text-grey-darker">Menu</p>
      <div class="block lg:hidden sticky pin">
         <button id="menu-toggle" class="flex w-full justify-end px-3 py-3 bg-white lg:bg-transparent border rounded border-grey-dark hover:border-purple appearance-none focus:outline-none">
            <svg class="fill-current h-3 float-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
         </button>
      </div>
      <div class="w-full sticky pin hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-grey-light lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:5em;" id="menu-content">
         <ul class="list-reset">
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:border-purple lg:hover:border-purple">
               <span class="pb-1 md:pb-0 text-sm text-black font-bold">Home</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">Tasks</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">Messages</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">Analytics</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">Payments</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 text-black leading-normal bg-white border border-grey-light border-rounded">
      <!--Title-->
      <div class="font-sans">
         <span class="text-base text-purple font-bold">&laquo;</span> <a href="#" class="text-base md:text-sm text-purple font-bold no-underline hover:underline">Back Link</a>
         <h1 class="font-sans break-normal text-black pt-6 pb-2 text-xl">Help page title</h1>
         <hr class="border-b border-grey-light">
      </div>
      <!--Post Content-->
      <!--Lead Para-->
      <p class="py-6">
         👋 Welcome fellow <a class="text-purple no-underline hover:underline" href="https://www.tailwindcss.com">Tailwind CSS</a> fan.  This starter template provides a starting point to create your own helpdesk / faq / knowledgebase articles using Tailwind CSS and vanilla Javascript.
      </p>
      <p class="py-6">The basic help article layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>
      <p class="py-6">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis tortor sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt urna. Cras nisi diam, pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum, dignissim lorem eu, blandit massa. Phasellus eleifend turpis vel erat bibendum scelerisque. Maecenas id risus dictum, rhoncus odio vitae, maximus purus. Etiam efficitur dolor in dolor molestie ornare. Aenean pulvinar diam nec neque tincidunt, vitae molestie quam fermentum. Donec ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec nulla eget sem dictum elementum.</p>
      <ol>
         <li class="py-3">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus. Fusce vehicula dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est quam. Suspendisse quam quam, commodo sit amet placerat in, interdum a ipsum. Morbi sit amet tellus scelerisque tortor semper posuere.</li>
         <li class="py-3">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo. Duis auctor ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra. Nullam lorem mauris, faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum luctus hendrerit. Ut eros magna, eleifend ac ornare vulputate, pretium nec felis.</li>
         <li class="py-3">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique rutrum velit. Mauris accumsan tempor felis vitae gravida. Cras egestas convallis malesuada. Etiam ac ante id tortor vulputate pretium. Maecenas vel sapien suscipit, elementum odio et, consequat tellus.</li>
      </ol>      
   </div>




   <h2>Documentation: IoT Pillbox with LED and Automatic Door Opening</h2>
   <ol>
      <li>
         <h3>1. Introduction</h3>
         <ul>
            <li>vThe IoT Pillbox is a smart medication management device designed to assist patients in adhering to their medication schedules efficiently. This documentation outlines the features, setup process, and usage instructions for the IoT Pillbox with LED indicators and automatic door opening functionality.</li>
         </ul>
      </li>
   
      <li>
         <h3>2. Features</h3>
         <ul>
            <li>LED Indicators**: The IoT Pillbox is equipped with LED indicators that provide visual cues to indicate medication schedules, such as upcoming doses and missed doses.</li>
            <li>{{ __("Doc_Features_Text_2")}} </li>
            <li>Mobile App Integration**: Users can control and monitor the IoT Pillbox remotely using a dedicated mobile application. This app provides real-time notifications, medication tracking, and remote access to configure pill schedules.</li>
            <li>Secure Storage**: The pillbox is designed with secure compartments to store medication safely and prevent unauthorized access.</li>
         </ul>
      </li>
   
      <li>
         <h3>3. Setup Process</h3>
         <ol>
            <li>
               <h5>Step 1: Unboxing</h5>
               <ul>
                  <li>Carefully unpack the IoT Pillbox from its packaging.</li>
                  <li>Ensure all components are included as per the user manual.</li>
               </ul>
            </li>
   
            <li>
               <h5>Step 2: Power Connection</h5>
               <ul>
                  <li>Connect the pillbox to a power source using the provided power adapter.</li>
                  <li>Ensure the power source is stable and reliable to prevent interruptions in functionality.</li>
               </ul>
            </li>
   
            <li>
               <h5>Step 3: Mobile App Installation</h5>
               <ul>
                  <li>Download and install the dedicated mobile application for the IoT Pillbox from the respective app store (iOS/Android).</li>
                  <li>Follow the on-screen instructions to create an account and pair the pillbox with the mobile app.</li>
               </ul>
            </li>
   
            <li>
               <h5>Step 4: Pairing with Mobile App</h5>
               <ul>
                  <li>Open the mobile app and navigate to the pairing section.</li>
                  <li>Follow the prompts to establish a connection between the pillbox and the mobile device via Bluetooth or Wi-Fi.</li>
               </ul>
            </li>
   
            <li>
               <h5>Step 5: Configuration</h5>
               <ul>
                  <li> Once paired, configure the pillbox settings such as medication schedule, LED indicators, and door opening preferences through the mobile app.</li>
                  <li>Ensure to set up notifications for reminders and missed doses as per user requirements.</li>
               </ul>
            </li>
         </ol>
      </li>
   
      <li>
         <h3>4. Usage Instructions</h3>
         <ul>
            <li>
               <h5>Manual Dispensing</h5>
               <ul>
                  <li>Users can manually dispense medication by pressing the appropriate button on the pillbox or through the mobile app.</li>
               </ul>
            </li>
   
            <li>
               <h5>Automatic Dispensing</h5>
               <ul>
                  <li>The pillbox automatically dispenses medication at scheduled times as per the configured medication schedule.</li>
                  <li>LED indicators provide visual cues to indicate when medication is ready for consumption.</li>
               </ul>
            </li>
   
            <li>
               <h5>Remote Monitoring</h5>
               <ul>
                  <li>Users can remotely monitor the pillbox status, medication adherence, and receive real-time notifications on the mobile app.</li>
                  <li>In case of missed doses or door malfunctions, users are notified promptly to take necessary action.</li>
               </ul>
            </li>
   
         </ul>
      </li>
   
      <li>
         <h3>Step 5: Configuration</h3>
         <ul>
            <li>Keep the pillbox away from water or moisture to prevent damage to electronic components.</li>
            <li>Do not attempt to disassemble or modify the pillbox without proper authorization.</li>
            <li>Keep medication stored securely and out of reach of children or pets.</li>
         </ul>
      </li>
   
      <li>
         <h3>6. Troubleshooting</h3>
         <ul>
            <li>In case of connectivity issues, ensure the pillbox and mobile device are within the recommended range for Bluetooth or Wi-Fi connection.</li>
            <li>If the automatic door opening mechanism fails, check for obstructions and ensure proper alignment of the door.</li>
            <li>For any technical issues, refer to the user manual or contact customer support for assistance.</li>
      </ul>
      </li>
   
      <li>
         <h3>7. Maintenance</h3>
         <ul>
            <li> Clean the pillbox regularly using a soft, dry cloth to remove dust and debris.</li>
            <li>Check the battery status periodically and replace batteries as needed to ensure uninterrupted functionality.</li>
         </ul>
      </li>
   
      <li>
         <h3>8. Conclusion</h3>
         <ul>
            <li>The IoT Pillbox with LED indicators and automatic door opening functionality offers a convenient and reliable solution for medication management. By following the setup process, usage instructions, and safety precautions outlined in this documentation, users can effectively utilize the pillbox to improve medication adherence and overall health outcomes.</li>
         </ul>
      </li>
   
   </ol>




   <!--Back link -->
   <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-grey px-4 py-6">
      <span class="text-base text-purple font-bold">&lt;<span> <a href="#" class="text-base md:text-sm text-purple font-bold no-underline hover:underline">Back to Help</a></p>
   </div>
</div>
</div>

