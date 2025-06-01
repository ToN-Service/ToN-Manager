<?php
session_start();

$auth_users = [
    'admin' => 'admin123',
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
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Sign in - MY File Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background-image: url('data:image/svg+xml;utf8,<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="40" height="40" fill="white"/><path d="M0 0H20V20H0V0Z" fill="none" stroke=%22%23b8bcc6%22 stroke-width=%220.5%22/><circle cx="10" cy="10" r="1" fill="%23b8bcc6"/></svg>');
                background-repeat: repeat;
                font-family: 'Segoe UI', 'Tajawal', Arial, sans-serif;
            }
            .logo-ToN-Manager {
                font-family: 'Consolas', monospace;
                font-size: 2.8rem;
                font-weight: bold;
                letter-spacing: 6px;
                color: #189154;
                text-align: center;
                margin-bottom: .5rem;
                margin-top: .5rem;
                line-height: 1;
                user-select: none;
            }
        </style>
    </head>
    <body class="min-h-screen flex flex-col justify-center items-center">
        <div class="flex-1 flex justify-center items-center w-full">
            <form method="post" class="bg-white rounded-xl shadow-xl px-8 pt-7 pb-6 w-full max-w-md flex flex-col items-center">
                <div class="logo-ToN-Manager select-none">ToN Manager</div>
                <div class="text-gray-700 text-xl font-normal mb-5">MY File Manager</div>
                <hr class="w-full mb-6 border-gray-200">
                <?php if ($error): ?>
                    <div class="bg-red-100 text-red-700 p-2 rounded mb-4 w-full text-center text-sm"><?=htmlspecialchars($error)?></div>
                <?php endif; ?>
                <div class="w-full mb-3">
                    <label class="block text-gray-700 mb-1 text-sm" for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Enter your username"
                        class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-200 text-base" required autofocus>
                </div>
                <div class="w-full mb-6">
                    <label class="block text-gray-700 mb-1 text-sm" for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter your password"
                        class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-200 text-base" required>
                </div>
                <button type="submit"
                    class="w-full py-2 bg-green-600 hover:bg-green-700 text-white text-lg rounded transition">Sign in</button>
            </form>
        </div>
        <div class="w-full flex justify-center text-gray-400 text-xs mt-3 mb-2 select-none">
            &copy; ToN Manager 2025 - ALL rigth s reseved
        </div>
    </body>
    </html>
    <?php
    exit;
}


$startDir = __DIR__;
$dir = isset($_GET['dir']) ? $_GET['dir'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$path = realpath($startDir . '/' . $dir);
if (strpos($path, $startDir) !== 0) {
    $path = $startDir;
    $dir = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['uploadfile'])) {
        foreach ($_FILES['uploadfile']['tmp_name'] as $i => $tmp) {
            $name = $_FILES['uploadfile']['name'][$i];
            if ($tmp && is_uploaded_file($tmp)) {
                move_uploaded_file($tmp, $path.'/'.$name);
            }
        }
        header("Location:?dir=" . urlencode($dir));
        exit;
    }
    if (isset($_POST['create_item_type']) && isset($_POST['create_item_name'])) {
        $itemType = $_POST['create_item_type'];
        $itemName = trim(preg_replace('/[^\p{L}\p{N}_\-\.\s]/u','',$_POST['create_item_name']));
        if ($itemType === 'folder' && $itemName) {
            @mkdir($path.'/'.$itemName);
        } elseif ($itemType === 'file' && $itemName) {
            @touch($path.'/'.$itemName);
        }
        header("Location:?dir=" . urlencode($dir));
        exit;
    }
    if (isset($_POST['delete']) && isset($_POST['target'])) {
        $target = basename($_POST['target']);
        $targetPath = $path . '/' . $target;
        if (is_file($targetPath)) @unlink($targetPath);
        if (is_dir($targetPath)) {
            function rrmdir($d) {
                foreach (scandir($d) as $f) {
                    if ($f !== '.' && $f !== '..') {
                        $fp = "$d/$f";
                        if (is_dir($fp)) rrmdir($fp); else @unlink($fp);
                    }
                }
                @rmdir($d);
            }
            rrmdir($targetPath);
        }
        header("Location:?dir=" . urlencode($dir));
        exit;
    }
    if (isset($_POST['delete_selected']) && !empty($_POST['selected_files'])) {
        foreach ($_POST['selected_files'] as $target) {
            $target = basename($target);
            $targetPath = $path . '/' . $target;
            if (is_file($targetPath)) @unlink($targetPath);
            if (is_dir($targetPath)) {
                function rrmdir2($d) {
                    foreach (scandir($d) as $f) {
                        if ($f !== '.' && $f !== '..') {
                            $fp = "$d/$f";
                            if (is_dir($fp)) rrmdir2($fp); else @unlink($fp);
                        }
                    }
                    @rmdir($d);
                }
                rrmdir2($targetPath);
            }
        }
        header("Location:?dir=" . urlencode($dir));
        exit;
    }
    if (isset($_POST['editfile']) && isset($_POST['editfilename'])) {
        $filename = basename($_POST['editfilename']);
        $filepath = $path . '/' . $filename;
        if (is_file($filepath) && is_writable($filepath)) {
            file_put_contents($filepath, $_POST['filecontent']);
        }
        header("Location:?dir=" . urlencode($dir) . "&sel=" . urlencode($filename));
        exit;
    }
    if (isset($_POST['renamefile']) && isset($_POST['oldname']) && isset($_POST['newname'])) {
        $oldname = basename($_POST['oldname']);
        $newname = trim(preg_replace('/[^\p{L}\p{N}_\-\.\s]/u','',$_POST['newname']));
        if ($newname && $newname !== $oldname) {
            $oldpath = $path . '/' . $oldname;
            $newpath = $path . '/' . $newname;
            if (file_exists($oldpath) && !file_exists($newpath)) {
                rename($oldpath, $newpath);
            }
        }
        header("Location:?dir=" . urlencode($dir));
        exit;
    }
}

