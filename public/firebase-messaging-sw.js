// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.2.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.4/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
  apiKey: "AIzaSyCJU5fBaq5E8_MW3_xJPw4xiZEeG14aQlU",
  authDomain: "vjtechsolution-website.firebaseapp.com",
  databaseURL: 'https://vjtechsolution-website.firebaseio.com',
  projectId: "vjtechsolution-website",
  storageBucket: "vjtechsolution-website.appspot.com",
  messagingSenderId: "805140260744",
  appId: "1:805140260744:web:7da65ff696d3d9d9bafc3d",
  measurementId: "G-1FCEB0453F"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

// messaging.onBackgroundMessage((payload) => {
//     console.log('[firebase-messaging-sw.js] Received background message ', payload);
//     // Customize notification here
//     const notificationTitle = payload.notification.title;
//     const notificationOptions = {
//       body: payload.notification.body,
//       icon: './img/LOGO.png'
//     };
  
//     self.registration.showNotification(notificationTitle,
//       notificationOptions);
//   });
