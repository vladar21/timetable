<div class="text-center text-3xl uppercase mb-3">
<h1>Форма для реєстрації</h1>
</div>

<div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">

    <form method="post" action="/auth/create">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <h3>Контактні дані:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="medical_history">
                        Номер медичної картки пацієнта
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="medical_history" name="medical_history" type="text">
                </div>

            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="last_name">
                        Фамілія
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="last_name" name="last_name" type="text">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="first_name">
                        Ім'я
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="first_name" name="first_name" type="text">
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="middle_name">
                        По-батькові
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="middle_name" name="middle_name" type="text">
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="birthday">
                        Дата народження
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="birthday" name="birthday" type="date">
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="phone">
                        Телефон
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="phone" name="phone" type="phone">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="email" name="email" type="email">
                </div>
            </div>
            <h3>Адреса:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="zipcode">
                        Поштовий індекс
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="zipcode" name="zipcode" type="text">

                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="country">
                        Страна
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="country" name="country" type="text">
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="region">
                        Область
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="region" name="region" type="text">
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="locality">
                        Місто (населений пункт)
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="locality" name="locality" type="text">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-2/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="street">
                        Вулиця
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="street" name="street" type="text">
                </div>
                <div class="md:w-1/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="house">
                        Будинок
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="house" name="house" type="text">
                </div>
                <div class="md:w-1/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="apartment">
                        Номер квартири
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="apartment" name="apartment" type="text">
                </div>
            </div>
            <h3>Аутентифікаційні дані:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="login">
                        Логін
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="login" name="login" type="text">
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="password">
                        Пароль
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="password" name="password" type="password">
                </div>
            </div>
            <br>
            <div class="-mx-2 md:flex mt-2">
                <div class="md:w-full px-3">
                    <button class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                        Button
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>