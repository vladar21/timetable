<div class="text-center text-3xl uppercase mb-3">
    <h1>Форма для входу</h1>
</div>

<div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">

    <form action="/auth/login" method="post">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <h3>Введіть авторизаційні дані:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="email" name="email" type="email">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="password">
                        Пароль
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="password" name="password" type="password">
                </div>
            </div>

            <div class="-mx-2 md:flex mt-2">
                <div class="md:w-full px-3">
                    <button class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                        Тисніть, та йдемо до розкладу
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>