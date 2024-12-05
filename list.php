<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");

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


<div class="relative overflow-x-auto sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="pagination-table">
        <thead class="text-xs text-white uppercase bg-gradient-to-r from-teal-400 to-blue-600 hover:from-teal-500 hover:to-blue-700 transition-all">
            <tr>
                <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                    No.
                </th>
                <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                    Sender
                </th>
                <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                    Status
                </th>
                <?php if ($role_name !== 'masyarakat') : ?>
                    <th scope="col" class="px-6 py-3 text-lg font-semibold transform transition-transform hover:scale-110">
                        Action
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody class="transition-all duration-500">
            <?php if (empty($reports)) : ?>
                <tr>
                    <td colspan="6" class="bg-gradient-to-r from-pink-500 to-pink-600 px-6 py-4 text-center text-white text-xl font-bold">
                        Data kosong
                    </td>
                </tr>
            <?php else :
                $no = 1;
            ?>
                <?php foreach ($reports as $report) : ?>
                    <tr class="bg-gradient-to-r from-blue-400 to-blue-500 border-b hover:scale-105 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-600 text-white transition-all">
                        <td class="px-6 py-4 font-bold">
                            <?= $no++ ?>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            <?= $report['name'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                            <?= $report['title'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $report['created_at'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 font-semibold rounded-full <?= $report['status'] == 0 ? 'bg-red-500 text-white' : 'bg-green-500 text-white' ?> transform transition-all duration-300">
                                <?= $report['status'] == 0 ? "Not solved" : "Solved" ?>
                            </span>
                        </td>
                        <?php if ($role_name !== 'masyarakat') : ?>
                            <td class="px-6 py-4 flex justify-start items-center space-x-3">
                                <?php if ($report['status'] == 0) : ?>
                                    <a href="#" onclick="confirmApprove('reports_approve', 'id', <?= $report['id'] ?>)" class="text-white hover:text-blue-400 hover:scale-110 transition-all transform">
                                        <svg class="w-5 h-5 text-gray-800 hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a>
                                <?php endif ?>

                                <a href="index.php?page=detail&id=<?= $report['id'] ?>" class="text-white hover:text-blue-400 hover:scale-110 transition-all transform">
                                    <svg class="w-5 h-5 text-gray-800 hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" onclick="confirmDelete('reports_delete', 'id',<?= $report['id'] ?>)" class="text-white hover:text-red-400 hover:scale-110 transition-all transform">
                                    <svg class="w-5 h-5 text-gray-800 hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>


<?php
if (isset($_POST['submit'])) {
    handleFormSubmit($_POST, 'users', 'add');
}

if (isset($_POST['update'])) {
    handleFormSubmit($_POST, 'users', 'update');
}
?>