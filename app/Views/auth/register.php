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
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['medical_history']) || $_SESSION['errors']['medical_history'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="medical_history" name="medical_history" type="text" value="<?= old('medical_history'); ?>">
                    <?php if (isset($_SESSION['errors']['medical_history']) && $_SESSION['errors']['medical_history'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['medical_history'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['medical_history'] = ''; ?>
                    <?php endif; ?>
                </div>

            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="last_name">
                        Фамілія
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['last_name']) || $_SESSION['errors']['last_name'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="last_name" name="last_name" type="text" value="<?= old('last_name'); ?>">
                    <?php if (isset($_SESSION['errors']['last_name']) && $_SESSION['errors']['last_name'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['last_name'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['last_name'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="first_name">
                        Ім'я
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['first_name']) || $_SESSION['errors']['first_name'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="first_name" name="first_name" type="text" value="<?= old('first_name'); ?>">
                    <?php if (isset($_SESSION['errors']['first_name']) && $_SESSION['errors']['first_name'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['first_name'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['first_name'] = ''; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="middle_name">
                        По-батькові
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['middle_name']) || $_SESSION['errors']['middle_name'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="middle_name" name="middle_name" type="text" value="<?= old('middle_name'); ?>">
                    <?php if (isset($_SESSION['errors']['middle_name']) && $_SESSION['errors']['middle_name'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['middle_name'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['middle_name'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="birthday">
                        Дата народження
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['birthday']) || $_SESSION['errors']['birthday'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="birthday" name="birthday" type="date" value="<?= old('birthday'); ?>">
                    <?php if (isset($_SESSION['errors']['birthday']) && $_SESSION['errors']['birthday'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['birthday'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['birthday'] = ''; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="phone">
                        Телефон
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['phone']) || $_SESSION['errors']['phone'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="phone" name="phone" type="phone" value="<?= old('phone'); ?>">
                    <?php if (isset($_SESSION['errors']['phone']) && $_SESSION['errors']['phone'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['phone'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['phone'] = ''; ?>
                    <?php endif; ?>
                </div>

            </div>
            <h3>Адреса прописки:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="zipcode">
                        Поштовий індекс
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['zipcode']) || $_SESSION['errors']['zipcode'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="zipcode" type="text" name="zipcode" value="<?= old('zipcode'); ?>">
                    <?php if (isset($_SESSION['errors']['zipcode']) && $_SESSION['errors']['zipcode'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['zipcode'], true); ?>
		                </span>
                    <?php $_SESSION['errors']['zipcode'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="country">
                        Страна
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['country']) || $_SESSION['errors']['country'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="country" name="country" type="text" value="<?= old('country'); ?>">
                    <?php if (isset($_SESSION['errors']['country']) && $_SESSION['errors']['country'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['country'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['country'] = ''; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="region">
                        Область
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['region']) || $_SESSION['errors']['region'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="region" name="region" type="text" value="<?= old('region'); ?>">
                    <?php if (isset($_SESSION['errors']['region']) && $_SESSION['errors']['region'] != ''): ?>
                        <span class='flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1'>
			                <?= print_r($_SESSION['errors']['region'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['region'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="locality">
                        Місто (населений пункт)
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['locality']) || $_SESSION['errors']['locality'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="locality" name="locality" type="text" value="<?= old('locality'); ?>">
                    <?php if (isset($_SESSION['errors']['locality']) && $_SESSION['errors']['locality'] != ''): ?>
                        <span class='flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1'>
			                <?= print_r($_SESSION['errors']['locality'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['locality'] = ''; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-2/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="street">
                        Вулиця
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['street']) || $_SESSION['errors']['street'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="street" name="street" type="text" value="<?= old('street'); ?>">
                    <?php if (isset($_SESSION['errors']['street']) && $_SESSION['errors']['street'] != ''): ?>
                        <span class='flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1'>
			                <?= print_r($_SESSION['errors']['street'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['street'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="house">
                        Будинок
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['house']) || $_SESSION['errors']['house'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="house" name="house" type="text" value="<?= old('house'); ?>">
                    <?php if (isset($_SESSION['errors']['house']) && $_SESSION['errors']['house'] != ''): ?>
                        <span class='flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1'>
			                <?= print_r($_SESSION['errors']['house'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['house'] = ''; ?>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="apartment">
                        Номер квартири
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['apartment']) || $_SESSION['errors']['apartment'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="apartment" name="apartment" type="text" value="<?= old('apartment'); ?>">
                    <?php if (isset($_SESSION['errors']['apartment']) && $_SESSION['errors']['apartment'] != ''): ?>
                        <span class='flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1'>
			                <?= print_r($_SESSION['errors']['apartment'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['apartment'] = ''; ?>
                    <?php endif; ?>
                </div>
            </div>
            <h3>Аутентифікаційні дані:</h3>
            <br>
            <div class="-mx-2 md:flex mb-6">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="w-full bg-gray-200 text-black border rounded py-3 px-4 mb-3 <?= (!isset($_SESSION['errors']['email']) || $_SESSION['errors']['email'] == '') ? 'border-gray-200' : 'border-red-500'; ?>" id="email" name="email" type="email" value="<?= old('email'); ?>">
                    <?php if (isset($_SESSION['errors']['email']) && $_SESSION['errors']['email'] != ''): ?>
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			                <?= print_r($_SESSION['errors']['email'], true); ?>
		                </span>
                        <?php $_SESSION['errors']['email'] = ''; ?>
                    <?php endif; ?>
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