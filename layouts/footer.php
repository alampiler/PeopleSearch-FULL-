<footer class="footer row align-center">
    <div class="column small-12 medium-4">
        <h5 class="small-12 medium-10 large-6">Зниклі безвісти</h5>
        <ul class="vertical menu">
            <li><a href="/subcategory.php?id=<?=15?>">Дорослі</a></li>
            <li><a href="/subcategory.php?id=<?=16?>">Діти</a></li>
            <li><a href="/subcategory.php?id=<?=17?>">Зона ООС</a></li>
        </ul>
    </div>
    <div class="column small-12 medium-4">
        <h5 class="small-12 medium-10 large-6">Матеріальні цінності</h5>
        <ul class="vertical menu">
            <li><a href="/subcategory.php?id=<?=18?>">Транспортні засоби</a></li>
            <li><a href="/subcategory.php?id=<?=19?>">Коштовності</a></li>
            <li><a href="/subcategory.php?id=<?=20?>">Мобільні телефони</a></li>
            <li><a href="/subcategory.php?id=<?=21?>">Зброя</a></li>
        </ul>
    </div>
    <div class="column small-12 medium-3 large-2">
        <h5 class="small-12">Соціальні медіа</h5>
        <div class="social_icons row medium-2">
			<span class="social_fb social">
				<a href="#"></a>
			</span>
            <span class="social_tl social">
					<a href="#"></a>
			</span>
            <span class="social_tw social">
					<a href="#"></a>
			</span>
            <span class="social_vb social">
					<a href="#"></a>
			</span>
        </div>
    </div>
