<?php
include "../config/config.php";

if(isset($_POST['compose'])){
    $user_to = $_POST['user_to'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $user_by = $getUserData['user_id']; // Added a semicolon at the end of the line

    // File work
    $attachment = $_FILES['attachment']['name']; // Corrected 'attachement' to 'attachment'
    $tmp_attachment = $_FILES['attachment']['tmp_name'];
    move_uploaded_file($tmp_attachment, "attach/$attachment");

    $checkUser = mysqli_query($connect, "SELECT * FROM accounts WHERE email='$user_to' AND user_id !='$user_by'");
    $count_checkUser = mysqli_num_rows($checkUser);
    $getToUser = mysqli_fetch_array($checkUser);

    if($count_checkUser < 1){
        echo "<script>alert('To email is not found');</script>"; // Changed 'alert' to echo JavaScript alert
    } else {
        $getToUserID = $getToUser["user_id"]; // Corrected variable name

        $composeMail = mysqli_query($connect, "INSERT INTO mail (user_to, user_by, subject, content) VALUES ('$getToUserID', '$user_by', '$subject', '$content')");
       
        if($composeMail){
            echo "<script>alert('Mail sent');</script>"; // Changed 'alert' to echo JavaScript alert
            header("Location: inbox.php"); // Corrected 'redirect' to use header function
            exit; // Added exit after header to stop further execution
        } else {
            echo "<script>alert('Mail not sent');</script>"; // Changed 'alert' to echo JavaScript alert
            // header("Location: inbox.php"); // Corrected 'redirect' to use header function
            exit; // Added exit after header to stop further execution
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox <?= PROJECT_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <h1 class="text-4xl font-bold my-5">WELCOME TO MY PAGE</h1>
    <?php include_once "mail_header.php"; ?>

    <div class="container mt-9 px-2">
        <div class="flex">
            <div class="flex-1 text-center mt-2">
                <?php include_once "side.php"; ?>
            </div>

            <div class="w-9/12">
                <div class="container mx-auto px-4 py-8">
                    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
                        <h1 class="text-xl font-semibold mb-4">Compose New Mail</h1>
                        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                            <div>
                                <label for="to" class="block text-sm font-medium text-gray-700">To</label>
                                <input type="email" name="user_to" id="to" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Recipient's email">
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" name="subject" id="subject" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Subject">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea id="message" name="content" rows="4" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Write something..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Attachment
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v24a4 4 0 004 4h24a4 4 0 004-4V20l-12-12z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M24 29v-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 25h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M28 8v4a4 4 0 004 4h4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="attachment" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button type="submit" name="compose" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
