
<div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Повiдомлення</span>
    <span class="font-semibold mr-2 text-left flex-auto"><?= $msg ?></span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclic="closeAlert(event)">
        <span>×</span>
    </button>
</div>
