<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-key="pageTitle">ToN Manager - مدير ملفات بسيط وفعال</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
        
        body {
            font-family: 'Tajawal', sans-serif;
            scroll-behavior: smooth;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #3498db, #2c3e50);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .code-block {
            direction: ltr;
            text-align: left;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .comparison-table th, .comparison-table td {
            padding: 12px 15px;
            text-align: center;
        }
        
        .comparison-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .animated-icon {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .animated-icon {
            transform: scale(1.2);
        }
        
        .scroll-animation {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .scroll-animation.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="absolute top-4 left-4 z-50">
        <button id="language-toggle" class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">
            English
        </button>
    </div>

    <header class="gradient-bg text-white">
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4" data-key="heroTitle">ToN Manager</h1>
                    <p class="text-xl md:text-2xl mb-6" data-key="heroSubtitle">مدير ملفات بسيط، سريع وفعال بحجم أقل من 100 كيلوبايت</p>
                    <p class="text-lg mb-8" data-key="heroDescription">إدارة ملفات السيرفر بسهولة من خلال متصفحك، بدون الحاجة لبرامج FTP أو لوحات تحكم معقدة.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#download" class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-3 px-6 rounded-lg transition duration-300" data-key="downloadButton">
                            <i class="fas fa-download ml-2"></i>تحميل مجاني
                        </a>
                        <a href="#features" class="bg-transparent hover:bg-blue-700 text-white border border-white font-bold py-3 px-6 rounded-lg transition duration-300" data-key="featuresButton">
                            <i class="fas fa-info-circle ml-2"></i>تعرف على المميزات
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="bg-white p-2 rounded-lg shadow-xl">
                        <div class="bg-gray-800 rounded-t-md py-2 px-4 flex items-center">
                            <div class="flex space-x-2 rtl:space-x-reverse">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <div class="mx-auto text-gray-300 text-sm">ToN Manager</div>
                        </div>
                        <div class="overflow-hidden rounded-b-md">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='450' viewBox='0 0 800 450' fill='none'%3E%3Crect width='800' height='450' fill='%23F8FAFC'/%3E%3Crect x='180' y='50' width='620' height='400' rx='4' fill='white' stroke='%23E2E8F0'/%3E%3Crect x='0' y='50' width='180' height='400' fill='%232C3E50'/%3E%3Ctext x='20' y='80' font-family='Arial' font-size='16' font-weight='bold' fill='white'%3EToN Manager%3C/text%3E%3Crect x='10' y='100' width='160' height='30' rx='4' fill='%233498DB'/%3E%3Ctext x='35' y='120' font-family='Arial' font-size='12' fill='white'%3E%D8%A7%D9%84%D9%85%D8%AC%D9%84%D8%AF %D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%3C/text%3E%3Crect x='10' y='140' width='160' height='30' rx='4' fill='%232C3E50'/%3E%3Ctext x='35' y='160' font-family='Arial' font-size='12' fill='white'%3E%D8%A7%D9%84%D9%85%D8%B3%D8%AA%D9%86%D8%AF%D8%A7%D8%AA%3C/text%3E%3Crect x='10' y='180' width='160' height='30' rx='4' fill='%232C3E50'/%3E%3Ctext x='35' y='200' font-family='Arial' font-size='12' fill='white'%3E%D8%A7%D9%84%D8%B5%D9%88%D8%B1%3C/text%3E%3Crect x='10' y='220' width='160' height='30' rx='4' fill='%232C3E50'/%3E%3Ctext x='35' y='240' font-family='Arial' font-size='12' fill='white'%3E%D8%A7%D9%84%D9%85%D9%88%D8%B3%D9%8A%D9%82%D9%89%3C/text%3E%3Crect x='200' y='70' width='580' height='40' rx='4' fill='%23F8FAFC'/%3E%3Ctext x='220' y='95' font-family='Arial' font-size='14' fill='%23333'%3E%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9 / %D8%A7%D9%84%D9%85%D8%B3%D8%AA%D9%86%D8%AF%D8%A7%D8%AA%3C/text%3E%3Crect x='200' y='120' width='100' height='30' rx='4' fill='%233498DB'/%3E%3Ctext x='215' y='140' font-family='Arial' font-size='12' fill='white'%3E%D8%B1%D9%81%D8%B9 %D9%85%D9%84%D9%81%3C/text%3E%3Crect x='310' y='120' width='100' height='30' rx='4' fill='%233498DB'/%3E%3Ctext x='325' y='140' font-family='Arial' font-size='12' fill='white'%3E%D8%A5%D9%86%D8%B4%D8%A7%D8%A1 %D9%85%D8%AC%D9%84%D8%AF%3C/text%3E%3Crect x='200' y='160' width='580' height='270' rx='4' fill='white' stroke='%23E2E8F0'/%3E%3Crect x='200' y='160' width='580' height='30' rx='4' fill='%23F8FAFC'/%3E%3Ctext x='220' y='180' font-family='Arial' font-size='12' fill='%23333'%3E%D8%A7%D9%84%D8%A7%D8%B3%D9%85%3C/text%3E%3Ctext x='450' y='180' font-family='Arial' font-size='12' fill='%23333'%3E%D8%A7%D9%84%D8%AD%D8%AC%D9%85%3C/text%3E%3Ctext x='550' y='180' font-family='Arial' font-size='12' fill='%23333'%3E%D8%AA%D8%A7%D8%B1%D9%8A%D8%AE %D8%A7%D9%84%D8%AA%D8%B9%D8%AF%D9%8A%D9%84%3C/text%3E%3Ctext x='700' y='180' font-family='Arial' font-size='12' fill='%23333'%3E%D8%A7%D9%84%D8%A5%D8%AC%D8%B1%D8%A7%D8%A1%D8%A7%D8%AA%3C/text%3E%3Crect x='200' y='190' width='580' height='40' rx='0' fill='white' stroke='%23E2E8F0'/%3E%3Ctext x='220' y='215' font-family='Arial' font-size='12' fill='%23333'%3E%F0%9F%93%81 %D9%85%D8%B4%D8%B1%D9%88%D8%B9 %D8%A7%D9%84%D8%B9%D9%85%D9%84%3C/text%3E%3Ctext x='450' y='215' font-family='Arial' font-size='12' fill='%23333'%3E-%3C/text%3E%3Ctext x='550' y='215' font-family='Arial' font-size='12' fill='%23333'%3E2023/06/10%3C/text%3E%3Ctext x='700' y='215' font-family='Arial' font-size='12' fill='%233498DB'%3E%D9%81%D8%AA%D8%AD | %D8%AD%D8%B0%D9%81%3C/text%3E%3Crect x='200' y='230' width='580' height='40' rx='0' fill='%23F8FAFC' stroke='%23E2E8F0'/%3E%3Ctext x='220' y='255' font-family='Arial' font-size='12' fill='%23333'%3E%F0%9F%93%84 %D8%AA%D9%82%D8%B1%D9%8A%D8%B1_%D8%B4%D9%87%D8%B1%D9%8A.docx%3C/text%3E%3Ctext x='450' y='255' font-family='Arial' font-size='12' fill='%23333'%3E25 KB%3C/text%3E%3Ctext x='550' y='255' font-family='Arial' font-size='12' fill='%23333'%3E2023/06/15%3C/text%3E%3Ctext x='700' y='255' font-family='Arial' font-size='12' fill='%233498DB'%3E%D8%AA%D9%86%D8%B2%D9%8A%D9%84 | %D8%AD%D8%B0%D9%81%3C/text%3E%3C/svg%3E" 
                            alt="ToN Manager Interface" class="w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="featuresSectionTitle">مميزات ToN Manager</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-feather"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature1Title">خفيف الوزن</h3>
                    <p class="text-gray-600" data-key="feature1Description">أقل من 100 كيلوبايت، ملف واحد فقط، بدون قاعدة بيانات، يعمل على أي استضافة تدعم PHP 5.5+.</p>
                </div>
                
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature2Title">سهل التثبيت</h3>
                    <p class="text-gray-600" data-key="feature2Description">فقط ارفع ملف index.php إلى السيرفر وافتح الرابط من المتصفح، بدون إعدادات معقدة.</p>
                </div>
                
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature3Title">آمن</h3>
                    <p class="text-gray-600" data-key="feature3Description">حماية بكلمة مرور، تحديد مجلد الوصول، منع الوصول للملفات الحساسة في السيرفر.</p>
                </div>
                
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature4Title">محرر نصوص مدمج</h3>
                    <p class="text-gray-600" data-key="feature4Description">تحرير ملفات النصوص مباشرة من المتصفح، يدعم PHP, HTML, CSS, JS وغيرها.</p>
                </div>
                
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-file-archive"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature5Title">فك ضغط الملفات</h3>
                    <p class="text-gray-600" data-key="feature5Description">فك ضغط ملفات ZIP مباشرة على السيرفر بدون الحاجة لبرامج إضافية.</p>
                </div>
                
                <div class="feature-card bg-white rounded-lg p-6 shadow-md transition-all duration-300">
                    <div class="text-blue-500 text-4xl mb-4 animated-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-key="feature6Title">متعدد اللغات</h3>
                    <p class="text-gray-600" data-key="feature6Description">يدعم العديد من اللغات بما فيها العربية والإنجليزية والفرنسية وغيرها.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="howItWorksTitle">كيف يعمل ToN Manager؟</h2>
            
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between mb-4">
                            <button class="tab-btn active px-4 py-2 rounded-md bg-blue-500 text-white" data-tab="tab1" data-key="requirementsTab">المتطلبات</button>
                            <button class="tab-btn px-4 py-2 rounded-md bg-gray-200" data-tab="tab2" data-key="installationTab">التثبيت</button>
                            <button class="tab-btn px-4 py-2 rounded-md bg-gray-200" data-tab="tab3" data-key="settingsTab">الإعدادات</button>
                        </div>
                        
                        <div id="tab1" class="tab-content active">
                            <ul class="list-disc list-inside space-y-2 text-gray-700" data-key="requirementsList">
                                <li>PHP 5.5 أو أحدث (يعمل على PHP 7, 8, 8.1)</li>
                                <li>لا يحتاج إلى قاعدة بيانات</li>
                                <li>أي ويب سيرفر يدعم PHP (Apache, Nginx, LiteSpeed)</li>
                                <li>مساحة أقل من 100 كيلوبايت</li>
                                <li>صلاحيات قراءة/كتابة على المجلدات المراد إدارتها</li>
                            </ul>
                        </div>
                        
                        <div id="tab2" class="tab-content">
                            <ol class="list-decimal list-inside space-y-3 text-gray-700" data-key="installationSteps">
                                <li>قم بتحميل ملف index.php من الموقع الرسمي أو GitHub</li>
                                <li>ارفع الملف إلى المجلد المطلوب على السيرفر (مثل public_html أو مجلد فرعي)</li>
                                <li>افتح الرابط من المتصفح (مثال: yourdomain.com/filemanager/)</li>
                                <li>قم بتسجيل الدخول باستخدام كلمة المرور الافتراضية (admin/admin@123) أو التي قمت بتعيينها</li>
                                <li>ابدأ باستخدام مدير الملفات مباشرة!</li>
                            </ol>
                        </div>
                        
                        <div id="tab3" class="tab-content">
                            <p class="mb-4 text-gray-700" data-key="settingsDescription">يمكنك تخصيص الإعدادات من خلال تعديل ملف config.php أو في بداية ملف index.php:</p>
                            <div class="bg-gray-800 text-gray-200 p-4 rounded-md code-block overflow-auto">
                                <pre>
// تعيين كلمة المرور
$auth_users = [
    'admin' => 'admin123', // اسم المستخدم => كلمة المرور
];

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?');
    exit;
}

if (!isset($_SESSION['auth_ok']) || $_SESSION['auth_ok'] !== true) {
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (isset($auth_users[$user]) && $auth_users[$user] === $pass) {
            $_SESSION['auth_ok'] = true;
            $_SESSION['auth_user'] = $user;
            header("Location: ?");
            exit;
        } else {
            $error = "اسم المستخدم أو كلمة المرور غير صحيحة!";
        }
    }
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-5/12">
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-3 flex items-center" data-key="simpleAndEasyTitle">
                                <i class="fas fa-check-circle text-green-500 ml-2"></i>
                                بسيط وسهل الاستخدام
                            </h3>
                            <p class="text-gray-600" data-key="simpleAndEasyDescription">واجهة بديهية تمكنك من إدارة ملفاتك بسرعة وسهولة، بدون تعقيدات أو منحنى تعلم.</p>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-3 flex items-center" data-key="openSourceTitle">
                                <i class="fas fa-check-circle text-green-500 ml-2"></i>
                                مفتوح المصدر
                            </h3>
                            <p class="text-gray-600" data-key="openSourceDescription">ترخيص MIT يسمح لك بالتعديل والتوزيع بحرية، مع إمكانية تخصيص الكود حسب احتياجاتك.</p>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-3 flex items-center" data-key="browserCompatibleTitle">
                                <i class="fas fa-check-circle text-green-500 ml-2"></i>
                                متوافق مع جميع المتصفحات
                            </h3>
                            <p class="text-gray-600" data-key="browserCompatibleDescription">يعمل على Chrome, Firefox, Edge, Safari وغيرها من المتصفحات الحديثة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="coreFunctionsTitle">الوظائف الأساسية</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="browseFilesTitle">
                        <i class="fas fa-folder-open text-blue-500 ml-3 text-2xl"></i>
                        تصفح الملفات والمجلدات
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="browseFilesList">
                        <li>عرض محتويات المجلد الحالي بشكل قائمة أو شبكية</li>
                        <li>إظهار نوع الملف، الحجم، تاريخ التعديل</li>
                        <li>التنقل بين المجلدات بسهولة بالضغط عليها</li>
                        <li>فرز الملفات حسب الاسم، الحجم، التاريخ</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="manageFilesTitle">
                        <i class="fas fa-file-alt text-blue-500 ml-3 text-2xl"></i>
                        إدارة الملفات
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="manageFilesList">
                        <li>إنشاء ملف جديد (نص عادي)</li>
                        <li>إنشاء مجلد جديد</li>
                        <li>حذف ملفات أو مجلدات</li>
                        <li>إعادة تسمية الملفات والمجلدات</li>
                        <li>نسخ ونقل الملفات بين المجلدات</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="uploadDownloadTitle">
                        <i class="fas fa-upload text-blue-500 ml-3 text-2xl"></i>
                        رفع وتحميل الملفات
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="uploadDownloadList">
                        <li>رفع ملفات من جهازك إلى السيرفر</li>
                        <li>تنزيل أي ملف من السيرفر إلى جهازك</li>
                        <li>دعم رفع ملفات متعددة في النسخ المتقدمة</li>
                        <li>إمكانية السحب والإفلات في بعض الإصدارات</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="textEditTitle">
                        <i class="fas fa-edit text-blue-500 ml-3 text-2xl"></i>
                        تحرير الملفات نصياً
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="textEditList">
                        <li>محرر نصوص مدمج داخل الصفحة</li>
                        <li>يدعم تنسيق النصوص مثل ملفات PHP, HTML, CSS, JS, TXT</li>
                        <li>حفظ التعديلات مباشرة على السيرفر</li>
                        <li>تمييز الأكواد البرمجية (syntax highlighting) في بعض الإصدارات</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="compressDecompressTitle">
                        <i class="fas fa-file-archive text-blue-500 ml-3 text-2xl"></i>
                        ضغط وفك ضغط
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="compressDecompressList">
                        <li>يدعم فك ضغط ملفات .zip</li>
                        <li>استخراج الملفات المضغوطة مباشرة إلى المجلد المطلوب</li>
                        <li>بعض النسخ المتقدمة تدعم ضغط الملفات والمجلدات</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 border-r-4 border-blue-500 scroll-animation">
                    <h3 class="text-xl font-bold mb-3 flex items-center" data-key="searchFilesTitle">
                        <i class="fas fa-search text-blue-500 ml-3 text-2xl"></i>
                        البحث داخل الملفات
                    </h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 mr-6" data-key="searchFilesList">
                        <li>البحث عن ملفات ومجلدات بالاسم</li>
                        <li>البحث عن نص معين داخل الملفات (في بعض الإصدارات)</li>
                        <li>تصفية النتائج حسب نوع الملف</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="securityFeaturesTitle">ميزات الأمان</h2>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <p class="text-gray-700 mb-6" data-key="securityIntro">يوفر ToN Manager عدة طبقات من الحماية لضمان أمان ملفاتك:</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-lock text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="passwordProtectionTitle">الحماية بكلمة مرور</h3>
                                <p class="text-gray-600" data-key="passwordProtectionDescription">ضرورية جداً، لأنه بدونها أي شخص يمكنه الوصول لملفاتك. يمكنك إعداد عدة حسابات بصلاحيات مختلفة.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-folder-open text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="accessFolderTitle">تحديد مجلد الوصول</h3>
                                <p class="text-gray-600" data-key="accessFolderDescription">حدد المجلد الذي يمكن الوصول إليه فقط حتى لا يتجول المستخدم في ملفات النظام الحساسة.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-file-code text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="renameFileTitle">تغيير اسم الملف</h3>
                                <p class="text-gray-600" data-key="renameFileDescription">تغيير اسم الملف index.php إلى اسم آخر يقلل من فرصة اكتشاف الملف من قبل المخترقين.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-shield-alt text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="httpsTitle">تفعيل HTTPS</h3>
                                <p class="text-gray-600" data-key="httpsDescription">لزيادة أمان الاتصال ومنع اعتراض البيانات المرسلة بين المتصفح والسيرفر.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-user-lock text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="folderPermissionsTitle">صلاحيات المجلدات</h3>
                                <p class="text-gray-600" data-key="folderPermissionsDescription">تجنب إعطاء صلاحيات واسعة على المجلدات مثل 777، واستخدم أقل الصلاحيات الممكنة.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-4">
                                <i class="fas fa-ban text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-2" data-key="restrictFunctionsTitle">تقييد الوظائف</h3>
                                <p class="text-gray-600" data-key="restrictFunctionsDescription">يمكنك تعطيل بعض الوظائف مثل الحذف أو التعديل لبعض المستخدمين لزيادة الأمان.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-yellow-50 p-6 border-t border-yellow-200">
                    <div class="flex items-start">
                        <div class="text-yellow-500 text-2xl mr-4">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2" data-key="securityAlertTitle">تنبيه أمني هام</h3>
                            <p class="text-gray-700" data-key="securityAlertDescription">تأكد دائماً من تغيير كلمة المرور الافتراضية وتقييد الوصول إلى المجلدات الحساسة. لا تترك مدير الملفات بدون حماية كلمة مرور أبداً!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="codeExampleTitle">مثال على تفعيل كلمة المرور</h2>
            
            <div class="bg-gray-800 text-gray-200 p-6 rounded-lg shadow-lg code-block overflow-auto mx-auto max-w-4xl">
                <pre>
&lt;?php
session_start();

$auth_users = [
    'admin' => 'admin123', // اسم المستخدم => كلمة المرور
];

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?');
    exit;
}

if (!isset($_SESSION['auth_ok']) || $_SESSION['auth_ok'] !== true) {
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (isset($auth_users[$user]) && $auth_users[$user] === $pass) {
            $_SESSION['auth_ok'] = true;
            $_SESSION['auth_user'] = $user;
            header("Location: ?");
            exit;
        } else {
            $error = "اسم المستخدم أو كلمة المرور غير صحيحة!";
        }
    }
    ?&gt;
                </pre>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4" data-key="codeExampleDescription">يمكنك نسخ هذا الكود وتعديله حسب احتياجاتك لحماية مدير الملفات الخاص بك.</p>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300" data-key="copyCodeButton">
                    <i class="fas fa-copy ml-2"></i>نسخ الكود
                </button>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="comparisonTitle">مقارنة مع مديري ملفات أخرى</h2>
            
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="comparison-table w-full">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3" data-key="comparisonHeader1">الخاصية</th>
                            <th data-key="comparisonHeader2">ToN Manager</th>
                            <th data-key="comparisonHeader3">FileRun</th>
                            <th data-key="comparisonHeader4">Pydio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-bold" data-key="featureScriptSize">حجم السكريبت</td>
                            <td class="text-green-600 font-bold" data-key="scriptSizeTon">أقل من 100 كيلوبايت</td>
                            <td data-key="scriptSizeFileRun">عدة ميجابايت</td>
                            <td data-key="scriptSizePydio">عشرات الميجابايت</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureDatabase">يتطلب قاعدة بيانات</td>
                            <td class="text-green-600 font-bold" data-key="databaseTon">لا</td>
                            <td data-key="databaseFileRun">نعم (MySQL)</td>
                            <td data-key="databasePydio">نعم (MySQL, LDAP...)</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureInstallationEase">سهولة التثبيت</td>
                            <td class="text-green-600 font-bold" data-key="installationTon">سهلة جداً</td>
                            <td data-key="installationFileRun">متوسط</td>
                            <td data-key="installationPydio">معقدة نسبياً</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureSupportFeatures">الدعم والميزات</td>
                            <td data-key="supportTon">أساسي جداً</td>
                            <td data-key="supportFileRun">متقدم</td>
                            <td class="text-green-600 font-bold" data-key="supportPydio">متقدم جداً</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureCustomization">التخصيص</td>
                            <td data-key="customizationTon">محدود</td>
                            <td data-key="customizationFileRun">واسع</td>
                            <td class="text-green-600 font-bold" data-key="customizationPydio">واسع جداً</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureResources">الموارد المطلوبة</td>
                            <td class="text-green-600 font-bold" data-key="resourcesTon">منخفضة جداً</td>
                            <td data-key="resourcesFileRun">متوسطة</td>
                            <td data-key="resourcesPydio">عالية</td>
                        </tr>
                        <tr>
                            <td class="font-bold" data-key="featureSuitableFor">مناسب لـ</td>
                            <td data-key="suitableTon">الاستضافات المشتركة والمواقع الصغيرة</td>
                            <td data-key="suitableFileRun">الشركات الصغيرة والمتوسطة</td>
                            <td data-key="suitablePydio">الشركات الكبيرة والمؤسسات</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600" data-key="comparisonConclusion">ToN Manager هو الخيار الأمثل إذا كنت تبحث عن حل بسيط وخفيف لإدارة الملفات.</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="useCasesTitle">أمثلة استخدام</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-blue-500">
                    <h3 class="text-xl font-bold mb-4" data-key="useCase1Title">إدارة ملفات VPS</h3>
                    <p class="text-gray-600 mb-4" data-key="useCase1Description">استخدم ToN Manager لإدارة ملفات سيرفر VPS صغير بدون الحاجة لتثبيت لوحة تحكم كاملة مثل cPanel أو Plesk.</p>
                    <div class="flex items-center text-blue-500">
                        <i class="fas fa-server ml-2"></i>
                        <span data-key="useCase1Subtitle">مناسب للسيرفرات الصغيرة والمتوسطة</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-blue-500">
                    <h3 class="text-xl font-bold mb-4" data-key="useCase2Title">مشاركة الملفات في فريق العمل</h3>
                    <p class="text-gray-600 mb-4" data-key="useCase2Description">استخدمه كنظام بسيط لمشاركة الملفات بين أعضاء فريق صغير، مع إمكانية تحديد صلاحيات مختلفة لكل مستخدم.</p>
                    <div class="flex items-center text-blue-500">
                        <i class="fas fa-users ml-2"></i>
                        <span data-key="useCase2Subtitle">للفرق الصغيرة التي تحتاج مشاركة ملفات بسيطة</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="download" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6" data-key="downloadSectionTitle">جاهز لتبدأ؟</h2>
            <p class="text-xl mb-10" data-key="downloadSectionSubtitle">احصل على ToN Manager الآن وابدأ بإدارة ملفاتك بسهولة.</p>
            <div class="flex flex-wrap justify-center gap-4"> 
                <a href="download.php" class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-4 px-8 rounded-lg text-lg transition duration-300 shadow-lg" data-key="downloadNowButton">
                  <i class="fas fa-download ml-2"></i>تحميل ToN Manager مجاناً
                </a>
                <a href="https://github.com/ToN-Service/ToN-Manager/" target="_blank" class="bg-gray-800 text-white hover:bg-gray-700 font-bold py-4 px-8 rounded-lg text-lg transition duration-300 shadow-lg" data-key="githubButton">
                    <i class="fab fa-github ml-2"></i>زيارة GitHub
                </a>
            </div>
            <p class="text-sm mt-4 text-blue-100" data-key="downloadNote">الإصدار 1.0.1 - تحديث: 2/6/2025</p>
        </div>
    </section>

    <section id="faq" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-key="faqTitle">الأسئلة الشائعة</h2>
            
            <div class="max-w-3xl mx-auto space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-right p-4 bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleAccordion('faq1')">
                        <span class="font-bold text-lg" data-key="faq1Question">هل ToN Manager مجاني؟</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" id="icon-faq1"></i>
                    </button>
                    <div id="faq1" class="p-4 text-gray-700 hidden" data-key="faq1Answer">
                        نعم، ToN Manager مجاني تماماً ومفتوح المصدر تحت ترخيص MIT. يمكنك استخدامه، تعديله، وتوزيعه بحرية.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-right p-4 bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleAccordion('faq2')">
                        <span class="font-bold text-lg" data-key="faq2Question">ما هي المتطلبات لتشغيله؟</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" id="icon-faq2"></i>
                    </button>
                    <div id="faq2" class="p-4 text-gray-700 hidden" data-key="faq2Answer">
                        يحتاج إلى PHP 5.5 أو أحدث، ولا يتطلب أي قاعدة بيانات. يعمل على أي ويب سيرفر يدعم PHP.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-right p-4 bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleAccordion('faq3')">
                        <span class="font-bold text-lg" data-key="faq3Question">هل هو آمن للاستخدام على السيرفر؟</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" id="icon-faq3"></i>
                    </button>
                    <div id="faq3" class="p-4 text-gray-700 hidden" data-key="faq3Answer">
                        نعم، مع بعض الاحتياطات. تأكد من تعيين كلمة مرور قوية، تحديد مجلد الوصول، وتغيير اسم الملف الافتراضي (index.php).
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full text-right p-4 bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleAccordion('faq4')">
                        <span class="font-bold text-lg" data-key="faq4Question">هل يدعم رفع الملفات الكبيرة؟</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" id="icon-faq4"></i>
                    </button>
                    <div id="faq4" class="p-4 text-gray-700 hidden" data-key="faq4Answer">
                        يعتمد ذلك على إعدادات PHP في السيرفر (خاصة upload_max_filesize و post_max_size). يمكنك زيادة هذه القيم إذا لزم الأمر.
                    </div>
                </div>
            </div>
        </div>
    </section>

<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="mb-8 md:mb-0">
                <h3 class="text-2xl font-bold mb-4" data-key="footerTitle">ToN Manager</h3>
                <p class="text-gray-400 max-w-md" data-key="footerDescription">مدير ملفات بسيط، سريع وفعال بحجم أقل من 100 كيلوبايت. مفتوح المصدر ومجاني للاستخدام.</p>
            </div>
            
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h4 class="text-lg font-bold mb-4" data-key="quickLinksTitle">روابط سريعة</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition duration-300" data-key="quickLinkFeatures">المميزات</a></li>
                        <li><a href="#download" class="text-gray-400 hover:text-white transition duration-300" data-key="quickLinkDownload">التحميل</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300" data-key="quickLinkDocumentation">التوثيق</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white transition duration-300" data-key="quickLinkFAQ">الأسئلة الشائعة</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4" data-key="supportTitle">الدعم</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="https://github.com/ToN-Service/ToN-Manager/issues" class="text-gray-400 hover:text-white transition duration-300" target="_blank" data-key="supportGithubIssues">
                                GitHub Issues
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/ToN-Service/ToN-Manager/blob/main/CONTRIBUTING.md" class="text-gray-400 hover:text-white transition duration-300" target="_blank" data-key="supportContribute">
                                المساهمة في المشروع
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/ToN-Service/ToN-Manager/issues/new" class="text-gray-400 hover:text-white transition duration-300" target="_blank" data-key="supportReportIssue">
                                الإبلاغ عن مشكلة
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 mb-4 md:mb-0" data-key="copyrightText">© 2025 ToN Manager. جميع الحقوق محفوظة.</p>
            <div class="flex space-x-4 rtl:space-x-reverse">
                <a href="https://github.com/ToN-Service" class="text-gray-400 hover:text-white transition duration-300" aria-label="GitHub Profile"><i class="fab fa-github text-xl"></i></a>
                <a href="www.linkedin.com/in/tonservice" class="text-gray-400 hover:text-white transition duration-300" aria-label="LinkedIn Profile"><i class="fab fa-linkedin text-xl"></i></a>
            </div>
        </div>
    </div>
</footer>

    <script>
        // Tab functionality
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.dataset.tab;

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200');
                });

                document.getElementById(tabId).classList.add('active');
                button.classList.remove('bg-gray-200');
                button.classList.add('bg-blue-500', 'text-white');
            });
        });

        // Accordion functionality
        function toggleAccordion(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById(`icon-${id}`);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        // Scroll animation
        const scrollAnimations = document.querySelectorAll('.scroll-animation');

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        scrollAnimations.forEach(el => {
            observer.observe(el);
        });

        // Language translation
        const translations = {
            'ar': {
                pageTitle: 'ToN Manager - مدير ملفات بسيط وفعال',
                heroTitle: 'ToN Manager',
                heroSubtitle: 'مدير ملفات بسيط، سريع وفعال بحجم أقل من 100 كيلوبايت',
                heroDescription: 'إدارة ملفات السيرفر بسهولة من خلال متصفحك، بدون الحاجة لبرامج FTP أو لوحات تحكم معقدة.',
                downloadButton: '<i class="fas fa-download ml-2"></i>تحميل مجاني',
                featuresButton: '<i class="fas fa-info-circle ml-2"></i>تعرف على المميزات',
                featuresSectionTitle: 'مميزات ToN Manager',
                feature1Title: 'خفيف الوزن',
                feature1Description: 'أقل من 100 كيلوبايت، ملف واحد فقط، بدون قاعدة بيانات، يعمل على أي استضافة تدعم PHP 5.5+.',
                feature2Title: 'سهل التثبيت',
                feature2Description: 'فقط ارفع ملف index.php إلى السيرفر وافتح الرابط من المتصفح، بدون إعدادات معقدة.',
                feature3Title: 'آمن',
                feature3Description: 'حماية بكلمة مرور، تحديد مجلد الوصول، منع الوصول للملفات الحساسة في السيرفر.',
                feature4Title: 'محرر نصوص مدمج',
                feature4Description: 'تحرير ملفات النصوص مباشرة من المتصفح، يدعم PHP, HTML, CSS, JS وغيرها.',
                feature5Title: 'فك ضغط الملفات',
                feature5Description: 'فك ضغط ملفات ZIP مباشرة على السيرفر بدون الحاجة لبرامج إضافية.',
                feature6Title: 'متعدد اللغات',
                feature6Description: 'يدعم العديد من اللغات بما فيها العربية والإنجليزية والفرنسية وغيرها.',
                howItWorksTitle: 'كيف يعمل ToN Manager؟',
                requirementsTab: 'المتطلبات',
                installationTab: 'التثبيت',
                settingsTab: 'الإعدادات',
                requirementsList: `
                    <li>PHP 5.5 أو أحدث (يعمل على PHP 7, 8, 8.1)</li>
                    <li>لا يحتاج إلى قاعدة بيانات</li>
                    <li>أي ويب سيرفر يدعم PHP (Apache, Nginx, LiteSpeed)</li>
                    <li>مساحة أقل من 100 كيلوبايت</li>
                    <li>صلاحيات قراءة/كتابة على المجلدات المراد إدارتها</li>
                `,
                installationSteps: `
                    <li>قم بتحميل ملف index.php من الموقع الرسمي أو GitHub</li>
                    <li>ارفع الملف إلى المجلد المطلوب على السيرفر (مثل public_html أو مجلد فرعي)</li>
                    <li>افتح الرابط من المتصفح (مثال: yourdomain.com/filemanager/)</li>
                    <li>قم بتسجيل الدخول باستخدام كلمة المرور الافتراضية (admin/admin@123) أو التي قمت بتعيينها</li>
                    <li>ابدأ باستخدام مدير الملفات مباشرة!</li>
                `,
                settingsDescription: 'يمكنك تخصيص الإعدادات من خلال تعديل ملف config.php أو في بداية ملف index.php:',
                simpleAndEasyTitle: '<i class="fas fa-check-circle text-green-500 ml-2"></i> بسيط وسهل الاستخدام',
                simpleAndEasyDescription: 'واجهة بديهية تمكنك من إدارة ملفاتك بسرعة وسهولة، بدون تعقيدات أو منحنى تعلم.',
                openSourceTitle: '<i class="fas fa-check-circle text-green-500 ml-2"></i> مفتوح المصدر',
                openSourceDescription: 'ترخيص MIT يسمح لك بالتعديل والتوزيع بحرية، مع إمكانية تخصيص الكود حسب احتياجاتك.',
                browserCompatibleTitle: '<i class="fas fa-check-circle text-green-500 ml-2"></i> متوافق مع جميع المتصفحات',
                browserCompatibleDescription: 'يعمل على Chrome, Firefox, Edge, Safari وغيرها من المتصفحات الحديثة.',
                coreFunctionsTitle: 'الوظائف الأساسية',
                browseFilesTitle: '<i class="fas fa-folder-open text-blue-500 ml-3 text-2xl"></i> تصفح الملفات والمجلدات',
                browseFilesList: `
                    <li>عرض محتويات المجلد الحالي بشكل قائمة أو شبكية</li>
                    <li>إظهار نوع الملف، الحجم، تاريخ التعديل</li>
                    <li>التنقل بين المجلدات بسهولة بالضغط عليها</li>
                    <li>فرز الملفات حسب الاسم، الحجم، التاريخ</li>
                `,
                manageFilesTitle: '<i class="fas fa-file-alt text-blue-500 ml-3 text-2xl"></i> إدارة الملفات',
                manageFilesList: `
                    <li>إنشاء ملف جديد (نص عادي)</li>
                    <li>إنشاء مجلد جديد</li>
                    <li>حذف ملفات أو مجلدات</li>
                    <li>إعادة تسمية الملفات والمجلدات</li>
                    <li>نسخ ونقل الملفات بين المجلدات</li>
                `,
                uploadDownloadTitle: '<i class="fas fa-upload text-blue-500 ml-3 text-2xl"></i> رفع وتحميل الملفات',
                uploadDownloadList: `
                    <li>رفع ملفات من جهازك إلى السيرفر</li>
                    <li>تنزيل أي ملف من السيرفر إلى جهازك</li>
                    <li>دعم رفع ملفات متعددة في النسخ المتقدمة</li>
                    <li>إمكانية السحب والإفلات في بعض الإصدارات</li>
                `,
                textEditTitle: '<i class="fas fa-edit text-blue-500 ml-3 text-2xl"></i> تحرير الملفات نصياً',
                textEditList: `
                    <li>محرر نصوص مدمج داخل الصفحة</li>
                    <li>يدعم تنسيق النصوص مثل ملفات PHP, HTML, CSS, JS, TXT</li>
                    <li>حفظ التعديلات مباشرة على السيرفر</li>
                    <li>تمييز الأكواد البرمجية (syntax highlighting) في بعض الإصدارات</li>
                `,
                compressDecompressTitle: '<i class="fas fa-file-archive text-blue-500 ml-3 text-2xl"></i> ضغط وفك ضغط',
                compressDecompressList: `
                    <li>يدعم فك ضغط ملفات .zip</li>
                    <li>استخراج الملفات المضغوطة مباشرة إلى المجلد المطلوب</li>
                    <li>بعض النسخ المتقدمة تدعم ضغط الملفات والمجلدات</li>
                `,
                searchFilesTitle: '<i class="fas fa-search text-blue-500 ml-3 text-2xl"></i> البحث داخل الملفات',
                searchFilesList: `
                    <li>البحث عن ملفات ومجلدات بالاسم</li>
                    <li>البحث عن نص معين داخل الملفات (في بعض الإصدارات)</li>
                    <li>تصفية النتائج حسب نوع الملف</li>
                `,
                securityFeaturesTitle: 'ميزات الأمان',
                securityIntro: 'يوفر ToN Manager عدة طبقات من الحماية لضمان أمان ملفاتك:',
                passwordProtectionTitle: 'الحماية بكلمة مرور',
                passwordProtectionDescription: 'ضرورية جداً، لأنه بدونها أي شخص يمكنه الوصول لملفاتك. يمكنك إعداد عدة حسابات بصلاحيات مختلفة.',
                accessFolderTitle: 'تحديد مجلد الوصول',
                accessFolderDescription: 'حدد المجلد الذي يمكن الوصول إليه فقط حتى لا يتجول المستخدم في ملفات النظام الحساسة.',
                renameFileTitle: 'تغيير اسم الملف',
                renameFileDescription: 'تغيير اسم الملف index.php إلى اسم آخر يقلل من فرصة اكتشاف الملف من قبل المخترقين.',
                httpsTitle: 'تفعيل HTTPS',
                httpsDescription: 'لزيادة أمان الاتصال ومنع اعتراض البيانات المرسلة بين المتصفح والسيرفر.',
                folderPermissionsTitle: 'صلاحيات المجلدات',
                folderPermissionsDescription: 'تجنب إعطاء صلاحيات واسعة على المجلدات مثل 777، واستخدم أقل الصلاحيات الممكنة.',
                restrictFunctionsTitle: 'تقييد الوظائف',
                restrictFunctionsDescription: 'يمكنك تعطيل بعض الوظائف مثل الحذف أو التعديل لبعض المستخدمين لزيادة الأمان.',
                securityAlertTitle: 'تنبيه أمني هام',
                securityAlertDescription: 'تأكد دائماً من تغيير كلمة المرور الافتراضية وتقييد الوصول إلى المجلدات الحساسة. لا تترك مدير الملفات بدون حماية كلمة مرور أبداً!',
                codeExampleTitle: 'مثال على تفعيل كلمة المرور',
                codeExampleDescription: 'يمكنك نسخ هذا الكود وتعديله حسب احتياجاتك لحماية مدير الملفات الخاص بك.',
                copyCodeButton: '<i class="fas fa-copy ml-2"></i>نسخ الكود',
                comparisonTitle: 'مقارنة مع مديري ملفات أخرى',
                comparisonHeader1: 'الخاصية',
                comparisonHeader2: 'ToN Manager',
                comparisonHeader3: 'FileRun',
                comparisonHeader4: 'Pydio',
                featureScriptSize: 'حجم السكريبت',
                scriptSizeTon: 'أقل من 100 كيلوبايت',
                scriptSizeFileRun: 'عدة ميجابايت',
                scriptSizePydio: 'عشرات الميجابايت',
                featureDatabase: 'يتطلب قاعدة بيانات',
                databaseTon: 'لا',
                databaseFileRun: 'نعم (MySQL)',
                databasePydio: 'نعم (MySQL, LDAP...)',
                featureInstallationEase: 'سهولة التثبيت',
                installationTon: 'سهلة جداً',
                installationFileRun: 'متوسط',
                installationPydio: 'معقدة نسبياً',
                featureSupportFeatures: 'الدعم والميزات',
                supportTon: 'أساسي جداً',
                supportFileRun: 'متقدم',
                supportPydio: 'متقدم جداً',
                featureCustomization: 'التخصيص',
                customizationTon: 'محدود',
                customizationFileRun: 'واسع',
                customizationPydio: 'واسع جداً',
                featureResources: 'الموارد المطلوبة',
                resourcesTon: 'منخفضة جداً',
                resourcesFileRun: 'متوسطة',
                resourcesPydio: 'عالية',
                featureSuitableFor: 'مناسب لـ',
                suitableTon: 'الاستضافات المشتركة والمواقع الصغيرة',
                suitableFileRun: 'الشركات الصغيرة والمتوسطة',
                suitablePydio: 'الشركات الكبيرة والمؤسسات',
                comparisonConclusion: 'ToN Manager هو الخيار الأمثل إذا كنت تبحث عن حل بسيط وخفيف لإدارة الملفات.',
                useCasesTitle: 'أمثلة استخدام',
                useCase1Title: 'إدارة ملفات VPS',
                useCase1Description: 'استخدم ToN Manager لإدارة ملفات سيرفر VPS صغير بدون الحاجة لتثبيت لوحة تحكم كاملة مثل cPanel أو Plesk.',
                useCase1Subtitle: 'مناسب للسيرفرات الصغيرة والمتوسطة',
                useCase2Title: 'مشاركة الملفات في فريق العمل',
                useCase2Description: 'استخدمه كنظام بسيط لمشاركة الملفات بين أعضاء فريق صغير، مع إمكانية تحديد صلاحيات مختلفة لكل مستخدم.',
                useCase2Subtitle: 'للفرق الصغيرة التي تحتاج مشاركة ملفات بسيطة',
                downloadSectionTitle: 'جاهز لتبدأ؟',
                downloadSectionSubtitle: 'احصل على ToN Manager الآن وابدأ بإدارة ملفاتك بسهولة.',
                downloadNowButton: '<i class="fas fa-download ml-2"></i>تحميل ToN Manager مجاناً',
                downloadNote: 'الإصدار 1.0.1 - تحديث: 2/6/2025',
                githubButton: '<i class="fab fa-github ml-2"></i>زيارة GitHub', 
                faqTitle: 'الأسئلة الشائعة',
                faq1Question: 'هل ToN Manager مجاني؟',
                faq1Answer: 'نعم، ToN Manager مجاني تماماً ومفتوح المصدر تحت ترخيص MIT. يمكنك استخدامه، تعديله، وتوزيعه بحرية.',
                faq2Question: 'ما هي المتطلبات لتشغيله؟',
                faq2Answer: 'يحتاج إلى PHP 5.5 أو أحدث، ولا يتطلب أي قاعدة بيانات. يعمل على أي ويب سيرفر يدعم PHP.',
                faq3Question: 'هل هو آمن للاستخدام على السيرفر؟',
                faq3Answer: 'نعم، مع بعض الاحتياطات. تأكد من تعيين كلمة مرور قوية، تحديد مجلد الوصول، وتغيير اسم الملف الافتراضي (index.php).',
                faq4Question: 'هل يدعم رفع الملفات الكبيرة؟',
                faq4Answer: 'يعتمد ذلك على إعدادات PHP في السيرفر (خاصة upload_max_filesize و post_max_size). يمكنك زيادة هذه القيم إذا لزم الأمر.',
                footerTitle: "ToN Manager",
                footerDescription: "مدير ملفات بسيط، سريع وفعال بحجم أقل من 100 كيلوبايت. مفتوح المصدر ومجاني للاستخدام.",
                quickLinksTitle: "روابط سريعة",
                quickLinkFeatures: "المميزات",
                quickLinkDownload: "التحميل",
                quickLinkDocumentation: "التوثيق",
                quickLinkFAQ: "الأسئلة الشائعة",
                supportTitle: "الدعم",
                supportGithubIssues: "GitHub Issues",
                supportContribute: "المساهمة في المشروع",
                supportReportIssue: "الإبلاغ عن مشكلة",
                copyrightText: "© 2025 ToN Manager. جميع الحقوق محفوظة.",
            },
            'en': {
                pageTitle: 'ToN Manager - Simple & Efficient File Manager',
                heroTitle: 'ToN Manager',
                heroSubtitle: 'A simple, fast, and efficient file manager under 100 KB.',
                heroDescription: 'Easily manage server files through your browser, without the need for FTP programs or complex control panels.',
                downloadButton: '<i class="fas fa-download mr-2"></i>Free Download',
                featuresButton: '<i class="fas fa-info-circle mr-2"></i>Learn More',
                featuresSectionTitle: 'ToN Manager Features',
                feature1Title: 'Lightweight',
                feature1Description: 'Less than 100 KB, single file, no database required, runs on any hosting supporting PHP 5.5+.',
                feature2Title: 'Easy Installation',
                feature2Description: 'Just upload index.php to the server and open the link in your browser, no complex configurations.',
                feature3Title: 'Secure',
                feature3Description: 'Password protected, access folder restriction, prevents access to sensitive server files.',
                feature4Title: 'Built-in Text Editor',
                feature4Description: 'Edit text files directly from your browser, supports PHP, HTML, CSS, JS, and more.',
                feature5Title: 'File Extraction',
                feature5Description: 'Extract ZIP files directly on the server without the need for additional software.',
                feature6Title: 'Multi-language',
                feature6Description: 'Supports many languages including Arabic, English, French, and others.',
                howItWorksTitle: 'How ToN Manager Works?',
                requirementsTab: 'Requirements',
                installationTab: 'Installation',
                settingsTab: 'Settings',
                requirementsList: `
                    <li>PHP 5.5 or newer (works with PHP 7, 8, 8.1)</li>
                    <li>No database required</li>
                    <li>Any web server supporting PHP (Apache, Nginx, LiteSpeed)</li>
                    <li>Less than 100 KB space</li>
                    <li>Read/write permissions on managed folders</li>
                `,
                installationSteps: `
                    <li>Download the index.php file from the official website or GitHub</li>
                    <li>Upload the file to the desired folder on the server (e.g., public_html or a subfolder)</li>
                    <li>Open the link in your browser (e.g., yourdomain.com/filemanager/)</li>
                    <li>Log in using the default password (admin/admin@123) or your set password</li>
                    <li>Start using the file manager directly!</li>
                `,
                settingsDescription: 'You can customize settings by modifying config.php or at the beginning of index.php:',
                simpleAndEasyTitle: '<i class="fas fa-check-circle text-green-500 mr-2"></i> Simple and Easy to Use',
                simpleAndEasyDescription: 'Intuitive interface allows you to manage your files quickly and easily, without complications or a learning curve.',
                openSourceTitle: '<i class="fas fa-check-circle text-green-500 mr-2"></i> Open Source',
                openSourceDescription: 'MIT license allows you to modify and distribute freely, with the ability to customize the code to your needs.',
                browserCompatibleTitle: '<i class="fas fa-check-circle text-green-500 mr-2"></i> Browser Compatible',
                browserCompatibleDescription: 'Works on Chrome, Firefox, Edge, Safari, and other modern browsers.',
                coreFunctionsTitle: 'Core Functions',
                browseFilesTitle: '<i class="fas fa-folder-open text-blue-500 mr-3 text-2xl"></i> Browse Files and Folders',
                browseFilesList: `
                    <li>View current folder contents as a list or grid</li>
                    <li>Show file type, size, modification date</li>
                    <li>Easily navigate between folders by clicking</li>
                    <li>Sort files by name, size, date</li>
                `,
                manageFilesTitle: '<i class="fas fa-file-alt text-blue-500 mr-3 text-2xl"></i> Manage Files',
                manageFilesList: `
                    <li>Create new files (plain text)</li>
                    <li>Create new folders</li>
                    <li>Delete files or folders</li>
                    <li>Rename files and folders</li>
                    <li>Copy and move files between folders</li>
                `,
                uploadDownloadTitle: '<i class="fas fa-upload text-blue-500 mr-3 text-2xl"></i> Upload and Download Files',
                uploadDownloadList: `
                    <li>Upload files from your device to the server</li>
                    <li>Download any file from the server to your device</li>
                    <li>Supports multiple file uploads in advanced versions</li>
                    <li>Drag and drop functionality in some versions</li>
                `,
                textEditTitle: '<i class="fas fa-edit text-blue-500 mr-3 text-2xl"></i> Text File Editing',
                textEditList: `
                    <li>Built-in text editor within the page</li>
                    <li>Supports text formatting for files like PHP, HTML, CSS, JS, TXT</li>
                    <li>Save changes directly to the server</li>
                    <li>Syntax highlighting in some versions</li>
                `,
                compressDecompressTitle: '<i class="fas fa-file-archive text-blue-500 mr-3 text-2xl"></i> Compress and Decompress',
                compressDecompressList: `
                    <li>Supports .zip file extraction</li>
                    <li>Extract compressed files directly to the desired folder</li>
                    <li>Some advanced versions support compressing files and folders</li>
                `,
                searchFilesTitle: '<i class="fas fa-search text-blue-500 mr-3 text-2xl"></i> Search within Files',
                searchFilesList: `
                    <li>Search for files and folders by name</li>
                    <li>Search for specific text within files (in some versions)</li>
                    <li>Filter results by file type</li>
                `,
                securityFeaturesTitle: 'Security Features',
                securityIntro: 'ToN Manager provides several layers of protection to ensure the security of your files:',
                passwordProtectionTitle: 'Password Protection',
                passwordProtectionDescription: 'Crucial, as without it, anyone can access your files. You can set up multiple accounts with different permissions.',
                accessFolderTitle: 'Access Folder Restriction',
                accessFolderDescription: 'Specify the folder that can only be accessed to prevent users from navigating sensitive system files.',
                renameFileTitle: 'Rename File',
                renameFileDescription: 'Changing the index.php filename to another name reduces the chance of the file being discovered by attackers.',
                httpsTitle: 'Enable HTTPS',
                httpsDescription: 'To increase connection security and prevent interception of data transmitted between the browser and the server.',
                folderPermissionsTitle: 'Folder Permissions',
                folderPermissionsDescription: 'Avoid giving broad permissions to folders like 777, and use the minimum possible permissions.',
                restrictFunctionsTitle: 'Restrict Functions',
                restrictFunctionsDescription: 'You can disable some functions like deletion or editing for certain users to increase security.',
                securityAlertTitle: 'Important Security Alert',
                securityAlertDescription: 'Always make sure to change the default password and restrict access to sensitive folders. Never leave the file manager without password protection!',
                codeExampleTitle: 'Password Enable Example',
                codeExampleDescription: 'You can copy and modify this code to suit your needs to protect your file manager.',
                copyCodeButton: '<i class="fas fa-copy mr-2"></i>Copy Code',
                comparisonTitle: 'Comparison with Other File Managers',
                comparisonHeader1: 'Feature',
                comparisonHeader2: 'ToN Manager',
                comparisonHeader3: 'FileRun',
                comparisonHeader4: 'Pydio',
                featureScriptSize: 'Script Size',
                scriptSizeTon: 'Under 100 KB',
                scriptSizeFileRun: 'Several MBs',
                scriptSizePydio: 'Tens of MBs',
                featureDatabase: 'Requires Database',
                databaseTon: 'No',
                databaseFileRun: 'Yes (MySQL)',
                databasePydio: 'Yes (MySQL, LDAP...)',
                featureInstallationEase: 'Installation Ease',
                installationTon: 'Very Easy',
                installationFileRun: 'Medium',
                installationPydio: 'Relatively Complex',
                featureSupportFeatures: 'Support & Features',
                supportTon: 'Very Basic',
                supportFileRun: 'Advanced',
                supportPydio: 'Very Advanced',
                featureCustomization: 'Customization',
                customizationTon: 'Limited',
                customizationFileRun: 'Extensive',
                customizationPydio: 'Very Extensive',
                featureResources: 'Required Resources',
                resourcesTon: 'Very Low',
                resourcesFileRun: 'Medium',
                resourcesPydio: 'High',
                featureSuitableFor: 'Suitable For',
                suitableTon: 'Shared Hosting & Small Websites',
                suitableFileRun: 'Small to Medium Businesses',
                suitablePydio: 'Large Enterprises & Institutions',
                comparisonConclusion: 'ToN Manager is the ideal choice if you are looking for a simple and lightweight file management solution.',
                useCasesTitle: 'Use Cases',
                useCase1Title: 'VPS File Management',
                useCase1Description: 'Use ToN Manager to manage a small VPS server\'s files without the need to install a full control panel like cPanel or Plesk.',
                useCase1Subtitle: 'Suitable for small and medium servers',
                useCase2Title: 'Team File Sharing',
                useCase2Description: 'Use it as a simple system for file sharing among small team members, with the ability to define different permissions for each user.',
                useCase2Subtitle: 'For small teams needing simple file sharing',
                downloadSectionTitle: 'Ready to Get Started?',
                downloadSectionSubtitle: 'Get ToN Manager now and start managing your files with ease.',
                downloadNowButton: '<i class="fas fa-download mr-2"></i>Download ToN Manager for Free',
                downloadNote: 'Version 1.0.1 - Updated: 2/6/2025',
                githubButton: '<i class="fab fa-github mr-2"></i>Visit GitHub', 
                faqTitle: 'Frequently Asked Questions',
                faq1Question: 'Is ToN Manager free?',
                faq1Answer: 'Yes, ToN Manager is completely free and open-source under the MIT license. You can use, modify, and distribute it freely.',
                faq2Question: 'What are the requirements to run it?',
                faq2Answer: 'It requires PHP 5.5 or newer, and no database is needed. It runs on any web server that supports PHP.',
                faq3Question: 'Is it safe to use on the server?',
                faq3Answer: 'Yes, with some precautions. Make sure to set a strong password, restrict the access folder, and change the default filename (index.php).',
                faq4Question: 'Does it support large file uploads?',
                faq4Answer: 'This depends on your server\'s PHP settings (specifically upload_max_filesize and post_max_size). You can increase these values if necessary.',
                footerTitle: "ToN Manager",
                footerDescription: "A simple, fast, and efficient file manager under 100KB. Open-source and free to use.",
                quickLinksTitle: "Quick Links",
                quickLinkFeatures: "Features",
                quickLinkDownload: "Download",
                quickLinkDocumentation: "Documentation",
                quickLinkFAQ: "FAQ",
                supportTitle: "Support",
                supportGithubIssues: "GitHub Issues",
                supportContribute: "Contribute to the Project",
                supportReportIssue: "Report an Issue",
                copyrightText: "© 2025 ToN Manager. All rights reserved.",
            }
        };

        let currentLanguage = 'ar'; // Default language

        function setLanguage(lang) {
            currentLanguage = lang;
            document.documentElement.lang = lang;
            document.documentElement.dir = (lang === 'ar') ? 'rtl' : 'ltr';
            document.getElementById('language-toggle').textContent = (lang === 'ar') ? 'English' : 'العربية';

            // Apply translations
            for (const key in translations[lang]) {
                const elements = document.querySelectorAll(`[data-key="${key}"]`);
                elements.forEach(element => {
                    element.innerHTML = translations[lang][key];
                });
            }
        }

        // Initialize language based on browser preference or default
        const browserLanguage = navigator.language.split('-')[0];
        if (browserLanguage === 'en') {
            setLanguage('en');
        } else {
            setLanguage('ar'); // Default to Arabic if not English
        }

        // Add event listener to the language toggle button
        document.getElementById('language-toggle').addEventListener('click', () => {
            if (currentLanguage === 'ar') {
                setLanguage('en');
            } else {
                setLanguage('ar');
            }
        });
    </script>
</body>
</html>
