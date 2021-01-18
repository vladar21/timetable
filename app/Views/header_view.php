<div class="flex text-gray-400 mb-4">
    <div class="flex-none w-10 h-10 flex justify-center bg-black ">
       <a class="text-3xl text-white font-bold" src="/">H</a>
    </div>
    <div class="flex-grow h-10 ">
        <nav class="mx-4">
            <ul class="flex">
                <li class="my-2 mr-4 hover:text-gray-800 cursor-pointer">
                    <a href="/">Home</a>
                </li>
                <li class="my-2 mr-4 hover:text-gray-800 cursor-pointer">
                    <a href="../calendar">Розклад лікарні</a>
                </li>
                <?php if (!isset($_SESSION['logged_in'])): ?>

                <li class="my-2 mr-4 hover:text-gray-800 cursor-pointer">
                    <a href="../home/login">Увійти</a>
                </li>
                <li class="my-2 mr-4 hover:text-gray-800 cursor-pointer">
                    <a href="../home/register">Реєстрація</a>
                </li>

                <?php else: ?>

                    <li class="my-2 mr-4 hover:text-gray-800 cursor-pointer">
                        <a href="../auth/logout">Вийти</a>
                    </li>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="flex-none w-10 h-10 flex justify-center">
        <i class="fa fa-align-justify fa-2x my-2 mr-4" aria-hidden="true"></i>
    </div>

</div>
