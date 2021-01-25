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
    <?php if (isset($_SESSION['user_FIO'])): ?>
            <span class="text-xs font-semibold">Користувач: <?= $_SESSION['user_FIO'] ?></span>
    <? else: ?>
        <i class="fa fa-align-justify fa-2x my-2 mr-4" aria-hidden="true"></i>
    <?php endif; ?>
    </div>
</div>

<!-- Messages -->
<?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != '' ): ?>
    <div id="messagesMainID" class="text-center py-4 lg:px-4 mb-2">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Повiдомлення</span>
            <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['msg'] ?></span>

                <span>×</span>
            </button>
        </div>
    </div>
    <?= $_SESSION['msg'] = '' ?>
<?php endif ?>




