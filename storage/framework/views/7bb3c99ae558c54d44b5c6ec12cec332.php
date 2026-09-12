<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($resep->nama_resep); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm overflow-hidden">

        <a href="<?php echo e(route('resep.index')); ?>" class="inline-block m-4 text-orange-600 hover:underline text-sm">← Kembali</a>

        <div class="px-8 pb-4">
            <p class="text-orange-500 text-xs font-semibold tracking-widest uppercase mb-1">Resep Nusantara</p>
            <h1 class="text-4xl font-bold text-gray-800 mb-2"><?php echo e($resep->nama_resep); ?></h1>
            <p class="text-gray-500 text-sm">Cita rasa khas Indonesia, mudah dibuat di rumah.</p>
        </div>

        <?php if($resep->foto): ?>
            <img src="<?php echo e(asset('storage/' . $resep->foto)); ?>" class="w-full h-72 object-cover">
        <?php endif; ?>

        <div class="grid grid-cols-4 divide-x divide-gray-100 border-b border-gray-100 text-center py-4">
            <div>
                <p class="text-lg">⏱️</p>
                <p class="text-xs text-gray-400 mt-1">Persiapan</p>
                <p class="text-sm font-semibold text-gray-700">15 Menit</p>
            </div>
            <div>
                <p class="text-lg">🍳</p>
                <p class="text-xs text-gray-400 mt-1">Memasak</p>
                <p class="text-sm font-semibold text-gray-700">30 Menit</p>
            </div>
            <div>
                <p class="text-lg">🍽️</p>
                <p class="text-xs text-gray-400 mt-1">Porsi</p>
                <p class="text-sm font-semibold text-gray-700">4 Orang</p>
            </div>
            <div>
                <p class="text-lg">📊</p>
                <p class="text-xs text-gray-400 mt-1">Tingkat</p>
                <p class="text-sm font-semibold text-gray-700">Mudah</p>
            </div>
        </div>

        <div class="px-8 py-6 space-y-8">
            <span class="inline-block bg-orange-50 text-orange-600 text-xs font-semibold px-3 py-1 rounded-full">
                <?php echo e($resep->kategori->nama_kategori ?? '-'); ?>

            </span>

            <div>
                <h2 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-orange-400 inline-block">Bahan</h2>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 columns-1 sm:columns-2 gap-8">
                    <?php
                        $bahanList = array_values(array_filter(array_map('trim', explode("\n", $resep->bahan)), fn($s) => $s !== ''));
                    ?>
                    <?php $__currentLoopData = $bahanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start gap-2 break-inside-avoid">
                            <span class="text-orange-400 mt-0.5">•</span>
                            <span><?php echo e($item); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div>
                <h2 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-orange-400 inline-block">Cara Membuat</h2>
                <ol class="mt-3 space-y-4">
                    <?php
                        $steps = array_values(array_filter(
                            array_map('trim', explode("\n", $resep->cara_masak)),
                            fn($s) => $s !== '' && strtolower($s) !== 'cara membuat:' && strtolower($s) !== 'cara membuat'
                        ));
                    ?>
                    <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $clean = preg_replace('/^\d+[\.\)]\s*/', '', $step);
                        ?>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-7 h-7 rounded-full bg-orange-500 text-white text-xs font-bold flex items-center justify-center">
                                <?php echo e($index + 1); ?>

                            </span>
                            <p class="text-sm text-gray-600 pt-0.5"><?php echo e($clean); ?></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\ASUS\OneDrive\apa aja\laraveltugas\nusantara-rasa\resources\views/resep/show.blade.php ENDPATH**/ ?>