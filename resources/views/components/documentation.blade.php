
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
                     <span class="pb-1 md:pb-0 text-sm text-black">{{ __('Doc_Home_Head') }}</span>
                     </a>
                  </li>
                  <li class="py-2 md:my-0 hover:bg-purple-lightest lg:hover:bg-transparent">
                     <a href="#" class="block pl-4 align-middle text-grey-darker no-underline hover:text-purple border-l-4 border-transparent lg:hover:border-grey-light">
                     <span class="pb-1 md:pb-0 text-sm">{{ __('Doc_HowTo_Head') }}</span>
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
               Documentation: IoT Pillbox with LED and Automatic Door Opening
            </p>
            <p class="py-6">The IoT Pillbox is a smart medication management device designed to assist patients in adhering to their medication schedules efficiently. This documentation outlines the features, setup process, and usage instructions for the IoT Pillbox with LED indicators and automatic door opening functionality.</p>
            <!--<p class="py-6">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis tortor sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt urna. Cras nisi diam, pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum, dignissim lorem eu, blandit massa. Phasellus eleifend turpis vel erat bibendum scelerisque. Maecenas id risus dictum, rhoncus odio vitae, maximus purus. Etiam efficitur dolor in dolor molestie ornare. Aenean pulvinar diam nec neque tincidunt, vitae molestie quam fermentum. Donec ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec nulla eget sem dictum elementum.</p>
            <ol>
               <li class="py-3">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus. Fusce vehicula dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est quam. Suspendisse quam quam, commodo sit amet placerat in, interdum a ipsum. Morbi sit amet tellus scelerisque tortor semper posuere.</li>
               <li class="py-3">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo. Duis auctor ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra. Nullam lorem mauris, faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum luctus hendrerit. Ut eros magna, eleifend ac ornare vulputate, pretium nec felis.</li>
               <li class="py-3">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique rutrum velit. Mauris accumsan tempor felis vitae gravida. Cras egestas convallis malesuada. Etiam ac ante id tortor vulputate pretium. Maecenas vel sapien suscipit, elementum odio et, consequat tellus.</li>
            </ol>-->
         </div>
         <!--Back link -->
         <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-grey px-4 py-6">
            <span class="text-base text-purple font-bold">&lt;<span> <a href="#" class="text-base md:text-sm text-purple font-bold no-underline hover:underline">Back to Help</a></p>
         </div>
      </div>
   </div>

   **Documentation: IoT Pillbox with LED and Automatic Door Opening**

   **1. Introduction**
   
   The IoT Pillbox is a smart medication management device designed to assist patients in adhering to their medication schedules efficiently. This documentation outlines the features, setup process, and usage instructions for the IoT Pillbox with LED indicators and automatic door opening functionality.
   
   **2. Features**
   
   - **LED Indicators**: The IoT Pillbox is equipped with LED indicators that provide visual cues to indicate medication schedules, such as upcoming doses and missed doses.
     
   - **Automatic Door Opening**: The pillbox features an automatic door opening mechanism that allows easy access to medication compartments at scheduled times.
   
   - **Mobile App Integration**: Users can control and monitor the IoT Pillbox remotely using a dedicated mobile application. This app provides real-time notifications, medication tracking, and remote access to configure pill schedules.
   
   - **Secure Storage**: The pillbox is designed with secure compartments to store medication safely and prevent unauthorized access.
   
   **3. Setup Process**
   
   **Step 1: Unboxing**
   - Carefully unpack the IoT Pillbox from its packaging.
   - Ensure all components are included as per the user manual.
   
   **Step 2: Power Connection**
   - Connect the pillbox to a power source using the provided power adapter.
   - Ensure the power source is stable and reliable to prevent interruptions in functionality.
   
   **Step 3: Mobile App Installation**
   - Download and install the dedicated mobile application for the IoT Pillbox from the respective app store (iOS/Android).
   - Follow the on-screen instructions to create an account and pair the pillbox with the mobile app.
   
   **Step 4: Pairing with Mobile App**
   - Open the mobile app and navigate to the pairing section.
   - Follow the prompts to establish a connection between the pillbox and the mobile device via Bluetooth or Wi-Fi.
   
   **Step 5: Configuration**
   - Once paired, configure the pillbox settings such as medication schedule, LED indicators, and door opening preferences through the mobile app.
   - Ensure to set up notifications for reminders and missed doses as per user requirements.
   
   **4. Usage Instructions**
   
   **Manual Dispensing**
   - Users can manually dispense medication by pressing the appropriate button on the pillbox or through the mobile app.
   
   **Automatic Dispensing**
   - The pillbox automatically dispenses medication at scheduled times as per the configured medication schedule.
   - LED indicators provide visual cues to indicate when medication is ready for consumption.
   
   **Remote Monitoring**
   - Users can remotely monitor the pillbox status, medication adherence, and receive real-time notifications on the mobile app.
   - In case of missed doses or door malfunctions, users are notified promptly to take necessary action.
   
   **5. Safety Precautions**
   
   - Keep the pillbox away from water or moisture to prevent damage to electronic components.
   - Do not attempt to disassemble or modify the pillbox without proper authorization.
   - Keep medication stored securely and out of reach of children or pets.
   
   **6. Troubleshooting**
   
   - In case of connectivity issues, ensure the pillbox and mobile device are within the recommended range for Bluetooth or Wi-Fi connection.
   - If the automatic door opening mechanism fails, check for obstructions and ensure proper alignment of the door.
   - For any technical issues, refer to the user manual or contact customer support for assistance.
   
   **7. Maintenance**
   
   - Clean the pillbox regularly using a soft, dry cloth to remove dust and debris.
   - Check the battery status periodically and replace batteries as needed to ensure uninterrupted functionality.
   
   **8. Conclusion**
   
   The IoT Pillbox with LED indicators and automatic door opening functionality offers a convenient and reliable solution for medication management. By following the setup process, usage instructions, and safety precautions outlined in this documentation, users can effectively utilize the pillbox to improve medication adherence and overall health outcomes.



   fr =========================================

   **Documentation : Pilulier IoT avec LED et Ouverture Automatique de Porte**

