
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
               <h1 class="font-sans break-normal text-black pt-6 pb-2 text-xl">Documentation: IoT Pillbox</h1>
               <hr class="border-b border-grey-light">
            </div>
            <!--Post Content--> 
         <ol>
            <li>
               <h3>{{__('Doc_Header_Introduction')}}</h3>
               <ul>
                  <li>{{__('Doc_Overview_text_1')}}</li>
               </ul>
            </li>
         
            <li>
               <h3>{{__('Doc_Header_Features')}}</h3>
               <ul>
                  <li>{{__('Doc_Features_Text_1')}}</li>
                  <li>{{__('Doc_Features_Text_2')}}</li>
                  <li>{{__('Doc_Features_Text_3')}}</li>
                  <li>{{__('Doc_Features_Text_4')}}</li>
               </ul>
            </li>
         
            <li>
               <h3>{{__('Doc_Header_Setup_Process')}}</h3>
               <ol>
                  <li>
                     <h5>{{__('Doc_Setup_Process_Unboxing')}}</h5>
                     <ul>
                        <li>{{__('Doc_Setup_Process_Unboxing_text_1')}}</li>
                        <li>{{__('Doc_Setup_Process_Unboxing_text_2')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Setup_Process_Power_Connection')}}</h5>
                     <ul>
                        <li>{{__('Doc_Setup_Process_Power_Connection_text_1')}}</li>
                        <li>{{__('Doc_Setup_Process_Power_Connection_text_2')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Setup_Process_Mobile_App_Installation')}}/h5>
                     <ul>
                        <li>{{__('Doc_Setup_Process_Mobile_App_Installation_text_1')}}</li>
                        <li>{{__('Doc_Setup_Process_Mobile_App_Installation_text_2')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Setup_Process_Pairing_Mobile_App')}}</h5>
                     <ul>
                        <li>{{__('Doc_Setup_Process_Pairing_Mobile_App_text_1')}}</li>
                        <li>{{__('Doc_Setup_Process_Pairing_Mobile_App_text_2')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Setup_Process_Configuration')}}</h5>
                     <ul>
                        <li>{{__('Doc_Setup_Process_Configuration_text_1')}}</li>
                        <li>{{__('Doc_Setup_Process_Configuration_text_2')}}</li>
                     </ul>
                  </li>
               </ol>
            </li>
         
            <li>
               <h3>{{__('Doc_Header_Usage_Instructions')}}</h3>
               <ul>
                  <li>
                     <h5>{{__('Doc_Header_Usage_Instructions_Manual_Dispensing')}}</h5>
                     <ul>
                        <li>{{__('Doc_Usage_Instructions_Manual_Dispensing_text_1')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Header_Usage_Instructions_Auto_Dispensing')}}</h5>
                     <ul>
                        <li>{{__('Doc_Usage_Instructions_Auto_Dispensing_text_1')}}</li>
                        <li>{{__('Doc_Usage_Instructions_Auto_Dispensing_text_2')}}</li>
                     </ul>
                  </li>
         
                  <li>
                     <h5>{{__('Doc_Header_Usage_Instructions_Remote_Monitoring')}}</h5>
                     <ul>
                        <li>{{__('Doc_Usage_Instructions_Remote_Monitoring_text_1')}}</li>
                        <li>{{__('Doc_Usage_Instructions_Remote_Monitoring_text_2')}}</li>
                     </ul>
                  </li>
         
               </ul>
            </li>
         
            <li>
               <h3>{{__('Doc_Header_Configuration')}}</h3>
               <ul>
                  <li>{{__('Doc_Header_Configuration_text_1')}}</li>
                  <li>{{__('Doc_Header_Configuration_text_2')}}</li>
                  <li>{{__('Doc_Header_Configuration_text_3')}}</li>
               </ul>
            </li>
         
            <li>
               <h3>{{__('Doc_Header_Troubleshooting')}}</h3>
               <ul>
                  <li>{{__('Doc_Header_Troubleshooting_text_1')}}</li>
                  <li>{{__('Doc_Header_Troubleshooting_text_2')}}</li>
                  <li>{{__('Doc_Header_Troubleshooting_text_3')}}</li>
            </ul>
            </li>
         
            <li>
               <h3>"{{__('Doc_Header_Maintenance')}}</h3>
               <ul>
                  <li>"{{__('Doc_Header_Maintenance_text_1')}}</li>
                  <li>"{{__('Doc_Header_Maintenance_text_2')}}</li>
               </ul>
            </li>
         
            <li>
               <h3{{__('>Doc_Header_Conclusion')}}</h3>
               <ul>
                  <li>{{__('Doc_Header_Conclusion_text_1')}}</li>
               </ul>
            </li>
         
         </ol>




         <!--Back link -->
         <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-grey px-4 py-6">
            <span class="text-base text-purple font-bold">&lt;<span> <a href="#" class="text-base md:text-sm text-purple font-bold no-underline hover:underline">Back to top</a></p>
         </div>
      </div>
   </div>

   