$entries = array_diff(scandir($path), ['.', '..']);
$files = [];
$folders = [];
foreach ($entries as $entry) {
    if ($search && stripos($entry, $search) === false) continue;
    $fullPath = $path . '/' . $entry;
    $isDir = is_dir($fullPath);
    $item = [
        'name' => $entry,
        'is_dir' => $isDir,
        'size' => $isDir ? '-' : filesize($fullPath),
        'modified' => date("Y-m-d H:i", filemtime($fullPath)),
        'path' => trim(($dir ? $dir . '/' : '') . $entry, '/'),
        'ext' => strtolower(pathinfo($entry, PATHINFO_EXTENSION)),
    ];
    if ($isDir)
        $folders[] = $item;
    else
        $files[] = $item;
}
usort($folders, fn($a, $b) => strnatcasecmp($a['name'],$b['name']));
usort($files, fn($a, $b) => strnatcasecmp($a['name'],$b['name']));

function formatSize($size) {
    if ($size === '-' || $size === null) return '-';
    $units = ['بايت','ك.ب','م.ب','ج.ب'];
    $i = 0;
    while ($size >= 1024 && $i < count($units)-1) { $size /= 1024; $i++; }
    return round($size, ($i>1?1:0)) . ' ' . $units[$i];
}
function fileIcon($item) {
    if ($item['is_dir']) return '<i class="fas fa-folder text-yellow-400"></i>';
    $ext = strtolower($item['ext']);
    $icons = [
        'php'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/php.svg" class="w-5" alt="PHP">',
        'js'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/javascript.svg" class="w-5" alt="JavaScript">',
        'ts'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/typescript.svg" class="w-5" alt="TypeScript">',
        'py'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/python.svg" class="w-5" alt="Python">',
        'rb'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/ruby.svg" class="w-5" alt="Ruby">',
        'java'   => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/java.svg" class="w-5" alt="Java">',
        'c'      => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/c.svg" class="w-5" alt="C">',
        'cpp'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/cplusplus.svg" class="w-5" alt="C++">',
        'cs'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/csharp.svg" class="w-5" alt="C#">',
        'go'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/go.svg" class="w-5" alt="Go">',
        'swift'  => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/swift.svg" class="w-5" alt="Swift">',
        'kt'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/kotlin.svg" class="w-5" alt="Kotlin">',
        'dart'   => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/dart.svg" class="w-5" alt="Dart">',
        'rs'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/rust.svg" class="w-5" alt="Rust">',
        'scala'  => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/scala.svg" class="w-5" alt="Scala">',
        'sh'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/gnubash.svg" class="w-5" alt="Bash">',
        'html'   => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/html5.svg" class="w-5" alt="HTML">',
        'css'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/css3.svg" class="w-5" alt="CSS">',
        'json'   => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/json.svg" class="w-5" alt="JSON">',
        'xml'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/xml.svg" class="w-5" alt="XML">',
        'yml'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/yaml.svg" class="w-5" alt="YAML">',
        'yaml'   => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/yaml.svg" class="w-5" alt="YAML">',
        'sql'    => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/mysql.svg" class="w-5" alt="SQL">',
        'md'     => '<img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/markdown.svg" class="w-5" alt="Markdown">',
        'pdf'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" class="w-5" alt="">',
        'doc'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/microsoftword.svg" class="w-5" alt="">',
        'docx'   => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/microsoftword.svg" class="w-5" alt="">',
        'xls'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/microsoftexcel.svg" class="w-5" alt="">',
        'xlsx'   => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/microsoftexcel.svg" class="w-5" alt="">',
        'png'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'jpg'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'jpeg'   => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'gif'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'bmp'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'svg'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'webp'   => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/image.svg" class="w-5" alt="">',
        'zip'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/zip.svg" class="w-5" alt="">',
        'rar'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/zip.svg" class="w-5" alt="">',
        '7z'     => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/zip.svg" class="w-5" alt="">',
        'gz'     => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/zip.svg" class="w-5" alt="">',
        'tar'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/zip.svg" class="w-5" alt="">',
        'mp4'    => '<i class="fas fa-file-video text-orange-400"></i>',
        'avi'    => '<i class="fas fa-file-video text-orange-400"></i>',
        'mov'    => '<i class="fas fa-file-video text-orange-400"></i>',
        'wmv'    => '<i class="fas fa-file-video text-orange-400"></i>',
        'mkv'    => '<i class="fas fa-file-video text-orange-400"></i>',
        'webm'   => '<i class="fas fa-file-video text-orange-400"></i>',
        'txt'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/txt.svg" class="w-5" alt="">',
        'log'    => '<img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/txt.svg" class="w-5" alt="">',
    ];
    if (isset($icons[$ext])) return $icons[$ext];
    return '<i class="fas fa-file text-gray-400"></i>';
}
function fileBadge($item) {
    if ($item['is_dir']) return '<span class="ml-2 px-2 py-0.5 rounded text-xs folder-badge">مجلد</span>';
    $ext = $item['ext'];
    if ($ext == 'pdf') return '<span class="ml-2 px-2 py-0.5 rounded text-xs pdf-badge">PDF</span>';
    if (in_array($ext, ['doc','docx'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs docx-badge">DOCX</span>';
    if (in_array($ext, ['xls','xlsx'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs xlsx-badge">XLSX</span>';
    if (in_array($ext, ['png','jpg','jpeg','gif','bmp','svg','webp'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs image-badge">'.strtoupper($ext).'</span>';
    if (in_array($ext, ['zip','rar','7z','gz','tar'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs zip-badge">ZIP</span>';
    if (in_array($ext, ['txt','md','log','json','ini','conf'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs txt-badge">TXT</span>';
    if (in_array($ext, ['mp4','avi','mov','wmv','mkv','webm'])) return '<span class="ml-2 px-2 py-0.5 rounded text-xs video-badge">'.strtoupper($ext).'</span>';
    return '';
}
$selected = null;
if (isset($_GET['sel'])) {
    foreach (array_merge($folders, $files) as $f) {
        if ($f['path'] === $_GET['sel']) $selected = $f;
    }
}
if (!$selected && count($files)) $selected = $files[0];
if (!$selected && count($folders)) $selected = $folders[0];

$is_editing = false;
$edit_content = "";
if (isset($_GET['edit']) && $_GET['edit']) {
    $edit_file = basename($_GET['edit']);
    $edit_path = $path . '/' . $edit_file;
    if (is_file($edit_path) && is_writable($edit_path)) {
        $is_editing = true;
        $edit_content = file_get_contents($edit_path);
    }
}
$is_renaming = false;
$rename_oldname = "";
if (isset($_GET['rename']) && $_GET['rename']) {
    $is_renaming = true;
    $rename_oldname = basename($_GET['rename']);
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ToN Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
        body { font-family: 'Tajawal', sans-serif; }
        .sidebar-active { background: #f8fafd; }
        .file-row.selected { background: #e7f3ff !important; }
        .file-row:hover { background: #f3f8ff; }
        .folder-badge { background: #fdf6b2; color: #b7791f;}
        .pdf-badge { background: #fde8e8; color: #e53e3e;}
        .docx-badge { background: #ebf4ff; color: #3182ce;}
        .xlsx-badge { background: #e6fffa; color: #38b2ac;}
        .image-badge { background: #faf5ff; color: #9f7aea;}
        .zip-badge { background: #fefcbf; color: #b7791f;}
        .txt-badge { background: #edf2f7; color: #4a5568;}
        .video-badge { background: #fff5f5; color: #ed8936;}
        .scrollbar-thin::-webkit-scrollbar { width: 8px; background: #f3f4f6;}
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #e0e7ef; border-radius: 4px;}
        .modal-bg { background: rgba(0,0,0,0.15); }
        input[type="file"] {direction: ltr;}
        #delete-selected-btn { display:none; }
        tr.selected-row { background: #e7f3ff !important; }
        #detailsPanelMobile { display: none; }
        #sidebarMobile { display: none; }
        @media (max-width: 1024px) {
            #sidebarDesktop {display: none !important;}
            #detailsPanelDesktop {display: none !important;}
            #detailsPanelMobile {display: block !important;}
            #sidebarMobile {display: block;}
        }
        @media (min-width: 1025px) {
            #sidebarMobile {display: none !important;}
            #detailsPanelMobile {display: none !important;}
        }
        #sidebarMobile.open { transform: translateX(0); }
        #sidebarMobile { transform: translateX(100%); transition: transform 0.2s; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="w-full bg-white border-b px-2 md:px-6 py-2 sticky top-0 z-20">
        <div class="flex items-center justify-between flex-row-reverse">
            <div class="flex items-center gap-2">
                <span class="font-bold text-lg">ToN Manager</span>
                <i class="fas fa-folder-open text-blue-700 text-2xl"></i>
            </div>
            <button class="text-gray-500 text-xl md:hidden" id="openSidebarBtn" type="button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <form method="get" class="w-full flex justify-center items-center mt-2" id="liveSearchForm" autocomplete="off">
            <input type="hidden" name="dir" value="<?=htmlspecialchars($dir)?>">
            <div class="relative w-full max-w-lg">
                <input
                    type="search"
                    id="searchBox"
                    name="search"
                    value="<?=htmlspecialchars($search)?>"
                    class="w-full px-4 py-2 rounded bg-gray-100 border border-gray-200 focus:outline-none pr-8"
                    placeholder="بحث عن ملفات..." autocomplete="off"
                >
                <?php if($search): ?>
                    <a href="?dir=<?=urlencode($dir)?>" class="absolute left-2 top-2 text-gray-400 hover:text-blue-600" title="إلغاء البحث"><i class="fas fa-times"></i></a>
                <?php endif; ?>
            </div>
        </form>
    </header>
    <main class="flex flex-1 overflow-hidden flex-wrap">
        <aside id="detailsPanelDesktop" class="w-80 bg-white border-l px-8 py-6 flex-shrink-0 flex flex-col scrollbar-thin overflow-y-auto hidden lg:flex">
            <?php if ($selected): ?>
                <div class="flex flex-col items-center mb-6">
                    <?=str_replace('w-5','w-16 mb-2',fileIcon($selected))?>
                    <h3 class="font-bold text-lg mb-0.5"><?=htmlspecialchars($selected['name'])?></h3>
                    <span class="text-gray-500 text-xs mb-2"><?=fileBadge($selected)?> - <?=formatSize($selected['size'])?></span>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <form method="get" action="" class="contents">
                        <?php if ($selected['is_dir']): ?>
                        <a href="?dir=<?=urlencode($selected['path'])?>" class="bg-gray-100 hover:bg-blue-50 text-blue-600 rounded py-2 flex flex-col items-center">
                            <i class="fas fa-folder-open mb-1"></i>
                            فتح
                        </a>
                        <?php else: ?>
                        <a href="<?=htmlspecialchars($selected['path'])?>" target="_blank" class="bg-gray-100 hover:bg-blue-50 text-blue-600 rounded py-2 flex flex-col items-center">
                            <i class="fas fa-folder-open mb-1"></i>
                            فتح
                        </a>
                        <?php endif; ?>
                        <?php if (!$selected['is_dir']): ?>
                        <a href="<?=htmlspecialchars($selected['path'])?>" download class="bg-gray-100 hover:bg-blue-50 text-blue-600 rounded py-2 flex flex-col items-center">
                            <i class="fas fa-download mb-1"></i>
                            تنزيل
                        </a>
                        <?php else: ?>
                        <span></span>
                        <?php endif; ?>
                        <form method="post" class="contents" onsubmit="return confirmDelete('هل أنت متأكد من حذف هذا الملف أو المجلد؟');">
                            <input type="hidden" name="target" value="<?=htmlspecialchars($selected['name'])?>">
                            <button type="submit" name="delete" class="bg-gray-100 hover:bg-blue-50 text-red-600 rounded py-2 flex flex-col items-center">
                                <i class="fas fa-trash mb-1"></i>
                                حذف
                            </button>
                        </form>
                        <?php if (!$selected['is_dir'] && in_array($selected['ext'],['txt','md','log','json','ini','conf','html','css','js','php'])): ?>
                        <a href="?dir=<?=urlencode($dir)?>&edit=<?=urlencode($selected['name'])?>" class="bg-gray-100 hover:bg-blue-50 text-gray-600 rounded py-2 flex flex-col items-center">
                            <i class="fas fa-edit mb-1"></i>
                            تعديل
                        </a>
                        <?php else: ?>
                        <button type="button" class="bg-gray-100 hover:bg-blue-50 text-gray-600 rounded py-2 flex flex-col items-center" disabled>
                            <i class="fas fa-edit mb-1"></i>
                            تعديل
                        </button>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="mb-4">
                    <h4 class="font-bold text-sm mb-2">معلومات الملف</h4>
                    <ul class="text-xs text-gray-700 space-y-1">
                        <li><span class="font-bold">النوع:</span> <?=$selected['is_dir'] ? 'مجلد' : strtoupper($selected['ext'])?></li>
                        <li><span class="font-bold">الحجم:</span> <?=formatSize($selected['size'])?></li>
                        <li><span class="font-bold">الموقع:</span> <?=$selected['path']?></li>
                        <li><span class="font-bold">آخر تعديل:</span> <?=$selected['modified']?></li>
                        <li><span class="font-bold">بواسطة:</span> <?=$_SERVER['REMOTE_USER'] ?? 'admin'?></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-sm mb-2">معاينة</h4>
                    <div class="bg-gray-50 rounded p-2 text-xs text-gray-600">
                    <?php
                        if ($selected['is_dir']) {
                            echo '<div class="text-gray-400">لا توجد معاينة متاحة للمجلد</div>';
                        } else {
                            $ext = $selected['ext'];
                            if (in_array($ext,['txt','md','json','ini','conf','log'])) {
                                $preview = @file_get_contents($path . '/' . $selected['name']);
                                echo '<pre>'.htmlspecialchars(mb_substr($preview,0,600)).'</pre>';
                            } elseif (in_array($ext, ['png','jpg','jpeg','svg','gif','bmp','webp'])) {
                                $rel = rawurlencode($selected['path']);
                                echo '<img src="?dir='.urlencode($dir).'&thumb='.urlencode($selected['name']).'" class="rounded border mx-auto">';
                            } else {
                                echo '<div class="text-gray-400">لا توجد معاينة لهذا النوع</div>';
                            }
                        }
                    ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-400 mt-16">لا يوجد ملفات</div>
            <?php endif; ?>
        </aside>
        <aside id="detailsPanelMobile" class="fixed bottom-0 left-0 right-0 bg-white border-t z-40 flex flex-col lg:hidden px-0 py-0" style="display:<?=($selected ? 'flex':'none')?>;">
            <?php if ($selected): ?>
                <div class="flex flex-row w-full">
                    <a href="<?= $selected['is_dir'] ? '?dir='.urlencode($selected['path']) : htmlspecialchars($selected['path']) ?>"
                    <?= $selected['is_dir'] ? '' : 'target="_blank"' ?>
                    class="flex-1 py-2 flex flex-col items-center justify-center border-l last:border-l-0 text-blue-600 text-base font-bold"
                    style="border-color:#e5e7eb;background:#f9fafb;">
                        <i class="fas fa-folder-open mb-1 text-xl"></i>
                        فتح
                    </a>
                    <?php if (!$selected['is_dir']): ?>
                    <a href="<?=htmlspecialchars($selected['path'])?>" download
                    class="flex-1 py-2 flex flex-col items-center justify-center border-l last:border-l-0 text-blue-600 text-base font-bold"
                    style="border-color:#e5e7eb;background:#f9fafb;">
                        <i class="fas fa-download mb-1 text-xl"></i>
                        تنزيل
                    </a>
                    <?php endif; ?>
                    <?php if (!$selected['is_dir'] && in_array($selected['ext'],['txt','md','log','json','ini','conf','html','css','js','php'])): ?>
                    <a href="?dir=<?=urlencode($dir)?>&edit=<?=urlencode($selected['name'])?>"
                    class="flex-1 py-2 flex flex-col items-center justify-center border-l last:border-l-0 text-gray-700 text-base font-bold"
                    style="border-color:#e5e7eb;background:#f9fafb;">
                        <i class="fas fa-edit mb-1 text-xl"></i>
                        تعديل
                    </a>
                    <?php endif; ?>
                    <form method="post" class="flex-1" onsubmit="return confirmDelete('هل أنت متأكد من حذف هذا الملف أو المجلد؟');" style="display:inline;">
                        <input type="hidden" name="target" value="<?=htmlspecialchars($selected['name'])?>">
                        <button type="submit" name="delete"
                                class="w-full py-2 flex flex-col items-center justify-center text-red-600 text-base font-bold"
                                style="background:#f9fafb;">
                            <i class="fas fa-trash mb-1 text-xl"></i>
                            حذف
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </aside>
        <section class="flex-1 flex flex-col bg-white border-x px-0 scrollbar-thin overflow-y-auto w-full">
            <div class="flex flex-wrap items-center justify-between px-2 md:px-6 py-4 border-b bg-white gap-y-2">
                <nav class="text-gray-500 text-sm flex items-center gap-1 flex-wrap">
                    <a href="?">الرئيسية</a>
                    <?php
                        $bpath = '';
                        if ($dir) {
                            $parts = explode('/', $dir);
                            foreach ($parts as $i => $part) {
                                $bpath .= ($bpath ? '/' : '') . $part;
                                echo '<span>&lt;</span>';
                                echo '<a href="?dir='.urlencode($bpath).'" class="hover:underline text-gray-600">'.htmlspecialchars($part).'</a>';
                            }
                        }
                    ?>
                </nav>
                <div class="flex gap-2 items-center flex-wrap">
                    <button id="openUploadModal" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded flex items-center gap-2">
                        <i class="fas fa-upload"></i> رفع ملف
                    </button>
                    <button id="openNewFolderModal" class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm px-4 py-2 rounded flex items-center gap-2">
                        <i class="fas fa-folder-plus"></i> مجلد جديد
                    </button>
                    <form method="post" id="delete-selected-form" class="inline">
                        <button type="submit" name="delete_selected" id="delete-selected-btn" onclick="return confirmDelete('هل أنت متأكد من حذف الملفات/المجلدات المحددة؟')" class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded flex items-center gap-2 ml-2">
                            <i class="fas fa-trash"></i> حذف المحدد
                        </button>
                </div>
            </div>
            <div class="flex-1 overflow-x-auto px-1 md:px-2 py-2 scrollbar-thin">
                <table class="w-full text-sm bg-white" id="files-table">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="px-2 md:px-3 py-2"><input type="checkbox" id="checkAll" onclick="toggleAllChecks(this)"></th>
                            <th class="px-2 md:px-3 py-2 text-right">اسم الملف</th>
                            <th class="px-2 md:px-3 py-2 text-right">الحجم</th>
                            <th class="px-2 md:px-3 py-2 text-right">تعديل</th>
                            <th class="px-2 md:px-3 py-2 text-right">إعادة تسمية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($dir): ?>
                        <tr class="border-b file-row cursor-pointer">
                            <td class="px-2 md:px-3 py-2"></td>
                            <td colspan="4" class="px-2 md:px-3 py-2 flex items-center gap-2">
                                <a href="?dir=<?=urlencode(dirname($dir))?>" class="flex items-center gap-2 text-blue-600 hover:underline">
                                    <i class="fas fa-level-up-alt"></i> العودة للخلف
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php foreach ($folders as $f): ?>
                        <tr class="border-b file-row cursor-pointer <?=($selected && $f['path']==$selected['path']) ? 'selected-row':''?>">
                            <td class="px-2 md:px-3 py-2"><input type="checkbox" name="selected_files[]" value="<?=htmlspecialchars($f['name'])?>" class="row-check"></td>
                            <td class="px-2 md:px-3 py-2 flex items-center gap-2" onclick="location.href='?dir=<?=urlencode($f['path'])?>'">
                                <?=fileIcon($f)?> <?=htmlspecialchars($f['name'])?> <?=fileBadge($f)?>
                            </td>
                            <td class="px-2 md:px-3 py-2"><?=formatSize($f['size'])?></td>
                            <td class="px-2 md:px-3 py-2 text-gray-400"><?=$f['modified']?></td>
                            <td class="px-2 md:px-3 py-2">
                                <a href="?dir=<?=urlencode($dir)?>&rename=<?=urlencode($f['name'])?>" class="text-blue-600 hover:underline"><i class="fas fa-i-cursor"></i> إعادة تسمية</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php foreach ($files as $f): ?>
                        <tr class="border-b file-row cursor-pointer <?=($selected && $f['path']==$selected['path']) ? 'selected-row':''?>">
                            <td class="px-2 md:px-3 py-2"><input type="checkbox" name="selected_files[]" value="<?=htmlspecialchars($f['name'])?>" class="row-check"></td>
                            <td class="px-2 md:px-3 py-2 flex items-center gap-2" onclick="location.href='?dir=<?=urlencode($dir)?>&sel=<?=urlencode($f['path'])?>'">
                                <?=fileIcon($f)?> <?=htmlspecialchars($f['name'])?> <?=fileBadge($f)?>
                            </td>
                            <td class="px-2 md:px-3 py-2"><?=formatSize($f['size'])?></td>
                            <td class="px-2 md:px-3 py-2 text-gray-400"><?=$f['modified']?></td>
                            <td class="px-2 md:px-3 py-2">
                                <a href="?dir=<?=urlencode($dir)?>&rename=<?=urlencode($f['name'])?>" class="text-blue-600 hover:underline"><i class="fas fa-i-cursor"></i> إعادة تسمية</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </form>
        </section>
        <aside class="w-72 bg-white border-r px-6 py-6 flex-shrink-0 flex flex-col sidebar-active scrollbar-thin overflow-y-auto hidden lg:flex" id="sidebarDesktop">
            <nav class="flex-1">
                <ul class="space-y-2 text-sm font-medium">
                    <li>
                        <a href="#" class="flex items-center gap-2 text-blue-700 font-bold"><i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-star"></i> المفضلة</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-history"></i> آخر التعديلات</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-trash"></i> سلة المحذوفات</a>
                    </li>
                </ul>
                <div class="mt-8">
                    <div class="font-bold text-xs mb-2 text-gray-400">المجلدات</div>
                    <ul class="space-y-1 text-sm">
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> المستندات</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الصور</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الفيديوهات</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الملفات المحفوظة</li>
                    </ul>
                </div>
                <div class="mt-8">
                    <div class="font-bold text-xs mb-2 text-gray-400">التخزين</div>
                    <div class="flex justify-between text-xs mb-1">
                        <span>المساحة المستخدمة</span>
                        <span>
                            <?php 
                            $total = disk_total_space($startDir); 
                            $used = $total - disk_free_space($startDir);
                            echo 'GB '.round($used/1024/1024/1024,1).' / '.round($total/1024/1024/1024,1);
                            ?>
                        </span>
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded overflow-hidden mb-2">
                        <div class="h-full bg-blue-500" style="width:<?=intval($used/$total*100)?>%"></div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="?logout=1" class="flex items-center gap-2 bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-md text-sm font-bold w-full justify-center transition">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </a>
                </div>
            </nav>
        </aside>
        <aside id="sidebarMobile" class="sidebar-active fixed top-0 right-0 z-50 bg-white w-72 max-w-full h-full shadow-2xl border-l transition-transform duration-200 translate-x-full">
            <div class="flex justify-between items-center px-4 py-4 border-b">
                <span class="font-bold text-lg flex items-center gap-2"><i class="fas fa-folder-open text-blue-700"></i> ToN Manager</span>
                <button class="text-gray-400 text-2xl" onclick="document.getElementById('sidebarMobile').classList.remove('open')"><i class="fas fa-times"></i></button>
            </div>
            <nav class="flex-1 px-6 py-2">
                <ul class="space-y-2 text-sm font-medium">
                    <li>
                        <a href="#" class="flex items-center gap-2 text-blue-700 font-bold"><i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-star"></i> المفضلة</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-history"></i> آخر التعديلات</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-700 transition"><i class="fas fa-trash"></i> سلة المحذوفات</a>
                    </li>
                </ul>
                <div class="mt-8">
                    <div class="font-bold text-xs mb-2 text-gray-400">المجلدات</div>
                    <ul class="space-y-1 text-sm">
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> المستندات</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الصور</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الفيديوهات</li>
                        <li class="flex items-center gap-2 text-gray-700 font-medium"><i class="fas fa-folder text-yellow-400"></i> الملفات المحفوظة</li>
                    </ul>
                </div>
                <div class="mt-8">
                    <div class="font-bold text-xs mb-2 text-gray-400">التخزين</div>
                    <div class="flex justify-between text-xs mb-1">
                        <span>المساحة المستخدمة</span>
                        <span>
                            <?php 
                            $total = disk_total_space($startDir); 
                            $used = $total - disk_free_space($startDir);
                            echo 'GB '.round($used/1024/1024/1024,1).' / '.round($total/1024/1024/1024,1);
                            ?>
                        </span>
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded overflow-hidden mb-2">
                        <div class="h-full bg-blue-500" style="width:<?=intval($used/$total*100)?>%"></div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="?logout=1" class="flex items-center gap-2 bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-md text-sm font-bold w-full justify-center transition">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </a>
                </div>
            </nav>
        </aside>
    </main>

    <?php
    if (isset($_GET['thumb']) && $dir) {
        $img = $path.'/'.basename($_GET['thumb']);
        if (is_file($img)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime=finfo_file($finfo, $img);
            header("Content-Type: $mime");
            readfile($img);
            exit;
        }
    }
    ?>

    <div id="uploadModal" class="fixed inset-0 z-50 flex items-center justify-center modal-bg hidden">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md relative flex flex-col items-center justify-center">
            <button class="absolute left-4 top-4 text-gray-400 hover:text-red-500 text-lg close-modal" title="إغلاق"><i class="fas fa-times"></i></button>
            <h2 class="text-lg font-bold mb-4 text-center w-full">رفع ملفات</h2>
            <form method="post" enctype="multipart/form-data" id="uploadForm" class="w-full">
                <div id="dropzone" class="border-2 border-dashed border-blue-400 rounded-lg p-6 text-center text-gray-600 mb-4 relative"
                    ondragover="event.preventDefault(); this.classList.add('bg-blue-50')" 
                    ondragleave="this.classList.remove('bg-blue-50')"
                    ondrop="handleDrop(event)">
                    <i class="fas fa-cloud-upload-alt fa-2x text-blue-500 mb-2"></i>
                    <p>اسحب وأفلت الملفات هنا أو انقر للاختيار</p>
                    <input type="file" name="uploadfile[]" id="fileInput" multiple class="opacity-0 absolute inset-0 cursor-pointer"
                        style="width: 100%; height: 100%;" onchange="autoSubmitUpload(this)">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 close-modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
        <div id="newFolderModal" class="fixed inset-0 z-50 flex items-center justify-center modal-bg hidden">
            <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm relative flex flex-col items-center justify-center">
                <button class="absolute left-4 top-4 text-gray-400 hover:text-red-500 text-lg close-modal" title="إغلاق"><i class="fas fa-times"></i></button>
                <h2 class="text-lg font-bold mb-2 text-center w-full">عنصر جديد</h2>
                <form method="post" class="flex flex-col gap-2 w-full">
                    <div class="flex gap-3 justify-center mb-2">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="create_item_type" value="folder" checked>
                            مجلد
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="create_item_type" value="file">
                            ملف
                        </label>
                    </div>
                    <input type="text" name="create_item_name" placeholder="اسم العنصر" class="w-full px-3 py-2 rounded border border-gray-300 text-center">
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 close-modal">إلغاء</button>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">إنشاء</button>
                    </div>
                </form>
            </div>
        </div>
    <?php if ($is_renaming): ?>
    <div id="renameModal" class="fixed inset-0 items-center justify-center z-50 modal-bg flex">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-sm relative">
            <a href="?dir=<?=urlencode($dir)?>" class="absolute left-4 top-4 text-gray-400 hover:text-red-500 text-lg close-modal" title="إغلاق"><i class="fas fa-times"></i></a>
            <h2 class="text-lg font-bold mb-4">إعادة تسمية: <?=htmlspecialchars($rename_oldname)?></h2>
            <form method="post">
                <input type="hidden" name="oldname" value="<?=htmlspecialchars($rename_oldname)?>">
                <input type="text" name="newname" value="<?=htmlspecialchars($rename_oldname)?>" class="w-full px-3 py-2 rounded border border-gray-300 mb-4">
                <div class="flex justify-end gap-2">
                    <a href="?dir=<?=urlencode($dir)?>" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">إلغاء</a>
                    <button type="submit" name="renamefile" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">حفظ الاسم الجديد</button>
                </div>
            </form>
        </div>
    </div>
    <script>document.body.style.overflow = "hidden";</script>
    <?php endif; ?>
    <?php if ($is_editing): ?>
    <div id="editModal" class="fixed inset-0 items-center justify-center z-50 modal-bg flex">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-2xl relative">
            <a href="?dir=<?=urlencode($dir)?>" class="absolute left-4 top-4 text-gray-400 hover:text-red-500 text-lg close-modal" title="إغلاق"><i class="fas fa-times"></i></a>
            <h2 class="text-lg font-bold mb-4">تعديل الملف: <?=htmlspecialchars($edit_file)?></h2>
            <form method="post">
                <input type="hidden" name="editfilename" value="<?=htmlspecialchars($edit_file)?>">
                <textarea name="filecontent" rows="20" class="w-full px-3 py-2 rounded border border-gray-300 mb-4 font-mono text-xs" style="direction:ltr"><?=htmlspecialchars($edit_content)?></textarea>
                <div class="flex justify-end gap-2">
                    <a href="?dir=<?=urlencode($dir)?>" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">إلغاء</a>
                    <button type="submit" name="editfile" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.body.style.overflow = "hidden";
    </script>
    <?php endif; ?>

<script>
document.getElementById('openUploadModal').onclick = () =>
    document.getElementById('uploadModal').classList.remove('hidden');
document.getElementById('openNewFolderModal').onclick = () =>
    document.getElementById('newFolderModal').classList.remove('hidden');
[...document.querySelectorAll('.close-modal')].forEach(btn => {
    btn.onclick = function() { this.closest('.fixed').classList.add('hidden'); }
});
function toggleAllChecks(main) {
    document.querySelectorAll('input[type=checkbox][name="selected_files[]"]').forEach(function(e){
        e.checked = main.checked;
    });
    updateDeleteSelectedBtn();
}
document.querySelectorAll('input[type=checkbox][name="selected_files[]"]').forEach(function(e){
    e.addEventListener('change', updateDeleteSelectedBtn);
});
function updateDeleteSelectedBtn() {
    let checked = document.querySelectorAll('input[type=checkbox][name="selected_files[]"]:checked').length;
    document.getElementById('delete-selected-btn').style.display = checked > 0 ? 'inline-flex' : 'none';
}
updateDeleteSelectedBtn();
document.getElementById('files-table').addEventListener('change', updateDeleteSelectedBtn);

function confirmDelete(msg) {
    return confirm(msg);
}

function handleDrop(event) {
    event.preventDefault();
    let dt = event.dataTransfer;
    let files = dt.files;
    if (files.length) {
        let input = document.getElementById('fileInput');
        let container = new DataTransfer();
        for (let i=0; i<files.length; i++) container.items.add(files[i]);
        input.files = container.files;
        autoSubmitUpload(input);
    }
    event.currentTarget.classList.remove('bg-blue-50');
}
function autoSubmitUpload(input) {
    if (input.files.length > 0) {
        document.getElementById('uploadForm').submit();
    }
}

const searchBox = document.getElementById('searchBox');
let searchTimeout = null;
let prevValue = searchBox.value;
if (searchBox) {
    searchBox.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        if (searchBox.value.length === 0 && prevValue.length !== 0) {
            document.getElementById('liveSearchForm').submit();
            prevValue = '';
            return;
        }
        searchTimeout = setTimeout(function() {
            if (searchBox.value !== prevValue) {
                document.getElementById('liveSearchForm').submit();
                prevValue = searchBox.value;
            }
        }, 700);
    });
}

const openSidebarBtn = document.getElementById('openSidebarBtn');
const sidebarMobile = document.getElementById('sidebarMobile');
if (openSidebarBtn && sidebarMobile) {
    openSidebarBtn.onclick = function() {
        sidebarMobile.classList.add('open');
    };
    document.addEventListener('mousedown', function(e) {
        if (sidebarMobile.classList.contains('open') && !sidebarMobile.contains(e.target) && e.target.id !== 'openSidebarBtn') {
            sidebarMobile.classList.remove('open');
        }
    });
}
</script>
</body>
</html>
