<!DOCTYPE html>
<html lang="en" dir="ltr" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA AI - The Best AI for Websites & Scripts</title>
    <meta name="description" content="EA AI is the ultimate artificial intelligence for building websites, custom scripts, and all kinds of programming with full Arabic and English support. Developed by itsblue.">
    <meta name="keywords" content="EA AI, AI website builder, ذكاء اصطناعي للبرمجة, صنع مواقع بالذكاء الاصطناعي, سكربتات">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; transition: background 0.3s, color 0.3s; }
        body.dark-theme { background-color: #0c0c10; color: #f1f5f9; }
        body.dark-theme .sidebar-bg { background-color: #121218; border-color: #1e1e26; }
        body.dark-theme .chat-box-ai { background-color: #ffffff; color: #000000; border: 1px solid #e2e8f0; }
        body.dark-theme .chat-box-user { background-color: #1f1f2e; color: #ffffff; }
        body.dark-theme .input-box-bg { background-color: #121218; border-color: #1e1e26; }
        
        body.light-theme { background-color: #f8fafc; color: #0f172a; }
        body.light-theme .sidebar-bg { background-color: #ffffff; border-color: #e2e8f0; }
        body.light-theme .chat-box-ai { background-color: #ffffff; color: #000000; border: 1px solid #cbd5e1; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        body.light-theme .chat-box-user { background-color: #2563eb; color: #ffffff; }
        body.light-theme .input-box-bg { background-color: #ffffff; border-color: #cbd5e1; }

        .code-box-wrapper { position: relative; margin: 12px 0; background: #000000 !important; border: 1px solid #27272a; border-radius: 0.75rem; overflow: hidden; }
        .code-box-wrapper pre { padding: 1.25rem; overflow-x: auto; color: #f8fafc !important; font-family: monospace; }
        .code-box-wrapper code { color: #f8fafc !important; }
        .copy-code-btn { position: absolute; top: 10px; right: 10px; background: #2563eb; color: #ffffff; border: none; padding: 5px 12px; font-size: 11px; border-radius: 6px; cursor: pointer; transition: 0.2s; font-weight: 600; display: flex; align-items: center; gap: 5px; }
        .copy-code-btn:hover { background: #1d4ed8; }
    </style>
</head>
<body class="dark-theme flex h-screen overflow-hidden select-none" oncontextmenu="return false;">

    <!-- Auth Modal -->
    <div id="authModal" class="fixed inset-0 bg-black/85 backdrop-blur-md z-50 hidden items-center justify-center p-4">
        <div class="sidebar-bg w-full max-w-md rounded-3xl p-8 shadow-2xl border">
            <div class="text-center mb-6">
                <!-- SVG Avatar AI -->
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 border border-blue-400/50 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <h2 id="authTitle" class="text-2xl font-bold mb-1">Welcome Back</h2>
                <p id="authSubtitle" class="text-xs text-gray-400">Please sign in to your account</p>
            </div>
            
            <div class="space-y-4">
                <div id="nameFieldContainer" class="hidden">
                    <label class="block text-xs text-gray-400 mb-1">Full Name / Username</label>
                    <input type="text" id="fullNameInput" placeholder="Enter your name" class="w-full bg-black/20 border rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Email / Username</label>
                    <input type="text" id="emailInput" placeholder="name@example.com" class="w-full bg-black/20 border rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Password</label>
                    <input type="password" id="passInput" placeholder="••••••••" class="w-full bg-black/20 border rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                </div>

                <button onclick="submitAuth()" id="authSubmitBtn" class="w-full bg-blue-600 hover:bg-blue-500 text-white py-3 rounded-xl font-semibold transition">Sign In</button>
                
                <div class="text-center pt-2">
                    <button onclick="toggleAuthMode()" id="authSwitchBtn" class="text-xs text-blue-400 hover:underline">Don't have an account? Sign Up</button>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-[10px] text-gray-600 tracking-widest uppercase">Developed by itsblue</p>
                </div>
            </div>
        </div>
    </div>

    <!-- All User Chats Modal -->
    <div id="allChatsModal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 hidden items-center justify-center p-4">
        <div class="sidebar-bg w-full max-w-lg rounded-3xl p-6 shadow-2xl border flex flex-col max-h-[80vh]">
            <div class="flex items-center justify-between mb-4 border-b pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <h3 class="font-bold text-lg">سجل شاتات حسابك</h3>
                </div>
                <button onclick="toggleAllChatsModal()" class="text-gray-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div id="userChatsListContainer" class="flex-1 overflow-y-auto space-y-2 pr-1"></div>
        </div>
    </div>

    <!-- Premium Modal -->
    <div id="premiumModal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 hidden items-center justify-center p-4">
        <div class="sidebar-bg w-full max-w-lg rounded-3xl p-8 shadow-2xl border border-amber-500/30">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-amber-500/20 text-amber-400 rounded-xl flex items-center justify-center text-lg">
                        <i class="fa-solid fa-crown"></i>
                    </div>
                    <h3 class="font-bold text-xl text-amber-400">Upgrade to Premium</h3>
                </div>
                <button onclick="togglePremiumModal()" class="text-gray-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            
            <div class="space-y-4 text-sm text-gray-300">
                <p>احصل على اشتراك البريميوم لمدة **شهر كامل** بـ **50 جنيهاً (أو 1 دولار)** فقط واستمتع بمزايا غير محدودة وتوليد الصور!</p>
                <div class="bg-black/30 p-4 rounded-xl border border-gray-700 space-y-2">
                    <p class="font-semibold text-white">طريقة الاشتراك:</p>
                    <p>1. قم بتحويل مبلغ 50 جنيه (أو 1 دولار) إلى رقم الكاش التالي: <span class="text-blue-400 font-bold select-all">01013494095</span></p>
                    <p>2. التقط صورة سكرين شوت لعملية التحويل وارفعها بالأسفل.</p>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">ارفع سكرين شوت التحويل:</label>
                    <input type="file" id="transferReceipt" accept="image/*" class="w-full bg-black/20 border rounded-xl px-3 py-2 text-xs file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-500">
                </div>

                <button onclick="submitPremiumVerification()" id="verifyBtn" class="w-full bg-amber-500 hover:bg-amber-400 text-black py-3 rounded-xl font-bold transition">تحقق من التحويل وتفعيل الاشتراك</button>
            </div>
        </div>
    </div>

    <!-- Settings Modal -->
    <div id="settingsModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="sidebar-bg w-full max-w-sm rounded-3xl p-6 shadow-2xl border">
            <div class="flex items-center justify-between mb-4">
                <h3 id="settingsTitle" class="font-bold text-lg">Settings</h3>
                <button onclick="toggleSettings()" class="text-gray-400 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="space-y-4">
                <div>
                    <label id="themeLabel" class="block text-xs font-semibold mb-2 text-gray-400">Theme Mode</label>
                    <select id="themeSelect" onchange="changeTheme(this.value)" class="w-full bg-black/20 border rounded-xl px-3 py-2 text-sm focus:outline-none">
                        <option value="dark-theme">Dark Mode</option>
                        <option value="light-theme">Light Mode</option>
                    </select>
                </div>
                <div>
                    <label id="langLabel" class="block text-xs font-semibold mb-2 text-gray-400">Language</label>
                    <select id="langSelect" onchange="changeLang(this.value)" class="w-full bg-black/20 border rounded-xl px-3 py-2 text-sm focus:outline-none">
                        <option value="en">English</option>
                        <option value="ar">العربية</option>
                    </select>
                </div>
                <button onclick="toggleSettings()" class="w-full bg-blue-600 text-white py-2 rounded-xl text-sm font-semibold">Save</button>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="w-72 sidebar-bg border-r flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-4 flex items-center justify-between border-b">
                <div class="flex items-center gap-3">
                    <!-- SVG Avatar AI Sidebar -->
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white shadow-md border border-blue-400/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-base leading-tight">EA AI</h1>
                        <span id="badgeDisplay" class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded font-bold">Standard</span>
                    </div>
                </div>
            </div>

            <div class="p-4 flex flex-col gap-2">
                <div class="flex gap-2">
                    <button onclick="newChat()" id="newChatBtn" class="flex-1 bg-blue-600/10 hover:bg-blue-600/20 border border-blue-500/30 text-blue-400 py-2.5 px-3 rounded-xl flex items-center justify-center gap-2 text-sm transition font-medium">
                        <i class="fa-solid fa-plus"></i> New Chat
                    </button>
                    <button onclick="toggleSettings()" class="bg-black/20 border hover:bg-black/40 px-3 py-2.5 rounded-xl transition text-gray-400 hover:text-white" title="Settings">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                </div>
                <button onclick="toggleAllChatsModal()" class="w-full bg-black/30 hover:bg-black/55 border border-gray-700 text-gray-200 py-2.5 rounded-xl text-xs font-semibold flex items-center justify-center gap-2 transition">
                    <i class="fa-solid fa-list-ul text-blue-400"></i> عرض كل شاتات الحساب
                </button>
                <button onclick="togglePremiumModal()" id="upgradeBtn" class="w-full bg-gradient-to-r from-amber-500 to-yellow-600 text-black py-2 rounded-xl text-xs font-bold flex items-center justify-center gap-2 shadow-md hover:opacity-90 transition">
                    <i class="fa-solid fa-crown"></i> ترقية إلى بريميوم (50 جـ / 1$)
                </button>
            </div>

            <div class="px-4 py-2">
                <span id="historyTitle" class="text-[11px] text-gray-500 font-semibold mb-2 block uppercase tracking-wider">History</span>
                <div id="chatHistoryList" class="space-y-1 overflow-y-auto max-h-[calc(100vh-380px)]"></div>
            </div>
        </div>

        <div class="p-4 border-t bg-black/10">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <div id="userAvatar" class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white">U</div>
                    <span id="userNameDisplay" class="text-xs font-semibold truncate max-w-[120px]">User</span>
                </div>
            </div>
            <button onclick="logout()" id="logoutBtn" class="w-full text-xs text-red-400 hover:bg-red-500/10 py-2 rounded-lg text-center transition font-medium">Sign Out</button>
            <div class="text-center mt-3">
                <p class="text-[9px] text-gray-600 tracking-widest uppercase font-bold">Developed by itsblue</p>
            </div>
        </div>
    </aside>

    <!-- Main Chat Area -->
    <main class="flex-1 flex flex-col h-full relative">
        <header class="flex items-center justify-between p-4 sidebar-bg border-b">
            <h1 class="font-bold md:hidden">EA AI</h1>
            <div class="mx-auto md:mx-0 flex items-center gap-2 bg-black/30 border border-gray-800 px-3 py-1 rounded-xl text-xs text-gray-300">
                <i class="fa-solid fa-users text-blue-400"></i>
                <span>زوار الموقع: <strong id="visitorCountDisplay" class="text-white">1,428</strong></span>
            </div>
            <div class="hidden md:flex gap-2">
                <button onclick="togglePremiumModal()" class="text-xs bg-amber-500 text-black px-3 py-1.5 rounded-lg font-bold"><i class="fa-solid fa-crown"></i> بريميوم</button>
            </div>
        </header>

        <div id="chatContainer" class="flex-1 overflow-y-auto p-4 md:p-6 space-y-6">
            <div class="max-w-3xl mx-auto text-center py-12">
                <!-- SVG Avatar Main -->
                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-700 border border-blue-400/50 rounded-3xl flex items-center justify-center text-white mx-auto mb-4 shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <h2 id="welcomeHeading" class="text-3xl font-bold mb-2">How can EA AI help you today?</h2>
                <p id="welcomeDesc" class="text-blue-400 text-xs font-semibold uppercase tracking-wider mb-2">
                    The best AI for building websites, scripts, and all kinds of programming with full Arabic & English support.
                </p>
                <p class="text-gray-400 text-sm">Ask questions, write scripts, code, or generate images instantly.</p>
            </div>
        </div>

        <div class="p-4 border-t input-box-bg">
            <div class="max-w-3xl mx-auto relative input-box-bg border rounded-2xl p-2.5 shadow-xl">
                <textarea id="userInput" rows="1" placeholder="Type your message or ask to generate an image..." class="w-full bg-transparent px-3 py-2 text-sm focus:outline-none resize-none max-h-32"></textarea>
                
                <div class="flex items-center justify-between px-2 pt-2 border-t mt-1 border-gray-500/10">
                    <span class="text-[10px] text-emerald-500 font-semibold"><i class="fa-solid fa-bolt mr-1"></i> Fast Engine (Ar / En)</span>
                    <button onclick="sendMessage()" class="bg-blue-600 hover:bg-blue-500 text-white w-9 h-9 rounded-xl flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </div>
            </div>
            <div class="text-center mt-2 md:hidden">
                <span class="text-[10px] text-gray-500 font-medium">Developed by itsblue</span>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('keydown', function(e) {
            if (
                e.key === 'F12' || 
                (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'C' || e.key === 'c' || e.key === 'J' || e.key === 'j')) || 
                (e.ctrlKey && (e.key === 'U' || e.key === 'u' || e.key === 'S' || e.key === 's'))
            ) {
                e.preventDefault();
                alert("هذه الصفحة محمية ولا يمكن عرض كود المصدر أو فحص العناصر الخاص بها!");
                return false;
            }
        });

        let visitorCount = localStorage.getItem("ea_visitors") ? parseInt(localStorage.getItem("ea_visitors")) : 1428;
        if (!sessionStorage.getItem("visited_session")) {
            visitorCount++;
            localStorage.setItem("ea_visitors", visitorCount);
            sessionStorage.setItem("visited_session", "true");
        }
        document.getElementById("visitorCountDisplay").innerText = visitorCount.toLocaleString();

        const adminAccount = { name: "qR4Xs", email: "qR4Xs", pass: "01013494095Mm", role: "admin", isPremium: true, expiryDate: Date.now() + (30 * 24 * 60 * 60 * 1000) };

        let currentUser = localStorage.getItem("ea_user") ? JSON.parse(localStorage.getItem("ea_user")) : null;
        let registeredUsers = JSON.parse(localStorage.getItem("ea_registered_users")) || [];
        
        if (currentUser && currentUser.isPremium && currentUser.expiryDate) {
            if (Date.now() > currentUser.expiryDate) {
                currentUser.isPremium = false;
                localStorage.setItem("ea_user", JSON.stringify(currentUser));
                alert("لقد انتهت مدة اشتراك البريميوم (شهر واحد). تم تحويل حسابك إلى الباقة العادية.");
            }
        }

        const adminIndex = registeredUsers.findIndex(u => u.email === "qR4Xs");
        if (adminIndex === -1) {
            registeredUsers.push(adminAccount);
        } else {
            registeredUsers[adminIndex] = adminAccount;
        }
        localStorage.setItem("ea_registered_users", JSON.stringify(registeredUsers));

        let allChats = JSON.parse(localStorage.getItem("ea_all_chats")) || [];
        let currentChatId = null;
        let currentLang = localStorage.getItem("ea_lang") || "en";
        let currentTheme = localStorage.getItem("ea_theme") || "dark-theme";
        let isSignUpMode = false;

        window.onload = () => {
            applyTheme(currentTheme);
            applyLanguage(currentLang);
            if (!currentUser) {
                document.getElementById("authModal").classList.remove("hidden");
                document.getElementById("authModal").classList.add("flex");
            } else {
                applyUserStatus();
                newChat();
            }
        };

        function toggleAuthMode() {
            isSignUpMode = !isSignUpMode;
            const nameContainer = document.getElementById("nameFieldContainer");
            const authTitle = document.getElementById("authTitle");
            const authSubtitle = document.getElementById("authSubtitle");
            const authSubmitBtn = document.getElementById("authSubmitBtn");
            const authSwitchBtn = document.getElementById("authSwitchBtn");

            if (isSignUpMode) {
                nameContainer.classList.remove("hidden");
                authTitle.innerText = "Create Account";
                authSubtitle.innerText = "Sign up to get started with EA AI";
                authSubmitBtn.innerText = "Sign Up";
                authSwitchBtn.innerText = "Already have an account? Sign In";
            } else {
                nameContainer.classList.add("hidden");
                authTitle.innerText = "Welcome Back";
                authSubtitle.innerText = "Please sign in to your account";
                authSubmitBtn.innerText = "Sign In";
                authSwitchBtn.innerText = "Don't have an account? Sign Up";
            }
        }

        function submitAuth() {
            const email = document.getElementById("emailInput").value.trim();
            const pass = document.getElementById("passInput").value.trim();

            if (!email || !pass) {
                alert("الرجاء إدخال اسم المستخدم وكلمة المرور.");
                return;
            }

            if (isSignUpMode) {
                const name = document.getElementById("fullNameInput").value.trim();
                if (!name) {
                    alert("الرجاء إدخال الاسم.");
                    return;
                }
                
                const existing = registeredUsers.find(u => u.email === email);
                if (existing) {
                    alert("هذا الحساب موجود بالفعل، قم بتسجيل الدخول.");
                    return;
                }

                currentUser = { name, email, pass, role: "user", isPremium: false, messageCount: 0, lockUntil: 0 };
                registeredUsers.push(currentUser);
                localStorage.setItem("ea_registered_users", JSON.stringify(registeredUsers));
                localStorage.setItem("ea_user", JSON.stringify(currentUser));
                
                alert("تم إنشاء الحساب بنجاح!");
                document.getElementById("authModal").classList.remove("flex");
                document.getElementById("authModal").classList.add("hidden");
                applyUserStatus();
                newChat();

            } else {
                const foundUser = registeredUsers.find(u => u.email === email && u.pass === pass);
                
                if (!foundUser) {
                    alert("هذا الحساب غير موجود! برجاء التوجه إلى إنشاء حساب جديد.");
                    if (!isSignUpMode) toggleAuthMode();
                    return;
                }

                currentUser = foundUser;
                if (currentUser.isPremium && currentUser.expiryDate && Date.now() > currentUser.expiryDate) {
                    currentUser.isPremium = false;
                }
                localStorage.setItem("ea_user", JSON.stringify(currentUser));
                document.getElementById("authModal").classList.remove("flex");
                document.getElementById("authModal").classList.add("hidden");
                applyUserStatus();
                newChat();
            }
        }

        function toggleAllChatsModal() {
            const modal = document.getElementById("allChatsModal");
            modal.classList.toggle("hidden");
            modal.classList.toggle("flex");
            loadUserChatsInModal();
        }

        function loadUserChatsInModal() {
            const container = document.getElementById("userChatsListContainer");
            container.innerHTML = "";
            const userChats = allChats.filter(c => c.userEmail === currentUser.email);
            
            if (userChats.length === 0) {
                container.innerHTML = `<p class="text-xs text-gray-400 text-center py-6">لا توجد شاتات محفوظة لهذا الحساب.</p>`;
                return;
            }

            userChats.forEach(chat => {
                container.innerHTML += `
                    <div class="flex items-center justify-between p-3 bg-black/20 border border-gray-800 rounded-xl hover:border-blue-500/50 transition">
                        <div class="cursor-pointer flex-1 truncate pr-2" onclick="openSpecificChat('${chat.id}')">
                            <p class="text-xs font-semibold text-white truncate"><i class="fa-regular fa-message mr-2 text-blue-400"></i>${chat.title}</p>
                            <span class="text-[10px] text-gray-500">${new Date(chat.timestamp).toLocaleString()}</span>
                        </div>
                        <button onclick="deleteSpecificChat('${chat.id}')" class="text-xs text-red-400 hover:text-red-300 p-2"><i class="fa-solid fa-trash"></i></button>
                    </div>
                `;
            });
        }

        function openSpecificChat(chatId) {
            currentChatId = chatId;
            toggleAllChatsModal();
            renderCurrentChatMessages();
        }

        function deleteSpecificChat(chatId) {
            allChats = allChats.filter(c => c.id !== chatId);
            localStorage.setItem("ea_all_chats", JSON.stringify(allChats));
            loadUserChatsInModal();
            loadChatHistoryList();
            if (currentChatId === chatId) newChat();
        }

        function togglePremiumModal() {
            const modal = document.getElementById("premiumModal");
            modal.classList.toggle("hidden");
            modal.classList.toggle("flex");
        }

        async function submitPremiumVerification() {
            const fileInput = document.getElementById("transferReceipt");
            if (fileInput.files.length === 0) {
                alert("الرجاء اختيار صورة سكرين شوت التحويل أولاً!");
                return;
            }

            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onload = async function(e) {
                const base64Image = e.target.result;
                const verifyBtn = document.getElementById("verifyBtn");
                verifyBtn.innerText = "جاري تحليل التحويل بواسطة AI...";
                verifyBtn.disabled = true;

                try {
                    const response = await fetch("ai.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ 
                            action: "verify_payment",
                            image: base64Image,
                            message: "Analyze this payment receipt for 50 EGP or 1 USD sent to 01013494095. Reply with ONLY 'YES' if valid or 'NO' if invalid." 
                        })
                    });
                    const data = await response.json();
                    
                    if (data.reply && data.reply.toUpperCase().includes("YES")) {
                        currentUser.isPremium = true;
                        currentUser.expiryDate = Date.now() + (30 * 24 * 60 * 60 * 1000);
                        localStorage.setItem("ea_user", JSON.stringify(currentUser));
                        
                        registeredUsers = registeredUsers.map(u => u.email === currentUser.email ? currentUser : u);
                        localStorage.setItem("ea_registered_users", JSON.stringify(registeredUsers));

                        alert("تم تفعيل اشتراك البريميوم بنجاح لمدة شهر كامل 🎉");
                        togglePremiumModal();
                        applyUserStatus();
                    } else {
                        alert("فشل التحقق من الصورة أو المبلغ غير صحيح. تأكد من رفع صورة التحويل الصحيحة (50 جنيه أو 1 دولار).");
                    }
                } catch (err) {
                    alert("حدث خطأ أثناء الاتصال بالخادم.");
                } finally {
                    verifyBtn.innerText = "تحقق من التحويل وتفعيل الاشتراك";
                    verifyBtn.disabled = false;
                }
            };
            reader.readAsDataURL(file);
        }

        function changeTheme(theme) {
            currentTheme = theme;
            localStorage.setItem("ea_theme", theme);
            applyTheme(theme);
        }

        function applyTheme(theme) {
            document.body.className = theme + " flex h-screen overflow-hidden select-none";
            document.getElementById("themeSelect").value = theme;
        }

        function changeLang(lang) {
            currentLang = lang;
            localStorage.setItem("ea_lang", lang);
            applyLanguage(lang);
        }

        function applyLanguage(lang) {
            document.getElementById("htmlRoot").setAttribute("dir", lang === "ar" ? "rtl" : "ltr");
            document.getElementById("htmlRoot").setAttribute("lang", lang);
            document.getElementById("langSelect").value = lang;
            
            if (lang === "ar") {
                document.getElementById("welcomeHeading").innerText = "كيف يمكن لـ EA AI مساعدتك اليوم؟";
                document.getElementById("userInput").placeholder = "اكتب رسالتك أو اطلب برامج أو سكربتات أو صور...";
                document.getElementById("newChatBtn").innerHTML = `<i class="fa-solid fa-plus"></i> محادثة جديدة`;
                document.getElementById("historyTitle").innerText = "السجل";
                document.getElementById("settingsTitle").innerText = "الإعدادات";
                document.getElementById("themeLabel").innerText = "الوضع (الثيم)";
                document.getElementById("langLabel").innerText = "اللغة";
            } else {
                document.getElementById("welcomeHeading").innerText = "How can EA AI help you today?";
                document.getElementById("userInput").placeholder = "Type your message or ask to write code, scripts, or generate images...";
                document.getElementById("newChatBtn").innerHTML = `<i class="fa-solid fa-plus"></i> New Chat`;
                document.getElementById("historyTitle").innerText = "History";
                document.getElementById("settingsTitle").innerText = "Settings";
                document.getElementById("themeLabel").innerText = "Theme Mode";
                document.getElementById("langLabel").innerText = "Language";
            }
        }

        function toggleSettings() {
            const modal = document.getElementById("settingsModal");
            modal.classList.toggle("hidden");
            modal.classList.toggle("flex");
        }

        function applyUserStatus() {
            if (currentUser) {
                document.getElementById("userNameDisplay").innerText = currentUser.name;
                document.getElementById("userAvatar").innerText = currentUser.name.charAt(0).toUpperCase();
                
                const badge = document.getElementById("badgeDisplay");
                if (currentUser.isPremium) {
                    badge.innerText = "PREMIUM";
                    badge.className = "text-[10px] bg-amber-500/20 text-amber-400 px-2 py-0.5 rounded font-bold border border-amber-500/30";
                    document.getElementById("upgradeBtn").style.display = "none";
                } else {
                    badge.innerText = "Standard";
                    badge.className = "text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded font-bold";
                }
            }
        }

        function logout() {
            localStorage.removeItem("ea_user");
            location.reload();
        }

        function newChat() {
            currentChatId = "chat_" + Date.now();
            const newChatObj = { id: currentChatId, userEmail: currentUser.email, title: "New Chat", timestamp: Date.now(), messages: [] };
            allChats.push(newChatObj);
            localStorage.setItem("ea_all_chats", JSON.stringify(allChats));
            
            document.getElementById("chatContainer").innerHTML = `
                <div class="max-w-3xl mx-auto text-center py-12">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-700 border border-blue-400/50 rounded-3xl flex items-center justify-center text-white mx-auto mb-4 shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-2">${currentLang === 'ar' ? 'كيف يمكن لـ EA AI مساعدتك اليوم؟' : 'How can EA AI help you today?'}</h2>
                    <p class="text-blue-400 text-xs font-semibold uppercase tracking-wider mb-2">
                        The best AI for building websites, scripts, and all kinds of programming with full Arabic & English support.
                    </p>
                </div>`;
            loadChatHistoryList();
        }

        function loadChatHistoryList() {
            const list = document.getElementById("chatHistoryList");
            list.innerHTML = "";
            const userChats = allChats.filter(c => c.userEmail === currentUser.email);
            
            userChats.slice(-6).reverse().forEach(chat => {
                const isActive = chat.id === currentChatId ? 'border-blue-500/50 bg-blue-600/10' : 'opacity-80';
                list.innerHTML += `
                    <div onclick="openSpecificChat('${chat.id}')" class="text-xs p-2.5 rounded-xl truncate font-medium border ${isActive} cursor-pointer hover:bg-blue-600/15 transition">
                        <i class="fa-regular fa-message mr-2 text-blue-400"></i> ${chat.title}
                    </div>
                `;
            });
        }

        function renderCurrentChatMessages() {
            const container = document.getElementById("chatContainer");
            container.innerHTML = "";
            const currentChat = allChats.find(c => c.id === currentChatId);
            if (!currentChat || currentChat.messages.length === 0) {
                newChat();
                return;
            }

            currentChat.messages.forEach(msg => {
                appendMessageUI(msg.role, msg.content, msg.isImage);
            });
        }

        function appendMessageUI(role, text, isImage = false) {
            const container = document.getElementById("chatContainer");
            const isUser = role === 'user';
            
            let contentHtml = "";
            if (isImage) {
                contentHtml = `<img src="${text}" class="rounded-xl max-w-full h-auto shadow-md border border-gray-700" alt="Generated Image">`;
            } else {
                let formattedText = text.replace(/```([a-z]*)\n([\s\S]*?)```/g, (match, p1, p2) => {
                    const codeId = "code_" + Math.random().toString(36).substr(2, 9);
                    return `
                        <div class="code-box-wrapper">
                            <button class="copy-code-btn" onclick="copyCodeText('${codeId}')">
                                <i class="fa-regular fa-copy"></i> Copy
                            </button>
                            <pre><code id="${codeId}">${escapeHtml(p2.trim())}</code></pre>
                        </div>
                    `;
                });
                contentHtml = `<div class="whitespace-pre-wrap">${formattedText}</div>`;
            }

            const boxClass = isUser ? 'chat-box-user ml-auto' : 'chat-box-ai mr-auto';

            const aiAvatarSvg = `<div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white shrink-0 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
            </div>`;

            const html = `
                <div class="max-w-3xl mx-auto flex gap-4 ${isUser ? 'justify-end' : ''}">
                    ${!isUser ? aiAvatarSvg : ''}
                    <div class="${boxClass} border p-4 rounded-2xl text-sm max-w-[85%] leading-relaxed shadow-sm">
                        ${contentHtml}
                    </div>
                    ${isUser ? `<div class="w-8 h-8 rounded-xl bg-gray-700 flex items-center justify-center text-white text-xs shrink-0">${currentUser ? currentUser.name.charAt(0) : 'U'}</div>` : ''}
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            container.scrollTop = container.scrollHeight;
        }

        function escapeHtml(text) {
            return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        }

        function copyCodeText(id) {
            const codeText = document.getElementById(id).innerText;
            navigator.clipboard.writeText(codeText).then(() => {
                alert(currentLang === 'ar' ? "تم نسخ الكود بنجاح!" : "Code copied successfully!");
            });
        }

        document.getElementById("userInput").addEventListener("keydown", function(e) {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });

        async function sendMessage() {
            const input = document.getElementById("userInput");
            let text = input.value.trim();
            if (!text) return;

            if (!currentUser.isPremium) {
                currentUser.messageCount = currentUser.messageCount || 0;
                
                if (currentUser.lockUntil && Date.now() < currentUser.lockUntil) {
                    const remainingMins = Math.ceil((currentUser.lockUntil - Date.now()) / (1000 * 60));
                    alert(`لقد تجاوزت حد 100 رسالة المسموح به للباقة العادية! يرجى الانتظار ${remainingMins} دقيقة أخرى (ساعتين) أو ترقية حسابك.`);
                    togglePremiumModal();
                    return;
                }

                if (currentUser.messageCount >= 100) {
                    currentUser.lockUntil = Date.now() + (2 * 60 * 60 * 1000);
                    localStorage.setItem("ea_user", JSON.stringify(currentUser));
                    alert("لقد تجاوزت حد 100 رسالة للباقة العادية! انتظر ساعتين أو قم بالترقية فوراً.");
                    togglePremiumModal();
                    return;
                }

                currentUser.messageCount++;
                localStorage.setItem("ea_user", JSON.stringify(currentUser));
                registeredUsers = registeredUsers.map(u => u.email === currentUser.email ? currentUser : u);
                localStorage.setItem("ea_registered_users", JSON.stringify(registeredUsers));
            }

            if (!currentChatId) newChat();

            input.value = "";
            appendMessageUI('user', text);

            let currentChat = allChats.find(c => c.id === currentChatId);
            if (currentChat.title === "New Chat") {
                currentChat.title = text.substring(0, 20) + "...";
            }
            
            currentChat.messages.push({ role: 'user', content: text, isImage: false });
            localStorage.setItem("ea_all_chats", JSON.stringify(allChats));
            loadChatHistoryList();

            const loadingId = "load_" + Date.now();
            const container = document.getElementById("chatContainer");
            
            const loadingAvatarSvg = `<div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white shrink-0 animate-pulse shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
            </div>`;

            container.insertAdjacentHTML('beforeend', `
                <div id="${loadingId}" class="max-w-3xl mx-auto flex gap-4">
                    ${loadingAvatarSvg}
                    <div class="chat-box-ai border p-4 rounded-2xl text-sm opacity-70">Thinking...</div>
                </div>
            `);
            container.scrollTop = container.scrollHeight;

            try {
                let modifiedText = text;
                if (text.toLowerCase().includes("سعر") || text.toLowerCase().includes("بكم") || text.toLowerCase().includes("price") || text.toLowerCase().includes("cost")) {
                    modifiedText += " (Note: Premium price is 50 EGP or 1 USD)";
                }

                const isImageRequest = text.toLowerCase().includes("ارسم") || text.toLowerCase().includes("صورة") || text.toLowerCase().includes("generate image") || text.toLowerCase().includes("draw");
                const endpointAction = isImageRequest ? "generate_image" : "chat";
                
                const response = await fetch("ai.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ action: endpointAction, prompt: modifiedText, messages: currentChat.messages })
                });

                const data = await response.json();
                document.getElementById(loadingId).remove();

                if (isImageRequest && data.imageUrl) {
                    appendMessageUI('assistant', data.imageUrl, true);
                    currentChat.messages.push({ role: 'assistant', content: data.imageUrl, isImage: true });
                } else {
                    let aiReply = data.reply || "No response.";
                    if (text.toLowerCase().includes("سعر") || text.toLowerCase().includes("بكم")) {
                        aiReply = "سعر اشتراك البريميوم هو 50 جنيهاً فقط أو ما يعادل 1 دولار أمريكي!";
                    }
                    appendMessageUI('assistant', aiReply, false);
                    currentChat.messages.push({ role: 'assistant', content: aiReply, isImage: false });
                }
                
                localStorage.setItem("ea_all_chats", JSON.stringify(allChats));

            } catch (error) {
                document.getElementById(loadingId).remove();
                appendMessageUI('assistant', "Error: Server connection failed.", false);
            }
        }
    </script>
</body>
</html>
