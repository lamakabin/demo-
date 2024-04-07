<?php include "config/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME;?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200">
    <h1 class="text-5xl font-bold px-5 my-1" >WELCOME TO MY PAGE </h1>
<?php include_once "include/header.php";?>
<div class="container mt-1 px-15">
    <div class="flex flex-1">
    <div class="w-7/12 p-16">
        <h1 class="text-7xl text-teal-800 font-black text-sans">Welcome to <?= PROJECT_NAME;?></h1>
        <p class="text-Ig leading-8 mt-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores atque corporis quam praesentium! Aperiam incidunt tenetur commodi? Perferendis beatae, facere officia ratione consequuntur nihil laboriosam odio! Reprehenderit porro voluptas accusamus.</p>
    </div>
    <div class="w-5/12 my-1 p-9">
       <div class="bg-white shadow p-5 border-slate-100 border rounded">
       <div class="w-full">
            <h2 class="text-2xl font-bold  my-2">Create an Account 100% Free</h2>
</div>

<!-- <form class="max-w-sm mx-auto"> -->
    <form action="" method="Post">
        <div class="flex gap-2">
            <div class="flex-1">
            <div class="mb-1">
    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
    <input type="text"  name="fname" id="fname" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="eg.kabin" required />
  </div>
            </div>
            <div class="flex-1">
            <div class="mb-1">
    <label for="lnamel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
    <input type="text" name="lname" id="elname" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="eg.lama" required />
  </div>
            </div>
        </div>
  <div class="mb-1">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username@gmail.com" required />
  </div>
  <div class="mb-1">
    <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
    <input type="tel" name="contact" id="contact" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="eg.9999999999" required />
  </div>
  
  <div class="flex gap-2">
  <div class="mb-1 flex-1">
    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
    <select id ="gender" name="gender"  class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username@pakhi.com">
<option value="">select gender here</option>
<option value="m">male</option>
<option value="f">female</option>
<option value="o">other</option>
</select>
  </div>
  <div class="mb-1 flex-1">
  <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Date of Birth</label>
 <input type="date" name="dob" id="dob"  class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  </div>
  <div class="mb-1">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Password</label>
    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
<div class="flex justify-end flex-1 ">
<button type="submit"  name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an Account</button>
</div>
</form>

  <?php
  //create account work
  if(isset($_POST['create'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];

    $query = mysqli_query($connect, "insert into accounts (fname, lname, dob, password, email, contact, gender)value ('$fname','$lname','$dob','$password','$email','$contact','$gender')");

    if($query){
      $_SESSION['account']= $email;
      redirect('mail/inbox.php');
    }
    else{
      alert('failed to create an account try again');
      redirect('index.php');
    }
  }
  ?>
       </div>
    </div>
</div>
</body>
</html>