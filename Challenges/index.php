<?php
declare(strict_types=1);
$rootPath = __DIR__;
$directories = array_filter(glob($rootPath . '/*'), 'is_dir');

function formatName($name) {
    $parts = explode('-', basename($name));
    if (is_numeric($parts[0])) array_shift($parts);
    if (end($parts) === 'PHP') array_pop($parts);
    return implode(' ', $parts);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lab | Design Patterns Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0f172a; color: #f8fafc; font-family: 'Inter', sans-serif; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); }
        .card-hover:hover { transform: translateY(-5px); border-color: #38bdf8; transition: all 0.3s ease; }
    </style>
</head>
<body class="p-8">
    <div class="max-w-6xl mx-auto">
        <header class="mb-12 border-b border-slate-700 pb-8">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-blue-600">
                Programming Challenges
            </h1>
            <p class="text-slate-400 mt-2">Architecture & Design Patterns Laboratory - PHP 8.5</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($directories as $dir): 
                $baseDir = basename($dir);
                $subfolders = array_filter(glob($dir . '/*'), 'is_dir');
            ?>
                <div class="glass p-6 rounded-2xl card-hover flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-2 py-1 bg-sky-500/10 text-sky-400 text-xs font-bold rounded uppercase">Pattern</span>
                            <span class="text-slate-500 text-xs font-mono"><?= explode('-', $baseDir)[0] ?></span>
                        </div>
                        <h2 class="text-xl font-bold text-white mb-4"><?= formatName($baseDir) ?></h2>
                        
                        <div class="space-y-2">
                            <?php foreach ($subfolders as $sub): 
                                $subName = basename($sub);
                                $indexPath = $baseDir . '/' . $subName . '/index.php';
                                $exists = file_exists($sub . '/index.php');
                            ?>
                                <a href="<?= $exists ? $indexPath : '#' ?>" 
                                   class="flex items-center justify-between p-2 rounded-lg <?= $exists ? 'hover:bg-slate-800 text-slate-300' : 'opacity-40 cursor-not-allowed text-slate-500' ?>">
                                    <span class="text-sm font-medium flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                                        <?= ucfirst($subName) ?>
                                    </span>
                                    <?php if($exists): ?>
                                        <span class="text-[10px] bg-emerald-500/20 text-emerald-400 px-1.5 py-0.5 rounded">LIVE</span>
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-slate-700/50 flex justify-between items-center text-xs text-slate-500 italic">
                        <span>/<?= $baseDir ?></span>
                        <?php if(file_exists($dir . '/README.md')): ?>
                            <span title="README available">📄</span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>