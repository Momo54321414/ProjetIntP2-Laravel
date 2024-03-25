
<style>
   @import url('https://fonts.googleapis.com/css?family=Lato');
   html { font-family: 'Lato', sans-serif; }
</style>

<div class="bg-grey-lightest ">
<!--Container-->
<div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-16 mt-16">
   <div class="w-full lg:w-1/5 lg:px-6 text-xl text-black leading-normal dark:bg-gray-700 border border-grey-light border-rounded">
      <div class="lg:hidden sticky pin hidden">
         <button id="menu-toggle" class="flex w-full justify-end px-3 py-3 bg-white dark:bg-gray-500 lg:bg-transparent border rounded border-grey-dark hover:border-purple appearance-none focus:outline-none">
            <svg class="fill-current h-3 float-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
         </button>
      </div>
      <div class="w-full sticky pin  h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-grey-light lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:5em;" id="menu-content">
         <ul class="list-reset">
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Configuration" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:border-purple lg:hover:border-purple">
               <span class="pb-1 md:pb-0 text-sm text-black dark:text-white font-bold">{{__('Doc_Header_Introduction')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Features" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Features')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Setup_Process" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Setup_Process')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Usage_Instructions" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Usage_Instructions')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Configuration" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Configuration')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Troubleshooting" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Troubleshooting')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Maintenance" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Maintenance')}}</span>
               </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
               <a href="#Doc_Header_Conclusion" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
               <span class="pb-1 md:pb-0 text-sm">{{__('Doc_Header_Conclusion')}}</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 text-black leading-normal dark:bg-gray-700 border border-grey-light border-rounded">
      <!--Title-->
      <div class="font-sans">
         <h1 class="font-sans break-normal text-black dark:text-white pt-6 pb-2 text-xl">{{__('Doc_Title')}}</h1>
         <hr class="border-b border-grey-light">
      </div>
      <!--Post Content--> 
   <ol>
      <li>
         <h2 id="Doc_Header_Introduction" class="text-xl font-semibold text-gray-900 dark:text-white"><b>{{__('Doc_Header_Introduction')}}</b></h2>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Overview_text_1')}}</li>
         </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Features" class="text-xl font-semibold text-gray-900 dark:text-white"><b>{{__('Doc_Header_Features')}}</b></h3>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400"><strong class='font-semibold text-gray-900 dark:text-white'>{{__('LED Indicators:')}}</strong> {{__('Doc_Features_Text_1')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400"><strong class='font-semibold text-gray-900 dark:text-white'>{{__('Automatic Door Opening:')}} </strong>{{__('Doc_Features_Text_2')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400"><strong class='font-semibold text-gray-900 dark:text-white'>{{__('Mobile App Integration:')}} </strong>{{__('Doc_Features_Text_3')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400"><strong class='font-semibold text-gray-900 dark:text-white'>{{__('Secure Storage:')}}</strong> {{__('Doc_Features_Text_4')}}</li>
         </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Setup_Process" class="text-xl font-semibold text-gray-900 dark:text-white"><b>{{__('Doc_Header_Setup_Process')}}</b></h3>
         <ol>
            <li>
               <h5>{{__('Doc_Setup_Process_Unboxing')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Unboxing_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Unboxing_text_2')}}</li>
               </ul>
            </li>
   
            <li>
               <h5>{{__('Doc_Setup_Process_Power_Connection')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Power_Connection_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Power_Connection_text_2')}}</li>
               </ul>
            </li>
   
            <li>
               <h5>{{__('Doc_Setup_Process_Mobile_App_Installation')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Mobile_App_Installation_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Mobile_App_Installation_text_2')}}</li>
               </ul>
            </li>
   
            <li>
               <h5>{{__('Doc_Setup_Process_Pairing_Mobile_App')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Pairing_Mobile_App_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Pairing_Mobile_App_text_2')}}</li>
               </ul>
            </li>
   
            <li>
               <h5>{{__('Doc_Setup_Process_Configuration')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Configuration_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Setup_Process_Configuration_text_2')}}</li>
               </ul>
            </li>
         </ol>
      </li>
   
      <li>
         <h3 id="Doc_Header_Usage_Instructions" class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Doc_Header_Usage_Instructions')}}</h3>
         <ul>
            <li>
               <h5 class="text-lg">{{__('Doc_Header_Usage_Instructions_Manual_Dispensing')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Usage_Instructions_Manual_Dispensing_text_1')}}</li>
               </ul>
            </li>
   
            <li>
               <h5  class="text-lg">{{__('Doc_Header_Usage_Instructions_Auto_Dispensing')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Usage_Instructions_Auto_Dispensing_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Usage_Instructions_Auto_Dispensing_text_2')}}</li>
               </ul>
            </li>
   
            <li>
               <h5  class="text-lg">{{__('Doc_Header_Usage_Instructions_Remote_Monitoring')}}</h5>
               <ul>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Usage_Instructions_Remote_Monitoring_text_1')}}</li>
                  <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Usage_Instructions_Remote_Monitoring_text_2')}}</li>
               </ul>
            </li>
   
         </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Configuration" class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Doc_Header_Configuration')}}</h3>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Configuration_text_1')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Configuration_text_2')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Configuration_text_3')}}</li>
         </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Troubleshooting" class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Doc_Header_Troubleshooting')}}</h3>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Troubleshooting_text_1')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Troubleshooting_text_2')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Troubleshooting_text_3')}}</li>
      </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Maintenance" class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Doc_Header_Maintenance')}}</h3>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Maintenance_text_1')}}</li>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Maintenance_text_2')}}</li>
         </ul>
      </li>
   
      <li>
         <h3 id="Doc_Header_Conclusion" class="text-xl font-semibold text-gray-900 dark:text-white">{{__('Doc_Header_Conclusion')}}</h3>
         <ul>
            <li class="mb-3 text-gray-500 dark:text-gray-400">{{__('Doc_Header_Conclusion_text_1')}}</li>
         </ul>
      </li>
   
   </ol>




   <!--Back link -->
   <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-grey px-4 py-6">
      <span class="text-base text-purple font-bold">&lt;<span> <a href="#" class="text-base md:text-sm text-purple font-bold no-underline hover:underline">{{__('Back to top')}}</a></p>
   </div>
</div>
</div>

