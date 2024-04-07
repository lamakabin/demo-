<div class="flex-1 py-1 shadow-lg px-30 flex justify-between">
    <!-- Correctly structured and uncomment if needed -->
    <!-- <a href="http://"><img src="./images/gmail.jpg" class="w-20" alt=""></a> -->
    <div class="flex flex-1 justify-end gap-3 items-center">
        <a href="setting.php" class="flex items-center gap-2">
            <?php if($getUserData['dp']): ?>
                <img src="<?= $getUserData['dp']; ?>" alt="sender" class="w-7 h-10 rounded-full">
            <?php else: ?>
                <img src="../images/download.jpg" alt="sender" class="w-7 h-10 rounded-full">
            <?php endif; ?>
            <span class="text-slate-600 font-semibold capitalize"><?= $getUserData['fname']; ?></span>
        </a>
        <a href="../logout.php" class="text-black bg-teal-600 hover:bg-teal-700 text-white px-3 py-2 rounded">Sign Out</a>
    </div>
</div>
