/**
 * DigiCoders Web Push Notification Client Script
 * Compact Top-Right Permission Pop-Up Card & Real-Time Token Sync
 */

(function () {
    'use strict';

    // Firebase Configuration
    const firebaseConfig = {
        apiKey: "AIzaSyAdt6Ogu5s4rf0yV42r-FszfIiLB50IHOE",
        authDomain: "thedigicoders-website-8fcb0.firebaseapp.com",
        projectId: "thedigicoders-website-8fcb0",
        storageBucket: "thedigicoders-website-8fcb0.appspot.com",
        messagingSenderId: "207041730023",
        appId: "1:207041730023:web:ffe0c75170747693f55942",
        measurementId: "G-Y7WPYKLX10"
    };

    const VAPID_KEY = "BOYrD601qTShrtqoQwRpmynJLujQaWoQ8mIQ19Bjti_5sYbazTmnfWU1XGWynhip3bz0zjgX0D43j_BV_F5CdWU";

    // Helper to get base URL
    function getBaseUrl() {
        if (typeof window.BASE_URL !== 'undefined') return window.BASE_URL;
        let path = window.location.origin + window.location.pathname;
        if (path.indexOf('/thedigicoders-com') !== -1) {
            return window.location.origin + '/thedigicoders-com/';
        }
        return window.location.origin + '/';
    }

    // Detect browser name
    function getBrowserName() {
        const userAgent = navigator.userAgent;
        if ((navigator.brave && typeof navigator.brave.isBrave === 'function') || userAgent.indexOf("Brave") > -1) {
            return "Brave";
        }
        if (userAgent.indexOf("Edg") > -1 || userAgent.indexOf("Edge") > -1) return "Edge";
        if (userAgent.indexOf("OPR") > -1 || userAgent.indexOf("Opera") > -1) return "Opera";
        if (userAgent.indexOf("Firefox") > -1) return "Firefox";
        if (userAgent.indexOf("Safari") > -1 && userAgent.indexOf("Chrome") === -1) return "Safari";
        if (userAgent.indexOf("Chrome") > -1) return "Chrome";
        return "Web Browser";
    }

    let messaging = null;

    function initFirebase() {
        if (typeof firebase === 'undefined') {
            console.warn('Firebase SDK script not loaded.');
            return false;
        }
        try {
            if (!firebase.apps.length) {
                firebase.initializeApp(firebaseConfig);
            }
            if (!messaging) {
                messaging = firebase.messaging();
                messaging.onMessage(function(payload) {
                    console.log('Foreground Push Message Received:', payload);
                    let title = (payload.notification && payload.notification.title) ? payload.notification.title : ((payload.data && payload.data.title) ? payload.data.title : 'DigiCoders Notification');
                    let body = (payload.notification && payload.notification.body) ? payload.notification.body : ((payload.data && (payload.data.message || payload.data.body)) ? (payload.data.message || payload.data.body) : 'New update received.');
                    let icon = getBaseUrl() + 'public/assets/images/favicon.png';

                    if ('Notification' in window && Notification.permission === 'granted') {
                        try {
                            new Notification(title, {
                                body: body,
                                icon: icon
                            });
                        } catch(e) {
                            console.error('Notification display error:', e);
                        }
                    }
                });
            }
            return true;
        } catch (e) {
            console.error('Firebase Init Error:', e);
            return false;
        }
    }

    // Helper: URL Base64 to Uint8Array for VAPID Key
    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/');
        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);
        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }

    // Register Service Worker
    function registerServiceWorker() {
        if (!('serviceWorker' in navigator)) {
            console.warn('Service worker not supported in this browser environment.');
            return Promise.reject('Service Worker not supported');
        }
        const swPath = getBaseUrl() + 'firebase-messaging-sw.js';
        return navigator.serviceWorker.register(swPath)
            .then(function (registration) {
                console.log('Push Service Worker registered with scope:', registration.scope);
                registration.update();
                return navigator.serviceWorker.ready;
            })
            .catch(function (err) {
                console.error('Service Worker registration failed:', err);
                if ('serviceWorker' in navigator) {
                    return navigator.serviceWorker.ready.catch(function() { return null; });
                }
                return null;
            });
    }

    // Helper: Convert ArrayBuffer to Base64Url
    function arrayBufferToBase64Url(buffer) {
        if (!buffer) return '';
        try {
            const bytes = new Uint8Array(buffer);
            let binary = '';
            for (let i = 0; i < bytes.byteLength; i++) {
                binary += String.fromCharCode(bytes[i]);
            }
            const base64 = window.btoa(binary);
            return base64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=/g, '');
        } catch (e) {
            return '';
        }
    }

    // Helper: Safely extract p256dh and auth keys from any PushSubscription object
    function getSubscriptionKeys(subscription) {
        let p256dh = '';
        let auth = '';

        if (subscription && typeof subscription === 'object') {
            const jsonSub = (typeof subscription.toJSON === 'function') ? subscription.toJSON() : subscription;
            if (jsonSub && jsonSub.keys) {
                p256dh = jsonSub.keys.p256dh || '';
                auth = jsonSub.keys.auth || '';
            }
            if ((!p256dh || !auth) && typeof subscription.getKey === 'function') {
                try {
                    const rawP256 = subscription.getKey('p256dh');
                    if (rawP256) p256dh = arrayBufferToBase64Url(rawP256);
                    const rawAuth = subscription.getKey('auth');
                    if (rawAuth) auth = arrayBufferToBase64Url(rawAuth);
                } catch(e) {
                    console.warn('getKey fallback error:', e);
                }
            }
        }
        return { p256dh: p256dh, auth: auth };
    }

    // Send subscription payload (VAPID + FCM) to backend
    function saveTokenToBackend(tokenOrSubscription) {
        const targetUrl = getBaseUrl() + 'Home/save_push_token';
        let postObj = {};

        if (typeof tokenOrSubscription === 'object' && tokenOrSubscription !== null) {
            const jsonSub = (typeof tokenOrSubscription.toJSON === 'function') ? tokenOrSubscription.toJSON() : tokenOrSubscription;
            const endpoint = jsonSub.endpoint || tokenOrSubscription.endpoint || '';
            const keys = getSubscriptionKeys(tokenOrSubscription);

            postObj = {
                endpoint: endpoint,
                token: endpoint,
                public_key: keys.p256dh || '',
                auth_token: keys.auth || '',
                keys: keys,
                browser: getBrowserName(),
                user_agent: navigator.userAgent
            };
        } else {
            postObj = {
                token: tokenOrSubscription,
                endpoint: 'https://fcm.googleapis.com/fcm/send/' + tokenOrSubscription,
                browser: getBrowserName(),
                user_agent: navigator.userAgent
            };
        }

        const postBody = JSON.stringify(postObj);

        fetch(targetUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: postBody
        })
        .then(res => res.json())
        .then(res => {
            if (res && (res.status === 'success' || res.res === 'success')) {
                localStorage.setItem('digicoders_push_subscribed', 'true');
                console.log('VAPID WebPush Subscription saved successfully to database!');
            }
        })
        .catch(err => console.error('Failed to sync VAPID WebPush token:', err));
    }

    // Request Notification Token and VAPID Subscription from Browser PushManager
    function requestToken(swRegistration) {
        if (!swRegistration) {
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.ready.then(function(reg) {
                    if (reg) requestToken(reg);
                });
            }
            return;
        }

        // Subscribe via Browser PushManager (VAPID)
        if ('pushManager' in swRegistration) {
            const convertedVapidKey = urlBase64ToUint8Array(VAPID_KEY);
            swRegistration.pushManager.getSubscription()
                .then(function(subscription) {
                    if (subscription) {
                        console.log('Existing VAPID Subscription acquired:', subscription);
                        saveTokenToBackend(subscription);
                    } else {
                        return swRegistration.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: convertedVapidKey
                        }).then(function(newSubscription) {
                            console.log('New VAPID Subscription acquired:', newSubscription);
                            saveTokenToBackend(newSubscription);
                        });
                    }
                })
                .catch(function(err) {
                    console.warn('PushManager getSubscription/subscribe warning:', err);
                });
        }
    }

    // Show Confirmation Push Toast Notification directly in browser
    function showConfirmationNotification() {
        if ('Notification' in window && Notification.permission === 'granted') {
            try {
                new Notification('DigiCoders Technologies', {
                    body: 'Notifications Enabled Successfully! You will now receive real-time alerts for new courses, batches & announcements.',
                    icon: getBaseUrl() + 'public/assets/images/favicon.png'
                });
            } catch(e) {
                console.log('Direct notification error:', e);
            }
        }
    }

    // Modal to show step-by-step instructions on how to unblock notifications in browser
    function showBlockedInstructionsModal() {
        const existing = document.getElementById('dg-push-blocked-modal');
        if (existing) existing.remove();

        const card = document.getElementById('dg-push-popup-card');
        if (card) card.remove();

        const modalHtml = `
            <div id="dg-push-blocked-modal" style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 420px;
                max-width: 92vw;
                background: #ffffff;
                border-radius: 20px;
                box-shadow: 0 25px 60px rgba(0,0,0,0.35);
                border: 2px solid #E76028;
                padding: 24px;
                z-index: 999999999;
                font-family: 'Poppins', sans-serif, system-ui;
                animation: dgPopIn 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            ">
                <style>
                    @keyframes dgPopIn {
                        from { transform: translate(-50%, -45%) scale(0.9); opacity: 0; }
                        to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
                    }
                    .dg-blocked-step {
                        display: flex;
                        align-items: flex-start;
                        gap: 12px;
                        background: #f8fafc;
                        padding: 10px 14px;
                        border-radius: 10px;
                        margin-bottom: 8px;
                        border-left: 4px solid #006DAB;
                    }
                    .dg-step-num {
                        background: #006DAB;
                        color: white;
                        width: 22px;
                        height: 22px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 700;
                        font-size: 12px;
                        flex-shrink: 0;
                        margin-top: 1px;
                    }
                </style>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 40px; height: 40px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="fa fa-bell-slash"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Notifications Blocked</h4>
                            <span style="font-size: 12px; color: #64748b;">How to unblock in your browser</span>
                        </div>
                    </div>
                    <button id="dg-blocked-close-x" style="background:none; border:none; color:#94a3b8; font-size:22px; cursor:pointer; padding:0;" title="Close">&times;</button>
                </div>
                
                <p style="font-size: 13px; color: #334155; margin-bottom: 14px; line-height: 1.5;">
                    Browser notifications for <strong>DigiCoders</strong> are currently blocked. Follow these steps to allow notifications:
                </p>

                <div class="dg-blocked-step">
                    <span class="dg-step-num">1</span>
                    <div style="font-size: 12px; color: #1e293b; line-height: 1.4;">
                        Click the <strong>Lock Icon (🔒)</strong> or <strong>Tune Icon</strong> next to the website URL at top left.
                    </div>
                </div>
                <div class="dg-blocked-step">
                    <span class="dg-step-num">2</span>
                    <div style="font-size: 12px; color: #1e293b; line-height: 1.4;">
                        Click on <strong>Site settings</strong> (or <strong>Notifications</strong>).
                    </div>
                </div>
                <div class="dg-blocked-step">
                    <span class="dg-step-num">3</span>
                    <div style="font-size: 12px; color: #1e293b; line-height: 1.4;">
                        Change <strong>Notifications</strong> from <span style="color:#dc2626; font-weight:600;">Block</span> to <span style="color:#16a34a; font-weight:600;">Allow</span>.
                    </div>
                </div>
                <div class="dg-blocked-step">
                    <span class="dg-step-num">4</span>
                    <div style="font-size: 12px; color: #1e293b; line-height: 1.4;">
                        <strong>Reload</strong> this page to apply changes!
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 16px; justify-content: flex-end;">
                    <button id="dg-blocked-close-btn" style="background: #f1f5f9; color: #475569; border: none; padding: 9px 16px; border-radius: 8px; font-weight: 600; font-size: 13px; cursor: pointer;">Got it</button>
                    <button id="dg-blocked-reload-btn" style="background: linear-gradient(135deg, #006DAB 0%, #E76028 100%); color: white; border: none; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 13px; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                        <i class="fa fa-refresh"></i> Reload Page
                    </button>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHtml);

        const closeHandler = function() {
            const modal = document.getElementById('dg-push-blocked-modal');
            if (modal) modal.remove();
        };

        const closeX = document.getElementById('dg-blocked-close-x');
        if (closeX) closeX.addEventListener('click', closeHandler);

        const closeBtn = document.getElementById('dg-blocked-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeHandler);

        const reloadBtn = document.getElementById('dg-blocked-reload-btn');
        if (reloadBtn) reloadBtn.addEventListener('click', function() {
            window.location.reload();
        });
    }

    // Compact Top-Right Permission Pop-Up Card
    function showPermissionModal() {
        // Rule 1: If notification is ALREADY GRANTED, do NOT show any pop-up!
        if ('Notification' in window && Notification.permission === 'granted') {
            return;
        }

        const existing = document.getElementById('dg-push-popup-card');
        if (existing) existing.remove();

        if (!document.body) return;

        let statusText = "Allow notifications to get instant alerts on new IT training courses, summer & winter batches, webinars & job placements from DigiCoders!";
        let allowButtonText = '<i class="fa fa-bell"></i> Allow';

        if ('Notification' in window && Notification.permission === 'denied') {
            statusText = "Notifications are currently blocked in your browser. Click Allow to see how to unblock them.";
            allowButtonText = '<i class="fa fa-lock"></i> Unblock';
        }

        const modalHtml = `
            <div id="dg-push-popup-card" style="
                position: fixed;
                top: 25px;
                right: 25px;
                width: 360px;
                max-width: 90vw;
                background: #ffffff;
                border-radius: 16px;
                box-shadow: 0 15px 45px rgba(0,0,0,0.3);
                border: 2px solid #006DAB;
                padding: 18px;
                z-index: 99999999;
                font-family: 'Poppins', sans-serif, system-ui;
                animation: dgSlideFromRight 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                display: flex;
                flex-direction: column;
                gap: 12px;
            ">
                <style>
                    @keyframes dgSlideFromRight {
                        from { transform: translateX(120%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                    .dg-pop-icon-wrapper {
                        width: 44px;
                        height: 44px;
                        border-radius: 12px;
                        background: linear-gradient(135deg, #006DAB 0%, #E76028 100%);
                        color: #ffffff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 20px;
                        flex-shrink: 0;
                        box-shadow: 0 4px 12px rgba(0, 109, 171, 0.3);
                    }
                    .dg-pop-title {
                        font-size: 16px;
                        font-weight: 700;
                        color: #0f172a;
                        margin: 0 0 2px 0;
                    }
                    .dg-pop-desc {
                        font-size: 12px;
                        color: #475569;
                        line-height: 1.45;
                        margin: 0;
                    }
                    .dg-pop-btn-allow {
                        background: linear-gradient(135deg, #006DAB 0%, #E76028 100%);
                        color: #ffffff;
                        border: none;
                        padding: 10px 18px;
                        border-radius: 8px;
                        font-weight: 700;
                        font-size: 13px;
                        cursor: pointer;
                        box-shadow: 0 4px 12px rgba(0, 109, 171, 0.35);
                        transition: all 0.2s ease;
                        display: inline-flex;
                        align-items: center;
                        gap: 6px;
                    }
                    .dg-pop-btn-allow:hover {
                        transform: translateY(-1px);
                    }
                    .dg-pop-btn-later {
                        background: #f1f5f9;
                        color: #64748b;
                        border: none;
                        padding: 10px 16px;
                        border-radius: 8px;
                        font-weight: 600;
                        font-size: 13px;
                        cursor: pointer;
                    }
                    .dg-pop-btn-later:hover {
                        background: #e2e8f0;
                        color: #334155;
                    }
                </style>
                <div style="display: flex; align-items: flex-start; gap: 12px;">
                    <div class="dg-pop-icon-wrapper">
                        <i class="fa fa-bell"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 class="dg-pop-title">Push Notifications</h4>
                        <p class="dg-pop-desc">${statusText}</p>
                    </div>
                    <button id="dg-pop-close-x" style="background:none; border:none; color:#94a3b8; font-size:20px; cursor:pointer; padding:0; margin-top:-2px;" title="Close">&times;</button>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 8px; margin-top: 4px;">
                    <button id="dg-pop-later" class="dg-pop-btn-later">Close</button>
                    <button id="dg-pop-allow" class="dg-pop-btn-allow">
                        ${allowButtonText}
                    </button>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHtml);

        const allowBtn = document.getElementById('dg-pop-allow');
        if (allowBtn) {
            allowBtn.addEventListener('click', function () {
                const card = document.getElementById('dg-push-popup-card');

                if ('Notification' in window) {
                    // If already denied in browser, directly show step-by-step instructions
                    if (Notification.permission === 'denied') {
                        if (card) card.remove();
                        showBlockedInstructionsModal();
                        return;
                    }

                    // Trigger Native Browser Permission Dialog
                    Notification.requestPermission().then(function (permission) {
                        if (card) card.remove();
                        if (permission === 'granted') {
                            showConfirmationNotification();
                            registerServiceWorker().then(function(reg) {
                                requestToken(reg);
                            });
                        } else if (permission === 'denied') {
                            showBlockedInstructionsModal();
                        }
                    }).catch(function() {
                        if (card) card.remove();
                        showBlockedInstructionsModal();
                    });
                } else {
                    if (card) card.remove();
                }
            });
        }

        const closeHandler = function () {
            const card = document.getElementById('dg-push-popup-card');
            if (card) card.remove();
        };

        const laterBtn = document.getElementById('dg-pop-later');
        if (laterBtn) laterBtn.addEventListener('click', closeHandler);

        const closeX = document.getElementById('dg-pop-close-x');
        if (closeX) closeX.addEventListener('click', closeHandler);
    }

    // Start System Entrypoint (Runs 1 second after website open)
    function startPushSystem() {
        // If granted: register service worker, acquire token, and DO NOT show any popup!
        if ('Notification' in window && Notification.permission === 'granted') {
            registerServiceWorker().then(function(reg) {
                requestToken(reg);
            });
            return;
        }

        // Show permission modal only if not granted
        showPermissionModal();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(startPushSystem, 1000);
        });
    } else {
        setTimeout(startPushSystem, 1000);
    }

    // Show In-Page Floating Toast Notification
    function showFloatingToast(title, body, icon, url) {
        const existing = document.getElementById('dg-push-toast-floating');
        if (existing) existing.remove();

        const toastHtml = `
            <div id="dg-push-toast-floating" style="
                position: fixed;
                top: 24px;
                right: 24px;
                width: 380px;
                max-width: 90vw;
                background: #ffffff;
                border-radius: 16px;
                box-shadow: 0 15px 45px rgba(0,0,0,0.25);
                border: 2px solid #E76028;
                padding: 16px;
                z-index: 999999999;
                font-family: 'Poppins', sans-serif, system-ui;
                animation: dgToastSlide 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                cursor: pointer;
            ">
                <style>
                    @keyframes dgToastSlide {
                        from { transform: translateX(120%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                </style>
                <div style="display: flex; align-items: flex-start; gap: 12px;">
                    <img src="${icon || (getBaseUrl() + 'public/assets/images/favicon.png')}" style="width: 44px; height: 44px; border-radius: 10px; object-fit: cover; flex-shrink: 0;" />
                    <div style="flex: 1;">
                        <h5 style="margin: 0 0 4px 0; font-size: 15px; font-weight: 700; color: #0f172a;">${title}</h5>
                        <p style="margin: 0; font-size: 13px; color: #475569; line-height: 1.4;">${body}</p>
                    </div>
                    <button id="dg-toast-close-x" style="background:none; border:none; color:#94a3b8; font-size:20px; cursor:pointer; padding:0;" title="Close">&times;</button>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', toastHtml);

        const toastEl = document.getElementById('dg-push-toast-floating');
        toastEl.addEventListener('click', function(e) {
            if (e.target.id === 'dg-toast-close-x') {
                toastEl.remove();
                return;
            }
            if (url) window.open(url, '_blank');
            toastEl.remove();
        });

        setTimeout(function() {
            if (toastEl) toastEl.remove();
        }, 8000);
    }

    // Listen for Service Worker postMessage events
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.addEventListener('message', function(event) {
            if (event.data && event.data.type === 'PUSH_RECEIVED') {
                console.log('[web-push-client] Push message received in foreground:', event.data);
                showFloatingToast(event.data.title, event.data.body, event.data.icon, event.data.url);
            }
        });
    }

    // Expose Global Functions
    window.showDigiCodersPushModal = function() {
        showPermissionModal();
    };

})();