</footer>
<div class="reveal row requestModal align-spaced" id="requestModal" data-reveal>
    <h4 class="requestModal_title small-12 text-center">Виберіть заявку</h4>
    <button class="button primary small-12 medium-5" data-open="requestPeopleModal">Зниклі люди</button>
    <button class="button primary small-12 medium-5" data-open="requestMaterialModal">Зниклі матеріальні цінності</button>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="reveal column requestMaterialModal" id="requestMaterialModal" data-reveal>
    <h4 class="requestModal_title large-12 text-center">Заявка на зниклу матеріальну цінність</h4>
    <form data-abide novalidate enctype="multipart/form-data" method="post" action="../functions/request.php">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Не всі поля заповнені правильно.</p>
                </div>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <label>Тип
                    <select id="material_type" name="m_type" required>
                        <option value=""></option>
                        <option value="Транспортний засіб">Транспортний засіб</option>
                        <option value="Коштовіність">Коштовіність</option>
                        <option value="Мобільний телефон">Мобільний телефон</option>
                        <option value="Зброя">Зброя</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>Назва моделі
                    <input type="text" id="model_name" name="m_model_name" placeholder="Назва моделі" required>
                    <span class="form-error">
        		Поле пусте
        </span>
                </label>
                <p class="help-text">Поле має містити повну назву моделі.</p>
            </div>
            <div class="cell small-12">
                <label>Фото
                    <input type="file" placeholder="Фото" id="image_m" name="m_photo" required accept="image/*">
                    <span class="form-error">
        		Файл не є фотографією або поле пусте
        </span>
                </label>
            </div>
            <div class="cell small-12">
                <label>Контактний телефон
                    <input type="tel" id="tel" name="m_tel" placeholder="+xx (xxx) xxx xx xx" required>
                    <span class="form-error">
        		Номер телефону введено невірно або поле пусте
        </span>
                </label>
            </div>
            <div class="cell small-12">
                <label>Дата і час останнього контакту
                    <input type="date" id="material_last_see_date" name="m_last_see_date" required>
                    <input type="text" id="material_last_see_time" name="m_last_see_time">
                </label>
            </div>
            <div class="cell small-12">
                <label>Місто зникнення
                    <input type="text" id="material_last_see_city" name="m_last_see_city" placeholder="Місто" required>
                </label>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <fieldset class="cell medium-6">
                <label for="spec_feat_text">Особливі прикмети
                    <textarea name="m_spec_feat_text" id="material_spec_feat_text" cols="30" rows="10" class="spec_feat_text" ></textarea>
                </label>
            </fieldset>
            <fieldset class="cell medium-6">
                <label for="last_see">Останнє місце перебування
                    <textarea name="m_last_see_text" id="material_last_see" cols="30" rows="10" class="last_see"  ></textarea>
                </label>
            </fieldset>
        </div>
        <div class="grid-x grid-margin-x">
            <fieldset class="cell medium-6">
                <button class="button alert" type="submit" name="m_req" value="Submit">Подати заявку</button>
            </fieldset>
            <fieldset class="cell medium-6">
                <button class="button alert" type="reset" value="Reset">Зкинути інформацію</button>
            </fieldset>
        </div>
    </form>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="reveal column requestPeopleModal" id="requestPeopleModal" data-reveal>
    <h4 class="requestModal_title large-12 text-center">Заявка на зниклу людину</h4>
    <form data-abide novalidate enctype="multipart/form-data" method="post" action="../functions/request.php">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <div data-abide-error class="alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> Не всі поля заповнені правильно.</p>
                </div>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <label>Прізвище
                    <input type="text" placeholder="Прізвище" name="p_surname" required>
                    <span class="form-error">
        			Поле містить цифри, інші спец. символи або воно пусте
        </span>
                </label>
                <p class="help-text">Поле має містити лише букви.</p>
            </div>
            <div class="cell small-12">
                <label>Ім'я
                    <input type="text" placeholder="Ім'я" name="p_name" required>
                    <span class="form-error">
        		Поле містить цифри, інші спец. символи або воно пусте
        </span>
                </label>
                <p class="help-text">Поле має містити лише букви.</p>
            </div>
            <div class="cell small-12">
                <label>По батькові
                    <input type="text" placeholder="По батькові" name="p_surname_2" required>
                    <span class="form-error">
        		Поле містить цифри, інші спец. символи або воно пусте
        </span>
                </label>
                <p class="help-text">Поле має містити лише букви.</p>
            </div>
            <div class="cell small-12">
                <label>Фото
                    <input type="file" placeholder="Фото" id="image_p" name="p_photo" required accept="image/*">
                    <span class="form-error">
        		Файл не є фотографією або поле пусте
        </span>
                </label>
            </div>
            <div class="cell small-12">
                <label>Контактний телефон
                    <input type="tel" id="tel" name="p_tel" placeholder="+xx (xxx) xxx xx xx" required>
                    <span class="form-error">
        		Номер телефону введено невірно або поле пусте
        </span>
                </label>
            </div>
            <div class="cell small-12">
                <label>Дата народження
                    <input type="date" id="birthday" name="p_birthday" placeholder="" required>
                </label>
            </div>
            <div class="cell small-12">
                <label>Дата і час останнього контакту
                    <input type="date" id="last_see_date" name="p_last_see_date" required>
                    <input type="text" id="last_see_time" name="p_last_see_time">
                </label>
            </div>
        </div>
        <div class="cell small-12">
            <label>Місце зникнення
                <input type="text" id="last_see_city" name="p_last_see_city" placeholder="" required>
            </label>
        </div>
        <div class="grid-x grid-margin-x">
            <fieldset class="cell medium-8">
                <legend>Стать</legend>
                <input type="radio" name="sex" value="Чоловіча" id="male"><label for="male">Чоловіча</label>
                <input type="radio" name="sex" value="Жіноча" id="female" required><label for="female">Жіноча</label>
                <input type="radio" name="sex" value="Невизначена" id="uncertain"><label for="uncertain">Невизначена</label>
            </fieldset>
            <fieldset class="cell medium-4">
                <legend>Зниклий в зоні ООС</legend>
                <input id="checkbox1" type="checkbox" name="p_zone"><label for="checkbox1">Так</label>
            </fieldset>
        </div>
        <div class="grid-x grid-margin-x">
            <fieldset class="cell medium-6">
                <label for="spec_feat_text">Особливі прикмети
                    <textarea name="p_spec_feat_text" id="spec_feat_text" cols="30" rows="10" class="spec_feat_text"></textarea>
                </label>
            </fieldset>
            <fieldset class="cell medium-6">
                <label for="last_see">Останнє місце перебування
                    <textarea name="p_last_see_text" id="last_see" cols="30" rows="10" class="last_see" ></textarea>
                </label>
            </fieldset>
        </div>
        <div class="grid-x grid-margin-x">
            <fieldset class="cell medium-6">
                <button class="button alert" type="submit" name="p_req" value="Submit">Подати заявку</button>
            </fieldset>
            <fieldset class="cell medium-6">
                <button class="button alert" type="reset" value="Reset">Зкинути інформацію</button>
            </fieldset>
        </div>
    </form>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script src="assets/js/libs.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    jQuery(document).foundation();
</script>
</body>
</html>