**1. Introduction**

Le Pilulier IoT est un dispositif de gestion intelligente des médicaments conçu pour aider les patients à respecter efficacement leurs horaires de médication. Cette documentation décrit les fonctionnalités, le processus de configuration et les instructions d'utilisation du Pilulier IoT avec indicateurs LED et fonctionnalité d'ouverture automatique de porte.

**2. Fonctionnalités**

- **Indicateurs LED** : Le Pilulier IoT est équipé d'indicateurs LED qui fournissent des indications visuelles pour indiquer les horaires de médication, tels que les doses à venir et les doses manquées.
  
- **Ouverture Automatique de Porte** : Le pilulier dispose d'un mécanisme d'ouverture automatique de porte qui permet un accès facile aux compartiments à médicaments aux heures programmées.

- **Intégration avec une Application Mobile** : Les utilisateurs peuvent contrôler et surveiller le Pilulier IoT à distance à l'aide d'une application mobile dédiée. Cette application fournit des notifications en temps réel, un suivi de la médication et un accès à distance pour configurer les horaires de prise de pilules.

- **Stockage Sécurisé** : Le pilulier est conçu avec des compartiments sécurisés pour stocker les médicaments en toute sécurité et empêcher l'accès non autorisé.

**3. Processus de Configuration**

**Étape 1 : Déballage**
- Déballez soigneusement le Pilulier IoT de son emballage.
- Assurez-vous que tous les composants sont inclus comme indiqué dans le manuel d'utilisation.

**Étape 2 : Connexion à l'Alimentation**
- Connectez le pilulier à une source d'alimentation à l'aide de l'adaptateur secteur fourni.
- Assurez-vous que la source d'alimentation est stable et fiable pour éviter les interruptions dans le fonctionnement.

**Étape 3 : Installation de l'Application Mobile**
- Téléchargez et installez l'application mobile dédiée pour le Pilulier IoT depuis le magasin d'applications respectif (iOS/Android).
- Suivez les instructions à l'écran pour créer un compte et appairer le pilulier avec l'application mobile.

**Étape 4 : Appairage avec l'Application Mobile**
- Ouvrez l'application mobile et accédez à la section d'appairage.
- Suivez les invites pour établir une connexion entre le pilulier et l'appareil mobile via Bluetooth ou Wi-Fi.

**Étape 5 : Configuration**
- Une fois appairé, configurez les paramètres du pilulier tels que l'horaire de médication, les indicateurs LED et les préférences d'ouverture de porte via l'application mobile.
- Assurez-vous de configurer les notifications pour les rappels et les doses manquées selon les besoins de l'utilisateur.

**4. Instructions d'Utilisation**

**Distribution Manuelle**
- Les utilisateurs peuvent distribuer manuellement les médicaments en appuyant sur le bouton approprié sur le pilulier ou via l'application mobile.

**Distribution Automatique**
- Le pilulier distribue automatiquement les médicaments aux heures programmées conformément à l'horaire de médication configuré.
- Les indicateurs LED fournissent des indications visuelles pour indiquer quand les médicaments sont prêts à être pris.

**Surveillance à Distance**
- Les utilisateurs peuvent surveiller à distance l'état du pilulier, l'adhérence à la médication et recevoir des notifications en temps réel sur l'application mobile.
- En cas de doses manquées ou de dysfonctionnements de la porte, les utilisateurs sont notifiés rapidement pour prendre les mesures nécessaires.

**5. Précautions de Sécurité**

- Gardez le pilulier à l'écart de l'eau ou de l'humidité pour éviter d'endommager les composants électroniques.
- Ne tentez pas de démonter ou de modifier le pilulier sans autorisation appropriée.
- Gardez les médicaments stockés en toute sécurité et hors de portée des enfants ou des animaux domestiques.

**6. Dépannage**

- En cas de problèmes de connectivité, assurez-vous que le pilulier et l'appareil mobile sont dans la plage recommandée pour la connexion Bluetooth ou Wi-Fi.
- Si le mécanisme d'ouverture automatique de porte échoue, vérifiez s'il y a des obstructions et assurez-vous que la porte est correctement alignée.
- Pour tout problème technique, consultez le manuel d'utilisation ou contactez le support client pour obtenir de l'aide.

**7. Entretien**

- Nettoyez régulièrement le pilulier à l'aide d'un chiffon doux et sec pour éliminer la poussière et les débris.
- Vérifiez périodiquement l'état de la batterie et remplacez les piles si nécessaire pour garantir un fonctionnement sans interruption.

**8. Conclusion**

Le Pilulier IoT avec indicateurs LED et fonctionnalité d'ouverture automatique de porte offre une solution pratique et fiable pour la gestion des médicaments. En suivant le processus de configuration, les instructions d'utilisation et les précautions de sécurité décrits dans cette documentation, les utilisateurs peuvent utiliser efficacement le pilulier pour améliorer l'adhérence à la médication et les résultats de santé globaux.