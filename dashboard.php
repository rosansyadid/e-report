<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");
$report_unsolved = query("SELECT  COUNT(status) as status FROM reports WHERE status = 0");
$report_solved = query("SELECT COUNT(status) as status FROM reports WHERE status = 1");

$user_id = $_SESSION['user_id'];
$role_name = $_SESSION['role_name'];

if ($role_name !== 'masyarakat') {
    $reports = query("SELECT reports.*, users.name FROM reports JOIN users ON users.id = reports.user_id");
} else {
    $reports = query(
        "SELECT reports.*, users.name FROM reports JOIN users ON users.id = reports.user_id WHERE user_id = '$user_id'"
    );
}
?>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Laporan Masuk -->
    <div class="relative border-2 border-dashed border-pink-300 rounded-lg dark:border-pink-600 h-32 md:h-64 p-4 overflow-hidden group">
        <a href="#" class="flex flex-col justify-center text-center w-full h-full bg-gradient-to-r from-pink-300 to-pink-500 border border-gray-200 rounded-lg shadow-lg transition-transform transform group-hover:scale-105 group-hover:rotate-2 dark:from-pink-600 dark:to-pink-800">
            <div class="absolute top-0 right-0 w-16 h-16 bg-pink-200 rounded-full mix-blend-multiply blur-xl opacity-30 animate-pulse"></div>
            <div class="flex flex-col items-center z-10 relative">
                <!-- Icon for Laporan Masuk -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-3 drop-shadow-lg animate-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                <!-- PHP Value with Fun Animation -->
                <h5 class="mb-2 text-xl md:text-7xl font-extrabold text-white drop-shadow-md fun-number">
                    <?= $report_unsolved[0]['status'] ?>
                </h5>
                <p class="font-medium text-white text-lg drop-shadow-sm">
                    Laporan Masuk 🎉
                </p>
            </div>
        </a>
    </div>

    <!-- Laporan Selesai -->
    <div class="relative border-2 border-dashed border-blue-300 rounded-lg dark:border-blue-600 h-32 md:h-64 p-4 overflow-hidden group">
        <a href="#" class="flex flex-col justify-center text-center w-full h-full bg-gradient-to-r from-blue-300 to-blue-500 border border-gray-200 rounded-lg shadow-lg transition-transform transform group-hover:scale-105 group-hover:rotate-2 dark:from-blue-600 dark:to-blue-800">
            <div class="absolute top-0 left-0 w-16 h-16 bg-blue-200 rounded-full mix-blend-multiply blur-xl opacity-30 animate-pulse"></div>
            <div class="flex flex-col items-center z-10 relative">
                <!-- Icon for Laporan Selesai -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-3 drop-shadow-lg animate-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
                <!-- PHP Value with Fun Animation -->
                <h5 class="mb-2 text-xl md:text-7xl font-extrabold text-white drop-shadow-md fun-number">
                    <?= $report_solved[0]['status'] ?>
                </h5>
                <p class="font-medium text-white text-lg drop-shadow-sm">
                    Laporan Selesai ✅
                </p>
            </div>
        </a>
    </div>

    <!-- Placeholder Section 1 -->
    <div class="border-2 border-dashed rounded-lg border-yellow-300 dark:border-yellow-600 h-32 md:h-64 p-4 flex items-center justify-center bg-gradient-to-br from-yellow-100 to-yellow-300 dark:from-yellow-600 dark:to-yellow-800 transition-transform transform hover:scale-105 hover:rotate-1 group hover:shadow-xl hover:animate-jump">
        <p class="text-yellow-800 dark:text-yellow-100 font-bold text-xl">🚀 Coming Soon!</p>
    </div>

    <!-- Placeholder Section 2 -->
    <div class="border-2 border-dashed rounded-lg border-green-300 dark:border-green-600 h-32 md:h-64 p-4 flex items-center justify-center bg-gradient-to-bl from-green-100 to-green-300 dark:from-green-600 dark:to-green-800 transition-transform transform hover:scale-105 hover:rotate-1 group hover:shadow-xl hover:animate-jump">
        <p class="text-green-800 dark:text-green-100 font-bold text-xl">✨ Stay Tuned!</p>
    </div>
</div>
<div class="border-2 border-dashed rounded-lg border-purple-300 dark:border-purple-600 h-96 mb-6 p-4 bg-gradient-to-r from-purple-100 to-purple-300 dark:from-purple-600 dark:to-purple-800 flex items-center justify-center">
    <p class="text-purple-800 dark:text-purple-100 text-2xl font-extrabold">🎨 Add Your Content Here!</p>
</div>

<style>
    /* Fun number animation */
    .fun-number {
        animation: numberAnimation 2s ease-out forwards;
    }

    @keyframes numberAnimation {
        0% { transform: scale(1); opacity: 0; }
        50% { transform: scale(1.2); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Adding smooth hover effect with slight bounce and rotation */
    .group:hover {
        transition: transform 0.3s ease-in-out, box-shadow 0.2s ease-in-out;
        transform: scale(1.05) rotate(2deg);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    /* Subtle 'jump' animation for placeholders */
    @keyframes jump {
        0% { transform: translateY(0); }
        25% { transform: translateY(-6px); }
        50% { transform: translateY(0); }
        75% { transform: translateY(-4px); }
        100% { transform: translateY(0); }
    }

    /* Apply the jumping effect on hover */
    .group:hover {
        animation: jump 0.5s ease-in-out forwards;
    }
</style>

