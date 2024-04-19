<?php function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id'])) {
        require_once __DIR__ . '/../app/models/database.php';
        $id=input($_GET["id"]);

        $sql="SELECT * FROM contact WHERE id=$id";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once __DIR__ . '/../app/models/database.php';
        $id=htmlspecialchars($_POST["id"]);
        $user_id=input($_POST["user_id"]);
        $owner=input($_POST["owner"]);
        $no_hp=input($_POST["no_hp"]);
        $email=input($_POST["email"]);


        $sql="UPDATE contact SET
			user_id='$user_id',
			owner='$owner',
			no_hp='$no_hp',
			email='$email'
			where id=$id";
        
        $hasil=mysqli_query($conn,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div id="updatebutton" class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-100 transition-opacity duration-500">
        <div class="bg-[#d2c1b0] relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-[16px] bg-blueGray-100 border-0">
            <a href="index.php" class="absolute top-0 left-0 mt-3 ml-3 text-[#37251b] hover:text-[#80411e]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>

            <div class="flex px-4 lg:px-10 py-4 pt-0 justify-center items-center flex-col">
                <div class="flex items-center justify-center mt-10">
                    <img src="./Vector.png" alt="">
                </div>
                <form id="updateForm" class="flex justify-center items-center flex-col" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase font-[poppins] text-[#37251b]">
                        Tambahkan Contact Baru
                    </h6>
                    <div class="flex flex-wrap text-center font-[poppins]">


                        <div class="w-full  px-4">
                            <div class="w-full mb-3">
                                <input type="text" name="id" id="id" class="hidden text-[#37251b] border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-[#f4f4f4] rounded-[8px] text-sm shadow focus:outline-none focus:ring focus:ring-[#37251b] w-[500px] ease-linear transition-all duration-150" value="<?php echo htmlspecialchars($data['id']); ?>" placeholder=>
                                </input>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 text-[#37251b]" htmlfor="grid-password">
                                    User Id
                                </label>

                                <input type="text" name="user_id" id="user_id" class="text-[#37251b] border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-[#f4f4f4] rounded-[8px] text-sm shadow focus:outline-none focus:ring focus:ring-[#37251b] w-[500px] ease-linear transition-all duration-150" value="<?php echo htmlspecialchars($data['user_id']); ?>" placeholder=>
                                </input>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold  mt-4 text-[#37251b]" htmlfor="grid-password">
                                    Owner
                                </label>

                                <input type="text" name="owner" id="owner" class="text-[#37251b] border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-[#f4f4f4] rounded-[8px] text-sm shadow focus:outline-none focus:ring focus:ring-[#37251b] w-[500px] ease-linear transition-all duration-150 font-[poppins]" value="<?php echo htmlspecialchars($data['owner']); ?>" placeholder=>
                                </input>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold  mt-4 text-[#37251b]" htmlfor="grid-password">
                                    No. Handphone
                                </label>

                                <input type="text" name="no_hp" id="no_hp" class="text-[#37251b] border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-[#f4f4f4] rounded-[8px] text-sm shadow focus:outline-none focus:ring focus:ring-[#37251b] w-[500px] ease-linear transition-all duration-150 font-[poppins]" value="<?php echo htmlspecialchars($data['no_hp']); ?>" placeholder=>
                                </input>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold  mt-4 text-[#37251b]" htmlfor="grid-password">
                                    Email
                                </label>

                                <input type="text" name="email" id="email" class="text-[#37251b] border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-[#f4f4f4] rounded-[8px] text-sm shadow focus:outline-none focus:ring focus:ring-[#37251b] w-[500px] ease-linear transition-all duration-150 font-[poppins]" value="<?php echo htmlspecialchars($data['email']); ?>" placeholder=>
                                </input>

                            </div>
                        </div>


                    </div>

                    <button type="submit" class="flex w-[300px] justify-center rounded-[12px] bg-[#37251b] opacity-70 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#80411e] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#76f51] mt-8">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>