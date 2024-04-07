<?php include "../config/config.php"; 
if(!isset($_SESSION['account'])){
     redirect("login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox<?= PROJECT_NAME;?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <h1 class="text-4xl font-bold  my-5" >WELCOME TO MY PAGE </h1>
<?php include_once "mail_header.php";?>

    <div class="container mt-9 px-2">
        <div class="flex ">
       
            <!-- <a href="" class="bg-red-500 text-white hover:bg-red-700 px-5 py-7 rounded-lg text-2xl">Compose Mail</a> -->
            <div class="flex-1 text-center mt-2">
            <!-- <a href="" class="bg-red-500 text-white hover:bg-red-800 px-2 py-3 rounded-lg text-2xl">Compose Mail</a> -->
             <?php include_once "side.php";?>  
        </div>
        <div class="w-9/12">
            <div class="w-19/12">
    
    <!-- Navigation Bar -->
   <div class="bg-white shadow p-2 shadow-md">  
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-xl text-blue-500 font-semibold">Draft(save mail)</h1>
                </div>
                <div class="flex items-center space-x-4">
                   
            
                </div>
            </div>
        </div>
    </div>

   <!-- email list -->
    <div class="container max-auto mt-4"> 
    <!-- email item (sample) -->
    <?php 
$myUserId = $getUserData['user_id'];
$callingInbox = mysqli_query($connect, "SELECT * FROM mail JOIN accounts ON mail.user_to = accounts.user_id WHERE user_by='$myUserId' and isDraft='1'");
while($row = mysqli_fetch_array($callingInbox)) {
?>
    <div class="bg-white p-4 my-2 shadow-md rounded-lg">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <input type="checkbox" class="form-checkbox text-blue-500 h-3 w-6">
                <img src="https://via.placeholder.com/40" alt="sender" class="w-7 h-10 rounded-full">
                <div>
                    <h2 class="text-lg font-semibold"><?=$row['fname'] . " " . $row['lname'];?></h2>  
                    <p class="text-gray-600"><?=$row['subject'];?> - <?= substr($row['content'], 0, 50); ?>...</p>
                </div>
            </div>
            <p class="text-gray-600">just now</p>
        </div>
    </div>
<?php 
} // End of while loop
?>
</body>
</html>

  