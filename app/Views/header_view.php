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

<?php if ( isset($_SESSION['msg']) && $_SESSION['msg'] != ''): ?>
<div id="messagesID" class="text-center py-4 lg:px-4 mb-2">
    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Повiдомлення</span>
        <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['msg'] ?></span>
        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
    </div>
</div>
<?php $_SESSION['msg'] = ''; endif; ?>

